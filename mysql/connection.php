<?php
error_reporting(0);
session_start();

include_once ('db.php');
$mysqlServer = "localhost";
$mysqlUseName = "ysuniono_ibrahim";
$mysqlPassword = "x3kap5216.";

try {
    $conn = new PDO("mysql:host=$mysqlServer;dbname=ysuniono_dergi2;charset=utf8", $mysqlUseName, $mysqlPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    db::$conn = $conn;
}
catch(PDOException $e)
{
    echo "Bağlantı hatası: " . $e->getMessage();
}