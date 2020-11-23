<?php
include "database/server.php";
include "functions.php";

$sn = $_GET['sn'];

$sql="DELETE FROM btcdepo  WHERE sn='".$sn."'";
$result=mysqli_query($conn,$sql);

if($result){
	
echo ("<script LANGUAGE='JavaScript'>window.location.href='page_deposit_request_btc.php';</script>");
exit();
}
else { echo ("<script LANGUAGE='JavaScript'>window.alert('Try Again');window.location.href='page_deposit_request_btc.php';</script>"); }

?>