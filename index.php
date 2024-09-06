<?php

session_start();


$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'mysql';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if(mysqli_connect_errno()){
    exit('failed to connect to MySQL: '. mysqli_connect_error());
    
}

    $sql = "SELECT*FROM todolist";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang = "en">
    <head>
        <title>ToDoList</title>
        <meta charset = "utf-8">
        <meta name="viewport" content = "width=device-width, initial-scale=1.0"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    </head>
    <body>
        <div class = "container-fluid">
            <h4>To Do List</h4>
            <div class = "row m-2">
            <form action="addnewtask.php" method= "POST">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Task Description</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($row = $result->fetch_assoc()) {  
                        echo "<tr><td>".$row['id']."</td><td>".$row['task_description']."</td><td>".$row['priority']."</td><td>".$row['status']."</td><td><a href = 'http://localhost/ToDoList/edittask.php?id=".$row['id']."'>Edit</a> | <a href ='http://localhost/ToDoList/deletetask.php?id=".$row['id']."'>Delete</a></td></tr>";
                    }
                    ?>
                    <tr><td></td><td><input class = "form-control"  name= "task_description" placeholder = "Task Description" type="text"></td><td><input class = "form-control" placeholder = "Priority" name = "priority" type="number"></td><td><input class = "form-control" placeholder="Status" name="status" type="text"></td><td><button type="submit" class = "btn btn-primary">Add Task</button></td></tr>
                </tbody>
            </table>
            </form>
            </div>
        </div>

    </body>
</html>