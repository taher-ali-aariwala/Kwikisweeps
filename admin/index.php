<?php include'controller/session.php';?>
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

<body onload="startTime()">
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
                                <!-- <h3>Default</h3> -->
                            </div>
                            <div class="col-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php"><i data-feather="home"></i></a></li>
                                    <li class="breadcrumb-item">Dashboard</li>
                                    <!-- <li class="breadcrumb-item active">Default </li> -->
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid starts-->
                <div class="container-fluid">
                    <div class="row second-chart-list third-news-update">

                        <?php 
                        include '../controller/config.php';
                        
                        $tkwiki       = mysqli_query($con,"SELECT * FROM contest WHERE status='1'");
                        $kwiki_count  = mysqli_num_rows($tkwiki);


                        // $kwiki_user  = mysqli_query($con,"SELECT * FROM orders WHERE status='1'");
                        // $user_count  = mysqli_num_rows($kwiki_user);

                        $kwiki_influ  = mysqli_query($con,"SELECT * FROM contest WHERE status='1'");
                        $inlfuencer   = mysqli_num_rows($kwiki_influ);

                        $kwiki_entry  = mysqli_query($con,"SELECT SUM(entry) FROM orders WHERE status='1'");
                        $entry_count  = mysqli_fetch_array($kwiki_entry);


                        // $vend_kwiki  = mysqli_query($con,"SELECT * FROM contest WHERE status='1' AND fname !=''");
                        // $vend_count  = mysqli_num_rows($vend_kwiki);


                        $tamount  = mysqli_query($con,"SELECT SUM(price) FROM orders WHERE status='1'");
                        $totalam  = mysqli_fetch_array($tamount);

                        ?>
                        <div class="col-sm-6 col-xl-3 col-lg-6">
                            <div class="card o-hidden">
                              <div class="bg-primary b-r-4 card-body">
                                <div class="media static-top-widget">
                                  <div class="align-self-center text-center">
                                      <i class="fas fa-tachometer-alt"></i>
                                  </div>
                                  <div class="media-body"><span class="m-0">Total Kwiki</span>
                                    <h4 class="mb-0 counter"><?php echo $kwiki_count; ?></h4>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6 col-xl-3 col-lg-6">
                            <div class="card o-hidden">
                              <div class="bg-secondary b-r-4 card-body">
                                <div class="media static-top-widget">
                                  <div class="align-self-center text-center"><i data-feather="shopping-bag"></i></div>
                                  <div class="media-body"><span class="m-0">Kwiki Influencer </span>
                                    <h4 class="mb-0 counter"><?php echo $inlfuencer; ?></h4><i class="icon-bg" data-feather="shopping-bag"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6 col-xl-3 col-lg-6">
                            <div class="card o-hidden">
                              <div class="bg-primary b-r-4 card-body">
                                <div class="media static-top-widget">
                                  <div class="align-self-center text-center"><i data-feather="user-plus"></i></div>
                                  <div class="media-body"><span class="m-0">Total Amount</span>
                                    <h4 class="mb-0 counter">$<?php if(!empty($totalam['SUM(price)'])){ echo $totalam['SUM(price)']; }else{ echo "0"; } ?></h4><i class="icon-bg" data-feather="user-plus"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6 col-xl-3 col-lg-6">
                            <div class="card o-hidden">
                              <div class="bg-primary b-r-4 card-body">
                                <div class="media static-top-widget">
                                  <div class="align-self-center text-center"><i data-feather="message-circle"></i></div>
                                  <div class="media-body"><span class="m-0">Total Entries</span>
                                    <h4 class="mb-0 counter"><?php if(!empty($entry_count['SUM(entry)'])){ echo $entry_count['SUM(entry)']; }else{ echo "0"; } ?></h4><i class="icon-bg" data-feather="message-circle"></i>
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