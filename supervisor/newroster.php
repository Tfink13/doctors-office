<?php
session_start();
include '../db/db.php';


if($_SESSION['loggedin'] = True && $_SESSION['role'] == 'Supervisor' && $_SESSION['approved'] == 1) {

} else {
  header("Location: http://localhost/doctors-office");
}

if (isset(($_POST['logout']))) {
  session_destroy();
  header("Location: http://localhost/doctors-office");
}

$sname = "SELECT fName, lName, role FROM users WHERE role = 'Supervisor';";
$result = mysqli_query($conn, $sname);

$dname = "SELECT fName, lName, role FROM users WHERE role = 'Doctor';";
$res = mysqli_query($conn, $dname);
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
          <a href="newroster.php"><li>Home</li></a>
        </div>
    </div>
    <form class="x" method="post">
      <button class="x" type="submit" name="logout"><li style="list-style: none;">Logout</li></button>
    </form>
         <h1>My Patients</h1>
    </div>

    <div class="col-3 right">
      <div class="regform">
        <form method="post">
          <div>
            <label class="tb">Date</label>
            <input class="tb" type="date" name="date" required>
          </div>
          <div>
            <label class="tb">Supervisor:</label>
            <select class="" name="">
              <?php while($row = mysqli_fetch_assoc($result))
              {
                 $names = $row['fName']." " . $row['lName']." , ";
                 echo "<option id='{$row['fName']} {$row['lName']}'>{$row['fName']} {$row['fName']}</option>";
              }
              ?>
            </select>
          </div>
          <div>
            <label class="tb">Doctor:</label>
            <select class="" name="">
              <?php while($row = mysqli_fetch_assoc($res))
              {
                 $names = $row['fName']." " . $row['lName']." , ";
                 echo "<option id='{$row['fName']} {$row['lName']}'>{$row['fName']} {$row['fName']}</option>";
              }
              ?>
            </select>


          </div>
          <div>
            <label class="tb">Caregiver Group 1:</label>
            <input class="tb" type="text" name="c1" required>
          </div>
          <div>
            <label class="tb">Caregiver Group 2:</label>
            <input class="tb" type="text" name="c2" required>
          </div>
          <div>
            <label class="tb">Caregiver Group 3:</label>
            <input class="tb" type="text" name="c3" required>
          </div>
          <div>
            <label class="tb">Caregiver Groups 4:</label>
            <input class="tb" type="text" name="c4" required>
          </div>
      </form>
    </div>
  </div>

<?php require('../footer.php'); ?>

  </body>
</html>
