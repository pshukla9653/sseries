
<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><a href="javascript:window.history.back();"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">
                            <a href="<?=base_url('dashboard');?>">Dashboard</a></span> - 
                            <a href="#">Add Student</a></h4>
						</div>

						
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="<?=base_url('dashboard');?>"><i class="icon-home2 position-left"></i> Home</a></li>
							<li class="active"><a href="#">Add Student</a></li>
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
									<div class="col-md-3">
										<fieldset>
											<legend class="text-semibold"> Add Student Record</legend>
                                            <?php echo form_open_multipart('secure/abroad/addstudent', array('class'=>'form-horizontal')); ?>
                               <?php echo $this->session->flashdata('msg'); ?>            
                                  <div class="form-group">
                                <label class="col-lg-3 control-label">Country</label>
								<div class="col-lg-9">
                                <select name="country_id" id="country_id" class="form-control"  required>
                                <option value="">Select</option>
                                <?php foreach($countryList as $c){?>
                                <option value="<?=$c['id'];?>"><?=$c['country_name'];?></option>
                                <?php }?>
                                </select>
                                <span class="text-danger"><?php echo form_error('country_name'); ?></span>
								</div>
                            </div>         
								<div class="form-group">
                                <label class="col-lg-3 control-label">Student Name</label>
								<div class="col-lg-9">
                                <input type="text" id="student_name" class="form-control" name="student_name" placeholder="Student Name" value="<?php echo set_value('student_name'); ?>">
                                <input type="hidden" id="sub_id" class="form-control" name="sub_id" >
                                <span class="text-danger"><?php echo form_error('student_name'); ?></span>
								</div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Father`s Name</label>
								<div class="col-lg-9">
                                <input type="text" id="father_name" class="form-control" name="father_name" placeholder="Father`s Name" value="<?php echo set_value('father_name'); ?>">
                               
                                <span class="text-danger"><?php echo form_error('father_name'); ?></span>
								</div>
                            </div>
                             <div class="form-group">
                                <label class="col-lg-3 control-label">Email</label>
								<div class="col-lg-9">
                                <input type="text" id="email" class="form-control" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>">
                               
                                <span class="text-danger"><?php echo form_error('email'); ?></span>
								</div>
                            </div>
                             <div class="form-group">
                                <label class="col-lg-3 control-label">Contact No.</label>
								<div class="col-lg-9">
                                <input type="text" id="contact_no" class="form-control" name="contact_no" placeholder="Contact No." value="<?php echo set_value('contact_no'); ?>">
                               
                                <span class="text-danger"><?php echo form_error('contact_no'); ?></span>
								</div>
                            </div>
                             <div class="form-group">
                                <label class="col-lg-3 control-label">Passport no.</label>
								<div class="col-lg-9">
                                <input type="text" id="pp_no" class="form-control" name="pp_no" placeholder="Passport no." value="<?php echo set_value('pp_no'); ?>">
                               
                                <span class="text-danger"><?php echo form_error('pp_no'); ?></span>
								</div>
                            </div>
                             <div class="form-group">
                                <label class="col-lg-3 control-label">Total Fee</label>
								<div class="col-lg-9">
                                <input type="text" id="total_fee" class="form-control" name="total_fee" placeholder="Total Fee" value="<?php echo set_value('total_fee'); ?>">
                               
                                <span class="text-danger"><?php echo form_error('total_fee'); ?></span>
								</div>
                            </div>
                             <div class="form-group">
                                <label class="col-lg-3 control-label">Address</label>
								<div class="col-lg-9">
                                
                                <textarea class="form-control" name="address"></textarea>
                               
                                <span class="text-danger"><?php echo form_error('address'); ?></span>
								</div>
                            </div>
                            <div class="form-group">
												<label class="col-lg-3 control-label">Status:</label>
												<div class="col-lg-9">
													<select class="form-control" name="status" id="status">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                    </select>
                                                    <span class="text-danger"><?=form_error('status');?></span>
												</div>
											</div>
                            
                            
                            <div class="text-right">
									<input type="submit" class="btn btn-primary" name="btn" value="Submit" id="bt">
								</div>
                                <?php echo form_close(); ?>
                            
                           
										</fieldset>
									</div>
                                    <div class="col-md-9">
										<fieldset>
						                	<legend class="text-semibold"> Student List</legend>
											<table class="table datatable-basic">
                      <thead>
                      <th>id</th>
                      <th>Country Name</th>
                      <th>Student Name</th>
                      <th>Passport no.</th>
                      <th>Reference no.</th>
                      <th>Total Fee</th>
                      <th>Paid Fee</th>
                      <th>Due Fee</th>
                      <th>Payment Status</th>
                      <th>Father`s Name</th>
                      <th>Email</th>
                      <th>Contact No.</th>
                    <th>Address</th>
                      <th>Status</th>
                      <th>Action</th>
                      </thead>
                                        <tbody>
                                    <?php foreach($getmode as $item) { ?>
                                    <tr>
                                    	<td><?php echo $item['id']; ?></td>
                                        <td><?php echo $item['country_name']; ?></td>
                                        <td><?php echo $item['student_name']; ?></td>
                                        <td><?php echo $item['pp_no']; ?></td>
                                        <td><?php echo $item['referance_no']; ?></td>
                                        <td><?php echo $item['total_fee']; ?></td>
                                         <td><?php echo $item['paid_fee']; ?></td>
                                         <td><?php echo $item['due_fee']; ?></td>
                                         <td><?php $payment= array(0=>'<span class="btn btn-danger">Unpaid</span>',
										 1=>'<span class="btn btn-info">Partially paid</span>',
										 2=>'<span class="btn btn-success">Fully Paid</span>'); echo $payment[$item['payment_status']]; ?></td>
                                         <td><?php echo $item['father_name']; ?></td>
                                         <td><?php echo $item['email']; ?></td>
                                          <td><?php echo $item['contact_no']; ?></td>
                                          <td><?php echo $item['address']; ?></td>
                                        
                                        <td><?php echo ($item['status'] == 1) ? '<span class="btn btn-success">Active</span>':'<span class="btn btn-danger">Inactive</span>'; ?></td>
                                        <td>
                                        <?php if($item['payment_status'] != '2'){ ?>
                                       <a  class="text-success" href="<?=base_url('secure/abroad/recordPayment/'.$item['id']);?>"> Record Payment </a>
                                       <?php }?>
                                       <?php if($item['payment_status'] == '0'){ ?>
                                        | <a  class="text-info" onClick="editExpenses('<?php echo $item['id']; ?>')">Edit</a>
                                        <?php }?>
        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                    </table>
										</fieldset>
									</div>
								</div>

								
							</div>
						</div>

</div>

</div>
<script type="text/javascript"> 
		
		
		function editExpenses(getId){
				$.ajax({
							type:'POST',
							url:'<?php echo base_url('secure/abroad/getstudentDetail');?>',
							data:'getId='+getId,
							dataType:'json',
							success:function(response){
								//console.log(response);
								$('#student_name').val(response.founddata.student_name);
								$('#father_name').val(response.founddata.father_name);
								$('#email').val(response.founddata.email);
								$('#contact_no').val(response.founddata.contact_no);
								$('#pp_no').val(response.founddata.pp_no);
								$('#total_fee').val(response.founddata.total_fee);
								$('#address').val(response.founddata.address);
								$('#sub_id').val(response.founddata.id);
								$('#bt').val('Update');
								$("#status option").each(function(){
									 if($(this).val() === response.founddata.status){
										$(this).prop('selected', true);
									 }	 
								});
								$("#country_id option").each(function(){
									 if($(this).val() === response.founddata.country_id){
										$(this).prop('selected', true);
									 }	 
								});
							}
					}); 
		}
		
		
</script>