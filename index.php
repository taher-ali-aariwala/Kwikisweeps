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
<meta property="twitter:image" content="assets/images/favicon.png"/>
<meta property="twitter:image:width" content="350"/>
<meta property="twitter:image:height" content="597"/>
<meta name="twitter:domain" content="Kwiki Sweepstakes"/>
</head>
<body>
<!--  header-section start  -->
<?php include('assets/include/header.php'); ?>
<!--  header-section end  -->
<!-- banner-section start -->
<section class="banner-section">
<div class="banner-content-area">
<div class="container">
<div class="row align-items-center">
<div class="col-md-6">
<div class="banner-content mb-3">
<h1 class="title">Get paid to meet your followers</h1>
<p>Get started today!</p>
<a href="first-form.php" class="btn-grad">Start your Kwiki</a>
<p>How can kwikis help you? </p>
<a href="https://blog.kwikisweeps.com/blog/" class="btn-grad">Our blog</a>
</div>
</div>
<div class="col-md-6">
<img src="assets/images/main-img.jpg" class="img-fluid shadow rounded">
</div>
</div>
</div>
</div>
</section>
<!-- banner-section end -->
<!-- Featured Kwikis-section start -->
<section class="section-padding pt-0">
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-8">
<div class="section-header text-center">
<h2 class="section-title">Featured kwikis</h2>
</div>
</div>
</div>
<div class="row">
<?php
include'controller/config.php';
if(!isset($_GET['search'])){
$get = mysqli_query($con,"Select * FROM contest WHERE status='1' ORDER BY id DESC LIMIT 3");
}else{
$search = $_GET['search'];
$get = mysqli_query($con,"Select * FROM contest WHERE title LIKE '%$search%' AND status='1' ORDER BY id DESC LIMIT 3");
}
$count_kiwi = mysqli_num_rows($get);
while($getdata = mysqli_fetch_array($get)){
$access_id = $getdata['access_id'];
$upload    = mysqli_query($con,"Select * FROM uploads WHERE username='$access_id' ORDER BY username ASC LIMIT 1");
$getimg    = mysqli_fetch_array($upload);
$title     = strlen($getdata['title']);
$kwiki_short   = strlen($getdata['kwiki_short']);
$extention = explode('.', $getimg['files']);
$type      = $extention[1];
?>
<div class="col-lg-4 col-md-6">
<div class="kiwi-contest text-center">
<?php 
if($type == 'mp4'){
?>
<video width="100%" height="200px" controls>
<source src="controller/files/<?php echo $getimg['files'];?>" type="video/mp4">
</video>
<?php }else{ ?>
<img src="controller/files/<?php echo $getimg['files'];?>" alt="image">
<?php } ?>
<!-- <h5 class="title mt-3"><?php echo substr($getdata['title'],0,20)."...";?></h5> -->
<h5 class="title mt-3"><?php if($title > 30 ){ echo substr($getdata['title'],0,30)."..."; }else{ echo $getdata['title']; }?></h5>
<!-- <p class="mt-3"><?php echo substr($getdata['kwiki_short'],0,70)."...";?></p> -->
<p class="mt-3"><?php if($kwiki_short > 100 ){ echo substr($getdata['kwiki_short'],0,100)."..."; }else{ echo $getdata['kwiki_short']; }?></p>
<a href="product-listing.php?<?php echo $getdata['socialmedia_uname'];?>" class="btn-grad">View Kwiki</a>
</div>
</div><!-- kiwi-end -->
<?php } ?>
<?php
if($count_kiwi == 0){ ?>
<div class="col-lg-12 text-center mt-5">     
<img src="assets/images/nodata.gif" width="500px" style="">
</div> 
<?php } ?>
<div class="col-lg-12 text-center mt-5">
<a href="product.php" class="btn-grad">More Kwikis</a>
</div>
</div>
</div>
</section>
<!-- Featured Kwikis start -->
<!-- sweepstakes-section start -->
<section class="sweepstakes-section" id="about">
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-10">
<div class="section-header text-center">
<h2 class="section-title">What is a kwiki?</h2>
</div>
</div>
</div>
<div class="row justify-content-center text-center">
<div class="col-xl-8">
<p class="mb-3">Kwikis are a new way for influencers and content creators to get paid. Kwikis are a sweepstakes promotion sponsored by you and managed by us. Anyone who enters into your sweepstake will have a chance to win a 30-minute, live video call with you! </p>
<p class="mb-3">You will also provide participants with access to a piece of content you’ve recently created.
You decide how long your kwiki sweepstake will last, but the typical duration is for 1-7 days.</p>
<p class="mb-3">After your video call with the winner, we send you the money received from entries. It’s that simple!</p>
</div>
</div>
</div>
</section>
<!-- sweepstakes-section end -->
<!-- premium-section start -->
<section class="premium-section">
<div class="container">
<div class="row align-items-center pb-5">
<div class="col-md-6">
<img src="assets/images/premium_content.jpg" class="img-fluid shadow rounded">
</div>
<div class="col-md-6">
<div class="premium-content">
<h1 class="title">Monetize your content </h1>
<p>Use kwikis to provide early access to your content. Kwikis are a one-time monetization event , use them if you want to monetize a specific piece of content. </p>
</div>
</div>
</div>
<div class="row align-items-center flex-row-reverse pt-5 pb-5">
<div class="col-md-6">
<img src="assets/images/audience_engage.jpg" class="img-fluid shadow rounded">
</div> 
<div class="col-md-6">
<div class="premium-content">
<h1 class="title">Engage with your audience</h1>
<p>Followers might enjoy your content but they love you! A video call can be the experience of a lifetime for one lucky winner! </p>
</div>
</div>
</div>
<div class="row align-items-center pt-5">
<div class="col-md-6">
<img src="assets/images/value-work.jpg" class="img-fluid shadow rounded">
</div>
<div class="col-md-6">
<div class="premium-content">
<h1 class="title">Get more value for your work</h1>
<p>Kwikis complement, they do not replace, existing monetization methods. By offering access to you and your content, you’re giving your best followers a chance to support you directly! After your kwiki is over, post your content on other platforms and continue getting paid! </p>
</div>
</div>
</div>
</div>
</section>
<!-- premium-section end -->
<!-- sweepstakes-section start -->
<section class="launch-section" id="how-it-works">
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-10">
<div class="section-header text-center">
<h2 class="section-title">How do I launch a kwiki?</h2>
</div>
</div>
</div>
<div class="row justify-content-center">
<div class="col-xl-8">
<ul>
<li><h5>1. To launch, simply fill out our online questionnaire</h5></li>
<li class="pl-3">a. Tell us when you want your kwiki to begin and end</li>
<li class="pl-3">b. Upload your content and any other promotional photos or videos</li>
<li class="pl-3">c. Electronically sign our Agreement</li>
<li><h5>2. Then, tell your audience about your kwiki sweepstake using your native social media platform</h5></li>
<li class="pl-3">a. Let your followers know about your kwiki on Youtube, Instagram, Facebook, etc.</li>
<li class="pl-3">b. We’ll provide simple guidelines on how to properly promote on these platforms</li>
<li><h5>3. Finally, get paid 1-2 business days after your video call with the grand prize winner</h5></li>
<li class="pl-3">a. Payment is typically sent 1-2 business days after your video call</li>
<li class="pl-3">b. Lifecycle of kwiki typically ranges between 4-18 days</li>
</ul>
</div>
<div class="col-lg-12">
<img src="assets/images/lifecycle.jpg" class="img-fluid pt-5">
</div>
</div>
</div>
</section>
<!-- sweepstakes-section end -->
<!-- kiwi-uses-section start -->
<section class="kiwi-section">
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-10">
<div class="section-header text-center">
<h2 class="section-title">Who uses kwiki sweepstakes?</h2>
</div>
</div>
</div>
<div class="row pt-4">
<div class="col-lg-3 col-sm-6">
<div class="kiwi-item text-center">
<div class="icon">
<div class="icon-inner">
<img src="assets/images/icons/influencer.svg" alt="">
</div>
</div>
<div class="content">
<h4 class="title">Influencers </h4>
</div>
</div>
</div><!-- kiwi-uses-item end -->
<div class="col-lg-3 col-sm-6">
<div class="kiwi-item text-center">
<div class="icon">
<div class="icon-inner">
<img src="assets/images/icons/gamer.svg" alt="">
</div>
</div>
<div class="content">
<h4 class="title">Gamers</h4>
</div>
</div>
</div><!-- kiwi-uses-item end -->
<div class="col-lg-3 col-sm-6">
<div class="kiwi-item text-center">
<div class="icon">
<div class="icon-inner">
<img src="assets/images/icons/video-creator.svg" alt="">
</div>
</div>
<div class="content">
<h4 class="title">Video creators</h4>
</div>
</div>
</div><!-- kiwi-uses-item end -->
<div class="col-lg-3 col-sm-6">
<div class="kiwi-item text-center">
<div class="icon">
<div class="icon-inner">
<img src="assets/images/icons/posdcaster.svg" alt="">
</div>
</div>
<div class="content">
<h4 class="title">Podcasters</h4>
</div>
</div>
</div><!-- kiwi-uses-item end -->
<div class="col-lg-3 col-sm-6">
<div class="kiwi-item text-center">
<div class="icon">
<div class="icon-inner">
<img src="assets/images/icons/visual-artist.svg" alt="">
</div>
</div>
<div class="content">
<h4 class="title">Visual artists</h4>
</div>
</div>
</div><!-- kiwi-uses-item end -->
<div class="col-lg-3 col-sm-6">
<div class="kiwi-item text-center">
<div class="icon">
<div class="icon-inner">
<img src="assets/images/icons/musician.svg" alt="">
</div>
</div>
<div class="content">
<h4 class="title">Musicians</h4>
</div>
</div>
</div><!-- kiwi-uses-item end -->
<div class="col-lg-3 col-sm-6">
<div class="kiwi-item text-center">
<div class="icon">
<div class="icon-inner">
<img src="assets/images/icons/blogger.svg" alt="">
</div>
</div>
<div class="content">
<h4 class="title">Bloggers </h4>
</div>
</div>
</div><!-- kiwi-uses-item end -->
<div class="col-lg-3 col-sm-6">
<div class="kiwi-item text-center">
<div class="icon">
<div class="icon-inner">
<img src="assets/images/icons/content-creator.svg" alt="">
</div>
</div>
<div class="content">
<h4 class="title">Content creators of all kinds </h4>
</div>
</div>
</div><!-- kiwi-uses-item end -->
</div>
</div>
</section>
<!-- kiwi-uses-section end -->
<!-- services-kwikisweeps-section start -->
<section class="services-kwikisweeps" id="services">
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-8">
<div class="section-header text-center">
<h2 class="section-title">What services does Kwikisweeps provide?</h2>
</div>
</div>
</div>
<div class="row justify-content-center pt-4">
<div class="col-lg-10">
<div class="services-kwikisweeps-table-part">
<div class="services-kwikisweeps-table">
<div class="services-kwikisweeps-table-wrapper">
<table>
<thead>
<tr>
<th class="own-name">We take care of:</th>
<th class="terms">You take care of:</th>
</tr>
</thead>
<tbody>
<tr>
<td>
<span class="own-name"> Sweepstakes design, launch and management</span>
</td>
<td>
<span class="terms-price"> Content for your kwiki</span>
</td>
</tr>
<tr>
<td>
<span class="own-name"> Creation of your personal kwiki website</span>
</td>
<td>
<span class="terms-price"> Promoting your kwiki</span>
</td>
</tr>
<tr>
<td>
<span class="own-name"> Social media and other promotional guidelines</span>
</td>
<td>
<span class="terms-price"> Video call with the grand prize winner</span>
</td>
</tr>
<tr>
<td>
<span class="own-name"> Design of official rules and disclaimers</span>
</td>
<td>
</td>
</tr>
<tr>
<td>
<span class="own-name"> Sweepstakes entries and payment management</span>
</td>
<td>
</td>
</tr>
<tr>
<td>
<span class="own-name"> Winner selection, notification and verification</span>
</td>
<td>
</td>
</tr>
<tr>
<td>
<span class="own-name"> Posting and recordkeeping requirements</span>
</td>
<td>
</td>
</tr>
<tr>
<td>
<span class="own-name"> Customer support for all inquiries</span>
</td>
<td>
</td>
</tr>
<tr class="text-danger"><td colspan="2"> *Sweepstake registration, bonding and insurance requirements vary by state. Winner 1099 IRS compliance may be required. Kwikisweeps will manage all requirements as necessary </td> </tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- services-kwikisweeps end -->
<!-- kwiki-pricing start -->
<section class="kwiki-pricing" id="pricing">
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-10">
<div class="section-header text-center">
<h2 class="section-title">How does kwiki pricing work? </h2>
</div>
</div>
</div>
<div class="row align-items-center pt-5 pb-5"> 
<div class="col-md-7">
<div class="kwiki-pricing-content mb-3">
<h6 class="mb-4">For followers, who enter into you kwiki, they choose among five payment amounts:</h6>
<span> $2 </span> <span> $5 </span> <span> $10 </span> <span> $20 </span> <span> $100 </span>
<h6 class="mb-4">For you, Kwikisweeps will charge:</h6>
<ul class="pricing-list">
<li> <del>$189</del> $89 administrative fee to setup and manage your kwiki, plus</li>
<li> 20% of the total money raised after the administrative fee</li>
<li> Kwikisweeps will not charge an administrative fee upfront</li>
<li> All fees are automatically taken out of the money raised from your kwiki</li>
<li> If your kwiki fails to raise enough to cover the administrative fee, Kwikisweeps will not charge you the difference</li>
</ul>
</div>
</div>
<div class="col-md-5">
<img src="assets/images/pricing.jpg" class="img-fluid shadow rounded">
</div>
</div>
</div>
</section>
<!-- kwiki-pricing end -->
<!-- footer-section start -->
<?php include('assets/include/footer.php'); ?>
<!-- Js start -->
<?php include('assets/include/js.php'); ?>
</body>
</html>