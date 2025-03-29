<?php 
// moodleform is defined in formslib.php
require_once("$CFG->libdir/formslib.php");

class simplehtml_form extends moodleform {
    // Add elements to form.
    public function definition() {
        // A reference to the form is stored in $this->form.
        // A common convention is to store it in a variable, such as `$mform`.
        $myform = $this->_form; // Don't forget the underscore!

        // Add elements to your form.
        $myform->addElement('text', 'email', get_string('email'));

        // Set type of element.
        $myform->setType('email', PARAM_NOTAGS);

        // Default value.
        $myform->setDefault('email', 'Please enter email');
        
        $myform->addElement('submit', 'submitbutton', get_string('submit', 'local_olympiads'));
    }

    // Custom validation should be added here.
    function validation($data, $files) {
        return [];
    }
}
?>