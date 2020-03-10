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

/* Function to trim, strip and convert to htmlspecialchars the $data variable.
@param - data = the data to be stripped, trimmed and converted*/
function formVal($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/* Function to parse an array from database input. This creates a tasklist with tasks.
@param - $arrayFromDatabase = the array fetched from database.*/
function createArrayWithListsAndTasks($arrayFromDatabase)
{
    $filtered_array = array();

    foreach ($arrayFromDatabase as $row) {

        // Initiate record if it is not already initiated, to avoid duplicates.
        if (!isset($filtered_array[$row['list_id']])) {
            $filtered_array[$row['list_id']] = array(
                'list_id' => $row['list_id'],
                'list_name' => $row['list_name'],
                'tasks' => array()
            );
        }

        /* Add tasks to initiated array.
        Within 'tasks' array, another array is added*/
        $filtered_array[$row['list_id']]['tasks'][] = array(
            'task_id' => $row['id'],
            'task_name' => $row['name'],
            'duration' => $row['duration'],
            'is_done' => $row['is_done']
        );
    }

    // To remove list_id from $filtered_array key names.
    $filtered_array = array_values($filtered_array);

    /* To sort created and filtered array by value so that there will always be a certain order in the array.
    This is very useful when ordering by status.
    asort - to sort associative arrays in ascending order, according to the value*/
    asort($filtered_array);

    return $filtered_array;
}