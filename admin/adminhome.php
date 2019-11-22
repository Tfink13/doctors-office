<?php
session_start();

require '../db/db.php';

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
            <a href="employees.php"><li>Employees</li></a>
            <a href="report.php"><li>Report</li></a>
            <a href="payment.php"><li>Payment</li></a>
       </div>
     </div>
     <form class="x" method="post">
       <button class="x" type="submit" name="logout"><li style="list-style: none;">Logout</li></button>
     </form>
          <h1>Admin Homepage</h1>
     </div>

      <?php 
        $sql = "SELECT fName, lName, approved FROM users WHERE approved=0";
        $user_query = mysqli_query($conn, $sql);
        $user_info = mysqli_fetch_all($user_query);
        print_r($user_info);
      ?>

      <table>
        <tr>
          <td>
            Name
          </td>
          <td>
            Name
          </td>
          <td>
            Name
          </td>
        </tr>
      </table>







 

    <?php require "../footer.php" ?>
  </body>
</html>
