<?php
include "database/server.php";
//include "functions.php";

$SN = $_GET['SN'];//no resit
$ID = $_GET['ID'];//user
$AM = $_GET['AM'];//amount dalam usd

$select=mysqli_query($conn,"SELECT * FROM pricetoken ORDER BY created_date DESC LIMIT 1");
$fetch=mysqli_fetch_array($select);
$usd=$fetch['usd'];
$tokenz=$fetch['tokenz'];
//$amount=($tokenz*$usd);
$tokenAM = ($AM/$usd);

$select2=mysqli_query($conn,"SELECT tokenz from wallet WHERE id='$ID'");
$fetch2=mysqli_fetch_array($select2);
$balance=$fetch2['tokenz'];//$balance = getWalletb($ID);
$upb = $balance + $tokenAM; //update balance


$sql="DELETE FROM wd  WHERE sn='".$SN."' AND id='".$ID."'";
$result=mysqli_query($conn,$sql);

if($result){
	
$sqlUP="UPDATE wallet set tokenz = '".$upb."' WHERE id='".$ID."' ";
$resultUP=mysqli_query($conn,$sqlUP) or die(mysqli_error());

echo ("<script LANGUAGE='JavaScript'>window.alert('You have successfully buy back your SCFX Token');window.location.href='page_withdraw_request.php';</script>");
exit();
}
else { echo ("<script LANGUAGE='JavaScript'>window.alert('Try Again');window.location.href='page_withdraw_request.php';</script>"); }

?>