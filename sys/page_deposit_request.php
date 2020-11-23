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

<!-- Page content -->
<div id="page-content">
    <!-- Nestable Lists Header -->
    <div class="content-header hijau">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1>Deposit to Wallet</h1>
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
	
    <!-- btc depo update alih sana qr sini tunjuk ni je<div class="block full">
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
                                    <input type="text" class="form-control" id="myInput" value="1da8x7BWytz2u8Wp7qX6imYFQCj9hgVy4" readonly>
                                    <div class="input-group-btn">
                                      <button type="button" class="btn btn-primary copy-to-clipboard" tabindex="-1" onclick="myFunction()">Copy</button>
                                    </div>
                                  </div>
                                  <div class='copied'></div>
                                </div>
                              </div>
                </div>
		
		</div>
		</div>-->
<?php /* coming soon
    <!-- Example Lists Block -->
    <div class="block full">
        <!-- Example Lists Title -->
        <div class="block-title">
            <div id="nestable-actions" class="block-options pull-right">
                <a href="javascript:void(0)" class="btn btn-effect-ripple btn-default" data-action="collapse">Collapse All</a>
                <a href="javascript:void(0)" class="btn btn-effect-ripple btn-default" data-action="expand">Expand All</a>
            </div>
            <h2>Example Lists</h2>
        </div>
        <!-- END Example Lists Title -->

        <!-- Example Lists Content -->
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div id="nestable1" class="dd">
                    <ol class="dd-list">
                        <li class="dd-item" data-id="1">
                            <div class="dd-handle">Item 1</div>
                        </li>
                        <li class="dd-item" data-id="2">
                            <div class="dd-handle">Item 2</div>
                            <ol class="dd-list">
                                <li class="dd-item" data-id="3"><div class="dd-handle">Item 3</div></li>
                                <li class="dd-item" data-id="4"><div class="dd-handle">Item 4</div></li>
                                <li class="dd-item" data-id="5">
                                    <div class="dd-handle">Item 5</div>
                                    <ol class="dd-list">
                                        <li class="dd-item" data-id="6"><div class="dd-handle">Item 6</div></li>
                                        <li class="dd-item" data-id="7"><div class="dd-handle">Item 7</div></li>
                                        <li class="dd-item" data-id="8"><div class="dd-handle">Item 8</div></li>
                                    </ol>
                                </li>
                                <li class="dd-item" data-id="9"><div class="dd-handle">Item 9</div></li>
                                <li class="dd-item" data-id="10"><div class="dd-handle">Item 10</div></li>
                            </ol>
                        </li>
                        <li class="dd-item" data-id="11">
                            <div class="dd-handle">Item 11</div>
                        </li>
                        <li class="dd-item" data-id="12">
                            <div class="dd-handle">Item 12</div>
                        </li>
                    </ol>
                </div>
                <h4 class="sub-header"><i class="fa fa-arrow-circle-o-right"></i> Serialised List Output</h4>
                <code id="nestable1-output"></code>
            </div>
            <div class="col-sm-4 col-sm-offset-1">
                <div id="nestable2" class="dd dd-inverse">
                    <ol class="dd-list">
                        <li class="dd-item" data-id="1">
                            <div class="dd-handle">Item 1</div>
                        </li>
                        <li class="dd-item" data-id="2">
                            <div class="dd-handle">Item 2</div>
                            <ol class="dd-list">
                                <li class="dd-item" data-id="3"><div class="dd-handle">Item 3</div></li>
                                <li class="dd-item" data-id="4"><div class="dd-handle">Item 4</div></li>
                                <li class="dd-item" data-id="5">
                                    <div class="dd-handle">Item 5</div>
                                    <ol class="dd-list">
                                        <li class="dd-item" data-id="6"><div class="dd-handle">Item 6</div></li>
                                        <li class="dd-item" data-id="7"><div class="dd-handle">Item 7</div></li>
                                        <li class="dd-item" data-id="8"><div class="dd-handle">Item 8</div></li>
                                    </ol>
                                </li>
                                <li class="dd-item" data-id="9"><div class="dd-handle">Item 9</div></li>
                                <li class="dd-item" data-id="10"><div class="dd-handle">Item 10</div></li>
                            </ol>
                        </li>
                        <li class="dd-item" data-id="11">
                            <div class="dd-handle">Item 11</div>
                        </li>
                        <li class="dd-item" data-id="12">
                            <div class="dd-handle">Item 12</div>
                        </li>
                    </ol>
                </div>
                <h4 class="sub-header"><i class="fa fa-arrow-circle-o-right"></i> Serialised List Output</h4>
                <code id="nestable2-output"></code>
            </div>
        </div>
        <!-- END Example Lists Content -->
    </div> */ ?>
    <!-- END Example Lists Block -->
<?php
$data2 = mysqli_query($conn,"SELECT count(sn) as mysn FROM walletlog WHERE memberid='$_SESSION[USER]'") or die(mysqli_error());
$info2 = mysqli_fetch_array( $data2 );
//$mysn=$info2['mysn'];
if($info2['mysn'] > 0){
?>
<div class="row">
<div class="col-sm-12">
<div class="block">
<div class="block-title">
<h2>Deposit Record</h2> <!--<code>Record start from 28 November 2019</code>-->
</div>
<div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">Reference Number</th>
                        <th>Amount (USDT)</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
					$data = mysqli_query($conn,"SELECT * FROM walletlog WHERE memberid='$_SESSION[USER]'") or die(mysqli_error());
					while($info = mysqli_fetch_array( $data )) {
					//if($info['stat'] =='Active' ){ $la="label-success";}
					//if($info['stat'] =='Completed' ){ $la="label-info";}
					?>
                    <tr>
					<?php
					$num = $info['sn'];
					$num = sprintf("%06d", $num);
					?>
                        <td class="text-center"><?=$num?></td>
                        <td><strong><?php echo $info['amount']; ?></strong></td>
                        <td><?php echo $info['created_date']; ?></td>
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