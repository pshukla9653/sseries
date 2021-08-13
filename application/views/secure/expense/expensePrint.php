<div class="content">

					<!-- Invoice template -->
					<div class="panel panel-white">
						<div class="panel-heading">
							<h6 class="panel-title">Payment Voucher</h6>
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
										 
                                     <div class="content-group">
									
                                    <table class="table">
                                    <tr>
                                    <td>Reference No:</td>
                                    <td><strong><?=$expense['referance_no'];?></strong></td>
                                    <td>Date:</td>
                                    <td> <strong><?php echo date_format(date_create($expense['voucher_date']),"d-m-Y"); ?></strong></td>
                                    </tr>
                                    <tr>
                                    <td>Expense Head:</td>
                                    <td><strong><?=$category['category_name'];?></strong></td>
                                    <td>Amount: </td>
                                    <td><strong><?=$expense['amount'];?></strong></td>
                                    </tr>
                                    <tr>
                                    <td>Description</td>
                                    <td colspan="3"><strong><?=$expense['description'];?></strong></td>
                                    
                                    </tr>
                                    
                                    <tr>
                                   
                                    <td colspan="4" style="text-align:right;"><strong></strong></td>
                                    
                                    </tr>
                                    <tr>
                                   
                                    <td colspan="4" style="text-align:right;"><strong></strong></td>
                                    
                                    </tr>
                                    <tr>
                                   
                                    <td colspan="4" style="text-align:right;"><strong><?=$expense['authorized_signatory'];?><br>(Authorized Signatory)</strong></td>
                                    
                                    </tr>
                                    </table>
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