<?php
 
class Chapter extends Admin_Controller{
    function __construct()
    {
        parent::__construct();
		$this->not_logged_in();
		$this->load->model('secure/Chapter_model');
		//$this->load->library('Mycalendar');
		
    } 

    /*
     * Listing of Countries
     */
    function index()
    {
        //$per = $this->check_permission();
		$data = array();
			    $data['title']		= 'ADD | Chapter';
			   
		
			   $this->form_validation->set_rules("chapter_name", "Chapter Name", "trim|required");
			  
			   $data['getmode'] 	 = 	  $this->Chapter_model->get_chapter_list();
			   $data['sublist'] 	 = 	  $this->Chapter_model->get_all_list('tbl_subject', array('status' => 1));
			    $data['classlist'] 	 = 	  $this->Chapter_model->get_all_list('tbl_class', array('status' => 1));
				  //echo '<pre>';var_dump($data['getsubService'][1]['subservicename'] );exit;
				   if ($this->form_validation->run() == FALSE) {
					   $this->render_template('secure/chapter/index', $data);
					}
				   else
				   {
					   if($this->input->post("btn")  == 'Submit')
					   { //var_dump($_POST); exit;
								$params =array(
									'class_id'					 => $this->input->post('class_id'),
									'sub_id'					 => $this->input->post('sub_id'),
									'chapter_name' 	   			 => $this->input->post('chapter_name'),
									'status'			   		 => $this->input->post('status'),
									'createdby' 				 => $this->session->userdata('id'),
									'createdon' 				 => date_timestamp_get(date_create())
							   );
							  
								$getdate =  $this->Chapter_model->get_data('tbl_chapter', array('chapter_name'=>$params['chapter_name']));
								  if($getdate==''){
									  $insert_id = $this->Chapter_model->insert_data('tbl_chapter', $params);
								  if($insert_id) {
									  $this->session->set_flashdata('msg', '<div class="alert alert-success">Record Add Successfully</div>');
												redirect('secure/chapter/index');	
									}else{
												$this->session->set_flashdata('msg', '<div class="alert alert-warning">Invalid! Error Occured.</div>');
												redirect('secure/chapter/index');			
										 }
								  }
								  else{
												$this->session->set_flashdata('msg', '<div class="alert alert-danger">Data Already Exist!</div>');
												redirect('secure/chapter/index');				
										 }
							
					   }
					   
					   if($this->input->post("btn")  == 'Update')
					   { 
					   			$id = $this->input->post('chapter_id');
								$params =array(
									'class_id'					 => $this->input->post('class_id'),
									'sub_id'					 => $this->input->post('sub_id'),
									'chapter_name' 	   			 => $this->input->post('chapter_name'),
									'status'			   		 => $this->input->post('status'),
									'updatedby' 				 => $this->session->userdata('id'),
									'updatedon' 				 => date_timestamp_get(date_create())
							   );
							  
								$getdate =  $this->Chapter_model->get_data('tbl_chapter', array('chapter_name'=>$params['chapter_name'],'id!='=>$id));
								  if($getdate==''){
									  $insert_id = $this->Chapter_model->update_data('tbl_chapter', array('id'=>$id), $params);
								  if($insert_id) {
									  $this->session->set_flashdata('msg', '<div class="alert alert-success">Record Update Successfully</div>');
												redirect('secure/chapter/index');	
									}else{
												$this->session->set_flashdata('msg', '<div class="alert alert-warning">Invalid! Error Occured.</div>');
												redirect('secure/chapter/index');			
										 }
								  }
								  else{
												$this->session->set_flashdata('msg', '<div class="alert alert-danger">Data Already Exist!</div>');
												redirect('secure/chapter/index');				
										 }
							
					   }
				   }
		
		
		
		
    }
	public function getDetail() {
		
			      $data = array('success' => false, 'messages' => array(),'founddata' => "");
				   if(!empty($_POST['getId'])){
						$datafound =  $this->Chapter_model->get_data('tbl_chapter', array('id'=>$_POST['getId']));
						if($datafound != ''){
							$data['founddata'] = $datafound;
							$data['success'] = true;
						}
						echo json_encode($data);
				   }
		
    }

    function Setting()
    {	
        //$per = $this->check_permission();
		$data = array();
			    $data['title']		= 'Exam Setting | Chapter';
			   
				if($this->input->post("btn")  == 'Submit')
					   { //var_dump($_POST); exit;
			   $this->form_validation->set_rules("exam_id", "Exam", "trim|required|is_unique[tbl_chapter_setting.exam_id]");
					   }
			   $this->form_validation->set_rules("exam_duration", "Exam Duration", "trim|required|numeric");
			   $this->form_validation->set_rules("marks", "Mark", "trim|required");
			   $this->form_validation->set_rules("minus_marks", "Minus Mark", "trim|required|numeric");
			   $this->form_validation->set_rules("no_of_ques", "No. of Question", "trim|required|numeric");
			  $data['examlist'] 	 = 	  $this->Chapter_model->get_all_list('tbl_exam', array('status' => 1));
			   $data['examsettinglist'] 	 = 	  $this->Chapter_model->get_chapter_setting_list();
				  	if ($this->form_validation->run() == FALSE) {
					   $this->render_template('secure/chapter/chapterWiseExamSetting', $data);
					}
				   else
				   {//echo var_dump($_POST );exit;

					   if($this->input->post("btn")  == 'Submit')
					   { //var_dump($_POST); exit;
								$params =array(
									'exam_id'					 => $this->input->post('exam_id'),
									'exam_duration'				 => $this->input->post('exam_duration'),
									'marks' 	   				 => $this->input->post('marks'),
									'minus_marks' 	   			 => $this->input->post('minus_marks'),
									'no_of_ques' 	   			 => $this->input->post('no_of_ques'),
									'status'			   		 => $this->input->post('status'),
									'createdby' 				 => $this->session->userdata('id'),
									'createdon' 				 => date_timestamp_get(date_create())
							   );
							  
								 $insert_id = $this->Chapter_model->insert_data('tbl_chapter_setting', $params);
								  
									 
								  if($insert_id) {
									  $this->session->set_flashdata('msg', '<div class="alert alert-success">Record Add Successfully</div>');
												redirect('secure/chapter/Setting');	
									}else{
												$this->session->set_flashdata('msg', '<div class="alert alert-warning">Invalid! Error Occured.</div>');
												redirect('secure/chapter/Setting');			
										 }
								  
								  
							
					   }
					   
					   if($this->input->post("btn")  == 'Update')
					   { 
					   			$id = $this->input->post('setting_id');
								$params =array(
									'exam_id'					 => $this->input->post('exam_id'),
									'exam_duration'					 => $this->input->post('exam_duration'),
									'marks' 	   			 => $this->input->post('marks'),
									'minus_marks' 	   			 => $this->input->post('minus_marks'),
									'no_of_ques' 	   			 => $this->input->post('no_of_ques'),
									'status'			   		 => $this->input->post('status'),
									'updatedby' 				 => $this->session->userdata('id'),
									'updatedon' 				 => date_timestamp_get(date_create())
							   );
							  
								$getdate =  $this->Chapter_model->get_data('tbl_chapter_setting', array('exam_id'=>$params['exam_id'],'id!='=>$id));
								  if($getdate==''){
									  $insert_id = $this->Chapter_model->update_data('tbl_chapter_setting', array('id'=>$id), $params);
								  if($insert_id) {
									  $this->session->set_flashdata('msg', '<div class="alert alert-success">Record Update Successfully</div>');
												redirect('secure/chapter/Setting');	
									}else{
												$this->session->set_flashdata('msg', '<div class="alert alert-warning">Invalid! Error Occured.</div>');
												redirect('secure/chapter/Setting');			
										 }
								  }
								  else{
												$this->session->set_flashdata('msg', '<div class="alert alert-danger">Data Already Exist!</div>');
												redirect('secure/chapter/Setting');				
										 }
							
					   }
				   }
		
		
		
		
    }
	
	public function getexamsettingDetail() {
		
			      $data = array('success' => false, 'messages' => array(),'founddata' => "");
				   if(!empty($_POST['getId'])){
						$datafound =  $this->Chapter_model->get_data('tbl_chapter_setting', array('id'=>$_POST['getId']));
						if($datafound != ''){
							$data['founddata'] = $datafound;
							$data['success'] = true;
						}
						echo json_encode($data);
				   }
		
    }
	public function ChapterExam(){
		
		if($this->session->userdata('id') == '1'){
		$data['ExamList'] = $this->Chapter_model->get_all_list('tbl_exam', array('status'=>1));
		}
		else{
			$get_examlist = $this->Chapter_model->get_all_list('tbl_student_exam', array('student_id'=>$this->session->userdata('id')));
			//var_dump($get_examlist); exit;
			foreach($get_examlist as $key=>$exa){
				if($exa['exam_id'] !='3'){
					$data['ExamList'][$key] = $this->Chapter_model->get_data('tbl_exam', array('id'=>$exa['exam_id']));
				}
			}
			//var_dump($data['ExamList']); exit;
		}
		$data['classList'] = $this->Chapter_model->get_all_list('tbl_class', array('status'=>1));
		
		$this->render_template('secure/chapter/examChapterwise', $data);
	}
	public function examInstructions($exam_id, $id){
		$data['exam_id'] = $exam_id;
		$data['chapter_id'] = $id;
		
		$this->render_template('secure/chapter/examInstructions', $data);
	}
	public function startChapterExam($exam_id, $id){
		//var_dump($this->session->userdata());
		if($this->session->userdata('id') != '1'){
			if($this->session->userdata('exam_id') != $exam_id){
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid Test! You are not enrolled in selected test.</div>');
				redirect('secure/chapter/ChapterExam');	
			}
			
		}
		
		$getPaymentstate = $this->Chapter_model->get_data('tbl_student_exam', array('student_id'=>$this->session->userdata('id'),'exam_id'=>$exam_id));
		if($getPaymentstate == NULL){
			$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid Test! You are not enrolled in selected test. Please make payment first. <a href="'.base_url('Razorpay/examPayment/'.$exam_id).'">Click here</a> for Enrollment</div>');
			redirect('secure/chapter/ChapterExam');	
		}
		else{
				if($getPaymentstate['payment_status'] != '1'){
					$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid Test! You are not enrolled in selected test. Please make payment first. <a href="'.base_url('Razorpay/examPayment/'.$exam_id).'">Click here</a> for Enrollment</div>');
					redirect('secure/chapter/ChapterExam');	
				}
				elseif($getPaymentstate['exam_status'] != '1'){
					$this->session->set_flashdata('msg', '<div class="alert alert-danger">You are not allowed in selected test. Contact admin for Allow!</div>');
					redirect('secure/chapter/ChapterExam');	
				}
			 
		}
		
		
		
		$data['getexam'] = $this->Chapter_model->get_all_list('tbl_exam', array('status'=>1,'id'=>$exam_id));
			$sub_ids = explode(',', $data['getexam'][0]['sub_ids']);
			$get_valid_chapter = $this->Chapter_model->get_valid_chapter(array('id'=>$id), $sub_ids);
			if($get_valid_chapter ==NULL){
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid Chapter</div>');
				redirect('secure/chapter/ChapterExam');	
			}
		$get_chapter_exam_setting = $this->Chapter_model->get_data('tbl_chapter_setting', array('exam_id'=>$exam_id, 'status'=>1));
		//var_dump($get_chapter_exam_setting);
			
		$data['examduration'] = (int)$get_chapter_exam_setting['exam_duration'];
		////$data['examduration'] = 1;
		$data['minusmark'] = (int)$get_chapter_exam_setting['minus_marks'];
		$no_question = (int)$get_chapter_exam_setting['no_of_ques'];
		$marks = explode(',', $get_chapter_exam_setting['marks']);
		 
		
		 
		 $questionList = $this->Chapter_model->get_all_ques_list_limit('id,sub_id', 'tbl_question', array('chapter_id'=>$id), $no_question);
		 
	
		 for($i=0; $i < count($questionList); $i++){
			 shuffle($marks);
			 $data['questionList'][$i]['id'] = $questionList[$i]['id'];
			 $data['questionList'][$i]['marks'] = $marks[0];
			 $totalarks[] = (int) $marks[0];
		 }
		
		 $data['chapter'] = $this->Chapter_model->get_data('tbl_chapter', array('id'=>$id));
		 $data['getexam'] = $this->Chapter_model->get_data('tbl_exam', array('id'=>$exam_id));
		 $data['subject'] = $this->Chapter_model->get_data('tbl_subject', array('id'=>$questionList[0]['sub_id']));
		 $data['total_marks'] = array_sum($totalarks);
		
		
		 $this->render_template('secure/chapter/exam', $data);
		//var_dump($chapter_ids); exit;
		
	}
	function getResult(){
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
					$getquestiondata = $this->Chapter_model->get_selected_value('ans', 'tbl_question', array('id'=>$ques_id));
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
				
				$getchapter = $this->Chapter_model->get_selected_value('marks,minus_marks', 'tbl_chapter_setting', array('exam_id'=>$params['exam_id']));
				
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
				
				$checkdata = $this->Chapter_model->get_selected_value('id', 'tbl_result_chapter', array('student_id'=>$params['student_id'],'chapter_id'=>$params['chapter_id'],'sub_id'=>$params['sub_id'],'exam_id'=>$params['exam_id']));
				///var_dump($checkdata); exit;
				if($checkdata['id']){
					$params['updatedon'] = date_timestamp_get(date_create());
					$update = $this->Chapter_model->update_data('tbl_result_chapter', array('id'=>$checkdata['id']), $params);
					$status = 'update';
					
				}
				else{
					$params['createdon'] = date_timestamp_get(date_create());
					$insert_id = $this->Chapter_model->insert_data('tbl_result_chapter', $params);
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
	
	function showResult($id){
		$resultdata =$this->Chapter_model->get_selected_value('*', 'tbl_result_chapter', array('id'=>$id));
		$studentdata =$this->Chapter_model->get_selected_value('name,email,mobile_number', 'tbl_student', array('id'=>$resultdata['student_id']));
		$examdata =$this->Chapter_model->get_selected_value('exam_name,sub_ids', 'tbl_exam', array('id'=>$resultdata['exam_id']));
		$subdata =$this->Chapter_model->get_selected_value('sub_name', 'tbl_subject', array('id'=>$resultdata['sub_id']));
		$Chapterdata =$this->Chapter_model->get_selected_value('chapter_name', 'tbl_chapter', array('id'=>$resultdata['chapter_id']));
		$result = array_merge($resultdata,$studentdata,$examdata,$subdata,$Chapterdata);
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
								'Chapter' => $result['chapter_name'],
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
		$this->render_template('secure/chapter/exam_result', $data);
		//$this->render_template('secure/chapter/exam', $data);
	}
}
