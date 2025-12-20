<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../repository/ProductRepository.php';

$repo = new ProductRepository($pdo);

$id = (int)($_GET['id'] ?? 0);
$product = $repo->findById($id);

if (!$product) {
    exit('商品が見つかりません');
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>商品編集</title>
</head>
<body>

<h1>商品編集</h1>

<form method="post" action="update.php">
    <input type="hidden" name="id" value="<?= (int)$product['id'] ?>">

    商品名：
    <input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>" required><br>

    価格：
    <input type="number" name="price" value="<?= (int)$product['price'] ?>" required><br>

    個数：
    <input type="number" name="quantity" value="<?= (int)$product['quantity'] ?>" min="0" required><br>

    <button type="submit">更新</button>
</form>

<p><a href="list.php">一覧へ戻る</a></p>

</body>
</html>
