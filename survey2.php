<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
include "sys/database/server.php";


$id = $_POST['id'];
$fullname = $_POST['fullname'];
$kp = $_POST['kp'];
$address = $_POST['address'];
$phoneno = $_POST['phoneno'];

$q1 = $_POST['q1'];
$q2 = $_POST['q2'];
$q3 = $_POST['q3'];
$q4 = $_POST['q4'];
$q5 = $_POST['q5'];
$q6 = $_POST['q6'];





$sql1="INSERT INTO survey (id,fullname,kp,address,phoneno,q1,q2,q3,q4,q5,q6) values('$id','$fullname','$kp','$address','$phoneno','$q1','$q2','$q3','$q4','$q5','$q6')";
$result=mysqli_query($conn,$sql1) or die(mysqli_error($conn));

if($result){
echo ("<script LANGUAGE='JavaScript'>window.location.href='sys/index.php';</script>");
//exit();
$sqlUP="UPDATE userpro set aktif='Y' WHERE id = '$id'";
$resultUP=mysqli_query($conn,$sqlUP) or die(mysqli_error());
}
else { echo ("<script LANGUAGE='JavaScript'>window.alert('Network error.. Please Try Again.');window.location.href='index.php';</script>"); }
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