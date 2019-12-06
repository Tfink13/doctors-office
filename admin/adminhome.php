<?php
session_start();

require '../db/db.php';

// authenticating the user in the admin
if($_SESSION['loggedin'] = True && $_SESSION['role'] == 'Admin' && $_SESSION['approved'] == 1) {

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
            <a href="../roster.php"><li>Roster</li></a>
            <button type="submit" form="logout" name="logout"><li>Logout</li></button>
            <form id="logout" method="post"></form>
       </div>
     </div>
  </div>
     

      <?php 
        $sql = "SELECT user_id, role, fName, lName, email FROM users WHERE approved=0";
        $user_query = mysqli_query($conn, $sql);
        $user_info = mysqli_fetch_all($user_query);
        foreach ($user_info as $key => $line) {
          foreach ($line as $key => $entry) {
      
          }
        }

        if (!empty($_POST["approve"])) {
          $user_id = $_POST["approve"];
          $sql = "UPDATE users SET approved=1 WHERE user_id=$user_id";
          $query = mysqli_query($conn, $sql);
          echo "<meta http-equiv='refresh' content='0'>";
        }

        if (!empty($_POST["deny"])) {
          $user_id = $_POST["deny"];
          $sql = "DELETE FROM users WHERE user_id=$user_id";
          $query = mysqli_query($conn, $sql);
          echo "<meta http-equiv='refresh' content='0'>";
        }

      ?>

    <table>
        <tr>
          <td>User ID</td>
          <td>Role</td>
          <td>First Name</td>
          <td>Last Name</td>
          <td>Email</td>
        </tr>
        <?php
          foreach ($user_info as $key => $line) {
            echo "<tr>";
           
            foreach ($line as $key => $entry) {
              echo "<td>";
              echo $entry;
              echo "</td>";
            }
            echo "<td><form action='#' method='POST'><button name='approve' value='$line[0]'>Approve</button></form></td>";
            echo "<td><form action='#' method='POST'><button name='deny' value='$line[0]'>Deny</button></form></td>";

          }
        ?>
    </table>

    <?php require "../footer.php" ?>
  </body>
</html>
