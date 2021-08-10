<?php

include("db.php");

if(isset($_POST['name']) && isset($_POST['description'])){
    $name = $_POST['name'];
    $description = $_POST['description'];

    $query = sprintf("INSERT INTO tasks (name, description) values ('%s','%s')", $name,$description);
    mysqli_query($conn,$query);

    if(!isset($_SESSION)){
        session_start();
        $_SESSION['message'] = "Your task Added successfully!";
        $_SESSION['msgColor'] = "success";
        header("location: index.php");    
    }else{
        header("location: index.php");
    }
    

}

?>