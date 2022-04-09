<?php

   include'../../controller/config.php';
   session_start();

   if(isset($_POST['submit'])) {
 
      $email      = $_POST['email'];
      $password   = $_POST['password']; 

      $sql    = mysqli_query($con,"SELECT * FROM access WHERE email = '$email' AND password = '$password'");
     
      $row    = mysqli_fetch_array($sql);

      $count  = mysqli_num_rows($sql);
     
      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {
        
         $admin_id    = $row['id'];
         $email       = $row['email'];
         
         $_SESSION['admin']    = $email;
         $_SESSION['admin_id'] = $admin_id;
         
         header("location: ../index.php");

      }else {

           // $_SESSION['err_login'] = 'Your Email or Password is invalid';

            header("location: ../login.php?err");

            

      }

   }

?>