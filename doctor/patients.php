<!-- Join the users and employess tables in php -->
<?php
session_start();
include '../db/db.php';


if($_SESSION['loggedin'] = True && $_SESSION['role'] == 'Doctor') {

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
    <title></title>
  </head>
  <body>
    <div class="header">
      <div class="dropdown menu">
        <button class="dropbtn">Menu</button>
        <div class="dropdown-content">
          <a href="home.php"><li>Home</li></a>
          <a href="drpatients.php"><li>Patients</li></a>
        </div>
    </div>
    <form class="x" method="post">
      <button class="x" type="submit" name="logout"><li style="list-style: none;">Logout</li></button>
    </form>
         <h1>My Patients</h1>
    </div>

    <p>Display table with all patients <br><br>
      | date | comment | Morn med | Afternoon Med | Night Med |</p>


    <div class="">
    <h2>New Prescription</h2>
    <table>
      <p>Table with just comment | Morn med | Afternoon med | Afternoon med |</p>
    </table>

  <form class="" action="index.html" method="post">
    <button type="submit" name="button">OK</button>
    <button type="submit" name="button">Cancel</button>
  </form>
    </div>


    <?php require "../footer.php" ?>
  </body>
</html>
