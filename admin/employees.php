<?php
session_start();
include '../db/db.php';
$eid_err = $sal_err = "";

if($_SESSION['loggedin'] = True && $_SESSION['role'] == 'Admin' && $_SESSION['approved'] == 1) {

} else {
  header("Location: http://localhost/doctors-office");
}

if (isset(($_POST['logout']))) {
  session_destroy();
  header("Location: http://localhost/doctors-office");
}





// echo var_dump($_POST);
if((isset($_POST['ok']))) {

  if(empty(trim($_POST["e_id"]))){
      $eid_err = "Enter employee id.";
  } else{
      $empid = trim($_POST["e_id"]);
  }
  if(empty(trim($_POST["sal"]))){
      $sal_err = "Enter a salary amount.";
  } else{
      $salary = trim($_POST["sal"]);
  }

  if (empty($eid_err) && empty($sal_err)) {
    $sql = "UPDATE `employee` SET `salary` = $salary WHERE `emp_id` = $empid;";
    mysqli_query($conn, $sql);
  }
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
      <h1>Employees</h1>
      <form class="x" method="post">
        <button class="x" type="submit" name="logout"><li style="list-style: none;">Logout</li></button>
      </form>
    </div>

  <div class="col-3 right">
    <div class="regform">
      <form method="post">
          <div>
            <label for="">Employee ID</label>
            <input type="text" name="e_id" value="">
            <span><?php echo $eid_err; ?></span>
          </div>
          <div>
            <label for="">New Salary</label>
            <input type="text" name="sal" value="">
            <span><?php echo $sal_err; ?></span>
          </div>
          <button type="submit" name="ok">OK</button>
          <button type="submit" name="cancel">Cancel</button>
      </form>
    </div>
  </div>


  <?php
  if($_SERVER['REQUEST_METHOD'] == "POST") {
    $sql = "SELECT emp_id, u.fName, u.lName, salary FROM employee e JOIN users u ON e.user_id = u.user_id;";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      echo "<p class='users'>All Employees</p>";
      echo "<div id='table-scroll'>";
      echo "<table border='1' background-color: #0099cc>";
      echo "<tr border ='1'>";
      echo "
      <td class='col' border='1'>Employee ID</td>
      <td class='col' border='1'>First Name</td>
      <td class='col' border='1'>Last Name</td>
      <td class='col' border='1'>Salary</td>
      </tr>";
      while ($row = mysqli_fetch_row($result)) {
        echo "<tr border='1'>";
        foreach ($row as $field => $value) {
          echo "<td border='1'>" . $value . "</td>";
          }
          echo "</tr>";
      }
      echo "</table>";
      echo "</div>";
    }
  }


  if($_SERVER['REQUEST_METHOD'] == "GET") {
    $sql = "SELECT emp_id, u.fName, u.lName, salary FROM employee e JOIN users u ON e.user_id = u.user_id;";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      echo "<p class='users'>All Employees</p>";
      echo "<div id='table-scroll'>";
      echo "<table border='1' background-color: #0099cc>";
      echo "<tr border ='1'>";
      echo "
      <td class='col' border='1'>Employee ID</td>
      <td class='col' border='1'>First Name</td>
      <td class='col' border='1'>Last Name</td>
      <td class='col' border='1'>Salary</td>
      </tr>";
      while ($row = mysqli_fetch_row($result)) {
        echo "<tr border='1'>";
        foreach ($row as $field => $value) {
          echo "<td border='1'>" . $value . "</td>";
          }
          echo "</tr>";
      }
      echo "</table>";
      echo "</div>";
    }
  } ?>

<?php require('../footer.php'); ?>
<script>
function yesnoCheck(that) {
    if (that.value == "") {

    } else {

    }
}
</script>
  </body>
</html>
