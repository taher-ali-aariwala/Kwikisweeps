<?php 
require_once 'config.php'; 

if (isset($_POST['submit'])){

$id    = $_POST['id']; 

$fname = $_POST['fname']; 
$lname = $_POST['lname']; 

$socialmedia_type  = $_POST['socialmedia_type']; 
$socialmedia_uname = $_POST['socialmedia_uname']; 
$alt_socail_type   = $_POST['alt_socail_type']; 
$alt_socail        = $_POST['alt_socail']; 

$address      = $_POST['address']; 
$address2     = $_POST['address2']; 

$city         = $_POST['city']; 
$state        = $_POST['state']; 
$zip          = $_POST['zip']; 

$email        = $_POST['email']; 
$mobile       = $_POST['mobile']; 

$bank_type    = $_POST['bank_type']; 
$ab_number    = $_POST['ab_number']; 
$acc_number   = $_POST['acc_number']; 

$getkwiki = mysqli_query($con,"SELECT * FROM contest WHERE access_id='$id'");
$getdata  = mysqli_fetch_array($getkwiki);
$sdate    = $getdata['sdate'];

    
$chk  =  mysqli_query($con,"Select * FROM contest WHERE socialmedia_uname='$socialmedia_uname'");

//$chk1 =  mysqli_query($con,"Select * FROM contest WHERE email='$email'");

//$chk2 =  mysqli_query($con,"Select * FROM contest WHERE mobile='$mobile'");

$count  = mysqli_num_rows($chk);
//$count1 = mysqli_num_rows($chk1);
//$count2 = mysqli_num_rows($chk2);

if($count == '1'){

 header('Location : ../third-form.php?err&id='.$id);

}

// else if($count1 =='1'){
//  header('Location : ../third-form.php?email&id='.$id);

// }else if($count2 =='1'){
//  header('Location : ../third-form.php?mob&id='.$id);

// }


else{

    $sql = mysqli_query($con,"UPDATE contest SET fname='$fname',lname='$lname',socialmedia_type='$socialmedia_type',socialmedia_uname='$socialmedia_uname',alt_socail='$alt_socail',alt_socail_type='$alt_socail_type',address='$address',address2='$address2',email='$email',mobile='$mobile',ab_number='$ab_number',bank_type='$bank_type',acc_number='$acc_number',city='$city',state='$state',zip='$zip' WHERE access_id='$id'"); 


// php mailer function
require('../admin/controller/mailer/class.phpmailer.php');

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port     = 587;  
$mail->Username = "aqeeqecommerce@gmail.com";
$mail->Password = "arpit@123";
$mail->Host     = "smtp.gmail.com";
$mail->Mailer   = "smtp";
$mail->SetFrom("db.rahulpatwari@gmail.com",    "Kwikisweeps");
$mail->AddReplyTo("db.rahulpatwari@gmail.com", "Kwikisweeps");
$mail->AddAddress("support@kwikisweeps.com");
$mail->Subject = 'New Kwiki Submission :'.$sdate;

//$link = $admin_url;
$content = "<!DOCTYPE html>

<html>



<head>

    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />

    <title>New Enquiry</title>

    <style type='text/css'>

        body {

            margin: 0;

            padding: 0;

            min-width: 100%!important;

        }

        

        img {

            height: auto;

        }

        

        .content {

            width: 100%;

            max-width: 600px;

        }

        

        .header {

            padding: 40px 30px 20px 30px;

        }

        

        .innerpadding {

            padding: 30px 30px 30px 30px;

        }

        

        .borderbottom {

            border-bottom: 1px solid #f2eeed;

        }

        

        .subhead {

            font-size: 15px;

            color: #fff;

            font-family: sans-serif;

            letter-spacing: 10px;

        }

        

        .h1,

        .h2,

        .bodycopy {

            color: #fff;

            font-family: sans-serif;

        }

        

        .h1 {

            font-size: 24px;

            line-height: 38px;

            font-weight: bold;

        }

        

        .h2 {

            padding: 0 0 15px 0;

            font-size: 24px;

            line-height: 28px;

            font-weight: bold;

        }

        

        .bodycopy {

            font-size: 16px;

            line-height: 22px;

        }

        

        .button {

            text-align: center;

            font-size: 18px;

            font-family: sans-serif;

            font-weight: bold;

            padding: 0 30px 0 30px;

        }

        

        .button a {

            color: #ffffff;

            text-decoration: none;

        }

        

        .footer {

            padding: 20px 20px 15px 20px;

        }

        

        .footercopy {

            font-family: sans-serif;

            font-size: 12px;

            color: #ffffff;

            font-weight: 600;

        }

        

        .footercopy a {

            color: #ffffff;

            text-decoration: none;

        }

        

        @media only screen and (max-width: 550px),

        screen and (max-device-width: 550px) {

            body[yahoo] .hide {

                display: none!important;

            }

            body[yahoo] .buttonwrapper {

                background-color: transparent!important;

            }

            body[yahoo] .button {

                padding: 0px!important;

            }

            body[yahoo] .button a {

                background-color: #e05443;

                padding: 15px 15px 13px!important;

            }

            body[yahoo] .unsubscribe {

                display: block;

                margin-top: 20px;

                padding: 10px 50px;

                background: #2f3942;

                border-radius: 5px;

                text-decoration: none!important;

                font-weight: bold;

            }

        }

        /*@media only screen and (min-device-width: 601px) {

    .content {width: 600px !important;}

    .col425 {width: 425px!important;}

    .col380 {width: 380px!important;}

    }*/

    </style>

</head>



<body yahoo bgcolor='#f6f8f1'>

    <table width='100%' bgcolor='#f6f8f1' border='0' cellpadding='0' cellspacing='0'>

        <tr>

            <td>



                <table bgcolor='#ffffff' class='content' align='center' cellpadding='0' cellspacing='0' border='0'>

                    <tr>

                        <td bgcolor='#d17c19' class='header'>

                            <table width='70' align='left' border='0' cellpadding='0' cellspacing='0'>

                                <tr>

                                    <td height='70' style='padding: 0 20px 20px 0;'>

                                        <img class='fix' src='https://tahir.dbtechserver.online/kwiki/assets/images/logo.png' width='70' height='70' border='0' alt=''/>

                                    </td>

                                </tr>

                            </table>



                            <table class='col425' align='left' border='0' cellpadding='0' cellspacing='0' style='width: 100%; max-width: 425px;'>

                                <tr>

                                    <td height='70'>

                                        <table width='100%' border='0' cellspacing='0' cellpadding='0'>

                                            <tr>

                                            
                                                <td class='h1' style='padding: 5px 0 0 0;'>New Kwiki Submission

                                                </td>

                                            </tr>

                                           

                                        </table>

                                    </td>

                                </tr>

                            </table>



                        </td>

                    </tr>

                    <tbody>

                        <tr edit-duplicate='' class='relative_index1' dup='0'>

                            <td valign='top'>

                                <table width='100%' edit-style='color_table' align='center' border='0' cellspacing='0' cellpadding='0' style='background-color:#ffffff; ' effect-all='false'>

                                    <tbody>

                                        <tr>

                                            <td valign='top' style='padding-left: 20px; padding-right: 20px;'>

                                                <table width='100%' edit-style='color_table' align='center' border='0' cellspacing='0' cellpadding='0'>

                                                    <!-- start space -->

                                                    <tbody>

                                                        <tr>

                                                            <td valign='top' height='30' style='font-size: 1px; line-height: 1px;'>

                                                            </td>

                                                        </tr>

                                                        <!-- end space -->

                                                        <tr>

                                                            <td valign='top' height='25' width='100' style='font-size: 18px; color: rgb(51, 51, 51); font-weight: normal; text-align: left; font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif; word-break: break-word; line-height: 120%; cursor: text;' panel-color='color_table' editor='content' class='relative_index2'>

                                                                <span style='text-decoration: none;line-height: 24px;font-size: 20px;color: rgb(51, 51, 51);font-weight: bold;'>Dear Admin</span>

                                                            </td>

                                                        </tr>

                                                    </tbody>

                                                </table>

                                            </td>

                                        </tr>

                                    </tbody>

                                </table>

                            </td>

                        </tr>

                        <!-- end heading -->


                        <!-- start table list -->

                        <tr edit-duplicate='' class='relative_index1' dup='0'>

                            <td valign='top'>

                                <table width='100%' edit-style='color_table' align='center' border='0' cellspacing='0' cellpadding='0' style='background-color:#ffffff; ' effect-all='false'>

                                    <tbody>

                                        <tr>

                                            <td valign='top' style='padding-left: 20px; padding-right: 20px;'>

                                                <table width='100%' edit-style='color_table' align='center' border='0' cellspacing='0' cellpadding='0' style='border-bottom :1px solid #e8e8e8;'>

                                                    <!-- start space -->

                                                    <tbody>

                                                        <tr>

                                                            <td valign='top' height='20' style='font-size: 1px; line-height: 1px;' class=''>

                                                            </td>

                                                        </tr>

                                                        <!-- end space -->

                                                        <tr>

                                                            <td valign='top' height='25' width='100' style='font-size: 14px; color: rgb(136, 136, 136); font-weight: normal; text-align: left; font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif; word-break: break-word; line-height: 30px; cursor: text;' panel-color='color_table' editor='content' class='relative_index2'>

                                                                You’ve received a new kwiki submission with request to start on $sdate

                                                            </td>

                                                        </tr>

                                                        <!-- start space -->

                                                        <tr>

                                                            <td valign='top' height='20' style='font-size: 1px; line-height: 1px;'>

                                                            </td>

                                                        </tr>

                                                        <!-- end space -->

                                                    </tbody>

                                                </table>

                                            </td>

                                        </tr>

                                    </tbody>

                                </table>

                            </td>

                        </tr>

                        <!-- end table list -->

                       

                        <!-- end table list -->

                        <!-- start table list -->

                        <tr edit-duplicate='' class='relative_index1' dup='0'>

                            <td valign='top'>

                                <table width='100%' edit-style='color_table' align='center' border='0' cellspacing='0' cellpadding='0' style='background-color:#ffffff; ' effect-all='false'>

                                    <tbody>

                                        <tr>

                                            <td valign='top' style='padding-left: 20px; padding-right: 20px;'>

                                                <table width='100%' edit-style='color_table' align='center' border='0' cellspacing='0' cellpadding='0' style='border-bottom :1px solid #e8e8e8;'>

                                                    <!-- start space -->

                                                    <tbody>

                                                        <tr>

                                                            <td valign='top' height='20' style='font-size: 1px; line-height: 1px;'>

                                                            </td>

                                                        </tr>

                                                        <!-- end space -->

                                                        <tr>

                                                            <td valign='top' height='25' width='100' style='font-size: 14px; color: rgb(136, 136, 136); font-weight: normal; text-align: left; font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif; word-break: break-word; line-height: 140%; cursor: text;' panel-color='color_table' editor='content' class='relative_index2'>


                                                            </td>

                                                        </tr>

                                                        <!-- start space -->

                                                        <tr>

                                                            <td valign='top' height='20' style='font-size: 1px; line-height: 1px;' class=''>

                                                            </td>

                                                        </tr>

                                                        <!-- end space -->

                                                    </tbody>

                                                </table>

                                            </td>

                                        </tr>

                                    </tbody>

                                </table>

                            </td>

                        </tr>

                        <!-- end table list -->

                    </tbody>



                    <tr>

                        <td class='footer' bgcolor='#000'>

                            <table width='100%' border='0' cellspacing='0' cellpadding='0'>

                                <tr>

                                    <td align='center' class='footercopy'>

                                        <span class='hide'>© 2021-25 All Rights Reserved | Designed &amp; Developed By<a href='https://www.developerbazaar.com'><span style='color: red;'> Developer </span><span style='color: limegreen;'> Bazaar</span> <span style='color: red;'> Technologies </span></a></span>

                                    </td>

                                </tr>

                                <!-- <tr>

                                    <td align='center' style='padding: 20px 0 0 0;'>

                                        <table border='0' cellspacing='0' cellpadding='0'>

                                            <tr>

                                                <td width='37' style='text-align: center; padding: 0 10px 0 10px;'>

                                                    <a href='https://www.facebook.com/dsifdindore/'>

                                                        <img src='https://cdn4.iconfinder.com/data/icons/social-media-icons-the-circle-set/48/facebook_circle-512.png' width='37' height='37' alt='Facebook' border='0' />

                                                    </a>

                                                </td>

                                                <td width='37' style='text-align: center; padding: 0 10px 0 10px;'>

                                                    <a href='https://twitter.com/dsifdindore'>

                                                        <img src='https://cdn3.iconfinder.com/data/icons/free-social-icons/67/twitter_circle_color-512.png' width='37' height='37' alt='Twitter' border='0' />

                                                    </a>

                                                </td>

                                            </tr>

                                        </table>

                                    </td>

                                </tr> -->

                            </table>

                        </td>

                    </tr>

                </table>



            </td>

        </tr>

    </table>

</body>



</html>";



$mail->MsgHTML($content);
$mail->IsHTML(true);

if(!$mail->Send()){

echo "Problem sending email.";

}else{

header('Location : ../thankyou.php?succ');

}


}

 }

?>