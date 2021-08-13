
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
					<div class="panel panel-flat col-sm-4">
							<div class="panel-heading">
								<h5 class="panel-title">Question No.1 :</h5>
								<div class="heading-elements">
									
			                	</div>
							</div>

							<div class="panel-body" style="min-height:250px;">
								<div class="row">
                                <span id="question" style="font-weight:bold;"></span>
									
                                    
								</div>

								
							</div>
						</div>
                        <div class="panel panel-flat col-sm-4">
							<div class="panel-heading">
								<h5 class="panel-title">Option</h5>
								<div class="heading-elements">
									
			                	</div>
							</div>

							<div class="panel-body" style="min-height:250px;">
								<div class="row">
									<label class="radio-inline">
									<div class="choice border-primary text-primary-600">
                                    <input type="radio" class="styled" name="opt" value="opt_1" id=""></div>
									A. They reproduce
									</label> <br><br>
                                    <label class="radio-inline">
									<div class="choice border-primary text-primary-600">
                                    <input type="radio" class="styled" name="opt" value="opt_2"></div>
									B. They acquire energy
									</label><br><br>
                                    <label class="radio-inline">
									<div class="choice border-primary text-primary-600">
                                    <input type="radio" class="styled" name="opt" value="opt_3"></div>
									C. They respond to stimuli
									</label><br><br>
                                    <label class="radio-inline">
									<div class="choice border-primary text-primary-600">
                                    <input type="radio" class="styled" name="opt" value="opt_4"></div>
									D. All of the above
									</label>
								</div>

								
							</div>
						</div>
                        <div class="panel panel-flat col-sm-4">
							<div class="panel-heading">
								<h5 class="panel-title">Time Remaining <span id="displayTime" style="color:#000;"></span></h5>
								<div class="heading-elements">
									
			                	</div>
							</div>

							<div class="panel-body" style="min-height:250px;">
								<div class="row">
									<a onClick="alert('hi');"><span class="badge bg-primary">1</span></a>
                                    
                                    <a onClick="alert('hi');"><span class="badge bg-info">2</span></a>
                                    
                                    <a onClick="alert('hi');"><span class="badge bg-primary">3</span></a>
                                    
								</div>

								
							</div>
						</div>

</div>

<div class="row">
					<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title"></h5>
								<div class="heading-elements">
									
			                	</div>
							</div>

							<div class="panel-body">
								<div class="row">
                                <div class="col-md-4">
									<a href="#" class="btn btn-info">Previous</a>
                                    </div>
                                    <div class="col-md-6"></div>
                                    <div class="col-md-2">
                                    <input type="submit" value="Final Submit" id="finalSave" class="btn btn-primary" style="display:none;">
	
                        <input type="button" id="nextButton" class="btn btn-primary" value="Save & Next Question" onclick="loadNextQuestion()">
                                    </div>
								</div>


							</div>
						</div>
                        

</div>

</div>


<script>
    var currentQuestion =   0;
    var questionIndex  =    0;
    var notAttemptQuestion = 0;
	var storAttempdQueWithAnswer	=	{};
	var allAttemptQue	=	new Array();
    var selectedValue = '';
    var totalQuestion = '';
    var allResponceData = '';
    var questionEl  =   document.getElementById('question');
    var  option1    =   document.getElementById('option1');
    var  option2    =   document.getElementById('option2');
    var  option3    =   document.getElementById('option3');
    var  option4    =   document.getElementById('option4');
    var  nextbtn    =   document.getElementById('nextButton');
	var forLoadattem	= 0;
	var forNotLoad = 0;
	var totalTime = document.getElementById('remainTime').value;
	var forSetDataBase = '';
	// var selectedOption = '';
	// var  btnPrev	=	document.getElementById('previousButton');	
    // document.getElementById('previousButton').style.display = 'none';
 

    var  startExam   =   function(){
            $.ajax({
                type      : 'POST',
                url       : '<?php echo base_url('student/Student_auth/getAllQuestion');?>',
                dataType  :'JSON',
                success   : function(response){
                            allResponceData =   response;
							for(let i = 0 ; i <= response.length - 1 ; i++){
									if(allResponceData[i].selectedOption != null){
										document.getElementById('btn'+allResponceData[i].queId).style.background = 'green';
										forLoadattem ++;
									}
							}
							// document.getElementById('attemped').textContent = forLoadattem;
                            loadQuestion(currentQuestion);
                            totalQuestion   =   response.length;
							
                }
            });
    }

    var loadQuestion    =   function(currentQuestionIndex){
        questionIndex   =   currentQuestionIndex + 1;
        questionEl.textContent    = 'Question '+ questionIndex + ' : '+ allResponceData[currentQuestionIndex].question; 
        option1.textContent       =  allResponceData[currentQuestionIndex].opt_1; 
        option2.textContent       =  allResponceData[currentQuestionIndex].opt_2; 
        option3.textContent       =  allResponceData[currentQuestionIndex].opt_3; 
        option4.textContent       =  allResponceData[currentQuestionIndex].opt_4; 
		if(allResponceData[currentQuestionIndex].selectedOption != null){
			// console.log('radio'+allResponceData[currentQuestionIndex].selectedOption);
			  document.getElementById('radio'+allResponceData[currentQuestionIndex].selectedOption).checked = true;
			  
		}
		// if(allAttemptQue.length > 0){
		// 			var getAllStorageDataItem	=	JSON.parse(localStorage.getItem('storeDataItem'));
		// 			document.getElementById('radio'+getAllStorageDataItem[currentQuestionIndex].selectedOption).checked = true;
		// }
		

    }

    var loadNextQuestion    =   function(){
        // getSelected radio
		// document.getElementById('previousButton').style.display = 'block';
      var   selectedOption  =   document.querySelector('input[type=radio]:checked');
        if(!selectedOption){
            // option not selected
            notAttemptQuestion ++;
            currentQuestion ++;
            if(currentQuestion == totalQuestion - 1){
                nextbtn.style.display     =   'none';
				document.getElementById('finalSave').style.display = 'block';
            }

			storAttempdQueWithAnswer =	{
					'ques_id'	 	 :   allResponceData[currentQuestion].queId ,
					'selectedOption' :   '' ,
					'languageId'	 :   '<?php echo $this->session->userdata('language_id');?>',
					'sector_id'	 	 :   '<?php echo $this->session->userdata('sector_id');?>',
					'courses_id'	 :   '<?php echo $this->session->userdata('courses_id');?>',
					'exam_date'	 	 :   '<?php echo date('Y-m-d');?>',
					'answerFlag'	 :   '<?php echo "W";?>',
					'mark'	 		 :   '<?php echo "0";?>' ,
					'remaning_time'  :   forSetDataBase
			 };
			//  alert(currentQuestion);
            loadQuestion(currentQuestion);
        }else{
           		 // after  option selected
					forNotLoad ++; 
					// document.getElementById('attemped').textContent = parseInt(document.getElementById('attemped').textContent) + forNotLoad;
				if(allResponceData[currentQuestion].answer == selectedOption.value){
					 var answerFlag = 'C';
					 var mark 		= allResponceData[currentQuestion].marks;
				}else{
					 var answerFlag = 'W';
					 var mark 		= '0';
				}
				storAttempdQueWithAnswer =	{
						'ques_id'	 	 :   allResponceData[currentQuestion].queId ,
						'selectedOption' :   selectedOption.value ,
						'languageId'	 :   '<?php echo $this->session->userdata('language_id');?>',
						'sector_id'	 	 :   '<?php echo $this->session->userdata('sector_id');?>',
						'courses_id'	 :   '<?php echo $this->session->userdata('courses_id');?>',
						'exam_date'	 	 :   '<?php echo date('Y-m-d');?>',
						'answerFlag'	 :   answerFlag ,
						'mark'	 		 :   mark ,
						'remaning_time'  :   forSetDataBase
				};

				selectedValue   =   selectedOption.value;
				selectedOption.checked  =   false;
				currentQuestion ++;
				if(currentQuestion == totalQuestion - 1){
					nextbtn.style.display     =   'none';
					document.getElementById('finalSave').style.display = 'block';
				}

				loadQuestion(currentQuestion);
           
        }
			//start store data in localstorage
			// allAttemptQue.push(storAttempdQueWithAnswer);
			// localStorage.setItem('storeDataItem',JSON.stringify(allAttemptQue));
			// alert(JSON.stringify(storAttempdQueWithAnswer) );
			$.ajax({
					type      : 'POST',
					url       : '<?php echo base_url('student/Student_auth/saveSelectedQuestion');?>',
					data	  : 'getFinalData='+ JSON.stringify(storAttempdQueWithAnswer) ,
					dataType  : 'JSON',
					success   : function(response){
						if(response.forColor == true){
							document.getElementById('btn'+response.questionIdForBtn).style.background = 'green';
						}	
					}
			});
		//start store data in localstorage
		
    }

	var getClickQuestion	=	function(getId , Qindex){
		// alert(getId+'-'+Qindex);
		$.ajax({
					type      : 'POST',
					url       : '<?php echo base_url('student/Student_auth/getQuestionById');?>',
					data	  : 'getId='+getId,
					dataType  : 'JSON',
					success   : function(response){
						Qindex = Qindex + 1;
						questionEl.textContent    =  'Question '+ Qindex + ' : '+response.findData.question;
						option1.textContent    	  =  response.findData.opt_1;
						option2.textContent       =  response.findData.opt_2; 
						option3.textContent       =  response.findData.opt_3; 
						option4.textContent       =  response.findData.opt_4;
						currentQuestion 		  =  Qindex;
						if(currentQuestion == totalQuestion){
							nextbtn.style.display     =   'none';
							document.getElementById('finalSave').style.display = 'block';
						}else{
							nextbtn.style.display = 'block';
							document.getElementById('finalSave').style.display = 'none';
						}
						currentQuestion --;
						if(response.notAttempt == true){
								document.getElementById('radio'+response.findData.selectedOption).checked = true;
						}
						else if(response.notAttempt == false){
							    let findOption = document.querySelector('input[type=radio]:checked');
								if(findOption){
									findOption.checked = false;
								}
						}
					}
			});
	}





</script>

<script>
$(document).ready(function () {
	//window.onbeforeunload = function(){
  //return 'Are you sure you want to leave?';
//};	
    //Disable cut copy paste
    $('body').bind('cut copy paste', function (e) {
        e.preventDefault();
    });
   
    //Disable mouse right click
    $("body").on("contextmenu",function(e){
        return false;
    });
});
// time countdown
var time_in_minutes = 10;
var current_time = Date.parse(new Date());

var deadline = new Date(current_time + time_in_minutes*60*1000);


function time_remaining(endtime){
	var t = Date.parse(endtime) - Date.parse(new Date());
	var seconds = Math.floor( (t/1000) % 60 );
	var minutes = Math.floor( (t/1000/60) % 60 );
	var hours = Math.floor( (t/(1000*60*60)) % 24 );
	var days = Math.floor( t/(1000*60*60*24) );
	return {'total':t, 'days':days, 'hours':hours, 'minutes':minutes, 'seconds':seconds};
}
function run_clock(id,endtime){
	var clock = document.getElementById(id);
	
	function update_clock(){
		var t = time_remaining(endtime);
		forSetDataBase = t.minutes+' : '+t.seconds;
		if(t.minutes == '1'){
			clock.classList.add('alertBlink');
		}
		clock.innerHTML = checkTime(t.minutes)+' : '+checkTime(t.seconds);
		if(t.total<=0){ clearInterval(timeinterval); }
	}
	update_clock(); // run function once at first to avoid delay
	var timeinterval = setInterval(update_clock,1000);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
run_clock('displayTime', deadline);

//time countdown
// form submit after given time
function formSubmitAfterTime(){
	
     var submit = false;
     $("#myform").submit(function() {
          alert('time out');
     });
	 setTimeout(function(){
              submit = true;
              $("#myform").submit(); // if you want            
     },  parseFloat(document.getElementById('remainTime').value) * 60000);
	 
}
// form submit after given time

history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
};

// All Data In Other Language
var  allDataInOtherLanguage   =   function(){
            $.ajax({
                type      : 'POST',
                url       : '<?php echo base_url('student/Student_auth/getAllQuestionInOtherLanguage');?>',
                dataType  :'JSON',
                success   : function(response){
					
							
                }
            });
    }

</script>