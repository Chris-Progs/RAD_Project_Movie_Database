<?php

$servername = 'localhost';
$username = 'adminer';
$password = 'P@ssw0rd';

try {
    $conn = new PDO("mysql:host=$servername;dbname=movies_db",$username,$password);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'Connection failed: ' . $e -> getMessage();
}

?>