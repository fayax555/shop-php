<?php

require_once __DIR__ . '/Database.php';

class Category
{
  private $pdo;

  public function __construct()
  {
    $db = new Database();
    $this->pdo = $db->connect();
  }

  public function getCategories()
  {
    $stmt = $this->pdo->prepare('SELECT * FROM `categories` ORDER BY `categoryID` DESC');
    $stmt->execute();
    return $stmt->fetchAll();
  }
}