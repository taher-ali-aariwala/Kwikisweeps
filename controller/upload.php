<?php

if(isset($_POST['upload'])){
// file upload function 1
   print_r($_FILES['files']); die;
$fname = implode(",",$_FILES['files']['name']);

foreach($_FILES['files']['name'] as $key=>$val){ 
$f_name      = $_FILES['files']['name'][$key];
$f_tmp       = $_FILES['files']['tmp_name'][$key];

$f_size      = $_FILES['files']['size'][$key];
$f_extension = explode('.', $f_name);

$f_extension = strtolower(end($f_extension));

$f_newfile   = uniqid() . '.' . $f_extension;

$store       = "files/" . $f_newfile;

if ($f_extension == 'jpg' || $f_extension == 'jpeg' || $f_extension == 'png' || $f_extension == 'gif') {

if ($f_size >= 1000000) {
echo "max size is 10 mb";

} else {

if (move_uploaded_file($f_tmp, $store)) {
} 
}
}

}

// Fetch places from the database 
$sql = mysqli_query($con,"INSERT INTO `contest` (`time`, `date`, `access_id`, `title`, `sdate`, `edate`, `descp`,`files`,`files2`,`kwiki_short`) VALUES ('$time', '$date', '$access_id', '$title', '$sdate', '$edate', '$descp','$f_newfile','$fname','$kwiki_short')"); 
}
?>