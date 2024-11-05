<?php

    function connect(){
        $host = "localhost";
        $username = "root";
        $password = "apartmentsystem";
        $database = "test";

        try {
            $con = new PDO("mysql:host=$host;dbname=$database", $username, $password);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $con;
        } catch (PDOException $e) {
            return "ERROR: Could not connect. " . $e->getMessage();
        }
    }