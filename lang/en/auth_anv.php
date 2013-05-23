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

$string['auth_anvdescription'] = 'This method uses the ANV register provided by the medical universities of Austria to check whether a given username and password is valid.';
$string['auth_anvnotinstalled'] = 'Cannot use ANV authentication. The PHP curl module is not installed.';
$string['auth_anvurl'] = 'The URL template which is queried in order to autheticate users. The placeholders {username} and {password} have to be included somewhere in the URL and will be replaced with the user credentials during the authentication process.';
$string['auth_anvurl_key'] = 'URL template';
$string['auth_anvusername'] = 'The username used to gain access to the backend webservice.';
$string['auth_anvusername_key'] = 'URL Username';
$string['auth_anvpassword'] = 'The password used to gain access to the backend webservice.';
$string['auth_anvpassword_key'] = 'URL password';
$string['pluginname'] = 'ANV authentication';
