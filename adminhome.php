<?php

include 'db.php';

if (isset(($_POST['logout']))) {
  unset($_SESSION["userid"]);
  header("Location: index.php");
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
       <h1>Doctor Josh </h1>
       <form class="x" action="index.php" method="post">
         <button class="x" type="submit" name="logout"><li style="list-style: none;">Logout</li></button>
       </form>

     </div>
   </body>
 </html>

 <?php
 if($_SERVER["REQUEST_METHOD"] == "GET"){

   $ssql = "SELECT * FROM users WHERE approved = '0';";
   $result = mysqli_query($conn, $ssql);

   if ($result) {
     echo "<table border='1'>";
     while ($row = mysqli_fetch_row($result)) {
       echo "<tr>";
       foreach ($row as $field => $value) {
         echo "<td>" . $value . "</td>";
         }
         echo "</tr>";
     }
     echo "</table>";
   }
 }

  ?>
