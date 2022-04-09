<?php
// $action = $_GET['action'];
// if($action =="next"){
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

    <!-- First Step start -->

    <section class="step-section">

        <div class="container-fluid">

            <div class="row">

                <div class="col-md-3 step-next">
                    <a href="index.php"><img src="assets/images/logo.jpg" class="img-fluid"></a>
                    <div class="btn-step">
                      <a href="index.php"><i class="fas fa-long-arrow-alt-left"></i> Back to homepage</a>
                    </div>
                    <ul>
                        <li><i class="fas fa-check"></i> Selected Official Rules</li>
                        <li><i class="fas fa-check"></i> Kwiki Details</li>
                        <li><i class=""></i><p>Contact Information</p></li> 
                    </ul>
                </div>

                <div class="col-md-4 step2">
                    <div class="content-box">
                        <div class="icon">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <p>Remember participants will be able to enter your kwiki between 12:01 am EST on the start date and 11:59pm EST on the end date.</p>
                        <p>Promotional videos and photos will let participants know this is your Kwiki.</p>
                        <p>All participants will get access to a piece of content you provide whether it’s your next episode, track, article, dance moves, etc. </p>
                        <p>Let us know what other types of prizes you’d like to offer your audience in the future.</p>
                    </div>
                </div>

                <div class="col-md-5 step3 kwiki-detail">

                        <form class="contact-form" method="POST" action="controller/add_entry.php" enctype="multipart/form-data" autocomplete="off">

                            <div class="row">

                                <div class="col-md-12 mb-4">

                                    <h3 class="title">Kwiki Details:</h3>

                                </div>

                             <?php if(isset($_GET['upload'])){ ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong></strong> Please Select Upload promotional content for your kwiki!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <?php } ?>

                              <?php if(isset($_GET['field'])){ ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong></strong>Please Select Upload featured content that all kwiki participants will receive!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <?php } ?>
                            
                           
                            
                            <?php if(isset($_GET['typ'])){ ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong></strong> Please Select Images jpg , jpeg , png and mp4 video only !
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <?php } ?>


                                <div class="col-md-12">

                                    <label>Kwiki Title:</label>

                                    <input type="text" name="title" class="form-control" placeholder="Enter the title of your Kwiki" maxlength="60" required />

                                </div>

                                <div class="col-md-6">

                                    <label>Start Date:</label>

                                    <input type="text" id="date-pic"  class="datepicker" name="sdate" class="form-control" placeholder="mm/dd/yyyy" readonly="" required="">

                                </div>

                                <div class="col-md-6">

                                    <label>End Date:</label>

                                    <input type="text"id="date-pic2" class="datepicker2" name="edate" class="form-control" placeholder="mm/dd/yyyy" readonly="" required="">

                                </div>

                                <!-- <div class="col-md-12">

                                <label>Upload promotional content for your kwiki<p style="color:red">Please Select Images jpg , jpeg , png and mp4 video only and video upload upto 10MB</p></label>

                                <div class="control-group" id="fields">  

                                  <div class="controls">  

                                    <div class="entry input-group upload-input-group">  

                                      <input class="form-control" type="file" name="uploads[]" accept="image/png,image/jpg,image/jpeg,video/mp4">  

                                        <button class="btn btn-upload cmn-btn rounded btn-add" type="button">  

                                          <i class="fa fa-plus"> </i>  

                                        </button>  

                                    </div>  

                                  </div>  

                                </div>

                              </div> -->


                              <div class="col-md-12">
                                <label>Upload promotional content for your kwiki</label>
                                <p class="errvalid1" style="display:none; color:red;">File size must not be more than 10 MB</p>

                              </div>
                               <div class="col-md-4">
                                <input type="file" name="uploads[]" id="upl_img1" class="dropify" accept="image/png,image/jpg,image/jpeg,video/mp4"/>
                              </div>
                              <div class="col-md-4">
                                <input type="file" name="uploads[]" id="upl_img2" class="dropify" accept="image/png,image/jpg,image/jpeg,video/mp4"/>
                              </div>
                              <div class="col-md-4">
                                <input type="file" name="uploads[]" id="upl_img3" class="dropify" accept="image/png,image/jpg,image/jpeg,video/mp4"/>
                              </div>



                              <div class="col-md-12 mt-4">
                                <label>Upload featured content that all kwiki participants will receive</label>
                                <!-- <p style="color:red">Please Select Images jpg , jpeg , png  and mp4 video only and video upload upto 10MB</p> -->

                                <p class="errvalid2" style="display:none; color:red;">File size must not be more than 10 MB</p>

                              </div>
                               <div class="col-md-4">
                                <input type="file" name="fields[]" id="fiel_img1" class="dropify" accept="image/png,image/jpg,image/jpeg,video/mp4"/>
                              </div>
                              <div class="col-md-4">
                                <input type="file" name="fields[]" id="fiel_img2" class="dropify" accept="image/png,image/jpg,image/jpeg,video/mp4"/>
                              </div>
                              <div class="col-md-4">
                                <input type="file" name="fields[]" id="fiel_img3" class="dropify" accept="image/png,image/jpg,image/jpeg,video/mp4"/>
                              </div>
                            

                             <!-- <div class="col-md-12 mt-4 mb-4">

                                <label>Upload featured content that all kwiki participants will receive<p style="color:red">Please Select Images jpg , jpeg , png  and mp4 video only and video upload upto 10MB</p></label>

                                <div class="control-group" id="fields">  

                                  <div class="controls-new">  

                                    <div class="entry-new input-group upload-input-group">  

                                      <input class="form-control" type="file" name="fields[]" accept="image/png,image/jpg,image/jpeg,video/mp4">  

                                        <button class="btn btn-upload cmn-btn rounded btn-add" type="button">  

                                          <i class="fa fa-plus"> </i>  

                                        </button>  

                                    </div>  

                                  </div>  

                                  

                                </div>

                              </div> -->

                             

                              <div class="col-md-12 mt-4">

                                 <label>Content description:</label>

                                 <textarea name="kwiki_short" placeholder="Briefly describe your featured content" required=""></textarea>

                              </div>

                              <div class="col-md-12">

                                 <label>Suggestions for future Kwiki prizes:</label>

                                 <textarea name="descp" placeholder="Suggestions for future kwiki prizes"></textarea>

                                </div>

                                <div class="col">

                                    <!-- <a href="second-form.php"> -->
                                    <input type="submit" name="submit" class="submit-btn subbtn" value="2/3 Next Step">
                                    <!-- </a> -->

                                </div>

                            </div>

                        </form>

                </div>

            </div>

        </div>

    </section>

    <!-- contact-section end -->

    <!-- Js start -->

    <?php include('assets/include/js.php'); ?>

    <script type="text/javascript">
        $(document).ready(function(){
        // for upload files here sec 1 start           
        $('#upl_img1').change(function(){
            var fp = $("#upl_img1");
            var lg = fp[0].files.length; // get length
            var items = fp[0].files;
            var fileSize = 0;
           
            if (lg > 0) {
                for (var i = 0; i < lg; i++) {
                    fileSize = fileSize+items[i].size; // get file size
                }
                if(fileSize > 10000000) {
                    //alert('File size must not be more than 10 MB');
                    $('#upl_img1').val('');
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
        $('#upl_img2').change(function(){
            var fp = $("#upl_img2");
            var lg = fp[0].files.length; // get length
            var items = fp[0].files;
            var fileSize = 0;
           
            if (lg > 0) {
                for (var i = 0; i < lg; i++) {
                    fileSize = fileSize+items[i].size; // get file size
                }
                if(fileSize > 10000000) {
                    //alert('File size must not be more than 10 MB');
                    $('#upl_img2').val('');
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
        $('#upl_img3').change(function(){
            var fp = $("#upl_img3");
            var lg = fp[0].files.length; // get length
            var items = fp[0].files;
            var fileSize = 0;
           
            if (lg > 0) {
                for (var i = 0; i < lg; i++) {
                    fileSize = fileSize+items[i].size; // get file size
                }
                if(fileSize > 10000000) {
                    //alert('File size must not be more than 10 MB');
                    $('#upl_img3').val('');
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


       //Field fiel_img1 start

       $('#fiel_img1').change(function(){
            var fp = $("#fiel_img1");
            var lg = fp[0].files.length; // get length
            var items = fp[0].files;
            var fileSize = 0;
           
            if (lg > 0) {
                for (var i = 0; i < lg; i++) {
                    fileSize = fileSize+items[i].size; // get file size
                }
                if(fileSize > 10000000) {
                    //alert('File size must not be more than 10 MB');
                    $('#fiel_img1').val('');
                    //location.reload();
                    $('.errvalid2').show();
                    $('.subbtn').hide();

                }else{

                    $('.subbtn').show();
                    $('.errvalid2').hide();

                    

                }
            }
        });

       //Field image fiel_img1 end


       //Field fiel_img1 start

       $('#fiel_img2').change(function(){
            var fp = $("#fiel_img2");
            var lg = fp[0].files.length; // get length
            var items = fp[0].files;
            var fileSize = 0;
           
            if (lg > 0) {
                for (var i = 0; i < lg; i++) {
                    fileSize = fileSize+items[i].size; // get file size
                }
                if(fileSize > 10000000) {
                    //alert('File size must not be more than 10 MB');
                    $('#fiel_img2').val('');
                    //location.reload();
                    $('.errvalid2').show();
                    $('.subbtn').hide();

                }else{

                    $('.subbtn').show();
                    $('.errvalid2').hide();

                    

                }
            }
        });

       //Field image fiel_img1 end   

       //Field fiel_img1 start

       $('#fiel_img3').change(function(){
            var fp = $("#fiel_img3");
            var lg = fp[0].files.length; // get length
            var items = fp[0].files;
            var fileSize = 0;
           
            if (lg > 0) {
                for (var i = 0; i < lg; i++) {
                    fileSize = fileSize+items[i].size; // get file size
                }
                if(fileSize > 10000000) {
                    //alert('File size must not be more than 10 MB');
                    $('#fiel_img3').val('');
                    //location.reload();
                    $('.errvalid2').show();
                    $('.subbtn').hide();

                }else{

                    $('.subbtn').show();
                    $('.errvalid2').hide();

                }
            }
        });

       //Field image fiel_img1 end           

    });
    </script>
    
</body>

</html>
 <?php 
 // }
 // else{
 // header('Location: first-form.php');
 // }
 ?>