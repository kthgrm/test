<?php

    session_start();
    require 'dbcon.php';

    function validate($inputData){
        global $con;
        return mysqli_real_escape_string($con, $inputData);
    }

    function redirect($location,$status){
        $_SESSION['status'] = $status;
        header("location: $location");
        exit(0);
    }

    function alertMessage() {
        if(isset($_SESSION['status'])){
            echo '<div class="alert alert-success">
                <h4>'.$_SESSION['status'].'</>
            </div>';
            unset($_SESSION['status']);
        }
    }

    function alertSuccess() {
        if(isset($_SESSION['status'])){
            echo '<div class="alert alert-success">
                <h4>'.$_SESSION['status'].'</>
            </div>';
            unset($_SESSION['status']);
        }
    }

    function alertError() {
        if(isset($_SESSION['status'])){
            echo '<div class="alert alert-danger">
                <h4>'.$_SESSION['status'].'</>
            </div>';
            unset($_SESSION['status']);
        }
    }

    function fetchAll($tableName){
        global $con;
        $table = validate($tableName);
        $query = "SELECT * FROM $table";
        $result = mysqli_query($con, $query);
        return $result;
    }
?>