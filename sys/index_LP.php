<?php
    ob_start();
	session_start();
	
	include "logintime.php";
	
	include "database/server.php";
	if (empty($_SESSION['USER'])) {
	header('Location:login.php'); } //login
	if($_SESSION['USER_TYPE']=="MASTER"){ header('Location:index_master.php');  }
	if($_SESSION['USER_TYPE']=="USER"){ header('Location:index.php');  }
?>
<?php include 'inc/config_LP.php'; $template['header_link'] = 'DASHBOARD CONTROL PANEL'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>
<?php include 'functions.php';
 
$walletb     =  getWalletb($_SESSION['USER']);
$downline    =  getDownline($_SESSION['USER']);
$TotalInvest =  getTotalInvest($_SESSION['USER']);
$dj   		 =  getDayJoin($_SESSION['USER']);
$portfolioActive   =  getPortfolioActive($_SESSION['USER']);

$plan_array=  getPlan();
$ary_planroi = $plan_array[0];
$ary_planday = $plan_array[1];
$ary_plandte = $plan_array[2];
$ary_planname= $plan_array[5];
$ary_mininv= $plan_array[4];


$pr_array=  getPrice();
$BTC_P = $pr_array[0];
$USD_P = $pr_array[1];
$_SESSION['BTC_P'] = $pr_array[0];
$_SESSION['USD_P'] = $pr_array[1];
?>
<!-- Page content -->
<div id="page-content" class="inner-sidebar-right">
<!--<div id="particles-js" class="inner-sidebar-right"></div>-->
	<?php include "page_inner_sidebar.php"; ?>
    <!-- First Row -->
	
       <?php 
		include "indexfirst_row.php";
		//include "indexfirst_row_asal.php";
		?>
    <!-- END First Row -->

    <!-- Second Row -->
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
    <!-- END Second Row -->


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

<?php include 'inc/template_end.php'; ?>