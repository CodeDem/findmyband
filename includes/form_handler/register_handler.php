<?php

//variable declaration
$fname="";
$lname="";
$email="";
$birthDate="";
$date ="";
$signup_date= date("y-m-d");
$password1="";
$password2="";
$error_message=array();//to hold registration error
$username = "";
$reg_sucessfull = "<span style='color:blue'>Great! Now you are all set to Login</span><br>";

//variable for error Message
$email_check = '<div >Email ID already in use</div>';


$email_valid = '<div>Email ID Format Incorrect</div>';


$password_match = '<div>Password did not match</div>';


$password_type = '<div>your password can contain only letters and numbers</div>';


$fname_valid = '<div>Warning! Fisrt Name must be between 2 and 25 characters!</div>';

$lname_valid ='<div>Last Name must be between 2 and 25 characters</div>';


$username_check = '<div>Username already taken</div>';

if (isset($_POST["submit"])) {
    //first name
    $fname = strip_tags($_POST['fname']);
    $fname = ucfirst(strtolower($fname));
    $fname = str_replace(' ', '', $fname);
    $_SESSION['fname'] = $fname ; //stores first name into session variable

    //last name
    $lname = strip_tags($_POST['lname']);
    $lname = ucfirst(strtolower($lname));
    $lname = str_replace(' ', '', $lname);
    $_SESSION['lname'] = $lname ; //stores last name into session variable

    //username
    $username = strip_tags($_POST['username']);
    $username = ucfirst(strtolower($username));
    $username = str_replace(' ', '', $username);
    $_SESSION['username'] = $username ;


    //Email Address
    $email = strip_tags($_POST['email']);
    $_SESSION['email'] = $email ; //storesemail adress into session

    //password 1
    $password1=strip_tags($_POST['password1']);
    $_SESSION['password1'] = $password1 ; //stores password1 into session variable

    //password 2
    $password2=strip_tags($_POST['password2']);
    $SESSION['password2'] = $password2 ; //stores password2 into session variable



    //password validation
        if ($password1 == $password2) {
            if (preg_match('/[A-Za-z0-9]/', $password1)) {
            } else {
                array_push($error_message, $password_type);
            }
        } else {
            array_push($error_message, "$password_match");
        }

      //email Validation
          if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $email = filter_var($email, FILTER_VALIDATE_EMAIL);


                        //Email ID validation for existing data
                        $e_check = mysqli_query($con, "SELECT user_email FROM users WHERE user_email='$email'");
                        //count the number of row returned
                        $e_row = mysqli_num_rows($e_check);
              if ($e_row > 0) {
                  array_push($error_message, $email_check);
              }
          }

    //First name validation
    if (strlen($fname) > 25 || strlen($fname) < 2) {
        array_push($error_message, $fname_valid);
    }
    //last name Validation
    if (strlen($lname) > 25 || strlen($lname) < 2) {
        array_push($error_message, $lname_valid);
    }
    //username check for existing data
    $u_check = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");
    $u_row = mysqli_num_rows($u_check);
    if ($u_row > 0) {
        array_push($error_message, $username_check);
    }

    if (empty($error_message)) {
        $password1 = md5($password1); //encrypting password before sending it to database
      //Profile picture assignment
      $rand = rand(1, 15);
        if ($rand == 1) {
            $profile_pic = "./assets/images/profile_pics/defaults/head_alizarin.png";
        } elseif ($rand == 2) {
            $profile_pic = "./assets/images/profile_pics/defaults/head_amethyst.png";
        } elseif ($rand == 3) {
            $profile_pic = "./assets/images/profile_pics/defaults/head_belize_hole.png";
        } elseif ($rand == 4) {
            $profile_pic = "./assets/images/profile_pics/defaults/head_carrot.png";
        } elseif ($rand == 5) {
            $profile_pic = "./assets/images/profile_pics/defaults/head_deep_blue.png";
        } elseif ($rand == 6) {
            $profile_pic = "./assets/images/profile_pics/defaults/head_emerald.png";
        } elseif ($rand == 7) {
            $profile_pic = "./assets/images/profile_pics/defaults/head_green_sea.png";
        } elseif ($rand == 8) {
            $profile_pic = "./assets/images/profile_pics/defaults/head_nephritis.png";
        } elseif ($rand == 9) {
            $profile_pic = "./assets/images/profile_pics/defaults/head_pete_river.png";
        } elseif ($rand == 10) {
            $profile_pic = "./assets/images/profile_pics/defaults/head_pomegranate.png";
        } elseif ($rand == 11) {
            $profile_pic = "./assets/images/profile_pics/defaults/head_pumpkin.png";
        } elseif ($rand == 12) {
            $profile_pic = "./assets/images/profile_pics/defaults/head_red.png";
        } elseif ($rand == 13) {
            $profile_pic = "./assets/images/profile_pics/defaults/head_sun_flower.png";
        } elseif ($rand == 14) {
            $profile_pic = "./assets/images/profile_pics/defaults/head_turqoise.png";
        } elseif ($rand == 15) {
            $profile_pic = "./assets/images/profile_pics/defaults/head_wet_asphalt.png";
        } elseif ($rand == 16) {
            $profile_pic = "./assets/images/profile_pics/defaults/head_wisteria.png";
        }

        $query = mysqli_query($con, "INSERT INTO users VALUES('','$fname','$lname','$email','$password1','$username','$signup_date','$profile_pic','0','0','no',',Admin,')");
        $data = mysqli_query($con, "SELECT friend_array from users WHERE username='Admin'");
        $row = mysqli_fetch_array($data);
        $friend = $row['friend_array'];
        $friend = $friend.$username.',';
        $query = mysqli_query($con, "UPDATE users SET friend_array='$friend' WHERE username='Admin' ");

        array_push($error_message, $reg_sucessfull);
    }
}
