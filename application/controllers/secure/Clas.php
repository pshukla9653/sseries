<?php
 
class Clas extends Admin_Controller{
    function __construct()
    {
        parent::__construct();
		$this->not_logged_in();
		$this->load->model('secure/Clas_model');
		//$this->load->library('Mycalendar');
		
    } 

    /*
     * Listing of Countries
     */
    function index()
    {
        //$per = $this->check_permission();
		$data = array();
			    $data['title']		= 'ADD | Class';
			   
		
			   $this->form_validation->set_rules("class_name", "Class Name", "trim|required");
			  
			   $data['getmode'] 	 = 	  $this->Clas_model->get_all_list('tbl_class', array('status !=' => 3));
				  //echo '<pre>';var_dump($data['getsubService'][1]['subservicename'] );exit;
				   if ($this->form_validation->run() == FALSE) {
					   $this->render_template('secure/class/index', $data);
					}
				   else
				   {
					   if($this->input->post("btn")  == 'Submit')
					   { 
								$params =array(
									'class_name' 	   			 => $this->input->post('class_name'),
									'status'			   		 => $this->input->post('status'),
									'createdby' 				 => $this->session->userdata('id'),
									'createdon' 				 => date_timestamp_get(date_create())
							   );
							  
								$getdate =  $this->Clas_model->get_data('tbl_class', array('class_name'=>$params['class_name']));
								  if($getdate==''){
									  $insert_id = $this->Clas_model->insert_data('tbl_class', $params);
								  if($insert_id) {
									  $this->session->set_flashdata('msg', '<div class="alert alert-success">Record Add Successfully</div>');
												redirect('secure/clas/index');	
									}else{
												$this->session->set_flashdata('msg', '<div class="alert alert-warning">Invalid! Error Occured.</div>');
												redirect('secure/clas/index');			
										 }
								  }
								  else{
												$this->session->set_flashdata('msg', '<div class="alert alert-danger">Data Already Exist!</div>');
												redirect('secure/clas/index');				
										 }
							
					   }
					   
					   if($this->input->post("btn")  == 'Update')
					   { 
					   			$id = $this->input->post('class_id');
								$params =array(
									'class_name' 	   			 => $this->input->post('class_name'),
									'status'			   		 => $this->input->post('status'),
									'updatedby' 				 => $this->session->userdata('id'),
									'updatedon' 				 => date_timestamp_get(date_create())
							   );
							  
								$getdate =  $this->Clas_model->get_data('tbl_class', array('class_name'=>$params['class_name'],'id!='=>$id));
								  if($getdate==''){
									  $insert_id = $this->Clas_model->update_data('tbl_class', array('id'=>$id), $params);
								  if($insert_id) {
									  $this->session->set_flashdata('msg', '<div class="alert alert-success">Record Update Successfully</div>');
												redirect('secure/clas/index');	
									}else{
												$this->session->set_flashdata('msg', '<div class="alert alert-warning">Invalid! Error Occured.</div>');
												redirect('secure/clas/index');			
										 }
								  }
								  else{
												$this->session->set_flashdata('msg', '<div class="alert alert-danger">Data Already Exist!</div>');
												redirect('secure/clas/index');				
										 }
							
					   }
				   }
		
		
		
		
    }
	public function getDetail() {
		
			      $data = array('success' => false, 'messages' => array(),'founddata' => "");
				   if(!empty($_POST['getId'])){
						$datafound =  $this->Clas_model->get_data('tbl_class', array('id'=>$_POST['getId']));
						if($datafound != ''){
							$data['founddata'] = $datafound;
							$data['success'] = true;
						}
						echo json_encode($data);
				   }
		
    }

    
}
