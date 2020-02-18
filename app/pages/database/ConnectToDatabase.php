<?php

namespace app\pages\database;

use PDO;
use app\pages\database\Tasklists;

class ConnectToDatabase {
    private $_servername;
    private $_username;
    private $_password;
    private $_dbName;
    protected $connect;

    public function __construct($servername, $username, $password, $dbName)
    {
        $this->_servername = $servername;
        $this->_username = $username;
        $this->_password = $password;
        $this->_dbName = $dbName;
        // To make the method self-invoking when instantiating class.
        $this->connect = $this->connectToDatabase();
    }

    /*Method to connect to database*/
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

        return $conn;
    }
}