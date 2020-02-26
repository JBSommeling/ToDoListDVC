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
function createTask($list_id, $task_name, $duration, $is_done){
    $conn = ConnectToDatabase();

    $sql = 'INSERT INTO tasks(list_id, name, duration, is_done) VALUES ( :list_id, :name, :duration, :is_done)';
    $stmt = $conn->prepare($sql);
    $stmt->execute(['list_id' => $list_id, ':name' => $task_name, ':duration' => $duration, ':is_done' => $is_done]);
}

function updateTask($task_name, $duration, $is_done, $id){
    $conn = ConnectToDatabase();

    $sql = 'UPDATE tasks SET name = :name, duration = :duration, is_done = :is_done WHERE id = :id';
    $stmt = $conn->prepare($sql);
    $stmt->execute([':name' => $task_name, ':duration' => $duration, ':is_done' => $is_done, ':id' => $id]);
}

/* Function to delete tasks by id.
@param - $task_id = task_id of task*/
function deleteTask($task_id){
    $conn = ConnectToDatabase();

    $sql = 'DELETE FROM tasks WHERE id = :task_id';
    $stmt = $conn->prepare($sql);
    $stmt->execute(['task_id' => $task_id]);
}

/* Function to delete Tasks belonging to given Tasklist
@param - $list_id = list_id of tasklist*/
function deleteTasksBelongingToTasklist($list_id){
    $conn = ConnectToDatabase();

    $sql = 'DELETE FROM tasks WHERE list_id = :list_id';
    $stmt = $conn->prepare($sql);
    $stmt->execute(['list_id' => $list_id]);
}