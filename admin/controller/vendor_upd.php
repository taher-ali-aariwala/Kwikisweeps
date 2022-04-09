<?php

   include'../../controller/config.php';
   
   if(isset($_POST['submit'])) {
   
   
    $id    = $_POST['id']; 
    $fname = $_POST['fname']; 
    $lname = $_POST['lname']; 
    
    $socialmedia_uname = $_POST['socialmedia_uname']; 
    $alt_socail        = $_POST['alt_socail']; 
    
    $address      = $_POST['address']; 
    $address2     = $_POST['address2']; 
    
    $city         = $_POST['city']; 
    $state        = $_POST['state']; 
    $zip          = $_POST['zip']; 
    
    $email        = $_POST['email']; 
    $mobile       = $_POST['mobile']; 
    
    $bank_type    = $_POST['bank_type']; 
    $ab_number    = $_POST['ab_number']; 
    $acc_number   = $_POST['acc_number']; 
    
    
    $sql = mysqli_query($con,"UPDATE contest SET fname='$fname',lname='$lname',socialmedia_uname='$socialmedia_uname',alt_socail='$alt_socail',address='$address',address2='$address2',email='$email',mobile='$mobile',ab_number='$ab_number',bank_type='$bank_type',acc_number='$acc_number',city='$city',state='$state',zip='$zip' WHERE access_id='$id'"); 
    
    
      header('Location : ../contact-info-edit.php?id='.$id.'&succ');

  
   }

?>