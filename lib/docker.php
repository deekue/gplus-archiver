<?php
/*
 * constants.php
 *
 * Define constants for the app.
 *
 */

/*
 * Google API
 */

# If using API key...
if(!defined('GAPI_API_KEY') && getenv('GAPI_API_KEY')) {
    define('GAPI_API_KEY', getenv('GAPI_API_KEY'));
}

# If using OAUTH
if(!defined('GAPI_CLIENT_ID') && getenv('GAPI_CLIENT_ID')) {
    define('GAPI_CLIENT_ID', getenv('GAPI_CLIENT_ID'));
}
if(!defined('GAPI_CLIENT_SECRET') && getenv('GAPI_CLIENT_SECRET')) {
    define('GAPI_CLIENT_SECRET', getenv('GAPI_CLIENT_SECRET'));
}

/*
 * Other settings
 */
if(!defined('ARCHIVE_DIRECTORY') && getenv('ARCHIVE_DIRECTORY')) {
    define('ARCHIVE_DIRECTORY', getenv('ARCHIVE_DIRECTORY'));
}

if(!defined('TIMEOUT_MINUTES') && getenv('TIMEOUT_MINUTES')) {
  define('TIMEOUT_MINUTES', getenv('TIMEOUT_MINUTES'));
}
