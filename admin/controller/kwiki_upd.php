<?php

   include'../../controller/config.php';
   
   if(isset($_POST['submit'])) {
   
   $id    = $_POST['id']; 
   $title = $_POST['title']; 
   $sdate = $_POST['sdate']; 
   $edate = $_POST['edate']; 
   $descp = $_POST['descp']; 
   $kwiki_short = $_POST['kwiki_short']; 
   $admin_url   = $_POST['admin_url']; 
    
   $fileNames   = array_filter($_FILES['files']['name']); 

   if(!empty($fileNames)){ 

      $sql1  = mysqli_query($con,"SELECT * FROM uploads WHERE username='$id'"); 
      $count = mysqli_num_rows($sql1);  
     
      if($count > 0 ){
      
      $sql2 = mysqli_query($con,"DELETE FROM uploads WHERE username='$id'"); 

      }

        
     foreach($_FILES['files']['name'] as $key=>$val){ 
         
     $f_name      = $_FILES['files']['name'][$key];
     $f_tmp       = $_FILES['files']['tmp_name'][$key];
     
     $f_size      = $_FILES['files']['size'][$key];
     $f_extension = explode('.', $f_name);
     
     $f_extension = strtolower(end($f_extension));
     
     $f_newfile   = uniqid() . '.' . $f_extension;
     
     $store       = "../../controller/files/" . $f_newfile;
     
     if ($f_extension == 'jpg' || $f_extension == 'jpeg' || $f_extension == 'png' || $f_extension == 'gif' || $f_extension == 'mp4') {
     
    
     
     if (move_uploaded_file($f_tmp, $store)) {
     } 
    
     }
     
     if(!empty($f_name)){
     
     $sql = mysqli_query($con,"INSERT INTO `uploads` (`files`, `username`) VALUES ('$f_newfile', '$id')"); 

     }

     
     }
       
 
    }

    $sql2 = mysqli_query($con,"UPDATE contest SET title='$title',sdate='$sdate',edate='$edate',descp='$descp',kwiki_short='$kwiki_short',admin_url='$admin_url' WHERE access_id='$id'"); 

    
    header('Location : ../kwiki-details-edit.php?id='.$id.'&succ');

  
   }

?>