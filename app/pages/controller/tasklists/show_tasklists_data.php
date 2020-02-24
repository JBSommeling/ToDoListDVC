<?php
$count = 1;

$tasklistWithTasks = getTasklistsAndTasks();

$filtered_array = array();

foreach ($tasklistWithTasks as $row){

    // Initiate record if is not already initiated
    if (!isset($filtered_array[ $row['list_id'] ])){
        $filtered_array[ $row['list_id'] ] = array(
            'list_id'   => $row['list_id'],
            'list_name' => $row['list_name'],
            'tasks'     => array()
        );
    }

    // Add tasks
    $filtered_array[ $row['list_id'] ]['tasks'][] = array(
        'task_id'    => $row['id'],
        'task_name'  => $row['name'],
        'duration'   => $row['duration'],
        'is_done'   => $row['is_done']
    );
}

// To remove list_id from $filtered_array key names.
$filtered_array = array_values($filtered_array);
