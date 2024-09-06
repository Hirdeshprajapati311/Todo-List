<?php

session_start();

$id = $_GET['id'];
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'mysql';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if(mysqli_connect_errno()){
    exit('Failed to connect to MySQL :'. mysqli_connect_error());
}

$sql = "DELETE FROM todolist WHERE id = '$id'";

if(mysqli_query($con, $sql)){
    echo "Record deleted successfully";
}else{
    echo "Error deleting record: " . mysqli_connect_error();
}

mysqli_close($con);

header("Location: http://localhost/ToDoList/");

?>