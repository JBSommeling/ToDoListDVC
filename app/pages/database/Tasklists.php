<?php

namespace app\pages\database;

use app\pages\database\connectToDatabase;

class tasks {

    public function __construct()
    {
        $connectToDatabase = new connectToDatabase('localhost','root', "", 'todolist_dvc');
    }

    public function getTaskList
}