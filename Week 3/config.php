<?php
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'WAD_handson';
    $mysqli = "";

    $mysqli = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
?>