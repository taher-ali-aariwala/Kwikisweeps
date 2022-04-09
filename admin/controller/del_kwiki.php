<?php

include('../../controller/config.php');

 if(isset($_GET['id'])) { 
     
       $id  = $_GET['id'];
     
       $sql = mysqli_query($con,"DELETE FROM contest WHERE access_id='$id'");

       header('location: ../all_kwiki.php?succ');

   }

?>