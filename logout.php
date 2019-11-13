<?php
if (isset($_POST["logout"])) {
  session_unset();
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

     <form class="" action="#" method="post">
       <input type="submit" value="logout" name="logout">
     </form>

   </body>
 </html>
