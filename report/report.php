<?php
require 'db.php';
$sql = 'SELECT * FROM record';
$statement = $connection->prepare($sql);
$statement->execute();
$item = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Sales Report</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Date</th>
          <th>Name</th>
          <th>Quantity</th>
          <th>Price</th>
        </tr>
        <?php foreach($item as $sales): ?>
          <tr>
            <td><?= $sales->id; ?></td>
            <td><?= $sales->date; ?></td>
            <td><?= $sales->name; ?></td>
            <td><?= $sales->quantity; ?></td>
            <td>$ <?= $sales->price; ?></td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
