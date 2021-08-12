<?php 

    mysqli_report(MYSQLI_REPORT_STRICT);

    ob_start();
?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Connection Issues!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

<?php

    $buffer = ob_get_contents();

    ob_end_clean();


    $hostname="us-cdbr-east-04.cleardb.com";
    $username="b8f09b67c29dc8";
    $password="394e1ac8";
    $database="heroku_a75d4c0bb9904be";

    try {
        $conn = mysqli_connect($hostname,$username,$password,$database);
    } catch (Exception $e) {
        echo "error en conexión";
    }
    

?>