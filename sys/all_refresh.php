<?php

include "database/server.php";
include "functions.php";
$i='1';
$data = mysqli_query($conn,"SELECT * FROM invest WHERE stat='Active' ORDER BY created_date ASC") or die(mysqli_error($conn));
while($info = mysqli_fetch_array( $data )) {
$lapan   = $info['id'];
$planday   = $info['planday'];



									date_default_timezone_set('Asia/Kuala_Lumpur');
									//$dateNow  = date("Y-m-d H:i:s");
									$dateNow   = $info['created_date'];
									$current  = strtotime($dateNow);
									$days     = $planday * 86400;
									$payday      = $current + $days;
									$payday = date('d/m/Y  h:i:sa', $payday);



//$lapan="2";
$refr = refreshPortf($lapan);
if($refr=='clean'){ $color="black"; } else { $color="red"; }
echo "<br><font color='".$color."'>[";
echo $i;
echo "]";
echo $refr;

echo " - </font>".$payday." - ".$lapan;
$i++;
}
	
?>