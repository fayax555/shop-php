<?php
try {
  include __DIR__ . '/../classes/Product.php';
  include __DIR__ . '/../classes/Supplier.php';

  $product = new Product();
  $supplier = new Supplier();
  if (isset($_POST['ProductName'])) {
    $product->name = $_POST['ProductName'];
    $product->unit = $_POST['Unit'];
    $product->price = $_POST['Price'];
    $product->supplierId = $_POST['SupplierID'];
    $product->categoryId = $_POST['CategoryID'];
    $product->saveProduct();
    header('location: products.php');
  } else {
    $product = null;
    $title = 'Product Form';
    ob_start();
    include __DIR__ . '/../views/productForm.php';
    $output = ob_get_clean();
  }
} catch (PDOException $e) {
  $title = 'An error has occurred';
  $output = 'Database error: ' . $e->getMessage() . ' in ' .
    $e->getFile() . ':' . $e->getLine();
}
include __DIR__ . '/../views/layout.php';