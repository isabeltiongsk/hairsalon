<?php
require 'db.php';
$message = '';
if (isset ($_POST['name'])  && isset($_POST['email']) && isset($_POST['contact']) && isset($_POST['dob'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  $dob = $_POST['dob'];
  $sql = 'INSERT INTO staff(name, email, contact, dob) VALUES(:name, :email, :contact, :dob)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':name' => $name, ':email' => $email, ':contact' => $contact, ':dob' => $dob])) {
    $message = 'data inserted successfully';
  }



}


 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Create new staff</h2>
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
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control">
        </div>
          <div class="form-group">
          <label for="contact">Contact</label>
          <input type="contact" name="contact" id="contact" class="form-control">
        </div>
          <div class="form-group">
          <label for="dob">DOB</label>
          <input type="dob" name="dob" id="dob" class="form-control" placeholder="1990-03-21">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Create new staff</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
