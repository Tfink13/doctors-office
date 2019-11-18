<?php
include 'db.php';

$email_err = $password_err = "";
$username_err = "";
$family_code_err = $emer_con_err = $rel_con_err = "";


if (isset(($_POST['sub']))) {

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



// Registration for the users table

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
  }




if($_SERVER["REQUEST_METHOD"] == "POST"){
  //  check the three new nputs for patients
  if(empty(trim($_POST["familyCode"]))){
      $family_code_err = "Please enter a family code.";
  } else {
    $familyCode = $_POST['familyCode'];
  }

  if(empty(trim($_POST["EmerCon"]))){
      $emer_con_err = "Please enter a emergency contact.";
  } else {
    $emerCon = $_POST['EmerCon'];
  }

  if(empty(trim($_POST["RelCon"]))){
      $rel_con_err = "Please enter the realtion to emergency contact.";
  } else {
    $relCon = $_POST['RelCon'];
  }

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



// Registration for the users table

  // Check input errors before inserting in database
  if(empty($family_code_err) && empty($emer_con_err) && empty($rel_con_err)){

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

            $ssql = "SELECT user_id FROM users WHERE email = ?";

            if($sstmt = mysqli_prepare($conn, $ssql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($sstmt, "s", $param_email);
                // Set parameters
                $param_email = $email;
                if(mysqli_stmt_execute($sstmt)){
                    // Store result
                    mysqli_stmt_store_result($sstmt);
                    // Check if email exists
                    if(mysqli_stmt_num_rows($sstmt) == 1){
                      mysqli_stmt_bind_result($sstmt, $user_id);
                      if(mysqli_stmt_fetch($sstmt)){
                        $u_id = $user_id;

                        $isql = "INSERT INTO patients (user_id, family_code, emergency_contact, relation_to_contact) VALUES (?, ?, ?, ?)";
                        if($istmt = mysqli_prepare($conn, $isql)){
                          mysqli_stmt_bind_param($istmt, "ssss", $param_user_id, $param_familyCode, $param_emer_con, $param_rel_emer_con);
                          $param_user_id = $u_id;
                          $param_familyCode = $familyCode;
                          $param_emer_con = $emerCon;
                          $param_rel_emer_con  = $relCon;
                          if(mysqli_stmt_execute($istmt)){
                            header("location: index.php");
                          } else {
                            echo "Something went wrong. Please try again later.";
                          }
                        }
                        // Close statement
                        mysqli_stmt_close($istmt);
                      }
                    } else {
                      // Display an error message if username doesn't exist
                      $username_err = "No account found with that email.";
                  }
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                  }
              }
              // Close statement
              mysqli_stmt_close($sstmt);
          } else{
              echo "Oops! Something went wrong. Please try again later.";
            }
          }
          // Close statement
          mysqli_stmt_close($stmt);
        }
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
            <select onchange="yesnoCheck(this);" class="role" name="role">
              <option>Doctor</option>
              <option value="Patient">Patient</option>
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

              <div id="ifYes" style="display: none;">
                <label>Famiily Code(For Patient Family Member)</label>
                <input type="text" id="car" name="familyCode" /><br />
                <span class="help-block"><?php echo $family_code_err; ?></span>
              </div>
              <div id="ifYe" style="display: none;">
                <label for="car">Emergency Contact</label>
                <input type="text" id="car" name="EmerCon" /><br />
                <span class="help-block"><?php echo $emer_con_err; ?></span>
              </div>
              <div id="ifY" style="display: none;">
                <label for="car">Relation to Emergency Contact</label>
                <input type="text" id="car" name="RelCon" /><br />
                <span class="help-block"><?php echo $rel_con_err; ?></span>
              </div>

              <!-- Submit buttons -->
              <div class="regsub">
              <button id="regsub" type="submit" name="sub">Submit</button>
              </div>
              <div id="ins_patient" class="regsub" style="display: none;">
              <button type="submit" name="patient_sub"k>Submit</button>
              </div>


        </form>
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

    function yesnoCheck(that) {
        if (that.value == "Patient") {
          document.getElementById("ins_patient").style.display = "block";
          document.getElementById("regsub").style.display = "none";
          document.getElementById("ifYes").style.display = "block";
          document.getElementById("ifYe").style.display = "block";
          document.getElementById("ifY").style.display = "block";
        } else {
            document.getElementById("ifYes").style.display = "none";
        }
    }
    </script>
  </body>
</html>
