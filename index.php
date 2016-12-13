<?php

session_start();

define('APP_PATH', __DIR__ . '/');

include_once 'Backend/autoloader.php';

$url = new \Frontend\Url();
$url->dispatch();