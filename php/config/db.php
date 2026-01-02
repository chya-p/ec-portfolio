<?php
$host = 'localhost';
$db   = 'ec_portfolio';

// Database connection settings
$db_user = getenv('DB_USER') ?: 'ec_user';
$db_pass = getenv('DB_PASS') ?: '';

$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $db_user, $db_pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
} catch (PDOException $e) {
    exit('DB接続失敗: ' . $e->getMessage());
}
