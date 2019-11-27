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
          <a href="employees.php"><li>Update Salaries</li></a>
          <a href="addemployees.php"><li>Add Employees</li></a>
          <a href="report.php"><li>Report</li></a>
          <a href="payment.php"><li>Payment</li></a>
      </div>
      </div>
      <h1>Patient Search</h1>
      <form class="x" method="post">
        <button class="x" type="submit" name="logout"><li style="list-style: none;">Logout</li></button>
      </form>
    </div>



<?php


if($_SERVER["REQUEST_METHOD"] == "GET"){



  $ssql = "SELECT p.patient_id, role, fName, Lname, email, approved FROM users JOIN patients p WHERE approved = '1' AND role = 'Patient';";
  $result = mysqli_query($conn, $ssql);


  if ($result) {
    echo "<p class='users'>Applicants</p>";
    echo "<div id='table-scroll'><table border='1' background-color: #0099cc>
    <tr border ='1'>
    <td class='col' border='1'>Patient_id</td>
    <td class='col' border='1'>Role</td>
    <td class='col' border='1'>First Name</td>
    <td class='col' border='1'>Last Name</td>
    <td class='col' border='1'>Email</td>
    <td class='col' border='1'>Approved</td>
    </tr>";
    while ($row = mysqli_fetch_row($result)) {

      echo "<tr border='1' text-align = 'center'>";

      foreach ($row as $field => $value) {
        echo "<td border='1' width = '50px' text-align = 'center'>" . $value . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
  }
}
?>

<?php require "../footer.php" ?>
</body>
</html>
