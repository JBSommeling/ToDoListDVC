<?php

// Function to get the Tasklist-list from the database.
function getTasklists(){
    $conn = ConnectToDatabase();

    $sql = 'SELECT * FROM tasklists';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

function createTasklist($name){
    $conn = ConnectToDatabase();

    $sql = 'INSERT INTO tasklists(list_name) VALUES ( :list_name)';
    $stmt = $conn->prepare($sql);
    $stmt->execute([':list_name' => $name]);
}