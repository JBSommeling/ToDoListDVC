<?php
include '../../../../init.php';

$id = $_GET['id'];

deleteTasklist($id);

header('location: ../../../../index.php');
