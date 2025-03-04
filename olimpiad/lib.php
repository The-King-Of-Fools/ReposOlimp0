<?php
function olimpiads__get__all() {
    global $DB;

    // Получение всех олимпиад
    return $DB->get_records('olimpic'); // Предполагается, что таблица называется 'olimpic'
}
?>