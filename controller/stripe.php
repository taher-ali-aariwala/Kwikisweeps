<?php 


//for stripe 
require('stripe-php-master/init.php');

$publishableKey="xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";

$secretKey="YYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY";

Stripe\Stripe::setApiKey($secretKey);


//end


?>
