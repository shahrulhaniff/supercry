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
<input type="number" id="amounttoken" step="0.01" class="form-control floatNumberField2" placeholder="INPUT USD HERE" min="<?=$minwd?>" max="<?=$tokenz?>" onChange="checkusd(this.value)">
<h5><span class="st" id="txtHint"></span></h5>
                </div>
            </div>
            <div class="col-sm-6 hidden-xs">
                <div class="header-section">
                    <ul class="breadcrumb breadcrumb-top">
                        <li>Control Panel</li>
                        <li>Wallet</li>
                        <li><a href="">Manage Members</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END Validation Header -->
<?php 

$userid=""; 
$displaysendtoken = 'style="display: none"';
$displaycekuser   = '';
$code   = '';
if(isset($_GET['cekuser'])) {
$cekuser = $_GET['cekuser'];
$displaycekuser = 'style="display: none"';
}
if(isset($_GET['userid'])) {
$userid = $_GET['userid'];
$displaysendtoken = "";
}
if(isset($_GET['code'])) {
$code = $_GET['code'];
$displaysendtoken = 'style="display: none"';
}
date_default_timezone_set('Asia/Kuala_Lumpur');
if(isset($_GET['paydate'])) {
$paydate = $_GET['paydate'];
}
else { 
$paydate=date("Y-m-d"); 
}

$datetaju = date("d/m/Y", strtotime($paydate)); 
?>
<!-- CEK USER -->
<div id="fallforest" <?=$displaycekuser?>>
            <div class="block full">
			<div class="block-title">
                    <h2>SEND TOKEN</h2>
                </div>
                <form id="form-validation" action="page_players_send_token1.php" method="POST" class="form-horizontal form-bordered">
                    <div class="form-group">
                        <label class="col-md-3 control-label">User ID </label>
                        <div class="col-md-6">
                            <input type="text" value="<?=$userid?>" name="userid" class="form-control" placeholder="User ID">
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-md-8 col-md-offset-3">
                            <input type="submit" value="FIND USER" class="btn btn-block btn-primary">
                            <!--<input type="reset" value="Reset" class="btn btn-effect-ripple btn-danger">-->
                        </div>
                    </div>
                </form>
				<?php if($code!=''){ ?>
				<center><code><?=$code?></code></center>
				<? } ?>
            </div>
            </div>
<!-- DONE CEK USER -->
<!-- SEND TOKEN -->
			<div id="santopany" <?=$displaysendtoken?>>
            <div class="block full">
			<div class="block-title">
                    <h2><FONT COLOR="BLUE">USER EXIST!</FONT> SEND TOKEN</h2>
                </div>
                <form id="form-validation" action="page_players_send_token2.php" method="POST" class="form-horizontal form-bordered">
                    <div class="form-group">
                        <label class="col-md-3 control-label">User ID </label>
                        <div class="col-md-6">
                            <input type="text" value="<?=$userid?>" name="userid" class="form-control" placeholder="Balance" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="amount">Amount <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="number" id="amount" name="amount" class="form-control floatNumberField" placeholder="scfx token" min="0.00000001" step="0.00000001" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-md-8 col-md-offset-3">
                            <input type="submit" value="SEND TOKEN" class="btn btn-effect-ripple btn-primary">
                            <a href="page_players_send_token.php" class="btn btn-effect-ripple btn-danger">CANCEL</a> 
                        </div>
                    </div>
                </form>
            </div>
            </div>
<!-- DONE SEND TOKEN -->

<div class="block full">
<div class="block-title">

<form action="page_players_send_token.php" method="GET" class="form-inline">
	<div class="form-group">
	<h2>List on <?=$datetaju?></h2>
	<input type="date" name="paydate" class="form-control" value="<?=$paydate?>">
	<input type="submit" value="Display" class="btn btn-effect-ripple btn-info">
	</div>
	</form>
</div>
<div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">SN</th>
                        <th>RefNo</th>
                        <th>MemberID</th>
                        <th>Amount Sent</th>
                        <th>Time</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php 
					$i="1";
					$data = mysqli_query($conn,"SELECT * FROM tokenlog WHERE created_date LIKE '$paydate%' ORDER BY created_date DESC") or die(mysqli_error());
					while($info = mysqli_fetch_array( $data )) {
						$sn = $info['sn'];
						$userid = $info['userid'];
						$amount = $info['amount'];
						$created_date = $info['created_date'];
						
						$TIME = date("h:i:sa", strtotime($created_date));
						$date = date("d-m-Y", strtotime($created_date));
					?>
                    <tr>
                        <td class="text-center"><?=$i?></td>
                        <td class="text-center"><?=$sn?></td>
                        <td><strong><?=$userid?></strong></td>
                        <td><?=$amount?></td>
						<td><?=$TIME?></td>
						<td><?=$date?></td>
                    </tr>
					<!--
<script>
function hnsP<?=$i?>() {
  var x = document.getElementById("P<?=$i?>");
  var y = document.getElementById("P2<?=$i?>");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.style.display = "none";
  } else {
    x.style.display = "none";
    y.style.display = "block";
  }
}
//zio
function hnsPzio<?=$i?>() {
  var x = document.getElementById("zio<?=$i?>");
  var y = document.getElementById("zio2<?=$i?>");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.style.display = "none";
  } else {
    x.style.display = "none";
    y.style.display = "block";
  }
}
</script>	-->
                    <?php $i++; } ?>


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
<script src="js/pages/formsValidation.js"></script>
<script>$(function() { FormsValidation.init(); });</script>


<script type="text/javascript">
    $(document).ready(function () {
        $(".floatNumberField").change(function() {
            $(this).val(parseFloat($(this).val()).toFixed(8));
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $(".floatNumberField2").change(function() {
            $(this).val(parseFloat($(this).val()).toFixed(2));
        });
    });
</script>


<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/uiTables.js"></script>
<script>$(function(){ UiTables.init(); });</script>


<?php include 'inc/template_end.php'; ?>