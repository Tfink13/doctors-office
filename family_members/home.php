<?php
session_start();
include '../db/db.php';

if($_SESSION['loggedin'] = True && $_SESSION['role'] == 'Family Member') {

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
        </div>
    </div>
    <form class="x" method="post">
      <button class="x" type="submit" name="logout"><li style="list-style: none;">Logout</li></button>
    </form>
         <h1>Family Member Homepage</h1>
    </div>


    <div class="col-3 right">
      <div class="regform">
        <form method="post">
          <div>
            <label class="tb">Date</label>
            <input class="tb" type="text" name="date" required>
          </div>
          <div>
            <label class="tb">Family Code</label>
            <input class="tb" type="text" name="fcode" required>
          </div>
          <div>
            <label class="tb">Patient ID</label>
            <input class="tb" type="text" name="pid" required>
          </div>
          <button type="submit" name="button">OK</button>
          <button type="button" name="button">Cancel</button>
      </form>
    </div>
  </div>


<table>
  <p>Display a table with</p>
  <p>| dr_name | dr appt | caregiver name | morn med | after med | night med | break | lunch | dinner |</p>
  <p>make check boxes for </p>
</table>

    <?php require('../footer.php') ?>
  </body>
</html>
