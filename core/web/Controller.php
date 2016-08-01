<?php

namespace core\web;

/**
 * Description of Controller
 *
 * @author Edgar Leite
 */
class Controller {

    protected function render($view = DEFAULT_CONTROLLER, $params = []) {
        $arrView = explode('/', $view);
        $mainContent = file_get_contents(ROOT . DS . 'app' . DS . 'views' . DS . 'main.php');
        $viewContent = file_get_contents(ROOT . DS . 'app' . DS . 'views' . DS . $arrView[0] . DS . $arrView[1] . '.php');

        if (count($params)) {
            foreach ($params as $key => $value) {
                $viewContent = str_replace('{{' . $key . '}}', $value, $viewContent);
            }
        }

        $buffer = str_replace('{{content}}', $viewContent, $mainContent);

        print($buffer);
        
        die();
    }

}
