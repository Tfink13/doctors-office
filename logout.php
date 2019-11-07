<?php
if (isset(($_POST['']))) {
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

     <form class="" action="index.html" method="post">
       <button type="submit" name="logout">Log Out</button>
     </form>

   </body>
 </html>
