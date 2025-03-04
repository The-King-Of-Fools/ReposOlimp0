<?php
defined('MOODLE__INTERNAL') || die();

$capabilities = array(
    'block/olympiad:myaddinstance' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT__SYSTEM,
        'requiredbydefault' => false,
    ),
    'block/olympiad:addinstance' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'requiredbydefault' => true,
    ),
);
?>