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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Checks if the form is empty.
        if (empty($_POST['task_duration'])) {
            $result['errors']['task_duration'] = 'Dit is een verplicht veld!';
            $result['validate']=  false;
        }
        else {
            $result['fields']['task_duration'] = formVal($_POST['task_duration']);
            $result['errors']['task_duration'] = '';
        }
}

if ($result['validate']) {
    createTask($_POST['list_id'],$result['fields']['task_name'], $result['fields']['task_duration'], $is_done);
    header('Location: ../../../index.php');
}
