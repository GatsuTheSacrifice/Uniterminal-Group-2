<?php

$host = "localhost";
$dbname = "Uniterminal";
$dbusername = "root";
$dbpassword = "KellyPielago0904_";

try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        die("Connection Failed" . $e->getMessage());
    }

?>