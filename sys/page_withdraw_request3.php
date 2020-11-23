<?php

include "database/server.php";

$id = $_POST['id'];
$usd= $_POST['usd'];
$amounttoken= $_POST['amounttoken'];
$tokenb = $_POST['tokenb'];
$tokenb = $tokenb - $amounttoken;
$tokenb=number_format((float)$tokenb, 8, '.', '');

$dapat=($usd*$amounttoken);
$dapat=number_format((float)$dapat, 2, '.', '');

$data = mysqli_query($conn,"SELECT count(sn) as mysn FROM wd WHERE id='$id'") or die(mysqli_error());
$info = mysqli_fetch_array( $data );
$sn = $info['mysn'];
$sn=$sn+1;

	
$sql1="INSERT INTO wd (sn,id,amount,stat) values('$sn','$id','$dapat','Processing_Token')";
$result=mysqli_query($conn,$sql1) or die(mysqli_error());

					
if($result){
	
$sqlUP="UPDATE wallet 
		set tokenz = '$tokenb'
		WHERE id = '$id'";
$resultUP=mysqli_query($conn,$sqlUP) or die(mysqli_error());
			
			
	if($resultUP){
	echo ("<script LANGUAGE='JavaScript'>window.alert('You have successfully sell your SCF token.');window.location.href='page_withdraw_request.php';</script>");
	exit();
			
	}else { echo ("<script LANGUAGE='JavaScript'>window.alert('Network error, please try again..');window.location.href='page_withdraw_request.php';</script>"); }
	
//echo ("<script LANGUAGE='JavaScript'>window.alert('Invest Success.');window.location.href='page_invest.php';</script>");
}
else { echo "error"; }

?>