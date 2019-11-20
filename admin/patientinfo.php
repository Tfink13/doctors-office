


<?php
include '../db/db.php';
session_start();
if($_SESSION['loggedin'] = True && $_SESSION['role'] == 'Admin') {

} else {
  header("Location: http://localhost/doctors-office");
}

if (isset(($_POST['logout']))) {
  session_destroy();
  header("Location: http://localhost/doctors-office");
}



$sql = "SELECT patient_id, u.fName, u.lName FROM patients p JOIN users u ON p.user_id = u.user_id;";
$results = mysqli_query($conn, $sql);
$users = [];
$jsUsers= [];
#echo gettype($users);
$resultCheck = mysqli_num_rows($results);
$i = 0;

if($resultCheck>0)
    while($row = mysqli_fetch_assoc($results))
        {
          array_push($users, $row);
        }
#print_r($users);
foreach ($users as $key => $value) {
  foreach ($value as $Key => $Value){
    array_push($jsUsers, $Value);
  }
}

if(empty(trim($_POST["group"]))){
    $group_err = "Please enter a group";
} else {
  $group = $_POST['group'];
}

if(empty(trim($_POST["date"]))){
    $date_err = "Please enter a date.";
} else {
  $date = $_POST['date'];
}


if (isset(($_POST['sub']))) {

  if(empty($group_err) && empty($admission_err)){

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
              header("location: http://localhost/doctors-office/");
          } else{
              echo "Something went wrong. Please try again later.";
          }
      }

      // Close statement
      mysqli_stmt_close($stmt);
  }

}



?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="../master.css">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Additional Info</title>
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
      <h1>Patient Info</h1>
    </div>

    <div class="col-3 right">
      <div class="regform">
    <form action="" method="post" accept-charset="utf-8">
      <label>Patient Id: <input type="text" value="" name="id" id="id"/></label>
      <label>Group: <input type="text" value="" name="group" id="group"/></label>
      <label>Admission Date: <input type="text" value="" name="date" id="date"/></label>
      <label>Patient Name:  <input type="text" value="" name="name" id="name"/></label>
      <button type="submit" name="sub">OK</button>
      <button type="submit" name="cancel">Cancel</button>

    </form>
  </div>
</div>
    <div id="target" hidden>
<?php

  foreach($jsUsers as $key => $value){
    echo $value . "  ";
  }


?>
    </div>
<?php
echo "
<script>
  let target = document.getElementById('target').innerText.split(' ');
  let input = document.getElementById('id');
  input.addEventListener('blur', (event) =>{
    let Pname = document.getElementById('name');
    if(target.includes(input.value)){
      for(let i=0; i<target.length; i++){
        if(input.value == target[i]){
          Pname.value = target[i+1] + ' ' + target[i+2];
        }
      }
    }
  });
</script>
"
?>

<?php require('../footer.php') ?>
  </body>
</html>
