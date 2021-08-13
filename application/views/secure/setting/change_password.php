<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><a href="javascript:window.history.back();"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">
                            <a href="<?=base_url('dashboard');?>">Dashboard</a></span> - 
                            <a href="<?=base_url($this->uri->segment(2));?>"><?=ucfirst($this->uri->segment(2));?></a>-
                            <a href="<?=base_url($this->uri->segment(3));?>"><?=str_replace('_', ' ', ucfirst($this->uri->segment(3)));?></a></h4>
						</div>

						
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="<?=base_url('dashboard');?>"><i class="icon-home2 position-left"></i> Home</a></li>
							
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
										<h5 class="panel-title">Change Password</h5>
										<div class="heading-elements">
											<ul class="icons-list">
						                		<li><a data-action="collapse"></a></li>
						                		<li><a data-action="reload"></a></li>
						                		<li><a data-action="close"></a></li>
						                	</ul>
					                	</div>
									</div>

<div class="panel-body">
<?php echo form_open_multipart('secure/setting/change_password', array('class'=>'form-horizontal')); ?>
<?php echo $this->session->flashdata('msg'); ?>
	<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title"><i class="icon-gear position-left"></i> Change Password</h5>
								<div class="heading-elements">
									<ul class="icons-list">
				                		<li><a data-action="collapse"></a></li>
				                		<li><a data-action="reload"></a></li>
				                		<li><a data-action="close"></a></li>
				                	</ul>
			                	</div>
							</div>

							<div class="panel-body">
                            <?php //var_dump($user_profile);?>
								<div class="row">
                                <strong>
											<legend class="text-semibold"></legend></strong>
									<div class="col-md-6">
								 <div class="form-group">
                                <label class="col-lg-3 control-label">Old Password</label>
								<div class="col-lg-9">
                                <input type="password" class="form-control" name="old_pass" placeholder="Old Password">
                                <span class="text-danger"><?php echo form_error('old_pass'); ?></span>
								</div>
                            </div>		
								<div class="form-group">
                                <label class="col-lg-3 control-label">New Password</label>
								<div class="col-lg-9">
                                <input type="password" class="form-control" name="new_pass" placeholder="New Password">
                                <span class="text-danger"><?php echo form_error('new_pass'); ?></span>
								</div>
                            </div>
                           <div class="form-group">
                                <label class="col-lg-3 control-label">Confirm Password</label>
								<div class="col-lg-9">
                                <input type="password" class="form-control" name="con_pass" placeholder="Confirm Password">
                                <span class="text-danger"><?php echo form_error('con_pass'); ?></span>
								</div>
                            </div>
                           
                             <div class="text-right">
									<button type="submit" class="btn btn-primary">Update <i class="icon-arrow-right14 position-right"></i></button>
								</div>
                            
                           
										</fieldset>
									</div>
                                    
								</div>

								
							</div>
						</div>

<?php echo form_close(); ?>


</div>
                        
                        
	
</div></div>

</div>
