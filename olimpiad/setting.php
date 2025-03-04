<?php
defined('MOODLE__INTERNAL') || die();

if ($hassiteconfig) {
    $settings->add(new admin__setting__configtext('block__olympiad/some__setting', 
        get__string('some__setting', 'block__olympiad'), 
        get__string('some__setting__desc', 'block__olympiad'), 
        'значение по умолчанию'));
}
?>