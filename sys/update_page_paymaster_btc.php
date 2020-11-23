<?php
session_start();
include "database/server.php";

$sn = $_POST['sn'];
$memberid = $_POST['memberid'];
$amount = $_POST['amount'];

$sqlUP="UPDATE btcdepo set stat = 'Paid' WHERE memberid='".$memberid."' AND sn='".$sn."'";
$resultUP=mysqli_query($conn,$sqlUP) or die(mysqli_error($conn));

$sqlUP2="UPDATE investbtc set stat = 'Paid' WHERE id='".$memberid."' AND sn='".$sn."'";
$resultUP2=mysqli_query($conn,$sqlUP2) or die(mysqli_error($conn));



if(($resultUP)&&($resultUP2)){
echo ("<script LANGUAGE='JavaScript'>window.alert('Paid to ".$memberid."');window.location.href='page_pay_master_btc.php';</script>");
exit();
}
else { echo ("<script LANGUAGE='JavaScript'>window.alert('Try Again');window.location.href='page_pay_master_btc.php';</script>"); }

?>