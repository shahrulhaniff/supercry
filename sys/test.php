<?php
include 'functions.php';
//$_SESSION['USER'] = "";
// $walletb     =  getWalletb($_SESSION['USER']); 
//$walletc     =  getWalletc($_SESSION['USER']); 
	
	
	
/*	
	
	include "database/server.php";
	$tarikh = "2019-11-23";
	$wujud="N";
	$data6 = mysqli_query($conn,"
					SELECT 
					userpro.id, 
					userpro.fname, 
					userpro.emel, 
					userpro.akaun, 
					invest.amount as amounti, 
					invest.planroi, 
					invest.planday, 
					invest.created_date, 
					invest.stat as stati
					
					FROM invest , userpro
					
					WHERE invest.id = userpro.id
					") or die(mysqli_error());
					
	echo "-->".$tarikh."<br>";
	while($info6 = mysqli_fetch_array( $data6 )) {

	$created_date = $info6['created_date'];
	$created_date2x = date("Y-m-d", strtotime($created_date));
	echo $created_date2x."<br>";
	if($created_date2x==$tarikh){
		$wujud="Y";
	}
	}
echo $wujud; */

//$refreshall  =  refreshAll(); //cronjob


$plan_array  =  getPlan();
echo $ary_planname= $plan_array[3];

?>