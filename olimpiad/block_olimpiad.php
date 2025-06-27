<?php
defined('MOODLE_INTERNAL') || die();
require_once(__DIR__ . '/../../config.php');
require_once(__DIR__ . '/form_olimpiad.php');

class block_olimpiad extends block_base {
    public function init() {
        $this->title = get_string('pluginname', 'block_olimpiad');
    }

    public function get_content() {
        global $DB, $OUTPUT;

        // Кеширование содержимого
        if ($this->content !== null) {
            return $this->content;
        }

        $this->content = (object) ['text' => ''];
        $myform = new olimpiad_form();

        // Обработка данных формы
        if ($myform->is_cancelled()) {
            // Действия при отмене (например, редирект)
            redirect(new moodle_url('/my/index.php'));
        } elseif ($data = $myform->get_data()) {
            // Сохранение данных в БД
            $record = new stdClass();
            $record->title = $data->title;
            $record->date_start = $data->date_start;
            $record->date_finish = $data->date_start;
            $record->descr = $data->descr;

            if (!empty($data->id)) {
                $record->id = $data->id;
                $DB->update_record('olympic', $record);
            } else {
                $DB->insert_record('olympic', $record);
            }
        }

        // Отображение таблицы с олимпиадами
        $table = new html_table();
        $table->head = [
            get_string('id', 'block_olimpiad'),
            get_string('title', 'block_olimpiad'),
            get_string('date_start', 'block_olimpiad'),
            get_string('date_finish', 'block_olimpiad'),
            get_string('descr', 'block_olimpiad'),
            get_string('actions', 'block_olimpiad')
        ];

        $olympics = $DB->get_records('olympic');
        foreach ($olympics as $olympic) {
            $edit_url = new moodle_url('/blocks/olimpiad/edit.php', ['id' => $olympic->id]);
            $delete_url = new moodle_url('/blocks/olimpiad/delete.php', ['id' => $olympic->id]);

            $table->data[] = [
                $olympic->id,
                $olympic->title,
                userdate($olympic->date_start, get_string('strftimedate', 'langconfig')), // Форматирование даты
                userdate($olympic->date_finish, get_string('strftimedate', 'langconfig')),
                shorten_text($olympic->descr, 30), // Обрезаем длинный текст
                $OUTPUT->action_icon($edit_url, new pix_icon('t/edit', get_string('edit'))) . ' ' .
                $OUTPUT->action_icon($delete_url, new pix_icon('t/delete', get_string('delete')))
            ];
        }

        // Сборка итогового содержимого
        $this->content->text = $myform->render() . html_writer::table($table);
        return $this->content;
    }

    public function has_config() {
        return true;
    }
}
?>