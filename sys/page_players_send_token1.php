<?php
include "database/server.php";
include "functions.php";

$userid = $_POST['userid'];

$data1 = mysqli_query($conn,"SELECT id FROM userpro WHERE id='$userid'") or die(mysqli_error($conn));
$info1 = mysqli_fetch_array( $data1 );
$id = $info1['id'];


if($id==null){
$code="Username ".$userid." is not exist";
echo "<script LANGUAGE='JavaScript'>window.location.href='page_players_send_token.php?userid=".$userid."&code=".$code."';</script>";
}

if($id!=null){
	$getTotalInvestPrime = getTotalInvestPrime($id);
	if($getTotalInvestPrime==null){
		$code="Username ".$userid." did not subscribe PRIME PLAN today";
		echo "<script LANGUAGE='JavaScript'>window.location.href='page_players_send_token.php?userid=".$userid."&code=".$code."';</script>";
	}
	else {
	//echo "<script LANGUAGE='JavaScript'>window.alert('Successfull !');window.location.href='page_players_send_token.php?userid=';</script>";
	echo "<script LANGUAGE='JavaScript'>window.location.href='page_players_send_token.php?userid=".$userid."&cekuser=ok';</script>";
	}
}



?>