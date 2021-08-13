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
										<h5 class="panel-title"><?=ucfirst($this->uri->segment(2));?></h5>
										<div class="heading-elements">
											<ul class="icons-list">
						                		<li><a data-action="collapse"></a></li>
						                		<li><a data-action="reload"></a></li>
						                		<li><a data-action="close"></a></li>
						                	</ul>
					                	</div>
									</div>

<div class="panel-body">
<?php echo form_open_multipart('secure/pages/add', array('class'=>'form-horizontal')); ?>

	<div class="row">
    <?php echo $this->session->flashdata('msg'); ?>
									<div class="col-md-9">
										
											<div class="form-group">
												<label class="col-lg-2 control-label">Page Title:</label>
												<div class="col-lg-10">
													<input type="text" class="form-control" id="title" placeholder="Page Title" name="page_title" onBlur="slugname()"/>
                                                    <span class="text-danger"><?php echo form_error('page_title');?></span>
												</div>
											</div>

											<div class="form-group">
												<label class="col-lg-12 control-label">Description:</label>
												<div class="col-lg-12">
													<textarea id="summernote" name="description"></textarea>
                                                    <span class="text-danger"><?php echo form_error('description');?></span>
												</div>
											</div>
									</div>
									<div class="col-md-3">
                           <div class="form-group">
               <p>Status: <b>Draft</b></p>
               <p>Visibility: <b>Public</b></p>
               <p>Publish on: <b>immediately</b></p> <span id='publishdate'></span>
               <p>Slug: <a href="#"><span id='permalink'></span></a></p>
               <input type="hidden" id="permalinkvalue" name="slug"/>
               <span class="text-danger"><?php echo form_error('slug'); ?></span>
                 
             </div>         
                        <div class="box-body">
						<div class="form-group">
                            	<label>Parent</label>
                                <select class="form-control" name="parent">
                        		<option value="default" selected>Default</option>
                        		<option value="home">Home</option>
                      			</select>
                                 <span class="text-danger"><?php echo form_error('parent'); ?></span>
						</div>
                        <div class="form-group">
                            	<label>Template</label>
                                <select class="form-control" name="template">
                        		<option value="default" selected>Default</option>
                        		<option value="slider">Slider</option>
                        		<option value="services">Services</option>
                        		<option value="gallery">Gallery</option>
                                <option value="upcomingcourse">Upcoming Course</option>
                                <option value="testimonial">Testimonial</option>
                      			</select>
                        <span class="text-danger"><?php echo form_error('template'); ?></span>
						</div>
                        </div>
                                            <div class="box-body">
						<div class="form-group">
                        <img id="image_upload_preview" src="" alt=""/>
                            	<label>Set featured image</label>
                                <input type="file" class="form-control" style="height:auto;" name="upload_file" id="feature_img" />
                                 <span class="text-danger"><?php echo form_error('upload_file'); ?></span>
                            </div>
                            
                        </div>
                                            <div class="form-group">
												<label class="col-lg-3 control-label">Status:</label>
												<div class="col-lg-9">
													<select class="form-control" name="status">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                    <option value="2">Archive</option>
                                                    </select>
                                                    <span class="text-danger"><?php echo form_error('status');?></span>
												</div>
											</div>
                                    </div>
									
								</div>

	<div class="text-right">
	<button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
	</div>
<?php echo form_close(); ?>


</div></div>

</div>
</div>
<!--upload modal-->
 <div id="uploadimageModal" class="modal" role="dialog">
                                         <div class="modal-dialog" style="width:100%;">
                                          <div class="modal-content">
                                                <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                  <h4 class="modal-title">Upload & Crop Image</h4>
                                                </div>
                                                <div class="modal-body">
                                                  <div class="row">
                                               <div class="col-md-12 text-center">
                                                <div id="image_demo" ></div>
                                               </div>
                                               
                                            </div>
                                                </div>
                                                <div class="modal-footer">
                                                <a class="btn btn-success crop_image">Crop & Upload Image</a>
                                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                             </div>
                                            </div>
                                        </div>
<script>
function slugname(){
	
	var slug=document.getElementById('title').value;
	if(slug !=''){
	var slugname=slug.replace(new RegExp(/([ .*+?^=;!:${}()|\[\]\/\\])/, 'g')  ,'-');
	var x= document.getElementById('permalink').innerHTML=slugname.toLowerCase();
	
	permalinkvalue.value=x;
	}else{
	var x= document.getElementById('permalink').innerHTML='';
	permalinkvalue.value=x;	
	}
	}
function readURL(input) {
if (input.files && input.files[0]) {
	var reader = new FileReader();

	reader.onload = function (e) {
		$('#image_upload_preview').attr('src', e.target.result);
		$("#image_upload_preview").css("height", "150px");
		$("#previous_img").hide();
	}

	reader.readAsDataURL(input.files[0]);
}
}

$("#feature_img").change(function () {
readURL(this);
});
</script>