<?php 
require "db.php";


$form_data = array(
    'user_id' => '',
    'role' => @$role,
    'fName' => @$fname,
    'lName' => @$lname,
    'email' => @$email,
    'phone' => @$phone,
    'password' => @$pass,
    'dob' => @$dob,
    'approved' => false
) ?? null;

$tablename = "users";

if (isset($form_data)) {
    $result = dbInsert($conn, $tablename, $form_data);
}
?>
