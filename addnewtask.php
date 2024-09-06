<?php

session_start();

$task_description = $_POST['task_description'];
$priority = $_POST['priority'];
$status = $_POST['status'];

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'mysql';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if(mysqli_connect_errno()){
    exit('Failed to connect to MySQL: '. mysqli_connect_error());
}

if($stmt = $con->prepare('INSERT INTO todolist (task_description, priority, status) VALUES (?,?,?)')){
    $stmt->bind_param('sis', $task_description, $priority, $status);
    $stmt->execute();
}

header("Location: http://localhost/ToDoList/");

?>