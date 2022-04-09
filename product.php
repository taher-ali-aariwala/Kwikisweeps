<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Kwiki Sweepstakes Website | Design By Developer Bazaar Technology</title>

    <!-- site favicon -->

    <link rel="shortcut icon" type="image/png" href="assets/images/favicon.png">

    <!-- main style css link -->

    <link rel="stylesheet" href="assets/css/style.css">

    <!-- responsive css link -->

    <link rel="stylesheet" href="assets/css/responsive.css">

    <!-- Twitter Meta Property Started -->

    <meta property="twitter:image" content="assets/images/favicon.png"/>

    <meta property="twitter:image:width" content="350"/>

    <meta property="twitter:image:height" content="597"/>

    <meta name="twitter:domain" content="Kwiki Sweepstakes"/>

</head>

<body>

  <!--  header-section start  -->

  <?php include('assets/include/header.php'); ?>

  <!--  header-section end  -->

  <!-- inner-page-banner start -->

  <section class="breadcrumb-page-title">

    <div class="container-fluid">

      <div class="row">

        <div class="col-lg-12 p-0">

          <div class="inner-page-banner-area">

            <img src="assets/images/inner-page-bg.jpg" class="img-fluid">

          </div>

        </div>

      </div>

    </div>

  </section>

  <!-- inner-page-banner end -->



  <!-- Featured Kwikis-section start -->

    <section class="section-padding">

      <div class="container">

        <div class="row justify-content-center">

          <div class="col-lg-8">

            <div class="section-header text-center">

              <h2 class="section-title">Featured Kwikis</h2>

            </div>

          </div>

        </div>

        <div class="row">

          <?php
          include'controller/config.php';
         

          if(!isset($_GET['search'])){

          $get = mysqli_query($con,"SELECT * FROM contest WHERE status='1'");
         
          }else{
          $search = $_GET['search'];
          $get = mysqli_query($con,"SELECT * FROM contest WHERE title LIKE '%$search%' AND status='1'");

          }

          $count_kiwi = mysqli_num_rows($get);
          while($getdata = mysqli_fetch_array($get)){
          
          $access_id = $getdata['access_id'];
          $upload    = mysqli_query($con,"Select * FROM uploads WHERE username='$access_id' ORDER BY username ASC LIMIT 1");
          $getimg    = mysqli_fetch_array($upload);
          
          $title = strlen($getdata['title']);
          $kwiki_short   = strlen($getdata['kwiki_short']);


          $extention = explode('.', $getimg['files']);
          $type      = $extention[1];
           
          ?>

          <div class="col-lg-4 col-md-6">

            <div class="kiwi-contest text-center">
               <?php 
               if($type == 'mp4'){
               ?>
               <video width="100%" height="200px" controls>
              <source src="controller/files/<?php echo $getimg['files'];?>" type="video/mp4">
              </video>
             <?php }else{ ?>


              <img src="controller/files/<?php echo $getimg['files'];?>" alt="image">
              
              <?php } ?>

              <h5 class="title mt-3"><?php if($title > 30 ){ echo substr($getdata['title'],0,30)."..."; }else{ echo $getdata['title']; }?></h5>

              <!-- <p class="mt-3"><?php echo substr($getdata['kwiki_short'],0,135)."...";?></p> -->
              <p class="mt-3"><?php if($kwiki_short > 100 ){ echo substr($getdata['kwiki_short'],0,100)."..."; }else{ echo $getdata['kwiki_short']; }?></p>

              <a href="product-listing.php?<?php echo $getdata['socialmedia_uname'];?>" class="btn-grad">View Kwiki</a>

            </div>

          </div><!-- kiwi-end -->

          <?php } ?>
          
            <?php
              
            if($count_kiwi == 0){ ?>
            
            <div class="col-lg-12 text-center mt-5">     
            <img src="assets/images/nodata.gif" width="500px" style="">
            </div> 
            
            <?php } ?>
          
        </div>

      </div>

    </section>

  <!-- Featured Kwikis start -->

 

  <!-- footer-section start -->

  <?php include('assets/include/footer.php'); ?>

  <!-- Js start -->

  <?php include('assets/include/js.php'); ?>

</body>



</html>