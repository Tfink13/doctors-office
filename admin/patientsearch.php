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
          <a href="employees.php"><li>Update Salaries</li></a>
          <a href="addemployees.php"><li>Add Employees</li></a>
          <a href="report.php"><li>Report</li></a>
      </div>
      </div>
      <form class="x" method="post">
        <button class="x" type="submit" name="logout"><li style="list-style: none;">Logout</li></button>
      </form>
      <h1>Patient Search</h1>
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
  </body>
</html>


<?php


if($_SERVER["REQUEST_METHOD"] == "GET"){



  $ssql = "SELECT p.patient_id, role, fName, Lname, email, approved FROM users JOIN patients p WHERE approved = '1' AND role = 'Patient';";
  $result = mysqli_query($conn, $ssql);


  if ($result) {
    echo "<p class='users'>Applicants</p>";
    echo "<div id='table-scroll'><table border='1' background-color: #0099cc>
    <tr border ='1'>
    <td class='col' border='1'>Patient_id</td>
    <td class='col' border='1'>Role</td>
    <td class='col' border='1'>First Name</td>
    <td class='col' border='1'>Last Name</td>
    <td class='col' border='1'>Email</td>
    <td class='col' border='1'>Approved</td>
    </tr>";
    while ($row = mysqli_fetch_row($result)) {

      echo "<tr border='1' text-align = 'center'>";

      foreach ($row as $field => $value) {
        echo "<td border='1' width = '50px' text-align = 'center'>" . $value . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
  }
}




 ?>
