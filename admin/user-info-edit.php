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
                  <h3>User Info Edit</h3>
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
                        <form class="form-space theme-form row">
                          <div class="col-12">
                            <label class="col-form-label pt-0">Full Name</label>
                            <input class="form-control" type="text">
                          </div>
                          <div class="col-12">
                            <label class="col-form-label pt-0">Last name</label>
                            <input class="form-control" type="text">
                          </div>                          
                          <div class="col-12">
                            <label class="col-form-label">Email Address</label>
                            <input class="form-control" type="text">
                          </div>
                          <div class="col-12">
                            <label class="col-form-label">Phone No</label>
                            <input class="form-control" type="text">
                          </div>
                          <div class="col-12 text-end">
                            <button class="btn btn-primary">Update</button>
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