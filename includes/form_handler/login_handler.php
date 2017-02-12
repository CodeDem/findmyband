<?php

//error variable declaration
$log_invalid="Email ID or Password Invalid<br>";
if (isset($_POST['login_button'])) {

  //Login form Variable declaration
  $email = filter_var($_POST['log_email'],FILTER_SANITIZE_EMAIL); //email format check
  $SESSION['log_email'] = $email;//saving email into session

  $password = md5($_POST['log_password']);//get password with encryption



  $check_database_query = mysqli_query($con,"SELECT * FROM users WHERE user_email='$email' AND password='$password'");
  $check_login_query = mysqli_num_rows($check_database_query);
  if ($check_login_query == 1) {
    $row = mysqli_fetch_array($check_database_query);
    $username = $row['username'];

    $user_closed_query = mysqli_query($con,"SELECT * FROM users WHERE user_email='$email' AND user_closed='yes'");
    if (mysqli_num_rows($user_closed_query)== 1) {
      $reopen_account = mysqli_query($con,"UPDATE users SET user_closed='no' WHERE user_email='$email'");
    }
    $_SESSION['username'] = $username;
    header("Location: index.php");
    exit();
  }
  else {
    array_push($error_message,$log_invalid);
  }
}


 ?>
