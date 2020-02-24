<?php

// Tests if list_id exists within either $_GET or $_POST to avoid errors.
if (isset($_GET['list_id'])){
    $list_id = $_GET['list_id'];
}
else if (isset($_POST['list_id'])){
    $list_id = $_POST['list_id'];
}

// Tests if task_check is checked.
if (isset($_POST['task_check'])){
    $is_done = 1;
}
else{
    $is_done = 0;
}

$validate = false;

$fields = array(
    'task_name' => '',
);

$fieldErr = array(
    'task_name' => ""
);

$result = checkFields($fields, $fieldErr);

if ($result['validate']) {
    createTask($_POST['list_id'],$result['fields']['task_name'], $is_done);
    header('Location: show_tasks.php?list_id='.$_POST['list_id']);
}
