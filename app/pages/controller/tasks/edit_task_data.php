<?php
// Tests if task_id exists within either $_GET or $_POST to avoid errors.
if (isset($_GET['task_id'])){
    $task_id = $_GET['task_id'];
}
else if (isset($_POST['task_id'])){
    $task_id = $_POST['task_id'];
}

$task = getTask($task_id);

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
    updateTask($result['fields']['task_name'], $result['fields']['task_duration'], $is_done, $task_id);
    header('Location: ../../../index.php');
}