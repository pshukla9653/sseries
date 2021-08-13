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

<?php echo form_open_multipart('secure/users/add', array('class'=>'form-horizontal')); ?>

	<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title">Add User</h5>
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
											<legend class="text-semibold"><i class="icon-reading position-left"></i> Personal details</legend>
											<div class="form-group">
												<label class="col-lg-3 control-label">User Group:</label>
												<div class="col-lg-9">
													<select class="form-control" name="group_id" id="group_id">
                                                    <option value="">Select</option>
                                                    <?php foreach($grouplist as $g){ ?>
                                                    <option value="<?=$g['id'];?>"><?=$g['group_title'];?></option>
                                                    <?php } ?>
                                                    </select>
                                                    <span class="text-danger"><?php echo form_error('group_id');?></span>
												</div>
											</div>
                                            <?php if($this->session->userdata('group_id')!='4'){?>
                                            <div id="parent_id" style="display:none;">
                                            <div class="form-group">
												<label class="col-lg-3 control-label">Coordinator:</label>
												<div class="col-lg-9">
													<select class="form-control" name="parent_id">
                                                    <option value="">Select</option>
                                                    <?php foreach($coordinaterlist as $c){ ?>
                                                    <option value="<?=$c['id'];?>"><?=$c['name'];?></option>
                                                    <?php } ?>
                                                    </select>
                                                    
												</div>
											</div>
                                            <div class="form-group">
												<label class="col-lg-3 control-label">Commission (In Rupee):</label>
												<div class="col-lg-9">
													<input type="text" class="form-control" placeholder="Commission (In Rupee)" name="commission">
                                                   
												</div>
											</div>
                                            </div>
                                            <?php }?>
                                             <span class="text-danger"><?php echo form_error('commission');?></span>
                                            <span class="text-danger"><?php echo form_error('parent_id');?></span>
											<div class="form-group">
												<label class="col-lg-3 control-label">Enter Full Name:</label>
												<div class="col-lg-9">
													<input type="text" class="form-control" placeholder="Full Name" name="name">
                                                    <span class="text-danger"><?php echo form_error('name');?></span>
												</div>
											</div>

											<div class="form-group">
												<label class="col-lg-3 control-label">Enter Username:</label>
												<div class="col-lg-9">
													<input type="text" class="form-control" placeholder="Username" name="username">
                                                    <span class="text-danger"><?php echo form_error('username');?></span>
												</div>
											</div>
                                            <div class="form-group">
												<label class="col-lg-3 control-label">Enter Password:</label>
												<div class="col-lg-9">
													<input type="text" class="form-control" placeholder="********" name="password">
                                                    <span class="text-danger"><?php echo form_error('password');?></span>
												</div>
											</div>
                                            <div class="form-group">
												<label class="col-lg-3 control-label">Email:</label>
												<div class="col-lg-9">
													<input type="email" placeholder="example@domain.com" class="form-control" name="email">
                                                    <span class="text-danger"><?php echo form_error('email');?></span>
												</div>
											</div>
												<div class="form-group">
												<label class="col-lg-3 control-label">Mobile:</label>
												<div class="col-lg-9">
													<input type="text" placeholder="9999999999" class="form-control" name="mobile">
                                                    <span class="text-danger"><?php echo form_error('mobile');?></span>
												</div>
											</div>
											<div class="form-group">
											<label class="col-lg-3 control-label">Gender:</label>
											<div class="col-lg-9">
												<label class="radio-inline">
													<input type="radio" class="styled" name="gender" checked="checked" value="Male">
													Male
												</label>
												<label class="radio-inline">
													<input type="radio" class="styled" name="gender" value="Female">
													Female
												</label>
                                                <span class="text-danger"><?php echo form_error('gender');?></span>
											</div>
										</div>
											<div class="form-group">
												<label class="col-lg-3 control-label">Date of Birth:</label>
												<div class="col-lg-9">
													<input type="date" class="form-control" name="date_of_birth">
                                                    <span class="text-danger"><?php echo form_error('date_of_birth');?></span>
												</div>
											</div>
											<div class="form-group">
												<label class="col-lg-3 control-label">Profile Picture:</label>
												<div class="col-lg-9">
													<input type="file" class="file-styled" name="profile_photo">
												</div>
                                                 <span class="text-danger"><?php echo form_error('profile_photo');?></span>
											</div>

											
										</fieldset>
									</div>

									<div class="col-md-6">
										<fieldset>
						                	<legend class="text-semibold"><i class="icon-truck position-left"></i> Correspondence Address</legend>

											<div class="form-group">
												<label class="col-lg-3 control-label">Address:</label>
												<div class="col-lg-9">
													<textarea rows="5" cols="5" class="form-control" placeholder="Street Address"  name="address"></textarea>
												</div>
                                                <span class="text-danger"><?php echo form_error('address');?></span>
											</div>
                                           

											<div class="form-group">
												<label class="col-lg-3 control-label">Country:</label>
												<div class="col-lg-9">
													<select class="form-control" name="country_id" id="country_id">
                                                    <option value="">Select</option>
                                                    <?php foreach($countrieslist as $c){ ?>
                                                    <option value="<?=$c['country_id'];?>"><?=$c['country_name'];?></option>
                                                    <?php } ?>
                                                    </select>
                                                    <span class="text-danger"><?php echo form_error('country_id');?></span>
												</div>
											</div>
                                            <div class="form-group">
												<label class="col-lg-3 control-label">State:</label>
												<div class="col-lg-9">
													<select class="form-control" name="state_id" id="state_id">
                                                    
                                                    
                                                    </select>
                                                    <span class="text-danger"><?php echo form_error('state_id');?></span>
												</div>
											</div>
                                            <div class="form-group">
												<label class="col-lg-3 control-label">City:</label>
												<div class="col-lg-9">
													<select class="form-control" name="city_id" id="city_id">
                                                   
                                                    
                                                    </select>
                                                    <span class="text-danger"><?php echo form_error('city_id');?></span>
												</div>
											</div>
                                            <div class="form-group">
												<label class="col-lg-3 control-label">PIN Code:</label>
												<div class="col-lg-9">
													<input type="text" placeholder="000000" class="form-control" name="zip_code">
                                                    <span class="text-danger"><?php echo form_error('zip_code');?></span>
												</div>
											</div>
                                            <div class="form-group">
												<label class="col-lg-3 control-label">Status:</label>
												<div class="col-lg-9">
													<select class="form-control" name="status">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                    </select>
                                                    <span class="text-danger"><?php echo form_error('status');?></span>
												</div>
											</div>
										</fieldset>
									</div>
								</div>

								<div class="text-right">
									<button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
								</div>
							</div>
						</div>

<?php echo form_close(); ?>

</div>
</div>
<script>
$('#group_id').on('change',function(){
        var country_id = $(this).val();
		//alert(country_id	);
        if(country_id == 5){
			$('#parent_id').show(1000);
            
        }else{
            $('#parent_id').hide(1000);
        }
    });
</script>	