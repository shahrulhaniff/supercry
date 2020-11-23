<?php
include "database/server.php";


$tokenz = $_POST['tokenz'];
$usd57 = $_POST['usd57'];;





$sql1="INSERT INTO pricetoken (tokenz,usd) values('$tokenz','$usd57')";
$result=mysqli_query($conn,$sql1) or die(mysqli_error());

if($result){
echo ("<script LANGUAGE='JavaScript'>window.location.href='page_token_price.php';</script>");
exit();
}
else { echo ("<script LANGUAGE='JavaScript'>window.alert('Network error.. Please Try Again.');window.location.href='page_token_price.php';</script>"); }
/*
$sqlUP="UPDATE masterctrl set planday = '$fname'";
$resultUP=mysqli_query($conn,$sqlUP) or die(mysqli_error());
if($resultUP){
echo ("<script LANGUAGE='JavaScript'>window.alert('Profile Updated!');window.location.href='page_update_profile.php';</script>");
exit();

}
else { echo ("<script LANGUAGE='JavaScript'>window.alert('Try Again');window.location.href='page_update_profile.php';</script>"); }
*/
?>