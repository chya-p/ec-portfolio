<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../repository/ProductRepository.php';

#$repo = new ProductRepository($pdo);

// POST 送信されたときだけ登録処理を行う
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name  = trim($_POST['name'] ?? '');
    $price = (int)($_POST['price'] ?? 0);
    $stock = (int)($_POST['stock'] ?? 0);

    if ($name !== '' && $price > 0 && $stock > 0) {

        $data = [
            'name'  => $name,
            'price' => $price,
            'stock' => $stock,
        ];
    
        $ch = curl_init('http://localhost:8080/api/products');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    
        curl_exec($ch);
        curl_close($ch);
    
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
    在庫数：<input type="number" name="stock" min="0" required><br>
    <button type="submit">登録</button>
</form>

<p><a href="list.php">一覧へ戻る</a></p>

</body>
</html>
