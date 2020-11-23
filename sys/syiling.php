<?php
	//session_start();
	//include "database/server.php";

$i=1;
$total_iwallet='0';

$data = mysqli_query($conn,"SELECT * FROM invest WHERE id='$_SESSION[USER]' ORDER BY created_date DESC") or die(mysqli_error());
while($info = mysqli_fetch_array( $data )) {
						
date_default_timezone_set('Asia/Kuala_Lumpur');
$dataWALLET = mysqli_query($conn,"SELECT walletb, tokenz FROM wallet WHERE id='$_SESSION[USER]'") or die(mysqli_error());
$infoWALLET = mysqli_fetch_array( $dataWALLET );
$walletbw  = $infoWALLET['walletb'];
//$tokenz  = $infoWALLET['tokenz']; 
						
$SN   = $info['sn'];
$amount   = $info['amount'];
$planroi  = $info['planroi'];
$planname  = $info['planname'];
$planday  = $info['planday'];
$days     = $planday * 86400;
						
$income   = (($amount*$planroi)/100);
$income   = bcdiv($income,1,2);
$amount   = bcdiv($amount,1,2);
$walletbw = $walletbw + $income ;
$dateNow  = date("Y-m-d H:i:s");
						
$current  = strtotime($dateNow);
$start    = strtotime($info['created_date']);
$end      = $start + $days;
						
$progress = (($current - $start) / ($end - $start)) * 100;
$progress = bcdiv($progress,1,2);
$color    ="progress-bar-danger";
						
						if ($progress < 100){ 
							$syiling  = ($income*($progress/100));
						}
						if ($progress >= 100){
							$progress = "100";
							$syiling  = ($income*($progress/100));
							$syiling = "0"; //sebabcomplete dah xnak campur
						}
						
						//$syiling = bcdiv($syiling,1,2);
                        $syiling=number_format((float)$syiling, 2, '.', '');

						if($syiling!=$income){ ?>
						<!--<font style="font-style: italic; color:blue;"><?=$syiling?>USDT</font>/<font style="font-style: italic; color:gray;"><?=$income?>USDT</font><br>-->
						<?php $total_iwallet = $total_iwallet + $syiling; ?>
						<?php  } else { 
									echo " "; 
									//echo "Completed"; 
									} ?>
						
                    <?php $i++; } ?>
					<h2 class="widget-heading h3 hitam"><strong>$<?=$total_iwallet?></strong></h2>
					
					
<?php
$dataTOKENZ = mysqli_query($conn,"SELECT tokenz FROM wallet WHERE id='$_SESSION[USER]'") or die(mysqli_error());
$infoTOKENZ = mysqli_fetch_array( $dataTOKENZ );
$tokenz  = $infoTOKENZ['tokenz']; 
?>
               