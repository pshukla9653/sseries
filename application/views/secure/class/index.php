<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><a href="javascript:window.history.back();"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">
                            <a href="<?=base_url('dashboard');?>">Dashboard</a></span> - 
                            <a href="<?=base_url($this->uri->segment(2));?>"><?=ucfirst($this->uri->segment(2));?>s</a></h4>
						</div>

						
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="<?=base_url('dashboard');?>"><i class="icon-home2 position-left"></i> Home</a></li>
							<li class="active"><a href="<?=base_url($this->uri->segment(2));?>"><?=ucfirst($this->uri->segment(2));?>s</a></li>
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
											<legend class="text-semibold"> Add <?=ucfirst($this->uri->segment(2));?>s</legend>
                                            <?php echo form_open_multipart('secure/clas/index', array('class'=>'form-horizontal')); ?>
                               <?php echo $this->session->flashdata('msg'); ?>            
                                           
											<div class="form-group">
                                <label class="col-lg-3 control-label">Class Name</label>
												<div class="col-lg-9">
                                <input type="text" id="class_name" class="form-control" name="class_name" placeholder="Class Name" value="<?php echo set_value('class_name'); ?>" >
                                <input type="hidden" id="class_id" class="form-control" name="class_id" >
                                <span class="text-danger"><?php echo form_error('class_name'); ?></span>
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
						                	<legend class="text-semibold"> <?=ucfirst($this->uri->segment(2));?>s List</legend>
											<table class="table datatable-basic">
                      <thead>
                      <th>Class Name</th>
                     
                      <th>Status</th>
                      <th>Action</th>
                      </thead>
                                        <tbody>
                                    <?php foreach($getmode as $item) { ?>
                                    <tr style="text-align:center;">
                                        <td><?php echo $item['class_name']; ?></td>
                                        
                                        <td><?php echo ($item['status'] == 1) ? '<span class="tag tag-default tag-success">Active</span>':'<span class="tag tag-default tag-danger">Inactive</span>'; ?></td>
                                        <td>
                                        
                                     
        	<?php if(in_array('clas-edit', $this->GroupPermission)){$showedit = true;}elseif(in_array('clas-edit-own', $this->GroupPermission) && $t['createdby']==$this->session->userdata('id')){$showedit = true;} if($showedit == true){ ?>
			<a  class="text-info" onClick="editRecord('<?php echo $item['id']; ?>')">Edit</a>           <?php }?>
            <?php if(in_array('clas-delete', $this->GroupPermission)){$showdelete = true;}elseif(in_array('clas-delete-own', $this->GroupPermission) && $t['createdby']==$this->session->userdata('id')){$showdelete = true;} if($showdelete == true){ ?>
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
		
		
		function editRecord(getId){
				$.ajax({
							type:'POST',
							url:'<?php echo base_url('secure/clas/getDetail');?>',
							data:'getId='+getId,
							dataType:'json',
							success:function(response){
								//console.log(response);
								$('#class_name').val(response.founddata.class_name);
								$('#class_id').val(response.founddata.id);
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