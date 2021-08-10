<!DOCTYPE html>
<?php
    require 'vendor/autoload.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task App</title>
    <?php
        include("include/header.php");
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <?php
                    if(isset($_SESSION["message"])){
                ?>
                            <div class="alert alert-<?php echo $_SESSION['msgColor'] ?> alert-dismissible fade show" role="alert">  
                                <?php
                                    if($_SESSION['msgColor'] == "warning"){
                                        ?><strong>Ups!</strong><?php
                                    }else{
                                        ?><strong>Congratulation</strong><?php
                                    }
                                ?>
                                <?php echo $_SESSION["message"]?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                <?php 
                unset($_SESSION['message']);
                unset($_SESSION['msgColor']);
                }?>
            
                <div class="card p-2">
                    <div class="card_body">
                    <h5 class="card-title">New Task</h5>
                        <form action="create_task.php" method="POST">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="insert your task">
                            </div>
                            <div class="form-group">
                                <textarea name="description" rows="2" class="form-control" placeholder="insert a description"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="add task" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Created at</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include_once("db.php");

                        if (mysqli_connect_error()) {
                            
                        } else {
                            $query = "SELECT * FROM tasks";
                            $result = mysqli_query($conn,$query);
                            
                            while ($row = $result->fetch_array()) {
                                $rows[] = $row;
                            }

                            foreach ($rows as $row) {
                            
                                ?>
                                    <tr>
                                        <td><?= $row['name'] ?></td>
                                        <td><?= $row['description'];?></td>
                                        <td><?= $row['created_at'];?></td>
                                        <td>
                                            <a href="edit.php/?id=<?= $row['id']; ?>" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="delete_task.php/?id=<?= $row['id']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php
                            }

                        }
                            
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php
        include("include/footer.php");
    ?>

</html>