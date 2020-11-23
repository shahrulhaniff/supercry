<?php
include "database/server.php";


$planname = $_POST['planname'];
$planroi = $_POST['planroi'];
$planday = $_POST['planday'];
$mininv = $_POST['mininv'];
$PT = $_POST['PT'];

if($PT=="BTC"){
$mininv = 1;
}



$sql1="INSERT INTO masterctrl2 (planname,planroi,planday,plantype,mininv) values('$planname','$planroi','$planday','$PT','$mininv')";
$result=mysqli_query($conn,$sql1) or die(mysqli_error($conn));

if($result){
echo ("<script LANGUAGE='JavaScript'>window.location.href='index_master.php';</script>");
exit();
}
else { echo ("<script LANGUAGE='JavaScript'>window.alert('Network error.. Please Try Again.');window.location.href='index_master.php';</script>"); }

?>