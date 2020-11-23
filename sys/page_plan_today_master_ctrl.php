<form id="form-validation" action="update_plan.php" method="post" class="form-horizontal form-bordered">
                    <div class="form-group">
                        <label class="col-md-3 control-label" >PLAN NAME</label>
                        <div class="col-md-6">
                            <input type="text" value="<?=$ary_planname?>" name="planname" class="form-control" required>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-md-3 control-label" >PLAN ROI</label>
                        <div class="col-md-6">
                            <input type="number" value="<?=$ary_planroi?>" name="planroi" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="amount">MINIMUM INVEST <span class="text-danger">*</span></label>
                        <div class="col-md-6">
							<input type="number" id="amount" name="mininv" class="form-control floatNumberField" value="<?=$ary_mininv?>" min="1" name="MI" step="0.01" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="amount">PLAN DAYS <span class="text-danger">*</span></label>
                        <div class="col-md-6">
							<input type="number" value="<?=$ary_planday?>" min="1" name="planday" class="form-control" autocomplete="off" required>
                        </div>
                    </div>
					
                   <div class="form-group form-actions">
                        <div class="col-xs-6 text-right">
                            <input type="submit" class="btn btn-effect-ripple btn-primary" value="Update">
                            <button  onclick="hidenshow" type="reset" class="btn btn-effect-ripple btn-danger">Cancel</button>
                        </div>
                    </div>
                </form>

							
							
							
							
			