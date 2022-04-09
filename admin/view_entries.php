<?php

include'controller/session.php';

include'../controller/config.php';

$access_id  = $_GET['access_id'];

$sql_get = mysqli_query($con,"SELECT * FROM orders WHERE access_id='$access_id' AND status='1'");

$getexist = mysqli_num_rows($sql_get);
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
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">


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

                <!-- Container-fluid starts-->

                <div class="container-fluid">

                    <div class="row second-chart-list third-news-update">


                      <div class="col-sm-12">
                         

                        <div class="card">

                          <div class="card-body">
                           
                            <div class="table-responsive">
                          
                             <a href="add_entries.php?access_id=<?php echo $access_id; ?>" class="btn btn-primary mb-5">Add Entries</a>
                             <?php if($getexist > 0){ ?>
                             <!-- <a href="controller/winner.php?access_id=<?php echo $access_id;?>" class="btn btn-success float-end mb-5">Check Winner</a> -->
                             <?php }?>

                            <?php if(isset($_GET['succ'])){ ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Successfully Added Entry !</strong>
                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
                            </div>
                            <?php } ?>

                             <?php if(isset($_GET['win'])){ ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Kwiki's Winner Successfully Annouce!</strong>
                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
                            </div>
                            <?php } ?>
                            
                            <?php if(isset($_GET['exp'])){ ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>When Kwiki's Expire Then Generate Random Winner user!</strong>
                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
                            </div>
                            <?php } ?>

                            <?php if(isset($_GET['already'])){ ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Winner is already announce!</strong>
                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
                            </div>
                            <?php } ?>

                            

                              <table class="display" id="entries">

                                <thead>

                                  <tr>

                                    <th>Date</th>
                                    
                                    <th>Kwiki Uniqid</th>
                                   
                                    <th>Full Name</th>

                                    <th>Email</th>

                                    <th>Mobile</th>
                                    
                                    <th>Total Entries</th>
                                    
                                    <th>Amount </th>
                                    
                                    <th>Action </th>


                                  </tr>

                                </thead>

                                <tbody>

                                    <?php

                                    while($setdata = mysqli_fetch_array($sql_get)){

                                    ?>

                                  <tr>

                                    <td><?php echo $setdata['date'];?> </td>
                                    <td><?php echo $setdata['access_id'];?> </td>
                                    <td><?php echo $setdata['fname'];?> <?php echo $setdata['lname'];?></td>
                                    <td><?php echo $setdata['email'];?></td>
                                    <td><?php echo $setdata['mobile'];?></td>
                                    <td><?php echo $setdata['entry'];?></td>
                                    <td>$<?php echo $setdata['price'];?></td>
                                    <td><a href="controller/winner.php?access_id=<?php echo $access_id;?>&win_id=<?php echo $setdata['order_id'];?>" class="btn btn-success float-end mb-5">Winner Announce</a></td>

                                  </tr>

                                  <?php } ?>

                                </tbody>

                              </table>
                              <h3 class="mt-4 mb-4">Winner List</h3>
                              <table class="" id="basic-2">

                                <thead>

                                  <tr>

                                    <th>Date</th>

                                    <th>Kwiki Uniqid</th>

                                    <th>Full Name</th>

                                    <th>Email</th>

                                    <th>Mobile</th>
                                    
                                    <th>Total Entries</th>
                                    
                                    <th>Amount </th>


                                  </tr>

                                </thead>

                                <tbody>

                                  <?php

                                  $getwin = mysqli_query($con,"SELECT * FROM winner_list WHERE access_id='$access_id'"); 
                                  while($windata = mysqli_fetch_array($getwin)){
                                    $ndate   = $windata['date'];
                                    $newDate = date("Y-m-d", strtotime($ndate));


                                  ?>

                                  <tr>

                                  <td><?php echo $newDate;?> </td>
                                  <td><?php echo $windata['access_id'];?> </td>
                                  <td><?php echo $windata['name'];?> <?php echo $windata['lname'];?></td>
                                  <td><?php echo $windata['email'];?></td>
                                  <td><?php echo $windata['mobile'];?></td>
                                  <td><?php echo $windata['entry'];?></td>
                                  <td>$<?php echo $windata['price'];?></td>

                                  </tr>

                                  <?php } ?>

                                </tbody>

                              </table>
                              
                              
                              
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

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
       
        <script>
          $(document).ready(function() {
          $('#entries').DataTable( {
          dom: 'Bfrtip',
          buttons: [
          'csv'
          ]
          } );
          } );
        </script>

            <!--  Footer-section end  -->

</body>



</html>