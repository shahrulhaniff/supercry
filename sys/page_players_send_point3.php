<?php
include "database/server.php";

$point = $_POST['point'];
$memberid = $_POST['memberid'];
$walletc = $_POST['walletc'];
$total = $walletc+$point;

$sqlUP="UPDATE wallet set walletc = '$total' WHERE id='$memberid'";
$resultUP=mysqli_query($conn,$sqlUP) or die(mysqli_error());
if($resultUP){
	
$sql1="INSERT INTO walletlog (memberid,amount,walletb) values('".$memberid."_[PAYWALLET]','$point','$total')";
$result=mysqli_query($conn,$sql1) or die(mysqli_error());
	
echo ("<script LANGUAGE='JavaScript'>window.location.href='page_players_send_point.php';</script>");
exit();
}
else { echo ("<script LANGUAGE='JavaScript'>window.alert('Try Again');window.location.href='page_players_send_point.php';</script>"); }

?>