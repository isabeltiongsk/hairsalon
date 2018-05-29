<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM product WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$item = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['name'])  && isset($_POST['price']) && isset($_POST['type']) ) {
  $name = $_POST['name'];
  $price = $_POST['price'];
  $type = $_POST['type'];
  $sql = 'UPDATE product SET name=:name, price=:price, type=:type WHERE id=:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':name' => $name, ':price' => $price, ':type' => $type, ':id' => $id])) {
    header("Location: ../product.php");
  }



}


 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update product</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="name">Name</label>
          <input value="<?= $item->name; ?>" type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="price">Price</label>
          <input type="price" value="<?= $item->price; ?>" name="price" id="price" class="form-control">
        </div>
          <div class="form-group">
          <label for="type">Type</label>
          <input type="type" value="<?= $item->type; ?>" name="type" id="type" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update item</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
