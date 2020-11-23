<?php

include "database/server.php";
include "functions.php";
$i='1';
$data = mysqli_query($conn,"SELECT * FROM invest WHERE stat='Active' ORDER BY created_date DESC") or die(mysqli_error($conn));
while($info = mysqli_fetch_array( $data )) {
$lapan   = $info['id'];
$planday   = $info['planday'];
$planname   = $info['planname'];



									date_default_timezone_set('Asia/Kuala_Lumpur');
									//$dateNow  = date("Y-m-d H:i:s");
									$dateNow   = $info['created_date'];
									$current  = strtotime($dateNow);
									$days     = $planday * 86400;
									$payday      = $current + $days;
									$payday = date('d/m/Y  h:i:sa', $payday);





echo $payday."-".$planname." - ".$lapan."<br>";
$i++;
}
	
?>