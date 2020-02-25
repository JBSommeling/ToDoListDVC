<?php

// Function to get the Tasklist-list from the database.
function getTasklists(){
    $conn = ConnectToDatabase();

    $sql = 'SELECT * FROM tasklists';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

// Function to get the Tasklist-list with tasks belonging to Tasklist-list from database.
function getTasklistsAndTasks(){
    $conn = ConnectToDatabase();

    $sql = 'SELECT TL.list_id, TL.list_name, T.name, T.duration, T.is_done, T.id FROM tasklists as TL LEFT JOIN tasks as T ON TL.list_id = T.list_id';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

/* Function to get the Tasklist by Id.
@param - $id = the id of the to be fetched tasklist*/
function getTasklistById($id){
    $conn = ConnectToDatabase();

    $sql = 'SELECT * FROM tasklists WHERE list_id = :id';
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id' => $id]);
    return $stmt->fetch();
}

/* Function to create a Tasklist.
@param - name = new name of the to be created tasklist*/
function createTasklist($name){
    $conn = ConnectToDatabase();

    $sql = 'INSERT INTO tasklists(list_name) VALUES ( :list_name)';
    $stmt = $conn->prepare($sql);
    $stmt->execute([':list_name' => $name]);
}

/* Function to edit a tasklist
@param - id = id of the tasklist to be edited.
@param - name = new name of the to be edited tasklist*/
function updateTasklist($id, $name){
    $conn = ConnectToDatabase();

    $sql = 'UPDATE tasklists SET list_name = :name WHERE list_id = :id';
    $stmt = $conn->prepare($sql);
    $stmt->execute([":name" => $name, ":id" => $id]);
}

/* Function to delete a tasklist
@param - id = id of the tasklist to be deleted.*/
function deleteTasklist($id){
    $conn = ConnectToDatabase();

    $sql = 'DELETE FROM tasklists WHERE list_id = :id';
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id' => $id]);
}