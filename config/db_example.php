<?php
    //Enter DB info and rename "db.php" this file for mySQL connection.
    $dbHost = "";
    $dbName = "";
    $dbUser =  "";
    $dbPass = "";
    try 
    {
        $db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
        $db->query("SET NAMES UTF8");
    } 
    catch ( PDOException $e ){
        print $e->getMessage();
    }
?>