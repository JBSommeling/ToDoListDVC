<?php

function getTasklists(){
    $conn = ConnectToDatabase();

    $sql = 'SELECT * FROM tasklists';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}