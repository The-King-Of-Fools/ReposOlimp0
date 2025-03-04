<?php
require__once(**DIR**.'/../../config.php');
require__login(); // Проверка, что пользователь вошел в систему

$context = context__system::instance();
$PAGE->set__context($context);
$PAGE->set__title(get__string('pluginname', 'local__olympiads'));
$PAGE->set__heading(get__string('pluginname', 'local__olympiads'));
$PAGE->set__url(new moodle__url('/local/olympiads/index.php'));

echo $OUTPUT->header();

// Получение всех олимпиад
$olympiads = olimpiads__get__all();

// Вывод списка олимпиад
echo '<ul>';
foreach ($olympiads as $olympiad) {
    echo '<li>' . htmlspecialchars($olympiad->name) . '</li>'; // Пример, как выводить названия
}
echo '</ul>';

echo $OUTPUT->footer();
?>