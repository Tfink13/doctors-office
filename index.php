<?php

include 'db/db_connect.php';

$email = $password = "";
$username_err = $password_err = "";


// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim(@$_POST["email"]))){
        $username_err = "Please enter username.";
    } else{
        $email = trim($_POST["email"]);
    }

    // Check if password is empty
    if(empty(trim(@$_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);

    }



    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT user_id, fName, email, password, role FROM users WHERE email = ?";

        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            // Set parameters
            $param_email = $email;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $user_id, $fName, $email, $hashed_password, $role);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION['fname'] = $fName;
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $user_id;
                            $_SESSION["email"] = $email;
                            $_SESSION['role'] = $role;
                            print_r($_SESSION["loggedin"]);

                            if ($role == 'Patient') {
                              header("Location: patient/patienthome.php");
                            } elseif ($role == 'Doctor') {
                              header("Location: doctor/home.php");
                            } elseif ($role == 'Family Member') {
                              header("Location: familyhome.php");
                            } elseif ($role == 'Supervisor') {
                              header("Location: superhome.php");
                            } elseif ($role == 'Caregiver') {
                              header("Location: caregiverhome.php");
                            } elseif ($role == 'Admin') {
                              header("Location: admin/adminhome.php");
                            } else {
                              $role_err = 'You do not have access to this site.';
                            }

                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that email.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
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
      <a href="#"><li>About</li></a>
      <a href="#"><li>Contact</li></a>
    </div>
  </div>
  <h1>Doctor Josh </h1>
</div>



<div class="row">
  <div class="col-6">
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form class="login" method="post">
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group ">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit"value="Login">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form>
    </div>
  </div>


  <div class="col-3 right">
    <div class="aside">
    </div>
  </div>
</div>

<div class="footer">
  <footer>
    <ul class="foot">
        <li class="foot">
            <a class="info">Career Opportunities</a>
            <a class="info">Volunteers</a>
            <a class="info">Employees</a>
            <a class="info">Financial Assistance</a>
            <a class="info">Contact  Us</a>
            <a class="info">HIPAA and Privacy</a>
            <a class="info">Language Assistance</a>
            <a class="info"> 740 E King Street Lancaster, PA | 24-hour Switchboard: 717-777-7777</address>
        <div>
            <span>
              <a href="facebook.com"><img class="icon" src="icons/iconfinder_2018_social_media_popular_app_logo_facebook_3225194.svg" alt=""></a>
            </span>
            <span>
              <a href=""><img class="icon" src="icons/iconfinder_2018_social_media_popular_app_logo_instagram_3225191.svg" alt=""></a>
            </span>
            <span>
              <a href=""><img class="icon" src="icons/iconfinder_2018_social_media_popular_app_logo_linkedin_3225190.svg" alt=""></a>
            </span>
            <span>
              <a href=""><img class="icon" src="icons/iconfinder_2018_social_media_popular_app_logo_pinterest_3225188.svg" alt=""></a>
            </span>
            <span>
              <a href=""><img class="icon" src="icons/iconfinder_2018_social_media_popular_app_logo_twitter_3225183.svg" alt=""></a>
            </span>
            <span>
              <a href=""><img class="icon" src="icons/iconfinder_2018_social_media_popular_app_logo_youtube_3225180.svg" alt=""></a>
            </span>
        </div>
</footer>



<script>

history.pushState(null, null, document.URL);
window.addEventListener('popstate', function () {
    history.pushState(null, null, document.URL);
});

</script>


  </body>
</html>
