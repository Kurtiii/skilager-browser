<?php

$_CONFIG['production'] = false; // Set to true to enable production mode
$_CONFIG['debug'] = true; // Set to true to enable debug mode

if ($_CONFIG['production']) {
    $_CONFIG['base_url'] = 'https://';
    $db_host = 'localhost';
    $db_name = '';
    $db_user = '';
    $db_password = '';
} else {
    $_CONFIG['base_url'] = 'http://localhost/';
    $db_host = 'localhost';
    $db_name = '';
    $db_user = 'root';
    $db_password = '';
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

$_PDO = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
