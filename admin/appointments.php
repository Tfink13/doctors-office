<!-- Join the users and employess tables in php -->
<?php
session_start();
include '../db/db.php';


if($_SESSION['loggedin'] = True && $_SESSION['role'] == 'Admin' && $_SESSION['approved'] == 1) {

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

# insert form data to db

if (isset(($_POST['sub']))) {
  $patient_id = $_POST['id'];
  $dr_name = $_POST['dname'];
  $date = $_POST['date'];
  $comment = $_POST['comment'];
  $morn_med = $_POST['morning'];
  $afternoon_med = $_POST['afternoon'];
  $night_med = $_POST['night'];
  $med_given = $_POST['given'];

  $sql = "INSERT INTO appointments (patient_id, dr_name, date, comment, morn_med, afternoon_med, night_med, med_given) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
  if($stmt = mysqli_prepare($conn, $sql)) {
    mysqli_stmt_bind_param($stmt, "ssssssss", $patient_id, $dr_name, $date, $comment, $morn_med, $afternoon_med, $night_med, $med_given);
    mysqli_stmt_execute($stmt);
    echo "<h1>".print_r($stmt)."</h1>";
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
  }
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
          <a href="payment.php"><li>Payment</li></a>
      </div>
      </div>
      <form class="x" method="post">
        <button class="x" type="submit" name="logout"><li style="list-style: none;">Logout</li></button>
      </form>
      <h1>Appointments</h1>
    </div>

    <div class="col-3 right">
      <div class="regform">
    <form  method="post" accept-charset="utf-8">
      <label>Patient Id:</label>
      <input type="text" name="id" id="id"/>

      <label>Date:</label>
      <input type="date" name="date" id="date"/>

      <label>Patient Name:</label>
      <input type="text" name="pname" id="pname"/>

      <label>Comment:</label>
      <input type="text" name="comment" id="comment"/>

      <label>Morning Med:</label>
      <input type="text" name="morning" id="morning"/>

      <label>Afternoon Med:</label>
      <input type="text" name="afternoon" id="pname"/>

      <label>Night Med:</label>
      <input type="text" name="night" id="night"/>

      <label>Med Given:</label>
      <input type="text" name="given" id="given"/>
      <div>
        <label>Doctor</label>
        <br>
        <select class="dname" name="dname">
          <option>Doctor</option>
          <option>dr 1</option>
          <option>dr 2</option>
          <option>dr 3</option>
          <option>dr 4</option>
          <option>dr 5</option>
        </select>
      </div>
      <button type="submit" name="sub" id="sub">OK</button>
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
    let Pname = document.getElementById('pname');
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
