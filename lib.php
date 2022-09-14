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
 * @package   local_pokemon_tracker
 * @copyright 2020, Riasat Mahbub <riasat.mahbub@brainstation-23.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


function local_pokemon_tracker_before_footer() {
    global $DB, $USER;
    $pokemons = $DB->get_records('local_pokemon');

    // $sql = "SELECT lm.id, lm.messagetext, lm.messagetype FROM {local_message} lm
    //         LEFT OUTER JOIN {local_message_read} lmr ON lm.id = lmr.messageid
    //         WHERE lmr.userid <> :userid or lmr.userid IS NULL";
    
    // $params = [
    //     'userid' => $USER->id
    // ];

    // $messages = $DB->get_records_sql($sql, $params);

    
    foreach($pokemons as $pokemon){
        echo "<p> $pokemon->pokemonname </p>";
        echo "<p> $pokemon->pokemontype1 </p>";
        echo "<p> $pokemon->pokemontype1 </p>";
    }

}
