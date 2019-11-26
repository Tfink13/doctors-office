<?php
session_start();

include '../db/db.php';
$user_id_err = "";

// authenticating the user in the admin
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
       </div>
     </div>
     <form class="x" method="post">
       <button class="x" type="submit" name="logout"><li style="list-style: none;">Logout</li></button>
     </form>
          <h1>Admin Homepage</h1>
     </div>
     <?php

     if($_SERVER["REQUEST_METHOD"] == "GET"){

       $ssql = "SELECT user_id, role, fName, Lname, email, approved FROM users WHERE approved = '0';";
       $result = mysqli_query($conn, $ssql);

       if ($result) {
         echo "<p class='users'>Applicants</p>";
         echo "<table d='table-scroll' border='1' background-color: #0099cc>";
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
       }
     }

     if (isset(($_POST['update']))) {

       if(empty(trim(@$_POST["user"]))){
           $username_err = "Enter user id to apporve application.";
       } else{
           $user = trim($_POST["user"]);
       }

       $sql = "UPDATE users
       SET approved = '1'
       WHERE user_id = $user;";

       mysqli_query($conn, $sql);

       $ssql = "SELECT user_id, role, fName, Lname, email, approved FROM users WHERE approved = '0';";
       $result = mysqli_query($conn, $ssql);

       if ($result) {
         echo "<p class='users'>Applicants</p>";
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
       }
     }
      ?>

      </div>
      <div>
        <h1 style="text-align:center;">Appove Registrations/Add Employees</h1>
        <form style="margin: auto;"class="update" method="post">
          <input class="update" type="text" name="user" value="">
          <button type="submit" name="update">UPDATE</button>
        </form>
      </div>





     <?php require('../footer.php') ?>
   </body>
 </html>
