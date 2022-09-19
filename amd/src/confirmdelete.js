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
 *
 * @copyright 2020, Riasat Mahbub <riasat.mahbub@brainstation-23.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

import {$} from 'jquery';
import {Ajax} from 'core/ajax';
import {str} from 'core/str';
import {ModalFactory} from 'core/modal_factory';
import {ModalEvents} from 'core/modal_events';
import {Notification} from 'core/notification';



$('.delete-btn').on('click', function () {
    let elementId = $(this).attr('id');
    let arr = elementId.split("-");
    let pokemonId = arr[arr.length - 1];
    // eslint-disable-next-line promise/catch-or-return
    ModalFactory.create({
        type: ModalFactory.types.SAVE_CANCEL,
        title: str.get_string('deletetitle', 'local_pokemon_tracker', '', ''),
        body: str.get_string('modalmessage', 'local_pokemon_tracker', '', '')
        // eslint-disable-next-line promise/always-return
    }).then(function (modal) {
        modal.setSaveButtonText(str.get_string('delete', 'local_pokemon_tracker', '', ''));
        let root = modal.getRoot();
        root.on(ModalEvents.save, function () {
            let wsfunction = 'local_pokemon_tracker_delete_pokemon_by_id';
            let params = {
                'pokemonid': pokemonId,
            };
            let request = {
                methodname: wsfunction,
                args: params
            };
            Ajax.call([request])[0].done(function () {
                window.location.href = $(location).attr('href');
            }).fail(Notification.exception);
        });
        modal.show();
    });
});