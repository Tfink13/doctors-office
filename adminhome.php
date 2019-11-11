<?php

include 'db.php';

if (isset(($_POST['logout']))) {
  unset($_SESSION["userid"]);
  header("Location: home.php");
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
           <a href="home.php"><li>Home</li></a>
           <a href="#"><li>About</li></a>
           <a href="#"><li>Contact</li></a>
       </div>

       </div>
       <h1>Doctor Josh </h1>
       <form class="x" action="home.php" method="post">
         <button class="x" type="submit" name="logout"><li style="list-style: none;">Logout</li></button>
       </form>

     </div>
   </body>
 </html>
