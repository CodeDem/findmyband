<?php
include("includes/adminheader.php");
?>
<div class="user_details column">
  <a href="<?php echo $userLoggedIn; ?>">  <img src="<?php echo $user['profile_pic']; ?>"> </a>

  <div class="user_details_left_right">
    <a href="<?php echo $userLoggedIn; ?>">
    <?php
          echo $user['first_name'] ;

    ?>
    </a>
    <br>
    <?php echo "Posts: " . $user['num_posts']. "<br>";
          echo "Likes: " . $user['num_likes'];

          ?>
  </div>

</div>

<?php $userlist = mysqli_query($con, "SELECT * FROM users WHERE username != 'Admin'");
if (mysqli_num_rows($userlist) > 0) {
  while($row = $userlist->fetch_assoc())  {
    $u_name=$row['username'];
    $str="<div class='main_column column'>
       <div class='status_post'>
         <span> <b>Name</b>:".$row['first_name'].$row['last_name']."</span> </br>
         <span> <b>Email</b>:".$row['user_email']."</span></br>
         <span> <b>Signup date</b>:".$row['signup_date']."</span></br>
         <span> <b>Username</b> :".$row['username']."</span></br>
         <input type='button' value='Ban' id='u$u_name' style='border-radius:5px;background-color:#e64a19;border:none;font-family:sans-serif'>
       </div>
     </div>";
     echo $str;
     ?>
     <script>
     $(document).ready(function(){
       $('#u<?php echo $u_name; ?>').on('click',function() {
         bootbox.confirm("Are you sure you want ban this User",function(result){

           $.post("includes/form_handler/ban.php?u_name=<?php echo $u_name; ?>",{result:result});
           if (result) {
             location.reload();
           }
         });
       });
     });
     </script>
     <?php

       }
   } else {
       echo "0 results";
   }
   $con->close();
 ?>
