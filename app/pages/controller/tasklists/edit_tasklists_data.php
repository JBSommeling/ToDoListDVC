<?php

$name = "";
$nameErr = "";
$validate = false;

$list_id = $_GET['list_id'];
$oldVal = getTasklistById($list_id);

$fields = array(
    'tasklist_name' => ''
);

$fieldErr = array(
    'tasklist_name' => ""
);

$result = checkFields($fields, $fieldErr);

if ($result['validate']) {
    editTasklist($list_id, $result['fields']['tasklist_name']);
    header('location: ../../../index.php');
}
