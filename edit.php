<?php

include("db.php");
include("include/header.php");
if(!isset($_SESSION) && $result){
    session_start();
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM tasks WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    ?>
    <div class="container">
        <div class="card w-50 p-2">
                <div class="card_body">
                    <h5 class="card-title">Edit Task</h5>
                        <form action="edit.php" method="POST">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="<?= $row['name'] ?>">
                            </div>
                            <div class="form-group">
                                <textarea name="description" rows="2" class="form-control" placeholder="<?= $row['description'] ?>"></textarea>
                            </div>
                            <input type="hidden" name="id" value="<?= $row['id']?>">
                            <div class="form-group">
                                <input type="submit" value="update task" class="w-100 btn btn-success">
                            </div>
                        </form>
                </div>
        </div>
    </div>
    
    <?php
}else if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    if($name == "" || $description == ""){
        $_SESSION['message'] = "Don't update the task";
        $_SESSION['msgColor'] = "warning";
        return header("location: index.php");
    }

    $query = sprintf("UPDATE tasks SET name = '%s', description = '%s' WHERE id = '%s'",$name,$description,$id);
    $result = mysqli_query($conn,$query);
    $_SESSION['message'] = "Task was updated";
    $_SESSION['msgColor'] = "info";
    header("location: index.php");
}

include("include/footer.php");
?>