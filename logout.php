<?php
session_start();
unset($_SESSION['userName']);
unset($_SESSION['userID']);
header("location: index.html");