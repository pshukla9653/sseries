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

<?php echo form_open_multipart('secure/users/addstudent', array('class'=>'form-horizontal')); ?>

	<div class="panel panel-flat col-md-6">
							<div class="panel-heading">
								<h5 class="panel-title">Add Student</h5>
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
									<div class="col-md-12">
										
										<?php echo $this->session->flashdata('msg'); ?>
                                            <?php if($this->session->userdata('group_id')!='4' && $this->session->userdata('group_id')!='5'){?>
                                            
                                            <div class="form-group">
												<label class="col-lg-3 control-label">Coordinator:</label>
												<div class="col-lg-9">
													<select class="form-control" name="parent_id" id="parent_id">
                                                    <option value="">Select</option>
                                                    <?php foreach($coordinaterlist as $c){ ?>
                                                    <option value="<?=$c['id'];?>"><?=$c['name'];?></option>
                                                    <?php } ?>
                                                    </select>
                                                     <span class="text-danger"><?php echo form_error('parent_id');?></span>
                                                    
												</div>
											</div>
                                            <div class="form-group">
												<label class="col-lg-3 control-label">Executive:</label>
												<div class="col-lg-9">
													<select class="form-control" name="executive_id" id="executive_id">
                                                    <option value="0">Self</option>
                                                   
                                                    </select>
                                                     <span class="text-danger"><?php echo form_error('executive_id');?></span>
                                                    
												</div>
											</div>
                                            <?php }elseif($this->session->userdata('group_id')=='4'){?>
                                             <div class="form-group">
												<label class="col-lg-3 control-label">Executive:</label>
												<div class="col-lg-9">
													<select class="form-control" name="executive_id" id="executive_id">
                                                    <option value="0">Self</option>
                                                   <?php foreach($executiveist as $ex){?>
                                                   <option value="<?=$ex['id'];?>"><?=$ex['id'];?></option>
                                                   <?php }?>
                                                    </select>
                                                     <span class="text-danger"><?php echo form_error('executive_id');?></span>
                                                    
												</div>
											</div>
                                           <?php }?>
											<div class="form-group">
												<label class="col-lg-3 control-label">Student Name:</label>
												<div class="col-lg-9">
													<input type="text" class="form-control" placeholder="Full Name" name="name">
                                                    <span class="text-danger"><?php echo form_error('name');?></span>
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
												<label class="col-lg-3 control-label">Primary Mobile:</label>
												<div class="col-lg-9">
													<input type="number" placeholder="9999999999" class="form-control" name="mobile1" required>
                                                    <span class="text-danger"><?php echo form_error('mobile1');?></span>
												</div>
											</div>
											<div class="form-group">
												<label class="col-lg-3 control-label">Secondary Mobile:</label>
												<div class="col-lg-9">
													<input type="number" placeholder="9999999999" class="form-control" name="mobile2">
                                                    <span class="text-danger"><?php echo form_error('mobile2');?></span>
												</div>
											</div>

											
										
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
$('#parent_id').on('change',function(){
        var parent_id = $(this).val();
		var dataurl = '<?php echo base_url("secure/Users/getexcetiveList");?>';
        if(parent_id !=''){
			
            $.ajax({
                type:'POST',
                url:dataurl,
                data:'parent_id='+parent_id,
                success:function(html){
                  $('#executive_id').html(html);
                }
				
            }); 
        }else{
            $('#executive_id').html('<option>Select Coordinator</option>'); 
        }
    });
</script>	