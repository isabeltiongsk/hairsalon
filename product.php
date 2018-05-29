<?php
require 'product/db.php';
$sql = 'SELECT * FROM product WHERE type = "product" ';
$sql2 = 'SELECT * FROM product WHERE type = "service" ';
$statement = $connection->prepare($sql);
$statement2 = $connection->prepare($sql2);
$statement->execute();
$statement2->execute();
$product = $statement->fetchAll(PDO::FETCH_OBJ);
$service = $statement2->fetchAll(PDO::FETCH_OBJ);
 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>All product</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Price</th>
          <th>Type</th>
          <th>Action</th>
        </tr>
        <?php foreach($product as $item): ?>
          <tr>
            <td><?= $item->id; ?></td>
            <td><?= $item->name; ?></td>
            <td><?= $item->price; ?></td>
            <td><?= $item->type; ?></td>
            <td>
              <a href="product/edit.php?id=<?= $item->id ?>" class="btn btn-info">Edit</a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="product/delete.php?id=<?= $item->id ?>" class='btn btn-danger'>Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>

<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>All service</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Price</th>
          <th>Type</th>
          <th>Action</th>
        </tr>
        <?php foreach($service as $item): ?>
          <tr>
            <td><?= $item->id; ?></td>
            <td><?= $item->name; ?></td>
            <td><?= $item->price; ?></td>
            <td><?= $item->type; ?></td>
            <td>
              <a href="product/edit.php?id=<?= $item->id ?>" class="btn btn-info">Edit</a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="product/delete.php?id=<?= $item->id ?>" class='btn btn-danger'>Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
