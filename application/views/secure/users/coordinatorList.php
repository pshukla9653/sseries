
<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><a href="javascript:window.history.back();"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">
                            <a href="<?=base_url('dashboard');?>">Dashboard</a></span> - 
                            <a href="#">Coordinator List</a></h4>
						</div>

						
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="<?=base_url('dashboard');?>"><i class="icon-home2 position-left"></i> Home</a></li>
							<li class="active"><a href="#">Coordinator List</a></li>
						</ul>

						
					</div>
				</div>
				<!-- /page header -->
<!-- Content area -->
				<div class="content">

					<!-- Horizontal form options -->
					<div class="row">

<?php echo form_open_multipart('secure/users/ExecutiveList', array('class'=>'form-horizontal')); ?>

	<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title">Coordinator List</h5>
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
									<div class="col-md-6">
										
											<div class="form-group">
												<label class="col-lg-3 control-label">Coordinator List:</label>
												<div class="col-lg-9">
													<select class="form-control select2" name="user_id">
                                                    <option value="">Select</option>
                                                    <?php foreach($coordinaterList as $g){ ?>
                                                    <option value="<?=$g['id'];?>"><?=$g['name'];?></option>
                                                    <?php } ?>
                                                    </select>
                                                    <span class="text-danger"><?php echo form_error('user_id');?></span>
												</div>
											</div>
                                           <div class="text-right">
									<button type="submit" class="btn btn-primary">Get Executive List <i class="icon-arrow-right14 position-right"></i></button>
								</div>

											</div>
										

											
										
									</div>

									
								</div>

								
							</div>
						</div>

<?php echo form_close(); ?>

</div>
</div>
<script>
$('#group_id').on('change',function(){
        var country_id = $(this).val();
		//alert(country_id	);
        if(country_id == 5){
			$('#parent_id').show(1000);
            
        }else{
            $('#parent_id').hide(1000);
        }
    });
</script>	