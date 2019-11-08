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


if (isset($form_data)) {
    $result = dbInsert($conn, "users", $form_data);
}
?>
