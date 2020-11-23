<?php
include "database/server.php";


$planname = $_POST['planname'];
$planroi = $_POST['planroi'];
$mininv = $_POST['mininv'];
$planday = $_POST['planday'];
$minwd = $_POST['minwd'];;





$sql1="INSERT INTO masterctrl (planname,mininv,minwd,planroi,planday) values('$planname','$mininv','$minwd','$planroi','$planday')";
$result=mysqli_query($conn,$sql1) or die(mysqli_error());

if($result){
echo ("<script LANGUAGE='JavaScript'>window.location.href='index_master.php';</script>");
exit();
}
else { echo ("<script LANGUAGE='JavaScript'>window.alert('Network error.. Please Try Again.');window.location.href='index_master.php';</script>"); }
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