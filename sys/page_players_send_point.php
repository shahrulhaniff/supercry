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
                    <h1>SEND POINT</h1>
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
$data2 = mysqli_query($conn,"SELECT count(sn) as mysn FROM invest WHERE id='$_SESSION[USER]'") or die(mysqli_error());
$info2 = mysqli_fetch_array( $data2 );
//$mysn=$info2['mysn'];
?>
<div class="block full">
<div class="block-title">
<h2>Master</h2>
</div>
<div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">No.</th>
                        <th>Member ID</th>
                        <th>Wallet</th>
                        <th>Pay Wallet</th>
                        <th>Balance</th>
                        <th>Full Name</th>
                        <th>e-Mail</th>
                        <th>Phone</th>
                        <!--<th>Address</th>
                        <th>Last Seen</th>
                        <th>IP</th>-->
                        <th>Account</th>
                        <!--<th class="text-center" style="width: 75px;"><i class="fa fa-flash"></i></th>-->
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $labels['0']['class'] = "label-success";
                    $labels['0']['text'] = "Active";
                    $labels['1']['class'] = "label-info";
                    $labels['1']['text'] = "On hold..";
                    $labels['2']['class'] = "label-danger";
                    $labels['2']['text'] = "Disabled";
                    $labels['3']['class'] = "label-warning";
                    $labels['3']['text'] = "Pending..";
                    ?>
                    <?php 
					$i="1";
					$data = mysqli_query($conn,"SELECT * FROM userpro U, wallet W WHERE U.akaun!='MASTER' and W.id=U.id") or die(mysqli_error());
					while($info = mysqli_fetch_array( $data )) {
						$memberid = $info['id'];
						$fname = $info['fname']; if($fname==null){$fname="Anonymous";}
						$emel = $info['emel'];
						$phone = $info['phone'];
						$address = $info['address'];
						$akaun = $info['akaun'];
						$ipaddress = $info['ipaddress'];
						$lastlogin = $info['lastlogin'];
						$walletb = $info['walletb'];
						$walletc = $info['walletc'];
					?>
                    <tr>
                        <td class="text-center"><?=$i?></td>
                        <td><strong><?=$memberid?></strong></td>
						<!-- WALLET -->
                        <td>
										<div id="P2<?=$i?>">
										<button onclick="hnsP<?=$i?>()" class="btn btn-effect-ripple btn-sm btn-info"><i class="fa fa-pencil"></i>Send Point</button>
										</div>
										
										<div id="P<?=$i?>" style="display: none">
										<form action="page_players_send_point2.php" method="POST">
										<input type="hidden" name="memberid" value="<?=$memberid?>" required>
										<input type="hidden" name="walletb" value="<?=$walletb?>" required>
										<input type="number" min="1" name="point" required>
										<button type="submit" class="btn btn-effect-ripple btn-sm btn-info"><i class="fa fa-pencil"></i>Send</button>
										<button onclick="hnsP<?=$i?>()" class="btn btn-effect-ripple btn-sm btn-danger"><i class="fa fa-times"></i>Cancel</button>
										</form>
										</div>
						</td>
						<!-- PAY WALLET -->
                        <td><?php if($akaun=="LP"){ ?>
										<div id="zio2<?=$i?>">
										<button onclick="hnsPzio<?=$i?>()" class="btn btn-effect-ripple btn-sm btn-primary"><i class="fa fa-pencil"></i>Send PayWallet Point</button>
										</div>
										
										<div id="zio<?=$i?>" style="display: none">
										<form action="page_players_send_point3.php" method="POST">
										<input type="hidden" name="memberid" value="<?=$memberid?>" required>
										<input type="hidden" name="walletc" value="<?=$walletc?>" required>
										<input type="number" min="1" name="point" required>
										<button type="submit" class="btn btn-effect-ripple btn-sm btn-primary"><i class="fa fa-pencil"></i>Send</button>
										<button onclick="hnsPzio<?=$i?>()" class="btn btn-effect-ripple btn-sm btn-danger"><i class="fa fa-times"></i>Cancel</button>
										</form>
										</div> <?php } ?>
						</td>
                        <td><?=$walletb?></td>
                        <td><?=$fname?></td>
                        <td><?=$emel?></td>
                        <td><?=$phone?></td>
                        <!--<td><?=$address?></td>
                        <td><?=$lastlogin?></td>
                        <td><?=$ipaddress?></td>-->
                        <td><?=$akaun?><!-- OFFDULU
						<?php 
						if($akaun=="MEMBER"){ $update_akaun="LP"; }
						if($akaun=="LP"){ $update_akaun="MEMBER"; } 
						?>
						  <form action='update_page_players.php' method='POST'>
							<input type='hidden' name='memberid' value='<?=$memberid?>'>
							<input type='hidden' name='akaun' value='<?=$update_akaun?>'>
							<button type="submit" title="Promote/Demote User" class="btn btn-effect-ripple btn-xs btn-danger"><i class="gi gi-transfer"></i></button> <?=$akaun?>
						  </form> -->
						</td>
                        <!--<td class="text-center">
                            <a href="javascript:void(0)" data-toggle="tooltip" title="Edit User" class="btn btn-effect-ripple btn-xs btn-success"><i class="fa fa-pencil"></i></a>
                            <a href="javascript:void(0)" data-toggle="tooltip" title="Delete User" class="btn btn-effect-ripple btn-xs btn-danger"><i class="fa fa-times"></i></a>
                        </td> -->
						
                    </tr>
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
</script>	
                    <?php $i++; } ?>


                </tbody>
            </table>
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


<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/uiTables.js"></script>
<script>$(function(){ UiTables.init(); });</script>


<?php include 'inc/template_end.php'; ?>