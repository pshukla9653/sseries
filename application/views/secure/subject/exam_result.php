
<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><a href="#"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">
                            <a href="#">Dashboard</a></span> - 
                            <a href="#"><?=ucfirst($this->uri->segment(2));?></a>-
                            <a href="#">Exam Result</a></h4>
						</div>

						
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="#"><i class="icon-home2 position-left"></i> Home</a></li>
							<li class="active"><a href="#"><?=ucfirst($this->uri->segment(2));?></a></li>
                            <li class="active"><a href="#">Exam Result</a></li>
						</ul>

						
					</div>
				</div>
				<!-- /page header -->
<!-- Content area -->
				<div class="content">

							<div class="panel panel-flat col-sm-12">
							<div class="panel-heading">
								<h5 class="panel-title">Exam Result</h5>
								
							</div>

							<div class="panel-body">
                            <div class="col-sm-6" style="background-color:#054047;color:#fff;">
                            <div class="table-responsive">
							<table class="table">
								<thead>
									<tr style="background-color:#891111;color:#fff; font-size:24px;">
										<th colspan="2" style="text-align:center;">Result Analysis Report</th>
										
									</tr>
								</thead>
								<tbody>
                                <?php ///var_dump($resultdata);
								 foreach($resultdata as $name=>$value):?>
									<tr>
										<td style="padding:5px;"><?php echo $name;?></td>
										<td style="padding:5px;"><?php echo $value;?></td>
										
									</tr>
									<?php endforeach;?>
								</tbody>
							</table>
						</div>
                            </div>
                            <div class="col-sm-6">
                            <div class="chart-container text-center">
										<div class="display-inline-block" id="c3-pie-chart"></div>
									</div>
                            <div class="chart-container text-center">
										<div class="display-inline-block" id="c3-donut-chart"></div>
									</div>
                            <div class="panel-group content-group-lg" id="accordion1">
								<div class="panel panel-info">
									<div class="panel-heading">
										<h2 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion1" href="#accordion-group1">
											Check Your Wrong Answers Here</a>								
										</h2>
									</div>
									<div id="accordion-group1" class="panel-collapse collapse">
										<div class="panel-body">
                                       
                                        
										<?php $i=1;
										foreach($answereList as $key=>$value):
										$ques ='';
										$ques = explode('-', $value);
										
										if($ques[1] != $ques[2]){
											$wrongopt = $ques[1];
											$correectopt = $ques[2];
											$v = 'ques,'.$wrongopt.','.$correectopt;
											
											$quesData = $this->Subject_model->get_selected_value($v, 'tbl_question', array('id'=>$ques[0]));
										
										if($quesData){
										?>
										
                                        <div class="bg-indigo-300">
                            <div class="table-responsive">
							<table class="table">
								<thead>
									<tr class="bg-indigo-600">
										<th class="text-size-large">Question <?=$i;?> : <?=$quesData['ques'];?></th>
										
									</tr>
								</thead>
								<tbody>
									<tr>
										<td style="padding:5px;" class="bg-danger-300 text-size-large"><strong>Your Answer : </strong><?=$quesData[$wrongopt];?></td>
									</tr>
									<tr>
										<td style="padding:5px;" class="bg-success-300 text-size-large"><strong>Correct Answer : </strong> <?=$quesData[$correectopt];?></td>
									</tr>
								</tbody>
							</table>
						</div>
                            </div>
                            <br>
                                        <?php $i++; }}  endforeach;
										
										?>
										</div>
									</div>
								</div>
                                
					 
                                
							</div>       
                            </div>
                            
                           	</div>
								
				</div>
						



</div>
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
                ['Total Percentage', <?php echo (int)$resultdata['Total Marks'];?>],
                ['Obtained Percentage', <?php echo (int)$resultdata['Total Marks Obtained'];?>],
            ],
            type : 'pie'
        }
    });

    // Change data
    setTimeout(function () {
        pie_chart.load({
            columns: [
                ["Obtain Marks", <?php echo (int)$resultdata['Obtain Marks'];?>],
                ["Total Marks.", <?php echo (int)$resultdata['Total Marks'];?>],
                ["Negative Marks", <?php echo (int)$resultdata['Negative Marks'];?>],
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
    var donut_chart = c3.generate({
        bindto: '#c3-donut-chart',
        size: { width: 350 },
        color: {
            pattern: ['#2196F3', '#FF5722', '#4CAF50', '#9C27B0']
        },
        data: {
            columns: [
                ['Total Question', <?php echo (int)$resultdata['Total Question'];?>],
                ['Total Attempted', <?php echo (int)$resultdata['Attempted Question'];?>],
            ],
            type : 'donut'
        },
        donut: {
            title: "Questions"
        }
    });

    // Change data
    setTimeout(function () {
        donut_chart.load({
            columns: [
				["Attempted", <?php echo (int)$resultdata['Attempted Question'];?>],
				["Skipped For Review", <?php echo (int)$resultdata['Skipped For Review Question'];?>],
                ["Unattempted", <?php echo (int)$resultdata['Unattempted Question'];?>],
                ["Skipped", <?php echo (int)$resultdata['Skipped Question'];?>],
            ]
        });
    }, 4000);
    setTimeout(function () {
        donut_chart.unload({
            ids: 'Total Question'
        });
        donut_chart.unload({
            ids: 'Total Attempted'
        });
    }, 8000);
	// Resize chart on sidebar width change
    $(".sidebar-control").on('click', function() {
        donut_chart.resize();
		pie_chart.resize();
    });
});
	</script>