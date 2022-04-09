<?php
$id = $_GET['id'];
if(empty($id)){
header('Location: first-form.php');
}else{
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

    <!-- Step next start -->

    <section class="step-section">

        <div class="container-fluid">

            <div class="row">

                <div class="col-md-3 step-next">
                    <a href="index.php"><img src="assets/images/logo.jpg" class="img-fluid"></a>
                    <div class="btn-step">
                      <a href="index.php"><i class="fas fa-long-arrow-alt-left"></i> Back to homepage</a>
                    </div>
                    <ul>
                       <?php if(!empty($id)){ ?>
                        <li><i class="fas fa-check"></i> Selected Official Rules</li>
                        <li><i class="fas fa-check"></i> Kwiki Details</li>
                        <?php } ?>
                        <li><i class="fas fa-check"></i> Contact Information</li>
                    </ul>
                </div>

                <div class="col-md-4 step2">
                    <div class="content-box">
                        <div class="icon">
                            <i class="fas fa-volume-up"></i>
                        </div>
                        <p>Your personal data will not be shared on your kwiki page!</p>
                    </div>
                </div>

                <div class="col-md-5 step3 kwiki-detail">
                    

                    <form class="contact-form" method="POST" action="controller/add_entry2.php" autocomplete="off">

                        <div class="row">

                            <div class="col-md-12 mb-4">

                                <h3 class="title">Contact Information</h3>

                            </div>

                            <?php if(isset($_GET['err'])){ ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Your Social Handle Name is Already Exist!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <?php } ?>

                            


                            

                            <div class="col-md-6">

                                <label>First name</label>

                                <input type="text" name="fname" maxlength="20" placeholder="First name" class="form-control" required>

                            </div>

                            <div class="col-md-6">

                                <label>Last name</label>

                                <input type="text" name="lname" maxlength="15" placeholder="Last name" class="form-control" required>

                            </div>

                            <div class="col-md-12">

                                <label>Address</label>

                                <input name="address" placeholder="Street 1" class="form-control" required>
                            </div>

                            <div class="col-md-12">
                                <input name="address2" placeholder="Street 2" class="form-control">
                            </div>

                            <div class="col-md-6">

                                <label>City</label>

                                <input type="text" name="city" placeholder="City" class="form-control" required>

                            </div>
                            <div class="col-md-6">

                                <label>State</label>

                                <input type="text" name="state" placeholder="State" class="form-control" required>

                            </div>
                            <div class="col-md-12">

                                <label>Zip Code</label>

                                <input type="text" name="zip" placeholder="Zip Code" class="form-control" maxlength="8" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required >

                            </div>

                            <div class="col-md-6">

                                <label>Email</label>

                                <input type="email" name="email" placeholder="Enter E-mail" class="form-control" required>

                            </div>

                            <div class="col-md-6">

                                <label>Phone</label>

                                <input type="text " name="mobile" placeholder="Enter Mobile" maxlength="15" class="form-control" min="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"  required>

                            </div>

                            <div class="col-md-12">

                                <label>Primary social media handle </label>

                                <div class="row">

                                    <div class="col-md-3">

                                        <input type="radio" id="sc-1" name="socialmedia_type" value="Instagram" checked>

                                        <label>Instagram</label>

                                    </div>

                                    <div class="col-md-3">

                                        <input type="radio" id="sc-2" name="socialmedia_type" value="Youtube">

                                        <label>Youtube</label>

                                    </div>

                                    <div class="col-md-3">

                                        <input type="radio" id="sc-3" name="socialmedia_type" value="Facebook">

                                        <label>Facebook</label>

                                    </div>

                                    <div class="col-md-3">

                                        <input type="radio" id="sc-4" name="socialmedia_type" value="Snap">

                                        <label>Snap</label>

                                    </div>

                                    <div class="col-md-3">

                                        <input type="radio" id="sc-5" name="socialmedia_type" value="TikTok">

                                        <label>TikTok</label>

                                    </div>

                                    <div class="col-md-3">

                                        <input type="radio" id="sc-6" name="socialmedia_type" value="Twitter">

                                        <label>Twitter</label>

                                    </div>

                                    <div class="col-md-12">

                                        <div class="social-handle">

                                            <input type="text" name="socialmedia_uname" placeholder="Primary social media handle" class="form-control" maxlength="25" style="text-transform:lowercase" required="">

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-12">

                                <label>Alternative social media handle</label>

                                <div class="row">

                                    <div class="col-md-3">

                                        <input type="radio" id="al-1" name="alt_socail_type" value="Instagram">

                                        <label>Instagram</label>

                                    </div>

                                    <div class="col-md-3">

                                        <input type="radio" id="al-2" name="alt_socail_type" value="Youtube">

                                        <label>Youtube</label>

                                    </div>

                                    <div class="col-md-3">

                                        <input type="radio" id="al-3" name="alt_socail_type" value="Facebook">

                                        <label>Facebook</label>

                                    </div>

                                    <div class="col-md-3">

                                        <input type="radio" id="al-4" name="alt_socail_type" value="Snap">

                                        <label>Snap</label>

                                    </div>

                                    <div class="col-md-3">

                                        <input type="radio" id="al-5" name="alt_socail_type" value="TikTok">

                                        <label>TikTok</label>

                                    </div>

                                    <div class="col-md-3">

                                        <input type="radio" id="al-6" name="alt_socail_type" value="Twitter">

                                        <label>Twitter</label>

                                    </div>

                                    <div class="col-md-12">

                                        <div class="social-handle">

                                            <input type="text" name="alt_socail" placeholder="Alternative social media handle" class="form-control" style="text-transform:lowercase" maxlength="25">

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-12">

                                <label>Payment Information:</label>

                                <div class="row">

                                    <div class="col-md-12">

                                        <input type="text" name="bank_type" placeholder="Bank name (you can provide your payment information later)" class="form-control" required="">
                                    </div>

                                    <div class="col-md-6">

                                        <input type="text" name="ab_number" placeholder="ABA number" class="form-control" min="0" maxlength="9" required>

                                    </div>

                                    <div class="col-md-6">

                                        <input type="text" name="acc_number" placeholder="Account number" class="form-control" maxlength="18" required min="0">

                                    </div>

                                </div>

                            </div>

                            <div class="col mt-3">

                                <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">

                                <input class="submit-btn" type="submit" name="submit" value="3/3 Submit">

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </section>

    <!-- Step Next end -->

    <!-- Js start -->

    <?php include('assets/include/js.php'); ?>

</body>

</html>
<?php } ?>