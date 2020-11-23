<?php
	session_start();
	include "database/server.php";
	if (empty($_SESSION['USER'])) {
	header('Location:login.php'); }
?>
<?php 
if($_SESSION['USER_TYPE']=="MEMBER"){ include 'inc/config.php'; }
if($_SESSION['USER_TYPE']=="MASTER"){ include 'inc/config_master.php';  }
if($_SESSION['USER_TYPE']=="LP"){ include 'inc/config_LP.php';  }
$template['header_link'] = 'DEPOSIT REFERENCE'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>
<?php $disabled=null; ?>
<!-- Page content -->
<div id="page-content">
    <!-- Nestable Lists Header -->
    <div class="content-header hijau">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1>Deposit Using Bitcoin</h1>
                </div>
            </div>
            <div class="col-sm-6 hidden-xs">
                <div class="header-section">
                    <ul class="breadcrumb breadcrumb-top">
                        <li>Wallet</li>
                        <li><a href="">Deposit</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	<!-- 
		############################################################################
		############################################################################
		############################################################################ 
	-->
	
	
	<div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
    <div class="block">
		<div class="block-title">
           
            <h2>ADDRESS</h2>
        </div>
        <div class="row">
<center>
<br>
<img src="img/QR.png" width="30%">
		</center>
		
                <div class="col-xs-12">
                              <div class="form-group">
                                <div class="col-sm-12">

                                  <div class="input-group mb-md">
                                    <input type="text" class="form-control" id="myInput" value="1EsHECNURMikrAYnRdpuNx9SU2oAokGw7w" readonly>
                                    <div class="input-group-btn">
                                      <button type="button" class="btn btn-primary copy-to-clipboard" tabindex="-1" onclick="myFunction()">Copy</button>
                                    </div>
                                  </div>
                                  <div class='copied'></div>
                                </div>
                              </div>
                </div>
		
		</div>
		</div>
		</div>
		</div>
	
	
	<!-- 
		############################################################################
		############################################################################
		############################################################################ 
	-->
	
	
    <!-- Form Validation Content -->
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
            <!-- Form Validation Block -->
            <div class="block">
                <!-- Form Validation Title -->
                <div class="block-title">
                    <h2>Bitcoin Deposit Request</h2>
                </div>
                <!-- END Form Validation Title -->
<?php 
//$walletb=number_format((float)$walletb, 2, '.', '');
?>
                <!-- Form Validation Form -->
                <form id="form-validation" action="page_deposit_request_btc2.php" method="post" class="form-horizontal form-bordered">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Amount <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="number" step="0.000000001" name="amountx" class="form-control" placeholder="BTC AMOUNT" min="0"  autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group form-actions">
					<div class="col-xs-6">
                    <label class="csscheckbox csscheckbox-primary" data-toggle="tooltip" title="Agree to the terms">
                        <input type="checkbox" id="register-terms" name="register-terms" required>
                        <span></span>
                    </label>
                    <a href="#modal-terms" data-toggle="modal">Terms & Agreement</a>
	<?php
	$datacek = mysqli_query($conn,"SELECT addressbtc FROM userpro WHERE id='".$_SESSION['USER']."'") or die(mysqli_error($conn));
		$infocek = mysqli_fetch_array( $datacek );
		$addressbtc = $infocek['addressbtc'];
		if($addressbtc==null){
		echo "<br><br><br><center><code><a href='page_update_profile.php'>Update your bitcoin address before request</a></code></center><br><br><br>";
		$disabled = "disabled";
		}
	  ?>
					</div>
                        <div class="col-xs-6 text-right">
                            <input type="hidden" name="id" value="<?=$_SESSION['USER']?>">
                            <input type="submit" class="btn btn-effect-ripple btn-primary <?=$disabled?>" value="I have Paid">
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
                                <h3 class="modal-title text-center"><strong>Terms and Agreement</strong></h3>
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
$data2 = mysqli_query($conn,"SELECT count(sn) as mysn FROM btcdepo WHERE memberid='$_SESSION[USER]'") or die(mysqli_error($conn));
$info2 = mysqli_fetch_array( $data2 );
//$mysn=$info2['mysn'];
if($info2['mysn'] > 0){
?>
<div class="row">
<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
<div class="block">
<div class="block-title">
<h2>Bitcoin Deposit Record</h2> 
</div>
<div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">Reference Number</th>
                        <th>Amount (BTC)</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
					$data = mysqli_query($conn,"SELECT * FROM btcdepo WHERE memberid='$_SESSION[USER]'") or die(mysqli_error());
					while($info = mysqli_fetch_array( $data )) {
					$sn58 = $info['sn']; 
					$stat = $info['stat']; 
					if($info['stat'] =='Processing' ){ $la="label-primary";}
					if($info['stat'] =='Completed' ){ $la="label-info";}
					?>
                    <tr>
					<?php
					$num = $info['sn'];
					$num = sprintf("%06d", $num);
					?>
                        <td class="text-center"><?=$num?></td>
                        <td><strong><?php echo $info['amount']; ?></strong></td>
                        <td><?php echo $info['created_date']; ?></td>
                        <td><?=$stat?>
						<?php
						if($stat=="Processing"){ ?>
<a href="x_delete_btcdepo_request.php?sn=<?=$sn58?>" data-toggle="tooltip" title="Cancel" class="btn btn-effect-ripple btn-xs btn-danger <?=$disabled?>" onclick="return confirm('Are you sure to cancel?');"><i class="fa fa-times"></i></a> <?php
						}
						?>
						</td>
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
<script src="js/pages/compNestable.js"></script>
<script>$(function(){ CompNestable.init(); });</script>

<?php include 'inc/template_end.php'; ?>