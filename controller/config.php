<?php 


// Database configuration 
$dbHost     = "localhost"; 
$dbUsername = "ucntding_sweepstake"; 
$dbPassword = "+koJnrf+9+W2"; 
$dbName     = "ucntding_sweepstake"; 
 
// Create database connection 
$con = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); 
 

// Check connection 
if ($con->connect_error) { 
    die("Connection failed: " . $con->connect_error); 
}

?>