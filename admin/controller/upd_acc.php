<?php

   include'../../controller/config.php';
   
   if(isset($_POST['submit'])) {
   
    $email    = $_POST['email']; 
    $password = $_POST['password']; 
    
    $sql = mysqli_query($con,"UPDATE access SET email='$email',password='$password' WHERE id='1'"); 
    
    header('Location : ../edit_acc.php?succ');

  
   }

?>