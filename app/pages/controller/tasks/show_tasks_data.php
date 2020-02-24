<?php
$list_id = $_GET['list_id'];

$tasklist = getTasklists();
$tasks = getTasksByListId($list_id);
$count_lists = 1;
$count_tasks = 1;




