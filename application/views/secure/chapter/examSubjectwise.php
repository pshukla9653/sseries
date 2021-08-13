
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
					<div class="panel panel-flat col-sm-6">
							<div class="panel-heading">
								<h5 class="panel-title">Chapter Wise Exam</h5>
								<div class="heading-elements">
									
			                	</div>
							</div>

							<div class="panel-body">
                            
                            
                            <div class="panel-group panel-group-control content-group-lg" id="accordion1">
                            <?php foreach($ExamList as $key=>$exam):?>
								<div class="panel panel-white">
									<div class="panel-heading">
										<h6 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion1" href="#accordion-group<?=$key;?>"><?=$exam['exam_name'];?></a>
										</h6>
									</div>
									<div id="accordion-group<?=$key;?>" class="panel-collapse collapse <?=$key==0?'in':'';?>">
										<div class="panel-body">
                                       <div class="panel-group panel-group-control content-group-lg" id="subject<?=$key;?>">
                                        <?php $getsublist=''; $getsublist = explode(',', $exam['sub_ids']);
										foreach($getsublist as $subkey=>$sub_id):
										$subjectdata = $this->Chapter_model->get_data('tbl_subject', array('id'=>$sub_id));
										?>
                                        	 
                           					 
                            
												<div class="panel panel-white">
													<div class="panel-heading">
														<h6 class="panel-title">
															<a data-toggle="collapse" data-parent="#subject<?=$key;?>" href="#accordion-sub<?=$key;?><?=$subkey;?>"><?=$subjectdata['sub_name'];?></a>
														</h6>
													</div>
												<div id="accordion-sub<?=$key;?><?=$subkey;?>" class="panel-collapse collapse ">
													<div class="panel-body">
                                        				<div class="panel-group panel-group-control content-group-lg" id="class<?=$key;?><?=$subkey;?>">
                                        <?php
										foreach($classList as $classkey=>$class):
										
										?>
                                        	 
                           					 
                            
												<div class="panel panel-white">
													<div class="panel-heading">
														<h6 class="panel-title">
															<a data-toggle="collapse" data-parent="#class<?=$key;?><?=$subkey;?>" href="#accordion-class<?=$key;?><?=$subkey;?><?=$classkey;?>"><?=$class['class_name'];?></a>
														</h6>
													</div>
												<div id="accordion-class<?=$key;?><?=$subkey;?><?=$classkey;?>" class="panel-collapse collapse ">
													<div class="panel-body">
                                        				
											
													</div>
												</div>
												</div>
                                                <?php endforeach;?>
											</div>
                                        	
											
													</div>
												</div>
												</div>
                                                <?php endforeach;?>
											</div>
											
										</div>
									</div>
								</div>

								<?php endforeach;?>
							
							
						</div>
                        
                        

</div>



</div>
