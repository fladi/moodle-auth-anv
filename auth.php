<?php

/**
 * @author Michael Fladischer <michael.fladischer@medunigraz.at>
 * @license http://www.gnu.org/copyleft/gpl.html GNU Public License
 * @package moodle multiauth
 *
 * Authentication Plugin: ANV Authentication
 *
 * Authenticates against an Austrian ANV webpage.
 *
 * 2013-02-07  File created.
 */

if (!defined('MOODLE_INTERNAL')) {
    die('Direct access to this script is forbidden.');    ///  It must be included from a Moodle page
}

require_once($CFG->libdir.'/authlib.php');

/**
 * ANV authentication plugin.
 */
class auth_plugin_anv extends auth_plugin_base {

    /**
     * Constructor.
     */
    function auth_plugin_anv() {
        $this->authtype = 'anv';
        $this->config = get_config('auth/anv');
        $this->config->field_updatelocal_email = false;
        $this->config->field_updatelocal_lastname = false;
        $this->config->field_updatelocal_firstname = false;
        $this->config->field_updatelocal_city = false;
        $this->config->field_updatelocal_country = false;
    }

    /**
     * Returns true if the username and password work and false if they are
     * wrong or don't exist.
     *
     * @param string $username The username (with system magic quotes)
     * @param string $password The password (with system magic quotes)
     * @return bool Authentication success or failure.
     */
    function user_login ($username, $password) {
        if (! function_exists('curl_init')) {
            print_error('auth_anvnotinstalled','mnet');
            return false;
        }
        $ch = curl_init();
        $url = str_replace(array('{username}', '{password}'), array($username, md5($password)), $this->config->url);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, "{$this->config->username}:{$this->config->password}");
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_exec($ch);
        if (curl_errno($ch) > 0) {
            return false;
        }
        return true;
    }

    function prevent_local_passwords() {
        return true;
    }

    /**
     * Read user information from external database and returns it as array.
     *
     * @param string $username The username (with system magic quotes)
     * @return array
     */
    function get_userinfo($username) {
        return array(
            'email' => "{$username}@anv.medunigraz.at",
            'lastname' => 'ANV',
            'firstname' => $username,
            'city' => 'Graz',
            'country' => 'AT'
        );
    }

    /**
     * Returns true if this authentication plugin is 'internal'.
     *
     * @return bool
     */
    function is_internal() {
        return false;
    }

    /**
     * Returns true if this authentication plugin can change the user's
     * password.
     *
     * @return bool
     */
    function can_change_password() {
        return false;
    }

    /**
     * Prints a form for configuring this authentication plugin.
     *
     * This function is called from admin/auth.php, and outputs a full page with
     * a form for configuring this plugin.
     *
     * @param array $page An object containing all the data for this page.
     */
    function config_form($config, $err, $user_fields) {
        global $OUTPUT;

        include "config.html";
    }

    /**
     * Processes and stores configuration data for this authentication plugin.
     */
    function process_config($config) {
        // set to defaults if undefined
        if (!isset ($config->url)) {
            $config->url = 'https://medizinstudieren.at/2013/graz/ldap.php?BNR={username}&MD5={password}';
        }
        if (!isset ($config->username)) {
            $config->username = 'graz';
        }
        if (!isset ($config->password)) {
            $config->password = 'password';
        }

        // save settings
        set_config('url', $config->url, 'auth/anv');
        set_config('username', $config->username, 'auth/anv');
        set_config('password', $config->password, 'auth/anv');

        return true;
    }

}

