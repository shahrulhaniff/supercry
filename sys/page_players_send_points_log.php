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
                    <h1>HISTORY - LOG POINT SENT</h1>
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

<div class="block full">
<div class="block-title">
<h2>Master</h2>
</div>
<div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter">
                <thead>
                    <tr>
                        <th>Date Sent</th>
                        <th>Time Sent</th>
                        <th>Member Account Id</th>
                        <th>Amount Point Sent</th>
                        <th>Balance After Sent</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
					$i="1";
					$data = mysqli_query($conn,"SELECT * FROM  walletlog ORDER BY created_date DESC LIMIT 150") or die(mysqli_error());
					while($info = mysqli_fetch_array( $data )) {
						$memberid = $info['memberid'];
						$walletb = $info['walletb'];
						$amount = $info['amount'];
						$created_date = $info['created_date'];
						
						$TIME = date("h:i:sa", strtotime($created_date));
						$date = date("d-m-Y", strtotime($created_date));
						
					?>
                    <tr>
                        <td><?=$date?></td>
                        <td><?=$TIME?></td>
                        <td><strong><?=$memberid?></strong></td>
                        <td><?=$amount?></td>
                        <td><?=$walletb?></td>
                    </tr>

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


<!-- Load and execute javascript code used only in this page --
<script src="js/pages/uiTables.js"></script>
<script>$(function(){ UiTables.init(); });</script>
-->

<?php include 'inc/template_end.php'; ?>