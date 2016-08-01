<?php

namespace core\db;

use PDO;
use PDOException;

/**
 * Description of Model
 *
 * @author Edgar Leite
 */
class Model {

    protected $conn;

    public function __construct() {
        try {
            $this->conn = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
        } catch (PDOException $e) {
            print "Error: " . $e->getMessage() . "<br/>";
            print 'File: ' . __FILE__ . "<br/>";
            print 'Method: ' . __METHOD__ . "<br/>";
            die();
        }
    }

}
