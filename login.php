<?php
    if(!isset($_SESSION)){
        session_start();
    }

    include_once("connection/connection.php");
    $con = connect();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/css/login.css">
    <link rel="icon" type="image/png" href="./asset/Estrella.png">
    <title>Estrella Apartment</title>
</head>
<body>
    <div class="container">
        <div class="container-image">
            <img src="./asset/image/cozy.jpg">
        </div>

        <div class="container-content">
            <div class="brand">
                <img src="./asset/image/Estrella2.png" alt="Estrella Apartment logo" class="logo">
                <h1>Estrella Apartment</h1>
            </div>
            <div class="content-form">
                <form action="" method="post">
                    <label for="username">Username</label><br>
                    <input type="text" id="username" name="username" required>
                    <br>
                    <label for="password">Password</label><br>
                    <input type="password" id="password" name="password" required>
                    <br>
                    <button type="submit" name="login">Login</button>
                </form>
                <?php
                    if(isset($_POST['login'])){
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                
                        $sql = "SELECT * FROM user WHERE userName='$username' AND userPassword='$password'";
                        try {
                            $result = $con->query($sql);
                            $row = $result->fetch(PDO::FETCH_ASSOC);
                            $count = $result->rowCount();
                            if($count == 1){
                                $_SESSION['userName'] = $row['userName'];
                                $_SESSION['userID'] = $row['userID'];
                                header("location: dashboard.php");
                            }else{
                ?>
                <p class="incorrect-pass">Incorrect username or password.</p>
                <?php
                            }
                        } catch (PDOException $e) {
                            echo "ERROR: Could not able to execute $sql. " . $e->getMessage();
                        }
                    }
                ?>

                <p class="forgot">Forgot password?</p>
            </div>
            <a href="index.html" class="back">Back to home</a>
        </div>
    </div>
    
</body>
</html>