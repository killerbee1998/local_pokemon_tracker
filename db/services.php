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
 * @copyright 2022, Riasat Mahbub <riasat.mahbub@brainstation-23.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$functions = array(
    'local_pokemon_tracker_delete_pokemon_by_id' => array(
        'classname'   => 'local_pokemon_tracker_external',
        'methodname'  => 'delete_pokemon_by_id',
        'classpath'   => 'local/pokemon_tracker/external.php',
        'description' => 'Delete a single score by id',
        'type'        => 'write',
        'ajax'        => true
    ),
);

$services = array(
    'local_pokemon_tracker' => array(
        'functions' => array(
            'local_pokemon_tracker_delete_pokemon_by_id'
        ),
        'restrictedusers' => 0,
        'enabled' => 1,
        'shortname' => 'local_pokemon_tracker'
    )
);