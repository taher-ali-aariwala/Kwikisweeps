<?php 

require_once 'config.php'; 



if (isset($_POST['submit'])){



//USA timezone    

date_default_timezone_set("America/New_York");

$date = date("Y-m-d");

$time =  date("H:i");

$access_id = uniqid();



$title = $_POST['title']; 

$sdate = $_POST['sdate']; 

$edate = $_POST['edate']; 

$descp = $_POST['descp']; 

$kwiki_short = $_POST['kwiki_short']; 







// file upload function 1   

$fileNames  = array_filter($_FILES['uploads']['name']); 

$fileNames1 = array_filter($_FILES['fields']['name']); 



if(empty($fileNames)){ 



header('Location : ../second-form.php?upload');



}else if(empty($fileNames1)){



header('Location : ../second-form.php?field');



}else{



if(!empty($fileNames)){

foreach($_FILES['uploads']['name'] as $key=>$val){ 

$f_name      = $_FILES['uploads']['name'][$key];
$f_tmp       = $_FILES['uploads']['tmp_name'][$key];
$f_size      = $_FILES['uploads']['size'][$key];
$f_extension = explode('.', $f_name);
$f_extension = strtolower(end($f_extension));
$f_newfile   = uniqid() . '.' . $f_extension;
$store       = "files/" . $f_newfile;

if ($f_extension == 'jpg' || $f_extension == 'jpeg' || $f_extension == 'png' || $f_extension == 'mp4'){



if (move_uploaded_file($f_tmp, $store)){

    

 $sql = mysqli_query($con,"INSERT INTO `uploads` (`files`, `username`) VALUES ('$f_newfile', '$access_id')"); 

} 

}else{

header('Location : ../second-form.php?typ');

}

}

}



// file upload function 2   

if(!empty($fileNames1)){

foreach($_FILES['fields']['name'] as $key1=>$val1){ 

$f_name1      = $_FILES['fields']['name'][$key1];
$f_tmp1       = $_FILES['fields']['tmp_name'][$key1];
$f_size1      = $_FILES['fields']['size'][$key1];
$f_extension1 = explode('.', $f_name1);
$f_extension1 = strtolower(end($f_extension1));
$f_newfile1   = uniqid() . '.' . $f_extension1;
$store1       = "files/" . $f_newfile1;


if ($f_extension1 == 'jpg' || $f_extension1 == 'jpeg' || $f_extension1 == 'png' || $f_extension1 == 'mp4'){



if (move_uploaded_file($f_tmp1, $store1)){

$sql = mysqli_query($con,"INSERT INTO `fields` (`field`, `username`) VALUES ('$f_newfile1', '$access_id')"); 

} 


}else{

    header('Location : ../second-form.php?typ');

}


}
}



// Fetch places from the database 

$sql = mysqli_query($con,"INSERT INTO `contest` (`time`, `date`, `access_id`, `title`, `sdate`, `edate`, `descp`,`kwiki_short`) VALUES ('$time', '$date', '$access_id', '$title', '$sdate', '$edate', '$descp','$kwiki_short')"); 



header('Location : ../third-form.php?id='.$access_id);


  }

 }

?>







