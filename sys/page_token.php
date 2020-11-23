<?php
	session_start();
	include "logintime.php";
	include "database/server.php";
	include "functions.php";
	date_default_timezone_set("Asia/Kuala_Lumpur");
	if (empty($_SESSION['USER'])) {
	header('Location:login.php'); }
?>
<?php 
if($_SESSION['USER_TYPE']=="MEMBER"){ include 'inc/config.php'; }
if($_SESSION['USER_TYPE']=="MASTER"){ include 'inc/config_master.php';  }
if($_SESSION['USER_TYPE']=="LP"){ include 'inc/config_LP.php';  }
 $template['header_link'] = 'PAGES'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>
<?php
//$portfolioActive   =  getPortfolioActive($_SESSION['USER']);
//$walletb     =  getWalletb($_SESSION['USER']);
//$downline    =  getDownline($_SESSION['USER']);
//$TotalInvest =  getTotalInvest($_SESSION['USER']);
//$dj   		 =  getDayJoin($_SESSION['USER']);

$minwdx  =  getMinWD();
$plan_array  =  getPlan();
$ary_planroi = $plan_array[0];
$ary_planday = $plan_array[1];
$ary_plandte = $plan_array[2];
//XTAU PASAL
$ary_mininv  = $plan_array[4];
$ary_planname= $plan_array[5];
//$walletb =  getWalletb($_SESSION['USER']);
//$walletb=number_format((float)$walletb, 2, '.', '');
//$minwd   = getMinWD($_SESSION['USER']);

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
 $timenowcek = '';//date("H");
	if(($timenow>7)&&($timenow<15)){ $disabled=null; }
	else {$disabled="disabled";}
 }
?>
<!-- Page content -->
<div id="page-content">
    <!-- Invoice Header -->
    <div class="content-header hijau">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1>My Token</h1>
                </div>
            </div>
            <div class="col-sm-6 hidden-xs">
                <div class="header-section">
                    <ul class="breadcrumb breadcrumb-top">
                        <li>My Wallet</li>
                        <li><a href="">Token</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END Invoice Header -->
	
<?php
$dataTOKENZ = mysqli_query($conn,"SELECT tokenz FROM wallet WHERE id='$_SESSION[USER]'") or die(mysqli_error());
$infoTOKENZ = mysqli_fetch_array( $dataTOKENZ );
$tokenz  = $infoTOKENZ['tokenz']; 
?>

    <div class="row">
	<div class="col-sm-12 col-lg-6">
            <a href="#" onclick="hidenshowWD()" class="widget">
                <div class="widget-content widget-content-mini themed-background-dark-creme">
                    <span class="pull-right text-muted">-</span>
                    <strong class="putih">-</strong>
                </div>
                <div class="widget-content themed-background-creme clearfix">
                    <div class="widget-icon pull-right">
						<i class="hi hi-export hitam"></i>
                    </div><?php $tokenz=number_format($tokenz, 8, '.', '');?>
                    <h2 class="widget-heading h3 hitam"><strong>WITHDRAW TOKEN</strong></h2>
					<?php $totalwdproc = getWDprocess($_SESSION['USER']); ?>
                    <br>
                    <!--<span class="hitam">WIDTHDRAW PROCESS : <b>$<?=$totalwdproc?></b></span>-->
                </div>
            </a>
        </div>
		
	<div class="col-sm-12 col-lg-6">
            <a href="#" onclick="hidenshowIV()" class="widget">
                <div class="widget-content widget-content-mini themed-background-dark-amethyst">
                    <span class="pull-right text-muted">-</span>
                    <strong class="putih">-</strong>
                </div>
                <div class="widget-content themed-background-amethyst clearfix">
                    <div class="widget-icon pull-right">
						<i class="hi hi-import hitam"></i>
                    </div>
					<h2 class="widget-heading h3 hitam"><strong>INVEST TOKEN</strong></h2>
                    <!--<h2 class="widget-heading h3 hitam"><strong><?=$TotalInvest?></strong></h2>
                    <span class="hitam">RETURN OF INVESTMENT (ROI)</span>-->
                </div>
            </a>
        </div>
	
        </div>
		
		
		
		
		
		
		
		
		
		
		
<!--
		<START>
		######################################################
		######################################################
		######################################################
		WD
-->
		 <div id="hidDivWD" style="display: none">
        <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
            <!-- Form Validation Block -->
            <div class="block">
			<div class="block-title">
                    <h2>SCFX TOKEN WITHDRAWAL</h2>
                </div>
                <!-- Form Validation Title -->
                
                <!-- END Form Validation Title -->

                <!-- Form Validation Form -->
                <form id="form-validation" action="page_withdraw_request3.php" method="post" class="form-horizontal form-bordered">
                    <div class="form-group">
                        <label class="col-md-3 control-label">SCFX Balance </label>
                        <div class="col-md-6">
                            <input type="text" name="tokenb" value="<?=$tokenz?>" class="form-control" placeholder="Balance" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="amounttoken">Amount <span class="text-danger">*</span></label>
                        <div class="col-md-6">
<input type="number" id="amounttoken" step="0.00000001" name="amounttoken" class="form-control floatNumberField" placeholder="SCFX" min="<?=$minwd?>" max="<?=$tokenz?>" onChange="checkID(this.value)">
						<h5><span class="st" id="txtHint"></span></h5>
                        </div>
                    </div>
					
					
					
                    <div class="form-group form-actions">
                        <div class="col-md-8 col-md-offset-3">
                            <input type="hidden" name="id" value="<?=$_SESSION['USER']?>">
                            <input type="hidden" name="usd" value="<?=$usd?>">
                            <!-- <input type="hidden" name="tokenb" value="<?=$tokenz?>">off sementara -->
<?php if($_SESSION["USER"]=="shahrul8k"){ $disabled=null; }?>
                            <button type="submit" class="btn btn-effect-ripple btn-primary <?=$disabled?>">WITHDRAW</button>
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
						echo "<center><code>Sorry ".$timenowcek.", We are ongoing Processing Withdrawal 3pm~8pm</code></center>"; 
					}
				
				} ?> 
                <!-- END Form Validation Form -->

                
            </div>
            <!-- END Form Validation Block -->
        </div>
    </div>
</div>
<!--
		/WD
		######################################################
		######################################################
		######################################################
		IV
-->


 <div id="hidDivIV" style="display: none">
 <div class="row">
<div class="col-xs-12">
           <?php include "page_plan_today_token.php"; ?>
        </div>
        </div>
</div>

<!--
		/IV
		######################################################
		######################################################
		######################################################
		<END>
-->

    
</div>
<!-- END Page Content -->

<?php include 'inc/page_footer.php'; ?>
<?php include 'inc/template_scripts.php'; ?>
<script src="js/pages/formsValidation.js"></script>
<script>$(function() { FormsValidation.init(); });</script>
<script>
function hidenshowWD() {
  var x = document.getElementById("hidDivWD");
  var y = document.getElementById("hidDivIV");
  
  y.style.display = "none";
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}


function hidenshowIV() {
  var x = document.getElementById("hidDivIV");
  var y = document.getElementById("hidDivWD");
  
    y.style.display = "none";
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>

<?php include 'inc/template_end.php'; ?>