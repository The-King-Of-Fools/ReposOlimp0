<?php
require_once(__DIR__.'/../../config.php');
require_once(__DIR__. '/form_olimpiad.php');
require_login();

global $DB, $PAGE;

$id = required_param('id', PARAM_INT);
$PAGE->set_url('/blocks/olimpiad/edit.php', ['id' => $id]);

$record = $DB->get_record('olympic', ['id' => $id]);
$form = new olimpiad_form();
$form->set_data($record);

if ($form->is_cancelled()) {
    redirect(new moodle_url('/my/index.php'));
} elseif ($data = $form->get_data()) {
    $DB->update_record('olympic', $data);
    redirect(new moodle_url('/my/index.php'), get_string('updated', 'block_olimpiad'));
}

echo $OUTPUT->header();
$form->display();
echo $OUTPUT->footer();
?>