<?php

//include 'app/pages/database/connectToDatabase.php';
spl_autoload_register(function ($class_name){
    require $class_name.'.php';
});

use app\pages\database\connectToDatabase;

$connect = new connectToDatabase('localhost','root', "", 'todolist_dvc');
$connect->connectToDatabase();