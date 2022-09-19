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


require_once($CFG->libdir . "/externallib.php");
require_once($CFG->dirroot . "/local/pokemon_tracker/delete.php");


class local_pokemon_tracker_external extends external_api {
    /**
     * Returns description of method parameters.
     * @return external_function_parameters
     */
    public static function delete_pokemon_by_id_parameters(): external_function_parameters {
        return new external_function_parameters(
            array(
                'pokemonid' => new external_value(PARAM_INT, 'pokemon id'),
            )
        );
    }

    /**
     * Delete pokemon by id function.
     *
     * @param int $pokemonid
     * @return array
     * @throws moodle_exception
     */
    public static function delete_pokemon_by_id(int $pokemonid): array {
        global $DB;

        $warnings = array();

        local_pokemon_tracker_delete_pokemon($pokemonid);

        return array(
            'pokemonid' => $pokemonid,
            'warnings' => $warnings
        );

    }

    /**
     * Returns description of method result value.
     * @return external_description
     */
    public static function delete_pokemon_by_id_returns() {
        return new external_single_structure(
            array(
                'pokemonid' => new external_value(PARAM_INT, 'pokemon id'),
                'warnings' => new external_warnings()
            )
        );
    }
}