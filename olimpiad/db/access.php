<?php
defined('MOODLE_INTERNAL') || die();

$capabilities = array(
    'block/olimpiad:myaddinstance' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'requiredbydefault' => false,
    ),
    'block/olimpiad:addinstance' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'requiredbydefault' => true,
    ),
    'block/olimpiad:view' => array(
        'captype' => 'read',
        'contextlevel' => CONTEXT_BLOCK, 
    ),
);
?>