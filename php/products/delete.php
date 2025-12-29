<?php
$id = (int)($_GET['id'] ?? 0);

if ($id > 0) {

    $ch = curl_init("http://localhost:8080/api/products/{$id}");
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_exec($ch);
    curl_close($ch);
}

header('Location: list.php');
exit;
