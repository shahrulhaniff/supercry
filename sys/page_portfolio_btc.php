<?php
	session_start();
	include "logintime.php";
	include "database/server.php";
	if (empty($_SESSION['USER'])) {
	header('Location:login.php'); }
?>
<?php 
if($_SESSION['USER_TYPE']=="MEMBER"){ include 'inc/config.php'; }
if($_SESSION['USER_TYPE']=="MASTER"){ include 'inc/config_master.php';  }
if($_SESSION['USER_TYPE']=="LP"){ include 'inc/config_LP.php';  }
$template['header_link'] = 'TRANSFER'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>

<!-- Page content -->
<div id="page-content">
    <!-- Table Styles Header -->
    <div class="content-header hijau">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1>BTC Portfolio</h1>
                </div>
            </div>
            <div class="col-sm-6 hidden-xs">
                <div class="header-section">
                    <ul class="breadcrumb breadcrumb-top">
                        <li>Control Panel</li>
                        <li><a href="">Portfolio</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END Table Styles Header -->


    <!-- Datatables Block -->
    <!-- Datatables is initialized in js/pages/uiTables.js -->
    <div class="block full">
        <div class="block-title">
            <h2>Portfolio BTC</h2>
        </div>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 5%;">No</th>
                        <th>Investment Plan</th>
                        <th>Finance Plan (BTC)</th>
                        <th>ROI %</th>
                        <th style="width: 25%;">Progress</th>
                        <th style="width: 5%;">Return of Bitcoin</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                   
                    <?php 
					$i=1;

$data = mysqli_query($conn,"SELECT * FROM investbtc WHERE id='$_SESSION[USER]' ORDER BY created_date DESC") or die(mysqli_error());

while($info = mysqli_fetch_array( $data )) {

date_default_timezone_set('Asia/Kuala_Lumpur');
$dataWALLET = mysqli_query($conn,"SELECT walletb FROM wallet WHERE id='$_SESSION[USER]'") or die(mysqli_error());
$infoWALLET = mysqli_fetch_array( $dataWALLET );
$walletbw  = $infoWALLET['walletb']; 
						
$SN   = $info['sn'];
$amount   = $info['amount'];
$planroi  = $info['planroi'];
$planname  = $info['planname'];
$planday  = $info['planday'];
$stat  = $info['stat'];
$days     = $planday * 86400;
						
						$income   = (($amount*$planroi)/100);
						$income   = bcdiv($income,1,8);
						$amount   = bcdiv($amount,1,8);
						$walletbw = $walletbw + $income ;
						$dateNow  = date("Y-m-d H:i:s");
						
						$current  = strtotime($dateNow);
						$start    = strtotime($info['created_date']);
						$end      = $start + $days;
						
						$progress = (($current - $start) / ($end - $start)) * 100;
						$progress = bcdiv($progress,1,2);
						$color    ="progress-bar-danger";
						
						if (($progress >= 0 )&&($progress <= 20)){ $color="progress-bar-danger"; }
						if (($progress >= 21)&&($progress <= 40)){ $color="progress-bar-warning"; }
						if (($progress >= 41)&&($progress <= 70)){ $color="progress-bar-info"; }
						if (($progress >= 61)&&($progress <= 80)){ $color="progress-bar-success"; }
						if (($progress >= 81)&&($progress <= 99)){ $color="progress-bar-success"; }
						
						if ($progress < 100){ 
							$la="success"; 
							$la2="star"; 
							$stat = $info['stat']; 
							$active="active"; 
							$syiling  = ($income*($progress/100));
						}
						if ($progress >= 100){
							$active = null;
							$progress = "100";
							$stat 	  = $info['stat'];
							$la="success";
							$la2="star";
							//$stat     = "Completed"; //refresh error asal disini if($stat!="Completex"){update wallet}
							$la       = "info";
							$la2      = "check";
							$color    ="progress-bar-primary";
							$syiling  = ($income*($progress/100));
						}
						
						$syiling = bcdiv($syiling,1,8);
					?>
                    <tr>
                        <td class="text-center"><?php echo $i; ?></td>
                        <td><strong><?=$planname?></strong> 
                        <!--| $1BTC > $<?=$planroi?>BTC-->
                        </td>
                        <td><b>$<?=$amount?></b>BTC <i class="fa fa-arrow-right"></i> <b>$<?=$income?></b>BTC</td>
                       
                        <td><?=$planroi?>%</td>
                        <td>
							<div class="progress progress-striped <?=$active?>">
							<div class="progress-bar <?=$color?>" role="progressbar" aria-valuenow="<?=$progress?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$progress?>%"><?=$progress?>%</div>
							</div>
						</td>
						<td align="center">
						<!-- SHOW DUIT SYILING -->
						<?php if($syiling!=$income){ ?>
						<font style="font-style: italic; color:blue;"><?=$syiling?>BTC</font>
						<br><i class="fa fa-arrow-circle-right"></i><br>
						<font style="font-style: italic; color:gray;"><?=$income?>BTC</font>
						<?php } else { echo "Completed"; } ?>
						</td>
                        <td>
							<!-- COL STATUS ACTIVE/REINVEST -->
							<?php 
								if($progress<"100"){
									?><button class="btn btn-effect-ripple btn-sm btn-<?=$la?>"><i class="fa fa-<?=$la2?>"></i><?=$stat?></button><?php } 
								if($progress=="100"){
									if($stat=="Completed"){ echo "BTC Paymaster Ongoing"; }
									if($stat=="Paid"){ echo "<button class='btn btn-effect-ripple btn-sm btn-info'><i class='fa fa-btc'></i>Paid</button>"; }
								} 
							?>
						</td>
                    </tr>
                    <?php $i++; }
					
					
					?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- END Datatables Block -->
</div>
<!-- END Page Content -->

<?php include 'inc/page_footer.php'; ?>
<?php include 'inc/template_scripts.php'; ?>

<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/uiTables.js"></script>
<script>$(function(){ UiTables.init(); });</script>

<?php include 'inc/template_end.php'; ?>