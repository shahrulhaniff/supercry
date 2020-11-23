<?php
	session_start();
    date_default_timezone_set('Asia/Kuala_Lumpur');
	include "database/server.php";
	include "functions.php";
	if (empty($_SESSION['USER'])) {
	header('Location:login.php'); }
?>
<?php 
$walletb     =  getWalletb($_SESSION['USER']); 
$walletc     =  getWalletc($_SESSION['USER']);
?>
<?php 
if($_SESSION['USER_TYPE']=="MEMBER"){ include 'inc/config.php'; }
if($_SESSION['USER_TYPE']=="MASTER"){ include 'inc/config_master.php';  }
if($_SESSION['USER_TYPE']=="LP"){ include 'inc/config_LP.php';  }


 $template['header_link'] = 'SALE'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>


<!-- Page content -->
<div id="page-content">
    <!-- Blank Header -->
    <div class="content-header hijau">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1>Daily Sale Report</h1>
                </div>
            </div>
            <div class="col-sm-6 hidden-xs">
                <div class="header-section">
                    <ul class="breadcrumb breadcrumb-top">
                        <li>Control Panel</li>
                        <li>MASTER</li>
                        <li><a href="">Report</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END Blank Header -->
	
    
	<?php
	if(isset($_GET['paydate'])) {
	$paydate = $_GET['paydate'];
	}
	else { $paydate=date("Y-m-d"); }
	?>
	<div class="row">	
	<div class="col-xs-4"></div>
	<div class="col-xs-4">
	<form action="page_daily_depo.php" method="GET" class="form-inline">
	<div class="form-group">
	<input type="date" name="paydate" class="form-control" value="<?=$paydate?>">
	<input type="submit" value="Display" class="btn btn-effect-ripple btn-info">
	</div>
	</form>
	</div>
	</div>


<div class="block full">
<div class="block-title">
<!-- DATE TAJUK -->
<?php $datetaju = date("d/m/Y", strtotime($paydate)); ?>
<h2>Sale on : <?=$datetaju?></h2>
</div>
<div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 20px;">No.</th>
                        <th class="text-center" style="width: 20px;">Depo Reference Number</th>
                        <th class="text-center" style="width: 150px;">Time</th>
                        <th>Amount</th>
                        <th>Member Id</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					$i='1';
					$totaldepo='0';
					
					
$data = mysqli_query($conn,"
					
SELECT *
FROM walletlog
WHERE created_date LIKE '$paydate%' 
AND amount NOT LIKE '%BTC%' 
AND memberid NOT LIKE '%PAYWALLET%' 
ORDER BY created_date ASC
") or die(mysqli_error($conn));
					
					while($info = mysqli_fetch_array( $data )) {
					$sn = $info['sn'];
					$id = $info['memberid'];
					$amount = $info['amount'];
					$created_date = $info['created_date'];
					$TIME = date("h:i:sa", strtotime($created_date));
	
					?>
                    <tr>
                        <td class="text-center"><?=$i?></td>
                        <td class="text-center"><?=$sn?></td>
                        <td class="text-center"><?=$TIME?></td>
                        <td><?=$amount?></td>
                        <td><?=$id?></td>
                    </tr>
                    <?php
					$i++;
					$totaldepo = $totaldepo+$amount;
					}
					?>
                </tbody>
            </table>
        </div>
</div>

<table class="table table-bordered table-vcenter kuning" background="https://steamuserimages-a.akamaihd.net/ugc/172663821536493098/7BD0320DF4E62A7F536A7BA36256AC4EC5E45096/">
				<tr>
					<th>Summary</th>
					<th>Total Deposited Today <h3><b><?=$datetaju?></b></h3></th>
				</tr>
				<tr>
					<td>TOTAL AMOUNT</td>
					<td><h1>
<?php 
echo number_format($totaldepo,2)." ";
?>
					USDT</h1></td>
					
				</tr>
				
				
			</table>
</div>
<!-- END Page Content -->

<?php include 'inc/page_footer.php'; ?>
<?php include 'inc/template_scripts.php'; ?>

 Load and execute javascript code used only in this page 
<script src="js/pages/uiTables.js"></script>
<script>$(function(){ UiTables.init(); });</script>

<?php include 'inc/template_end.php'; ?>