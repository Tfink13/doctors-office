<?php 
require "db.php";

    $form_data = array(
        'user_id' => '',
        'role' => $_POST['role'] ?? null,
        'fName' => $_POST['fName'] ?? null,
        'lName' => $_POST['lName'] ?? null,
        'email' => $_POST['email'] ?? null,
        'phone' => $_POST['phone'] ?? null,
        'password' => $_POST['password'] ?? null,
        'dob' => $_POST['dob'],
        'approved' => false
    ) ?? null;


    if (@$_POST['password'] != null) {
    $result = dbInsert($conn, 'users', $form_data);
    }
    

?>
