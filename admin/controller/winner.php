<?php 

include('../../controller/config.php');

if (isset($_GET['access_id'])){

//USA timezone    

date_default_timezone_set("America/New_York");

$date        = date("m/d/Y");
$time        = date("H:i");
$order_id    = uniqid();
$access_id   = $_GET['access_id']; 
$win_id      = $_GET['win_id']; 

$get_kwiki       = mysqli_query($con,"SELECT * FROM contest WHERE access_id='$access_id'");
$kwiki_details   = mysqli_fetch_array($get_kwiki);
$sdate           = $kwiki_details['sdate'];
$edate           = $kwiki_details['edate'];
$title           = $kwiki_details['title'];

if($edate > $date ){

header('Location : ../view_entries.php?access_id='.$access_id.'&exp');

}else{


// get random data from the database 

//$get_rand       = mysqli_query($con,"SELECT * FROM orders WHERE access_id ='$access_id' ORDER BY RAND() LIMIT 1");
$get_rand       = mysqli_query($con,"SELECT * FROM orders WHERE order_id ='$win_id'");
$win_rand       = mysqli_fetch_array($get_rand);

$kwiki_id       = $win_rand['access_id'];
$order_id       = $win_rand['order_id'];
$email          = $win_rand['email'];
$mobile         = $win_rand['mobile'];
$fname          = $win_rand['fname'];
$lname          = $win_rand['lname'];
$price          = $win_rand['price'];
$entry          = $win_rand['entry'];


$check           = mysqli_query($con,"SELECT * FROM winner_list WHERE access_id='$access_id'");
$get_check       = mysqli_num_rows($check);

if($get_check > 0){

header('Location : ../view_entries.php?access_id='.$access_id.'&already');

}else{

$sql = mysqli_query($con,"INSERT INTO `winner_list` (`kwiki_id`, `order_id`, `name`,`lname`, `date`, `time`, `email`, `mobile`,`price`,`entry`,`access_id`) VALUES ('$kwiki_id', '$order_id', '$fname', '$lname', '$date', '$time', '$email', '$mobile', '$price', '$entry','$access_id')"); 

$update_kwiki = mysqli_query($con,"UPDATE contest SET status='2' WHERE access_id='$access_id'");


header('Location : ../view_entries.php?access_id='.$access_id.'&win');




} 

}

}


?>







