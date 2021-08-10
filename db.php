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

    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

    $server = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $db = substr($url["path"], 1);
    try {
        $conn = mysqli_connect($server,$username,$password,$db);
    } catch (Exception $e) {
        echo "error en conexión";
    }
    

?>