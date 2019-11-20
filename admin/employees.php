<?php
session_start();
include '../db/db.php';

if($_SESSION['loggedin'] = True && $_SESSION['role'] == 'Admin') {

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
          <a href="adminhome.php"><li>Home</li></a>
          <a href="patientinfo.php"><li>Patient Info</li></a>
          <a href="patientsearch.php"><li>Patient Search</li></a>
          <a href="appointments.php"><li>Appointments</li></a>
          <a href="employees.php"><li>Employees</li></a>
          <a href="report.php"><li>Report</li></a>
      </div>
      </div>
      <form class="x" method="post">
        <button class="x" type="submit" name="logout"><li style="list-style: none;">Logout</li></button>
      </form>
      <h1>Employees</h1>
    </div>

  <div class="col-3 right">
    <div class="regform">
      <form method="post">
          <div class="">
            <label for="">Employee ID</label>
            <input onchange="yesnoCheck(this);" type="text" name="p_id" value="">
            <span>Error</span>
          </div>
          <div class="">
            <label for="">New Salary</label>
            <input type="text" name="p_id" value="">
            <span>Error</span>
          </div>
          <button type="submit" name="ok">OK</button>
          <button type="submit" name="cancel">Cancel</button>
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
</div>


<script>
function yesnoCheck(that) {
    if (that.value == "") {

    } else {

    }
}
</script>
  </body>
</html>
