<?php
 
class Expenses extends Admin_Controller{
    function __construct()
    {
        parent::__construct();
		$this->not_logged_in();
		$this->load->model('secure/Expenses_model');
		//$this->load->library('Mycalendar');
		
    } 

    /*
     * Listing of Countries
     */
    function index()
    {
        //$per = $this->check_permission();
		$data = array();
			    $data['title']		= 'Expenses Category';
			   
		
			   $this->form_validation->set_rules("category_name", "Expense Category", "trim|required");
			  
			   $data['getmode'] 	 = 	  $this->Expenses_model->get_all_list('tbl_expense_category', array('status !=' => 3));
				  //echo '<pre>';var_dump($data['getsubService'][1]['subservicename'] );exit;
				   if ($this->form_validation->run() == FALSE) {
					   $this->render_template('secure/expense/index', $data);
					}
				   else
				   {
					   if($this->input->post("btn")  == 'Submit')
					   { 
								$params =array(
									'category_name' 	   		=> $this->input->post('category_name'),
									'status'			   		 => $this->input->post('status'),
									'createdby' 				 => $this->session->userdata('id'),
									'createdon' 				 => date_timestamp_get(date_create())
							   );
							  
								$getdate =  $this->Expenses_model->get_data('tbl_expense_category', array('category_name'=>$params['category_name']));
								  if($getdate==''){
									  $insert_id = $this->Expenses_model->insert_data('tbl_expense_category', $params);
								  if($insert_id) {
									  $this->session->set_flashdata('msg', '<div class="alert alert-success">Record Add Successfully</div>');
												redirect('secure/expenses/index');	
									}else{
												$this->session->set_flashdata('msg', '<div class="alert alert-warning">Invalid! Error Occured.</div>');
												redirect('secure/expenses/index');			
										 }
								  }
								  else{
												$this->session->set_flashdata('msg', '<div class="alert alert-danger">Data Already Exist!</div>');
												redirect('secure/expenses/index');				
										 }
							
					   }
					   
					   if($this->input->post("btn")  == 'Update')
					   { 
					   			$id = $this->input->post('sub_id');
								$params =array(
									'category_name' 	   			 => $this->input->post('category_name'),
									'status'			   		 => $this->input->post('status'),
									'updatedby' 				 => $this->session->userdata('id'),
									'updatedon' 				 => date_timestamp_get(date_create())
							   );
							  
								$getdate =  $this->Expenses_model->get_data('tbl_expense_category', array('category_name'=>$params['category_name'],'id!='=>$id));
								  if($getdate==''){
									  $insert_id = $this->Expenses_model->update_data('tbl_expense_category', array('id'=>$id), $params);
								  if($insert_id) {
									  $this->session->set_flashdata('msg', '<div class="alert alert-success">Record Update Successfully</div>');
												redirect('secure/expenses/index');	
									}else{
												$this->session->set_flashdata('msg', '<div class="alert alert-warning">Invalid! Error Occured.</div>');
												redirect('secure/expenses/index');			
										 }
								  }
								  else{
												$this->session->set_flashdata('msg', '<div class="alert alert-danger">Data Already Exist!</div>');
												redirect('secure/expenses/index');				
										 }
							
					   }
				   }
		
		
		
		
    }
	public function getdataDetail() {
		
			      $data = array('success' => false, 'messages' => array(),'founddata' => "");
				   if(!empty($_POST['getId'])){
						$datafound =  $this->Expenses_model->get_data('tbl_expense_category', array('id'=>$_POST['getId']));
						if($datafound != ''){
							$data['founddata'] = $datafound;
							$data['success'] = true;
						}
						echo json_encode($data);
				   }
		
    }
	
	public function recordExpenses(){
		$data['categoryList'] 	 = 	  $this->Expenses_model->get_all_list('tbl_expense_category', array('status' => 1));
		$data['title'] 	 = 	  'Add Expense';
		
		$this->form_validation->set_rules("category_id", "Expense Category", "trim|required");
		$this->form_validation->set_rules("full_name", "Full Name", "trim|required");
		$this->form_validation->set_rules("voucher_date", "Voucher Date", "trim|required");
		$this->form_validation->set_rules("amount", "Amount", "trim|required|numeric");
		$this->form_validation->set_rules("authorized_signatory", "Authorized Signatory Name", "trim|required");
		
		if ($this->form_validation->run() == FALSE) {
			$this->render_template('secure/expense/expenses', $data);
		}
		else{
				 $lastrecord = $this->Expenses_model->get_last_rowid('tbl_expenses');
					$newid = (int)$lastrecord[0]['id'] + 1;	
					$referance_no = 'EXP00'.$newid;	
					
					$params = array(
							'category_id' => $this->input->post('category_id'),
							'full_name' => $this->input->post('full_name'),
							'voucher_date' => $this->input->post('voucher_date'),
							'amount' => $this->input->post('amount'),
							'description' => $this->input->post('description'),
							'status' => $this->input->post('status'),
							'referance_no' =>$referance_no,
							'payment_status' =>1,
							'authorized_signatory'=>$this->input->post('authorized_signatory'),
							'createdby' => $this->session->userdata('id'),
							'createdon' => date_timestamp_get(date_create()),
					);
					
					$insert_id = $this->Expenses_model->insert_data('tbl_expenses', $params);
					if($insert_id){
						if($_FILES['voucher']['name']!=''){
					$config['upload_path'] = 'uploads/expense/';
					$config['allowed_types'] = 'png|jpg|jpeg';
					$config['max_size'] = '0';
					$config['max_filename'] = '255';
					$config['encrypt_name'] = TRUE;
					$file = array();
					$is_file_error = FALSE;
					if (!$is_file_error) {
						$s =  $this->upload->initialize($config);
						if (!$this->upload->do_upload('voucher')) {
							//echo $this->upload->display_errors();
							$is_file_error = TRUE;
						} else {
							$file = $this->upload->data();
						}
					}	
					if (!$is_file_error) {
						$this->Setting_model->save_file_info($file, array('id'=>$insert_id), 'tbl_expenses', 'voucher');
					}
					}
						
						 $this->session->set_flashdata('msg', '<div class="alert alert-success">Record Add Successfully</div>');
						redirect('secure/expenses/recordExpenses');
					}
					else{
						$this->session->set_flashdata('msg', '<div class="alert alert-warning">Invalid! Error Occured.</div>');
						redirect('secure/expenses/recordExpenses');
					}
					  	
		}
	}
	
	public function editExpenses($id){
		$data['categoryList'] 	 = 	  $this->Expenses_model->get_all_list('tbl_expense_category', array('status' => 1));
		$data['expense'] 	 = 	  $this->Expenses_model->get_data('tbl_expenses', array('id' => $id));
		$data['title'] 	 = 	  'Update Expense';
		
		$this->form_validation->set_rules("category_id", "Expense Category", "trim|required");
		$this->form_validation->set_rules("full_name", "Full Name", "trim|required");
		$this->form_validation->set_rules("voucher_date", "Voucher Date", "trim|required");
		$this->form_validation->set_rules("amount", "Amount", "trim|required|numeric");
		$this->form_validation->set_rules("authorized_signatory", "Authorized Signatory Name", "trim|required");
		
		if ($this->form_validation->run() == FALSE) {
			$this->render_template('secure/expense/Editexpenses', $data);
		}
		else{
				 
					
					$params = array(
							'category_id' => $this->input->post('category_id'),
							'full_name' => $this->input->post('full_name'),
							'voucher_date' => $this->input->post('voucher_date'),
							'amount' => $this->input->post('amount'),
							'description' => $this->input->post('description'),
							'status' => $this->input->post('status'),
							
							//'payment_status' =>1,
							'authorized_signatory'=>$this->input->post('authorized_signatory'),
							
					);
					
					//var_dump($params); exit;
					$insert_id = $this->Expenses_model->update_data('tbl_expenses', array('id'=>$id), $params);
					if($insert_id){
						if($_FILES['voucher']['name']!=''){
					$config['upload_path'] = 'uploads/expense/';
					$config['allowed_types'] = 'png|jpg|jpeg';
					$config['max_size'] = '0';
					$config['max_filename'] = '255';
					$config['encrypt_name'] = TRUE;
					$file = array();
					$is_file_error = FALSE;
					if (!$is_file_error) {
						$s =  $this->upload->initialize($config);
						if (!$this->upload->do_upload('voucher')) {
							//echo $this->upload->display_errors();
							$is_file_error = TRUE;
						} else {
							$file = $this->upload->data();
						}
					}	
					if (!$is_file_error) {
						$this->Setting_model->save_file_info($file, array('id'=>$id), 'tbl_expenses', 'voucher');
					}
					}
						
						 $this->session->set_flashdata('msg', '<div class="alert alert-success">Record update Successfully</div>');
						redirect('secure/expenses/recordExpenses');
					}
					else{
						$this->session->set_flashdata('msg', '<div class="alert alert-warning">Invalid! Error Occured.</div>');
						redirect('secure/expenses/recordExpenses');
					}
					  	
		}
	}
	
	public function expenselist(){
		$data['expenseList'] 	 = 	  $this->Expenses_model->get_expense_list();
		$data['title'] 	 = 	  'Expenses List';
		
		$this->render_template('secure/expense/expenselist', $data);
	}
	
	public function printvoucher($id){
		$data['title'] = 'Print Voucher';
		$data['expense'] = $this->Expenses_model->get_data('tbl_expenses', array('id'=>$id));
		$data['category'] = $this->Expenses_model->get_data('tbl_expense_category', array('id'=>$data['expense']['category_id']));
		$data['sitedata'] = $this->Expenses_model->get_data('tbl_setting', array('id'=>1));
		$data['amount_in_words'] = $this->getIndianCurrency($data['expense']['amount']);
		//var_dump($data);
		//exit;
		$this->render_template('secure/expense/expensePrint', $data);
	}
	
	
}
