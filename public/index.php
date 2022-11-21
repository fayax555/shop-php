<?php
try {
  include __DIR__ . '/../classes/Home.php';
  $home = new Home();
  $productCount = $home->getProductCount();
  $title = 'Home';
  ob_start();
  include __DIR__ . '/../views/home.php';
  $output = ob_get_clean();
} catch (PDOException $e) {
  $title = 'An error has occurred';
  $output = 'Database error: ' . $e->getMessage() . ' in ' .
    $e->getFile() . ':' . $e->getLine();
}
include __DIR__ . '/../views/layout.php';