<?php
	session_start();
    date_default_timezone_set('Asia/Kuala_Lumpur');
	include "database/server.php";
	if (empty($_SESSION['USER'])) {
	header('Location:login.php'); }
?>
<?php 
if($_SESSION['USER_TYPE']=="MEMBER"){ include 'inc/config.php'; }
if($_SESSION['USER_TYPE']=="MASTER"){ include 'inc/config_master.php';  }
if($_SESSION['USER_TYPE']=="LP"){ include 'inc/config_LP.php';  }
$template['header_link'] = 'FORMS'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>


<!-- Page content -->
<div id="page-content">
    <!-- Validation Header -->
    <div class="content-header hijau">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1>Update Price Token</h1>
                </div>
            </div>
            <div class="col-sm-6 hidden-xs">
                <div class="header-section">
                    <ul class="breadcrumb breadcrumb-top">
                        <li>Control Panel</li>
                        <li>Token</li>
                        <li><a href="">Update Price</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END Validation Header -->

    <!-- Form Update Nilai SCF Token -->
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
            <div class="block">
			<div class="block-title">
                    <h2>Token Price</h2>
                </div>
                <form id="form-validation" action="page_57.php" method="post" class="form-horizontal form-bordered">
                    <div class="form-group">
                        <label class="col-md-3 control-label">SCF Token </label>
                        <div class="col-md-6">
                            <input type="number" name="tokenz" step="0.00000001" value="<?=$tokenz?>" class="form-control" placeholder="Price">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">USD <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="number" name="usd57"  value="<?=$usd?>" class="form-control" placeholder="USD" >
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-md-8 col-md-offset-3">
                            <button type="submit" class="btn btn-effect-ripple btn-primary">Update</button>
                            <button type="reset" class="btn btn-effect-ripple btn-danger">Reset</button> 
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Form Update Nilai BTC -->
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
            <div class="block">
			<div class="block-title">
                    <h2>BTC Price</h2>
                </div>
                <form id="form-validation" action="page_58.php" method="post" class="form-horizontal form-bordered">
                    <div class="form-group">
                        <label class="col-md-3 control-label">BTC </label>
                        <div class="col-md-6">
                            <input type="number" step="0.00000001" name="btc58" value="<?=$btc58?>" class="form-control" placeholder="Price">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">USD <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="number" step="0.01" name="usd58"  value="<?=$usd58?>" class="form-control" placeholder="USD" >
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-md-8 col-md-offset-3">
                            <button type="submit" class="btn btn-effect-ripple btn-primary">Update</button>
                            <button type="reset" class="btn btn-effect-ripple btn-danger">Reset</button> 
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- END Page Content -->

<?php include 'inc/page_footer.php'; ?>
<?php include 'inc/template_scripts.php'; ?>
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
<script src="js/pages/formsValidation.js"></script>
<script>$(function() { FormsValidation.init(); });</script>

<?php if($mysn>30){ ?>
<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/uiTables.js"></script>
<script>$(function(){ UiTables.init(); });</script>
<?php } ?>

<?php include 'inc/template_end.php'; ?>