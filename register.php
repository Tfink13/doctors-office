<?php
require 'db.php';



if (isset(($_POST['regSub']))) {
  $role = $_POST['role'] ?? null;
  $fname = $_POST['fName'] ?? null;
  $lname = $_POST['lName'] ?? null;
  $email = $_POST['email'] ?? null;
  $pass = $_POST['password'] ?? null;
  $phone = $_POST['phone'] ?? null;
  $dob = $_POST['dob'] ?? null;

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
    <h1>Register Page</h1>

    <main>
      <header>
          <nav>
              <ul>
                  <li><a href="home.php"> Home </a></li>
              </ul>
          </nav>
      </header>
    </main>

<form method="post">
  <div>
    <label>Role</label>
    <br>
    <select class="role" name="role">
      <option>Patient</option>
      <option>Doctor</option>
      <option>Family Memember</option>
      <option>Supervisor</option>
      <option>Caregiver</option>
    </select>
  </div>
      <div>
        <label class="tb">First Name</label>
        <input class="tb" type="text" name="fName" required>
      </div>
      <div>
        <label>Last Name</label>
        <input type="text" name="lName" required>
      </div>
      <div>
        <label>Email</label>
        <input type="text" name="email" required>
      </div>
      <div>
        <label>Phone</label>
        <input type="text" name="phone" required>
      </div>
      <div>
        <label>Password</label>
        <input type="text" name="password" required>
      </div>
      <div>
        <label>Date of Birth</label>
        <input type="text" name="dob" required>
      </div>
      <div class="regsub">
      <button type="submit" name="sub">Submit</button>
      </div>

</form>




  </body>
</html>
