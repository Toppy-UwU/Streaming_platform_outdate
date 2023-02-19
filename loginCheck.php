<?php
  include 'conn.php';
  include 'log.php';

  $email = $_POST['email'];
  $password = $_POST['password'];

  // session_start();
  // if(isset($_SESSION['mail'])){
  //   session_reset();
  //   $_SESSION['mail'] = $email;
  // }else {
  //   $_SESSION['mail'] = $email;
  // }
  // Get the form data
  

  // Create and execute a MySQL query
  $sql = "SELECT * FROM users WHERE U_mail='$email' AND U_pass='$password'";
  $result = mysqli_query($conn, $sql);

  // If a match is found, log the user in
  if (mysqli_num_rows($result) == 1) {
    session_start();
    $_SESSION['logged_in'] = true;
    $sqlGet = "SELECT * FROM users WHERE U_mail = '$email'";
    $userResult = mysqli_query($conn, $sqlGet);
    $data = $userResult->fetch_assoc();
    $_SESSION['U_ID'] = $data['U_ID'];
    $_SESSION['U_name'] = $data['U_name'];
    $_SESSION['type'] = $data['U_type'];
    $_SESSION['upload_permit'] = $data['U_permit'];
    log_in_out('login', $conn);
    header("Location: home.php");
  } else {
    // Redirect the user back to the login page with an error message
    header("Location: login.php");
  }
  
  // Close the connection
  mysqli_close($conn);
?>
