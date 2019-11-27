<?php
require 'db/db.php';


///get the current date from form
  if (!empty($_GET["date"])) {
    $date = $_GET["date"];
  }

  ///post date to query to display all roster table entries, which are all foreign keys for the users table
  if (!empty($date)) {
  $sql = "SELECT * FROM roster WHERE date ='$date'";
  $roster_user_ids = mysqli_query($conn, $sql);
    $user_user_ids = mysqli_fetch_row($roster_user_ids);
  }
?>
 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Roster</title>
    <link rel="stylesheet" href="master.css">

</head>
<body>
<div class="header">
  <div class="dropdown menu">
    <button class="dropbtn">Menu</button>
    <div class="dropdown-content">
        <a href="index.php"><li>Home</li></a>
    </div>
  </div>
  <h1>Doctor Josh </h1>
</div>

<div style='margin: auto;'> 
<form action='#' method='GET' style='margin: auto;'>
<input type="date" name="date" style="margin: auto;">
<input style='margin:auto;' type="submit" value="Check">
</form>
</div>

<table border='1' background-color: #0099cc>
    <tr border='1'>
        <td border='1'>Supervisor</td>
        <td border='1'>Doctor</td>
        <td border='1'>Caregiver 1</td>
        <td border='1'>Caregiver 2</td>    
        <td border='1'>Caregiver 3</td>
        <td border='1'>Caregiver 4</td>
</tr>
    <tr border='1'>
      <?php 
        

        if (!empty($date)) {
            for ($i = 1; $i <= 6; $i++) {
              // do a SELECT for each user_id foreign key returned by the roster
              $sql = "SELECT fName, lName FROM users where user_id='$user_user_ids[$i]'";
              $usernames_query = mysqli_query($conn, $sql);
              $usernames_row = mysqli_fetch_row($usernames_query);
              echo "<td>".$usernames_row[0].' '.$usernames_row[1]."</td>";
            }
        }
      ?>
</tr>
</table>


<?php require "footer.php" ?>
</body>
</html>