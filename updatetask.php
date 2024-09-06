<?php

session_start();

$id = $_SESSION['id'];
$task_description = $_POST['task_description'];
$priority = $_POST['priority'];
$status = $_POST['status'];

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'mysql';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if(mysqli_connect_errno()){
    exit('failed to connect to MySQL: '. mysqli_connect_error());
    
}

$sql = "UPDATE todolist SET task_description = '$task_description', priority = '$priority', status = '$status' WHERE id = $id";
if(mysqli_query($con, $sql)){
    echo "Task Updated <br>";
}
else{
    echo "Some Error Occured";
}

echo "<a href='http://localhost/ToDoList/'>Click here to Go Back to List</a>";
?>