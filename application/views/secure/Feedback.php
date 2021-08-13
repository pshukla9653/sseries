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
							<form class="form-horizontal" action="<?=base_url('secure/dashboard/feedback');?>" method="post">
								<div class="panel panel-flat">
									<div class="panel-heading">
										<h5 class="panel-title">Feedback/Complaint</h5>
										
									</div>

									<div class="panel-body">
										
									<?php echo $this->session->flashdata('msg'); ?>  

										<div class="form-group">
											<label class="col-lg-3 control-label">Type:</label>
											<div class="col-lg-9">
												<select class="form-control" name="type">
														<option value="">Select</option>
														<option value="1">Feedback</option>
														<option value="2">Complaint</option>
													
												</select>
                                                <?php echo form_error('type', '<p class="class alert-danger">', '</p>'); ?>
											</div>
										</div>
											<div class="form-group">
											<label class="col-lg-3 control-label">Subject:</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="subject"/>
                                                <?php echo form_error('subject', '<p class="class alert-danger">', '</p>'); ?>
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-3 control-label">Your message:</label>
											<div class="col-lg-9">
												
                                                <textarea class="form-control" name="message"></textarea>
                                                <?php echo form_error('message', '<p class="class alert-danger">', '</p>'); ?>
													
												
											</div>
										</div>

										<div class="text-right">
											<button type="submit" class="btn btn-primary">Submit</button>
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