<?php
session_start();

if($_SESSION['loggedin'] = True && $_SESSION['role'] == 'Patient') {

} else {
  header("Location: http://localhost/doctors-office/");
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
           <a href="patienthome.php"><li>Home</li></a>
           <a href="payment.php"><li>Payment</li></a>
       </div>
       </div>
       <form class="x" action="../logout.php" method="post">
         <button class="x" type="submit" name="logout"><li style="list-style: none;">Logout</li></button>
       </form>
       <h1>Patient Homepage</h1>
     </div>


 <div class="col-3 right">
   <div class="regform">
     <form method="post">
       <input type="text" name="" value="<?php echo $_SESSION['id'];?>">
       <input type="text" name="" value="<?php echo $_SESSION['fname'];?>">
       <div class="regsub">
       <button type="submit" name="sub">Submit</button>
       <button type="button" name="cancel">Cancel</button>
       </div>
     </form>
   </div>
 </div>

 <?php require "../footer.php" ?>
   </body>
 </html>
