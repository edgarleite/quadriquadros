<?php

namespace app\helpers;

use core\web\Curl;

/**
 * Description of Api
 *
 * @author Edgar Leite
 */
class Api {
    
    protected $response;

    public function post($params) {
        $curl = new Curl;
        $curl->post('http://print-n-frame.unilogic.com.br:50987', $this->formatParams($params));
        $this->response = $curl->exec();
    }

    public function response() {
        return json_decode($this->response, true);
    }

    protected function formatParams($params) {
        return [
            'developer' => 'Edgar Leite',
            'customer' => $params['customer'],
            'width' => $params['width'],
            'height' => $params['height'],
            'file' => $params['file'],
            'bytes' => $params['size'],
            'md5' => md5($params['file']),
            'hash' => $this->generateHash($params['color1'], $params['color2']),
        ];
    }

    protected function generateHash($color1, $color2) {
        return str_replace('#', '', $color1) . '-' . str_replace('#', '', $color2) . '-' . $this->invertColor($color1) . '-' . $this->invertColor($color2);
    }

    protected function invertColor($color) {
        $color = str_replace('#', '', $color);

        $rgb = '';
        for ($i = 0; $i < 3; $i++) {
            $inv = 255 - hexdec(substr($color, (2 * $i), 2));
            $inv = ($inv < 0) ? 0 : dechex($inv);
            $rgb .= (strlen($inv) < 2) ? '0' . $inv : $inv;
        }

        return $rgb;
    }

}
