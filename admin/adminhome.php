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
     <link rel="stylesheet" href="master.css">
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <div class="header">
       <div class="dropdown menu">
         <button class="dropbtn">Menu</button>
         <div class="dropdown-content">
           <a href="index.php"><li>Home</li></a>
           <a href="#"><li>About</li></a>
           <a href="#"><li>Contact</li></a>
       </div>
       </div>
       <form class="x" method="post">
         <button class="x" type="submit" name="logout"><li style="list-style: none;">Logout</li></button>
       </form>
     </div>
   </body>
 </html>




 <?php

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

   $ssql = "SELECT user_id, fName, Lname, email, approved FROM users WHERE approved = '0';";
   $result = mysqli_query($conn, $ssql);

   if ($result) {
     echo "<p class='users'>Applicants</p>";
     echo "<table border='1' background-color: #0099cc>";
     while ($row = mysqli_fetch_row($result)) {
       echo "<tr border='1'>";
       foreach ($row as $field => $value) {
         echo "<td border='1px solid black;>" . $value . "</td>";
         }
         echo "</tr>";
     }
     echo "</table>";
   }
 }

 if($_SERVER["REQUEST_METHOD"] == "GET"){

   $ssql = "SELECT user_id, fName, Lname, email, approved FROM users WHERE approved = '0';";
   $result = mysqli_query($conn, $ssql);

   if ($result) {
     echo "<p class='users'>Applicants</p>";
     echo "<table border='1' background-color: #0099cc>";
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


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form style="margin: auto;"class="update" method="post">
      <input class="update" type="text" name="user" value="">
      <button type="submit" name="update">UPDATE</button>
    </form>
  </body>
</html>
