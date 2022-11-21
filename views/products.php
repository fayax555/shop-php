<h2>Product List</h2>
<p>There are total <?= $totalProducts ?> Products.</p>
<?php foreach ($products as $product) : ?>
<blockquote>
  <p>
    <?= htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8') ?>
    <a href="productForm.php?id=<?= $product['id'] ?>">Edit</a>
  <form action="" method="post">
    <input type="hidden" name="ProductID" value="<?= $product['id'] ?>">
    <input type="submit" value="Delete">
  </form>
  </p>
</blockquote>
<?php endforeach; ?>