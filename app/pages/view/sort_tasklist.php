<?php

define('ROOTPATH', str_replace('\app\pages\view', '', __DIR__));
require_once ROOTPATH.'/init.php';

$result = getTasklistsOrderedASC();
//var_dump($result);
sort($result);

$filtered_array = createArrayWithListsAndTasks($result);

var_dump($filtered_array);

// Na statement sort bij ASC eindigen met asort
// en rsort bij DESC eindigen met asort