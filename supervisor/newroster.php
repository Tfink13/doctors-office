<?php
session_start();
include '../db/db.php';


if($_SESSION['loggedin'] = True && $_SESSION['role'] == 'Supervisor') {

} else {
  header("Location: http://localhost/doctors-office");
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
            <input class="tb" type="text" name="" required>
          </div>
          <div>
            <label class="tb">Supervisor</label>
            <input class="tb" type="text" name="supername" required>
          </div>
          <div>
            <label class="tb">Doctor</label>
            <input class="tb" type="text" name="doc" required>
          </div>
          <div>
            <label class="tb">Caregiver 1</label>
            <input class="tb" type="text" name="c1" required>
          </div>
          <div>
            <label class="tb">Caregiver 2</label>
            <input class="tb" type="text" name="c2" required>
          </div>
          <div>
            <label class="tb">Caregiver 3</label>
            <input class="tb" type="text" name="c3" required>
          </div>
          <div>
            <label class="tb">Caregiver 4</label>
            <input class="tb" type="text" name="c4" required>
          </div>
      </form>
    </div>
  </div>

<?php require('../footer.php'); ?>

  </body>
</html>
