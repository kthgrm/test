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
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_SESSION['userName'])){
            echo "Welcome " . $_SESSION['userName'];
    ?>

    <br>
    <a href="logout.php">Logout</a>

    <?php } else { 
            header("location: index.html");
        }
    ?>
</body>
</html>