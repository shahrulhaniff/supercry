<?php
session_start();
include "database/server.php";
if (empty($_SESSION['USER'])) {
header('Location:login.php'); }
if($_SESSION['USER_TYPE']=="MEMBER"){ include 'inc/config.php'; }
if($_SESSION['USER_TYPE']=="MASTER"){ include 'inc/config_master.php';  }
if($_SESSION['USER_TYPE']=="LP"){ include 'inc/config_LP.php';  }
$template['header_link'] = 'FORMS';
include 'inc/template_start.php'; 
include 'inc/page_head.php';
include 'functions.php';
$PT  =  $_GET['PT'];
$disabled = '';
date_default_timezone_set('Asia/Kuala_Lumpur');
$dateNow  = date("Y-m-d H:i:s");
$dateSelect  = date("Y-m-d");
?>

<!-- Page content -->
<div id="page-content">
    <!-- Validation Header -->
    <div class="content-header hijau">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
<h1><?php if($PT=='MINI'){ echo "PRIME"; } else { echo "MEGA"; }?> INVESTMENT</h1>
                </div>
            </div>
            <div class="col-sm-6 hidden-xs">
                <div class="header-section">
                    <ul class="breadcrumb breadcrumb-top">
                        <li>Control Panel</li>
                        <li>Wallet</li>
                        <li><a href="">Investment</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END Validation Header -->

    <!-- Form Validation Content -->
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
            <!-- Form Validation Block -->
            <div class="block">
                <!-- Form Validation Title -->
                <div class="block-title">
                    <h2>INVEST (<?php if($PT=='MINI'){ echo "PRIME"; } else { echo "MEGA"; }?> PORTFOLIO)</h2>
                </div>
                <!-- END Form Validation Title -->
<?php 
$walletb =  getWalletb($_SESSION['USER']);
$walletb=number_format((float)$walletb, 2, '.', '');

//$mininv = getMinInvest($_SESSION['USER']);
//$minmodal = getMinInvest($_SESSION['USER']);
$getTotalInvestToday=null;
$getTotalInvestToday2=null;
$maxi = $walletb;
if($PT=='MINI'){
	//get the total basic invest for today only
	$getTotalInvestToday =  getTotalInvestToday($_SESSION['USER']);
	$getTotalInvestToday2 =  getTotalInvestToday2($_SESSION['USER']);
	if(($getTotalInvestToday==null)&&($getTotalInvestToday2==null)){ $disabled = 'disabled'; }
	if ($getTotalInvestToday>$walletb){ $maxi = $walletb; }
	//off ni utk prime
	//if ($getTotalInvestToday<$walletb){ $maxi = $getTotalInvestToday; }
	
	$data2 = mysqli_query($conn,"SELECT * FROM masterctrl2 WHERE plantype='ST' ORDER BY created_date DESC LIMIT 1") or die(mysqli_error());
	$info2 = mysqli_fetch_array( $data2 );
	$minmodal = $info2['mininv'];
	$plannamecek = $info2['planname'];
}
else if($PT=='MEGA'){
	$data3 = mysqli_query($conn,"SELECT * FROM masterctrl2 WHERE plantype='LT' ORDER BY created_date DESC LIMIT 1") or die(mysqli_error());
	$info3 = mysqli_fetch_array( $data3 );
	$minmodal = $info3['mininv'];
}
else { $minmodal = '99999'; }
?>
                <!-- Form Validation Form -->
						<?php  if($PT=='MINI'){ ?>
                <form id="form-validation" action="page_invest4.php" method="post" class="form-horizontal form-bordered">
				<?php } 
						else {
						?>
                <form id="form-validation" action="page_invest3.php" method="post" class="form-horizontal form-bordered">
				<?php } ?>
                    <div class="form-group">
                        <label class="col-md-3 control-label" >Wallet Balance</label>
                        <div class="col-md-6">
                            <input type="text" value="<?=$walletb?>" class="form-control" placeholder="Balance" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        
						
						<?php  if($PT=='MINI'){ ?>
						<label class="col-md-3 control-label" for="amountmini">Amount <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="number" id="amountmini" name="amountmini" class="form-control floatNumberField" placeholder="USDT" step="0.01" min="<?=$minmodal?>" max="<?=$maxi?>" step="0.01" autocomplete="off">
                        </div>
						
						<?php } 
						else {
						?>
						<label class="col-md-3 control-label" for="amount">Amount <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="number" id="amount" name="amount" class="form-control floatNumberField" placeholder="USDT" step="0.01" min="<?=$minmodal?>" max="<?=$maxi?>" step="0.01" autocomplete="off">
                        </div>
						
						<?php } ?>
						
						
						
<?php 
if(($getTotalInvestToday==null)&&($getTotalInvestToday2==null)&&($PT=='MINI')){
//echo '<br><br><br><center><code>You are only allowed to invest after subscribed to respective value of basic portfolio</code></center>';
echo '<br><br><br><center><code>You are only allowed to invest PRIME PLAN after you subscribed to SUPER PLAN or MEGA PLAN</code></center>';
 }
//off utk prime
/*	if($PT=='MINI'){
	$datacek = mysqli_query($conn,"SELECT * FROM invest WHERE id='".$_SESSION['USER']."' AND planname='".$plannamecek."'") or die(mysqli_error());
	 if ($datacek->num_rows > 0) {
		while($infocek = mysqli_fetch_array( $datacek )){
		$plannamecek = $infocek['planname'];
		}
		echo "<br><br><br><center><code>You're already invest the mini plan for today</code></center>";
		$disabled = "disabled";
	  }
	} */
?>
                    </div>
                    <div class="form-group form-actions">
					<div class="col-xs-6">
                    <label class="csscheckbox csscheckbox-primary" data-toggle="tooltip" title="Agree to the terms">
                        <input type="checkbox" id="register-terms" name="register-terms" required>
                        <span></span>
                    </label>
                    <a href="#modal-terms" data-toggle="modal">Terms & Agreement </a>
                </div>
                        <div class="col-xs-6 text-right">
                            <input type="hidden" name="id" value="<?=$_SESSION['USER']?>">
                            <input type="hidden" name="walletb" value="<?=$walletb?>">
                            <input type="hidden" name="plantype" value="<?=$PT?>">
                            <input type="submit" class="btn btn-effect-ripple btn-primary <?=$disabled?>" value="Invest">
                            <button type="reset" class="btn btn-effect-ripple btn-danger">Reset</button>
                        </div>
                    </div>
                </form>
                <!-- END Form Validation Form -->

                <!-- Terms Modal -->
                <div id="modal-terms" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title text-center"><strong>Terms and Conditions</strong></h3>
                            </div>
                            <div class="modal-body">
                                <?php include "terms.php";?>
                            </div>
                            <div class="modal-footer">
                                <div class="text-center">
                                    <button type="button" class="btn btn-effect-ripple btn-primary" data-dismiss="modal">I've read them!</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Terms Modal -->
            </div>
            <!-- END Form Validation Block -->
        </div>
    </div>
    <!-- END Form Validation Content -->
<?php
$data2 = mysqli_query($conn,"SELECT count(sn) as mysn FROM invest WHERE id='$_SESSION[USER]'") or die(mysqli_error());
$info2 = mysqli_fetch_array( $data2 );
//$mysn=$info2['mysn'];
if($info2['mysn'] > 0){
?>
<div class="row">
<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
<div class="block">
<div class="block-title">
<h2>My Investment</h2>
</div>
<div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">No.</th>
                        <th>Amount (USDT)</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th style="width: 2px;"></th>
                        <!--<th class="text-center" style="width: 75px;"><i class="fa fa-flash"></i></th>-->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $labels['0']['class'] = "label-success";
                    $labels['0']['text'] = "Active";
                    $labels['1']['class'] = "label-info";
                    $labels['1']['text'] = "On hold..";
                    $labels['2']['class'] = "label-danger";
                    $labels['2']['text'] = "Disabled";
                    $labels['3']['class'] = "label-warning";
                    $labels['3']['text'] = "Pending..";
                    ?>
                    <?php 
					$data = mysqli_query($conn,"SELECT * FROM invest WHERE id='$_SESSION[USER]'") or die(mysqli_error());
					while($info = mysqli_fetch_array( $data )) {
					if($info['stat'] =='Active' ){ $la="label-success";}
					if($info['stat'] =='Completed' ){ $la="label-info";}
					?>
                    <tr>
                        <td class="text-center"><?php echo $info['sn']; ?></td>
                        <td><strong><?php echo $info['amount']; ?></strong></td>
                        <td><?php echo $info['created_date']; ?></td>
                        <td><span class="label<?php echo " ".$la; ?>"><?php echo $info['stat']; ?></span></td>
                        <td></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
</div>
</div>
</div>
<?php  }
$mysn=$info2['mysn']; 

echo $mysn; 

?>
</div>
<!-- END Page Content -->

<?php include 'inc/page_footer.php'; ?>
<?php include 'inc/template_scripts.php'; ?>

<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/formsValidation.js"></script>
<script>$(function() { FormsValidation.init(); });</script>


<script type="text/javascript">
    $(document).ready(function () {
        $(".floatNumberField").change(function() {
            $(this).val(parseFloat($(this).val()).toFixed(2));
        });
    });
</script>

<?php if($mysn>30){ ?>
<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/uiTables.js"></script>
<script>$(function(){ UiTables.init(); });</script>
<?php } ?>

<?php include 'inc/template_end.php'; ?>