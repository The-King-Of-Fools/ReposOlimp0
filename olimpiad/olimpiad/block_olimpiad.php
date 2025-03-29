<?php
defined("MOODLE_INTERNAL") || die();
require_once __DIR__ . "/form_olimpiad.php";
class block_olimpiad extends block_base
{
    public function init()
    {
        $this->title = get_string("pluginname", "block_olimpiad");
    }

    public function get_content()
    {
        global $DB, $OUTPUT;

        $this->content = (object) [
            "text" => "",
        ];
        $myform = new olimpiad_form(); 

        // Работа с формой
        if ($myform->is_cancelled()) {
            
        } elseif ($data = $myform->get_data()) {
            if (!empty($data->id)) {
            // Редактирование существующей записи
            $record = new stdClass();
            $record->id = $data->id; // Устанавливаем id для редактирования
            $record->title = $data->title;
            $record->date_start = $data->date_start;
            $record->date_finish = $data->date_finish;
            $record->descr = $data->descr;
            $DB->update_record('olympic', $record); // Обновление записи в базе данных
        } else {
            // Добавление новой записи
            $record = new stdClass();
            $record->title = $data->title;
            $record->date_start = $data->date_start;
            $record->date_finish = $data->date_finish;
            $record->descr = $data->descr;
            $DB->insert_record('olympic', $record); // Сохранение новой записи в базе данных
        }

    // Перенаправление после успешного сохранения
    //redirect(new moodle_url('/local/olimpiad/index.php'), get_string('recordsaved', 'block_olympiads'));

        }
        $this->content->text = $myform->render(); 
        return $this->content; 
    }

    public function has_config()
    {
        return true; 
    }

}
?>
