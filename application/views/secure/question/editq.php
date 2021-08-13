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
									<div class="col-md-12">
										<fieldset>
											<legend class="text-semibold"> Update <?=ucfirst($this->uri->segment(2));?></legend>
                         <?php echo form_open_multipart('secure/question/editq/'.$editQuestion['id'], array('class'=>'form-horizontal')); ?>
                               <?php echo $this->session->flashdata('msg'); ?>
								 <div class="row">                               
<div class="col-sm-12">
	<div class="col-sm-3">
		<label class="col-sm-3 control-label">Class</label>
	<div class="form-group">
                                
                                
                               <div class="col-sm-9">
                               	<select name="class_id" class="form-control" id="class_id">
                               <option value="">Select</option>
                               <?php foreach($classlist as $class):?>
                               <option value="<?=$class['id'];?>" <?=$class['id']==$editQuestion['class_id']?'selected':'';?>><?=$class['class_name'];?></option>
                               <?php endforeach;?>
                               </select>
                               <span class="text-danger"><?php echo form_error('class_id'); ?></span>
                               </div>
                               
     </div>

</div>
<div class="col-sm-3">
	<label class="col-sm-3 control-label">Subject</label>
	<div class="form-group">
                                
                                <div class="col-sm-9">
                               <select name="sub_id" class="form-control" id="sub_id">
                               <option value="">Select</option>
                               <?php foreach($sublist as $sub):?>
                               <option value="<?=$sub['id'];?>" <?=$sub['id']==$editQuestion['sub_id']?'selected':'';?>><?=$sub['sub_name'];?></option>
                               <?php endforeach;?>
                               </select> 
                               </div>
                               <span class="text-danger"><?php echo form_error('sub_id'); ?></span>
                                
                               
    </div>

</div>
<div class="col-sm-3">
	<label class="col-sm-6 control-label">Chapter Name</label>
	<div class="form-group">
                                
								<div class="col-sm-9">			
                    <select type="text" id="chapter_id" class="form-control select2" name="chapter_id" >
                            <option value="<?=$chapter['id'];?>" selected> <?=$chapter['chapter_name'];?></option>  
                            </select>
                                </div>
                                <span class="text-danger"><?php echo form_error('chapter_id'); ?></span>
								</div>

</div>
<div class="col-sm-3">
	<label class="col-sm-3 control-label">Status:</label>
	<div class="form-group">
												
												    <div class="col-sm-9">
													<select class="form-control" name="status" id="status">
                                                    <option value="1" <?=$editQuestion['status']=='1'?'selected':'';?>>Active</option>
                                                    <option value="0" <?=$editQuestion['status']=='0'?'selected':'';?>>Inactive</option>
                                                    </select>
                                                    </div>
                                                    <span class="text-danger"><?=form_error('status');?></span>
												</div>
                                               </div>
                                              </div>
                                             </div>

								<div class="col-md-12">
									<label class="col-sm-2 control-label">Question</label>
			         				<span class="text-danger"><?php echo form_error('ques'); ?></span>
									<div class="col-md-12">
                                   <textarea id="summernote" name="ques"><?=$editQuestion['ques'];?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                    <span class="text-danger"><?php echo form_error('opt_1'); ?></span>
                                     <span class="text-danger"><?php echo form_error('opt_2'); ?></span>
                                     <span class="text-danger"><?php echo form_error('opt_3'); ?></span>
                                     <span class="text-danger"><?php echo form_error('opt_4'); ?></span>
                                   <ul class="nav nav-tabs nav-tabs-highlight nav-justified">
									<li class="nav-item"><a href="#highlighted-justified-tab1" class="nav-link active" data-toggle="tab">Option A</a></li>
									<li class="nav-item"><a href="#highlighted-justified-tab2" class="nav-link" data-toggle="tab">Option B</a></li>
                                    <li class="nav-item"><a href="#highlighted-justified-tab3" class="nav-link" data-toggle="tab">Option C</a></li>
                                    <li class="nav-item"><a href="#highlighted-justified-tab4" class="nav-link" data-toggle="tab">Option D</a></li>
									</ul>

								<div class="tab-content">
									<div class="tab-pane" id="highlighted-justified-tab1">
										 <textarea id="summernote1" name="opt_1"><?=$editQuestion['opt_1'];?></textarea>
									</div>
                                    <div class="tab-pane fade" id="highlighted-justified-tab2">
										 <textarea id="summernote2" name="opt_2"><?=$editQuestion['opt_2'];?></textarea>
									</div>
                                    <div class="tab-pane fade" id="highlighted-justified-tab3">
										 <textarea id="summernote3" name="opt_3"><?=$editQuestion['opt_3'];?></textarea>
									</div>
                                    <div class="tab-pane fade" id="highlighted-justified-tab4">
										 <textarea id="summernote4" name="opt_4"><?=$editQuestion['opt_4'];?></textarea>
									</div>

									
								</div>
                                    </div>
                                    </div>
										
                                     <div class="col-sm-6">
                                	<div class="col-sm-4">
                                		<label class="col-sm-2  control-label">Answere</label>
                                        
                                      <select class="form-control" name="answere">
                                       <option>Select</option>
                                      <option value="opt_1" <?=$editQuestion['ans']=='opt_1'?'selected':'';?>>Option A</option>
                                      <option value="opt_2" <?=$editQuestion['ans']=='opt_2'?'selected':'';?>>Option B</option>
                                      <option value="opt_3" <?=$editQuestion['ans']=='opt_3'?'selected':'';?>>Option C</option>
                                      <option value="opt_4" <?=$editQuestion['ans']=='opt_4'?'selected':'';?>>Option D</option>
                                      </select>
                                      <span class="text-danger"><?php echo form_error('answere'); ?></span>
                                 </div>
                                 
                                </div>
									<div class="text-right">
									<input type="submit" class="btn btn-primary" name="btn" value="Update" id="bt">
								</div>
                               
                                
                                </div> 
								<?php echo form_close();?>
										</fieldset>
										
									</div>
                                   
								</div>

								
							</div>
						</div>

</div>

</div>
<script type="text/javascript"> 
		$('#class_id').on('change', function(){
			$('#sub_id').val('');
		});
	$('#sub_id').on('change', function(){
        var sub_id = $(this).val();
        var class_id = $('#class_id').val();
        if(class_id != '' && sub_id !=''){
        	var purl = '<?=base_url("secure/question/getchapter/");?>';
        	 $.ajax({
                type:'POST',
                url:purl,
                data:'sub_id='+sub_id+'&class_id='+class_id,
                success:function(html){
                  $('#chapter_id').html(html);
                }
				
            }); 
        	
        }
        else{

        	new PNotify({title: 'Error', text: 'Please select class first!!!',icon: 'icon-blocked',addclass: 'bg-danger'});
        }
        
        
    });
				
		
</script>

