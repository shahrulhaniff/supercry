<?php
date_default_timezone_set('Asia/Kuala_Lumpur');
$dateNow  = date("Y-m-d H:i:s");
$dateSelect  = date("Y-m-d");
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
$ki_ST=($mininv_ST*($planroi_ST/100));
$ki_ST=number_format((float)$ki_ST, 2, '.', '');
$mininv_ST=number_format((float)$mininv_ST, 2, '.', '');
echo '
<a href="page_investv3.php?PT=MINI" class="widget">
<div class="block">
<div class="block-title">
<b style="font face: Arial Black;">PRIME PORTFOLIO</b>
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
<a href="page_investv3.php?PT=BASIC" class="widget">
<div class="block">
<div class="block-title">
<b style="font face: Arial Black;">SUPER PORTFOLIO</b><!--< ?=$ary_planname?>-->
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
                            <img src="https://media.giphy.com/media/10MEBgSHIhglMY/giphy.gif" alt="finance" width="150%">
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
<a href="page_investv3.php?PT=MEGA" class="widget">
<div class="block">
<div class="block-title">
<b style="font face: Arial Black;">MEGA PORTFOLIO</b>
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




































