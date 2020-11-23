<?php
	session_start();
	include "database/server.php";
	if (empty($_SESSION['USER'])) { header('Location:login.php'); }
	if($_SESSION['USER_TYPE']=="MEMBER"){ header('Location:index.php');  }
	if($_SESSION['USER_TYPE']=="LP"){ header('Location:index_LP.php');  }
?>
<?php 

include 'inc/config_master.php'; 

$template['header_link'] = 'DASHBOARD CONTROL PANEL'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>
<?php include 'functions.php';
//$refreshall  =  refreshAll(); //cronjob
$portfolioActive   =  getPortfolioActive($_SESSION['USER']);
$walletb     =  getWalletb($_SESSION['USER']);
$downline    =  getDownline($_SESSION['USER']);
$TotalInvest =  getTotalInvest($_SESSION['USER']);
$dj   		 =  getDayJoin($_SESSION['USER']);

$minwdx  =  getMinWD();
$plan_array  =  getPlan();
$ary_planroi = $plan_array[0];
$ary_planday = $plan_array[1];
$ary_plandte = $plan_array[2];
//XTAU PASAL
$ary_mininv  = $plan_array[4];
$ary_planname= $plan_array[5];
?>
<!-- Page content -->
<div id="page-content" class="inner-sidebar-right">
	<?php
		include "page_inner_sidebar.php"; 
		include "indexfirst_row.php";
		//include "indexfirst_row_asal.php";
	?>

    <div class="row">
        <div class="col-sm-6 col-lg-8">
            
        <!-- PELAN -->
        <?php include "page_plan_today.php"; ?>
        <!-- /PELAN -->
            
        </div>
        
        
        <div class="col-sm-6 col-lg-4">
            <!-- Stats User Widget -->
            <a href="#" class="widget">
                <div class="widget-content border-bottom text-light themed-background-dark-amethyst">
                    <span class="pull-right text-muted">This week</span>
                    Newsfeed
                </div>
                <div class="widget-content border-bottom themed-background-muted">
                    <?php include "page_plan_today2.php"; ?>
                </div>
				<?php if($portfolioActive!="0"){?>
				<div class="widget-content border-bottom text-light themed-background-dark-amethyst">
                    <span class="pull-right text-muted"></span>
                    Portfolio
                </div>
                <div class="widget-content border-bottom themed-background-muted">
                    <?php include "page_plan_today3.php"; ?>
                </div>
				<? } ?>
                <!--<div class="widget-content widget-content-full-top-bottom">
                    <div class="row text-center">
                        <div class="col-xs-6 push-inner-top-bottom border-right">
                            <h3 class="widget-heading"><i class="gi gi-briefcase text-dark push-bit"></i> <br><small>35 Projects</small></h3>
                        </div>
                        <div class="col-xs-6 push-inner-top-bottom">
                            <h3 class="widget-heading"><i class="gi gi-heart_empty text-dark push-bit"></i> <br><small>5.3k Likes</small></h3>
                        </div>
                    </div>
                </div>-->
            </a>
            <!-- END Stats User Widget -->

            <!-- Mini Widgets Row -->
            <div class="row">
                <div class="col-xs-12">
                              <div class="form-group">
                                <div class="col-sm-12">

                                  <div class="input-group mb-md">
                                    <input type="text" class="form-control" id="myInput" value="https://supercryptofinance.com/sys/register.php?trader=<?=$_SESSION['USER']?>">
                                    <div class="input-group-btn">
                                      <button type="button" class="btn btn-primary copy-to-clipboard" tabindex="-1" onclick="myFunction()">Copy</button>
                                    </div>
                                  </div>
                                  <div class='copied'></div>
                                </div>
                              </div>
                </div>
            </div>
            <!-- END Mini Widgets Row -->
        </div>
    </div>
    <!-- END Second Row onclick="hidenshow()" id="hidDiv2"-->
	
<button onclick="hidenshow()" type="reset" class="btn btn-effect-ripple btn-success" style="background-color:green;" id="hidDiv2">Edit <!--Basic--> Super Plan</button>
<button onclick="hidenshow2()" type="reset" class="btn btn-effect-ripple btn-info" style="background-color:blue;" id="hidDivmini2">Edit <!--Mini-->PRIME Plan</button>
<button onclick="hidenshow3()" type="reset" class="btn btn-effect-ripple btn-warning" style="background-color:gold;" id="hidDivmega2">Edit Mega Plan</button>
<button onclick="hidenshow4()" type="reset" class="btn btn-effect-ripple btn-primary" style="background-color:gold;" id="hidDivbtc2">Edit BTC Plan</button>
<button class="btn btn-effect-ripple btn-warning" style="background-color:yellow;"><a href="page_token_price.php">Edit Token Price</a></button>

   <div id="hidDiv" style="display: none">
        <div class="col-sm-6 col-lg-8">
            <div class="block">
			<div class="block-title">
			<b style="font face: Arial Black;">UPDATE <!--BASIC-->SUPER PORTFOLIO</b><!--< ?=$ary_planname?>-->
			</div>
                   <form id="form-validation" action="update_plan.php" method="post" class="form-horizontal form-bordered">
                    <div class="form-group">
                        <label class="col-md-3 control-label" >PLAN NAME</label>
                        <div class="col-md-6">
                            <input type="text" value="<?=$ary_planname?>" name="planname" class="form-control" required>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-md-3 control-label" >PLAN ROI</label>
                        <div class="col-md-6">
                            <input type="number" value="<?=$ary_planroi?>" name="planroi" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="amount">PLAN DAYS <span class="text-danger">*</span></label>
                        <div class="col-md-6">
							<input type="number" value="<?=$ary_planday?>" min="1" name="planday" class="form-control" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="amount">MINIMUM INVEST <span class="text-danger">*</span></label>
                        <div class="col-md-6">
							<input type="number" id="amount" name="mininv" class="form-control floatNumberField" value="<?=$ary_mininv?>" min="1"  step="0.01" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="amount">MINIMUM WIDTHDRAW <span class="text-danger">*</span></label>
                        <div class="col-md-6">
							<input type="number" id="amount" name="minwd" class="form-control floatNumberField" value="<?=$minwdx?>" min="1" step="0.01" autocomplete="off" required>
                        </div>
                    </div>
					
                   <div class="form-group form-actions">
                        <div class="col-xs-6 text-right">
                            <input type="submit" class="btn btn-effect-ripple btn-primary" value="Update">
                            <button  onclick="hidenshow()" type="reset" class="btn btn-effect-ripple btn-danger">Cancel</button>
                        </div>
                    </div>
                </form>
			</div>
</div>
</div>

<?php include "editp2.php"; ?>

</div>
<!-- END Page Content -->

<?php include 'inc/page_footer.php'; ?>
<?php include 'inc/template_scripts.php'; ?>
							<script type="text/javascript">
							function myFunction() {
							  /* Get the text field */
							  var copyText = document.getElementById("myInput");

							  /* Select the text field */
							  copyText.select();
							  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

							  /* Copy the text inside the text field */
							  document.execCommand("copy");

							  /* Alert the copied text */
							  alert("Copied the text: " + copyText.value);
							}
							</script>
<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/readyDashboard.js"></script>
<script>$(function(){ ReadyDashboard.init(); });</script>


<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/readyTimeline.js"></script>
<script>$(function(){ ReadyTimeline.init(); });</script>

				
					
<script>
function hidenshow() {
  var x = document.getElementById("hidDiv");
  var y = document.getElementById("hidDiv2");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.style.display = "none";
  } else {
    x.style.display = "none";
    y.style.display = "block";
  }
}
</script>
<script>
function hidenshow2() {
  var x = document.getElementById("hidDivmini");
  var y = document.getElementById("hidDivmini2");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.style.display = "none";
  } else {
    x.style.display = "none";
    y.style.display = "block";
  }
}
function hidenshow3() {
  var x = document.getElementById("hidDivmega");
  var y = document.getElementById("hidDivmega2");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.style.display = "none";
  } else {
    x.style.display = "none";
    y.style.display = "block";
  }
}
function hidenshow4() {
  var x = document.getElementById("hidDivbtc");
  var y = document.getElementById("hidDivbtc2");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.style.display = "none";
  } else {
    x.style.display = "none";
    y.style.display = "block";
  }
}
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".floatNumberField").change(function() {
            $(this).val(parseFloat($(this).val()).toFixed(2));
        });
    });
</script>

<?php include 'inc/template_end.php'; ?>