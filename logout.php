<?php
if (isset(($_POST['logout']))) {
  session_destroy();
  session_unset();
  header("Location: http://localhost/doctors-office/");

}
?>
