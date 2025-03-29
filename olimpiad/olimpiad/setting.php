<?php
defined('MOODLE_INTERNAL') || die();

if ($hassiteconfig) {
    $settings->add(new admin_setting_configtext('block_olympiad/some_setting', 
        get_string('some_setting', 'block_olimpiad'), 
        get_string('some_setting_desc', 'block_olimpiad'), 
        'значение по умолчанию'));
}
?>