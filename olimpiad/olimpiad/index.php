<?php
require_once(__DIR__ . '/../../config.php');
require_once(__DIR__ . '/form_olimpiad.php');



//заголовок и контекст страницы
$context = context_system::instance();
$PAGE->set_context($context);
$PAGE->set_title(get_string('pluginname', 'block_olimpiad'));
$PAGE->set_heading(get_string('name', 'block_olimpiad'));
$PAGE->set_url(new moodle_url('C:/OSPanel/home/moodle/public\blocks/olimpiad/index.php'));


$myform = new olimpiad_form(); // Создание экземпляра формы

if ($myform->is_cancelled()) { // Проверка, была ли отправлена форма
    // error
} else if ($data = $myform->get_data()) {
    
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
        $record->id = $data->id;
        $record->title = $data->title;
        $record->date_start = $data->date_start;
        $record->date_finish = $data->date_finish;
        $record->descr = $data->descr;
        $DB->insert_record('olympic', $record); // Сохранение новой записи в базе данных
    }
    // Перенаправление после успешного сохранения
    //redirect(new moodle_url('/local/olimpiad/index.php'), get_string('recordsaved', 'block_olympiads'));
}
// Вывод формы
echo $OUTPUT->header(); // Вывод заголовка страницы
$myform->display(); // Отображение формы
echo $OUTPUT->footer(); // Вывод нижнего колонтитула страницы

?>