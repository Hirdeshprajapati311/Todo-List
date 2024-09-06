<?php

session_start();

$id = $_GET['id'];
$_SESSION['id'] = $id;
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'mysql';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if(mysqli_connect_errno()){
    exit('failed to connect to MySQL: '. mysqli_connect_error());
    
}

$sql = "SELECT * FROM todolist where id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

while($row = $result->fetch_assoc()){

    
    $id = $row['id'];
    $task_description = $row['task_description'];
    $priority = $row['priority']; 
    $status = $row['status'];
}

?>

<!DOCTYPE html>
<html lang = "en">
    <head>
        <title>
            ToDoList
        </title>
        <meta charset = "utf-8">
        <meta name="viewport" content = "width=device-width, initial-scale=1.0"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <div class = "container-fluid">
            <h4>Edit Task</h4>
            <div class="row m-2">
            <form action = "updatetask.php" method = "POST">
                <div class = "input-group mb-3">
                <span class ="input-group-text">ID</span>
                <input type="number" class = "form-control" value = "<?php echo $id; ?>" name = "id" disabled>
                </div>
                <div class = "input-group mb-3">
                    <span class="input-group-text">Task Description</span>
                    <input type="text" class = "form-control" value = "<?php echo $task_description; ?>" name = "task_description">
                </div>
                <div class = "input-group mb-3">
                    <span class = "input-group-text">Priority</span>
                    <input type="number" class = "form-control" value = "<?php echo $priority; ?>" name = "priority">
                </div>
                <div class = "input-group mb-3">
                    <span class = "input-group-text">Status</span>
                    <select name="status" class="form-control" value = "<?php echo $status; ?>">
                    <option value="Not Started">Not Started</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Completed">Completed</option>
                </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
            </div>
        </div>
    </body>

</html>