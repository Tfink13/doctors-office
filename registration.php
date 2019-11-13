<?php
include 'db.php';

$email_err = $password_err = "";


if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["email"]))){
        $username_err = "Please enter a email.";
    } else{
        // Prepare a select statement
        $sql = "SELECT * FROM users WHERE email = ?";

        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            // Set parameters
            $param_email = trim($_POST["email"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This email is already taken.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) > 10){
        $password_err = "Password must be less than 10 characters.";
    } else{
        $password = trim($_POST["password"]);
    }

    $role = $_POST['role'];
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];




    // Check input errors before inserting in database
    if(empty($email_err) && empty($password_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO users (role, fName, lName, email, phone, password, dob) VALUES (?, ?, ?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssss", $param_role, $param_fName, $param_lName, $param_email, $param_phone, $param_password, $param_dob);

            // Set parameters
            $param_role = $role;
            $param_fName = $fName;
            $param_lName = $fName;
            $param_email = $email;
            $param_phone = $phone;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_dob = $dob;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: index.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($conn);
}



 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="master.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body onLoad="noBack();" onpageshow="if (event.persisted) noBack();" onUnload="">

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

    <div class="col-3 right">
      <div class="regform">
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
              <option>Admin</option>
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
                <span class="help-block"><?php echo $email_err; ?></span>
              </div>
              <div>
                <label>Phone</label>
                <input type="text" name="phone" required>
              </div>
              <div>
                <label>Password</label>
                <input type="text" name="password" required>
                <span class="help-block"><?php echo $password_err; ?></span>
              </div>
              <div>
                <label>Date of Birth</label>
                <input type="text" name="dob" required>
              </div>
              <div class="regsub">
              <button type="submit" name="sub">Submit</button>
              </div>

        </form>
      </div>
    </div>


  </body>
</html>
