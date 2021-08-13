<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><a href="javascript:window.history.back();"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">
                            <a href="<?=base_url('dashboard');?>">Dashboard</a></span> - 
                            <a href="<?=base_url($this->uri->segment(2));?>"><?=ucfirst($this->uri->segment(2));?></a></h4>
						</div>

						
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="<?=base_url('dashboard');?>"><i class="icon-home2 position-left"></i> Home</a></li>
							<li class="active"><a href="<?=base_url($this->uri->segment(2));?>"><?=ucfirst($this->uri->segment(2));?></a></li>
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
										<h5 class="panel-title"><?=ucfirst($this->uri->segment(2));?></h5>
										<div class="heading-elements">
											<ul class="icons-list">
						                		<li><a data-action="collapse"></a></li>
						                		<li><a data-action="reload"></a></li>
						                		<li><a data-action="close"></a></li>
						                	</ul>
					                	</div>
									</div>

<div class="panel-body">
<?php echo form_open_multipart('secure/setting/configuration', array('class'=>'form-horizontal')); ?>
<?php echo $this->session->flashdata('msg'); ?>
	<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title">Update Setting</h5>
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
									<div class="col-md-6">
										<fieldset>
											<legend class="text-semibold"><i class="icon-gear position-left"></i> Main Setting</legend>
											<div class="form-group">
                                <label class="col-lg-3 control-label">Website Title</label>
												<div class="col-lg-9">
                                <input type="text" id="title" class="form-control" name="title" placeholder="Website Title" value="<?php echo $setting['title']; ?>" >
                                <span class="text-danger"><?php echo form_error('title'); ?></span>
								</div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Website Keyword</label>
												<div class="col-lg-9">
                                <textarea class="form-control" id="keyword" name="keyword" placeholder="Website Keyword"><?php echo $setting['keyword']; ?></textarea>
                                <span class="text-danger"><?php echo form_error('keyword'); ?></span>
                            </div></div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Website Description</label>
												<div class="col-lg-9">
                                <textarea class="form-control" name="description" placeholder="Website Description"><?php echo $setting['description']; ?></textarea>
                                 <span class="text-danger"><?php echo form_error('description'); ?></span>
                            </div></div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Analytics Code</label>
												<div class="col-lg-9">
                                <textarea class="form-control" name="analytics_code" placeholder="Analytics Code"><?php echo $setting['analytics_code']; ?></textarea>
                                 <span class="text-danger"><?php echo form_error('analytics_code'); ?></span>
                            </div></div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Address</label>
												<div class="col-lg-9">
                                <textarea class="form-control" name="address" placeholder="Address"><?php echo $setting['address']; ?></textarea>
                                 <span class="text-danger"><?php echo form_error('address'); ?></span>
                            </div></div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Site Name</label>
												<div class="col-lg-9">
                                <input type="text" class="form-control" name="site_name" placeholder="Site Name" value="<?php echo $setting['site_name']; ?>">
                                 <span class="text-danger"><?php echo form_error('site_name'); ?></span>
                            </div></div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Phone</label>
												<div class="col-lg-9">
                                <input type="text" class="form-control" name="phone" placeholder="Phone" value="<?php echo $setting['phone']; ?>">
                                 <span class="text-danger"><?php echo form_error('phone'); ?></span>
                            </div></div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Email</label>
												<div class="col-lg-9">
                                <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $setting['email']; ?>">
                                 <span class="text-danger"><?php echo form_error('email'); ?></span>
                            </div></div>
                            
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Website Url</label>
												<div class="col-lg-9">
                                <input type="text" class="form-control" name="site_url" placeholder="http://www.example.com/" value="<?php echo base_url();?>">
                                 <span class="text-danger"><?php echo form_error('site_url'); ?></span>
                            </div></div>
                            
                            <div class="form-group">
                            <label class="col-lg-3 control-label">Website Live Status</label>
												<div class="col-lg-9">
                                <select name="live_mode" class="form-control">
                        		<option value="0" <?php echo $setting['live_mode']==0?'Selected':'';?>>Offline</option>
                         		<option value="1" <?php echo $setting['live_mode']==1?'Selected':'';?>>Online</option>
                        </select>
                                 <span class="text-danger"><?php echo form_error('site_url'); ?></span>
                            </div></div>
                            <div class="form-group">
                            	<label class="col-lg-3 control-label">Logo</label>
												<div class="col-lg-9">
                                <input type="file" class="form-control" style="height:auto;" name="logo" id="logo" value="<?php echo $setting['logo']; ?>">
                                 <span class="text-danger"><?php echo form_error('logo'); ?></span>
                            </div>
                            <img id="image_upload_preview" src="" alt=""/>
                            <img src="<?php echo base_url(). 'uploads/logo/'. $setting['logo'] ;?>" style="height:50px;" alt=""/>
                                   <div class="form-group">
                            	<label class="col-lg-3 control-label">Favicon</label>
                                <div class="col-lg-9">
                                <input type="file" class="form-control" style="height:auto;" name="favicon" id="favicon" value="<?php echo $setting['favicon']; ?>">
                                 <span class="text-danger"><?php echo form_error('favicon'); ?></span>
                                 </div>
                            </div>
                            <img id="image_upload_preview" src="" alt=""/>
                            <img src="<?php echo base_url(). 'uploads/logo/'. $setting['favicon'] ;?>" style="height:50px;" alt=""/>
                            </div>
										</fieldset>
									</div>
								</div>

								<div class="text-right">
									<button type="submit" class="btn btn-primary">Update <i class="icon-arrow-right14 position-right"></i></button>
								</div>
							</div>
						</div>

<?php echo form_close(); ?>


</div>
                        
                        
	
</div></div>

</div>
