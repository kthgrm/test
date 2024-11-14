<?php

    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', 'apartmentsystem');
    define('DB_NAME', 'test');

    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if(!$con){
        die("Connection Failed: " . mysqli_connect_error());
    }

?>