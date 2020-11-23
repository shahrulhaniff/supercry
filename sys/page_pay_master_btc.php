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
//$walletc     =  getWalletc($_SESSION['USER']);
?>
<?php 

if($_SESSION['USER_TYPE']=="MEMBER"){ include 'inc/config.php'; }
if($_SESSION['USER_TYPE']=="MASTER"){ include 'inc/config_master.php';  }
if($_SESSION['USER_TYPE']=="LP"){ include 'inc/config_LP.php';  }

 $template['header_link'] = 'PAGES'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>


<!-- Page content -->
<div id="page-content">
    <!-- Blank Header -->
    <div class="content-header hijau">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1>Report</h1>
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
	
    <div class="row">
	
		<?php
		if(isset($_GET['paydate'])) {
		$paydate = $_GET['paydate'];
		}
		else { $paydate=date("Y-m-d"); }
		?>
	<div class="col-sm-6 col-lg-3">
	<form action="page_pay_master_btc.php" method="GET" class="form-inline">
	<div class="form-group">
	<input type="date" name="paydate" class="form-control" value="<?=$paydate?>">
	<input type="submit" value="Display" class="btn btn-effect-ripple btn-info">
	</div>
	</form>
	</div>
	</div>

<div class="block full">
<div class="block-title">
<h2>BTC PAYMASTER</h2>
</div>
<div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Member Id</th>
                        <th>Wallet Address</th>
                        <th>Amount</th>
                        <th>Payment Status</th>
                        <!--<th class="text-center" style="width: 75px;"><i class="fa fa-flash"></i></th>-->
                    </tr>
                </thead>
                <tbody>
                    <?php 
$data = mysqli_query($conn,"SELECT * FROM btcdepo  WHERE (btcdepo.stat='Completed' OR btcdepo.stat='Paid') AND btcdepo.payout_date LIKE '$paydate%'") or die(mysqli_error($conn));
while($info = mysqli_fetch_array( $data )) {
$sn = $info['sn'];
$memberid = $info['memberid'];
$amount = $info['amount'];
$stat = $info['stat'];

$data88 = mysqli_query($conn,"SELECT planroi FROM investbtc WHERE id='".$memberid."' AND sn='".$sn."'") or die(mysqli_error($conn));
$info88 = mysqli_fetch_array( $data88 );
$planroi  = $info88['planroi'];

$income   = (($amount*$planroi)/100);
$income   = bcdiv($income,1,8);

$data69 = mysqli_query($conn,"SELECT addressbtc FROM userpro WHERE id='".$memberid."'") or die(mysqli_error($conn));
$info69 = mysqli_fetch_array( $data69 );
$addressbtc = $info69['addressbtc'];
?>
                    <tr>
                        <td> BTC Invest Complete [id: <?=$sn?>]</td>
                        <td><?=$memberid?></td>
                        <td>
                            <?=$addressbtc?>
								<!--<div class="form-group">
							    <div class="input-group mb-md">
									<input type="text" class="form-control" id="myInput" value="<?=$addressbtc?>" readonly>
                                    <div class="input-group-btn">
                                      <button type="button" class="btn btn-primary copy-to-clipboard" tabindex="-1" onclick="myFunction()">Copy Address</button>
                                    </div>
                                </div>
                               <div class='copied'></div>
                              </div>-->
							  
						</td>
                        <td><?=$income?></td>
                        <td>
						
						<?php 
						if($stat=="Completed"){
						?>
<form action='update_page_paymaster_btc.php' method='POST'>
<input type='hidden' name='sn' value='<?=$sn?>'>
<input type='hidden' name='amount' value='<?=$amount?>'>
<input type='hidden' name='memberid' value='<?=$memberid?>'>
<?=$stat?> &nbsp; <button type="submit" title="Paymaster BTC" class="btn btn-effect-ripple btn-xs btn-danger">Pay &nbsp;<i class="fa fa-cc-discover"></i></button>
</form>
						<?php }
						else {
							?><?=$stat?> &nbsp; <button title="BTC Paymaster Paid" class="btn btn-effect-ripple btn-xs btn-success">Paid &nbsp; <i class="gi gi-ok_2"></i></button><?php
						}
						?>
						</td>
                    </tr>
                    <?php 
					}
					?>
					
					
					
<!-- ############################################################ -->
<!-- ############################################################ -->
<!-- ############################################################ -->
<!-- ############################################################ -->
<?php 
$data10 = mysqli_query($conn,"SELECT * FROM wallet  WHERE bonusbtc!='0'") or die(mysqli_error($conn));
while($info10 = mysqli_fetch_array( $data10 )) {
$sn2 = "BONUS";
$memberid2 = $info10['id'];
$amount2 = $info10['bonusbtc'];
$stat = "BONUS";

$data68 = mysqli_query($conn,"SELECT addressbtc FROM userpro WHERE id='".$memberid2."'") or die(mysqli_error($conn));
$info68 = mysqli_fetch_array( $data68 );
$addressbtc2 = $info68['addressbtc'];
?>
                    <tr>
                        <td><?=$sn2?></td>
                        <td><?=$memberid2?></td>
                        <td>
						<?=$addressbtc2?>
						<br>
								<!--<div class="form-group">
							    <div class="input-group mb-md">
									<input type="text" class="form-control" id="myInput" value="<?=$addressbtc2?>" readonly>
                                    <div class="input-group-btn">
                                      <button type="button" class="btn btn-primary copy-to-clipboard" tabindex="-1" onclick="myFunction()">Copy Address</button>
                                    </div>
                                </div>
                               <div class='copied'></div>
                              </div> -->
							  
						</td>
                        <td><?=$amount2?></td>
                        <td>
						
						<?php 
						if($stat=="BONUS"){
						?>
<form action='update_page_paymaster_btc2.php' method='POST'>
<input type='hidden' name='id' value='<?=$memberid2?>'>
<input type='hidden' name='point' value='<?=$amount2?>'>
<?=$stat?> &nbsp; <button type="submit" title="Paymaster BTC" class="btn btn-effect-ripple btn-xs btn-danger">Pay &nbsp;<i class="fa fa-cc-discover"></i></button>
</form>
						<?php }
						else {
							?><?=$stat?> &nbsp; <button title="BTC Paymaster Paid" class="btn btn-effect-ripple btn-xs btn-success">Paid &nbsp; <i class="gi gi-ok_2"></i></button><?php
						}
						?>
						</td>
                    </tr>
                    <?php 
					}
					?>
<!-- ############################################################ -->
<!-- ############################################################ -->
<!-- ############################################################ -->
<!-- ############################################################ -->

					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
                </tbody>
            </table>
        </div>
</div>

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
<script src="js/pages/uiTables.js"></script>
<script>$(function(){ UiTables.init(); });</script>

<?php include 'inc/template_end.php'; ?>