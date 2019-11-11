<?php
if (isset(($_POST['name']))) {
  unset($_SESSION["userid"]);
  header("Location: home.php");

}

 ?>


 <!DOCTYPE html>
 <html lang="" dir="ltr">
   <head>
     <link rel="stylesheet" href="master.css">
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>

     <form class="" action="home.php" method="post">
       <button type="submit" name="logout">Log Out</button>
     </form>

   </body>
 </html>
