<?php
ob_start(); //strats output buffering
session_start();

$timezone = date_default_timezone_set("Asia/Kolkata");
$con = mysqli_connect("localhost","root","","findmyband"); //connection variable
    if(mysqli_connect_error())
    {
      echo "failed to connect to database: ".mysqli_connect_error();
    }

 ?>
