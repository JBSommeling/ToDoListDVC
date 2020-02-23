<?php

/* Function to get tasks belonging to Tasklists
@param - id = id of tasklist */
function getTasks($id){
    $conn = ConnectToDatabase();

    $sql = 'SELECT * FROM tasks WHERE list_id = :id';
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id' => $id]);
    return $stmt->fetchAll();
}