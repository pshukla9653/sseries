<!-- Page header -->
<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Dashboard</h4>
						</div>

						<!--<div class="heading-elements">
							<div class="heading-btn-group">
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
							</div>
						</div>-->
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="#"><i class="icon-home2 position-left active"></i> Dashboard</a></li>
							
						</ul>

						<!--<ul class="breadcrumb-elements">
							<li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="icon-gear position-left"></i>
									Settings
									<span class="caret"></span>
								</a>

								<ul class="dropdown-menu dropdown-menu-right">
									<li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
									<li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
									<li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
									<li class="divider"></li>
									<li><a href="#"><i class="icon-gear"></i> All settings</a></li>
								</ul>
							</li>
						</ul>-->
					</div>
				</div>
<!-- /page header -->

<!-- Content area -->
<div class="content">
<?php
$getexamlist = $this->Users_model->get_all_list('tbl_student_exam', array('student_id'=>$this->session->userdata('id')));

 ?>
<!-- Main charts -->
<div class="row">
		<?php foreach($getexamlist as $exam): 
		$examDetails = $this->Users_model->get_data('tbl_exam', array('id'=>$exam['exam_id'])); ?>
						<div class="col-lg-12">

							<!-- Traffic sources -->
							<div class="panel panel-flat">
								<div class="panel-heading">
									<h6 class="panel-title"></h6>
									
								</div>

								<div class="container-fluid">
								

								

								<div class="col-lg-3">
									<div class="panel bg-green-400">
										<div class="panel-body">
											<div class="heading-elements">
												<ul class="icons-list">
							                		<li><a data-action="reload"></a></li>
							                	</ul>
						                	</div>

											<h3 class="no-margin"><?=$examDetails['exam_name'];?></h3>
											
											<div class="text-muted text-size-small">Payment Status : <?=$exam['payment_status']=='1'?'<a>Paid</a>':'Pay Now';?></div>
                                            <div class="text-muted text-size-small">Test Status : <?=$exam['exam_status']=='1'?'Active':'Inactive! Please contact admin for active';?></div>
										</div>

										<div id="today-revenue"></div>
									</div>
								</div>
                                <?php $sub = ''; $sub_ids=''; $chapter_count=0; $attemted_capter_test=0;
				 if($examDetails['id'] !='3'){ $sub = ''; $sub_ids='';
					$sub = $examDetails['sub_ids'];
					$sub_ids = explode(',', $sub);
					$chapter_count = $this->Users_model->get_capter_num($sub_ids);
					$attemted_capter_test = $this->Users_model->get_number_records('tbl_result_chapter', array('student_id'=>$this->session->userdata('id'),'exam_id'=>$examDetails['id']));
				 ?>
                                <div class="col-lg-3">
									<div class="panel bg-blue-400">
										<div class="panel-body">
											<div class="heading-elements">
												<ul class="icons-list">
							                		<li><a data-action="reload"></a></li>
							                	</ul>
						                	</div>
					
											<h3 class="no-margin"><?=$chapter_count;?></h3>
											Your Chapter Wise Test
                                            
											<div class="text-muted text-size-small">Completed : <?=$attemted_capter_test;?></div>
										</div>

										<div id="today-revenue"></div>
									</div>
                                    
								</div>
                                <?php }?>
                                <div class="col-lg-3">
									<div class="panel bg-violet-400">
										<div class="panel-body">
											<div class="heading-elements">
												<ul class="icons-list">
							                		<li><a data-action="reload"></a></li>
							                	</ul>
						                	</div>

											<h3 class="no-margin">6</h3>
											Your Full Syllabus Test
                                            <?php $attemted_sub_test = $this->Users_model->get_number_records('tbl_result_subject', array('student_id'=>$this->session->userdata('id'),'exam_id'=>$examDetails['id']));?>
											<div class="text-muted text-size-small">Completed : <?=$attemted_sub_test;?></div>
										</div>

										<div id="today-revenue"></div>
									</div>
								</div>
                                <div class="col-lg-3">
									<div class="panel bg-indigo-400">
										<div class="panel-body">
											<div class="heading-elements">
												<ul class="icons-list">
							                		<li><a data-action="reload"></a></li>
							                	</ul>
						                	</div>

											<h3 class="no-margin"><?=$examDetails['id']=='3'?'15':'5';?></h3>
											Your Mock Test
											<?php $attemted_main_test = $this->Users_model->get_number_records('tbl_result_main_exam', array('student_id'=>$this->session->userdata('id'),'exam_id'=>$examDetails['id']));?>
											<div class="text-muted text-size-small">Completed : <?=$attemted_main_test;?></div>
										</div>

										<div id="today-revenue"></div>
									</div>
								</div>
							</div>
                            
								</div>

								
							</div>
							<!-- /traffic sources -->
		<?php endforeach;?>	
        
        <div class="col-lg-12">
        <div class="panel panel-flat">
								<div class="panel-heading">
									<h6 class="panel-title">Marks Summary</h6>
									
								</div>

								<div class="container-fluid">
								

								

								
									<div class="panel ">
										<div class="panel-body">
        <div class="chart-container text-center">
										<div class="display-inline-block" id="c3-pie-chart"></div>
									</div>
        </div>			
						</div></div></div></div>

						
					</div>
<!-- /main charts -->
<?php $totalmarks = $this->Users_model->get_selected_value('SUM(total_marks) AS totalmarks', 'tbl_result_main_exam', array('student_id'=>$this->session->userdata('id')));
$totalobtainmarks = $this->Users_model->get_selected_value('SUM(total_obtain_mark) AS totalobtainmarks', 'tbl_result_main_exam', array('student_id'=>$this->session->userdata('id')));
$obtainmarks = $this->Users_model->get_selected_value('SUM(obtain_mark) AS obtainmarks', 'tbl_result_main_exam', array('student_id'=>$this->session->userdata('id')));
$nagetivemarks = $this->Users_model->get_selected_value('SUM(nagetive_marks) AS nagetivemarks', 'tbl_result_main_exam', array('student_id'=>$this->session->userdata('id')));
//var_dump($total); exit;?>

<script>

$(function () {
 // Generate chart
    var pie_chart = c3.generate({
        bindto: '#c3-pie-chart',
        size: { width: 350 },
        color: {
            pattern: ['#3F51B5', '#FF9800', '#4CAF50', '#00BCD4', '#F44336']
        },
        data: {
            columns: [
                ['Total Percentage', <?php echo (int)$totalmarks['totalmarks'];?>],
                ['Obtained Percentage', <?php echo (int)$totalobtainmarks['totalobtainmarks'];?>],
            ],
            type : 'pie'
        }
    });

    // Change data
    setTimeout(function () {
        pie_chart.load({
            columns: [
                ["Obtain Marks", <?php echo (int)$obtainmarks['obtainmarks'];?>],
                ["Total Marks.", <?php echo (int)$totalmarks['totalmarks'];?>],
                ["Negative Marks", <?php echo (int)$nagetivemarks['nagetivemarks'];?>],
            ]
        });
    }, 4000);
    setTimeout(function () {
        pie_chart.unload({
            ids: 'Total Percentage'
        });
        pie_chart.unload({
            ids: 'Obtained Percentage'
        });
    }, 8000);	
// Donut chart
    // ------------------------------
	
    // Generate chart
    

    // Change data
   
	// Resize chart on sidebar width change
    $(".sidebar-control").on('click', function() {
		pie_chart.resize();
    });
});
	</script>
