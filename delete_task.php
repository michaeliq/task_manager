<?php

include("db.php");
$id = $_GET['id'];
$query = sprintf("DELETE FROM tasks WHERE id = '%s'",$id);
$result = mysqli_query($conn,$query);


if(!isset($_SESSION)){
    session_start();
    $_SESSION['message'] = "Task was deleted";
    $_SESSION['msgColor'] = "danger";
}else{
    $_SESSION['message'] = "Task was deleted";
    $_SESSION['msgColor'] = "danger";
}
header("location: /crud_php/");
?>