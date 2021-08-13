
<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><a href="javascript:window.history.back();"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">
                            <a href="<?=base_url('dashboard');?>">Dashboard</a></span> - 
                            <a href="#">Update Expense</a></h4>
						</div>

						
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="<?=base_url('dashboard');?>"><i class="icon-home2 position-left"></i> Home</a></li>
							<li class="active"><a href="#">Update Expense</a></li>
						</ul>

						
					</div>
				</div>
				<!-- /page header -->
<!-- Content area -->
				<div class="content">

					<!-- Horizontal form options -->
					<div class="row">
<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title"></h5>
								<div class="heading-elements">
									<ul class="icons-list">
				                		<li><a data-action="collapse"></a></li>
				                		<li><a data-action="reload"></a></li>
				                		<li><a data-action="close"></a></li>
				                	</ul>
			                	</div>
							</div>

							<div class="panel-body">
								<div class="row">
                                <fieldset>
											<legend class="text-semibold"> Update Expense</legend>
                                  <?php echo form_open_multipart('secure/expenses/editExpenses/'.$expense['id'], array('class'=>'form-horizontal')); ?>
                               <?php echo $this->session->flashdata('msg'); ?>              
									<div class="col-md-6">
										
                                     
                                  <div class="form-group">
                                <label class="col-lg-3 control-label">Expense Head</label>
								<div class="col-lg-9">
                                <select name="category_id" id="category_id" class="form-control"  required>
                                <option value="">Select</option>
                                <?php foreach($categoryList as $c){?>
                                <option value="<?=$c['id'];?>" <?php echo $c['id']==$expense['category_id']?'selected':'';?>><?=$c['category_name'];?></option>
                                <?php }?>
                                </select>
                                <span class="text-danger"><?php echo form_error('category_id'); ?></span>
								</div>
                            </div>         
								<div class="form-group">
                                <label class="col-lg-3 control-label">Full Name</label>
								<div class="col-lg-9">
                                <input type="text" id="full_name" class="form-control" name="full_name" placeholder="Full Name" value="<?php echo $expense['full_name']; ?>">
                                
                                <span class="text-danger"><?php echo form_error('full_name'); ?></span>
								</div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Voucher Date</label>
								<div class="col-lg-9">
                                <input type="date" class="form-control" name="voucher_date" value="<?php echo $expense['voucher_date']; ?>">
                               
                                <span class="text-danger"><?php echo form_error('voucher_date'); ?></span>
								</div>
                            </div>
                             
                             <div class="form-group">
												<label class="col-lg-3 control-label">Status:</label>
												<div class="col-lg-9">
													<select class="form-control" name="status" id="status">
                                                    <option value="1" <?php echo $expense['category_id']=='1'?'selected':'';?>>Active</option>
                                                    <option value="0" <?php echo $expense['category_id']=='0'?'selected':'';?>>Inactive</option>
                                                    </select>
                                                    <span class="text-danger"><?=form_error('status');?></span>
												</div>
											</div>
                             
                         
                            
                                
                            
                           
										
									</div>
                                    <div class="col-md-6">
                             <div class="form-group">
                                <label class="col-lg-3 control-label">Amount</label>
								<div class="col-lg-9">
    <input type="number" id="voucher_date" class="form-control" name="amount" placeholder="Amount" value="<?php echo $expense['amount']; ?>">
                               
                                <span class="text-danger"><?php echo form_error('amount'); ?></span>
								</div>
                            </div>
                             <div class="form-group">
                                <label class="col-lg-3 control-label">Description</label>
								<div class="col-lg-9">
                                
                                <textarea class="form-control" name="description"><?php echo $expense['description']; ?></textarea>
                                <span class="text-danger"><?php echo form_error('description'); ?></span>
								</div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Attach Voucher</label>
								<div class="col-lg-9">
                                <input type="file"  class="form-control" name="voucher"/>
                               
                                <span class="text-danger"><?php echo form_error('voucher'); ?></span>
								</div>
                            </div>
                            
                             <div class="form-group">
                                <label class="col-lg-3 control-label">Authorized Signatory</label>
								<div class="col-lg-9">
                                <input type="text" class="form-control" name="authorized_signatory" placeholder="Name" value="<?php echo $expense['authorized_signatory']; ?>">
                               
                                <span class="text-danger"><?php echo form_error('authorized_signatory'); ?></span>
								</div>
                            </div>
                            <div class="text-right">
									<input type="submit" class="btn btn-primary" name="btn" value="Update" id="bt">
								</div>
                                
                            
                           
										
									</div>
                                    <?php echo form_close(); ?>
                                    </fieldset>
								</div>

								
							</div>
						</div>

</div>

</div>
