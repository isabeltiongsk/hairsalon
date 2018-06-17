<?php
require 'db.php';
$message = '';
if (isset ($_POST['name'])  && isset($_POST['price'])  && isset($_POST['type'])) {
  $name = $_POST['name'];
  $price = $_POST['price'];
  $type = $_POST['type'];
  $sql = 'INSERT INTO product(name, price, type) VALUES(:name, :price, :type)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':name' => $name, ':price' => $price, ':type' => $type])) {
    $message = 'data inserted successfully';
  }



}


 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Create new product</h2>
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
          <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for=price">Price</label>
          <input type="price" name="price" id="price" class="form-control">
        </div>
          <div class="form-group">
          <label for=type">Type</label>
          <input type="type" name="type" id="type" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Create new product</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
