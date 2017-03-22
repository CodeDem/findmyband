<?php
require '../../config/config.php';

if (isset($_GET['u_name'])) {
    $u_name = $_GET['u_name'];
}
if (isset($_POST['result'])) {
    if ($_POST['result'] == 'true') {
        $query1 = mysqli_query($con, "DELETE FROM users  WHERE username='$u_name'");
        $query2 = mysqli_query($con, "DELETE FROM posts  WHERE added_by='$u_name'");
        $query3= mysqli_query($con, "DELETE FROM comments  WHERE posted_by='$u_name'");
        $query4= mysqli_query($con, "DELETE FROM messages  WHERE user_to='$u_name' OR user_from='$u_name'");
        $query4= mysqli_query($con, "DELETE FROM notifications  WHERE user_to='$u_name' OR user_from='$u_name'");
    }
}
?>
