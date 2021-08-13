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
											<legend class="text-semibold"> Add <?=ucfirst($this->uri->segment(2));?></legend>
                         <?php echo form_open_multipart('secure/chapter/index', array('class'=>'form-horizontal')); ?>
                               <?php echo $this->session->flashdata('msg'); ?>            
                             <div class="form-group">
                                <label class="col-lg-3 control-label">Class</label>
                                <div class="col-lg-9">
                               <select name="class_id" class="form-control" id="class_id">
                               <option value="">Select</option>
                               <?php foreach($classlist as $class):?>
                               <option value="<?=$class['id'];?>"><?=$class['class_name'];?></option>
                               <?php endforeach;?>
                               </select> 
                               <span class="text-danger"><?php echo form_error('class_id'); ?></span>
                                </div>
                               
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Subject</label>
                                <div class="col-lg-9">
                               <select name="sub_id" class="form-control" id="sub_id">
                               <option value="">Select</option>
                               <?php foreach($sublist as $sub):?>
                               <option value="<?=$sub['id'];?>"><?=$sub['sub_name'];?></option>
                               <?php endforeach;?>
                               </select> 
                               <span class="text-danger"><?php echo form_error('sub_id'); ?></span>
                                </div>
                               
                            </div>        
							<div class="form-group">
                                <label class="col-lg-3 control-label">Chapter Name</label>
												<div class="col-lg-9">
                                <input type="text" id="chapter_name" class="form-control" name="chapter_name" placeholder="Chapter Name" value="<?php echo set_value('chapter_name'); ?>" >
                                <input type="hidden" id="chapter_id" class="form-control" name="chapter_id" >
                                <span class="text-danger"><?php echo form_error('chapter_name'); ?></span>
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
						                	<legend class="text-semibold"> <?=ucfirst($this->uri->segment(2));?> List</legend>
											<table class="table datatable-basic">
                      <thead>
                      <th style="text-align:left;">Id</th>
                      <th style="text-align:left;">Chapter Name</th>
                      <th>Class</th>
                     <th>Subject</th>
                     <th>No. Of Question</th>
                      <th>Status</th>
                      <th>Action</th>
                      </thead>
                                        <tbody>
                                    <?php
									///var_dump($getmode);
									 foreach($getmode as $item) {
									 ?>
                                       
									
                                    <tr>
                                    <td ><?php echo $item['id']; ?></td>
                                        <td ><?php echo $item['chapter_name']; ?></td>
                                        <td>
                                        <?php echo $item['class_name'];?>
                                        </td>
                                        <td>
                                        <?php echo $item['sub_name'];?>
                                        </td>
                                        <td>
                                        <?php 
										$getnoquestin = $this->Chapter_model->get_number_records('tbl_question', array('chapter_id'=>$item['id']));
										echo $getnoquestin;
										?>
                                        </td>
                                        <td><?php echo ($item['status'] == 1) ? '<span class="text-success">Active</span>':'<span class="text-danger">Inactive</span>'; ?></td>
                                        <td>
                                        
                                         
        	<?php if(in_array('chapter-edit', $this->GroupPermission)){$showedit = true;}elseif(in_array('chapter-edit-own', $this->GroupPermission) && $t['createdby']==$this->session->userdata('id')){$showedit = true;} if($showedit == true){ ?>
			<a  class="text-info" onClick="editExpenses('<?php echo $item['id']; ?>')">Edit</a>           <?php }?>
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
		
		
		function editExpenses(getId){
				$.ajax({
							type:'POST',
							url:'<?php echo base_url('secure/chapter/getDetail');?>',
							data:'getId='+getId,
							dataType:'json',
							success:function(response){
								
								//console.log(cvalue);
								$("#class_id option").each(function(){
									 if($(this).val() === response.founddata.class_id){
										$(this).prop('selected', true);
									 }	 
								});
								$("#sub_id option").each(function(){
									 if($(this).val() === response.founddata.sub_id){
										$(this).prop('selected', true);
									 }	 
								});
								$('#chapter_name').val(response.founddata.chapter_name);
								$('#chapter_id').val(response.founddata.id);
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