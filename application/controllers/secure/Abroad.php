<?php
 
class Abroad extends Admin_Controller{
    function __construct()
    {
        parent::__construct();
		$this->not_logged_in();
		$this->load->model('secure/Abroad_model');
		//$this->load->library('Mycalendar');
		
    } 

    /*
     * Listing of Countries
     */
    function index()
    {
        //$per = $this->check_permission();
		$data = array();
			    $data['title']		= 'Manage Country';
			   
		
			   $this->form_validation->set_rules("country_name", "Country Name", "trim|required");
			  
			   $data['getmode'] 	 = 	  $this->Abroad_model->get_all_list('tbl_admissions_abroad', array('status !=' => 3));
				  //echo '<pre>';var_dump($data['getsubService'][1]['subservicename'] );exit;
				   if ($this->form_validation->run() == FALSE) {
					   $this->render_template('secure/abroad/index', $data);
					}
				   else
				   {
					   if($this->input->post("btn")  == 'Submit')
					   { 
								$params =array(
									'country_name' 	   		=> $this->input->post('country_name'),
									'status'			   		 => $this->input->post('status'),
									'createdby' 				 => $this->session->userdata('id'),
									'createdon' 				 => date_timestamp_get(date_create())
							   );
							  
								$getdate =  $this->Abroad_model->get_data('tbl_admissions_abroad', array('country_name'=>$params['country_name']));
								  if($getdate==''){
									  $insert_id = $this->Abroad_model->insert_data('tbl_admissions_abroad', $params);
								  if($insert_id) {
									  $this->session->set_flashdata('msg', '<div class="alert alert-success">Record Add Successfully</div>');
												redirect('secure/abroad/index');	
									}else{
												$this->session->set_flashdata('msg', '<div class="alert alert-warning">Invalid! Error Occured.</div>');
												redirect('secure/abroad/index');			
										 }
								  }
								  else{
												$this->session->set_flashdata('msg', '<div class="alert alert-danger">Data Already Exist!</div>');
												redirect('secure/abroad/index');				
										 }
							
					   }
					   
					   if($this->input->post("btn")  == 'Update')
					   { 
					   			$id = $this->input->post('sub_id');
								$params =array(
									'country_name' 	   			 => $this->input->post('country_name'),
									'status'			   		 => $this->input->post('status'),
									'updatedby' 				 => $this->session->userdata('id'),
									'updatedon' 				 => date_timestamp_get(date_create())
							   );
							  
								$getdate =  $this->Abroad_model->get_data('tbl_admissions_abroad', array('country_name'=>$params['country_name'],'id!='=>$id));
								  if($getdate==''){
									  $insert_id = $this->Abroad_model->update_data('tbl_admissions_abroad', array('id'=>$id), $params);
								  if($insert_id) {
									  $this->session->set_flashdata('msg', '<div class="alert alert-success">Record Update Successfully</div>');
												redirect('secure/abroad/index');	
									}else{
												$this->session->set_flashdata('msg', '<div class="alert alert-warning">Invalid! Error Occured.</div>');
												redirect('secure/abroad/index');			
										 }
								  }
								  else{
												$this->session->set_flashdata('msg', '<div class="alert alert-danger">Data Already Exist!</div>');
												redirect('secure/abroad/index');				
										 }
							
					   }
				   }
		
		
		
		
    }
	public function getdataDetail() {
		
			      $data = array('success' => false, 'messages' => array(),'founddata' => "");
				   if(!empty($_POST['getId'])){
						$datafound =  $this->Abroad_model->get_data('tbl_admissions_abroad', array('id'=>$_POST['getId']));
						if($datafound != ''){
							$data['founddata'] = $datafound;
							$data['success'] = true;
						}
						echo json_encode($data);
				   }
		
    }
	
	function addstudent()
    {
        //$per = $this->check_permission();
		$data = array();
			    $data['title']		= 'Expenses Category';
			   
		
			   $this->form_validation->set_rules("country_id", "Country Name", "trim|required");
			   if($this->input->post("btn")  == 'Submit')
					   { 
					    
						$this->form_validation->set_rules("pp_no", "Passport Number", "trim|required|is_unique[tbl_student_abroad.pp_no]");
					   }
			   $data['countryList'] = 	  $this->Abroad_model->get_all_list('tbl_admissions_abroad', array('status' => 1));
			   $data['getmode'] 	 = 	  $this->Abroad_model->get_abroad_student_list();
				   $this->form_validation->set_rules("country_id", "Country Name", "trim|required");
				   if ($this->form_validation->run() == FALSE) {
					   $this->render_template('secure/abroad/addstudent', $data);
					}
				   else
				   { 
					   if($this->input->post("btn")  == 'Submit')
					   { 
					   		$params =array(
									'country_id' 	   		=> $this->input->post('country_id'),
									'student_name' 	   		=> $this->input->post('student_name'),
									'father_name' 	   		=> $this->input->post('father_name'),
									'email' 	   			=> $this->input->post('email'),
									'contact_no' 	   		=> $this->input->post('contact_no'),
									'pp_no' 	   			=> $this->input->post('pp_no'),
									'total_fee' 	   		=> $this->input->post('total_fee'),
									'paid_fee' 	   			=> 0,
									'due_fee' 	   			=> $this->input->post('total_fee'),
									'payment_status'		=> 0,
									'address' 	   			=> $this->input->post('address'),
									'status'			   	=> $this->input->post('status'),
									'createdby' 			=> $this->session->userdata('id'),
									'createdon' 			=> date_timestamp_get(date_create())
							   );
							$lastrecord = $this->Abroad_model->get_last_rowid('tbl_student_abroad');
							$newid = (int)$lastrecord[0]['id'] + 1;	
								//var_dump($lastrecord); exit;
								foreach($data['countryList'] as $country){
									
										  if($country['id'] == $params['country_id']){
											 
											  $ref = strtoupper(substr($country['country_name'], 0 ,3));
										  }
									  }
								$referance_no = $ref.'00'.$newid;	  	
								$params['referance_no'] 	   		= $referance_no;
							  
								$getdate =  $this->Abroad_model->get_data('tbl_student_abroad', array('pp_no'=>$params['pp_no']));
								  if($getdate==''){
									  $insert_id = $this->Abroad_model->insert_data('tbl_student_abroad', $params);
								  if($insert_id) {
									  
									  
									  $this->session->set_flashdata('msg', '<div class="alert alert-success">Record Add Successfully</div>');
												redirect('secure/abroad/addstudent');	
									}else{
												$this->session->set_flashdata('msg', '<div class="alert alert-warning">Invalid! Error Occured.</div>');
												redirect('secure/abroad/addstudent');			
										 }
								  }
								  else{
												$this->session->set_flashdata('msg', '<div class="alert alert-danger">Data Already Exist!</div>');
												redirect('secure/abroad/addstudent');				
										 }
							
					   }
					   
					   if($this->input->post("btn")  == 'Update')
					   { 
					   			$id = $this->input->post('sub_id');
								$params =array(
									'country_id' 	   		=> $this->input->post('country_id'),
									'student_name' 	   		=> $this->input->post('student_name'),
									'father_name' 	   		=> $this->input->post('father_name'),
									'email' 	   			=> $this->input->post('email'),
									'contact_no' 	   		=> $this->input->post('contact_no'),
									'pp_no' 	   			=> $this->input->post('pp_no'),
									'total_fee' 	   		=> $this->input->post('total_fee'),
									'paid_fee' 	   			=> 0,
									'due_fee' 	   			=> $this->input->post('total_fee'),
									'address' 	   			=> $this->input->post('address'),
									'payment_status'		=> 0,
									'status'			   	=> $this->input->post('status'),
									'updatedby' 			=> $this->session->userdata('id'),
									'updatedon' 			=> date_timestamp_get(date_create())
							   );
							  
								$getdate =  $this->Abroad_model->get_data('tbl_student_abroad', array('pp_no'=>$params['pp_no'],'id!='=>$id));
								  if($getdate==''){
									  $insert_id = $this->Abroad_model->update_data('tbl_student_abroad', array('id'=>$id), $params);
								  if($insert_id) {
									  $this->session->set_flashdata('msg', '<div class="alert alert-success">Record Update Successfully</div>');
												redirect('secure/abroad/addstudent');	
									}else{
												$this->session->set_flashdata('msg', '<div class="alert alert-warning">Invalid! Error Occured.</div>');
												redirect('secure/abroad/addstudent');			
										 }
								  }
								  else{
												$this->session->set_flashdata('msg', '<div class="alert alert-danger">Data Already Exist!</div>');
												redirect('secure/abroad/addstudent');				
										 }
							
					   }
				   }
		
		
		
		
    }
	public function getstudentDetail() {
		
			      $data = array('success' => false, 'messages' => array(),'founddata' => "");
				   if(!empty($_POST['getId'])){
						$datafound =  $this->Abroad_model->get_data('tbl_student_abroad', array('id'=>$_POST['getId']));
						if($datafound != ''){
							$data['founddata'] = $datafound;
							$data['success'] = true;
						}
						echo json_encode($data);
				   }
		
    }
	
	public function recordPayment($id){
		$data['title'] = 'Record Payment';
		$data['paymentdata'] = $this->Abroad_model->get_data('tbl_student_abroad', array('id'=>$id));
		$data['abroad_country'] = $this->Abroad_model->get_data('tbl_admissions_abroad', array('id'=>$data['paymentdata']['country_id']));
		$data['record_llist'] = $this->Abroad_model->get_all_list('tbl_record_payment', array('payment_id'=>$id));
		//recordPayment
		$this->form_validation->set_rules("amount_received", "Amount Received", "trim|required");
				   if ($this->form_validation->run() == FALSE) {
					   $this->render_template('secure/abroad/recordPayment', $data);
					}
				   else
				   {
					   
					  foreach($_POST as $key=>$value){
						  
						  if($key !='btn'){
							$param[$key] = $value;
						  }
					  }
					  $update_payment['paid_fee'] = (float)$data['paymentdata']['paid_fee'] + (float)$param['amount_received']; 
					  $update_payment['due_fee'] = (float)$data['paymentdata']['due_fee'] - (float)$param['amount_received']; 
					  if($update_payment['due_fee'] ==0){
						  $update_payment['payment_status'] = 2;
					  }
					  else{
						 $update_payment['payment_status'] = 1; 
					  }
					  	$lastrecord = $this->Abroad_model->get_last_rowid('tbl_record_payment');
							$newid = (int)$lastrecord[0]['id'] + 1;	
							$ref = strtoupper(substr($data['paymentdata']['referance_no'], 0 ,3));
								
								$referance_no = $ref.'PART00'.$newid;	  	
									$param['referance_no'] 	   		= $referance_no;
					 				$param['payment_id'] 			= $id;
									$param['createdby'] 			= $this->session->userdata('id');
									$param['createdon'] 			= date_timestamp_get(date_create());
						
						$check_record  = $this->Abroad_model->get_data('tbl_record_payment', array('payment_id'=>$id, 'due_fee'=>$param['due_fee']));
						
					    if($check_record['id'] ==''){
							$insert_id = $this->Abroad_model->insert_data('tbl_record_payment', $param);
							if($insert_id){
								$update_payment = $this->Abroad_model->update_data('tbl_student_abroad', array('id'=>$id), $update_payment);
								if($update_payment){
									$this->session->set_flashdata('msg', '<div class="alert alert-success">Payment Record Successfull!</div>');
									redirect('secure/abroad/recordPayment/'.$id);	
								}
							}
						}
						else{
							$this->session->set_flashdata('msg', '<div class="alert alert-danger">Data Already Exist!</div>');
									redirect('secure/abroad/recordPayment/'.$id);	
						}
				   }
	}
	
	public function recordpaymentlist(){
		$data['record_llist'] = $this->Abroad_model->get_all_list('tbl_record_payment');
		 $this->render_template('secure/abroad/recordPaymentlist', $data);
	}
	
	public function showpaymentrecipt($id){
		$data['title'] = 'Payment Recipt';
		$data['record_list'] = $this->Abroad_model->get_data('tbl_record_payment', array('id'=>$id));
		$data['paymentdata'] = $this->Abroad_model->get_data('tbl_student_abroad', array('id'=>$data['record_list']['payment_id']));
		$data['abroad_country'] = $this->Abroad_model->get_data('tbl_admissions_abroad', array('id'=>$data['paymentdata']['country_id']));
		$data['sitedata'] = $this->Abroad_model->get_data('tbl_setting', array('id'=>1));
		$data['amount_in_words'] = $this->getIndianCurrency($data['record_list']['amount_received']);
		//var_dump($data);
		//exit;
		$this->render_template('secure/abroad/paymentreciept', $data);
	}
	
}
