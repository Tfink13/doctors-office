<?php
session_start();

// belongs in admin role
if($_SESSION['loggedin'] = True && $_SESSION['role'] == 'Admin') {

} else {
  header("Location: http://localhost/doctors-office/");
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
          <a href="payment.php"><li>Payment</li></a>
      </div>
      </div>
      <form class="x" action="../logout.php" method="post">
        <button class="x" type="submit" name="logout"><li style="list-style: none;">Logout</li></button>
      </form>
      <h1>Payment Page</h1>
    </div>



<div class="flex">

      <div class="col-3 right">
        <div class="a">
          <p>$10 per day</p>
          <p>$50 per appointment</p>
        </div>
      </div>


      <div class="col-3 right">
        <div class="regform">
          <form method="post">
            <div>
              <label class="tb">Patient ID</label>
              <input class="tb" type="text" name="pid" required>
            </div>
            <div>
              <label class="tb">Toatal Due</label>
              <input class="tb" type="text" name="total" required>
            </div>
            <div>
              <label class="tb">New Payment</label>
              <input class="tb" type="text" name="newpay" required>
            </div>
            <button type="submit" name="button">OK</button>
            <button type="submit" name="button">Cancel</button>
        </form>
      </div>
      </div>

</div>
    <?php require('../footer.php') ?>
  </body>
</html>
