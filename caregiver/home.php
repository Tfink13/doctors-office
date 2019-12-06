<?php
session_start();
include '../db/db.php';

if($_SESSION['loggedin'] = True && $_SESSION['role'] == 'Caregiver' && $_SESSION['approved'] == 1) {

} else {
  header("Location: http://localhost/doctors-office");
}

if (isset(($_POST['logout']))) {
  session_destroy();
  header("Location: http://localhost/doctors-office");
}
//get today's date
$current_date = date("Y-m-d");

//echo $current_date.' ';
//query for today's roster to get caregiver's current role
$user_id = $_SESSION["id"];
echo "user id is ".$user_id.' ';

$sql = "SELECT date, caregiver_1, caregiver_2, caregiver_3, caregiver_4 FROM roster WHERE date = '$current_date'";

//echo $sql. ' ';

$result = mysqli_query($conn, $sql);


if ($result) {
  while ($row = mysqli_fetch_row($result)) {
    foreach ($row as $field => $value) {
      if ($value = $user_id) {
        echo $value. ' ';
      }
    }
  } 
}





// $sql = "SELECT schedule
//   SET approved = '1'
//   WHERE user_id = $user;";



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
