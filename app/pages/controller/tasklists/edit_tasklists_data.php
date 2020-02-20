<?php

$name = "";
$nameErr = "";
$validate = false;

$id = $_GET['id'];
$oldVal = getTasklistById($id);

$fields = array(
    'tasklist_name' => ''
);

$fieldErr = array(
    'tasklist_name' => ""
);

$result = checkFields($fields, $fieldErr);

if ($result['validate']) {
    editTasklist($id, $result['fields']['tasklist_name']);
    header('location: ../../../index.php');
}
