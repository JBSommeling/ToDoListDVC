<?php

/* Function to get tasks belonging to Tasklists
@param - list_id = list id of tasklist */
function getTasksByListId($list_id){
    $conn = ConnectToDatabase();

    $sql = 'SELECT * FROM tasks WHERE list_id = :list_id';
    $stmt = $conn->prepare($sql);
    $stmt->execute([':list_id' => $list_id]);
    return $stmt->fetchAll();
}

/* Function to get task belonging to Tasklists
@param - id = id of task */
function getTask($id){
    $conn = ConnectToDatabase();

    $sql = 'SELECT * FROM tasks WHERE id = :id';
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id' => $id]);
    return $stmt->fetch();
}

/* Function to create Task belonging to given Tasklist
@param - $list_id = list_id of tasklist.
@param - $task_name = name of task.
@param - $is_done = whether task is completed or not.*/
function createTask($list_id, $task_name, $is_done){
    $conn = ConnectToDatabase();

    $sql = 'INSERT INTO tasks(list_id, name, is_done) VALUES ( :list_id, :name, :is_done)';
    $stmt = $conn->prepare($sql);
    $stmt->execute(['list_id' => $list_id, ':name' => $task_name, ':is_done' => $is_done]);
}