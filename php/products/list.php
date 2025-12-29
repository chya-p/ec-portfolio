<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../repository/ProductRepository.php';

#$repo = new ProductRepository($pdo);
#$products = $repo->findAll();
$products = json_decode(file_get_contents('http://localhost:8080/api/products'), true);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>商品一覧</title>
</head>
<body>
<h1>商品一覧</h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>商品名</th>
        <th>価格</th>
        <th>在庫数</th>
        <th>登録日</th>
        <th>操作</th>
    </tr>

    <?php foreach ($products as $p): ?>
        <tr>
            <td><?= htmlspecialchars($p['id']) ?></td>
            <td><?= htmlspecialchars($p['name']) ?></td>
            <td><?= htmlspecialchars($p['price']) ?></td>
            <td><?= (int)$p['stock'] ?></td>
            <td><?= htmlspecialchars($p['createdAt'] ?? '') ?></td>
            <td>
                <a href="edit.php?id=<?= (int)$p['id'] ?>">編集</a>
                |
                <a href="delete.php?id=<?= $p['id'] ?>"
                   onclick="return confirm('削除しますか？');">
                    削除
                </a>  
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
