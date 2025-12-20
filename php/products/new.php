<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../repository/ProductRepository.php';

$repo = new ProductRepository($pdo);

// POST 送信されたときだけ登録処理を行う
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name  = trim($_POST['name'] ?? '');
    $price = (int)($_POST['price'] ?? 0);
    $quantity = (int)($_POST['quantity'] ?? 0);

    if ($name !== '' && $price > 0 && $quantity > 0) {
        $repo->insert($name, $price, $quantity);
        header('Location: list.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>商品登録</title>
</head>
<body>

<h1>商品登録</h1>

<form method="post">
    商品名：<input type="text" name="name"><br>
    価格：<input type="number" name="price"><br>
    個数：<input type="number" name="quantity" min="0" required><br>
    <button type="submit">登録</button>
</form>

<p><a href="list.php">一覧へ戻る</a></p>

</body>
</html>
