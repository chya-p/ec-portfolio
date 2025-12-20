<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../repository/ProductRepository.php';

$id = (int)($_GET['id'] ?? 0);

if ($id > 0) {
    $repo = new ProductRepository($pdo);
    $repo->deleteById($id);
}

header('Location: list.php');
exit;
