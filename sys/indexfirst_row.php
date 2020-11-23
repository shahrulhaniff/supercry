
    <div class="row">
	<div class="col-sm-6 col-lg-3">
            <a href="page_invest.php" class="widget">
                <div class="widget-content widget-content-mini themed-background-dark-flat">
                    <span class="pull-right text-muted">-</span>
                    <strong class="putih">TOTAL INVESTMENT</strong>
                </div>
                <div class="widget-content themed-background-flat clearfix">
                    <div class="widget-icon pull-right">
                        <i class="fa fa-file-text-o hitam"></i>
                    </div>
					<?php  $TotalInvest=number_format((float)$TotalInvest, 2, '.', '');?>
                    <h2 class="widget-heading h3 hitam"><strong>$<?=$TotalInvest?></strong></h2>
                    <span class="hitam">PORTFOLIO ACTIVE: <b><?=$portfolioActive?></b></span>
                </div>
            </a>
        </div>
		
	<div class="col-sm-6 col-lg-3">
            <a href="page_portfolio.php" class="widget">
                <div class="widget-content widget-content-mini themed-background-dark-amethyst">
                    <span class="pull-right text-muted">-</span>
                    <strong class="putih">INVESTMENT WALLET</strong>
                </div>
                <div class="widget-content themed-background-amethyst clearfix">
                    <div class="widget-icon pull-right">
                        <i class="fa fa-bar-chart-o hitam"></i>
                    </div>
					<?php include "syiling.php"; ?>
                    <!--<h2 class="widget-heading h3 hitam"><strong><?=$TotalInvest?></strong></h2>-->
                    <span class="hitam">RETURN OF INVESTMENT (ROI)</span>
                </div>
            </a>
        </div>
		
	<div class="col-sm-6 col-lg-3">
            <a href="page_withdraw_request.php" class="widget">
                <div class="widget-content widget-content-mini themed-background-dark-creme">
                    <span class="pull-right text-muted">-</span>
                    <strong class="putih">MY WALLET</strong>
                </div>
                <div class="widget-content themed-background-creme clearfix">
                    <div class="widget-icon pull-right">
                        <i class="fa fa-usd hitam"></i>
                    </div><?php $walletbtoshow=number_format((float)$walletb, 2, '.', '');?>
                    <h2 class="widget-heading h3 hitam"><strong>$<?=$walletbtoshow?></strong></h2>
					<?php $totalwdproc = getWDprocess($_SESSION['USER']); ?>
                    <br>
                    <span class="hitam">WIDTHDRAW PROCESS : <b>$<?=$totalwdproc?></b></span>
                </div>
            </a>
        </div>
		
	<div class="col-sm-6 col-lg-3">
            <a href="page_token.php" class="widget">
                <div class="widget-content widget-content-mini themed-background-dark-classy">
                    <span class="pull-right text-muted">-</span>
                    <strong class="putih">TOKEN WALLET</strong>
                </div>
                <div class="widget-content themed-background-classy clearfix">
                    <div class="widget-icon pull-right">
                        <i class="gi gi-coins hitam"></i>
                    </div>
					<?php 
					$tokenz = number_format("".$tokenz."",8)."";
					$vh=($tokenz*$usd);
					$vh = number_format("".$vh."",2)."";
					?>
                    <h2 class="widget-heading h3 hitam"><strong><?=$tokenz?>  SCFX</strong></h2>
                    <span class="hitam">VALUE HOLDING : <?=$vh?>USDT</span>
                </div>
            </a>
        </div>
        </div>