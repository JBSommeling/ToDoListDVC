<?php
define('ROOTPATH', str_replace('\app\pages\controller\tasklists', '', __DIR__));
require_once ROOTPATH.'/init.php';

$list_id = $_GET['list_id'];

deleteTasklist($list_id);

header('location: ../../../../index.php');
