<?php

$name = "";
$nameErr = "";
$validate = false;

/* If form method equals POST:*/
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $validate = true;
    // Checks if the form is empty.
    if (empty($_POST['tasklist_name'])) {
        $nameErr = 'Dit is een verplicht veld!';
        $validate = false;
    }
    // Checks if only letters are used.
    else{
        $name = formVal($_POST['tasklist_name']);
        if (!preg_match("/^[a-zA-Z- ]*$/",$name)) {
            $nameErr = 'Alleen letters zijn toegestaan.';
            $name = "";
            $validate = false;
        }
    }
}


// Function to trim, strip and convert to htmlspecialchars the $data variable.
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

