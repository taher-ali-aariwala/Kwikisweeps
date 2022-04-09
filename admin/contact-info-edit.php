<?php
include'controller/session.php';

include'../controller/config.php';
$id      = $_GET['id'];
$sql_get = mysqli_query($con,"Select * FROM contest WHERE access_id='$id'");
$setdata = mysqli_fetch_array($sql_get);
                                        

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
    <title>Kwiki Admin | Design by Developer Bazaar Technologies</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
</head>

<body>
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">

        <!--  header-section start  -->
        <?php include('include/header.php'); ?>
        <!--  header-section end  -->

        <!-- Page Body Start-->
        <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        <?php include('include/sidebar.php'); ?>
        <!-- Page Sidebar Ends-->

        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h3>Edit Influencer Contact Info</h3>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12 col-xl-8">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="card">
                      <div class="card-body">
                          
                      
                      
                    <?php if(isset($_GET['succ'])){ ?>
                     
                     <div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Successfully Updated !</strong>
                      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
                    </div>
                    
                    <?php } ?>
                    
                    
                        <form class="form-space theme-form row" method="POST" action="controller/vendor_upd.php">
                          <div class="col-6">
                            <label class="col-form-label pt-0">First name</label>
                            <input class="form-control" type="text" name="fname" value="<?php echo $setdata['fname']?>" maxlength="15" required="">
                          </div>
                          <div class="col-6">
                            <label class="col-form-label pt-0">Last name</label>
                            <input class="form-control" type="text" name="lname" value="<?php echo $setdata['lname']?>" maxlength="15" required="">
                          </div>
                          <div class="col-12">
                            <label class="col-form-label">Address</label>
                            <input class="form-control" type="text" name="address"  value="<?php echo $setdata['address']?>" placeholder="Street 1" required="">
                            
                            <input class="form-control mt-2" type="text" placeholder="Street 2" name="address2"  value="<?php echo $setdata['address2']?>" >
                          </div>
                          <div class="col-6">
                            <label class="col-form-label">City</label>
                            <input class="form-control" type="text" name="city" value="<?php echo $setdata['city']?>" required="">
                          </div>
                          <div class="col-6">
                            <label class="col-form-label">State</label>
                            <input class="form-control" type="text" name="state" value="<?php echo $setdata['state']?>" required="">
                          </div>
                          <div class="col-12">
                            <label class="col-form-label">Zip Code</label>
                            <input class="form-control" type="number" name="zip" value="<?php echo $setdata['zip']?>" maxlength="10" required="">
                          </div>
                          <div class="col-12">
                            <label class="col-form-label">Email</label>
                            <input class="form-control" type="email" name="email" value="<?php echo $setdata['email']?>" required="">
                          </div>
                          <div class="col-12">
                            <label class="col-form-label">Phone</label>
                            <input class="form-control" type="text" name="mobile" value="<?php echo $setdata['mobile']?>" maxlength="15" required="">
                          </div>
                          <div class="col-12">
                            <label class="col-form-label">Primary social media handle </label>
                            <input class="form-control" type="text" name="socialmedia_uname" value="<?php echo $setdata['socialmedia_uname']?>" style="text-transform:lowercase" maxlength="15" required="">
                          </div>
                          <div class="col-12">
                            <label class="col-form-label">Alternative social media handle </label>
                            <input class="form-control" type="text" name="alt_socail" value="<?php echo $setdata['alt_socail']?>" style="text-transform:lowercase" maxlength="15" required="">
                          </div>
                          <div class="col-12">
                            <label class="col-form-label">Payment Information: </label>
                            <input class="form-control" type="text" name="bank_type" value="<?php echo $setdata['bank_type']?>" required="">
                          </div>
                          <div class="col-12">
                            <label class="col-form-label">ABA number</label>
                            <input class="form-control" type="text" name="ab_number" value="<?php echo $setdata['ab_number']?>" maxlength="9" required="">
                          </div>
                          <div class="col-12">
                            <label class="col-form-label">Account number </label>
                            <input class="form-control" type="text" name="acc_number" value="<?php echo $setdata['acc_number']?>" maxlength="18" required="">
                          </div>
                          <div class="col-12 text-end">
                            <input type="hidden" name="id" value="<?php echo $id;?>">  
                            <button type="submit" name="submit" class="btn btn-primary">Update</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
        <!--  Footer-section start  -->
        <?php include('include/footer.php'); ?>
        <!--  Footer-section end  -->
</body>

</html>