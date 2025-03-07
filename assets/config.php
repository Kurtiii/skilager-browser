<?php

$_CONFIG['production'] = false; // Set to true to enable production mode
$_CONFIG['debug'] = true; // Set to true to enable debug mode

if ($_CONFIG['production']) {
    $_CONFIG['base_url'] = 'https://';
} else {
    $_CONFIG['base_url'] = 'http://localhost/skilager-browser/';
}

if ($_CONFIG['debug']) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(0);
}