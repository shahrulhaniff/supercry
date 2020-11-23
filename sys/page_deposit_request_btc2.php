<?php
include "database/server.php";


$id = $_POST['id'];
$amount = $_POST['amountx'];


$sql1="INSERT INTO btcdepo (memberid,amount,stat) values('$id','$amount','Processing')";
$result=mysqli_query($conn,$sql1) or die(mysqli_error($conn));

if($result){
echo ("<script LANGUAGE='JavaScript'>window.location.href='page_deposit_request_btc.php';</script>");
exit();
}
else { echo ("<script LANGUAGE='JavaScript'>window.alert('Network error.. Please Try Again.');window.location.href='page_deposit_request_btc.php';</script>"); }

?>