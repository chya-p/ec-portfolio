<?php
$host = 'localhost';
$db   = 'ec_portfolio';
// Database connection settings (set your own values)
$db_user = "your_username";
$db_pass = "your_password";

$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
} catch (PDOException $e) {
    exit('DB接続失敗: ' . $e->getMessage());
}
