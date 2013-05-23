# moodle-auth-anv

Moodle 2.x authentication plugin for the admission procedure used by the Austrian medical universities. It uses HTTP response codes to determine if a set of
credentials is valid. HTTP 200 grants access, any other code is considered as a failed login. The password is transmitted as a MD5 hash, but since this is
already too weak to provide any substantial security, the use of HTTPS for the communication with the ANV server is highly recommended!

## Requirements
* Moodle (>= 2.4)
* php-curl

## Installation

The recommended way to install this plugin is through `git submodules`. In the root of your moodle code tree run the following:

    git submodule add git://github.com/fladi/moodle-auth-anv.git auth/anv
    git add auth/anv
    git commit -m "Add ANV authentication plugin."

See [Chapter 6.6 Git Tools - Submodules](http://git-scm.com/book/en/Git-Tools-Submodules) for further information on how to handle submodules.

## Configuration

Once the plguin has been installed, you should log in to your Moodle installation as an administrator to trigger an update of the translations.

You can enable the ANV plugin through "Site administration" -> "Plugins" -> "Authentication" -> "Manage authentication" where you can find the plugin with the
name "ANV authentication".

There are several settings to be considered before the plugin can be used:

### URL template
This value is the URL where the central ANV server will answer requests for authentication. It must include two placeholders, *{username}* which will be
replaced by the plaintext username provided through the login form and *{password}* which will be replaced by the MD5 hash of the password from the login form.

The URL should look like this:

    https://example.org/myuniversity/anv.php?ID={username}&MD5={password}

### URL username
If the URL template requires [HTTP basic authentication](https://www.ietf.org/rfc/rfc2617), this filed should contain the username necessary to access the URL.

### URL password
The same as with URL username, contains the matching password for HTTP basic authentication.

## Credits
Created by DI Michael Fladischer <michael.fladischer@medunigraz.at>, licensed under BSD license.
