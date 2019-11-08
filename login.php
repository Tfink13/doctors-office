<?php
require "db.php";

$email = $_POST['email'] ?? null;
$pass = $_POST['pass'] ?? null;
$hash = password_hash($pass, PASSWORD_DEFAULT);
$sql ;
$result = mysqli_query($conn, $sql);
$checked = password_verify($password, $hash);

$id = "i" ?? null;

?>

 