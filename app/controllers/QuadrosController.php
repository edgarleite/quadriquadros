<?php

namespace app\controllers;

use core\web\Controller;
use app\helpers\Api;
use app\helpers\Quadro;

/**
 * Description of QuadroController
 *
 * @author Edgar Leite
 */
class QuadrosController extends Controller {

    public function indexAction() {
        if (isset($_POST['Quadros'])) {
            $params = $_POST['Quadros'];
            $code = $this->image($params);
            $params['code'] = $code;
            
            $this->render('quadros/recibo', $params);
        }

        $this->render('quadros/index');
    }

    protected function image($params) {
        $quadro = new Quadro;
        $quadro->color1 = $params['color1'];
        $quadro->color2 = $params['color2'];
        $quadro->cols = $params['cols'];
        $quadro->draw();
        $info = $quadro->getInfo();
        $info = array_merge($info, $params);

        return $this->api($info);
    }

    protected function api($info) {
        $api = new Api;
        $api->post($info);
        $response = $api->response();
        
        if (is_array($response)) {
            if (key_exists('code', $response)) {
                return $response['code'];
            }
        }
        
        return 'Código não informado!';
    }

}
