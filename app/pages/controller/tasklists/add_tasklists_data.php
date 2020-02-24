<?php

$validate = false;

$fields = array(
    'tasklist_name' => ''
);

$fieldErr = array(
    'tasklist_name' => ""
);

$result = checkFields($fields, $fieldErr);

if ($result['validate']) {
    createTasklist($result['fields']['tasklist_name']);
    header('location: ../../../index.php');
}

