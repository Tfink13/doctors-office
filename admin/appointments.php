<!-- Join the users and employess tables in php -->
<?php
session_start();
include '../db/db.php';


if($_SESSION['loggedin'] = True && $_SESSION['role'] == 'Admin') {

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
          <a href="adminhome.php"><li>Home</li></a>
          <a href="patientinfo.php"><li>Patient Info</li></a>
          <a href="patientsearch.php"><li>Patient Search</li></a>
          <a href="appointments.php"><li>Appointments</li></a>
          <a href="employees.php"><li>Employees</li></a>
          <a href="report.php"><li>Report</li></a>
      </div>
      </div>
      <form class="x" method="post">
        <button class="x" type="submit" name="logout"><li style="list-style: none;">Logout</li></button>
      </form>
      <h1>Appointments</h1>
    </div>


<div class="col-3 right">
  <div class="regform">
    <form method="post">
        <div class="">
          <label for="">Patient ID</label>
          <input onchange="yesnoCheck(this);" type="text" name="p_id" value="">
          <button type="submit" name="id_sub">Search</button>
        </div>
        <div class="">
          <label for="">Date</label>
          <input type="text" name="p_id" value="">
        </div>
        <div class="">
          <label for="">Name</label>
          <input type="text" name="p_id" value="">
        </div>
        <div>
          <label>Doctor</label>
          <br>
          <select class="role" name="role">
            <option>Doctor</option>
            <option>dr 1</option>
            <option>dr 2</option>
            <option>dr 3</option>
            <option>dr 4</option>
            <option>dr 5</option>
          </select>
        </div>
    </form>
  </div>
</div>






<?php require "../footer.php" ?>

<script>
  function yesnoCheck(that) {
      if (that.value == "") {

      } else {

      }
  }
</script>
  </body>
</html>
