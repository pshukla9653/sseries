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
<?php echo form_open('secure/menu/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
                                <label for="title">Website Title</label>
                                <input type="text" id="title" class="form-control" name="title" placeholder="Website Title" value="<?php echo $setting[0]['title']; ?>" >
                                <span class="text-danger"><?php echo form_error('title'); ?></span>
                            </div>
                            <div class="form-group">
                                <label for="keyword">Website Keyword</label>
                                <textarea class="form-control" id="keyword" name="keyword" placeholder="Website Keyword"><?php echo $setting[0]['keyword']; ?></textarea>
                                <span class="text-danger"><?php echo form_error('keyword'); ?></span>
                            </div>
                            <div class="form-group">
                                <label>Website Description</label>
                                <textarea class="form-control" name="description" placeholder="Website Description"><?php echo $setting[0]['description']; ?></textarea>
                                 <span class="text-danger"><?php echo form_error('description'); ?></span>
                            </div>
                            <div class="form-group">
                                <label>Analytics Code</label>
                                <textarea class="form-control" name="analytics_code" placeholder="Analytics Code"><?php echo $setting[0]['analytics_code']; ?></textarea>
                                 <span class="text-danger"><?php echo form_error('analytics_code'); ?></span>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" name="address" placeholder="Address"><?php echo $setting[0]['address']; ?></textarea>
                                 <span class="text-danger"><?php echo form_error('address'); ?></span>
                            </div>
                            <div class="form-group">
                                <label>Site Name</label>
                                <input type="text" class="form-control" name="site_name" placeholder="Site Name" value="<?php echo $setting[0]['site_name']; ?>">
                                 <span class="text-danger"><?php echo form_error('site_name'); ?></span>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" class="form-control" name="phone" placeholder="Phone" value="<?php echo $setting[0]['phone']; ?>">
                                 <span class="text-danger"><?php echo form_error('phone'); ?></span>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $setting[0]['email']; ?>">
                                 <span class="text-danger"><?php echo form_error('email'); ?></span>
                            </div>
                            
                            <div class="form-group">
                                <label>Website Url</label>
                                <input type="text" class="form-control" name="site_url" placeholder="http://www.example.com/" value="<?php echo base_url();?>">
                                 <span class="text-danger"><?php echo form_error('site_url'); ?></span>
                            </div>
                            
                            <div class="form-group">
                            <label>Website Live Status</label>
                                <select name="live_mode" class="form-control">
                        		<option value="0" <?php echo $setting[0]['live_mode']==0?'Selected':'';?>>Offline</option>
                         		<option value="1" <?php echo $setting[0]['live_mode']==1?'Selected':'';?>>Online</option>
                        </select>
                                 <span class="text-danger"><?php echo form_error('site_url'); ?></span>
                            </div>
                            <div class="form-group">
                            	<label>Logo</label>
                                <input type="file" class="form-control" style="height:auto;" name="logo" id="logo" value="<?php echo $setting[0]['logo']; ?>">
                                 <span class="text-danger"><?php echo form_error('logo'); ?></span>
                            </div>
                            <img id="image_upload_preview" src="" alt=""/>
                            <img src="<?php echo base_url(). 'assets/backend/images/'. $setting[0]['logo'] ;?>" style="height:50px;" alt=""/>
                                   <div class="form-group">
                            	<label>Banner</label>
                                <input type="file" class="form-control" style="height:auto;" name="banner" id="banner" value="<?php echo $setting[0]['banner']; ?>">
                                 <span class="text-danger"><?php echo form_error('banner'); ?></span>
                            </div>
                            <img id="image_upload_preview" src="" alt=""/>
                            <img src="<?php echo base_url(). 'assets/backend/images/'. $setting[0]['banner'] ;?>" style="height:50px;" alt=""/>
                        </div>
                        
                        
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>
</div></div>

</div>
</div>