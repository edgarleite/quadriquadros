<?php

namespace core\web;

/**
 * Description of Curl
 *
 * @author Edgar Leite
 */
class Curl {

    private $ch;
    private $result;

    public function __construct() {
        $this->ch = curl_init();
    }

    public function post($url, $params = []) {
        curl_setopt($this->ch, CURLOPT_URL, $url);
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->ch, CURLOPT_POST, count($params));
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, $this->parseParams($params));
    }

    public function exec() {
        return curl_exec($this->ch);
    }

    public function __destruct() {
        curl_close($this->ch);
    }

    protected function parseParams($params = []) {
        $fields = '';

        foreach ($params as $key => $value) {
            $fields .= $key . '=' . $value . '&';
        }

        return urlencode(rtrim($fields, '&'));
    }

}
