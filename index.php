<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));

// Configurções
require_once(ROOT . DS . 'config' . DS . 'main.php');
require_once(ROOT . DS . 'core' . DS . 'App.php');

// Autoload
spl_autoload_register(
    function($className) {
        $className = str_replace('\\', DS, $className);
        require_once(ROOT . DS . $className . '.php');
    }
);

// Inicia
\core\App::run();
