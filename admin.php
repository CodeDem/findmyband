<?php
include("includes/header.php");
require 'includes/form_handler/login_handler.php';
 ?>
 <html>
 <head>
   <title>Admin</title>
   <link rel="stylesheet" href="./assets/css/register_style.css">
   <link rel="stylesheet" href="assets/css/bootstrap.css">
   <script src="assets/js/jquery.js"></script>
   <script src="assets/js/register.js"></script>
   <script src="assets/js/bootstrap.js"></script>
 </head>

 <body>
   <?php
   if (isset($_POST['submit'])) {
     echo '
     <script>
       $(document).ready(function(){
         $("#first").hide();
         $("#second").show();
       });
     </script>
     ';
   }
    ?>
   <div class="wrapper" style="background-image(url"back.jpg");">
       <div class="login_box">
         <div class="login_header">
           <h1>FindMyBand</h1>
           Login or Signup Below!
         </div>
 <!----------------------------------------LOGIN FORM -------------------------------------------------------------------------------------->
              <div id="first">
                    <form action="register.php" method="post">

                      <!----------------------LOGIN EMAIL ID--------------------------------------------------->
                      <div >
                        <input type="email" class="input_style" name="log_email" placeholder="Email Address" value="
                        <?php
                          if(isset($_SESSION['log_email']))
                            {
                              echo $_SESSION['log_email'];
                           }
                         ?>" required>
                       </div>
                       <!--------------------LOGIN PASSWORD ------------------------------------------------------>
                        <div >
                          <input type="password" class="input_style" name="log_password" placeholder="Password" >
                        </div>
                        <!--------------------LOGIN SUBMIT---------------------------------------------------->
                        <div >
                          <input type="submit" name="login_button" value="Login">
                          <?php
                            if (in_array($log_invalid,$error_message)) echo $log_invalid."<br>";
                          ?>
                        </div>

                       <a href="#" id="signup" onclick="signup()" class="signup">Need an Account? Register Here!</a>
                     </form>
              </div>
            </script>





           </div>
      </body>
    </html>
