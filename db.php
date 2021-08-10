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
    try {
        $conn = mysqli_connect(
            $host = "localhost",
            $username = "root",
            $password = "",
            $db = "crud"
        );
    } catch (Exception $e) {
        echo $buffer;
    }
    

?>