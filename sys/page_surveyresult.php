<?php
	session_start();
	include "database/server.php";
	if (empty($_SESSION['USER'])) {
	header('Location:login.php'); }
?>
<?php include 'inc/config_master.php'; $template['header_link'] = 'FORMS'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>
<?php include 'functions.php'; ?>
<!-- Page content -->
<div id="page-content">
    <!-- Validation Header -->
    <div class="content-header hijau">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1>SURVEY RESULT</h1>
                </div>
            </div>
            <div class="col-sm-6 hidden-xs">
                <div class="header-section">
                    <ul class="breadcrumb breadcrumb-top">
                        <li>Control Panel</li>
                        <li>Survey</li>
                        <li><a href="">Summary</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END Validation Header -->
 <div class="row">
<div class="col-sm-12 col-lg-12">
<div class="widget"><div class="widget-content widget-content-mini themed-background-dark-creme">
            <span class="pull-right text-muted">Survey Result</span>
				<strong class="putih">SURVEY SUMMARY</strong>
        </div>
		<div class="widget-content clearfix" style="background: url('https://ak3.picdn.net/shutterstock/videos/4154263/thumb/1.jpg'); color: #FFFFFF; background-size: 900px 300px;">
            <div class="widget-icon pull-right">
				<i class="fa fa-btc putih"></i>
            </div>
			
<h2 class="widget-heading h3 putih"><strong>
<i class="fa fa-twitch"></i> Do you trust our bussiness?<br>
<i class="fa fa-paperclip"></i> <font color="#FF1919">Yes 49.51%</font><br>
<i class="fa fa-paperclip"></i> <font color="#7CFC00">No 50.49%</font>
</strong></h2>
<br><br>
<h2 class="widget-heading h3 putih"><strong>
<i class="fa fa-twitch"></i> What would we could help you to maintain our bussiness purposes?<br>
<i class="fa fa-paperclip"></i> <font color="#FF1919">Spread good words to others about our bussiness.23.76%</font><br>
<i class="fa fa-paperclip"></i> <font color="#FFFF00">Continues investing with our platform.37.13%</font><br>
<i class="fa fa-paperclip"></i> <font color="#7CFC00">Forfeit the platform.39.11%</font>
</strong></h2>	
<br><br>

<h2 class="widget-heading h3 putih"><strong>
<i class="fa fa-twitch"></i> After encountering such a problem, Do you....?<br>
<i class="fa fa-paperclip"></i> <font color="#FFFF00">Refund & forfeit the platform.34.76%</font><br>
<i class="fa fa-paperclip"></i> <font color="#7CFC00">Stop investing.35.33%</font><br>
<i class="fa fa-paperclip"></i> <font color="#FF1919">I want to continue investing with SCF.29.91%</font>
</strong></h2>
<br><br>

<h2 class="widget-heading h3 putih"><strong>
<i class="fa fa-twitch"></i> Are you satisfy with our customer services..?<br>
<i class="fa fa-paperclip"></i> <font color="#7CFC00">Yes 55.23%</font><br>
<i class="fa fa-paperclip"></i> <font color="#FF1919">No 44.77%</font>
</strong></h2>	
<br><br>

<h2 class="widget-heading h3 putih"><strong>
<i class="fa fa-twitch"></i> Do you read & understand our terms & agreement..?<br>
<i class="fa fa-paperclip"></i> <font color="#7CFC00">Yes 51.03%</font><br>
<i class="fa fa-paperclip"></i> <font color="#FF1919">No 48.97%</font>
</strong></h2>	
<br><br>

<h2 class="widget-heading h3 putih"><strong>
<i class="fa fa-twitch"></i> Do you know every single transaction of investment package in our platform obligate to agree with our term condition & agreements..?<br>
<i class="fa fa-paperclip"></i> <font color="#FF1919">Yes 47.23%</font><br>
<i class="fa fa-paperclip"></i> <font color="#7CFC00">No 52.77%</font>
</strong></h2>	
<br><br>

<h2 class="widget-heading h3 putih"><strong>
<i class="fa fa-clipboard"></i> Lastly, we conclude that over 50% majority result dont want to carry on with our bussiness. I hereby thereof announced that we will conduct refund procedure that consist of 51 days processing in order to liquidify the funds currently floating at the platform and full internal & external audit in order to clarify our client fairly without any mistaken order. 
Your cooperation is highly appreciated.
Thank You.
</strong></h2>

			
            <h2 class="widget-heading h3 putih"><strong><?=$TotalInvestBTC?></strong></h2>
            <br>
			<b>
            <span class="putih"><i class="fa fa-comments-o"></i></span>
            <span class="putih"><i class="fa fa-reddit"></i></span>
			</b>
        </div></div>
</div>
</div>
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


<!-- Load and execute javascript code used only in this page --
<script src="js/pages/uiTables.js"></script>
<script>$(function(){ UiTables.init(); });</script>
-->

<?php include 'inc/template_end.php'; ?>