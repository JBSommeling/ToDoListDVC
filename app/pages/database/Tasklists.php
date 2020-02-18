<?php

namespace app\pages\database;


class Tasklists extends ConnectToDatabase{
    private $_task;

    public function __construct($servername, $username, $password, $dbName)
     {
      parent::__construct($servername, $username, $password, $dbName);
    }

    //Method to get an array of the tasklist-table.
    public function getTaskList(){
        $stmt = $this->connect->prepare("SELECT * FROM tasklists");
        $stmt->execute();
        $this->_task = $stmt->fetchAll();
        return $this->_task;
    }
}