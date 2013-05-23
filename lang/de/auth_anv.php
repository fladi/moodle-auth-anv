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
 * Strings for component 'auth_anv', language 'en', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_anv
 * @copyright 2013 Michael Fladischer <michael.fladischer@medunigraz.at>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['auth_anvdescription'] = 'Diese Anmeldemethode ermöglicht die Authentifizierung über einen externen ANV-Server, wie er von den österreichsichen Medizin-Unis betreiben wird.';
$string['auth_anvnotinstalled'] = 'Die ANV-Authentifizierung kann nicht benutzt werden da die PHP CURL Erweiterung nicht installiert ist.';
$string['auth_anvurl'] = 'Das URL-Template, aus welchem die URL für die Benutzeranmeldung erzeugt wird. Die Platzhalter {username} und {password} werden bei der Authentifizierung durch die Zugangsdaten des Benutzers ersetzt.';
$string['auth_anvurl_key'] = 'URL-Template';
$string['auth_anvusername'] = 'Der Benutzername für den Zugriff auf den Backen-Webservice.';
$string['auth_anvusername_key'] = 'URL Benutzername';
$string['auth_anvpassword'] = 'Das Passwort für den Zugriff auf den Backen-Webservice.';
$string['auth_anvpassword_key'] = 'URL Passwort';
$string['pluginname'] = 'ANV-Anmeldung';
