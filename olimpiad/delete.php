<?php
require_once(__DIR__.'/../../config.php'); // Подключение конфигурации Moodle
require_once(__DIR__. '/form_olimpiad.php');
require_login(); // Проверка, что пользователь вошел в систему

global $DB;

$id = optional_param('id', null, PARAM_INT);
// Проверка, что передан идентификатор
if ($id) {
    
    if ($DB->record_exists('olympic', array('id' => $id))) {
        
        $DB->delete_records('olympic', array('id' => $id));
        redirect(new moodle_url('/my/index.php'), get_string('recorddeleted', 'block_olimpiad')); // Перенаправление после удаления
    } else {
        echo "Запись с ID $id не найдена.";
    }
} else {
    echo "ID не передан.";
}
?>