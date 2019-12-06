<?php
session_start();

include '../db/db.php';
$id_err = "";

// authenticating the user in the admin
if($_SESSION['loggedin'] = True && $_SESSION['role'] == 'Admin' && $_SESSION['approved'] == 1) {

} else {
  header("Location: http://localhost/doctors-office");
}

if (isset(($_POST['logout']))) {
  session_destroy();
  header("Location: http://localhost/doctors-office");
}






  //   if($stmt = mysqli_prepare($conn, $sql)){
  //       // Bind variables to the prepared statement as parameters
  //       mysqli_stmt_bind_param($stmt, "s", $param_uid);
  //       $param_uid = $user_id;
  //       if(mysqli_stmt_execute($stmt)){
  //           // Redirect to login page
  //           header("location: http://localhost/doctors-office/");
  //       } else{
  //           echo "Something went wrong. Please try again later.";
  //       }
  //     }
  //   }
  // }

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
     </div>
   </div>
   <form class="x" method="post">
     <button class="x" type="submit" name="logout"><li style="list-style: none;">Logout</li></button>
   </form>
        <h1>Admin Homepage</h1>
   </div>



    <?php
    $ql = "SELECT user_id, role, fName, Lname, email, approved FROM users WHERE role != 'Patient' AND role != 'Family Member' AND approved = '1';";
    $result = mysqli_query($conn, $ql);

    if($_SERVER["REQUEST_METHOD"] == "GET"){

    if ($result) {
      echo "<p class='users'>All Employees</p>";
      echo "<div id='table-scroll'>";
      echo "<table border='1' background-color: #0099cc>";
      echo "<tr border ='1'>";
      echo "
      <td class='col' border='1'>User ID</td>
      <td class='col' border='1px bold black'>Role</td>
      <td class='col' border='1'>First Name</td>
      <td class='col' border='1'>Last Name</td>
      <td class='col' border='1'>Email</td>
      <td class='col' border='1'>Approved</td>
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

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      if(empty(trim($_POST["empid"]))){
          $id_err = "Enter user id to add employee to database.";
      } else{
          $user_id = trim($_POST["empid"]);
        }

      if(empty($id_err)){

        $sql = "INSERT INTO employee (user_id) VALUES ($user_id);";
        mysqli_query($conn, $sql);

        $ql = "SELECT user_id, role, fName, Lname, email, approved FROM users WHERE role != 'Patient' AND role != 'Family Member' AND approved = '1';";
        $result = mysqli_query($conn, $ql);
        if ($result) {
          echo "<p class='users'>All Employees</p>";
          echo "<div id='table-scroll'>";
          echo "<table border='1' background-color: #0099cc>";
          echo "<tr border ='1'>";
          echo "
          <td class='col' border='1'>User ID</td>
          <td class='col' border='1px bold black'>Role</td>
          <td class='col' border='1'>First Name</td>
          <td class='col' border='1'>Last Name</td>
          <td class='col' border='1'>Email</td>
          <td class='col' border='1'>Approved</td>
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
    }



  ?>
  <h1 style="text-align:center;">Add Employee</h1>
  <form style="margin: auto;"class="update" method="post">
    <input style="margin: auto;" type="text" name="empid" value="">
    <button type="submit" name="emp">UPDATE</button>
  </form>



  <?php require('../footer.php') ?>
  </body>
</html>
