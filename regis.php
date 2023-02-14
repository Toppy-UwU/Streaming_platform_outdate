<?php
include 'conn.php';

$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
$con_pass = $_REQUEST['con_password'];

if ($password == $con_pass) {
    $sql = "INSERT INTO users (U_name, U_mail, U_pass, U_type, U_vid, U_pro_pic) 
    VALUES ('$name', '$email', '$password', 'user', '0', '')";
    // mysqli_query($conn, $sql);
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}

header("Location: login.php");
exit;


?>