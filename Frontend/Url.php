<?php

namespace Frontend;

/**
 * Class Url
 * @package Frontend
 */
class Url
{

    public function dispatch()
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');

        $viewFile = APP_PATH  . 'Frontend/view/' . $url . '.phtml';

        ob_start();

        if (true === file_exists($viewFile)) {
            include_once $viewFile;
        } else {
            include_once APP_PATH . 'Frontend/view/404.phtml';
        }

        $content = ob_get_clean();

        include_once APP_PATH . 'Frontend/layout/layout.phtml';
    }

}