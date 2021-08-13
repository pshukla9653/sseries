
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
								<h5 class="panel-title">Exam</h5>
								<div class="heading-elements">
									
			                	</div>
							</div>

							<div class="panel-body">
                           			Aspirants are advised to take test carefully,  read question thoroughly then click on radio button of the options. <br>
<h4>Information:</h4>
Each question carry 4 marks, means correct answer awarded 4 marks, wrong answer awarded    -1    mark as per negative marking scheme, not attempted or skipped questions awarded 0 marks.  If the scheduled time is concluded and aspirants failed to complete all question within time frame the test will be submitted automatically and rest of questions will be treated as not attempted and no marks will be given for the not attempted questions.  
<h4>Instructions:</h4>
Click on subject →Click on question number written on right side  bar →Question Appears - Click on radio button of right option →Click save and next . after completion of test final submit button will appear →Click final submission button.  
Your test is over. Now see the result  with graph and detail analysis of your test.  Read sincerely and try  to focus on weaker  topic. The Questions skipped or skipped for Review and not saved will not be considered for evaluation. 
<div class="col-sm-12"><center><a href="<?=base_url('secure/chapter/startChapterExam/'.$exam_id.'/'.$chapter_id);?>" style="margin:5px;" class="btn btn-success">Start Exam</a></center>

</div>
						</div>
						</div>
                        
                        

</div>



</div>
