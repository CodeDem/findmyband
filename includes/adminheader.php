<?php
require 'config/config.php';
include("includes/classes/User.php");
include("includes/classes/Post.php");
include("includes/classes/Message.php");
include("includes/classes/Notification.php");

  if (isset($_SESSION['username'])) {
      $userLoggedIn = $_SESSION['username'];
      $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username = '$userLoggedIn'");
      $user = mysqli_fetch_array($user_details_query);
  } else {
      header("Location: adminlog.php");
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
      <a href="admin.php">FindMyBand</a>
      </div>
<!-------------------------------------------NAV BAR------------------------------------------------------------------------------------------------>
      <nav>

        <?php
        //unread messages
        $messages = new Message($con, $userLoggedIn);
        $num_messages = $messages->GetUnreadNumber();

        //unread notifications
        $notifications = new Notification($con, $userLoggedIn);
        $num_notifications = $notifications->GetUnreadNumber();

         ?>
        <a href="<?php echo $userLoggedIn;?>">
          <?php echo $user['username']; ?>
        </a>
        <a href="admin.php"><img src="./assets/icons/home.svg" alt="Home" class="nav-icon"></a>
        <a href="javascript:void(0);" onclick="getDropdownData('<?php echo $userLoggedIn;?>', 'message')"><img src="./assets/icons/chat.svg" alt="Message" class="nav-icon">
          <?php
          if ($num_messages > 0)
          echo '<span class="notification_badge" id="unread_message">'.$num_messages.'</span>';
            ?>
        </a>
        <a href="javascript:void(0);" onclick="getDropdownData('<?php echo $userLoggedIn;?>', 'notification')"><img src="./assets/icons/ring.svg" alt="Notifictions" class="nav-icon">
          <?php
          if ($num_notifications > 0)
          echo '<span class="notification_badge" id="unread_notification">'.$num_notifications.'</span>';
            ?>
        </a>
        <a href="userlist.php"><img src="./assets/icons/user.svg" alt="user" class="nav-icon"></a>
        <a href="#"><img src="./assets/icons/settings.svg" alt="Settings" class="nav-icon"></a>
        <a href="includes/handlers/admin/adminlogout.php"><img src="./assets/icons/exit.svg" alt="Log Out" class="nav-icon"></a>

      </nav>

      <div class="dropdown_data_window" style="height:0px;border:none;">
        <input type="hidden" id="dropdown_data_type" name="" value="">
      </div>
    </div>

    <script>
  	var userLoggedIn = '<?php echo $userLoggedIn; ?>';

  	$(document).ready(function() {

  		$('.dropdown_data_window').scroll(function() {
  			var inner_height = $('.dropdown_data_window').innerHeight(); //Div containing datat
  			var scroll_top = $('.dropdown_data_window').scrollTop();
  			var page = $('.dropdown_data_window').find('.nextPageDropdownData').val();
  			var noMoreData= $('.dropdown_data_window').find('.noMoreDropdownData').val();

  			if ((scroll_top + inner_height >= $('.dropdown_data_window')[0].scrollHeight) && noMoreData == 'false') {
          var pageName; //holds name of page to send ajax request to
          var type = $('#dropdown_data_type').val();

          if (type == 'notification') {
            pageName = "ajax_load_notifications.php"
          else if (type = 'message') {
            pageName = "ajax_load_messages.php"
          }

          }



  				var ajaxReq = $.ajax({
  					url: "includes/handlers/" + pageName,
  					type: "POST",
  					data: "page=" + page + "&userLoggedIn=" + userLoggedIn,
  					cache:false,

  					success: function(response) {
  						$('.dropdown_data_window').find('.nextPageDropdownData').remove(); //Removes current .nextpage
  						$('.dropdown_data_window').find('.noMoreDropdownData').remove(); //Removes current .nextpage
  						$('.dropdown_data_window').append(response);
  					}
  				});

  			} //End if

  			return false;

  		}); //End (window).scroll(function())


  	});

  	</script>

    <div class="wrapper">
