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

<?php echo form_open_multipart('secure/Dashboard/student_profile', array('class'=>'form-horizontal')); ?>

	<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title">Update User</h5>
								
							</div>

							<div class="panel-body">
								<div class="row">
									<div class="col-md-6">
										<fieldset>
											<legend class="text-semibold"><i class="icon-reading position-left"></i> Personal details</legend>
											
											<div class="form-group">
												<label class="col-lg-3 control-label">Full Name:</label>
												<div class="col-lg-9">
													<input type="text" class="form-control" placeholder="Full Name" name="name" value="<?=$student['name'];?>">
                                                    <span class="text-danger"><?php echo form_error('name');?></span>
												</div>
											</div>

											<div class="form-group">
												<label class="col-lg-3 control-label">Father’s Name:</label>
												<div class="col-lg-9">
													<input type="text" class="form-control" placeholder="Father’s Name" name="father_name" value="<?=$studentProfile['father_name'];?>">
                                                    <span class="text-danger"><?php echo form_error('father_name');?></span>
												</div>
											</div>
                                            
                                            <div class="form-group">
												<label class="col-lg-3 control-label">Email:</label>
												<div class="col-lg-9">
													<input type="email" placeholder="example@domain.com" class="form-control" name="email" value="<?=$student['email'];?>">
                                                    <span class="text-danger"><?php echo form_error('email');?></span>
												</div>
											</div>
												<div class="form-group">
												<label class="col-lg-3 control-label">Mobile 1:</label>
												<div class="col-lg-9">
													<input type="text" placeholder="+91-99-9999-9999" class="form-control" name="mobile1" value="<?=$student['mobile_number'];?>" readonly>
                                                    <span class="text-danger"><?php echo form_error('mobile1');?></span>
												</div>
											</div>
                                            <div class="form-group">
												<label class="col-lg-3 control-label">Mobile 2:</label>
												<div class="col-lg-9">
													<input type="text" placeholder="+91-99-9999-9999" class="form-control" name="mobile2" value="<?=$studentProfile['mobile2'];?>">
                                                    <span class="text-danger"><?php echo form_error('mobile2');?></span>
												</div>
											</div>
											<div class="form-group">
											<label class="col-lg-3 control-label">Gender:</label>
											<div class="col-lg-9">
												<label class="radio-inline">
													<input type="radio" class="styled" name="gender" value="Male" <?=$studentProfile['gender']=='Male'?'checked':'';?>>
													Male
												</label>
												<label class="radio-inline">
													<input type="radio" class="styled" name="gender" value="Female" <?=$studentProfile['gender']=='Female'?'checked':'';?>>
													Female
												</label>
                                                <span class="text-danger"><?php echo form_error('gender');?></span>
											</div>
										</div>
                                        <div class="form-group">
											<label class="col-lg-3 control-label">Category:</label>
											<div class="col-lg-9">
												<label class="radio-inline">
													<input type="radio" class="styled" name="category" value="1" <?=$studentProfile['category']=='1'?'checked':'';?>/>
													GEN
												</label>
												<label class="radio-inline">
													<input type="radio" class="styled" name="category" value="2" <?=$studentProfile['category']=='2'?'checked':'';?>/>
													OBC
												</label>
                                                <label class="radio-inline">
													<input type="radio" class="styled" name="category" value="3" <?=$studentProfile['category']=='3'?'checked':'';?>/>
													SC
												</label>
                                                <label class="radio-inline">
													<input type="radio" class="styled" name="category" value="4" <?=$studentProfile['category']=='4'?'checked':'';?>/>
													ST
												</label>
                                                <span class="text-danger"><?php echo form_error('category');?></span>
											</div>
										</div>
											<div class="form-group">
												<label class="col-lg-3 control-label">Date of Birth:</label>
												<div class="col-lg-9">
													<input type="date" class="form-control" name="date_of_birth" value="<?=$studentProfile['date_of_birth'];?>">
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
                                            <?php if($studentProfile['profile_photo']){?>
                                            <img src="<?=base_url('uploads/profile/'.$studentProfile['profile_photo']);?>" width="100" height="100" alt="Profile Photo"/> 
                                            <?php }?>
											<div class="form-group">
												<label class="col-lg-3 control-label">Result of Entrance:</label>
												<div class="col-lg-9">
													<input type="file" class="file-styled" name="result">
												</div>
                                                <?php if($studentProfile['result']){?>
                                                <img src="<?=base_url('uploads/profile/'.$studentProfile['result']);?>" width="100" height="100" alt="Result of Entrance"/> 
                                                 <?php }?>
                                                 <span class="text-danger"><?php echo form_error('result');?></span>
											</div>
											
										</fieldset>
									</div>

									<div class="col-md-6">
										<fieldset>
						                	<legend class="text-semibold"><i class="icon-truck position-left"></i> Shipping details</legend>

											<div class="form-group">
												<label class="col-lg-3 control-label">Address:</label>
												<div class="col-lg-9">
													<textarea rows="5" cols="5" class="form-control" placeholder="Street Address" value="<?=$studentProfile['address'];?>"  name="address"><?=$studentProfile['address'];?></textarea>
												</div>
                                                <span class="text-danger"><?php echo form_error('address');?></span>
											</div>
                                           

											<div class="form-group">
												<label class="col-lg-3 control-label">Country:</label>
												<div class="col-lg-9">
													<select class="form-control" name="country_id" id="country_id">
                                                    <option value="">Select</option>
                                                    <?php foreach($countrieslist as $c){ ?>
                                                    <option value="<?=$c['country_id'];?>" <?=$studentProfile['country_id']==$c['country_id']?'selected':'';?>><?=$c['country_name'];?></option>
                                                    <?php } ?>
                                                    </select>
                                                    <span class="text-danger"><?php echo form_error('country_id');?></span>
												</div>
											</div>
                                            <div class="form-group">
												<label class="col-lg-3 control-label">State:</label>
												<div class="col-lg-9">
													<select class="form-control" name="state_id" id="state_id">
                                                    <option value="<?=$state['state_id'];?>"><?=$state['state_name'];?></option>
                                                    
                                                    </select>
                                                    <span class="text-danger"><?php echo form_error('state_id');?></span>
												</div>
											</div>
                                            <div class="form-group">
												<label class="col-lg-3 control-label">City:</label>
												<div class="col-lg-9">
													<select class="form-control" name="city_id" id="city_id">
                                                   <option value="<?=$city['city_id'];?>"><?=$city['city_name'];?></option>
                                                    
                                                    </select>
                                                    <span class="text-danger"><?php echo form_error('city_id');?></span>
												</div>
											</div>
                                            <div class="form-group">
												<label class="col-lg-3 control-label">PIN Code:</label>
												<div class="col-lg-9">
													<input type="text" placeholder="000000" class="form-control" name="pin_code" value="<?=$studentProfile['pin_code'];?>">
                                                    <span class="text-danger"><?php echo form_error('pin_code');?></span>
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
</div>
