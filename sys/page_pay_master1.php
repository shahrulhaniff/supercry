
<div class="block full">
<div class="block-title">
<h2>REPORT</h2>
</div>
<div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 150px;">Date</th>
                        <th>Member Id</th>
                        <th>Full Name</th>
                        <th>Bank Type</th>
                        <th>Holder Name</th>
                        <th>Account Number</th>
                        <th>Phone Number</th>
                        <th>Amount</th>
                        <th>Payment Status</th>
                        <!--<th class="text-center" style="width: 75px;"><i class="fa fa-flash"></i></th>-->
                    </tr>
                </thead>
                <tbody>
                    <?php 
					$data = mysqli_query($conn,"SELECT * FROM wd W,affiliate A, userpro U  WHERE A.lp_master='$_SESSION[USER]' AND W.id=A.aff_id AND U.id=A.aff_id AND W.created_date LIKE '$paydate%'") or die(mysqli_error($conn));
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
                        <td><?=$jenisb?></td>
                        <td><?=$penama?></td>
                        <td><?=$akaunb?></td>
                        <td><?=$phone?></td>
                        <td><?=$amount?></td>
                        <td>
						
						<?php 
						if(($stat=="Processing")||($stat=="Processing_Token")){  
						if($walletc<$amount){ $disabled="disabled"; }
						if($walletc>=$amount){ $disabled=null; }
						?>
						  <form action='update_page_paymaster.php' method='POST'>
							<input type='hidden' name='sn' value='<?=$sn?>'>
							<input type='hidden' name='walletc' value='<?=$walletc?>'>
<input type='hidden' name='amount' value='<?=$amount?>'>
<input type='hidden' name='id' value='<?=$id?>'>
<input type='hidden' name='stat' value='<?=$stat?>'>
							<?=$stat?> &nbsp; <button type="submit" title="Paymaster" class="btn btn-effect-ripple btn-xs btn-danger <?=$disabled?>">Pay &nbsp;<i class="fa fa-cc-discover"></i></button>
						  </form>
						<?php } 
						else {
							?><?=$stat?> &nbsp; <button title="Paymaster Completed" class="btn btn-effect-ripple btn-xs btn-success">Completed &nbsp; <i class="gi gi-ok_2"></i></button><?php
							if($stat=="Completed_Token"){
							    ?><button title="Pay Token Paid" class="btn btn-effect-ripple btn-xs btn-warning"><i class="gi gi-coins"></i></button><?php
							}
						}
						?>
						</td>
                        <!--<td class="text-center">
                            <a href="javascript:void(0)" data-toggle="tooltip" title="Edit User" class="btn btn-effect-ripple btn-xs btn-success"><i class="fa fa-pencil"></i></a>
                            <a href="javascript:void(0)" data-toggle="tooltip" title="Delete User" class="btn btn-effect-ripple btn-xs btn-danger"><i class="fa fa-times"></i></a>
                        </td> -->
                    </tr>
                    <?php 
					}
					?>
                </tbody>
            </table>
        </div>
</div>
