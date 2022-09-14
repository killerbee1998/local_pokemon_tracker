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

require_once(__DIR__ . '/../../config.php');
global $DB;

$PAGE->set_url(new moodle_url('/local/pokemon/manage.php'));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title(get_string('manage_msg', 'local_pokemon_tracker'));

$pokemons = $DB->get_records('local_pokemon');

echo $OUTPUT->header();

$templatecontext = (object)[
    'pokemons' => array_values($pokemons),
    'editurl' =>new moodle_url('/local/pokemon_tracker/edit.php')
];

echo $OUTPUT->render_from_template('local_pokemon_tracker/manage', $templatecontext);

echo $OUTPUT->footer();
