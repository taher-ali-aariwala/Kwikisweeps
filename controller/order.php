<?php 
require_once 'config.php'; 

if (isset($_POST['submit'])){

//USA timezone    

date_default_timezone_set("America/New_York");

$date = date("Y-m-d");

$time =  date("H:i");

$order_id = uniqid();

$fname = $_POST['fname']; 

$lname = $_POST['lname']; 

$email = $_POST['email']; 

$mobile = $_POST['mobile']; 

$access_id = $_POST['access_id']; 

// get packaGE 
$package   = $_POST['package']; 

$get_plan  = mysqli_query($con,"SELECT * FROM package WHERE type='$package'");
$planget   = mysqli_fetch_array($get_plan);

// get dynamic value from db for package
$entry = $planget['entry'];
$price = $planget['price'];

//input variable price from form
//$price = $_POST['price']; 
//$entry = $_POST['entry']; 


//$access_id = $_GET['id'];
$get_kwiki       = mysqli_query($con,"SELECT * FROM contest WHERE access_id='$access_id'");
$kwiki_details   = mysqli_fetch_array($get_kwiki);
$admin_url       = $kwiki_details['admin_url'];
$title           = $kwiki_details['title'];

// Fetch places from the database 

$sql = mysqli_query($con,"INSERT INTO `orders` (`time`, `date`, `order_id`, `fname`, `lname`, `email`, `mobile`,`price`,`entry`,`access_id`) VALUES ('$time', '$date', '$order_id', '$fname', '$lname', '$email', '$mobile','$price','$entry','$access_id')"); 



//header('Location : ../order-completed.php?succ');
header('Location : ../pay.php?id='.$order_id);




}


?>







