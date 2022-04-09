<?php

   include'../../controller/config.php';
   
   if(isset($_POST['submit'])) {
   
   
    $id        = $_POST['id']; 
    $admin_url = $_POST['admin_url']; 
    
    
    $sql = mysqli_query($con,"UPDATE contest SET admin_url='$admin_url'WHERE id='$id'"); 
    
    
      header('Location : ../recent_kwiki.php?succ');

  
   }

?>