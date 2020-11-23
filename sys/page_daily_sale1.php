<?php $paydaymini=null; $payday=null; $paydaymega = null; 
$plandaymini="NO SALE";
$plandaymega="NO SALE"; 
?>
<div class="block full">
<div class="block-title">
<?php $datetaju = date("d/m/Y", strtotime($paydate)); ?>
<h2>Sale on : <?=$datetaju?></h2>
</div>
<div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 20px;">No.</th>
                        <th class="text-center" style="width: 150px;">Time</th>
                        <th>Amount Invest</th>
                        <th>Amount Get</th>
                        <th>Member Id</th>
                        <!--<th>Full Name</th>-->
                        <th>Investment PLAN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					$i='1';
					$amount='0';
					$ki='0';
					$kiBASIC='0';
					$kiMINI='0';
					$kiMEGA='0';
					$totalkiBASIC='0';
					$totalki='0';
					$totalkiMINI='0';
					$totalkiMEGA='0';
					
					$totalamount='0';
					$totalBASIC='0';
					$totalMINI='0';
					$totalMEGA='0';
					
					
$data = mysqli_query($conn,"
					
SELECT 
invest.id,
invest.planroi,
invest.planday,
invest.stat,
userpro.fname,
invest.created_date,
invest.amount ,
invest.planname

FROM invest, userpro 

WHERE invest.id=userpro.id 
AND invest.created_date LIKE '$paydate%' 
ORDER BY invest.created_date ASC
") or die(mysqli_error($conn));
					
					while($info = mysqli_fetch_array( $data )) {
					$id = $info['id'];
					$stat = $info['stat'];
					$fname = $info['fname'];
					$amount = $info['amount'];
					$planroi = $info['planroi'];
					$planday = $info['planday'];
					$planname = $info['planname'];
					$created_date = $info['created_date'];
					$TIME = date("h:i:sa", strtotime($created_date));
					$date = date("d-m-Y", strtotime($created_date));
					
					//$plandaybasic = $info['planday'];
					//$planroibasic = $info['planroi'];
					
					//kira lalu
					$ki=($amount*($planroi/100));
					$ki=number_format((float)$ki, 2, '.', '');
					
$data2 = mysqli_query($conn,"SELECT plantype,planday,planroi FROM masterctrl2 WHERE planname='".$planname."'") or die(mysqli_error());
$info2 = mysqli_fetch_array( $data2 );
$plantype = $info2['plantype'];
$planday2 = $info2['planday'];
$planroi2 = $info2['planroi'];

$data3 = mysqli_query($conn,"SELECT planday,planroi FROM masterctrl WHERE planname='".$planname."'") or die(mysqli_error());
$info3 = mysqli_fetch_array( $data3 );

$plandaybasic2 = $info3['planday'];
if($plandaybasic2!=null){
$plandaybasic = $info3['planday'];
$planroibasic = $info3['planroi'];
}

if($plantype=="ST"){ $plantype ="<FONT COLOR='blue'>MINI</font>"; $totalMINI = $totalMINI+$amount; 
						$plandaymini = $planday2;
						$current  = strtotime($paydate);
						$days     = $planday2 * 86400;
						$payday      = $current + $days;
						$paydaymini = date('d/m/Y', $payday); 
						
					$kiMINI=($amount*($planroi2/100));
					$kiMINI=number_format((float)$kiMINI, 2, '.', '');
					$totalkiMINI = $totalkiMINI+$kiMINI;
						}
						
if($plantype=="LT"){ $plantype ="<FONT COLOR='orange'>MEGA</font>"; $totalMEGA = $totalMEGA+$amount;
						$plandaymega = $planday2;
						$current  = strtotime($paydate);
						$days     = $planday2 * 86400;
						$payday      = $current + $days;
						$paydaymega = date('d/m/Y', $payday); 
						
					$kiMEGA=($amount*($planroi2/100));
					$kiMEGA=number_format((float)$kiMEGA, 2, '.', '');
					$totalkiMEGA = $totalkiMEGA+$kiMEGA;
						}
						
if($plantype==NULL){ $plantype ="BASIC"; $totalBASIC = $totalBASIC+$amount;
					$kiBASIC=($amount*($planroi/100));
					$kiBASIC=number_format((float)$kiBASIC, 2, '.', '');
					$totalkiBASIC = $totalkiBASIC+$kiBASIC;
}
					
					?>
                    <tr>
                        <td class="text-center"><?=$i?></td>
                        <td class="text-center"><?=$TIME?></td>
                        <td><?=$amount?></td>
                        <td><?=$ki?></td>
                        <td><?=$id?></td>
                        <!--<td><?=$fname?></td>-->
                        <td><?=$plantype?></td>
                    </tr>
                    <?php
					$i++;
					$totalamount = $totalamount+$amount;
					$totalki = $totalki+$ki;
					}
					?>
                </tbody>
            </table>
			<?php 
			
			$totalMINI=number_format((float)$totalMINI, 2, '.', ''); 
			$totalMEGA=number_format((float)$totalMEGA, 2, '.', ''); 
			$totalBASIC=number_format((float)$totalBASIC, 2, '.', ''); 
			$totalamount=number_format((float)$totalamount, 2, '.', ''); 
			$totalki=number_format((float)$totalki, 2, '.', '');
			$totalkiMINI=number_format((float)$totalkiMINI, 2, '.', '');
			$totalkiBASIC=number_format((float)$totalkiBASIC, 2, '.', '');
			$totalkiMEGA=number_format((float)$totalkiMEGA, 2, '.', '');
			
			?>
			<!--
			Total MINI    :<?=$totalMINI?><br>
			Total BASIC    :<?=$totalBASIC?><br>
			Total MEGA    :<?=$totalMEGA?><br>
			Total All    :<?=$totalamount?><br>
			Estimate Payout :<?=$totalki?>
            -->
									<?php
									$current  = strtotime($paydate);
									$days     = $planday * 86400;
									$payday      = $current + $days;
									$payday = date('d/m/Y', $payday);
									
									$current  = strtotime($paydate);
									$days     = $plandaybasic * 86400;
									$payday      = $current + $days;
									$payday = date('d/m/Y', $payday);
									
									
									?>
			<br>						Plan day mini : <?=$plandaymini?>
			<br>						Plan day basic : <?=$plandaybasic?>
			<br>						Plan day mega : <?=$plandaymega?>
			<!--Payout Basic : <?=$payday?>
			<br>						
			Payout Mini : <?=$paydaymini?>
			<br>						
			Payout Mega : <?=$paydaymega?> -->
			
			<table class="table table-striped table-bordered table-vcenter">
				<tr>
					<th>Summary</th>
					<th>MINI</th>
					<th>BASIC</th>
					<th>MEGA</th>
					<th>TOTAL ALL</th>
				</tr>
				<tr>
					<td>TOTAL AMOUNT</td>
					<td><?=$totalMINI?></td>
					<td><?=$totalBASIC?></td>
					<td><?=$totalMEGA?></td>
					<td><?=$totalamount?></td>
				</tr>
				<tr>
					<td>ROI PAYOUT</td>
					<td><?=$totalkiMINI?></td>
					<td><?=$totalkiBASIC?></td>
					<td><?=$totalkiMEGA?></td>
					<td><?=$totalki?></td>
				</tr>
				<tr>
					<td>PAYOUT DATE</td>
					<td><?=$paydaymini?></td>
					<td><?=$payday?></td>
					<td><?=$paydaymega?></td>
					<td>-</td>
				</tr>
				
			</table>
			
			
        </div>
</div>
