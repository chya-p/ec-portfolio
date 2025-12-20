<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../repository/ProductRepository.php';

$id       = (int)($_POST['id'] ?? 0);
$name     = trim($_POST['name'] ?? '');
$price    = (int)($_POST['price'] ?? 0);
$quantity = (int)($_POST['quantity'] ?? 0);

if ($id <= 0 || $name === '' || $price <= 0 || $quantity < 0) {
    exit('入力が不正です');
}

$repo = new ProductRepository($pdo);
$repo->update($id, $name, $price, $quantity);

header('Location: list.php');
exit;
