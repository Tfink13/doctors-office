<?php 
require "db.php";


$form_data = array(
    'user_id' => '',
    'role' => @$_POST["role"],
    'fName' => @$_POST["fName"],
    'lName' => @$_POST["lName"],
    'email' => @$_POST["email"],
    'phone' => @$_POST["phone"],
    'password' => @$_POST["password"],
    'dob' => @$_POST["dob"],
    'approved' => false
) ?? null;

$tablename = "users";

if ($form_data) {
    $result = dbInsert($conn, $tablename, $form_data);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
    <body>
        <form action='#' method="post">
           Role: <input input type="text" name="role">
           First Name <input input type="text" name="fName">
           Last Name <input type="text" name="lName">
           Email <input type="text" name="email">
          Phone: <input type="text" name="phone">
            Password: <input type="text" name="password">
            Date of Birth: <input type="text" name="dob">
            <input type="submit">
        </form>
</body>
</html>