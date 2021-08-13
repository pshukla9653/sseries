
<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><a href="#"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">
                            <a href="#">Dashboard</a></span> - 
                            <a href="#"><?=ucfirst($this->uri->segment(2));?> Wise Exam</a> -
                            <a href="#"><?=$getexam['exam_name'];?></a> -
                            <a href="#"><?=$subject['sub_name'];?></a> (
                            <a href="#">Class-<?=$class['class_name'];?></a> )
                            
                            </h4>
						</div>

						
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="#"><i class="icon-home2 position-left"></i> Home</a></li>
							<li class="active"><a href="#"><?=ucfirst($this->uri->segment(2));?> Wise Exam</a></li>
                            <li class="active"><a href="#"><?=$getexam['exam_name'];?></a></li>
                            <li class="active"><a href="#"><?=$subject['sub_name'];?></a></li>
                            <li class="active"><a href="#">Class-<?=$class['class_name'];?></a></li>
						</ul>

						
					</div>
				</div>
				<!-- /page header -->
<!-- Content area -->
				<div class="content">

					<!-- Horizontal form options -->
					<div class="row">
					<div class="panel panel-flat col-sm-4">
							<div class="panel-heading">
								<h5 class="panel-title">Question No. <span id="IndexQues"></span>  <span style="margin-left:95px">(<span id="marks"></span> Marks)</span></h5>
								<div class="heading-elements">
									
			                	</div>
							</div>

							<div class="panel-body" style="min-height:250px;">
                           			<input type="hidden" id="currentQId" value="0"/>
                                   <input type="hidden" id="currentQNo" value="0"/>
                                
                                   <input type="hidden" id="minus_marks" value="<?=$minusmark;?>"/>
                                   <input type="hidden" id="lastunattemp" value="0"/>
                                   <input type="hidden" id="class_id" value="<?=$class['id'];?>"/>
                                   <input type="hidden" id="TOTALMARKS" value="<?=$total_marks;?>"/>
                                   
								<div class="row" id="dques">
									 
                                   
								</div>

								
							</div>
						</div>
                        <div class="panel panel-flat col-sm-4">
							<div class="panel-heading">
								<h5 class="panel-title">Options</h5>
								<div class="heading-elements">
									
			                	</div>
							</div>

							<div class="panel-body" style="min-height:250px;">
								<div class="row">
                                
									<label class="radio-inline">
									<div class="choice border-primary text-primary-600">
                                    <input type="radio" class="styled" name="opt" value="opt_1" id="opt_1"></div>
									<span id="opt1"></span>
									</label> <br><br>
                                    <label class="radio-inline">
									<div class="choice border-primary text-primary-600">
                                    <input type="radio" class="styled" name="opt" value="opt_2" id="opt_2"></div>
									<span id="opt2"></span>
									</label><br><br>
                                    <label class="radio-inline">
									<div class="choice border-primary text-primary-600">
                                    <input type="radio" class="styled" name="opt"  value="opt_3" id="opt_3"></div>
									<span id="opt3"></span>
									</label><br><br>
                                    <label class="radio-inline">
									<div class="choice border-primary text-primary-600">
                                    <input type="radio" class="styled" name="opt" value="opt_4" id="opt_4"></div>
									<span id="opt4"></span>
									</label>
								</div>
							<br><br><br>
								<div class="row">
                                <div class="col-md-4">
									<button class="btn btn-success text-right" onClick="getPrevious();" id="previousButton" style="margin:10px;">Previous</button>
                                    </div>
                                    
                                    <div class="col-md-4">
                                    <button class="btn btn-info text-right" onClick="skipQuestion();" id="skipButton" style="margin:10px;">Skip</button>
                                    <button class="btn text-right" onClick="skipforreviewQuestion();" id="skipforPreviewButton" style="display:none;padding: 5px;margin-top: 12px;background-color:#9C27B0; color:#fff;">Skip for Review</button>
                                    </div>
                                    <div class="col-md-4">
                                    
                                    <button class="btn btn-success text-right" onClick="getformdata();" style="margin:10px;" id="btnsavenext">Save &amp; Next</button>					
                                    </div>
                                   <div class="col-md-12">
                                   <center><button class="btn btn-success text-right" onClick="final_submission();" style="margin:10px;" id="btnfinalsubmit">Final Submit</button></center></div>
								</div>
							</div>	
						</div>
                        <div class="panel panel-flat col-sm-4">
							<!-- Accordion with right control button -->
							<div class="panel-heading">
								<h5 class="panel-title">Time Remaining : <span id="demo"></span></h5>
                            </div>    
							<span  class="badge bg-info" style="margin:5px; font-size:12px;">Total Questions : <span id="total">0</span></span>
                            <span  class="badge bg-primary" style="margin:5px; font-size:12px;">Unattempted : <span id="unattempted">0</span></span>
                            <span  class="badge bg-warning" style="margin:5px; font-size:12px;">Skipped : <span id="skiped">0</span></span>
                            <span  class="badge bg-success" style="margin:5px; font-size:12px;">Attempted : <span id="attempted">0</span></span>
                            <span  class="badge bg-violet" style="margin:5px; font-size:12px;">Skipped for Review : <span id="skippedforreview">0</span></span>
							<div class="panel-group panel-group-control panel-group-control-right content-group-lg" id="accordion-control-right">
                            
                            <?php $a=1; for($i=0; $i < count($questionList); $i++){?>
											<a onClick="getquesbyids(<?=$questionList[$i]['id'];?>, <?=$questionList[$i]['marks'];?>, <?=$a;?>)" id="<?=$a;?>"><span id="bg<?=$a;?>" class="badge bg-primary" style="margin:5px;"><?=$a;?></span></a>
                                            <span id="qmode<?=$a;?>" style="display:none;">unattempted</span>
                                            <?php $a++; }?>
                                
					 
								<input type="hidden" id="lastQuestion" value="<?=$a;?>"/>
                                
							</div>
							<!-- /accordion with right control button -->

							
						</div>

</div>



</div>
<script type="text/javascript">
$( document ).ready(function() {
loadQuestionbySNo('1');
var totalQ = $('#lastQuestion').val();
var lastq = parseInt(totalQ) -1;
	$('#total').html(lastq);
	$('#unattempted').html(lastq);
	localStorage.clear();
	sessionStorage.clear();

});

function loadQuestionbySNo(serial_number){
	var firstquestion =  document.getElementById(serial_number).attributes[0];	
	var str= firstquestion.value;
	var numbers = str.match(/\d+/g).map(Number);
	getquesbyids(numbers[0], numbers[1], numbers[2]);	
}
function getformdata(){
	 var getSno = $('#currentQNo').val();
	
	var selectedOption  =   document.querySelector('input[type=radio]:checked');
	var question_id = $('#currentQId').val();
	if(selectedOption == null){
	new PNotify({title: 'Error', text: 'Please select option first!!!',icon: 'icon-blocked',addclass: 'bg-danger'});
	}
	else{
	var answere = selectedOption.value;
	
	
	//update question mode status
	$Question_mode = $('#qmode'+getSno).html();
	
	if($Question_mode == 'unattempted'){
		var no_of_unattempt = $('#unattempted').html();
		var no_of_attempt = $('#attempted').html();
		var remain_unattempt = parseInt(no_of_unattempt) - 1;
		var add_attempt = parseInt(no_of_attempt) + 1;
		$('#unattempted').html(remain_unattempt);
		$('#attempted').html(add_attempt);
		$('#qmode'+getSno).html('attempted');
		$("#bg"+getSno).removeClass("bg-primary");
		$("#bg"+getSno).addClass("bg-success");
	}
	if($Question_mode == 'skiped'){
		var no_of_skiped = $('#skiped').html();
		var no_of_attempt = $('#attempted').html();
		var remain_skiped = parseInt(no_of_skiped) - 1;
		var add_attempt = parseInt(no_of_attempt) + 1;
		$('#skiped').html(remain_skiped);
		$('#attempted').html(add_attempt);
		$('#qmode'+getSno).html('attempted');
		$("#bg"+getSno).removeClass("bg-warning");
		$("#bg"+getSno).addClass("bg-success");
	}
	if($Question_mode == 'skippedforreview'){
		var no_of_skipped_for_review = $('#skippedforreview').html();
		var no_of_attempt = $('#attempted').html();
		var remain_skipped_for_review = parseInt(no_of_skipped_for_review) - 1;
		var add_attempt = parseInt(no_of_attempt) + 1;
		$('#skippedforreview').html(remain_skipped_for_review);
		$('#attempted').html(add_attempt);
		$('#qmode'+getSno).html('attempted');
		$("#bg"+getSno).removeClass("bg-violet");
		$("#bg"+getSno).addClass("bg-success");
	}
	
	var marks = $('#marks').html();
	var minus_marks = $('#minus_marks').val();
	var answere_srting = answere + '-' + marks + '-' + minus_marks;
	//store answere in local sessionstorage
	sessionStorage.setItem(question_id, answere_srting);
	var nextq = parseInt(getSno) +1;
	var lastunattemp = $('#lastunattemp').val();
	///alert(lastunattemp);
	if($Question_mode == 'unattempted'){
	loadQuestionbySNo(nextq);
	}
	else{
		loadQuestionbySNo(lastunattemp);
	}
	
	}
}

function skipQuestion(){
	var getSno = $('#currentQNo').val();
	//alert(getSno);
	var nextq = parseInt(getSno) +1;
	$("#bg"+getSno).removeClass("bg-primary");
	$("#bg"+getSno).addClass("bg-warning");
	
	var get_question_mode = $('#qmode'+getSno).html();
	//alert('mode-'+get_question_mode);
	if(get_question_mode == 'unattempted'){
	var no_of_unattempt = $('#unattempted').html();
	var no_of_skipped = $('#skiped').html();
	//alert(no_of_unattempt);
	var remain_unattempt = parseInt(no_of_unattempt) - 1;
	var add_skipped = parseInt(no_of_skipped) + 1;
	$('#qmode'+getSno).html('skiped')
	$('#unattempted').html(remain_unattempt);
	$('#skiped').html(add_skipped);
	loadQuestionbySNo(nextq);
	}
	else{
		loadQuestionbySNo(nextq);
	}
	
	
}
function skipforreviewQuestion(){
	var getSno = $('#currentQNo').val();
	//alert(getSno);
	var lastquestion = $('#lastQuestion').val();
	var totalq = parseInt(lastquestion) - 1;
	var lastunattemp = $('#lastunattemp').val();
	$("#bg"+getSno).removeClass("bg-success");
	$("#bg"+getSno).addClass("bg-violet");
	var get_question_mode = $('#qmode'+getSno).html();
	//alert('mode-'+get_question_mode);
	if(get_question_mode == 'attempted'){
	var no_of_attempted = $('#attempted').html();
	var no_of_skippedforreview = $('#skippedforreview').html();
	//alert(no_of_unattempt);
	var remain_attempted = parseInt(no_of_attempted) - 1;
	var add_skippedforreview = parseInt(no_of_skippedforreview) + 1;
	$('#qmode'+getSno).html('skippedforreview')
	$('#attempted').html(remain_attempted);
	$('#skippedforreview').html(add_skippedforreview);
	var question_id = $('#currentQId').val();
	var selectedOption  =   document.querySelector('input[type=radio]:checked');
	var answere = selectedOption.value;
	sessionStorage.removeItem(question_id);
	var marks = $('#marks').html();
	var minus_marks = $('#minus_marks').val();
	var answere_srting = answere + '-' + marks + '-' + minus_marks;
	localStorage.setItem(question_id, answere_srting)
	loadQuestionbySNo(lastunattemp);
	}
	else{
		loadQuestionbySNo(lastunattemp);
	}
	
	
}
function getPrevious(){
	var getSno = $('#currentQNo').val();
	//alert(getSno);
	var nextq = parseInt(getSno) -1;
	
	loadQuestionbySNo(nextq);
	
	
}
function getquesbyids(ques_id, marks, btnid){
	//alert(ques_id+'-'+marks+'-'+btnid);
	//console.log($.ajax);
	if(btnid == '1'){
		//document.getElementById('previousButton').style.display = 'none';
		$("#previousButton").hide();
	}
	else{
		//document.getElementById('previousButton').style.display = 'display';
		$("#previousButton").show();
	}
	var lastquestion = $('#lastQuestion').val();
	var totalq = parseInt(lastquestion) - 1;
	///alert(totalq);
	if(totalq == parseInt(btnid)){
		
		$('#skipButton').hide();
		$('#btnsavenext').html('Save');
	}
	else{
		
		$('#skipButton').show();
		$('#btnsavenext').html('Save &amp; Next');
		
	}
	$.ajax({
                type      : 'POST',
                url       : '<?php echo base_url('secure/exam/getquestionbyid/');?>',
				data	  : 'qid='+ques_id,
                dataType  :'JSON',
                success   : function(response){
                  console.log(response.founddata);
				  //document.getElementById('dques').innerHTML = response.founddata.ques;
				  $('#dques').html(response.founddata.ques);
				  document.getElementById('opt1').innerHTML = response.founddata.opt_1;
				  document.getElementById('opt2').innerHTML = response.founddata.opt_2;
				  document.getElementById('opt3').innerHTML = response.founddata.opt_3;
				  document.getElementById('opt4').innerHTML = response.founddata.opt_4;
				  document.getElementById('IndexQues').innerHTML = btnid;
				  document.getElementById('currentQId').value = response.founddata.id;
				  document.getElementById('currentQNo').value = btnid;
				  document.getElementById('marks').innerHTML = marks;
				  document.getElementById('minus_marks').value = 1;
				  $('input[type=radio]:checked').prop('checked', false).uniform('refresh');
				  
	$Question_mode = $('#qmode'+btnid).html();
	//alert($Question_mode);
	
	if($Question_mode == 'attempted'){
		var getans = sessionStorage.getItem(ques_id);
		var a = getans.split('-');
		console.log(getans);
		if(a[0] !=null){
		$('#'+a[0]).prop('checked', true).uniform('refresh');
		$('#skipButton').hide();
		$('#skipforPreviewButton').show();
		
		}
	}
	if($Question_mode == 'skippedforreview'){
		var getans = localStorage.getItem(ques_id);
		var b = getans.split('-');
		console.log(getans);
		if(b[0] !=null){
		$('#'+b[0]).prop('checked', true).uniform('refresh');
		$('#skipButton').hide();
		$('#skipforPreviewButton').show();
		}
	}
	
	if($Question_mode == 'unattempted'){
		$('#skipButton').show();
		$('#skipforPreviewButton').hide();
		$('#lastunattemp').val(btnid);
		
	}
	if($Question_mode == 'skiped'){
		$('#skipButton').show();
		$('#skipforPreviewButton').hide();
		
		
	}
		}		
            });
			
}

function final_submission(){
	window.onbeforeunload = null;
	var r = confirm("Are You Sure! You want to final submission?");
	if (r == true) {
		
	var jsonString = JSON.stringify(sessionStorage);
	console.log(jsonString);
	var exam_id = '<?=$getexam['id']?>';
	var exam_duration = '<?=$examduration;?>';
	var remaining_timer = $('#demo').html();
	var sub_id = '<?=$subject['id']?>';
	var class_id = '<?=$class['id']?>';
	var total_question = $('#total').html();
	var total_marks = $('#TOTALMARKS').val();
	var unattempted = $('#unattempted').html();
	var skipped = $('#skiped').html();
	var attempted = $('#attempted').html();
	var skippedforReview = $('#skippedforreview').html();
	
	var send_data = [{'exam_id':exam_id},
	{'exam_duration':exam_duration},
	{'remaining_timer':remaining_timer},
	{'sub_id':sub_id},
	{'class_id':class_id},
	{'total_question':total_question},
	{'total_marks':total_marks},
	{'unattempted':unattempted},
	{'skipped':skipped},
	{'attempted':attempted},
	{'skippedforReview':skippedforReview},
	{'answare_data':jsonString}];
	var data = JSON.stringify(send_data);
	console.log(data);
	$.ajax({
                type      : 'POST',
                url       : '<?php echo base_url('secure/subject/getResult');?>',
				data	  : 'data='+data,
                dataType  :'JSON',
                success   : function(response){
					console.log(response);
					var url = '<?php echo base_url('secure/subject/showResult');?>'+'/'+response.rowid;
					window.location.href = url;
					}
	});
	
	////alert('Final Submission Successful!');
	//alert(jsonString);
	
	}
}

function timeout_submission(){
	window.onbeforeunload = null;
	///alert('Time Out!');
	var jsonString = JSON.stringify(sessionStorage);
	console.log(jsonString);
	var exam_id = '<?=$getexam['id']?>';
	var exam_duration = '<?=$examduration;?>';
	var remaining_timer = $('#demo').html();
	var sub_id = '<?=$subject['id']?>';
	var class_id = '<?=$class['id']?>';
	var total_question = $('#total').html();
	var total_marks = $('#TOTALMARKS').val();
	var unattempted = $('#unattempted').html();
	var skipped = $('#skiped').html();
	var attempted = $('#attempted').html();
	var skippedforReview = $('#skippedforreview').html();
	
	var send_data = [{'exam_id':exam_id},
	{'exam_duration':exam_duration},
	{'remaining_timer':remaining_timer},
	{'sub_id':sub_id},
	{'class_id':class_id},
	{'total_question':total_question},
	{'total_marks':total_marks},
	{'unattempted':unattempted},
	{'skipped':skipped},
	{'attempted':attempted},
	{'skippedforReview':skippedforReview},
	{'answare_data':jsonString}];
	var data = JSON.stringify(send_data);
	console.log(data);
	$.ajax({
                type      : 'POST',
                url       : '<?php echo base_url('secure/subject/getResult');?>',
				data	  : 'data='+data,
                dataType  :'JSON',
                success   : function(response){
					console.log(response);
					var url = '<?php echo base_url('secure/subject/showResult');?>'+'/'+response.rowid;
					window.location.href = url;
					}
	});
}
</script>
<script type="text/javascript"> 
		
window.onbeforeunload = function(){
return 'Are you sure you want to leave?';
};		
$('body').bind('cut copy paste', function (e) {
        e.preventDefault();
    });
   
    //Disable mouse right click
    $("body").on("contextmenu",function(e){
        return false;
    });		
// Set the date we're counting down to
//var countDownDate = new Date().getTime();
var duration = '<?=$examduration;?>';
var countDownDate = new Date().getTime() + (1000 * 60 * duration);
// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
	
	
  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24))/(1000 * 60 * 60)); 
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = hours + "h " + minutes + "m " + seconds + "s ";
	
  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
	timeout_submission();
    document.getElementById("demo").innerHTML = "EXPIRED";
	
  }
  else if(distance < 30000){
	   $('#demo').fadeOut(500);
    	$('#demo').fadeIn(500);
		$('#demo').css('color','red');
		$('#demo').css('font-size','20px');
  }
}, 1000);

		
		
</script>