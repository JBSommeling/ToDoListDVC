<?php

// Function to connect to Database.
function connectToDatabase(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "todolist_dvc";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
    return $conn;
}