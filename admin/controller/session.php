<?php

   include('./../controller/config.php');
   
   session_start();

   $user_check = $_SESSION['admin'];

   $ses_sql    = mysqli_query($con,"SELECT * FROM access WHERE email ='$user_check'");
  
   $getrows= mysqli_fetch_array($ses_sql);

   
  if(!isset($_SESSION['admin'])){

     header("location:  ./login.php");

     die();

  }

?>