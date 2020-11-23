<?php
/*
if(($amount>=1000)&&($amount<3000)){
	$bontoken = ($amount/10);
	$tokenb=$tokenb+$bontoken;
} */

if(($amount>=1000)&&($amount<4000)){
	$bontoken = ($amount/9.090909091);
	$tokenb=$tokenb+$bontoken;
}

if(($amount>=4000)&&($amount<5000)){
	$bontoken = ($amount/8.88888888889);
	$tokenb=$tokenb+$bontoken;
}

if($amount>=5000){
	$bontoken = ($amount/8.025682183);
	$tokenb=$tokenb+$bontoken;
}

?>