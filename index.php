<?php
//index.php

$host ="localhost";
$user ="root";
$password ="";
$database ="testing";
 
$connect= mysqli_connect($host, $user, $password, $database);


?>
<?php require 'header.php'; ?>
<iframe src="timetable.html" width="100%" height="800" ></iframe>
<?php require 'footer.php'; ?>