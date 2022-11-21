<?php
try {
include __DIR__ . '/../classes/Product.php';
$product = new Product();
$datas = $product->getProducts();
$products = [];
foreach ($datas as $data) {
$products[] = [
'id' => $data['ProductID'],
'name' => $data['ProductName'],
];
}
$title = 'Products';
$totalProducts = $product->getTotal();
ob_start();
include __DIR__ . '/../views/products.php';
$output = ob_get_clean();
} catch (PDOException $e) {
$title = 'An error has occurred';
$output = 'Database error: ' . $e->getMessage() . ' in ' .
$e->getFile() . ':' . $e->getLine();
}
include __DIR__ . '/../views/layout.php';