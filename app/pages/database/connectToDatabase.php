<?php

namespace app\pages\database;

use PDO;

class connectToDatabase {

    private $_servername;
    private $_username;
    private $_password;
    private $_dbName;

    public function __construct($servername, $username, $password, $dbName)
    {
        $this->_servername = $servername;
        $this->_username = $username;
        $this->_password = $password;
        $this->_dbName = $dbName;
    }

    public function connectToDatabase(){
        try {
            $conn = new PDO("mysql:host=$this->_servername;dbname=$this->_dbName", $this->_username, $this->_password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}