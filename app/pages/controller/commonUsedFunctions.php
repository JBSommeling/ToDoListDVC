<?php

/* Function to check fields for empty content and/or wrong use of characters
@param - $fieldsArr = array of fields to be validated.
@param - errorArr = array of errors from the to be validated fields*/
function checkFields($fieldsArr, $errorArr) {
    /* If form method equals POST:*/
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        foreach ($fieldsArr as $key => $value) {
            $validate = true;
            // Checks if the form is empty.
            if (empty($_POST[$key])) {
                $errorArr[$key] = 'Dit is een verplicht veld!';
                $validate = false;
            } // Checks if only letters are used.
            else {
                $fieldsArr[$key] = formVal($_POST[$key]);

                if (!preg_match("/^[a-zA-Z- ]*$/", $fieldsArr[$key])) {
                    $errorArr[$key] = 'Alleen letters zijn toegestaan.';
                    $fieldsArr[$key] = "";
                    $validate = false;
                }
            }
        }
        return array('fields' =>$fieldsArr, 'errors' => $errorArr, 'validate' => $validate);
    }
}

// Function to trim, strip and convert to htmlspecialchars the $data variable.
function formVal($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}