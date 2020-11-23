<?php
	//session_start();
	//include "database/server.php";

$i=1;
$total_iwallet873='0';

$data873 = mysqli_query($conn,"SELECT * FROM investbtc WHERE id='$_SESSION[USER]' ORDER BY created_date DESC") or die(mysqli_error());
while($info873 = mysqli_fetch_array( $data873 )) {
						
date_default_timezone_set('Asia/Kuala_Lumpur');
/*$data874 = mysqli_query($conn,"SELECT walletb, tokenz FROM wallet WHERE id='$_SESSION[USER]'") or die(mysqli_error());
$info874 = mysqli_fetch_array( $data874 );
$walletbw  = $info874['walletb'];
//$tokenz  = $infoWALLET['tokenz']; */
						
$SN   	  = $info873['sn'];
$amount   = $info873['amount'];
$planroi  = $info873['planroi'];
$planname = $info873['planname'];
$planday  = $info873['planday'];
$days     = $planday * 86400;

$income   = (($amount*$planroi)/100);
$income   = bcdiv($income,1,8);
$amount   = bcdiv($amount,1,8);
//$walletbw = $walletbw + $income ;
$dateNow  = date("Y-m-d H:i:s");

$current  = strtotime($dateNow);
$start    = strtotime($info873['created_date']);
$end      = $start + $days;
						
$progress = (($current - $start) / ($end - $start)) * 100;
$progress = bcdiv($progress,1,2);
$color    ="progress-bar-danger";
						
						if ($progress < 100){ 
							$syiling873  = ($income*($progress/100));
						}
						if ($progress >= 100){
							$progress = "100";
							$syiling873  = ($income*($progress/100));
							$syiling873 = "0"; //sebabcomplete dah xnak campur
						}
						
						//$syiling873 = bcdiv($syiling873,1,2);
                        $syiling873=number_format($syiling873, 8, '.', '');

						if($syiling873!=$income){ ?>
						<!--<font style="font-style: italic; color:blue;"><?=$syiling873?>USDT</font>/<font style="font-style: italic; color:gray;"><?=$income?>USDT</font><br>-->
						<?php $total_iwallet873 = $total_iwallet873 + $syiling873; ?>
						<?php  } else {
									echo " "; 
									//echo "Completed"; 
									} ?>
						
                    <?php $i++; } 
					$total_iwallet873 = number_format("".$total_iwallet873."",8).""; ?>
					
            <h2 class="widget-heading h3 kuning"><strong><?=$total_iwallet873?></strong></h2>
					
