<?php

namespace core;

use Exception;

/**
 * Description of App
 *
 * @author Edgar Leite
 */
class App {

    public static function run() {
        $uri = substr($_SERVER['REQUEST_URI'], 1, strlen($_SERVER['REQUEST_URI']));
        
        if (strlen($uri) === 0)
            $uri = DEFAULT_CONTROLLER;

        $arrUri = explode('/', $uri);

        if (count($arrUri) < 2) {
            $arrUri[1] = 'index';
        }

        $controller = '\\app\\controllers\\' . ucfirst($arrUri[0]) . 'Controller';
        $action = $arrUri[1] . 'Action';

        $class = new $controller;

        if (is_callable([$class, $action])) {
            $class->$action();
        } else {
            die('Está ação não é permitida.');
        }
    }

}
