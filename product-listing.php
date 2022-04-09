<?php

include'controller/config.php';

$uri      = $_SERVER["REQUEST_URI"]; 
$uriArray = explode('?', $uri); 
$uname    = $uriArray[1]; 

//$access_id = $_GET['id'];
$get       = mysqli_query($con,"SELECT * FROM contest WHERE socialmedia_uname='$uname'");
$getdata   = mysqli_fetch_array($get);

$access_id = $getdata['access_id'];

$chk_count  = mysqli_num_rows($get);

$entry      = mysqli_query($con,"SELECT SUM(entry) FROM `orders` WHERE access_id='$access_id' AND status='1'");
$get_entry  = mysqli_fetch_array($entry);

if($chk_count > 0){
  
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

    <meta property="twitter:image" content="assets/images/favicon.png"/>

    <meta property="twitter:image:width" content="350"/>

    <meta property="twitter:image:height" content="597"/>

    <meta name="twitter:domain" content="Kwiki Sweepstakes"/>

</head>
<style>
  #more {display: none;}
</style>
<body>

  <!--  header-section start  -->

  <?php include('assets/include/header.php'); ?>

  <!--  header-section end  -->

  <!--  Popup start  -->
  <div class="modal fade entry-popup" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body no-purchase-content">
           <p class="mb-3">To enter for free, print your first and last name, complete address, telephone number, date of birth and email address (if available) on a four-by-six (4x6) inch card (with no outer envelope). Affix first class postage, and send to PO BOX 730, New York, NY, 10156</p>
           <button type="button" class="cmn-btn modal_btn same-size" data-dismiss="modal" aria-hidden="true">OK</button>
        </div>
      </div>
    </div>
  </div>
<!--  Popup end  -->

  <!-- product-listing-section start -->

    <section class="product-listing">

      <div class="container">

        <div class="row">

          <div class="col-lg-8 col-md-8 col-sm-8 col-xl-8">

            <div class="product-slider">
              
              <?php 
              $upload    = mysqli_query($con,"Select * FROM uploads WHERE username='$access_id' ORDER BY username ASC");
              while($getimg  = mysqli_fetch_array($upload)){
              
              $extention = explode('.', $getimg['files']);
              $type      = $extention[1];
              if($type == 'mp4'){
              ?>
              <div class="single-slide">

                <div class="product-inner">

                <video controls>
                <source src="controller/files/<?php echo $getimg['files'];?>" type="video/mp4">
                </video>

                </div>
              </div>
              <?php }else{ ?>

              <div class="single-slide">

                <div class="product-inner">

                  <img src="controller/files/<?php echo $getimg['files'];?>">

                </div>

              </div>
              <?php } } ?>
             
            </div>

          </div>

          <div class="col-lg-4 col-md-4 col-sm-4 col-xl-4">

            <div class="product-detail">

                <?php 
                $yrdata= strtotime($getdata['sdate']);
                $sdate =  date('M d, Y', $yrdata);

                $yrdata2 = strtotime($getdata['edate']);
                $edate   =  date('M d, Y', $yrdata2);
                ?>

              <h2><?php echo $getdata['title'] ;?></h2>

              <div class="date-column float-left">

                <h6>Start Date:</h6>

                <span><?php echo $sdate;?></span>

              </div>

              <div class="date-column float-right">

                <h6>End Date:</h6>

                <span><?php echo $edate;?></span>

              </div>

              <div class="counter">

                <span>Number of entries today: </span>

                <span class="count"><?php echo $get_entry['SUM(entry)'];?></span>

              </div>

              <div class="product-description mb-3">

                <!-- <h4>All participants will receive:</h4> -->
                <h4>All entries will received featured content:</h4>
                <!-- <p>All entries will receive featured content:</p> -->
                <p id="sub_descp"><?php echo substr($getdata['descp'], 0, 200);?></p>
                <br>
                
                <p><b>One lucky winner will be entitled to:</b> <br> 30 minute live video call with  <b><?php echo $getdata['socialmedia_uname'];?></b></p>
              </div>

              <!-- <div class="product-winner">

                <h4>Winner(s) will receive:</h4>

                <ul>

                <li><p>One 30-minute video call with [handle]</p></li>

                <li><p><?php echo $getdata['kwiki_short'];?></p></li>

                </ul>

              </div> -->

              <div class="enroll-btn">

                <a href="#package" class="cmn-btn">Enter Now</a>

              </div>

            </div>

          </div>

        </div>

      </div>

    </section>

  <!-- product-listing End -->


  <!-- Package start -->

    <section class="package" id="package">

      <div class="container">

        <div class="row justify-content-center">

          <div class="col-lg-12">

            <div class="section-header text-center">

              <h2 class="section-title">Enter now for a chance to meet <?php echo $getdata['socialmedia_uname'];?></h2>

              <p>All entries provide access to featured content </p>

            </div>

          </div>

        </div>

        <div class="row justify-content-center">

          <div class="col-lg-3 col-md-3 col-sm-3 col-xl-3">
          </div>

          <div class="col-lg-2 col-md-2 col-sm-2 col-xl-2 col-6">

            <div class="entry-price">

              <p>$2.00 </p>

              <p>1 entry</p>

              <a href="user-details.php?plan=basic&access_id=<?php echo $getdata['access_id'];?>">($2.00/ entry)</a>

            </div>

          </div>

          <div class="col-lg-2 col-md-2 col-sm-2 col-xl-2 col-6">

            <div class="entry-price">

              <p>$5.00 </p>

              <p>5 entries</p>

              <a href="user-details.php?plan=premium&access_id=<?php echo $getdata['access_id'];?>">($1.00/ entry)</a>

            </div>

          </div>

          <div class="col-lg-2 col-md-2 col-sm-2 col-xl-2 col-6">

            <div class="entry-price">

              <p>$10.00 </p>

              <p>11 entries</p>

              <a href="user-details.php?plan=silver&access_id=<?php echo $getdata['access_id'];?>">($0.91/ entry)</a>

            </div>

          </div>

          <div class="col-lg-3 col-md-3 col-sm-3 col-xl-3">
          </div>

          <div class="col-lg-2 col-md-2 col-sm-2 col-xl-2 col-6">

            <div class="entry-price">

              <p>$20.00 </p>

              <p>25 entries</p>

              <a href="user-details.php?plan=gold&access_id=<?php echo $getdata['access_id'];?>">($0.80/ entry)</a>

            </div>

          </div>

          <div class="col-lg-2 col-md-2 col-sm-2 col-xl-2 col-6">

            <div class="entry-price">

              <p>$100.00 </p>

              <p>150 entries</p>

              <a href="user-details.php?plan=platinum&access_id=<?php echo $getdata['access_id'];?>">($0.67/ entry)</a>

            </div>

          </div>

        </div>

        <div class="row justify-content-center">

          <div class="col-lg-6 col-md-6 col-sm-6 col-xl-6 text-center">

              <button type="submit" name="submit" class="cmn-btn" data-toggle="modal" data-target="#exampleModal">No payment necessary to enter</button>

          </div>

        </div>

      </div>

    </section>

  <!-- Package end -->


  <!-- Sweepstakes Rules start -->

    <section class="rules-section">

      <div class="container">

        <div class="row">

          <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">

            <div class="rules">
            <h2>OFFICIAL RULES </h2>
            <p><?php echo $getdata['socialmedia_uname'];?> SWEEPSTAKES POWERED BY KWIKISWEEPS </p>
            <p>NO PURCHASE NECESSARY. A PURCHASE WILL NOT IMPROVE YOUR CHANCES OF WINNING.</p>
            <p>Sponsor: <?php echo $getdata['fname'];?> <?php echo $getdata['lname'];?>, <?php echo $getdata['city'];?>, <?php echo $getdata['zip'];?>.</p>
            <p>Sweepstakes Administrator: KWIKISWEEPS, Inc., New York, NY, 10156.</p>
            <p>Sweepstakes Identification Number: <?php echo $getdata['access_id'];?> </p>
            <p>Sweepstakes is open only to legal U.S. residents, 18 years or older, who have a valid e-mail address. Sweepstakes is offered only in the U.S. Void where prohibited.  
            By participating, you agree to these Official Rules and the decisions of Sponsor and Sweepstakes Administrator, which are final and binding in all respects and not subject to appeal. Before participating, you are strongly advised to review the Privacy Policy of kwikisweeps.com (Website) regarding Sponsor’s/Sweepstakes Administrator’s collection, use and sharing of your personal information in conjunction with the Sweepstakes entry.</p>
            <p><strong>1.  &nbsp; &nbsp; &nbsp; </strong><u><strong>Schedule: </strong></u></p>
            <p>Sweepstakes starts <?php echo $sdate;?> and ends <?php echo $edate;?> (“Sweepstakes Period”).</p>
            <p><strong>2.  &nbsp; &nbsp; &nbsp; </strong><u><strong>To Enter: </strong></u></p>
            <p>During Sweepstakes Period, go to Sponsor’s page on Website and purchase desired number of entries. For any amount of entries purchased, you will receive content described in the Sponsor’s page. Any acknowledgement of receipt of entry (including proof of purchase of specially curated content) is not otherwise binding on Sponsor or Sweepstakes Administrator. Participation in the Sweepstakes by using a mobile device may result in the imposition of the wireless Internet access fees and other charges which are the entrant’s sole responsibility.<strong>ALL SALES OF SPECIALLY CURATED CONTENT ARE FINAL AND NO REFUNDS WILL BE PROVIDED.</strong> If purchase transaction is rejected for any reason, no entry will be received.</p>  
            <p><strong>3.  &nbsp; &nbsp; &nbsp; </strong><u><strong>NO PURCHASE NECESSARY: </strong></u></p>
            <p>To enter without purchase, print your name, e-mail address, address, year of birth, and  the Sweepstakes Identification Number on a 4”x6” card (i.e., a standard sized postcard) and mail to PO BOX 730, New York, NY, 10156 for receipt no later than two (2) business days after the Sweepstakes end date. Each valid postcard submission counts as 150 entries. Only one (1) postcard may be submitted.  Mechanically reproduced/copied postcards  will not be accepted.  Receipt of postcards will not be acknowledged.  Postcards become the property of Sponsor/Sweepstakes Administrator and will not be returned.</p>
            <p><strong>4.  &nbsp; &nbsp; &nbsp; </strong><u><strong>Conditions of Entry: </strong></u></p>
            <p><strong>LIMIT OF (150) ENTRIES PER PERSON.</strong> Violation of entry limit and/or use of automated, programmed or similar means of entry will result in disqualification from Sweepstakes. Proof of purchase of specially curated content or mailing postcard does not constitute proof of entry; proof of mailing postcard also does not constitute proof of receipt of same. Any dispute as to identity of entrant will be resolved by Sweepstakes Administrator in its sole discretion. Sponsor and Sweepstakes Administrator disclaim any and all responsibility for (a) late, lost, illegible/garbled, inaccessible, corrupted, postage due, jumbled, misdirected, stolen, damaged or destroyed  postcards/entries (all of which are void) and (b) any electronic, technological, programming error, failure or malfunction affecting the operation of the Sweepstakes.</p>
            <p><strong>5.  &nbsp; &nbsp; &nbsp; </strong><u><strong>Winner Selection:  </strong></u></p>
            <p>The potential winner will be selected in a random drawing, to be conducted by Sweepstakes Administrator on or about two (2) business days after the Sweepstakes end date. Potential winner will be notified by e-mail and may be required to complete and sign a declaration of eligibility/release within an indicated time period in order to win prize.  If Sweepstakes Administrator cannot contact potential winner despite making commercially reasonable efforts to do so; if potential winner fails to timely return completed and signed declaration of eligibility/release (if applicable); if Sweepstakes Administrator determines that potential winner is ineligible or otherwise in violation of these Official Rules, prize will be forfeited without compensation of any kind and an alternate winner may be selected from among all remaining eligible entries received.</p>
            <p><strong>6.  &nbsp; &nbsp; &nbsp; </strong><u><strong> Prize: </strong></u></p> 
            <p>One (1) prize of a video call with Sponsor will be offered in the Sweepstakes. Prize has no retail value and cannot be redeemed for cash.  Date and time of video call will be scheduled between winner and Sponsor , with the video call to take place no later than one (1) month following confirmation of winner status; WINNER MUST BE AVAILABLE ON DESIGNATED DATE AND TIME FOR VIDEO CALL OR PRIZE WILL BE FORFEITED WITHOUT COMPENSATION OF ANY KIND.  Video call will last approximately thirty (30) minutes, subject to discretion of the Sponsor. Content and format of video call to be determined by Sponsor in his/her sole discretion. Inappropriate behavior by winner during video call voids prize with Sponsor and Sweepstakes Administrator having no liability to winner under any legal theory.  Unless expressly permitted by Sponsor, winner must attend  video call  alone. Winner is solely responsible for all costs in conjunction with attending video call . Sponsor will record the video call  for possible use by Sponsor and its designees (including Sweepstakes Administrator) for advertising/trade/commercial purposes as well as for internal/archival purposes. As between Sponsor and winner, Sponsor will own any and all right, title and interest (including the copyright interest) in such recording; and, winner agrees upon Sponsor’s request and without compensation, to sign any and all documents so as to perfect, effect or record the foregoing grant of rights in the recording of the  video call . Sponsor grants winner a limited, nontransferable, nonsublicenseable, royalty-free license to download and keep one (1) copy of the recording of the  video call solely for his/her personal use.. Odds of winning depend on the total number of eligible entries received.</p>
             
            <p><strong>7.  &nbsp; &nbsp; &nbsp; </strong><u><strong> Conditions of Participation:</strong></u></p>
            <p>Employees of Sponsor, Sweepstakes Administrator or of other entities involved in offering Sweepstakes (“Sweepstakes Entities”) are not eligible to enter or win the prize. Any failure of Sponsor or Sweepstakes Administrator to enforce any provision of these Official Rules shall not represent the waiver of same. Should there be any inconsistency between these Official Rules and any advertising for Sweepstakes, these Official Rules shall prevail, govern and control. By participating, you release, indemnify and agree to hold harmless Sweepstakes Entities; their respective parents, affiliates, subsidiaries; the employees, officers, directors, shareholders, representatives, successors and assigns of any of the foregoing; Facebook, Inc. and any other social media platform on which the Sweepstakes is advertised; from any and all liability in conjunction with participation in the Sweepstakes or receipt, acceptance or use/misuse of prize (if applicable). By accepting prize, winner agrees to the use of his/her name, photograph, likeness, image, voice and other elements of his/her persona by Sponsor and Sweepstakes Administrator for commercial/advertising/publicity purposes, except where prohibited by law.   If Sweepstakes cannot be conducted as originally intended due to force majeure event (e.g., pandemic/epidemic, natural disaster, fraud, governmental action, riot, strike, civil commotion), Sweepstakes Administrator reserves the right to cancel, modify or suspend the Sweepstakes and make the prize available to be won in a manner determined in its sole discretion to be fair, equitable and in accordance with these Official Rules. Notice of such action will be posted on Website. <strong>THIS PROMOTION IS IN NO WAY SPONSORED, ENDORSED OR ADMINISTERED BY, OR OTHERWISE ASSOCIATED WITH FACEBOOK OR INSTAGRAM.</strong></p>

            <p><strong>8.  &nbsp; &nbsp; &nbsp; </strong><u><strong> Disputes Resolved By Arbitration: </strong></u></p>
            <p>To the fullest extent permitted by law, entrants agree that: (a) any and all disputes, claims, and causes of action arising out of or connected with this Sweepstakes or these Official Rules shall be resolved exclusively by arbitration pursuant to the Rules of JAMS, then effective (IN SO AGREEING, ENTRANT UNDERSTANDS AND AGREES THAT ARBITRATION IS A PRIVATE METHOD OF DISPUTE RESOLUTION BETWEEN THE PARTIES  WHICH IS AN ALTERNATIVE TO AND IN PLACE OF PROCEEDING IN A COURT OF LAW BEFORE A JUDGE AND JURY) and (b) his/her recovery in any such arbitration proceeding shall be limited to his/her actual costs of participating in the Sweepstakes (if any), with any and all claims to consequential, punitive, incidental or other damages and equitable or injunctive relief being waived.</p>

            <p>The arbitrator in such proceeding shall be neutral and the entrant will have a reasonable opportunity to participate in the selection of the arbitrator. If an in-person hearing before the arbitrator is desired, it will take place in New York, New York.</p>

            <p>Disputes will be arbitrated only on an individual basis and will not be consolidated with any other proceedings that involve any disputes/claims/causes of action of another party, including any class actions; provided, however, if for any reason any court or arbitrator holds that this restriction is unconscionable or unenforceable, then the agreement to arbitrate doesn’t apply in its entirety and the dispute/claim/cause of action must be brought in New York State court in New York, NY or in the U.S. District Court for the Southern District of New York (in New York, NY), with entrant agreeing to the exclusive personal jurisdiction of such courts.</p>

            <p>All issues and questions concerning the Sweepstakes and these Official Rules shall be resolved pursuant to New York State law (excluding conflict of law/choice of law provisions).</p>

            <p>The parties will equally split the arbitrator’s fees, and expenses and each party shall pay its costs and attorneys’ fees. If the claimant can demonstrate that the costs of arbitration will be prohibitive as compared to the costs of litigation, Sponsor will pay as much of the claimant’s filing, and hearing fees in connection with the arbitration as the arbitrator deem necessary to prevent the arbitration from being cost-prohibitive. Notwithstanding, if any party prevails on a statutory claim that affords a prevailing party attorneys’ fees and costs, or if there is a written agreement providing for attorneys’ fees and costs, the arbitrator will award such costs and fees per the applicable statute or written agreement. The arbitrator shall resolve any dispute regarding the reasonableness of any fee or cost that may be awarded under this paragraph.</p>

            <p><strong>9.  &nbsp; &nbsp; &nbsp; </strong><u><strong> Winner’s List:</strong></u></p>
            <p>For name of winner (first name, last initial, city/state), send a self-addressed stamped envelope to PO BOX 730, New York, NY, 10156 for receipt no later than three (3) weeks after end of Sweepstakes Period. Be sure to include the full name of the Sponsor and the Sweepstakes Period on such request. </p>

            </div>

          </div>

        </div>

      </div>

    </section>

  <!-- Sweepstakes Rules end -->
    <script>
    function showmore() {
      var dots      = document.getElementById("dots");
      var moreText  = document.getElementById("more");
      var btnText   = document.getElementById("myBtn");
      var sub_descp = document.getElementById("sub_descp");

      if (dots.style.display === "none") {
        dots.style.display = "inline";
        sub_descp.style.display = "inline";
        btnText.innerHTML = "Read more"; 
        moreText.style.display = "none";
      } else {
        dots.style.display = "none";
        sub_descp.style.display = "none";
        btnText.innerHTML = "Read less"; 
        moreText.style.display = "inline";
      }
    }
    </script>
  <!-- footer-section start -->

  <?php include('assets/include/footer.php'); ?>

  <!-- Js start -->

  <?php include('assets/include/js.php'); ?>

</body>
</html>
<?php } else{ 

header('Location : https://kwikisweeps.com/404.php');
 
   }

?>

