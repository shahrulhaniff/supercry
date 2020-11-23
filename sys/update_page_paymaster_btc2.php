<?php
session_start();
include "database/server.php";

$id = $_POST['id'];
$amount = $_POST['point'];


$sql="UPDATE wallet SET bonusbtc='0' WHERE id='".$id."'";
$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

//echo $id;

//if(($resultUP)&&($resultUP2)){
if($result){
	
$sql1="INSERT INTO walletlog (memberid,amount,walletb) values('$id','".$amount." BTC','BONUS BTC')";
$result=mysqli_query($conn,$sql1) or die(mysqli_error());
	
echo ("<script LANGUAGE='JavaScript'>window.alert('Paid to ".$id."');window.location.href='page_pay_master_btc.php';</script>");
//exit();
}
else { echo ("<script LANGUAGE='JavaScript'>window.alert('Try Again');window.location.href='page_pay_master_btc.php';</script>"); }

?>