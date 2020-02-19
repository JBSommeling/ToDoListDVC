<?php

$name = "";
$nameErr = "";
$validate = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $validate = true;
    if (empty($_POST['tasklist_name'])) {
        $nameErr = 'Dit is een verplicht veld!';
        $validate = false;
    }
    else{
        $name = formVal($_POST['tasklist_name']);
        if (!preg_match("/^[a-zA-Z- ]*$/",$name)) {
            $nameErr = 'Alleen letters zijn toegestaan.';
            $name = "";
            $validate = false;
        }
    }
}

function formVal($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($validate) {
    createTasklist($name);
    header('location: ../../../index.php');
}