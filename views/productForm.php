<h2>Product Form</h2>
<form action="" method="post" style="margin-top: 10px;">
  <input type="hidden" name="ProductID" value="<?= $product['ProductID'] ?? '' ?>">
  <label for="ProductName">Product Name: </label>
  <input type="text" id="ProductName" name="ProductName" value="<?= $product['ProductName'] ?? '' ?>" required>
  <label for="Unit">Product Unit: </label>
  <input type="text" id="Unit" name="Unit" value="<?= $product['Unit'] ??
                                                    '' ?>" required>
  <label for="Price">Product Price: </label>
  <input type="number" id="Price" name="Price" value="<?= $product['Price'] ?? '' ?>" required>

  <label for="SupplierID">Supplier: </label>
  <select name="SupplierID" id="SupplierID">
    <?php foreach ($supplier->getSuppliers() as $supplier) : ?>
    <option <?= $supplier['SupplierID'] == ($product['SupplierID'] ?? '') ? 'selected' : '' ?>
      value="<?= $supplier['SupplierID'] ?>"><?= $supplier['SupplierName'] ?></option>
    <?php endforeach; ?>
  </select>

  <input type="submit" name="submit" value="Save">
</form>