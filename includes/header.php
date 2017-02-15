<?php
require 'config/config.php';
include("includes/classes/User.php");
include("includes/classes/Post.php");
include("includes/classes/Message.php");

  if (isset($_SESSION['username'])) {
      $userLoggedIn = $_SESSION['username'];
      $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username = '$userLoggedIn'");
      $user = mysqli_fetch_array($user_details_query);
  } else {
      header("Location: register.php");
  }
 ?>

 <html>
 <head>
   <title>Welcome to FindMyBand</title>
   <script src="assets/js/jquery.js"></script>
   <script src="assets/js/bootstrap.min.js"></script>
   <script src="assets/js/bootbox.min.js"></script>
   <script src="assets/js/findmyband.js"></script>
   <link rel="stylesheet" href="assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="assets/css/style.css">

 </head>

 <body>
    <div class="top_bar">
      <div class="logo">
      <a href="index.php">FindMyBand</a>
      </div>
<!-------------------------------------------NAV BAR------------------------------------------------------------------------------------------------>
      <nav>
        <a href="<?php echo $userLoggedIn;?>">
          <?php echo $user['username']; ?>
        </a>
        <a href="#"><img src="./assets/icons/home.svg" alt="Home" class="nav-icon"></a>
        <a href="#"><img src="./assets/icons/chat.svg" alt="Message" class="nav-icon"></a>
        <a href="#"><img src="./assets/icons/ring.svg" alt="Notifictions" class="nav-icon"></a>
        <a href="requests.php"><img src="./assets/icons/user.svg" alt="Settings" class="nav-icon"></a>
        <a href="#"><img src="./assets/icons/settings.svg" alt="Settings" class="nav-icon"></a>
        <a href="includes/handlers/logout.php"><img src="./assets/icons/exit.svg" alt="Log Out" class="nav-icon"></a>

      </nav>

    </div>

    <div class="wrapper">
