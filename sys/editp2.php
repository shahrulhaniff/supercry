<?php
//MINI 
$data2 = mysqli_query($conn,"SELECT * FROM masterctrl2 WHERE plantype='ST' ORDER BY created_date DESC LIMIT 1") or die(mysqli_error());
$info2 = mysqli_fetch_array( $data2 );
$planroi2 = $info2['planroi'];
$planday2 = $info2['planday'];
$planname2 = $info2['planname'];
$mininv2 = $info2['mininv'];

//MEGA
$data3 = mysqli_query($conn,"SELECT * FROM masterctrl2 WHERE plantype='LT' ORDER BY created_date DESC LIMIT 1") or die(mysqli_error());
$info3 = mysqli_fetch_array( $data3 );
$planroi3 = $info3['planroi'];
$planday3 = $info3['planday'];
$planname3 = $info3['planname'];
$mininv3 = $info3['mininv'];

//BTC
$data4 = mysqli_query($conn,"SELECT * FROM masterctrl2 WHERE plantype='BTC' ORDER BY created_date DESC LIMIT 1") or die(mysqli_error());
$info4 = mysqli_fetch_array( $data4 );
$planroi4 = $info4['planroi'];
$planday4 = $info4['planday'];
$planname4 = $info4['planname'];
$mininv4 = $info4['mininv'];


?>
   
<div id="hidDivmini" style="display: none">
        <div class="col-sm-6 col-lg-8">
            <div class="block">
<div class="block-title">
<b style="font face: Arial Black;">UPDATE MINI PORTFOLIO</b><!--< ?=$ary_planname?>-->
</div>
                   <form id="form-validation" action="update_plan2.php" method="post" class="form-horizontal form-bordered">
                    <div class="form-group">
                        <label class="col-md-3 control-label" >PLAN NAME</label>
                        <div class="col-md-6">
                            <input type="text" value="<?=$planname2?>" name="planname" class="form-control" required>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-md-3 control-label" >PLAN ROI</label>
                        <div class="col-md-6">
                            <input type="number" value="<?=$planroi2?>" name="planroi" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="amount">PLAN DAYS <span class="text-danger">*</span></label>
                        <div class="col-md-6">
							<input type="number" value="<?=$planday2?>" min="1" name="planday" class="form-control" autocomplete="off" required>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-md-3 control-label" for="amount">MINIMUM MINI INVEST <span class="text-danger">*</span></label>
                        <div class="col-md-6">
							<input type="number" id="amount" name="mininv" class="form-control floatNumberField" value="<?=$mininv2?>" min="1"  step="0.01" autocomplete="off" required>
                        </div>
                    </div>
					
                   <div class="form-group form-actions">
                        <div class="col-xs-6 text-right">
                            <input type="HIDDEN" value="ST" name="PT" class="form-control" required>
                            <input type="submit" class="btn btn-effect-ripple btn-primary" value="Update">
                            <button  onclick="hidenshow2()" type="reset" class="btn btn-effect-ripple btn-danger">Cancel</button>
                        </div>
                    </div>
                </form>
			</div>
</div>
</div>

   
<div id="hidDivmega" style="display: none">
        <div class="col-sm-6 col-lg-8">
            <div class="block">
			<div class="block-title">
			<b style="font face: Arial Black;">UPDATE MEGA PORTFOLIO</b><!--< ?=$ary_planname?>-->
			</div>
                   <form id="form-validation" action="update_plan2.php" method="post" class="form-horizontal form-bordered">
                    <div class="form-group">
                        <label class="col-md-3 control-label" >PLAN NAME</label>
                        <div class="col-md-6">
                            <input type="text" value="<?=$planname3?>" name="planname" class="form-control" required>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-md-3 control-label" >PLAN ROI</label>
                        <div class="col-md-6">
                            <input type="number" value="<?=$planroi3?>" name="planroi" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="amount">PLAN DAYS <span class="text-danger">*</span></label>
                        <div class="col-md-6">
							<input type="number" value="<?=$planday3?>" min="1" name="planday" class="form-control" autocomplete="off" required>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-md-3 control-label" for="amount">MINIMUM MEGA INVEST <span class="text-danger">*</span></label>
                        <div class="col-md-6">
							<input type="number" id="amount" name="mininv" class="form-control floatNumberField" value="<?=$mininv3?>" min="1"  step="0.01" autocomplete="off" required>
                        </div>
                    </div>
                   <div class="form-group form-actions">
                        <div class="col-xs-6 text-right">
                            <input type="HIDDEN" value="LT" name="PT" class="form-control" required>
                            <input type="submit" class="btn btn-effect-ripple btn-primary" value="Update">
                            <button  onclick="hidenshow3()" type="reset" class="btn btn-effect-ripple btn-danger">Cancel</button>
                        </div>
                    </div>
                </form>
			</div>
</div>
</div>
   
<div id="hidDivbtc" style="display: none">
        <div class="col-sm-6 col-lg-8">
            <div class="block">
			<div class="block-title">
			<b style="font face: Arial Black;">UPDATE BTC PORTFOLIO</b><!--< ?=$ary_planname?>-->
			</div>
                   <form id="form-validation" action="update_plan2.php" method="post" class="form-horizontal form-bordered">
                    <div class="form-group">
                        <label class="col-md-3 control-label" >PLAN NAME</label>
                        <div class="col-md-6">
                            <input type="text" value="<?=$planname4?>" name="planname" class="form-control" required>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-md-3 control-label" >PLAN ROI</label>
                        <div class="col-md-6">
                            <input type="number" value="<?=$planroi4?>" name="planroi" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="amount">PLAN DAYS <span class="text-danger">*</span></label>
                        <div class="col-md-6">
							<input type="number" value="<?=$planday4?>" min="1" name="planday" class="form-control" autocomplete="off" required>
                        </div>
                    </div>
					<!--<div class="form-group">
                        <label class="col-md-3 control-label" for="amount">MINIMUM BTC INVEST <span class="text-danger">*</span></label>
                        <div class="col-md-6">
							<input type="number" id="amount" name="mininv" class="form-control floatNumberField" value="<?=$mininv4?>" min="0"  step="0.000000001" autocomplete="off" required>
                        </div>
                    </div>-->
					<input type="hidden" id="amount" name="mininv" class="form-control floatNumberField" value="<?=$mininv4?>" min="0"  step="0.000000001" autocomplete="off" required>
                   <div class="form-group form-actions">
                        <div class="col-xs-6 text-right">
                            <input type="HIDDEN" value="BTC" name="PT" class="form-control" required>
                            <input type="submit" class="btn btn-effect-ripple btn-primary" value="Update">
                            <button  onclick="hidenshow4()" type="reset" class="btn btn-effect-ripple btn-danger">Cancel</button>
                        </div>
                    </div>
                </form>
			</div>
</div>
</div>