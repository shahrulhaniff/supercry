<?php
	session_start();
    date_default_timezone_set('Asia/Kuala_Lumpur');
	include "database/server.php";
	include "functions.php";
	if (empty($_SESSION['USER'])) {
	header('Location:login.php'); }
?>

<?php 

include 'inc/config_master.php';  
 $template['header_link'] = 'PAGES'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>


<!-- Page content -->
<div id="page-content">
   
	
    <div class="row">
	
		<?php
		if(isset($_GET['paydate'])) {
		$paydate = $_GET['paydate'];
		}
		else { $paydate=date("Y-m-d"); }
		?>
	<div class="col-sm-6 col-lg-3">
	<form action="page_pay_master.php" method="GET" class="form-inline">
	<div class="form-group">
	<input type="date" name="paydate" class="form-control" value="<?=$paydate?>">
	<input type="submit" value="Display" class="btn btn-effect-ripple btn-info">
	</div>
	</form>
	</div>
	</div>
<div class="block full">
<div class="block-title">
</div>
<div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 150px;">Date</th>
                        <th>Member Id</th>
                        <th>Full Name</th>
                        <th>Cancel</th>
                        <th>Amount</th>
                        <th>Payment Status</th>
                        <!--<th class="text-center" style="width: 75px;"><i class="fa fa-flash"></i></th>-->
                    </tr>
                </thead>
                <tbody>
                    <?php 
					$data = mysqli_query($conn,"SELECT * FROM wd W,affiliate A, userpro U  WHERE  W.id=A.aff_id AND U.id=A.aff_id AND (W.stat='Processing' OR W.stat='Processing_Token') AND W.created_date LIKE '$paydate%'") or die(mysqli_error($conn));
					while($info = mysqli_fetch_array( $data )) {
					
					$sn = $info['sn'];
					$id = $info['id'];
					$fname = $info['fname'];
					$phone = $info['phone'];
					$amount = $info['amount'];
					$akaunb = $info['akaunb'];
					$penama = $info['penama'];
					$jenisb = $info['jenisb'];
					$stat = $info['stat'];
					
					//$created_date = $info['created_date'];
$data69 = mysqli_query($conn,"SELECT created_date FROM wd WHERE id='".$id."' AND sn='".$sn."'") or die(mysqli_error($conn));
$info69 = mysqli_fetch_array( $data69 );
$created_date = $info69['created_date'];
						
					if($info['stat'] =='Active' ){ $la="label-success"; }
					if($info['stat'] =='Completed' ){ $la="label-info"; }
					?>
                    <tr>
                        <td class="text-center"><?=$created_date?></td>
                        <td><?=$id?></td>
                        <td><?=$fname?></td>
                        <td><?=$amount?></td>
                        <td><a href="x_delete_widthraw_request_token.php?ID=<?=$ID?>&SN=<?=$SN?>&AM=<?=$amount?>" data-toggle="tooltip" title="Buy back" class="btn btn-effect-ripple btn-xs btn-danger <?=$disabled?>" onclick="return confirm('Are you sure to buy back you token withdrawal request?');"><i class="fa fa-times"></i></a></td>
                        <td>
						
						<?php 
						if     ($stat=="Processing")      { echo "Processing"; 
						
						/////////////////////////////////////////////////
						/////////////////////////////////////////////////
//$SN = $_GET['SN'];
//$ID = $_GET['ID'];
$AM = $amount;
$balance = getWalletb($id);
$upb = $balance + $AM;

$sqlA="DELETE FROM wd  WHERE sn='".$sn."' AND id='".$id."'";
$resultA=mysqli_query($conn,$sqlA);

if($resultA){
	
$sqlUPA="UPDATE wallet set walletb = '".$upb."' WHERE id='".$id."' ";
$resultUPA=mysqli_query($conn,$sqlUPA) or die(mysqli_error());
	
echo "-Done-";
}
else { echo "ERROR!!!!!!"; }
						/////////////////////////////////////////////////
						/////////////////////////////////////////////////
						
						} 
						else if($stat=="Processing_Token"){ echo "Processing_Token"; 
						/////////////////////////////////////////////////
						/////////////////////////////////////////////////
$SN = $sn;//no resit
$ID = $id;//user
$AM = $amount;//amount dalam usd

$select=mysqli_query($conn,"SELECT * FROM pricetoken ORDER BY created_date DESC LIMIT 1");
$fetch=mysqli_fetch_array($select);
$usd=$fetch['usd'];
$tokenz=$fetch['tokenz'];
//$amount=($tokenz*$usd);
$tokenAM = ($AM/$usd);

$select2=mysqli_query($conn,"SELECT tokenz from wallet WHERE id='$ID'");
$fetch2=mysqli_fetch_array($select2);
$balance=$fetch2['tokenz'];//$balance = getWalletb($ID);
$upb2 = $balance + $tokenAM; //update balance


$sql="DELETE FROM wd  WHERE sn='".$SN."' AND id='".$ID."'";
$result=mysqli_query($conn,$sql);

if($result){
	
$sqlUP="UPDATE wallet set tokenz = '".$upb2."' WHERE id='".$ID."' ";
$resultUP=mysqli_query($conn,$sqlUP) or die(mysqli_error());
echo "-Done-";
}
else { echo "ERROR!!!!!!"; }

						/////////////////////////////////////////////////
						/////////////////////////////////////////////////
						} 
						else {
							?><?=$stat?> &nbsp; <button title="Paymaster Completed" class="btn btn-effect-ripple btn-xs btn-success">Completed &nbsp; <i class="gi gi-ok_2"></i></button><?php
							if($stat=="Completed_Token"){
							    ?><button title="Pay Token Paid" class="btn btn-effect-ripple btn-xs btn-warning"><i class="gi gi-coins"></i></button><?php
							}
						}
						?>
						
						</td>
                       
                    </tr>
                    <?php 
					}
					?>
                </tbody>
            </table>
        </div>
</div>
</div>
<!-- END Page Content -->

<?php include 'inc/page_footer.php'; ?>
<?php include 'inc/template_scripts.php'; ?>

<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/uiTables.js"></script>
<script>$(function(){ UiTables.init(); });</script>

<?php include 'inc/template_end.php'; ?>