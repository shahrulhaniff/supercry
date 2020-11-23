
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>


<!-- Page content -->
<div id="page-content">
    
    <div class="block full">
        <div class="block-title">
            <h2>Manage PO</h2>
        </div>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 5%;">Susunan</th>
                        <th>Status Refresh</th>
                        <th>Tarikh Payday</th>
                        <th>User</th>
                        <th>Amount</th>
                        <th>-</th>
                        
                    </tr>
                </thead>
                <tbody>
<?php
$i=1;
include "database/server.php";
include "functions.php";
$i='1';
$data = mysqli_query($conn,"SELECT * FROM invest WHERE stat='Active' ORDER BY created_date DESC") or die(mysqli_error($conn));
while($info = mysqli_fetch_array( $data )) {
$lapan   = $info['id'];
$planday   = $info['planday'];
$amount   = $info['amount'];
date_default_timezone_set('Asia/Kuala_Lumpur');
//$dateNow  = date("Y-m-d H:i:s");
$dateNow   = $info['created_date'];
$current  = strtotime($dateNow);
$days     = $planday * 86400;
$payday      = $current + $days;
$pc      = $current + $days;
$payday = date('d/m/Y  h:i:sa', $payday);

$pc = date('Y-m-d', $pc);
if($pc>'2020-01-28'){ $color="red"; } else { $color="black"; }

//$lapan="2";
$refr = refreshPortf($lapan);
//if($refr=='clean'){ $color="black"; } else { $color="red"; }
?>
                    <tr>
                        <td><?=$i?></td>
                        <td><?=$refr?></td>
                        <td><?=$payday?></td>
                        <td><?=$lapan?></td>
                        <td><font color="<?=$color?>"><?=$amount?></font></td>
                        <td><?=$amount?></td>
                    </tr>
                    <?php $i++; }
					
					
					?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- END Datatables Block -->
</div>
<!-- END Page Content -->

<?php include 'inc/page_footer.php'; ?>
<?php include 'inc/template_scripts.php'; ?>

<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/uiTables.js"></script>
<script>$(function(){ UiTables.init(); });</script>

<?php include 'inc/template_end.php'; ?>