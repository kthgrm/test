<?php

    require './config/function.php';

    if(isset($_POST['login'])){
        $username = validate($_POST['username']);
        $password = validate($_POST['password']);
        
        $query = "SELECT * FROM user WHERE userName = '$username' AND password = '$password'";
        $result = mysqli_query($con, $query);
        if($result && mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['userName'] = $row['userName'];
            $_SESSION['userID'] = $row['id'];
            $_SESSION['userType'] = $row['type'];
            if($row['type'] == 'admin'){
                header("location: ./admin/admin.php");
            }else{
                header("location: ./user/user.php");
            }
        }else{
            redirect("login.php", "Incorrect Username or Password.");
        }
        
    }
?>