<?php

require_once 'vendor/autoload.php';
require_once 'assets/config.php';

$_ROUTER = new \Bramus\Router\Router();

$_ROUTER->get('/', function () {
    global $_CONFIG;
    require_once 'views/index.view.php';
});

$_ROUTER->run();
