<?php
include "database/server.php";
include "functions.php";

$userid = $_POST['userid'];
$amount = $_POST['amount'];

$data2 = mysqli_query($conn,"SELECT tokenz FROM wallet WHERE id='$userid'") or die(mysqli_error($conn));
$info2 = mysqli_fetch_array( $data2 );
$tokenz = $info2['tokenz'];
$topup = $tokenz+$amount;

$sqlUP="UPDATE wallet set tokenz = '$topup' WHERE id='$userid'";
$resultUP=mysqli_query($conn,$sqlUP) or die(mysqli_error());

if($resultUP){

$sql1="INSERT INTO tokenlog (userid,amount) values('$userid','$amount')";
$result=mysqli_query($conn,$sql1) or die(mysqli_error());

echo ("<script LANGUAGE='JavaScript'>window.location.href='page_players_send_token.php';</script>");
exit();
}
else { echo ("<script LANGUAGE='JavaScript'>window.alert('Try Again');window.location.href='page_players_send_token.php';</script>"); }

?>