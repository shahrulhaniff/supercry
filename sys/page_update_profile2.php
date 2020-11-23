<?php
include "database/server.php";

$id = $_POST['id'];
$fname= $_POST['fname'];
$address= $_POST['address'];
$phone= $_POST['phone'];
$penama= $_POST['penama'];
$akaunb= $_POST['akaunb'];
$jenisb= $_POST['jenisb'];
$btc= $_POST['btc'];

$sqlUP="UPDATE userpro set fname = '$fname',address = '$address',addressbtc = '$btc' ,phone = '$phone',akaunb = '$akaunb',jenisb = '$jenisb',penama = '$penama' WHERE id = '$id'";
$resultUP=mysqli_query($conn,$sqlUP) or die(mysqli_error());

	if($resultUP){
	echo ("<script LANGUAGE='JavaScript'>window.alert('Profile Updated!');window.location.href='page_update_profile.php';</script>");
	exit();

	}
	else { echo ("<script LANGUAGE='JavaScript'>window.alert('Try Again');window.location.href='page_update_profile.php';</script>"); }
?>