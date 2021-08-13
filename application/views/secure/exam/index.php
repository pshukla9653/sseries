
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
                                            <?php echo form_open_multipart('secure/exam/index', array('class'=>'form-horizontal')); ?>
                               <?php echo $this->session->flashdata('msg'); ?>            
                                           
								<div class="form-group">
                                <label class="col-lg-3 control-label">Exam Name</label>
								<div class="col-lg-9">
                                <input type="text" id="exam_name" class="form-control" name="exam_name" placeholder="Exam Name" value="<?php echo set_value('exam_name'); ?>" >
                                <input type="hidden" id="exam_id" class="form-control" name="exam_id" >
                                <span class="text-danger"><?php echo form_error('exam_name'); ?></span>
								</div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Exam Fee</label>
								<div class="col-lg-9">
                                <input type="text" id="exam_fee" class="form-control" name="exam_fee" placeholder="Exam Fee" value="<?php echo set_value('exam_fee'); ?>" >
                                <span class="text-danger"><?php echo form_error('exam_name'); ?></span>
								</div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Subjects</label>
												<div class="col-lg-9">
                                <?php foreach($sublist as $sub):?>
                                <div class="col-lg-6">
                                <input type="checkbox" id="sub_ids" class="inline-checkbox" name="sub_ids[]" value="<?php echo $sub['id']; ?>" > 
                                <?php echo $sub['sub_name']; ?>
                                </div>
                               <?php endforeach;?>
                                <span class="text-danger"><?php echo form_error('sub_ids[]'); ?></span>
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
                      <th>Exam Name</th>
                       <th>Exam Fee</th>
                     <th>Subjects</th>
                      <th>Status</th>
                      <th>Action</th>
                      </thead>
                                        <tbody>
                                    <?php foreach($getmode as $item) { $subcode = '';
									$subcode = explode(',', $item['sub_ids']);
									//var_dump($subcode	);
									$subname = '';
									foreach($sublist as $sub): 
										if(in_array($sub['id'], $subcode)){
										 $subname[] = $sub['sub_name']; ?>
                                        <?php } endforeach;?>
									
                                    <tr style="text-align:center;">
                                        <td><?php echo $item['exam_name']; ?></td>
                                        <td><?php echo $item['exam_fee']; ?></td>
                                        <td>
                                        <?php echo implode(', ', $subname);?>
                                        </td>
                                        <td><?php echo ($item['status'] == 1) ? '<span class="text-success">Active</span>':'<span class="text-danger">Inactive</span>'; ?></td>
                                        <td>
                                        
                                         
        	<?php if(in_array('exam-edit', $this->GroupPermission)){$showedit = true;}elseif(in_array('exam-edit-own', $this->GroupPermission) && $t['createdby']==$this->session->userdata('id')){$showedit = true;} if($showedit == true){ ?>
			<a  class="text-info" onClick="editExpenses('<?php echo $item['id']; ?>')">Edit</a>           <?php }?>
            <?php if(in_array('exam-delete', $this->GroupPermission)){$showdelete = true;}elseif(in_array('exam-delete-own', $this->GroupPermission) && $t['createdby']==$this->session->userdata('id')){$showdelete = true;} if($showdelete == true){ ?>
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
							url:'<?php echo base_url('secure/exam/getmodeDetail');?>',
							data:'getId='+getId,
							dataType:'json',
							success:function(response){
								x = response.founddata.sub_ids;
								cvalue = x.split(",");
								//console.log(cvalue);
								$('#exam_name').val(response.founddata.exam_name);
								$('#exam_fee').val(response.founddata.exam_fee);
								$('#exam_id').val(response.founddata.id);
								$('#bt').val('Update');
								$('input[name="sub_ids[]"]').val(cvalue);
								$("#status option").each(function(){
									 if($(this).val() === response.founddata.status){
										$(this).prop('selected', true);
									 }	 
								});
							}
					}); 
		}
		
		
</script>