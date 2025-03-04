<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Block definition class for the block_pluginname plugin.
 *
 * @package   block_pluginname
 * @copyright Year, You Name <your@email.address>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class block_olimpiad extends block_base {
    //defined('MOODLE_INTERNAL') || die();

    public function init() {
        $this->title = get_string('plaginname', 'blok_olimpiad');
        //$this->title = get_string('plaginname');//, 'blok_olimpiad');
    }

    public function get_content() {

        //global $OUTPUT;
        // проверка содержания
        if ($this->content !== null) {
            return $this->content;
        }
        
        // подключение бд
        global $DB;
        
        // Получение данных из базы
        // Формирование списка олимпиад.
        if ($olympiads) {
            $this->content->text .= '<ul>';
            foreach ($olympiads as $olympiad) {
                $this->content->text .= '<li>' . htmlspecialchars($olympiad->TITLE) . '</li>'; // Вывод названия олимпиады.
            }
            $this->content->text .= '</ul>';
        } else {
            $this->content->text .= get__string('no__olympiads', 'block__olimpiad'); // Сообщение, если олимпиад нет.
        }

        return $this->content; // Возвращаем содержимое блока.
    }

    public function has__config() {
        return true; // Указывает, что блок может иметь настройки.
    }
}
?>