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
											<legend class="text-semibold"> Search <?=ucfirst($this->uri->segment(2));?></legend>
                                            <?php if(in_array('question-add', $this->GroupPermission)){?>
    <a href="<?php echo base_url('secure/question/add');?>" class="btn btn-primary btn-lg pull-right">Add Question</a>
    <?php }?>
                         <?php echo form_open_multipart('secure/question/QuestionList', array('class'=>'form-horizontal')); ?>
                               <?php echo $this->session->flashdata('msg'); ?>
 <div class="row">                               
<div class="col-sm-12">
	<div class="col-sm-3">
		<label class="col-sm-3" control-label">Class</label>
	<div class="form-group">
                                
                                
                               <div class="col-sm-9">
                               	<select name="class_id" class="form-control" id="class_id">
                               <option value="">Select</option>
                               <?php foreach($classlist as $class):?>
                               <option value="<?=$class['id'];?>"><?=$class['class_name'];?></option>
                               <?php endforeach;?>
                               </select>
                               </div>
                               <span class="text-danger"><?php echo form_error('class_id'); ?></span>
     </div>

</div>
<div class="col-sm-3">
	<label class="col-sm-3" control-label">Subject</label>
	<div class="form-group">
                                
                                <div class="col-sm-9">
                               <select name="sub_id" class="form-control" id="sub_id">
                               <option value="">Select</option>
                               <?php foreach($sublist as $sub):?>
                               <option value="<?=$sub['id'];?>"><?=$sub['sub_name'];?></option>
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
                               
                            </select>
                                </div>
                                <span class="text-danger"><?php echo form_error('chapter_id'); ?></span>
								</div>

</div>
<div class="col-sm-12">
	<div >
									<input type="submit" class="btn btn-primary" name="btn" value="Search" id="bt">
								</div>
                                               </div>
                                              </div>
                                             </div>

                                
                                </div> 
								<?php echo form_close();?>
										</fieldset>
										
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

