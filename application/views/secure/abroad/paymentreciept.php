<div class="content">

					<!-- Invoice template -->
					<div class="panel panel-white">
						<div class="panel-heading">
							<h6 class="panel-title">Payment Receipt</h6>
							<div class="heading-elements">
								
								<button type="button" class="btn btn-default btn-xs heading-btn" onClick="window.print()"><i class="icon-printer position-left"></i> Print</button>
		                	</div>
						</div>

						<div class="panel-body no-padding-bottom">
							<div class="row">
                            <div class="col-sm-12">
								<center><img src="<?=base_url('uploads/logo/'.$sitedata['logo']);?>" class="content-group mt-10" alt="" style="width: 120px;">
									<h4><?=$sitedata['title'];?></h4>
                                    <?=$sitedata['address'];?><br>
                                    <?=$sitedata['phone'];?>, <?=$sitedata['email'];?><br>
								</center>
							</div>

							
						</div>

						

						<div class="panel-body">
							<div class="row invoice-payment">
								<div class="col-sm-12">
										Reference No: <strong><?=$paymentdata['referance_no'];?></strong><br><br>
										Receipt No: <strong><?=$record_list['referance_no'];?></strong><br><br>
                                         Date:  <strong><?php echo date_format(date_create($record_list['payment_date']),"d-m-Y"); ?></strong><br><br><br>
                                         <div class="content-group">
Received from Mr. <strong><?=$paymentdata['student_name'];?></strong> S/o./D/o <strong><?=$paymentdata['father_name'];?></strong>
Address <strong><?=$paymentdata['address'];?></strong> Contact No <strong><?=$paymentdata['contact_no'];?></strong> Email Id <strong><?=$paymentdata['email'];?></strong>
The sum of Rs <strong><?=$record_list['amount_received'];?></strong> (<?php echo $amount_in_words;?>)

									</div>
								</div>

							
							</div>
						</div>
							<h6>Note:</h6>
							<p class="text-muted">This is a system generated receipt no signature is required</p>
						</div>
					</div>
					<!-- /invoice template -->
</div>