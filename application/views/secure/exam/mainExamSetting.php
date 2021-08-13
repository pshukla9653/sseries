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
									<div class="col-md-4">
										<fieldset>
						<legend class="text-semibold"> Main Exam setting</legend>
                         <?php echo form_open_multipart('secure/exam/Setting', array('class'=>'form-horizontal')); ?>
                               <?php echo $this->session->flashdata('msg'); ?>            
                             <div class="form-group">
                                <label class="col-lg-3 control-label">Exam</label>
                                <div class="col-lg-9">
                               <select name="exam_id" class="form-control" id="exam_id">
                               <option value="">Select</option>
                               <?php foreach($examlist as $exam):?>
                               <option value="<?=$exam['id'];?>" <?=set_select('exam_id',$exam['id']);?>><?=$exam['exam_name'];?></option>
                               <?php endforeach;?>
                               </select> 
                               <span class="text-danger"><?php echo form_error('exam_id'); ?></span>
                                </div>
                               </div>
                          
                                <div class="form-group">
                                <label class="col-lg-3 control-label">Class</label>
                                <div class="col-lg-9">
                               <select name="class_id" class="form-control" id="class_id">
                               <option value="">Select</option>
                               <?php foreach($classlist as $class):?>
                               <option value="<?=$class['id'];?>" <?=set_select('class_id',$class['id']);?>><?=$class['class_name'];?></option>
                               <?php endforeach;?>
                               </select> 
                               <span class="text-danger"><?php echo form_error('class_id'); ?></span>
                                </div>
                               
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Subject</label>
                                <div class="col-lg-9">
                               <select name="sub_id" class="form-control" id="sub_id">
                              
                               </select> 
                               <span class="text-danger"><?php echo form_error('sub_id'); ?></span>
                                </div>
                               
                            </div>   
							<div class="form-group">
                                <label class="col-lg-3 control-label">Exam Duration</label>
								<div class="col-lg-9">
                                <input type="text" id="exam_duration" class="form-control" name="exam_duration" placeholder="In Minutes" value="<?php echo set_value('exam_duration'); ?>" >
                                <input type="hidden" id="setting_id" class="form-control" name="setting_id" >
                                <span class="text-danger"><?php echo form_error('exam_duration'); ?></span>
								</div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Marks</label>
								<div class="col-lg-9">
                                <input type="text" id="marks" class="form-control" name="marks" placeholder="Marks" value="<?php echo set_value('marks'); ?>" >
                                <span class="text-danger"><?php echo form_error('marks'); ?></span>
								</div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Minus Marks</label>
								<div class="col-lg-9">
                                <input type="text" id="minus_marks" class="form-control" name="minus_marks" placeholder="Minus Marks" value="<?php echo set_value('minus_marks"'); ?>" >
                                <span class="text-danger"><?php echo form_error('minus_marks'); ?></span>
								</div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">No. of Question</label>
								<div class="col-lg-9">
                                <input type="text" id="no_of_ques" class="form-control" name="no_of_ques" placeholder="No. of Question" value="<?php echo set_value('no_of_ques'); ?>" >
                                <span class="text-danger"><?php echo form_error('no_of_ques'); ?></span>
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
                                    <div class="col-md-8">
										<fieldset>
						                	<legend class="text-semibold"> Setting List</legend>
											<table class="table datatable-basic">
                      <thead>
                      <th>Exam Name</th>
                      <th>Class Name</th>
                      <th>Subject Name</th>
                      <th>Exam Duration</th>
                     <th>Marks</th>
                     <th>Minus Marks</th>
                     <th>No. of Question</th>
                      <th>Status</th>
                      <th>Action</th>
                      </thead>
                                        <tbody>
                                    <?php
									///var_dump($getmode);
									 foreach($examsettinglist as $item) {
									 ?>
                                       
									
                                    <tr style="text-align:center;">
                                        <td><?php echo $item['exam_name']; ?></td>
                                        <td><?php echo $item['class_name']; ?></td>
                                        <td><?php echo $item['sub_name']; ?></td>
                                        <td>
                                        <?php echo $item['exam_duration'];?>
                                        </td>
                                        <td>
                                        <?php echo $item['marks'];?>
                                        </td>
                                        <td>
                                        <?php echo $item['minus_marks'];?>
                                        </td>
                                        <td>
                                        <?php echo $item['no_of_ques'];?>
                                        </td>
                                        <td><?php echo ($item['status'] == 1) ? '<span class="text-success">Active</span>':'<span class="text-danger">Inactive</span>'; ?></td>
                                        <td>
                                        
                                         
        	<?php if(in_array('chapter-edit', $this->GroupPermission)){$showedit = true;}elseif(in_array('chapter-edit-own', $this->GroupPermission) && $t['createdby']==$this->session->userdata('id')){$showedit = true;} if($showedit == true){ ?>
			<a  class="text-info" onClick="getexamsettingDetail('<?php echo $item['id']; ?>')">Edit</a>           <?php }?>
            <?php if(in_array('chapter-delete', $this->GroupPermission)){$showdelete = true;}elseif(in_array('chapter-delete-own', $this->GroupPermission) && $t['createdby']==$this->session->userdata('id')){$showdelete = true;} if($showdelete == true){ ?>
            <a href="<?php echo site_url('secure/country/delete/'.$t['id']); ?>" class="text-danger" onclick="return confirm('Are you sure? You want to delete!')">Delete</a>
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
	$(document).ready(function() {
    $('#exam_id').on('change',function(){
        var exam_id = $(this).val();
        if(exam_id){
			
            $.ajax({
                type:'POST',
                url:'<?php echo base_url('secure/subject/getsubjectlist');?>',
                data:'exam_id='+exam_id,
                success:function(html){
                  $('#sub_id').html(html);
                }
				
            }); 
        }else{
            $('#sub_id').html('<div class="text-danger">Select Exam First!</div>'); 
        }
    });	
		
	});	
		function getexamsettingDetail(getId){
				$.ajax({
							type:'POST',
							url:'<?php echo base_url('secure/exam/getexamsettingDetail');?>',
							data:'getId='+getId,
							dataType:'json',
							success:function(response){
								
								console.log(response);
								$("#exam_id option").each(function(){
									 if($(this).val() === response.founddata.exam_id){
										$(this).prop('selected', true);
									 }	 
								});
								$("#class_id option").each(function(){
									 if($(this).val() === response.founddata.class_id){
										$(this).prop('selected', true);
									 }	 
								});
								$("#sub_id").html('<option value="'+response.founddata.sub_id+'" selected>'+response.founddata.sub_name+'</option>');
								$('#setting_id').val(response.founddata.id);
								$('#exam_duration').val(response.founddata.exam_duration);
								$('#marks').val(response.founddata.marks);
								$('#minus_marks').val(response.founddata.minus_marks);
								$('#no_of_ques').val(response.founddata.no_of_ques);
								$('#bt').val('Update');
								
								$("#status option").each(function(){
									 if($(this).val() === response.founddata.status){
										$(this).prop('selected', true);
									 }	 
								});
							}
					}); 
		}
		
		
</script>