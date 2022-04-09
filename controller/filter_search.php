<?php
if (isset($_POST['submit'])) {

$search = $_POST['search'];

if(!empty($search)){

header('Location : ../product.php?search='.$search);

}

}
?>