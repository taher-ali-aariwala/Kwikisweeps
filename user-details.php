<?php

include'controller/config.php';

date_default_timezone_set("America/New_York"); 
$cdate =  date('m/d/Y');


//get package
$plan      = $_GET['plan'];
$get       = mysqli_query($con,"SELECT * FROM package WHERE type='$plan'");
$getdata   = mysqli_fetch_array($get);




// get kwiki details
$access_id = $_GET['access_id'];
$getkw     = mysqli_query($con,"SELECT * FROM contest WHERE access_id='$access_id'");
$getkwiki  = mysqli_fetch_array($getkw);

$chk_page  = mysqli_num_rows($getkw);

$sdate     = $getkwiki['sdate'];
$edate     = $getkwiki['edate'];

if($chk_page > 0){
?>

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



    <meta property="twitter:image" content="assets/images/favicon.png" />



    <meta property="twitter:image:width" content="350" />



    <meta property="twitter:image:height" content="597" />



    <meta name="twitter:domain" content="Kwiki Sweepstakes" />



</head>



<body>



    <!--  header-section start  -->



    <?php include('assets/include/header.php'); ?>



    <!--  header-section end  -->



    <!-- Featured Kwikis-section start -->



    <section class="section-padding bg-light">



        <div class="container">



            <div class="row justify-content-center">



                <div class="contact-form-area col-6 bg-white p-4">

                    <h3 class="title">Payment Details</h3>

                    <form class="contact-form" method="post" action="controller/order.php">

                        <div class="form-grp">
                            <label>Full Name</label>
                            <input type="text" name="fname" id="contact_name" placeholder="Full Name" required="">

                        </div>

                        <div class="form-grp">
                            <label>Last Name</label>

                            <input type="text" name="lname" id="contact_name" placeholder="Last Name" required="">

                        </div>

                        <div class="form-grp">
                            <label>Email Address</label>

                            <input type="email" name="email" id="contact_email" placeholder="Email Address" required="">

                        </div>

                        <div class="form-grp">
                            <label>Phone No</label>

                            <input type="number" name="mobile" id="contact_phone" placeholder="Phone No" required="">

                        </div>

                        <div class="form-grp">
                            <label>Total Entries</label>

                            <input type="number" name="entry" id="contact_phone" value="<?php echo $getdata['entry'];?>" placeholder="Total Entries" readonly="">

                        </div>

                        <div class="form-grp">
                            <label>Total Price</label>

                            <input type="number" name="price" id="contact_phone" value="<?php echo $getdata['price'];?>" placeholder="Amount" readonly="">

                        </div>

            <div class="form-grp">
            <input type="hidden" name="access_id" value="<?php echo $_GET['access_id'];?>">
            <input type="hidden" name="package" value="<?php echo $_GET['plan'];?>">
            
            <?php if($cdate >= $sdate && $cdate <= $edate ){ ?>

            <input class="submit-btn" type="submit" name="submit" value="Pay Now">

            <?php }else{ ?>

            <p style="color:red;">The entry period for this sweepstake is closed!</p>

            <?php } ?>

            </div>

                    </form>

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

<?php } else{ 

header('Location : https://kwikisweeps.com/404.php');
 
   }

?>
