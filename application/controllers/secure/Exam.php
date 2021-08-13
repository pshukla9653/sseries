<?php

class Exam extends Admin_Controller{
    function __construct()
    {
        parent::__construct();
		$this->not_logged_in();
		$this->load->model('secure/Exam_model');
		//$this->load->library('Mycalendar');
		
    } 

    /*
     * Listing of Countries<?php include ("Exam.php");?>
     */
    function index(){
        //$per = $this->check_permission();
		$data = array();
			    $data['title']		= 'ADD | Exam';
			   
		
			   $this->form_validation->set_rules("exam_name", "Exam Name", "trim|required");
			  
			   $data['getmode'] 	 = 	  $this->Exam_model->get_all_list('tbl_exam', array('status !=' => 3));
			   $data['sublist'] 	 = 	  $this->Exam_model->get_all_list('tbl_subject', array('status' => 1));
				  //echo '<pre>';var_dump($data['getsubService'][1]['subservicename'] );exit;
				   if ($this->form_validation->run() == FALSE) {
					   $this->render_template('secure/exam/index', $data);
					}
				   else
				   {
					   if($this->input->post("btn")  == 'Submit')
					   { 
								$params =array(
									'exam_name' 	   			 => $this->input->post('exam_name'),
									'exam_fee' 	   				 => $this->input->post('exam_fee'),
									'sub_ids'					 => implode(',', $this->input->post('sub_ids')),
									'status'			   		 => $this->input->post('status'),
									'createdby' 				 => $this->session->userdata('id'),
									'createdon' 				 => date_timestamp_get(date_create())
							   );
							  
								$getdate =  $this->Exam_model->get_data('tbl_exam', array('exam_name'=>$params['exam_name']));
								  if($getdate==''){
									  $insert_id = $this->Exam_model->insert_data('tbl_exam', $params);
								  if($insert_id) {
									  $this->session->set_flashdata('msg', '<div class="alert alert-success">Record Add Successfully</div>');
												redirect('secure/exam/index');	
									}else{
												$this->session->set_flashdata('msg', '<div class="alert alert-warning">Invalid! Error Occured.</div>');
												redirect('secure/exam/index');			
										 }
								  }
								  else{
												$this->session->set_flashdata('msg', '<div class="alert alert-danger">Data Already Exist!</div>');
												redirect('secure/exam/index');				
										 }
							
					   }
					   
					   if($this->input->post("btn")  == 'Update')
					   { 
					   			$id = $this->input->post('exam_id');
								$params =array(
									'exam_name' 	   			 => $this->input->post('exam_name'),
									'exam_fee' 	   				 => $this->input->post('exam_fee'),
									'sub_ids'					 => implode(',', $this->input->post('sub_ids')),
									'status'			   		 => $this->input->post('status'),
									'updatedby' 				 => $this->session->userdata('id'),
									'updatedon' 				 => date_timestamp_get(date_create())
							   );
							  
								$getdate =  $this->Exam_model->get_data('tbl_exam', array('exam_name'=>$params['exam_name'],'id!='=>$id));
								  if($getdate==''){
									  $insert_id = $this->Exam_model->update_data('tbl_exam', array('id'=>$id), $params);
								  if($insert_id) {
									  $this->session->set_flashdata('msg', '<div class="alert alert-success">Record Update Successfully</div>');
												redirect('secure/exam/index');	
									}else{
												$this->session->set_flashdata('msg', '<div class="alert alert-warning">Invalid! Error Occured.</div>');
												redirect('secure/exam/index');			
										 }
								  }
								  else{
												$this->session->set_flashdata('msg', '<div class="alert alert-danger">Data Already Exist!</div>');
												redirect('secure/exam/index');				
										 }
							
					   }
				   }
		
		
		
		
    }
	
	public function getmodeDetail() {
		
			      $data = array('success' => false, 'messages' => array(),'founddata' => "");
				   if(!empty($_POST['getId'])){
						$datafound =  $this->Exam_model->get_data('tbl_exam', array('id'=>$_POST['getId']));
						if($datafound != ''){
							$data['founddata'] = $datafound;
							$data['success'] = true;
						}
						echo json_encode($data);
				   }
		
    }
public function getquestionbyid($id) {
		
			      $data = array('success' => false, 'messages' => array(),'founddata' => "");
				   if($_POST['qid']){
						$datafound =  $this->Exam_model->get_data('t bl_question', array('id'=>$_POST['qid']));
					
						if($datafound != ''){
							$data['founddata'] = $datafound;
							$data['success'] = true;
						}
						echo json_encode($data);
				   }
		
    }
    function Setting(){	
		//echo var_dump($this->splitn(45,12)); exit;
        //$per = $this->check_permission();
		$data = array();	
			    $data['title']		= 'Main Exam Setting';
			   
				if($this->input->post("btn")  == 'Submit')
					  
				$this->form_validation->set_rules("exam_id", "Exam", "trim|required");
				$this->form_validation->set_rules("class_id", "Class", "trim|required");
				$this->form_validation->set_rules("sub_id", "Subject", "trim|required");
			   $this->form_validation->set_rules("exam_duration", "Exam Duration", "trim|required|numeric");
			   $this->form_validation->set_rules("marks", "Mark", "trim|required");
			   $this->form_validation->set_rules("minus_marks", "Minus Mark", "trim|required|numeric");
			   $this->form_validation->set_rules("no_of_ques", "No. of Question", "trim|required|numeric");
			   $data['examlist'] 	 = 	  $this->Exam_model->get_all_list('tbl_exam', array('status' => 1));
			   $data['classlist'] 	 = 	  $this->Exam_model->get_all_list('tbl_class', array('status' => 1));
			   $data['examsettinglist'] 	 = 	  $this->Exam_model->get_main_exam_setting_list();
				  				   if ($this->form_validation->run() == FALSE) {
					   $this->render_template('secure/exam/mainExamSetting', $data);
					}
				   else
				   {//echo var_dump($_POST );exit;

					   if($this->input->post("btn")  == 'Submit')
					   { //var_dump($_POST); exit;
								$params =array(
									'exam_id'					 => $this->input->post('exam_id'),
									'class_id'					 => $this->input->post('class_id'),
									'sub_id'					 => $this->input->post('sub_id'),
									'exam_duration'				 => $this->input->post('exam_duration'),
									'marks' 	   			 	 => $this->input->post('marks'),
									'minus_marks' 	   			 => $this->input->post('minus_marks'),
									'no_of_ques' 	   			 => $this->input->post('no_of_ques'),
									'status'			   		 => $this->input->post('status'),
									'createdby' 				 => $this->session->userdata('id'),
									'createdon' 				 => date_timestamp_get(date_create())
							   );
							  
								 $insert_id = $this->Exam_model->insert_data('tbl_main_exam_setting', $params);
								  
									 
								  if($insert_id) {
									  $this->session->set_flashdata('msg', '<div class="alert alert-success">Record Add Successfully</div>');
												redirect('secure/exam/Setting');	
									}else{
												$this->session->set_flashdata('msg', '<div class="alert alert-warning">Invalid! Error Occured.</div>');
												redirect('secure/exam/Setting');			
										 }
								  
								  
							
					   }
					   
					   if($this->input->post("btn")  == 'Update')
					   { 
					   			$id = $this->input->post('setting_id');
								$params =array(
									'exam_id'					 => $this->input->post('exam_id'),
									'sub_id'					 => $this->input->post('sub_id'),
									'class_id'					 => $this->input->post('class_id'),
									'exam_duration'				 => $this->input->post('exam_duration'),
									'marks' 	   			 	 => $this->input->post('marks'),
									'minus_marks' 	   			 => $this->input->post('minus_marks'),
									'no_of_ques' 	   			 => $this->input->post('no_of_ques'),
									'status'			   		 => $this->input->post('status'),
									'updatedby' 				 => $this->session->userdata('id'),
									'updatedon' 				 => date_timestamp_get(date_create())
							   );
							  
								$getdate =  $this->Exam_model->get_data('tbl_main_exam_setting', array('exam_id'=>$params['exam_id'],'sub_id'=>$params['sub_id'],'class_id'=>$params['class_id'],'id!='=>$id));
								  if($getdate==''){
									  $insert_id = $this->Exam_model->update_data('tbl_main_exam_setting', array('id'=>$id), $params);
								  if($insert_id) {
									  $this->session->set_flashdata('msg', '<div class="alert alert-success">Record Update Successfully</div>');
												redirect('secure/exam/Setting');	
									}else{
												$this->session->set_flashdata('msg', '<div class="alert alert-warning">Invalid! Error Occured.</div>');
												redirect('secure/exam/Setting');		
										 }
								  }
								  else{
												$this->session->set_flashdata('msg', '<div class="alert alert-danger">Data Already Exist!</div>');
												redirect('secure/exam/Setting');					
										 }
							
					   }
				   }
		
		
		
		
    }
	
	public function getexamsettingDetail() {
		
			      $data = array('success' => false, 'messages' => array(),'founddata' => "");
				   if(!empty($_POST['getId'])){
						$datafound =  $this->Exam_model->get_data('tbl_main_exam_setting', array('id'=>$_POST['getId']));
						$sub =  $this->Exam_model->get_data('tbl_subject', array('id'=>$datafound['sub_id']));
						if($datafound != ''){
							$datafound['sub_name'] = $sub['sub_name'];
							$data['founddata'] = $datafound;
							$data['success'] = true;
						}
						echo json_encode($data);
				   }
		
    }
	
	public function demo(){
		
		if($this->session->userdata('id')=='1'){
			$data['examlist'] 	 = 	  $this->Exam_model->get_all_list('tbl_exam', array('status' => 1));
		}
		else{
			$data['examlist'] 	 = 	  $this->Exam_model->get_all_list('tbl_exam', array('status' => 1,'id'=>$this->session->userdata('exam_id')));
		}
		
		////var_dump($data['examlist']); exit;
		$this->render_template('secure/exam/demoInstructions', $data);
	}
	public function Exam_demo($id){
		
		$data['getexam'] = $this->Exam_model->get_data('tbl_exam', array('id'=>$id));
		$sub_ids = explode(',', $data['getexam']['sub_ids']);
		if($id==1){
		$data['examduration'] =30;
		}else{
			$data['examduration'] =40;
		}
		$data['marks'] =4;
		$data['minusmark'] =1;
		$chapter_ids = array(77,6,43,104);
		for($i=0; $i < count($sub_ids); $i++){
			
			if($sub_ids[$i]=='1'){
				$no_question = 20;
			}
			else{
				$no_question = 10;
			}
			$sub_detail = $this->Exam_model->get_data('tbl_subject', array('id'=>$sub_ids[$i]));;
			$data['questionList'][$sub_detail['sub_name']] = $this->Exam_model->get_all_demo_list_limit('tbl_question', array('sub_id'=>$sub_ids[$i]), $no_question, array('chapter_id'=>array(77,6,43,104)));
			
		}
		
		 $this->render_template('secure/exam/demoexambb', $data);
		//var_dump($chapter_ids); exit;
		
	}
	function getdemoResult(){
		if($_POST['data']){
				$data = json_decode($_POST['data'], true);
				$params['student_id'] = $this->session->userdata('id');
				$params['obtain_mark'] = 0;
				$params['total_obtain_mark'] = 0;
				$params['nagetive_marks'] = 0;
				$params['correct_answere'] = 0;
				$params['nagetive_answere'] = 0;
				
				foreach($data as $k=>$v){
					foreach($v as $a=>$b){
					$params[$a]=$b;
					}
				}
				
				$answere_data = json_decode($params['answare_data'], true);
				
				$params['total_marks'] = (int)$params['total_question'] * (int)$params['mark'];
				
				foreach($answere_data as $ques_id=>$given_ans){
					$getquestiondata = $this->Exam_model->get_selected_value('ans', 'tbl_question', array('id'=>$ques_id));
					
					if($getquestiondata['ans'] == $given_ans){
						
						$params['correct_answere'] += 1;
						$params['obtain_mark'] += (int)$params['mark'];
						$ans_string[] = $ques_id.'-'.$given_ans.'-'.$getquestiondata['ans'].'-'.(int)$params['mark'].'-0';
						
					}
					else{
						$params['nagetive_answere'] += 1;
						$params['nagetive_marks'] += (int)$params['minus_mark'];
						$ans_string[] = $ques_id.'-'.$given_ans.'-'.$getquestiondata['ans'].'-0-'.(int)$params['minus_mark'];
					}
				}
				$params['answere_string'] = implode(',', $ans_string);
				$params['total_obtain_mark'] = $params['obtain_mark'] - $params['nagetive_marks'];
				$params['unattempted_percent'] = ((int)$params['unattempted'] / (int)$params['total_question']) * 100;
				$params['skipped_percent'] = ((int)$params['skipped'] / (int)$params['total_question']) * 100;
				$params['attempted_percent'] = ((int)$params['attempted'] / (int)$params['total_question']) * 100;
				$params['skippedforReview_percent'] = ((int)$params['skippedforReview'] / (int)$params['total_question']) * 100;
				$params['total_obtain_percent'] = ((int)$params['total_obtain_mark'] / (int)$params['total_marks']) * 100;
				$params['total_nagetive_percent'] = ((int)$params['nagetive_marks'] / (int)$params['total_marks']) * 100;
				
				
				///var_dump($params); exit;
				
				$checkdata = $this->Exam_model->get_selected_value('id', 'tbl_result_demo', array('student_id'=>$params['student_id'],'exam_id'=>$params['exam_id']));
				///var_dump($checkdata); exit;
				if($checkdata['id']){
					$params['updatedon'] = date_timestamp_get(date_create());
					$update = $this->Exam_model->update_data('tbl_result_demo', array('id'=>$checkdata['id']), $params);
					$status = 'update';
					
				}
				else{
					$params['createdon'] = date_timestamp_get(date_create());
					$insert_id = $this->Exam_model->insert_data('tbl_result_demo', $params);
					$status = 'insert';
				}
				if($status == 'insert'){
					$senddata['rowid'] = $insert_id;
				}
				if($status == 'update'){
					$senddata['rowid'] = $checkdata['id'];
				}
				echo json_encode($senddata);
				///var_dump($params);
				//exit;
		}
	}
	
	function showdemoResult($id){
		$resultdata =$this->Exam_model->get_selected_value('*', 'tbl_result_demo', array('id'=>$id));
		$studentdata =$this->Exam_model->get_selected_value('name,email,mobile_number', 'tbl_student', array('id'=>$resultdata['student_id']));
		$examdata =$this->Exam_model->get_selected_value('exam_name,sub_ids', 'tbl_exam', array('id'=>$resultdata['exam_id']));
		$result = array_merge($resultdata,$studentdata,$examdata);
		//unset($data['student_id']);
		//var_dump($result); exit;
		$data['subList'] = explode(',', $examdata['sub_ids']);
		$data['answereList'] = explode(',', $result['answere_string']);
		$data['resultdata'] = array(
								'Name' => $result['name'],
								'Email' => $result['email'],
								'Mobile Number' => $result['mobile_number'],
								'Exam' => $result['exam_name'],
								'Time Duration' => $result['exam_duration'].' Minutes',
								'Marks/Ques.' => $result['mark'],
								'Negative Marks/Ques.' => $result['minus_mark'],
								'Total Question' => $result['total_question'],
								'Unattempted Question' => $result['unattempted'],
								'Skipped Question' => $result['skipped'],
								'Skipped For Review Question' => $result['skippedforReview'],
								'Attempted Question' => $result['attempted'],
								'Correct Answer' => $result['correct_answere'],
								'Negative Answer' => $result['nagetive_answere'],
								'Total Marks' => $result['total_marks'],
								'Obtain Marks' => $result['obtain_mark'],
								'Negative Marks' => $result['nagetive_marks'],
								'Total Marks Obtained' => $result['total_obtain_mark'],
								'Obtained Percentage' => $result['total_obtain_percent'].' %',
								'Negative Percentage' => $result['total_nagetive_percent'].' %',
								);
		
		$this->render_template('secure/exam/demo_exam_result', $data);
	}
	
	public function MainExam(){
		if($this->session->userdata('id') == '1'){
		$data['ExamList'] = $this->Exam_model->get_all_list('tbl_exam', array('status'=>1));
		}
		else{
			
			$get_examlist = $this->Exam_model->get_all_list('tbl_student_exam', array('student_id'=>$this->session->userdata('id')));
			//var_dump($get_examlist); exit;
			foreach($get_examlist as $key=>$exa){
				
					$data['ExamList'][$key] = $this->Exam_model->get_data('tbl_exam', array('id'=>$exa['exam_id']));
				
			}
		}
		
		
		$this->render_template('secure/exam/examMainwise', $data);
	}
	
	public function examInstructions($exam_id, $attempt_id){
		$data['exam_id'] = $exam_id;
		$data['attempt_id'] = $attempt_id;
		
		$this->render_template('secure/exam/examInstructions', $data);
	}
	
	public function startMainExam($exam_id, $attempt_id){
		//////var_dump($this->session->userdata());
		//var_dump($this->splitn(9, 10));
		///exit;
		if($this->session->userdata('id') != '1'){
			if($this->session->userdata('exam_id') != $exam_id){
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid Exam!</div>');
				redirect('secure/exam/MainExam');	
			}
			
		}
		$getPaymentstate = $this->Exam_model->get_data('tbl_student_exam', array('student_id'=>$this->session->userdata('id'),'exam_id'=>$exam_id));
		if($getPaymentstate == NULL){
			$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid Test! You are not enrolled in selected test. Please make payment first. <a href="'.base_url('Razorpay/examPayment/'.$exam_id).'">Click here</a> for Enrollment</div>');
			redirect('secure/exam/MainExam');	
		}
		else{
				if($getPaymentstate['payment_status'] != '1'){
					$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid Test! You are not enrolled in selected test. Please make payment first. <a href="'.base_url('Razorpay/examPayment/'.$exam_id).'">Click here</a> for Enrollment</div>');
					redirect('secure/exam/MainExam');	
				}
				elseif($getPaymentstate['exam_status'] != '1'){
					$this->session->set_flashdata('msg', '<div class="alert alert-danger">You are not allowed in selected test. Contact admin for Allow!</div>');
					redirect('secure/exam/MainExam');	
				}
			 
		}
		$exam_duration = 0;
		$examdata =  $this->Exam_model->get_data('tbl_exam', array('id'=>$exam_id));
		
		$subids = explode(',', $examdata['sub_ids']);
		
		$sub_list = $this->Exam_model->get_sub_list_whereIn($subids);
		$class_list = $this->Exam_model->get_all_list('tbl_class', array('status'=>1));
		
		for($i=0; $i < count($class_list); $i++){
				for($r=0; $r < count($sub_list); $r++){
					$sub_name = $sub_list[$r]['sub_name'];
					$chapter_list =''; $question_distribution=''; $questionList='';  
					$exam_setting = $this->Exam_model->get_data('tbl_main_exam_setting', array('exam_id'=>$exam_id,'class_id'=>$class_list[$i]['id'],'sub_id'=>$sub_list[$r]['id'], 'status'=>1));
					$exam_duration += (int)$exam_setting['exam_duration'];
					
					$chapter_list = $this->Exam_model->get_all_list('tbl_chapter', array('class_id'=>$class_list[$i]['id'],'sub_id'=>$sub_list[$r]['id'], 'status'=>1));
					
					$question_distribution = $this->splitn((int)$exam_setting['no_of_ques'], count($chapter_list));
					shuffle($question_distribution);
					for($a=0; $a < count($question_distribution); $a++){
					if($question_distribution[$a] != 0){	
		 			$questionList = $this->Exam_model->get_all_ques_list_limit('id,sub_id', 'tbl_question', array('chapter_id'=>$chapter_list[$a]['id']), $question_distribution[$a]);
		 			$finalquestion[$sub_name][] = $questionList;
					}
					
					
		 }
				}
		}
		$marks = explode(',', $exam_setting['marks']);
		
		for($i = 0; $i < count($finalquestion); $i++){
			$sub_name = $sub_list[$i]['sub_name'];
			$g = 0;
				for($r=0; $r < count($finalquestion[$sub_name]); $r++){
					$question = $finalquestion[$sub_name][$r];
					if(count($question)){
						for($q=0; $q < count($question); $q++){
							shuffle($marks);
							$data['questionList'][$sub_name][$g]['id'] = $question[$q]['id'];
							$data['questionList'][$sub_name][$g]['marks'] = (int)$marks[0];
							$totalarks[] = (int)$marks[0];
							$g++;
						}
					
					}
				}
			
			
		}
		
		$data['examduration'] = $exam_duration;
		////$data['examduration'] = 1; 7931010165
		//var_dump($exam_setting); exit;
		$data['minusmark'] = (int)$exam_setting['minus_marks'];
		$data['attempt_id'] = $attempt_id;
		
		// $data['class'] = $this->Exam_model->get_data('tbl_class', array('id'=>$class_id));
		 $data['getexam'] = $this->Exam_model->get_data('tbl_exam', array('id'=>$exam_id));
		 $data['total_marks'] = array_sum($totalarks);
		
		//var_dump($data); exit;
		 $this->render_template('secure/exam/exam', $data);
		//var_dump($chapter_ids); exit;
		
	}
	
	public function getResult(){
		if($_POST['data']){
				$data = json_decode($_POST['data'], true);
				$params['student_id'] = $this->session->userdata('id');
				$params['obtain_mark'] = 0;
				$params['total_obtain_mark'] = 0;
				$params['nagetive_marks'] = 0;
				$params['correct_answere'] = 0;
				$params['nagetive_answere'] = 0;
				
				foreach($data as $k=>$v){
					foreach($v as $a=>$b){
					$params[$a]=$b;
					}
				}
				$getchapter = $this->Exam_model->get_selected_value('marks,minus_marks', 'tbl_main_exam_setting', array('exam_id'=>$params['exam_id']));
				
				$answere_data = json_decode($params['answare_data'], true);
				
				///$params['total_marks'] = (int)$params['total_question'] * (int)$params['mark'];
				
				foreach($answere_data as $ques_id=>$given_ans){
					$getquestiondata = $this->Exam_model->get_selected_value('ans', 'tbl_question', array('id'=>$ques_id));
					$answere = explode('-', $given_ans);
					if($getquestiondata['ans'] == $answere[0]){
						
						$params['correct_answere'] += 1;
						$params['obtain_mark'] += (int)$answere[1];
						$ans_string[] = $ques_id.'-'.$answere[0].'-'.$getquestiondata['ans'].'-'.(int)$answere[1].'-0';
						
					}
					else{
						$params['nagetive_answere'] += 1;
						$params['nagetive_marks'] += (int)$answere[2];
						$ans_string[] = $ques_id.'-'.$answere[0].'-'.$getquestiondata['ans'].'-0-'.(int)$answere[2];
					}
				}
				
				
				$params['mark'] = $getchapter['marks'];
				$params['minus_mark'] = $getchapter['minus_marks'];
				$params['answere_string'] = implode(',', $ans_string);
				$params['total_obtain_mark'] = $params['obtain_mark'] - $params['nagetive_marks'];
				$params['unattempted_percent'] = number_format(((int)$params['unattempted'] / (int)$params['total_question']) * 100, 2);
				$params['skipped_percent'] = number_format(((int)$params['skipped'] / (int)$params['total_question']) * 100, 2);
				$params['attempted_percent'] = number_format(((int)$params['attempted'] / (int)$params['total_question']) * 100, 2);
				$params['skippedforReview_percent'] = number_format(((int)$params['skippedforReview'] / (int)$params['total_question']) * 100, 2);
				$params['total_obtain_percent'] = number_format(((int)$params['total_obtain_mark'] / (int)$params['total_marks']) * 100, 2);
				$params['total_nagetive_percent'] = number_format(((int)$params['nagetive_marks'] / (int)$params['total_marks']) * 100, 2);
				
				
				///var_dump($params); exit;
				
				$checkdata = $this->Exam_model->get_selected_value('id', 'tbl_result_main_exam', array('student_id'=>$params['student_id'],'attempt_id'=>$params['attempt_id'],'exam_id'=>$params['exam_id']));
				///var_dump($checkdata); exit;
				if($checkdata['id']){
					$params['updatedon'] = date_timestamp_get(date_create());
					$update = $this->Exam_model->update_data('tbl_result_main_exam', array('id'=>$checkdata['id']), $params);
					$status = 'update';
					
				}
				else{
					$params['createdon'] = date_timestamp_get(date_create());
					$insert_id = $this->Exam_model->insert_data('tbl_result_main_exam', $params);
					$status = 'insert';
				}
				if($status == 'insert'){
					$senddata['rowid'] = $insert_id;
				}
				if($status == 'update'){
					$senddata['rowid'] = $checkdata['id'];
				}
				echo json_encode($senddata);
				///var_dump($params);
				//exit;
		}
	}
	
	public function showResult($id){
		$resultdata =$this->Exam_model->get_selected_value('*', 'tbl_result_main_exam', array('id'=>$id));
		$studentdata =$this->Exam_model->get_selected_value('name,email,mobile_number', 'tbl_student', array('id'=>$resultdata['student_id']));
		$examdata =$this->Exam_model->get_selected_value('exam_name,sub_ids', 'tbl_exam', array('id'=>$resultdata['exam_id']));
		$result = array_merge($resultdata,$studentdata,$examdata);
		//unset($data['student_id']);
		//var_dump($result); exit;
		$data['subList'] = explode(',', $examdata['sub_ids']);
		$data['answereList'] = explode(',', $result['answere_string']);
		$data['resultdata'] = array(
								'Name' => $result['name'],
								'Email' => $result['email'],
								'Mobile Number' => $result['mobile_number'],
								'Exam' => $result['exam_name'],
								'Mock Test' => $result['attempt_id'],
								'Time Duration' => $result['exam_duration'].' Minutes',
								'Marks/Ques.' => $result['mark'],
								'Negative Marks/Ques.' => $result['minus_mark'],
								'Total Question' => $result['total_question'],
								'Unattempted Question' => $result['unattempted'],
								'Skipped Question' => $result['skipped'],
								'Skipped For Review Question' => $result['skippedforReview'],
								'Attempted Question' => $result['attempted'],
								'Correct Answer' => $result['correct_answere'],
								'Negative Answer' => $result['nagetive_answere'],
								'Total Marks' => $result['total_marks'],
								'Obtain Marks' => $result['obtain_mark'],
								'Negative Marks' => $result['nagetive_marks'],
								'Total Marks Obtained' => $result['total_obtain_mark'],
								'Obtained Percentage' => $result['total_obtain_percent'].' %',
								'Negative Percentage' => $result['total_nagetive_percent'].' %',
								);
		//var_dump($data); exit;
		$this->render_template('secure/exam/demo_exam_result', $data);
		//$this->render_template('secure/chapter/exam', $data);
	}
	public function myExam(){
		$data['ExamList'] = $this->Exam_model->get_all_list('tbl_exam', array('status'=>1));
		$this->render_template('secure/exam/myexam', $data);
	}
}
