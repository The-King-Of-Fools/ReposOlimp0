<?php
function olimpiads_get_all() {
    global $DB;

    // Получение всех олимпиад
    return $DB->get_records('olympic'); 
}
?>