<?php



if (isset(($_POST['regSub']))) {
  $role = $_POST['role'];
  $fname = $_POST['fName'];
  $lname = $_POST['lName'];

  $email = $_POST['email'];
  $pass = $_POST['password'];
  $phone = $_POST['phone'];
  $dob = $_POST['dob'];
  $family_code = $_POST['fc'];
  $econ = $_POST['econ'];
  $rel_to_emer = $_POST['rele'];

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
      <button type="submit" name="regSub">Submit</button>
</form>




  </body>
</html>
