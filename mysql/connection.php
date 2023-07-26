<?php
error_reporting(0);
session_start();

include_once ('db.php');
$mysqlServer = "localhost";
$mysqlUseName = "root";
$mysqlPassword = ".";

try {
    $conn = new PDO("mysql:host=$mysqlServer;dbname=journal;charset=utf8", $mysqlUseName, $mysqlPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    db::$conn = $conn;
}
catch(PDOException $e)
{
    echo "Bağlantı hatası: " . $e->getMessage();
}