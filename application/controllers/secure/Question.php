<?php
 
class Question extends Admin_Controller{
    function __construct()
    {
        parent::__construct();
		$this->not_logged_in();
		$this->load->model('secure/Question_model');
		//$this->load->library('Mycalendar');
		
    } 

    /*
     * Listing of Question
     */
    function index()
    {
        //$per = $this->check_permission();
				$data = array();
			    $data['title']		= 'Question list';
			   
		
			   $this->form_validation->set_rules("chapter_name", "Chapter Name", "trim|required");
			  
			   $data['questionList'] 	 = 	  $this->Question_model->get_question_list();
			  // var_dump($data['questionList']); exit;
				 $this->render_template('secure/question/index', $data);
				  
		
		
		
    }
    function add()
    {
        //$per = $this->check_permission();
				$data = array();
			    $data['title']		= 'ADD | Question';
			   
		
			   $this->form_validation->set_rules("class_id", "Class", "trim|required");
			   $this->form_validation->set_rules("sub_id", "Subject", "trim|required");
			   $this->form_validation->set_rules("chapter_id", "Chapter", "trim|required");
			   $this->form_validation->set_rules("status", "Status", "trim|required");
			   $this->form_validation->set_rules("ques", "Question", "trim|required");
			   $this->form_validation->set_rules("opt_1", "Option A", "trim|required");
			   $this->form_validation->set_rules("opt_2", "Option B", "trim|required");
			   $this->form_validation->set_rules("opt_3", "Option C", "trim|required");
			   $this->form_validation->set_rules("opt_4", "Option D", "trim|required");
			   $this->form_validation->set_rules("answere", "Answere", "trim|required");
			  
			   $data['getmode'] 	 = 	  $this->Question_model->get_chapter_list();
			   
			   $data['sublist'] 	 = 	  $this->Question_model->get_all_list('tbl_subject', array('status' => 1));
			   $data['classlist'] 	 = 	  $this->Question_model->get_all_list('tbl_class', array('status' => 1));
			   $data['chapter_list'] 	 = 	  $this->Question_model->get_all_list('tbl_chapter', array('status' => 1));
				  //echo '<pre>';var_dump($data['getsubService'][1]['subservicename'] );exit;
				   if ($this->form_validation->run() == FALSE) {
					   $this->render_template('secure/question/add', $data);
					}
				   else
				   { //// var_dump($_POST); exit;
					  $params =array(
									'class_id'					 => $this->input->post('class_id'),
									'sub_id'			     	 => $this->input->post('sub_id'),
									'chapter_id' 	   			 => $this->input->post('chapter_id'),
									'status'			   		 => $this->input->post('status'),
									'ques'			     		 => trim($this->input->post('ques')),
									'opt_1' 	   			     => trim($this->input->post('opt_1')),
									'opt_2'			   		     => trim($this->input->post('opt_2')),
									'opt_3'					     => trim($this->input->post('opt_3')),
									'opt_4' 	   			     => trim($this->input->post('opt_4')),
									'ans'			   		    => trim($this->input->post('answere')),
									'createdby' 				 => $this->session->userdata('id'),
									'createdon' 				 => date_timestamp_get(date_create())
							   );

							  
								$getdate =  $this->Question_model->get_data('tbl_question', array('ques'=>$params['ques']));
								  if($getdate==''){
									  $insert_id = $this->Question_model->insert_data('tbl_question', $params);
								  if($insert_id) {
									  $this->session->set_flashdata('msg', '<div class="alert alert-success">Record Add Successfully</div>');
												redirect('secure/question/add');	
									}else{
												$this->session->set_flashdata('msg', '<div class="alert alert-warning">Invalid! Error Occured.</div>');
												redirect('secure/question/add');			
										 }
								  }
								  else{
												$this->session->set_flashdata('msg', '<div class="alert alert-danger">Data Already Exist!</div>');
												redirect('secure/question/add');				
										 }
}
}

	public function QuestionList()
    {
        //$per = $this->check_permission();
				$data = array();
			    $data['title']		= 'List | Question';
			   
		
			   $this->form_validation->set_rules("class_id", "Class", "trim|required");
			   $this->form_validation->set_rules("sub_id", "Subject", "trim|required");
			   $this->form_validation->set_rules("chapter_id", "Chapter", "trim|required");
			   $data['getmode'] 	 = 	  $this->Question_model->get_chapter_list();
			   $data['sublist'] 	 = 	  $this->Question_model->get_all_list('tbl_subject', array('status' => 1));
			   $data['classlist'] 	 = 	  $this->Question_model->get_all_list('tbl_class', array('status' => 1));
			   $data['chapter_list'] 	 = 	  $this->Question_model->get_all_list('tbl_chapter', array('status' => 1));
				  //echo '<pre>';var_dump($data['getsubService'][1]['subservicename'] );exit;
				   if ($this->form_validation->run() == FALSE) {
					   $this->render_template('secure/question/searchQuestion', $data);
					}
				   else
				   { //// var_dump($_POST); exit;
				   		$where = array(
									'tbl_question.class_id' => $this->input->post('class_id'),
									'tbl_question.sub_id' => $this->input->post('sub_id'),
									'tbl_question.chapter_id' => $this->input->post('chapter_id')
							);
						
				   
					  ///$data['questionList'] = $this->Question_model->get_all_list('tbl_question', $where);
					  $data['questionList'] 	 = 	  $this->Question_model->get_question($where);
					  $this->render_template('secure/question/QuestionList', $data);
					}
	}
	
	function edit($id)
    {
        //$per = $this->check_permission();
				$data = array();
			    $data['title']		= 'Update | Question';
			   
		
			   $this->form_validation->set_rules("class_id", "Class", "trim|required");
			   $this->form_validation->set_rules("sub_id", "Subject", "trim|required");
			   $this->form_validation->set_rules("chapter_id", "Chapter", "trim|required");
			   $this->form_validation->set_rules("status", "Status", "trim|required");
			   $this->form_validation->set_rules("ques", "Question", "trim|required");
			   $this->form_validation->set_rules("opt_1", "Option A", "trim|required");
			   $this->form_validation->set_rules("opt_2", "Option B", "trim|required");
			   $this->form_validation->set_rules("opt_3", "Option C", "trim|required");
			   $this->form_validation->set_rules("opt_4", "Option D", "trim|required");
			   $this->form_validation->set_rules("answere", "Answere", "trim|required");
			  
			   $data['getmode'] 	 		= 	  $this->Question_model->get_chapter_list();
			   $data['sublist'] 	 		= 	  $this->Question_model->get_all_list('tbl_subject', array('status' => 1));
			   $data['classlist'] 	 		= 	  $this->Question_model->get_all_list('tbl_class', array('status' => 1));
			   $data['chapter_list'] 	 	= 	  $this->Question_model->get_all_list('tbl_chapter', array('status' => 1));
			   $data['editQuestion'] 	 	= 	  $this->Question_model->get_data('tbl_question', array('id' => $id));
			   $data['chapter'] 	 	= 	  $this->Question_model->get_data('tbl_chapter', array('id' => $data['editQuestion']['chapter_id']));
				  //echo '<pre>';var_dump($data['getsubService'][1]['subservicename'] );exit;
				 /// var_dump($data['editQuestion']); exit;
				   if ($this->form_validation->run() == FALSE) {
					   $this->render_template('secure/question/edit', $data);
					}
				   else
				   { //// var_dump($_POST); exit;
					  $params =array(
									'class_id'					 => $this->input->post('class_id'),
									'sub_id'			     	 => $this->input->post('sub_id'),
									'chapter_id' 	   			 => $this->input->post('chapter_id'),
									'status'			   		 => $this->input->post('status'),
									'ques'			     		 => trim($this->input->post('ques')),
									'opt_1' 	   			     => trim($this->input->post('opt_1')),
									'opt_2'			   		     => trim($this->input->post('opt_2')),
									'opt_3'					     => trim($this->input->post('opt_3')),
									'opt_4' 	   			     => trim($this->input->post('opt_4')),
									'ans'			   		    => trim($this->input->post('ans')),
									'updatedby' 				 => $this->session->userdata('id'),
									'updateon' 					 => date_timestamp_get(date_create())
							   );

							  
								
									  $updated_id = $this->Question_model->update_data('tbl_question', array('id'=>$id),$params);
								  if($updated_id) {
									  $this->session->set_flashdata('msg', '<div class="alert alert-success">Record Update Successfully</div>');
												redirect('secure/question/index');	
									}
									else{
												$this->session->set_flashdata('msg', '<div class="alert alert-warning">Invalid! Error Occured.</div>');
												redirect('secure/question/index');			
										 }
				   }
								

}
	
	function editQ($id)
    {
        //$per = $this->check_permission();
				$data = array();
			    $data['title']		= 'Update | Question';
			   
		
			   $this->form_validation->set_rules("class_id", "Class", "trim|required");
			   $this->form_validation->set_rules("sub_id", "Subject", "trim|required");
			   $this->form_validation->set_rules("chapter_id", "Chapter", "trim|required");
			   $this->form_validation->set_rules("status", "Status", "trim|required");
			   $this->form_validation->set_rules("ques", "Question", "trim|required");
			   $this->form_validation->set_rules("opt_1", "Option A", "trim|required");
			   $this->form_validation->set_rules("opt_2", "Option B", "trim|required");
			   $this->form_validation->set_rules("opt_3", "Option C", "trim|required");
			   $this->form_validation->set_rules("opt_4", "Option D", "trim|required");
			   $this->form_validation->set_rules("answere", "Answere", "trim|required");
			  
			   $data['getmode'] 	 		= 	  $this->Question_model->get_chapter_list();
			   $data['sublist'] 	 		= 	  $this->Question_model->get_all_list('tbl_subject', array('status' => 1));
			   $data['classlist'] 	 		= 	  $this->Question_model->get_all_list('tbl_class', array('status' => 1));
			   //$data['chapter_list'] 	 	= 	  $this->Question_model->get_all_list('tbl_chapter', array('status' => 1));
			   $data['editQuestion'] 	 	= 	  $this->Question_model->get_data('tbl_question', array('id' => $id));
			   $data['chapter'] 	 	= 	  $this->Question_model->get_data('tbl_chapter', array('id' => $data['editQuestion']['chapter_id']));
				  //echo '<pre>';var_dump($data['getsubService'][1]['subservicename'] );exit;
				 /// var_dump($data['editQuestion']); exit;
				   if ($this->form_validation->run() == FALSE) {
					   $this->render_template('secure/question/editq', $data);
					}
				   else
				   { //// var_dump($_POST); exit;
					  $params =array(
									'class_id'					 => $this->input->post('class_id'),
									'sub_id'			     	 => $this->input->post('sub_id'),
									'chapter_id' 	   			 => $this->input->post('chapter_id'),
									'status'			   		 => $this->input->post('status'),
									'ques'			     		 => trim($this->input->post('ques')),
									'opt_1' 	   			     => trim($this->input->post('opt_1')),
									'opt_2'			   		     => trim($this->input->post('opt_2')),
									'opt_3'					     => trim($this->input->post('opt_3')),
									'opt_4' 	   			     => trim($this->input->post('opt_4')),
									'ans'			   		    => trim($this->input->post('ans')),
									'is_correct'			   	=> 1,
									'updatedby' 				 => $this->session->userdata('id'),
									'updateon' 					 => date_timestamp_get(date_create())
							   );

							  $sess = array(
							  		'class_id'					 => $this->input->post('class_id'),
									'sub_id'			     	 => $this->input->post('sub_id'),
									'chapter_id' 	   			 => $this->input->post('chapter_id'),
							  );
								$this->session->set_userdata($sess);
									  $updated_id = $this->Question_model->update_data('tbl_question', array('id'=>$id),$params);
								  if($updated_id) {
									  $this->session->set_flashdata('msg', '<div class="alert alert-success">Record Update Successfully</div>');
												redirect('secure/question/QuestionList');	
									}
									else{
												$this->session->set_flashdata('msg', '<div class="alert alert-warning">Invalid! Error Occured.</div>');
												redirect('secure/question/QuestionList');			
										 }
				   }
								

}

    public function getquestion() {
					$id = $_POST['getId'];
				   if(!empty($id)){
						$datafound =  $this->Question_model->get_question(array('tbl_question.id'=>$id));
						//var_dump($datafound);
						$ans = $datafound[0]['ans'];
						if(count($datafound) != 0){
							if($datafound[0]['ans']=='opt_1'){
								$opt1 = "style='background-color:green'";
							}
							if($datafound[0]['ans']=='opt_2'){
								$opt2 = "style='background-color:green'";
							}
							if($datafound[0]['ans']=='opt_3'){
								$opt3 = "style='background-color:green'";
							}
							if($datafound[0]['ans']=='opt_4'){
								$opt4 = "style='background-color:green'";
							}
							
						echo "<table style='text-align:left;' class='table'>
							<tr><th>Class Name</th><td colspan='3'>".$datafound[0]['class_name']."</td></tr>
							<tr><th>Subject Name</th><td>".$datafound[0]['sub_name']."</td>
							<th>Chapter Name</th><td>".$datafound[0]['chapter_name']."</td></tr>
							<tr><td colspan='4'>&nbsp;</td></tr>
							<tr><th>Question</th><td colspan='3'>".$datafound[0]['ques']."</td></tr>
							<tr><th ".$opt1.">Option A</th><td ".$opt1.">".$datafound[0]['opt_1']."</td>
							<th ".$opt2.">Option B</th><td ".$opt2."> ".$datafound[0]['opt_2']."</td></tr>
							<tr><th ".$opt3.">Option C</th><td ".$opt3.">".$datafound[0]['opt_3']."</td>
							<th ".$opt4.">Option D</th><td ".$opt4.">".$datafound[0]['opt_4']."</td></tr>
							<th>Answere</th><td colspan='3'>".$datafound[0][$ans]."</td></tr>
							
						</table><br>
						<strong>Note: Correct Answere mark with green background colour</strong>";
							
						}
						else{
								echo '<p>Data not Found!</p>';

						}
				   }
		
    }
	
	public function getchapter(){
			if(!empty($_POST['sub_id']) && !empty($_POST['class_id'])){
				
				$data    = $this->Question_model->get_chapter_list_where(array('sub_id'=>$_POST['sub_id'],'class_id'=>$_POST['class_id'],'status'=>1));
				
				if($data){
				foreach($data as $row){ 
				echo '<option value="">Select Chapter</option>';
				echo '<option value="'.$row['id'].'">'.$row['chapter_name'].'</option>';
						}
					}
					else{
				echo '<option value="">No Data Found!</option>';
				}
				
				}
			
	 	  }

}
    


