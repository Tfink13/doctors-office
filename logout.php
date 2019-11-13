<?php
if (isset(($_POST['logout']))) {
  session_destroy();
  header("Location: index.php");

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

     <form class="" action="index.php" method="post">
       <button type="submit" name="logout">Log Out</button>
     </form>

   </body>
 </html>
