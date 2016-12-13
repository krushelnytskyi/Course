<?php

spl_autoload_register(function ($className) {
    $fileName = APP_PATH . str_replace('\\', '/' , $className) . '.php';

    if (true === file_exists($fileName)) {
        include_once $fileName;
    } else {
        trigger_error('Autoload error, while including class ' . $className, E_RECOVERABLE_ERROR);
    }
});