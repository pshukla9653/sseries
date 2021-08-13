
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
					<div class="panel panel-flat col-sm-12">
							<div class="panel-heading">
								<h5 class="panel-title">Main Exam</h5>
								<div class="heading-elements">
									
			                	</div>
							</div>

							<div class="panel-body">
                            
                          <?php echo $this->session->flashdata('msg'); ?>  
                            <div class="panel-group panel-group-control content-group-lg" id="accordion1">
                            <?php foreach($ExamList as $key=>$exam):?>
								<div class="panel panel-white">
									<div class="panel-heading" style="background-color: blueviolet;
    color: white;">
										<h6 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion1" href="#accordion-group<?=$key;?>"><?=$exam['exam_name'];?></a>
										</h6>
									</div>
									<div id="accordion-group<?=$key;?>" class="panel-collapse collapse <?=$key==0?'in':'';?>">
										<div class="panel-body">
                                       <table class="table">
                                                        <?php
														if($exam['id'] == '3'){
															$mock_test_no = 16;
														}
														else{
															$mock_test_no = 6;
														}
														
														$sno = 1;
														for($i=1; $i < $mock_test_no; $i++):
														$get_result ='';
														?>
                                                        <tr>
                                                        	<td><?=$i;?></td>
                                                        	<td>Mock Test- <?=$i;?></td>
                                                            <td>
                                                            <?php
															$get_result = $this->Exam_model->get_data('tbl_result_main_exam', array('student_id'=>$this->session->userdata('id'),'exam_id'=>$exam['id'],'attempt_id'=>$i));
															 if($this->session->userdata('id') =='1'){?>
 <a href="<?=base_url('secure/exam/examInstructions/'.$exam['id'].'/'.$i);?>">Start Exam</a>
                                                            <?php }else{

///echo $get_result['id'];
				if(!$get_result['id']){
																?>
   <a href="<?=base_url('secure/exam/examInstructions/'.$exam['id'].'/'.$i);?>">Start Exam</a>
                                                            <?php } }?>
                                                            
                                                            
                                                            </td>
                                                            <td>
                                                            <?php if($get_result['id']){?>
                                                            <a href="<?=base_url('secure/exam/showResult/'.$get_result['id']);?>" target="_blank">View Result</a>
                                                            <?php }?>
                                                            </td>
                                                        </tr>
                                                        <?php endfor;?>
														</table>
											
										</div>
									</div>
								</div>

								<?php endforeach;?>
							
							
						</div>
                        
                        

</div>



</div>
