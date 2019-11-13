<?php
include 'logout.php';
session_start();
print_r($_SESSION['loggedin']);
print_r($_SESSION['role']);

if($_SESSION['loggedin'] = True && $_SESSION['role'] == 'Patient') {

} else {
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
     <main>
       <header>
           <nav>
               <ul>
                   <li><a> Home </a></li>
                   <li><a> Additional Information </a></li>
               </ul>
           </nav>
       </header>
     </main>
   </body>
 </html>
