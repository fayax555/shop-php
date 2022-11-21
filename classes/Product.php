<?php
require __DIR__ . '/Database.php';
class Product
{
  private $pdo;

  public $name;
  public $supplierId;
  public $categoryId;
  public $unit;
  public $price;
  public function __construct()
  {
    $db = new Database();
    $this->pdo = $db->connect();
  }

  public function getProducts()
  {
    $stmt = $this->pdo->prepare('SELECT * FROM `products` ORDER BY
`ProductID` DESC');
    $stmt->execute();
    return $stmt->fetchAll();
  }

  public function getTotal()
  {
    $stmt = $this->pdo->prepare('SELECT COUNT(*) FROM `products`');
    $stmt->execute();
    $row = $stmt->fetch();
    return $row[0];
  }

  public function saveProduct()
  {
    $query = 'INSERT INTO `products` (`ProductName`, `SupplierID`,
    `CategoryID`, `Unit`, `Price`)
    VALUES(:ProductName, :SupplierID, :CategoryID, :Unit, :Price)';
    $values = [
      ':ProductName' => $this->name,
      ':SupplierID' => $this->supplierId,
      ':CategoryID' => $this->categoryId,
      ':Unit' => $this->unit,
      ':Price' => $this->price,
    ];
    $stmt = $this->pdo->prepare($query);
    $stmt->execute($values);
  }
}