<?php
include'controller/session.php';
include'../controller/config.php';

$id      = $_GET['id'];
$sql_get = mysqli_query($con,"SELECT * FROM contest WHERE access_id='$id'");
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
<link rel="stylesheet" type="text/css" href="https://kwikisweeps.com/assets/css/dropify.min.css">
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

<h3>Kwiki Details Edit</h3>

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


<?php if(isset($_GET['img'])){ ?>

<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Please Upload Image up to 10MB </strong>
<button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
</div>

<?php } ?>

<form method="POST" action="controller/kwiki_upd.php" class="form-space theme-form row" enctype="multipart/form-data">

<div class="col-12">

<label class="col-form-label pt-0">Kwiki Title:</label>

<input class="form-control" type="text" name="title" value="<?php echo $setdata['title'];?>" required="">

</div>

<div class="col-6">

<label class="col-form-label">Start Date:</label>

<input  class="datepicker-here form-control digits" type="text" data-language="en" type="text" name="sdate" value="<?php echo $setdata['sdate'];?>" readonly="" required="">

</div>

<div class="col-6">

<label class="col-form-label">End Date:</label>

<input class="datepicker-here form-control digits" type="text" data-language="en" type="text" name="edate" value="<?php echo $setdata['edate'];?>" readonly="" required="">

</div>


<?php 
$get_files = mysqli_query($con,"SELECT * FROM uploads WHERE username = '$id' ORDER BY id DESC LIMIT 3"); 

while($getfiles = mysqli_fetch_array($get_files)){   

$extentions = explode('.', $getfiles['files']);
$types      = $extentions[1];

if($types == 'mp4'){

?>
<div class="col-md-4">
<video controls>
<source src="../controller/files/<?php echo $getfiles['files'];?>" type="video/mp4">
</video>
</div>
<?php }else{ ?>
<div class="col-md-4">
<img alt="ImageName" src="../controller/files/<?php echo $getfiles['files']; ?>">
</div>
<?php } } ?>

<div class="col-md-12">
<label>Upload promotional content for your kwiki</label>
<p class="errvalid1" style="display:none; color:red;">File size must not be more than 10 MB</p>
</div>
<div class="col-md-4">
<input type="file" name="files[]" id="files_img1" class="dropify" accept="image/png,image/jpg,image/jpeg,video/mp4"/>
</div>
<div class="col-md-4">
<input type="file" name="files[]" id="files_img2" class="dropify" accept="image/png,image/jpg,image/jpeg,video/mp4"/>
</div>
<div class="col-md-4">
<input type="file" name="files[]" id="files_img3" class="dropify" accept="image/png,image/jpg,image/jpeg,video/mp4"/>
</div>


<!-- <div class="control-group" id="fields">  

<div class="controls">  

<div class="entry input-group upload-input-group mb-4">  

<input class="form-control fUpload" type="file" name="files[]" accept="image/png,image/jpg,image/jpeg,video/mp4" multiple="">  

<button class="btn btn-success rounded btn-add" type="button">  

<i class="fa fa-plus"> </i>  

</button>  

</div>  

</div>  

</div> -->



<div class="col-md-12">
<label>Download the below content to make  URL to send the Kwiki Users</label>
</div>
<?php 
$get_upload = mysqli_query($con,"Select * FROM fields WHERE username = '$id' ORDER BY id LIMIT 5"); 

while($getimg = mysqli_fetch_array($get_upload)){   

$extention = explode('.', $getimg['field']);
$type      = $extention[1];
?>
<?php 
if($type == 'mp4'){
?>
<div class="col-md-4">
<a download="<?php echo $getimg['field']; ?>" href="../controller/files/<?php echo $getimg['field']; ?>" title="ImageName">
<video controls>
<source src="../controller/files/<?php echo $getimg['field'];?>" type="video/mp4">
</video>
</a>
</div>
<?php }else{ ?>
<div class="col-md-4">
<a download="<?php echo $getimg['field']; ?>" href="../controller/files/<?php echo $getimg['field']; ?>" title="ImageName">
<img alt="ImageName" src="../controller/files/<?php echo $getimg['field']; ?>" width="150px" height="150px">
</a>
</div>
<?php }?>

</a>

<?php } ?>

<div class="col-md-12">

  <label>Upload url that all Kwiki participants will receive after entry</label>
  <?php if($setdata['status'] =='0'){ ?>
  <input class="form-control" type="text" name="admin_url" value="<?php echo $setdata['admin_url'];?>"  required="">
  <?php }else{ ?>
  
  <input class="form-control" type="text" name="admin_url" value="<?php echo $setdata['admin_url'];?>" readonly=""  required="">
  
  <?php } ?>

  
</div>

<div class="col-12">

<label class="col-form-label">Content description:</label>

<textarea class="form-control" name="descp" required=""><?php echo $setdata['descp'];?></textarea>

</div>


<div class="col-12">

<label class="col-form-label">Suggestions for future Kwiki prizes:</label>

<textarea class="form-control" name="kwiki_short" required=""><?php echo $setdata['kwiki_short'];?></textarea>

</div>

<div class="col-12 text-end mt-3">
<input type="hidden" name="id" value="<?php echo $id;?>">
<button type="submit" name="submit" class="btn btn-primary subbtn">Update</button>

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

<script type="text/javascript">
        $(document).ready(function(){
        // for files here sec 1 start           
        $('#files_img1').change(function(){
            var fp = $("#files_img1");
            var lg = fp[0].files.length; // get length
            var items = fp[0].files;
            var fileSize = 0;
           
            if (lg > 0) {
                for (var i = 0; i < lg; i++) {
                    fileSize = fileSize+items[i].size; // get file size
                }
                if(fileSize > 10000000) {
                    //alert('File size must not be more than 10 MB');
                    $('#files_img1').val('');
                    //location.reload();
                    $('.errvalid1').show();
                    $('.subbtn').hide();

                }else{

                    $('.subbtn').show();
                    $('.errvalid1').hide();

                }
            }
        });
        // for upload files here sec 2 end  

         // for upload files here sec 1 start           
        $('#files_img2').change(function(){
            var fp = $("#files_img2");
            var lg = fp[0].files.length; // get length
            var items = fp[0].files;
            var fileSize = 0;
           
            if (lg > 0) {
                for (var i = 0; i < lg; i++) {
                    fileSize = fileSize+items[i].size; // get file size
                }
                if(fileSize > 10000000) {
                    //alert('File size must not be more than 10 MB');
                    $('#files_img2').val('');
                    //location.reload();
                    $('.errvalid1').show();
                    $('.subbtn').hide();

                }else{

                    $('.subbtn').show();
                    $('.errvalid1').hide();

                    

                }
            }
        });
        // for upload files here sec 2 end  

         // for upload files here sec 3 start           
        $('#files_img3').change(function(){
            var fp = $("#files_img3");
            var lg = fp[0].files.length; // get length
            var items = fp[0].files;
            var fileSize = 0;
           
            if (lg > 0) {
                for (var i = 0; i < lg; i++) {
                    fileSize = fileSize+items[i].size; // get file size
                }
                if(fileSize > 10000000) {
                    //alert('File size must not be more than 10 MB');
                    $('#files_img3').val('');
                    //location.reload();
                    $('.errvalid1').show();
                    $('.subbtn').hide();

                }else{

                    $('.subbtn').show();
                    $('.errvalid1').hide();

                    

                }
            }
        });
        // for upload files here sec 3 end   

    });
    </script>
</body>



</html>