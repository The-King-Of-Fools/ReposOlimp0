<?php
require_once($CFG->libdir . '/formslib.php'); 

class olimpiad_form extends moodleform {
    // Определяем форму
    public function definition() {
        $myform = $this->_form; // Получаем объект формы
        $myform->addElement('header', 'config_header', get_string('name', 'block_olimpiad'), ['required' => true]);
        
        $myform->addElement('text', 'id', get_string('id', 'block_olimpiad')); // Скрытое поле для id
        $myform->setType('id', PARAM_INT); // Устанавливаем тип данных
        // Поле для ввода заголовка олимпиады
        $myform->addElement('text', 'title', get_string('title', 'block_olimpiad'), ['required' => true]);
        $myform->setType('title', PARAM_TEXT); // Устанавливаем тип данных
        // Поле для ввода даты начала
        $myform->addElement('date_selector', 'date_start', get_string('date_start', 'block_olimpiad'), ['required' => true]);
        //$myform->setType('date_start', PARAM_TEXT); // Устанавливаем тип данных
        // Поле для ввода даты окончания
        $myform->addElement('date_selector', 'date_finish', get_string('date_finish', 'block_olimpiad'), ['required' => true]);
        //$myform->setType('date_finish', PARAM_TEXT); // Устанавливаем тип данных
        // Поле для ввода описания
        $myform->addElement('textarea', 'descr', get_string('descr', 'block_olimpiad'), 'wrap="hard" rows="10" cols="50');
        $myform->setType('descr', PARAM_TEXT); // Устанавливаем тип данных
        // Кнопка отправки
        
        $myform->addElement('submit', 'submitbutton', get_string('submit', 'block_olimpiad'));
    }
}
?>