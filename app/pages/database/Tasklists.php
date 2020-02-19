<?php

// Function to get the Tasklist-list from the database.
function getTasklists(){
    $conn = ConnectToDatabase();

    $sql = 'SELECT * FROM tasklists';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

function getTasklistById($id){
    $conn = ConnectToDatabase();

    $sql = 'SELECT * FROM tasklists WHERE list_id = :id';
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id' => $id]);
    return $stmt->fetch();
}

function createTasklist($name){
    $conn = ConnectToDatabase();

    $sql = 'INSERT INTO tasklists(list_name) VALUES ( :list_name)';
    $stmt = $conn->prepare($sql);
    $stmt->execute([':list_name' => $name]);
}

function editTasklist($id, $name){
    $conn = ConnectToDatabase();

    $sql = 'UPDATE tasklists SET list_name = :name WHERE list_id = :id';
    $stmt = $conn->prepare($sql);
    $stmt->execute([":name" => $name, ":id" => $id]);
}