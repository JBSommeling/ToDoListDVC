<?php
define('ROOTPATH', str_replace('\app\pages\controller\tasks', '', __DIR__));
require_once ROOTPATH.'/init.php';

$task_id = $_GET['task_id'];

deleteTask($task_id);

header('location: ../../../../index.php');