<?php
    $dbserver="localhost";
    $dbuser="root";
    $dbpassword="123456789";
    $db="scan2557";
    $conn=new mysqli($dbserver, $dbuser, $dbpassword, $db);
    if($conn->connect_error){
        die("Connection failed: ".$conn->connect_error);
    }
    $conn->query("SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci");
    $conn->query("SET NAME UTF8");
    $conn->query("SET character_set_results=utf8");
    $conn->query("SET character_set_client=utf8");
    $conn->query("SET character_set_connection=utf8");
?>
