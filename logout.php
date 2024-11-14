<?php
session_start();
unset($_SESSION['userName']);
unset($_SESSION['userType']);
header("location: index.html");