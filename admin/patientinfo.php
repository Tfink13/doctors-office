


<?php
include '../db/db.php';
session_start();
$date_err = "";
$group_err = "";
 $pat_err = "";

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



if ((isset($_POST['sub']))) {
  $date = $_POST['adDate'];
  $pat = $_POST['id'];
  $group = $_POST['group'];


  if(empty(trim($_POST["id"]))){
      $pat_err = "Please enter a group";
  } else {
    $pat = $_POST['id'];
  }

  if(empty(trim($_POST["group"]))){
      $group_err = "Please enter a group";
  } else {
    $group = $_POST['group'];
  }
  if(empty(trim($_POST['adDate']))) {
    $date_err = "Please enter a date";
  } else {
    $date = $_POST['adDate'];
  }


  if(empty($group_err) && empty($date_err) && empty($pat_err)){
    $sql = "UPDATE patients SET `groups` = ?, `admission_date` = ? WHERE `patient_id` = ?;";
    if($stmt = mysqli_prepare($conn, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "sss", $param_group, $param_date, $param_idd);

        // Set parameters
        $param_group = $group;
        $param_date = $date;
        $param_idd = $pat;

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            /* store result */
            mysqli_stmt_store_result($stmt);

            if(mysqli_stmt_num_rows($stmt) != 1){
                $patient_err = "That patient does not exist";
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
          <a href="employees.php"><li>Update Salaries</li></a>
          <a href="addemployees.php"><li>Add Employees</li></a>
          <a href="report.php"><li>Report</li></a>
          <a href="payment.php"><li>Payment</li></a>
      </div>
      </div>
      <form class="x" method="post">
        <button class="x" type="submit" name="logout"><li style="list-style: none;">Logout</li></button>
      </form>
      <h1>Patient Info</h1>
    </div>

    <div class="col-3 right">
      <div class="regform">
    <form  method="post" accept-charset="utf-8">
      <label>Patient Id: </label>
      <input type="text" value="" name="id" id="id"/>
      <span><?php echo $pat_err; ?></span><br>
      <label>Group:</label>
      <input type="text" value="" name="group" id="group"/>
      <span><?php echo $group_err; ?></span><br>
      <label>Admission Date:</label>
      <input type="date" name="adDate" id="date">
      <label>Patient Name:  <input type="text" value="" name="name" id="name"/></label>

      <button type="submit" name="sub">OK</button>
      <button type="submit" name="cancel">Cancel</button>

    </form>
  </div>

<<<<<<< HEAD
<?php require "../footer.php" ?>
<script>
function yesnoCheck(that) {
    if (that.value == "") {
=======
</div>
    <div id="target" hidden>
<?php

  foreach($jsUsers as $key => $value){
    echo $value . "  ";
  }
>>>>>>> origin/employees


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
<<<<<<< HEAD
</body>
=======
"
?>

<?php require('../footer.php') ?>
  </body>
>>>>>>> origin/employees
</html>
