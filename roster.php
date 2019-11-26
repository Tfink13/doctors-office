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
        <a href="#"><li>About</li></a>
        <a href="#"><li>Contact</li></a>
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
        <td border='1'>Mr Tyler</td>
        <td border='1'>Dr Josh</td>
        <td border='1'>John</td>
        <td border='1'>Smith</td>    
        <td border='1'>Greg</td>
        <td border='1'>Annah</td>
</tr>
</table>


<?php require "footer.php" ?>
</body>
</html>