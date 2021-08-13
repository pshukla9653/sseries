<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><a href="javascript:window.history.back();"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">
                            <a href="<?=base_url('dashboard');?>">Dashboard</a></span> - 
                            <a href="<?=base_url($this->uri->segment(1));?>"><?=ucfirst($this->uri->segment(1));?></a></h4>
						</div>

						
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="<?=base_url('dashboard');?>"><i class="icon-home2 position-left"></i> Home</a></li>
							<li class="active"><a href="<?=base_url($this->uri->segment(1));?>"><?=ucfirst($this->uri->segment(1));?></a></li>
						</ul>

						
					</div>
				</div>
				<!-- /page header -->
<!-- Content area -->
				<div class="content">

					<!-- Horizontal form options -->
					<div class="row">
						

						<div class="col-md-6">

							<!-- Static mode -->
							<form class="form-horizontal" method="post" action="<?=base_url('secure/dashboard/changePassword');?>">
								<div class="panel panel-flat">
									<div class="panel-heading">
										<h5 class="panel-title">Change Password</h5>
										
									</div>

									<div class="panel-body">
										
<?php echo $this->session->flashdata('msg'); ?>
										<div class="form-group">
											<label class="col-lg-4 control-label">Current Password:</label>
											<div class="col-lg-8">
												<input type="password" class="form-control" name="current_password" value="<?php echo set_value('current_password'); ?>" autofocus/>
                                                <span class="text-danger"><?php echo form_error('current_password'); ?></span>
											</div>
										</div>
                                        <div class="form-group">
											<label class="col-lg-4 control-label">New Password:</label>
											<div class="col-lg-8">
												<input type="password" class="form-control" name="new_password" value="<?php echo set_value('new_password'); ?>"/>
                                                <span class="text-danger"><?php echo form_error('new_password'); ?></span>
											</div>
										</div>
                                        <div class="form-group">
											<label class="col-lg-4 control-label">Confirm Password:</label>
											<div class="col-lg-8">
												<input type="password" class="form-control" name="confirm_password" value="<?php echo set_value('confirm_password'); ?>"/>
                                                <span class="text-danger"><?php echo form_error('confirm_password'); ?></span>
											</div>
										</div>

									

										<div class="text-right">
											<button type="submit" class="btn btn-primary">Submit<i class="icon-arrow-right14 position-right"></i></button>
										</div>
									</div>
								</div>
							</form>
							<!-- /static mode -->

						</div>
					</div>
					<!-- /vertical form options -->



				</div>
				<!-- /content area -->