<?php

// DB Params
require_once 'dbCredentials.php';

// App root
define('APPROOT', dirname(dirname(__FILE__)));

// URL root
define('URLROOT', 'http://localhost/projects/php/samsara');

// Site name
define('SITENAME', 'Samsara');

// Get current page name
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
define('CURPAGE', end($components));
