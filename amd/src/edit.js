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
 * The editing form of a CodeLab question: the code fields (starting code, solution, code before and after) become code
 * editors in the language chosen in the form.
 *
 * @module     qtype_codelab/edit
 * @copyright  2026 Boban Blagojević
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
import {createEditor} from 'tiny_codelab/monaco';

export const init = async() => {
    const select = document.getElementById('id_language');
    const editors = [];
    const fields = ['id_template', 'id_solution', 'id_prefix', 'id_suffix'].map((id) => document.getElementById(id));
    for (const textarea of fields.filter(Boolean)) {
        const host = document.createElement('div');
        host.className = 'qtype_codelab-editor border rounded w-100';
        textarea.after(host);
        try {
            const label = document.querySelector(`label[for="${textarea.id}"]`);
            const editor = await createEditor(host, {
                value: textarea.value,
                lang: select ? select.value : 'c',
                minLines: 6,
                maxLines: 25,
                label: label ? label.textContent.trim() : '',
            });
            textarea.hidden = true;
            editor.onChange((value) => {
                textarea.value = value;
            });
            editors.push(editor);
        } catch (e) {
            // The editor could not be loaded: the text area stays.
            host.remove();
        }
    }
    select?.addEventListener('change', () => editors.forEach((editor) => editor.setLanguage(select.value)));
};
