<?php

namespace app\pages;

use app\pages\database\Tasklists;

class Pages {
    private $_tasklist;

    public function __construct($servername, $username, $password, $dbName)
    {
        $this->_tasklist = new Tasklists($servername, $username, $password, $dbName);
    }

    public function index() {
        return $this->_tasklist->getTaskList();
    }

}
