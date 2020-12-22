<?php
    define("DB_NAME", "localhost");
    define("DB_USER", "root");
    define("DB_PASSSWORD", "");
    define("DB_BASE", "todo");

    $conn = mysqli_connect(DB_NAME, DB_USER, DB_PASSSWORD, DB_BASE);

    if(!$conn){
        die("No connection" . mysqli_error($conn));
    }
?>