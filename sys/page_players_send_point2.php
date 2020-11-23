<?php
include "database/server.php";

$point = $_POST['point'];
$memberid = $_POST['memberid'];
$walletb = $_POST['walletb'];
$total = $walletb+$point;

$sqlUP="UPDATE wallet set walletb = '$total' WHERE id='$memberid'";
$resultUP=mysqli_query($conn,$sqlUP) or die(mysqli_error());
if($resultUP){
	
$sql1="INSERT INTO walletlog (memberid,amount,walletb) values('$memberid','$point','$total')";
$result=mysqli_query($conn,$sql1) or die(mysqli_error());
	
echo ("<script LANGUAGE='JavaScript'>window.location.href='page_players_send_point.php';</script>");
exit();
}
else { echo ("<script LANGUAGE='JavaScript'>window.alert('Try Again');window.location.href='page_players_send_point.php';</script>"); }

?>