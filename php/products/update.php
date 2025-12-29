<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../repository/ProductRepository.php';

$id       = (int)($_POST['id'] ?? 0);
$name     = trim($_POST['name'] ?? '');
$price    = (int)($_POST['price'] ?? 0);
$stock = (int)($_POST['stock'] ?? 0);

if ($id <= 0 || $name === '' || $price <= 0 || $stock < 0) {
    exit('入力が不正です');
}

#$repo = new ProductRepository($pdo);
#$repo->update($id, $name, $price, $stock);

header('Location: list.php');
exit;
