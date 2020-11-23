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
$template['header_link'] = 'Downline'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>

<!-- Page content -->
<div id="page-content">
    <!-- Nestable Lists Header -->
    <div class="content-header hijau">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1>AFFILIATE</h1>
                </div>
            </div>
            <div class="col-sm-6 hidden-xs">
                <div class="header-section">
                    <ul class="breadcrumb breadcrumb-top">
                        <li>Affiliate</li>
                        <li><a href="">Downline</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
	 <!-- Example Lists Block -->
    <div class="block full">
        <!-- Example Lists Title -->
        <div class="block-title">
            <div id="nestable-actions" class="block-options pull-right">
                <a href="javascript:void(0)" class="btn btn-effect-ripple btn-default" data-action="collapse">Collapse All</a>
                <a href="javascript:void(0)" class="btn btn-effect-ripple btn-default" data-action="expand">Expand All</a>
            </div>
			<?php
			$color1="50ce07";
			$color2="c072d8";
			$color3="e6f700";
			?>
            <h2>Affiliate Lists</h2> ::.
			<i class="fa fa-stop" style="color:#<?=$color1?>;"></i>LEVEL 1 ::.
			<i class="fa fa-stop" style="color:#<?=$color2?>;"></i>LEVEL 2 ::.
			<i class="fa fa-stop" style="color:#<?=$color3?>;"></i>LEVEL 3 
        </div>
        <!-- END Example Lists Title -->

        <!-- Example Lists Content -->
        <div class="row">
		
		
		
		

		
		
		
		
		
<div class="col-sm-4 col-sm-offset-1">
<div id="nestable" class="dd-nodrag">
<ol class="dd-list">
<?php //TREE 821
		//LV1LV1LV1LV1LV1LV1LV1LV1LV1LV1LV1LV1LV1LV1
		$sql  = "SELECT * FROM affiliate A,userpro U WHERE A.id = '$_SESSION[USER]' AND U.id = A.aff_id";
		$i=1;
		$data = mysqli_query($conn,$sql) or die(mysqli_error());
		while($info = mysqli_fetch_array( $data )) {
		$aff_id=$info['aff_id'];
		//echo "[".$i."]-".$aff_id."<br>";
				?>
				<li class="dd-item" data-id="2">
                <div class="dd-handle" style="color:#000000;background: #<?=$color1?>;"><?=$aff_id?></div>
                
                <?php
				//LV2LV2LV2LV2LV2LV2LV2LV2LV2LV2LV2LV2LV2LV2
				$sql2  = "SELECT * FROM affiliate A,userpro U WHERE A.id = '".$aff_id."' AND U.id = A.aff_id";
				$j=1;
				$data2 = mysqli_query($conn,$sql2) or die(mysqli_error());
				while($info2 = mysqli_fetch_array( $data2 )) {
				$aff_id2=$info2['aff_id'];
				//echo "-------[".$j."]-".$aff_id2."<br>";
						?>
						<ol class="dd-list">
						<li class="dd-item" data-id="5">
                        <div class="dd-handle" style="color:#000000;background: #<?=$color2?>;"><?=$aff_id2?></div>
                        
                        <?php
						//LV3LV3LV3LV3LV3LV3LV3LV3LV3LV3LV3LV3LV3LV3
						$sql3  = "SELECT * FROM affiliate A,userpro U WHERE A.id = '".$aff_id2."' AND U.id = A.aff_id";
						$k=1;
						$data3 = mysqli_query($conn,$sql3) or die(mysqli_error());
						while($info3 = mysqli_fetch_array( $data3 )) {
						$aff_id3=$info3['aff_id'];
						//echo "+++++++++++++++++[".$k."]-".$aff_id3."<br>";
						?>
						<ol class="dd-list"><li class="dd-item" data-id="6"><div class="dd-handle" style="color:#000000;background: #<?=$color3?>;"><?=$aff_id3?></div></li></ol><?php
						$k++;
						}
						?>
                        </li></ol><?php
						//LV3LV3LV3LV3LV3LV3LV3LV3LV3LV3LV3LV3LV3LV3
				$j++;
				}
				?></li><?php
				//LV2LV2LV2LV2LV2LV2LV2LV2LV2LV2LV2LV2LV2LV2
		$i++;
		}
		//LV1LV1LV1LV1LV1LV1LV1LV1LV1LV1LV1LV1LV1LV1
?>
</ol>
</div>	
<!--<h4 class="sub-header"><i class="fa fa-arrow-circle-o-right"></i> Serialised List Output</h4><code id="nestable1-output"></code>-->
</div>
				

			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
            <div class="col-sm-4 col-sm-offset-1">
                <div id="nestable2" class="dd dd-inverse">
                    <!--<ol class="dd-list">
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
                    </ol>-->
                </div>
                <!--<h4 class="sub-header"><i class="fa fa-arrow-circle-o-right"></i> Serialised List Output</h4><code id="nestable2-output"></code>-->
            </div>
			
			
			
        </div>
        <!-- END Example Lists Content -->
    </div> 
    <!-- END Example Lists Block -->
    <div class="block full">
		<div class="block-title">
           
            <h2>Our affiliate program</h2>
        </div>
        <div class="row">
<center>
<br>
AFFILIATE PROGRAM
<br>
8% = LEVEL 1
<br>
2% = LEVEL 2
<br>
1% = LEVEL 3
<br>


<p>Our affiliate program is a great opportunity to earn money without personal investments. No matter who you are. Tell your friends about our platform, share information about quick payments with them, promote our project, shoot video reviews and earn 8% from deposits of referrals of the first level, 2% from deposits of referrals of the second level and 1% from deposits of referrals of the third level.</p>
<p>Matrix affiliate where each account must active in order to initiate unilevel bonus 8%, 2%, 1%.</p>

<p>If one sponsor portfolio activation, obligate to have an active in one's account to retrieve level bonus.</p>

<p>If one of the level 2 account portfolio currently not active, they will receive no bonus and same goes to level 3 account as there is a cut flow thru the level that cannot initiate any bonus retrieval.</p>
		<img src="img/aff.png">
		</center>
		</div>
		</div>

   
</div>
<!-- END Page Content -->

<?php include 'inc/page_footer.php'; ?>
<?php include 'inc/template_scripts.php'; ?>

<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/compNestable.js"></script>
<script>$(function(){ CompNestable.init(); });</script>


<?php include 'inc/template_end.php'; ?>