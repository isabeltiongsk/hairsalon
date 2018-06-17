<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM staff WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['name'])  && isset($_POST['email']) && isset($_POST['contact']) && isset($_POST['dob'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  $dob = $_POST['dob'];
  $sql = 'UPDATE staff SET name=:name, email=:email, contact=:contact, dob=:dob WHERE id=:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':name' => $name, ':email' => $email, ':contact' => $contact,':dob' => $dob, ':id' => $id])) {
    header("Location: staff.php");
  }



}


 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update person</h2>
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
          <input value="<?= $person->name; ?>" type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" value="<?= $person->email; ?>" name="email" id="email" class="form-control">
        </div>
          <div class="form-group">
          <label for="contact">Contact</label>
          <input type="contact" value="<?= $person->contact; ?>" name="contact" id="contact" class="form-control">
        </div>
          <div class="form-group">
          <label for="dob">DOB</label>
          <input type="dob" value="<?= $person->dob; ?>" name="dob" id="dob" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update person</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
