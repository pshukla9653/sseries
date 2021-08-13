<?php
 
class Subject extends Admin_Controller{
    function __construct()
    {
        parent::__construct();
		$this->not_logged_in();
		$this->load->model('secure/Subject_model');
		//$this->load->library('Mycalendar');
		
    } 

    /*
     * Listing of Countries
     */
    function index()
    {
        //$per = $this->check_permission();
		$data = array();
			    $data['title']		= 'Manage Subject';
			   
		
			   $this->form_validation->set_rules("sub_name", "Exam Name", "trim|required");
			  
			   $data['getmode'] 	 = 	  $this->Subject_model->get_all_list('tbl_subject', array('status !=' => 3));
				  //echo '<pre>';var_dump($data['getsubService'][1]['subservicename'] );exit;
				   if ($this->form_validation->run() == FALSE) {
					   $this->render_template('secure/subject/index', $data);
					}
				   else
				   {
					   if($this->input->post("btn")  == 'Submit')
					   { 
								$params =array(
									'sub_name' 	   			 => $this->input->post('sub_name'),
									'status'			   		 => $this->input->post('status'),
									'createdby' 				 => $this->session->userdata('id'),
									'createdon' 				 => date_timestamp_get(date_create())
							   );
							  
								$getdate =  $this->Subject_model->get_data('tbl_subject', array('sub_name'=>$params['sub_name']));
								  if($getdate==''){
									  $insert_id = $this->Subject_model->insert_data('tbl_subject', $params);
								  if($insert_id) {
									  $this->session->set_flashdata('msg', '<div class="alert alert-success">Record Add Successfully</div>');
												redirect('secure/subject/index');	
									}else{
												$this->session->set_flashdata('msg', '<div class="alert alert-warning">Invalid! Error Occured.</div>');
												redirect('secure/subject/index');			
										 }
								  }
								  else{
												$this->session->set_flashdata('msg', '<div class="alert alert-danger">Data Already Exist!</div>');
												redirect('secure/subject/index');				
										 }
							
					   }
					   
					   if($this->input->post("btn")  == 'Update')
					   { 
					   			$id = $this->input->post('sub_id');
								$params =array(
									'sub_name' 	   			 => $this->input->post('sub_name'),
									'status'			   		 => $this->input->post('status'),
									'updatedby' 				 => $this->session->userdata('id'),
									'updatedon' 				 => date_timestamp_get(date_create())
							   );
							  
								$getdate =  $this->Subject_model->get_data('tbl_subject', array('sub_name'=>$params['sub_name'],'id!='=>$id));
								  if($getdate==''){
									  $insert_id = $this->Subject_model->update_data('tbl_subject', array('id'=>$id), $params);
								  if($insert_id) {
									  $this->session->set_flashdata('msg', '<div class="alert alert-success">Record Update Successfully</div>');
												redirect('secure/subject/index');	
									}else{
												$this->session->set_flashdata('msg', '<div class="alert alert-warning">Invalid! Error Occured.</div>');
												redirect('secure/subject/index');			
										 }
								  }
								  else{
												$this->session->set_flashdata('msg', '<div class="alert alert-danger">Data Already Exist!</div>');
												redirect('secure/subject/index');				
										 }
							
					   }
				   }
		
		
		
		
    }
	public function getsubjectDetail() {
		
			      $data = array('success' => false, 'messages' => array(),'founddata' => "");
				   if(!empty($_POST['getId'])){
						$datafound =  $this->Subject_model->get_data('tbl_subject', array('id'=>$_POST['getId']));
						if($datafound != ''){
							$data['founddata'] = $datafound;
							$data['success'] = true;
						}
						echo json_encode($data);
				   }
		
    }
	
	function Setting()
    {	//echo var_dump($this->splitn(45,12)); exit;
        //$per = $this->check_permission();
		$data = array();	
			    $data['title']		= 'Exam Setting | Subject';
			   
				if($this->input->post("btn")  == 'Submit')
					  
				$this->form_validation->set_rules("sub_id", "Subject", "trim|required");
			   $this->form_validation->set_rules("exam_duration", "Exam Duration", "trim|required|numeric");
			   $this->form_validation->set_rules("marks", "Mark", "trim|required");
			   $this->form_validation->set_rules("minus_marks", "Minus Mark", "trim|required|numeric");
			   $this->form_validation->set_rules("no_of_ques", "No. of Question", "trim|required|numeric");
			   $data['examlist'] 	 = 	  $this->Subject_model->get_all_list('tbl_exam', array('status' => 1));
			  // $data['classlist'] 	 = 	  $this->Subject_model->get_all_list('tbl_class', array('status' => 1));
			   $data['examsettinglist'] 	 = 	  $this->Subject_model->get_subject_setting_list();
				  	if ($this->form_validation->run() == FALSE) {
					   $this->render_template('secure/subject/subjectWiseExamSetting', $data);
					}
				   else
				   {//echo var_dump($_POST );exit;

					   if($this->input->post("btn")  == 'Submit')
					   { //var_dump($_POST); exit;
								$params =array(
									'exam_id'					 => $this->input->post('exam_id'),
									'sub_id'					 => $this->input->post('sub_id'),
									'exam_duration'				 => $this->input->post('exam_duration'),
									'marks' 	   			 	 => $this->input->post('marks'),
									'minus_marks' 	   			 => $this->input->post('minus_marks'),
									'no_of_ques' 	   			 => $this->input->post('no_of_ques'),
									'status'			   		 => $this->input->post('status'),
									'createdby' 				 => $this->session->userdata('id'),
									'createdon' 				 => date_timestamp_get(date_create())
							   );
							  
								 $insert_id = $this->Subject_model->insert_data('tbl_subject_setting', $params);
								  
									 
								  if($insert_id) {
									  $this->session->set_flashdata('msg', '<div class="alert alert-success">Record Add Successfully</div>');
												redirect('secure/subject/Setting');	
									}else{
												$this->session->set_flashdata('msg', '<div class="alert alert-warning">Invalid! Error Occured.</div>');
												redirect('secure/subject/Setting');			
										 }
								  
								  
							
					   }
					   
					   if($this->input->post("btn")  == 'Update')
					   { 
					   			$id = $this->input->post('setting_id');
								$params =array(
									'exam_id'					 => $this->input->post('exam_id'),
									'sub_id'					 => $this->input->post('sub_id'),
									'exam_duration'				 => $this->input->post('exam_duration'),
									'marks' 	   			 	 => $this->input->post('marks'),
									'minus_marks' 	   			 => $this->input->post('minus_marks'),
									'no_of_ques' 	   			 => $this->input->post('no_of_ques'),
									'status'			   		 => $this->input->post('status'),
									'updatedby' 				 => $this->session->userdata('id'),
									'updatedon' 				 => date_timestamp_get(date_create())
							   );
							  
								$getdate =  $this->Subject_model->get_data('tbl_subject_setting', array('exam_id'=>$params['exam_id'],'sub_id'=>$params['sub_id'],'id!='=>$id));
								  if($getdate==''){
									  $insert_id = $this->Subject_model->update_data('tbl_subject_setting', array('id'=>$id), $params);
								  if($insert_id) {
									  $this->session->set_flashdata('msg', '<div class="alert alert-success">Record Update Successfully</div>');
												redirect('secure/subject/Setting');	
									}else{
												$this->session->set_flashdata('msg', '<div class="alert alert-warning">Invalid! Error Occured.</div>');
												redirect('secure/subject/Setting');			
										 }
								  }
								  else{
												$this->session->set_flashdata('msg', '<div class="alert alert-danger">Data Already Exist!</div>');
												redirect('secure/subject/Setting');				
										 }
							
					   }
				   }
		
		
		
		
    }
	
	public function getexamsettingDetail() {
		
			      $data = array('success' => false, 'messages' => array(),'founddata' => "");
				   if(!empty($_POST['getId'])){
						$datafound =  $this->Subject_model->get_data('tbl_subject_setting', array('id'=>$_POST['getId']));
						$sub =  $this->Subject_model->get_data('tbl_subject', array('id'=>$datafound['sub_id']));
						if($datafound != ''){
							$datafound['sub_name'] = $sub['sub_name'];
							$data['founddata'] = $datafound;
							$data['success'] = true;
						}
						echo json_encode($data);
				   }
		
    }
	public function getsubjectlist() {
		
				   if(!empty($_POST['exam_id'])){
						$examdata =  $this->Subject_model->get_selected_value('sub_ids', 'tbl_exam', array('id'=>$_POST['exam_id']));
						$sub_ids = explode(',', $examdata['sub_ids']);
						//var_dump($sub_ids); exit;
						if($examdata){
							echo '<option value="">Select Subject</option>';
							for($i=0; $i < count($sub_ids); $i++){
							$subdata = $this->Subject_model->get_selected_value('id,sub_name', 'tbl_subject', array('id'=>$sub_ids[$i]));
							echo '<option value="'.$subdata['id'].'">'.$subdata['sub_name'].'</option>';
							}
						}
						
						
				   }
		
    }
    
	public function SubjectExam(){
		if($this->session->userdata('id') == '1'){
		$data['ExamList'] = $this->Subject_model->get_all_list('tbl_exam', array('status'=>1));
		}
		else{
			
			$get_examlist = $this->Subject_model->get_all_list('tbl_student_exam', array('student_id'=>$this->session->userdata('id')));
			//var_dump($get_examlist); exit;
			foreach($get_examlist as $key=>$exa){
				
					$data['ExamList'][$key] = $this->Subject_model->get_data('tbl_exam', array('id'=>$exa['exam_id']));
				
			}
		}
		$data['classList'] = $this->Subject_model->get_all_list('tbl_class', array('status'=>1));
		
		$this->render_template('secure/subject/examSubjectwise', $data);
	}
	
	public function examInstructions($exam_id, $sub_id, $class_id){
		$data['exam_id'] = $exam_id;
		$data['sub_id'] = $sub_id;
		$data['class_id'] = $class_id;
		
		$this->render_template('secure/subject/examInstructions', $data);
	}
	
	public function startSubjectExam($exam_id, $sub_id, $class_id){
		//////var_dump($this->session->userdata());
		if($this->session->userdata('id') != '1'){
			if($this->session->userdata('exam_id') != $exam_id){
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid Exam</div>');
				redirect('secure/subject/SubjectExam');	
			}
			
		}
		$getPaymentstate = $this->Subject_model->get_data('tbl_student_exam', array('student_id'=>$this->session->userdata('id'),'exam_id'=>$exam_id));
		if($getPaymentstate == NULL){
			$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid Test! You are not enrolled in selected test. Please make payment first. <a href="'.base_url('Razorpay/examPayment/'.$exam_id).'">Click here</a> for Enrollment</div>');
			redirect('secure/subject/SubjectExam');	
		}
		else{
				if($getPaymentstate['payment_status'] != '1'){
					$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid Test! You are not enrolled in selected test. Please make payment first. <a href="'.base_url('Razorpay/examPayment/'.$exam_id).'">Click here</a> for Enrollment</div>');
					redirect('secure/subject/SubjectExam');	
				}
				elseif($getPaymentstate['exam_status'] != '1'){
					$this->session->set_flashdata('msg', '<div class="alert alert-danger">You are not allowed in selected test. Contact admin for Allow!</div>');
					redirect('secure/subject/SubjectExam');	
				}
			 
		}
		
		$get_subject_exam_setting = $this->Subject_model->get_data('tbl_subject_setting', array('exam_id'=>$exam_id,'sub_id'=>$sub_id, 'status'=>1));
		$capter_list = $this->Subject_model->get_all_list('tbl_chapter', array('class_id'=>$class_id,'sub_id'=>$sub_id, 'status'=>1));
		
		$data['examduration'] = (int)$get_subject_exam_setting['exam_duration'];
		////$data['examduration'] = 1; 7931010165
		$data['minusmark'] = (int)$get_subject_exam_setting['minus_marks'];
		$no_question = (int)$get_subject_exam_setting['no_of_ques'];
		$marks = explode(',', $get_subject_exam_setting['marks']);
		 $finalquestion =array();
	
		
		
		 $question_distribution = $this->splitn($no_question, count($capter_list));
		 shuffle($question_distribution);
		 for($i=0; $i < count($question_distribution); $i++){
		 $questionList = $this->Subject_model->get_all_ques_list_limit('id,sub_id,chapter_id', 'tbl_question', array('chapter_id'=>$capter_list[$i]['id']), $question_distribution[$i]);
		 
		 $finalquestion = array_merge($finalquestion,$questionList);
		 }
	///var_dump($finalquestion);
			//exit;
		 for($i=0; $i < count($finalquestion); $i++){
			 shuffle($marks);
			 $data['questionList'][$i]['id'] = $finalquestion[$i]['id'];
			 $data['questionList'][$i]['marks'] = $marks[0];
			 $totalarks[] = (int) $marks[0];
		 }
		
		 $data['class'] = $this->Subject_model->get_data('tbl_class', array('id'=>$class_id));
		 $data['getexam'] = $this->Subject_model->get_data('tbl_exam', array('id'=>$exam_id));
		 $data['subject'] = $this->Subject_model->get_data('tbl_subject', array('id'=>$questionList[0]['sub_id']));
		 $data['total_marks'] = array_sum($totalarks);
		
		
		 $this->render_template('secure/subject/exam', $data);
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
				
				$answere_data = json_decode($params['answare_data'], true);
				
				///$params['total_marks'] = (int)$params['total_question'] * (int)$params['mark'];
				
				foreach($answere_data as $ques_id=>$given_ans){
					$getquestiondata = $this->Subject_model->get_selected_value('ans', 'tbl_question', array('id'=>$ques_id));
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
				
				$getchapter = $this->Subject_model->get_selected_value('marks,minus_marks', 'tbl_subject_setting', array('exam_id'=>$params['exam_id']));
				
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
				
				$checkdata = $this->Subject_model->get_selected_value('id', 'tbl_result_subject', array('student_id'=>$params['student_id'],'class_id'=>$params['class_id'],'sub_id'=>$params['sub_id'],'exam_id'=>$params['exam_id']));
				///var_dump($checkdata); exit;
				if($checkdata['id']){
					$params['updatedon'] = date_timestamp_get(date_create());
					$update = $this->Subject_model->update_data('tbl_result_subject', array('id'=>$checkdata['id']), $params);
					$status = 'update';
					
				}
				else{
					$params['createdon'] = date_timestamp_get(date_create());
					$insert_id = $this->Subject_model->insert_data('tbl_result_subject', $params);
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
		$resultdata =$this->Subject_model->get_selected_value('*', 'tbl_result_subject', array('id'=>$id));
		$studentdata =$this->Subject_model->get_selected_value('name,email,mobile_number', 'tbl_student', array('id'=>$resultdata['student_id']));
		$examdata =$this->Subject_model->get_selected_value('exam_name,sub_ids', 'tbl_exam', array('id'=>$resultdata['exam_id']));
		$subdata =$this->Subject_model->get_selected_value('sub_name', 'tbl_subject', array('id'=>$resultdata['sub_id']));
		$classdata =$this->Subject_model->get_selected_value('class_name', 'tbl_class', array('id'=>$resultdata['class_id']));
		$result = array_merge($resultdata,$studentdata,$examdata,$subdata,$classdata);
		//unset($data['student_id']);
		//var_dump($result); exit;
		$data['subList'] = explode(',', $examdata['sub_ids']);
		$data['answereList'] = explode(',', $result['answere_string']);
		$data['resultdata'] = array(
								'Name' => $result['name'],
								'Email' => $result['email'],
								'Mobile Number' => $result['mobile_number'],
								'Exam' => $result['exam_name'],
								'Subject' => $result['sub_name'],
								'Class' => 'Class-'.$result['class_name'],
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
		$this->render_template('secure/subject/exam_result', $data);
		//$this->render_template('secure/chapter/exam', $data);
	}
	
	
}
