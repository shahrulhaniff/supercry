<?php
date_default_timezone_set('Asia/Kuala_Lumpur');
$dateNow  = date("Y-m-d H:i:s");
$dateSelect  = date("Y-m-d");
?>
 <div class="row">
<div class="col-sm-12 col-lg-12">
<a href="page_portfolio_btc.php" class="widget"><div class="widget-content widget-content-mini themed-background-dark-creme">
<?php 
$bonusbtc     =  getbonusbtc($_SESSION['USER']);
$bonusbtc = number_format("".$bonusbtc."",8)."";
?>
            <span class="pull-right text-muted">Bonus : <?=$bonusbtc?>BTC</span>
				<strong class="putih">RETURN OF BITCOIN</strong>
        </div>
		<div class="widget-content clearfix" style="background: url('https://media1.tenor.com/images/71817b4973b13a4e4aec2a8f0763598e/tenor.gif?itemid=10399957'); color: #ffee00; background-size: 500px 200px;">
            <div class="widget-icon pull-right">
				<i class="fa fa-btc hitam"></i>
            </div>
			<?php include "syilingbtc.php"; ?>
			
            <!--<h2 class="widget-heading h3 hitam"><strong><?=$TotalInvestBTC?></strong></h2>-->
            <br>
			<b>
            <span class="hitam">Total active Deposit</span>
            <span class="hitam">
			<?php 
			$TotalInvestBTC =  getTotalInvestBTC($_SESSION['USER']);
			//$TotalInvestBTC = number_format($TotalInvestBTC, 8, '.', '');
			$TotalInvestBTC = number_format("".$TotalInvestBTC."",8)."";
			?>
			<?=$TotalInvestBTC?> BTC
			</span>
			</b>
        </div></a>
</div>
</div>
<?php  
//off double 
/* ?>
 <div class="row">
<div class="col-sm-12 col-lg-6">
<a href="page_deposit_request_btc.php" class="widget"><div class="widget-content widget-content-mini themed-background-dark-creme">
            <span class="pull-right text-muted">Subscribe</span>
				<strong class="putih">BTC PORTFOLIO</strong>
        </div>
		<div class="widget-content clearfix" style="background: url('https://www.htmlcsscolor.com/preview/gallery/FFA500.png'); color: #ffee00;">
            <div class="widget-icon pull-right">
				<i class="fa fa-btc hitam"></i>
            </div>
			<?php 
			$TotalInvestBTC =  getTotalInvestBTC($_SESSION['USER']);
			//$TotalInvestBTC = number_format($TotalInvestBTC, 8, '.', '');
			$TotalInvestBTC = number_format("".$TotalInvestBTC."",8)."";
			?>
            <h2 class="widget-heading h3 hitam"><strong><?=$TotalInvestBTC?></strong></h2>
            <br>
            <span class="hitam">Total active btc deposit</span>
        </div></a>
</div>

<div class="col-sm-12 col-lg-6">
<a href="page_portfolio_btc.php" class="widget"><div class="widget-content widget-content-mini themed-background-dark-creme">
            <span class="pull-right text-muted">-</span>
				<strong class="putih">RETURN OF BITCOIN</strong>
        </div>
		<div class="widget-content clearfix" style="background: url('https://steamuserimages-a.akamaihd.net/ugc/172663821536493098/7BD0320DF4E62A7F536A7BA36256AC4EC5E45096/'); color: #ffee00;">
            <div class="widget-icon pull-right">
				<i class="fa fa-btc kuning"></i>
            </div>
			<?php include "syilingbtc.php"; ?>
            <br>
            <span class="kuning">Total ROI BTC</span>
        </div></a>
</div>
</div>
<?php  
//off double 
*/ ?>
<!-- BTC UPDATE -->
<table width="100%"><tr><td>`</td></tr></table>
<!-- /BTC UPDATE -->

<!--
###############################################################################################################################################
###########################     #######        #######      ###################################################################################
########################### ### ##########  ##########  #######################################################################################
###########################      #########  ##########  #######################################################################################
########################### ##### ########  ##########  #######################################################################################
###########################      #########  ##########      ###################################################################################
###############################################################################################################################################
-->

<?php
//P2 - Product Invest 2
$dataP2_B = mysqli_query($conn,"SELECT * from masterctrl2 WHERE created_date LIKE '".$dateSelect."%' AND plantype='BTC' ORDER BY created_date DESC LIMIT 1") or die(mysqli_error($conn));
$infoP2_B = mysqli_fetch_array( $dataP2_B );
$P2_B   = $infoP2_B['sn'];
$planname_B  = $infoP2_B['planname'];
$planroi_B   = $infoP2_B['planroi'];
$planday_B   = $infoP2_B['planday'];
$mininv_B   = $infoP2_B['mininv'];
//echo $P2_LT ;

if ($P2_B!=null) {
/*KIRA TARIKH PO*/
$current_B  = strtotime($dateNow);
$days_B     = $planday_B * 86400;
$payday_B   = $current_B + $days_B;
$payday_B 	 = date('d/m/Y', $payday_B);

/*KIRA GET MIN INVEST*/
$ki_B=($mininv_B*($planroi_B/100));
$ki_B=number_format((float)$ki_B, 2, '.', '');
$mininv_B=number_format((float)$mininv_B, 2, '.', '');
echo '
<a href="page_deposit_request_btc.php" class="widget">
<div class="block">
<div class="block-title">
<b style="font face: Arial Black;">BTC PORTFOLIO (Click here to subscribe <i class="fa fa-level-down"></i> )</b>
</div>
<div class="block-content-full">

<div class="widget-image widget-image-xs" style="background: url(https://steemitimages.com/p/2923mN3pnd7PuVfhih4RZKPoRrXmaKRqKGrkB5UxFboZ5zagefSKmwJHVbQn12nEjgTJih1escEoJunMADtn6msQH4JcXyv6CA6qZ1tFtpauEm?format=match&mode=fit); color: #ffee00; background-size: 600px 300px;">
                            
                            <div class="widget-image-content">
                                <h2 class="widget-heading text-light kuning"><strong>'.$planname_B.'</strong></h2>
								<h4 class="widget-heading kuning">$'.$mininv_B.'BTC <!--<i class="hi hi-arrow-right"></i>-->GET $'.$ki_B.'BTC</h4>
                                <h4 class="widget-heading kuning">'.$planroi_B.'% Profit</h4>
								<h5 class="widget-heading kuning">PAYOUT DATE <i class="hi hi-arrow-right"></i>'.$payday_B.'</h5>
                            </div>
                        </div>

                </div>
            </div>
</a>
';
} else { echo "-"; }
?>







<!--
###############################################################################################################################################
####################   ###  ###        ###  #### #####         ################################################################################
####################  # # # ######  ###### # ### #########  ###################################################################################
####################  ## ## ######  ###### ## ## #########  ###################################################################################
####################  ##### ######  ###### ### # #########  ###################################################################################
####################  ##### ###        ### ####  #####         ################################################################################
###############################################################################################################################################
-->
<?php
//P2 - Product Invest 2
$dataP2_ST = mysqli_query($conn,"SELECT * from masterctrl2 WHERE created_date LIKE '".$dateSelect."%' AND plantype='ST' ORDER BY created_date DESC LIMIT 1") or die(mysqli_error($conn));

$infoP2_ST = mysqli_fetch_array( $dataP2_ST );
$P2_ST   = $infoP2_ST['sn'];
//echo $P2_ST ;
$planname_ST  = $infoP2_ST['planname'];
$planroi_ST   = $infoP2_ST['planroi'];
$planday_ST   = $infoP2_ST['planday'];
$mininv_ST   = $infoP2_ST['mininv'];
//echo $P2_LT ;

if ($P2_ST!=null) {
/*KIRA TARIKH PO*/
$current_ST  = strtotime($dateNow);
$days_ST     = $planday_ST * 86400;
$payday_ST   = $current_ST + $days_ST;
$payday_ST 	 = date('d/m/Y', $payday_ST);

/*KIRA GET MIN INVEST*/
//https://thumbs.gfycat.com/MediocreElegantFattaileddunnart-size_restricted.gif
//https://media.giphy.com/media/sRFEa8lbeC7zbcIZZR/giphy.gif
$ki_ST=($mininv_ST*($planroi_ST/100));
$ki_ST=number_format((float)$ki_ST, 2, '.', '');
$mininv_ST=number_format((float)$mininv_ST, 2, '.', '');
echo '
<a href="page_investv2.php?PT=MINI" class="widget">
<div class="block">
<div class="block-title">
<b style="font face: Arial Black;">PRIME PORTFOLIO (Click here to subscribe <i class="fa fa-level-down"></i>)</b>
</div>
<div class="block-content-full">

<div class="widget-image widget-image-xs">
<img src="https://thumbs.gfycat.com/MediocreElegantFattaileddunnart-size_restricted.gif" alt="finance" style="width:102%; position: absolute; right: 0px; bottom: 0px;">
                            <div class="widget-image-content">
                                <h2 class="widget-heading text-light"><strong>'.$planname_ST.'</strong></h2>
								<h4 class="widget-heading text-light">$'.$mininv_ST.'USDT <!--<i class="hi hi-arrow-right"></i>-->GET $'.$ki_ST.'USDT</h4>
                                <h4 class="widget-heading text-light">'.$planroi_ST.'% Profit</h4>
								<h5 class="widget-heading text-light">PAYOUT DATE <i class="hi hi-arrow-right"></i>'.$payday_ST.'</h5>
                            </div>
                        </div>

                </div>
            </div>
</a>
';
} else { echo "-"; }
?>










<!--
###############################################################################################################################################
#############################       #########    ###########         #####           ##########        ########################################
#############################  ####  ######  ####  #########   ###############  #############  ################################################
#############################  ###  ######          ########         #########  #############  ################################################
#############################  ##### ####  ########  ##############  #########  #############  ################################################
#############################       ####  ##########  ######         #####           ##########        #######################################
###############################################################################################################################################
-->
<!-- $$$$$$$$$$$$$$$$$$$$$ PLAN TODAY $$$$$$$$$$$$$$$$$$$$$$$ -->
<a href="page_invest.php" class="widget">
<div class="block">
<div class="block-title">
<b style="font face: Arial Black;">SUPER PORTFOLIO (Click here to subscribe <i class="fa fa-level-down"></i> )</b><!--< ?=$ary_planname?>-->
</div>
<div class="block-content-full">
									<?php
									//Kira tarikh PO
									//date_default_timezone_set('Asia/Kuala_Lumpur');
									//$dateNow  = date("Y-m-d H:i:s");
									$current  = strtotime($dateNow);
									$days     = $ary_planday * 86400;
									$payday      = $current + $days;
									$payday = date('d/m/Y', $payday);

									//kira lalu
									$ki=($ary_mininv*($ary_planroi/100));
									$ki=number_format((float)$ki, 2, '.', '');
									$ary_mininv2=number_format((float)$ary_mininv, 2, '.', '');
									?>
									
                        <div class="widget-image widget-image-xs">
                            <!--<img src="https://i.pinimg.com/originals/16/02/b2/1602b26c05ee78120695d592a68b8912.gif" alt="finance" width="150%">-->
                            <img src="https://media.giphy.com/media/10MEBgSHIhglMY/giphy.gif" alt="finance" width="100%">
                            <div class="widget-image-content">
                                <h2 class="widget-heading text-light"><strong><?=$ary_planname?></strong></h2>
								<h4 class="widget-heading text-light">$<?=$ary_mininv2?>USDT <!--<i class="hi hi-arrow-right"></i>-->GET $<?=$ki?>USDT</h4>
                                <h4 class="widget-heading text-light"><?=$ary_planroi?>% Profit</h4>
								<h5 class="widget-heading text-light">PAYOUT DATE <i class="hi hi-arrow-right"></i> <?=$payday?></h5>
                            </div>
                        </div>

                </div>
            </div>
			</a>
<!-- $$$$$$$$$$$$$$$$$$$$$ END PLAN TODAY $$$$$$$$$$$$$$$$$$$$$$$ -->









<!--
###############################################################################################################################################
#####################  ###  ###        #####          ########   ##############################################################################
##################### # # # ###  ###########  ##############  ###  ############################################################################
##################### ## ## ###      #######  ####    ####  ######  ###########################################################################
##################### ##### ###  ###########  ######  ###            ##########################################################################
##################### ##### ###         ####          ###  ########  ##########################################################################
###############################################################################################################################################
-->
<?php
//P2 - Product Invest 2
$dataP2_LT = mysqli_query($conn,"SELECT * from masterctrl2 WHERE created_date LIKE '".$dateSelect."%' AND plantype='LT' ORDER BY created_date DESC LIMIT 1") or die(mysqli_error($conn));

$infoP2_LT = mysqli_fetch_array( $dataP2_LT );
$P2_LT   = $infoP2_LT['sn'];
$planname_LT  = $infoP2_LT['planname'];
$planroi_LT   = $infoP2_LT['planroi'];
$planday_LT   = $infoP2_LT['planday'];
$mininv_LT   = $infoP2_LT['mininv'];
//echo $P2_LT ;

if ($P2_LT!=null) {
/*KIRA TARIKH PO*/
$current_LT  = strtotime($dateNow);
$days_LT     = $planday_LT * 86400;
$payday_LT   = $current_LT + $days_LT;
$payday_LT 	 = date('d/m/Y', $payday_LT);

/*KIRA GET MIN INVEST*/
$ki_LT=($mininv_LT*($planroi_LT/100));
$ki_LT=number_format((float)$ki_LT, 2, '.', '');
$mininv_LT=number_format((float)$mininv_LT, 2, '.', '');
echo '
<a href="page_investv2.php?PT=MEGA" class="widget">
<div class="block">
<div class="block-title">
<b style="font face: Arial Black;">MEGA PORTFOLIO (Click here to subscribe <i class="fa fa-level-down"></i> )</b>
</div>
<div class="block-content-full">

<div class="widget-image widget-image-xs">
                            <img src="https://cdn-images-1.medium.com/max/1600/1*7pzdEcTD0mmzUCLFpvO_1g.gif" alt="finance" style="width:102%; position: absolute; right: 0px; bottom: 0px;">
                            <div class="widget-image-content">
                                <h2 class="widget-heading text-light"><strong>'.$planname_LT.'</strong></h2>
								<h4 class="widget-heading text-light">$'.$mininv_LT.'USDT <!--<i class="hi hi-arrow-right"></i>-->GET $'.$ki_LT.'USDT</h4>
                                <h4 class="widget-heading text-light">'.$planroi_LT.'% Profit</h4>
								<h5 class="widget-heading text-light">PAYOUT DATE <i class="hi hi-arrow-right"></i>'.$payday_LT.'</h5>
                            </div>
                        </div>

                </div>
            </div>
</a>
';
} else { echo "-"; }
?>