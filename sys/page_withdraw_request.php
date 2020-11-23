<?php
	session_start();
    date_default_timezone_set('Asia/Kuala_Lumpur');
	include "database/server.php";
	if (empty($_SESSION['USER'])) {
	header('Location:login.php'); }
?>
<?php 
if($_SESSION['USER_TYPE']=="MEMBER"){ include 'inc/config.php'; }
if($_SESSION['USER_TYPE']=="MASTER"){ include 'inc/config_master.php';  }
if($_SESSION['USER_TYPE']=="LP"){ include 'inc/config_LP.php';  }
$template['header_link'] = 'FORMS'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>
<?php include 'functions.php'; 
$walletb =  getWalletb($_SESSION['USER']);
$walletb=number_format((float)$walletb, 2, '.', '');
$minwd   = getMinWD($_SESSION['USER']);

$getPhoneNo =  getPhoneNo($_SESSION['USER']);
if(is_numeric($getPhoneNo)){ $cekfon = 'Y'; } else { $cekfon = 'X'; } 

$akaunbb =  getAkaunB($_SESSION['USER']);
 if($akaunbb==null){
	 $disabled="disabled";
 }
 else if($cekfon == 'X'){
	 $disabled="disabled";
 }
 else {
 //$timenow = date("H:i:sa");
 $timenow = date("H");
	if(($timenow>7)&&($timenow<15)){ $disabled=null; }
	else {$disabled="disabled";}

 
 }
?>

<!-- Page content -->
<div id="page-content">
    <!-- Validation Header -->
    <div class="content-header hijau">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1>WITHDRAW REQUEST</h1>
                </div>
            </div>
            <div class="col-sm-6 hidden-xs">
                <div class="header-section">
                    <ul class="breadcrumb breadcrumb-top">
                        <li>Control Panel</li>
                        <li>Wallet</li>
                        <li><a href="">Widthraw Request</a></li>
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
			<div class="block-title">
                    <h2>WITHDRAWAL</h2>
                </div>
                <!-- Form Validation Title -->
                
                <!-- END Form Validation Title -->

                <!-- Form Validation Form -->
                <form id="form-validation" action="page_withdraw_request2.php" method="post" class="form-horizontal form-bordered">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Wallet Balance </label>
                        <div class="col-md-6">
                            <input type="text" value="<?=$walletb?>" class="form-control" placeholder="Balance" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="amount">Amount <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="number" id="amount" name="amount" class="form-control floatNumberField" placeholder="USD" min="<?=$minwd?>" max="<?=$walletb?>" >
                        </div>
                    </div>
					<!--<div class="form-group">
                        <label class="col-md-3 control-label" for="val-password">Security Password <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="password" id="val-password" name="pwd" class="form-control" placeholder="Enter your password..">
                        </div>
                    </div>-->
                    <div class="form-group form-actions">
                        <div class="col-md-8 col-md-offset-3">
                            <input type="hidden" name="id" value="<?=$_SESSION['USER']?>">
                            <input type="hidden" name="walletb" value="<?=$walletb?>">
                            <button type="submit" class="btn btn-effect-ripple btn-primary <?=$disabled?>">WITHDRAW</button><!-- off sementara -->
                            <button type="reset" class="btn btn-effect-ripple btn-danger">Reset</button> 
                        </div>
                    </div>
                </form>
				<?php if($akaunbb==null){?>
                <center><code>Please <a href="page_update_profile.php">Update Your Profile</a> with Banking Information before request</code></center>
				<?php 
				}
				else if($cekfon=='X'){ echo "<center><code><a href='page_update_profile.php'>Please update your phone number</a> : ".$getPhoneNo."</code></center>"; }
				else { 
					if(($timenow>7)&&($timenow<15)){ echo ""; }
					//if(($timenow>16)&&($timenow<9)){
					else {
						//echo "<center><code>Widthrawal is open on office hour only. now:".$timenow."</code></center>"; 
						echo "<center><code>Sorry, We are ongoing Processing Withdrawal 3pm~8pm</code></center>"; 
					}
				
				} ?> 
                <!-- END Form Validation Form -->

                
            </div>
            <!-- END Form Validation Block -->
        </div>
    </div>
    <!-- END Form Validation Content -->
<?php
$data2 = mysqli_query($conn,"SELECT count(sn) as mysn FROM wd WHERE id='$_SESSION[USER]'") or die(mysqli_error());
$info2 = mysqli_fetch_array( $data2 );
$mysn=$info2['mysn'] ;
if($info2['mysn'] > 0){
?>
<div class="row">
<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
<div class="block">
<div class="block-title">
                    <h2>WITHDRAW REQUEST</h2>
                </div>
<div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">SN</th>
                        <th>Amount (USDT)</th>
                        <th>Date Request</th>
                        <th style="width: 120px;">Status</th>
                        <th class="text-center" style="width: 75px;"><i class="fa fa-flash"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					$data = mysqli_query($conn,"SELECT * FROM wd WHERE id='$_SESSION[USER]'") or die(mysqli_error());
					while($info = mysqli_fetch_array( $data )) {
					$stat = $info['stat'];
					$ID = $info['id'];
					$SN = $info['sn'];
					$amount = $info['amount'];
					$created_date = $info['created_date'];
					if($stat=="Completed"){ $disabled="disabled"; }
					if($stat=="Processing"){ $disabled=null; }
					if($stat=="Processing_Token"){ $disabled=null; }
					?>
                    <tr>
                        <td class="text-center"><?php echo $info['sn']; ?></td>
                        <td><strong><?=$amount?></strong></td>
                        <td><?=$created_date?></td>
                        <td><?=$stat?></td>
                        <td class="text-center">
						<?php 
						if($stat=="Processing_Token"){ ?>
<a href="x_delete_widthraw_request_token.php?ID=<?=$ID?>&SN=<?=$SN?>&AM=<?=$amount?>" data-toggle="tooltip" title="Buy back" class="btn btn-effect-ripple btn-xs btn-danger <?=$disabled?>" onclick="return confirm('Are you sure to buy back you token withdrawal request?');"><i class="fa fa-times"></i></a>
						<?php }
						else{
						?>
<a href="x_delete_widthraw_request.php?ID=<?=$ID?>&SN=<?=$SN?>&AM=<?=$amount?>" data-toggle="tooltip" title="Cancel" class="btn btn-effect-ripple btn-xs btn-danger <?=$disabled?>" onclick="return confirm('Are you sure to cancel?');"><i class="fa fa-times"></i></a>
					<?php } ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
</div>
</div>
</div>
<?php  
//$mysn=$info2['mysn'] ; 
}
echo $mysn; 
?>
</div>
<!-- END Page Content -->

<?php include 'inc/page_footer.php'; ?>
<?php include 'inc/template_scripts.php'; ?>

<script type="text/javascript">
    $(document).ready(function () {
        $(".floatNumberField").change(function() {
            $(this).val(parseFloat($(this).val()).toFixed(2));
        });
    });
</script>

<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/formsValidation.js"></script>
<script>$(function() { FormsValidation.init(); });</script>

<?php if($mysn>30){ ?>
<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/uiTables.js"></script>
<script>$(function(){ UiTables.init(); });</script>
<?php } ?>

<?php include 'inc/template_end.php'; ?>