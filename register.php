  <?php
  require 'config/config.php';
  require 'includes/form_handler/register_handler.php';
  require 'includes/form_handler/login_handler.php';

  ?>

  <!----------------------------------------------------------HTML------------------------------------------------->
    <html>
    <head>
      <title>Registration</title>
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

<!-----------------------------------REGISTRATION FORM ----------------------------------------------------------------------------------------->
             <div id="second">
                <form action="register.php" method="POST">

                  <!---------------------FIRST NAME---------------------------------------------------------->
                    <div class="form-group">
                      <input type="text" class="input_style" name="fname" placeholder="First Name" value="<?php
                         if(isset($_SESSION['fname']))
                         {
                           echo $_SESSION['fname'];
                         }
                       ?>" />
                       <br>
                       <?php
                         if (in_array($fname_valid,$error_message))echo $fname_valid."<br>";
                       ?>
                    </div>

                  <!---------------------LAST NAME---------------------------------------------------------->
                    <div class="form-group">
                       <input type="text" class="input_style" name="lname" placeholder="Last Name" value="<?php
                         if(isset($_SESSION['lname']))
                         {
                           echo $_SESSION['lname'];
                         }
                       ?>"/><br>
                       <?php if (in_array($lname_valid,$error_message))echo $lname_valid."<br>"; ?>
                   </div>

                  <!---------------------USERNAME---------------------------------------------------------->
                   <div class="form-group">
                     <input type="text"  class="input_style" name="username" placeholder="username" /><br>
                     <?php
                     if(in_array($username_check,$error_message)) echo $username_check;
                     ?>
                  </div>

                  <!---------------------REGISTRATION EMAIL ID ---------------------------------------------------------->
                  <div class="form-group">
                    <input type="email" class="input_style" name="email" placeholder="Email Adress" value="
                    <?php
                       if(isset($_SESSION['email']))
                       {
                         echo $_SESSION['email'];
                       }
                     ?>">
                     <br>
                     <?php
                     if(in_array($email_check,$error_message))
                     {
                       echo $email_check;
                     }
                     ?>
                  </div>

                  <!---------------------REGISTRATION PASSWORD---------------------------------------------------------->
                  <div class="form-group">
                     <input type="password" class="input_style" name="password1" placeholder="password" required /><br>
                  </div>

                  <!---------------------CONFIRM REGISTRATION PASSWORD---------------------------------------------------------->
                  <div class="form-group">
                     <input type="password" class="input_style" name="password2" placeholder="confirm password" required /> <br>
                       <?php
                        if(in_array($password_type,$error_message)) echo $password_type."<br>";
                        elseif (in_array($password_match,$error_message)) echo $password_match."<br>";
                       ?>
                  </div>

                  <!---------------------REGISTRATION SUBMIT---------------------------------------------------------->
                  <div class="form-group">
                     <input type="submit" name="submit" value="  Sign up"/>
                     <?php if (in_array($reg_sucessfull,$error_message)) echo $reg_sucessfull; ?><br>
                     <a href="#" id="signin" class="signin">Already Have an Accoount? Login Here!</a>
                  </div>
                 </form>
             </div>

          </script>





         </div>
    </body>
  </html>
