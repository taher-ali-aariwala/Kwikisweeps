<?php
include'controller/session.php';
include'../controller/config.php';

$sql_get = mysqli_query($con,"SELECT * FROM access WHERE id='1'");
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

    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/dropzone.css">

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

                  <h3>Edit Account Details</h3>

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
                        
                        
                        <form method="POST" action="controller/upd_acc.php" class="form-space theme-form row" enctype="multipart/form-data">

                          <div class="col-12">

                            <label class="col-form-label pt-0">Email:</label>

                            <input class="form-control" type="email" name="email" value="<?php echo $setdata['email'];?>" placeholder="Email" required="">

                          </div>

                          <div class="col-12">

                            <label class="col-form-label">Password:</label>

                            <input  class="form-control" type="password" name="password" value="<?php echo $setdata['password'];?>" placeholder="Password" required="">

                          </div>

                         

                          <div class="col-12 text-end mt-3">
                            
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