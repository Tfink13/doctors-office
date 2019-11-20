<?php
session_start();

require '../db/db.php';
$user_id_err = "";

// authenticating the user in the admin
if($_SESSION['loggedin'] = True && $_SESSION['role'] == 'Caregiver') {

} else {
  header("Location: http://localhost/doctors-office");
}

if (isset(($_POST['logout']))) {
  session_destroy();
  header("Location: http://localhost/doctors-office");
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="../master.css">
    <meta charset="utf-8">
    <title>Caregiver Home</title>
  </head>
<body>

<div class="header">
  <div class="dropdown menu">
    <button class="dropbtn">Menu</button>
    <div class="dropdown-content">
      <a href="#"><li>About</li></a>
      <a href="#"><li>Contact</li></a>
    </div>
  </div>
  <h1>Caregiver Home</h1>
</div>

<table style="background-color: #0099cc;">
    <tr>
        <td>Name</td>
        <td>Morning Med</td>
        <td>Afternoon Med</td>
        <td>Night Med</td>
        <td>Breakfast</td>
        <td>Lunch</td>
        <td>Dinner </td>
    </tr>
    <tr>
        <form id='schedule'>
        <!-- this is where php loop starts -->
        <td><input type='checkbox' name='name'></td>
        <td><input type='checkbox' name='morning'></td>
        <td><input type='checkbox' name='afternoon'></td>
        <td><input type='checkbox' name='night'></td>
        <td><input type='checkbox' name='breakfast'></td>
        <td><input type='checkbox' name='lunch '></td>
        <td><input type='checkbox' name='dinner'></td>
        <!-- this is where php loop ends -->
        </form>
    </tr>
</table>

<div style="margin: auto; text-align: center;">
<button type='submit' form='schedule' name='ok'>OK</button>
<button type='submit' form='schedule' name='cancel'>Cancel</button>
<div>




<?php require "../footer.php";?>
</body>
</html>
