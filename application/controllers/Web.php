<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Web extends Public_controller
{
 
  function __construct()
  {
    
	parent::__construct();
	$this->load->model('Web_model');
	
  }
  
  	public function index() {
	//welcome-to-the-beigest-online-learning-source-of-s-series
		$data['welmsg'] = $this->Web_model->getpagedata('welcome-to-the-biggest-online-test-series-of-various-competitions');
		//var_dump($data['welmsg']); exit;
      $this->render_template('home', $data);
	  //$this->load->view('home');
       
    }
	
	public function page($slug) {
		$data['page_data']=$this->Web_model->getpagedata($slug);
		///var_dump($data['page_data']);
		$this->render_template('page', $data);
		
	}
	public function about() {
		///var_dump($data['page_data']);
		$this->render_template('about', $data);
		
	}
	public function neet() {
		///var_dump($data['page_data']);
		$this->render_template('neet', $data);
		
	}
	public function jee_main() {
		///var_dump($data['page_data']);
		$this->render_template('jee_main', $data);
		
	}
	public function mh_cet() {
		///var_dump($data['page_data']);
		$this->render_template('mh_cet', $data);
		
	}
	public function jee_advanced() {
		///var_dump($data['page_data']);
		$this->render_template('jee_advance', $data);
		
	}
	public function read_more() {
		///var_dump($data['page_data']);
		$this->render_template('home_content', $data);
		
	}
	public function notes() {
		///var_dump($data['page_data']);
		$this->render_template('notes', $data);
		
	}
	public function services() {
		///var_dump($data['page_data']);
		$this->render_template('services', $data);
		
	}
	public function support() {
		///var_dump($data['page_data']);
		$this->render_template('support', $data);
		
	}
	public function privacy_policy() {
		///var_dump($data['page_data']);
		$this->render_template('privacy_policy', $data);
		
	}
	public function terms_conditions() {
		///var_dump($data['page_data']);
		$this->render_template('terms_conditions', $data);
		
	}
	
	public function contact() {
		$this->form_validation->set_rules('name', 'Name', 'required');
    	$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    	$this->form_validation->set_rules('phone', 'Phone', 'required|numeric|min_length[10]|max_length[10]');
    	$this->form_validation->set_rules('comments', 'Comments', 'required');
      	if ($this->form_validation->run() == FALSE)
       {
		$this->render_template('contact', $data);
	   }
	   else{
		   
		   foreach($_POST as $key=>$value){
			   if($key !='submit'){
			   $param[$key] = $value;
			   }
		   }
		  $insert = $this->Web_model->insert_data('tbl_contact', $param);
		  if($insert){
			  $this->session->set_flashdata('msg', '<div class="alert alert-success">Thank you for contact to us. We will revert you shortly.</div>');
			 	redirect('Web/contact');
		  }
		   else{
			 	$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid Response!</div>');
			 	redirect('Web/contact');
		 }
	   }
       	
    }
	
	public function faq() {
		//echo 'ok'; exit;
		$this->render_template('faq', $data);
       	
    }
	
    public function registration(){
	
	$data['examList'] = $this->Web_model->select_list('id,exam_name,exam_fee', 'tbl_exam', array('id!='=>''), 'id');
		
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tbl_student.email]');
    $this->form_validation->set_rules('mobile_number', 'Mobile no.', 'required|numeric|is_unique[tbl_student.mobile_number]|min_length[10]|max_length[10]');
    $this->form_validation->set_rules('exam_id', 'Exam name', 'required');
    $this->form_validation->set_rules('passkey', 'Password', 'required');
	$this->form_validation->set_rules('confirm_password', 'Confirm password', 'required|matches[passkey]');
	$this->form_validation->set_message('is_unique', '%s is already register with us');
//var_dump($_POST); exit;
     if ($this->form_validation->run() == FALSE)
       {
      $this->render_template('reg', $data);
    }
    else{	
     
    	if($this->input->post('btn')){
      	
         $name    = $this->input->post('name');
         $email   = $this->input->post('email');
         $mobile_number = $this->input->post('mobile_number');
         $exam_id = $this->input->post('exam_id');
         $passkey =$this->input->post('passkey');
         $confirm_password = $this->input->post('confirm_password');
         $salt =  md5(rand(111111,999999));
         $passkey = hash("sha256", $confirm_password.$salt);
         

       

         $param = array(
                        'name' => $name,
                        'email' => $email,
                        'mobile_number' => $mobile_number,
                        'passkey' => $passkey,
                        'salt' => $salt,
                        'mobile_otp' => 0,
                        'email_otp' => 0,
                        'is_mobile_varify' => 0,
                        'is_email_varify' => 0,
                        'status' => 0,
						'reg_date' => date_timestamp_get(date_create()),
                        'group_id' => 6

               ); 
			   for($i=0; $i < count($data['examList']); $i++){
				   		if($data['examList'][$i]['id']==$exam_id){
								$param1['exam_id'] = $exam_id;
								$param1['exam_fee'] = (float)$data['examList'][$i]['exam_fee'];
								$param1['payment_status'] = 0;
								$param1['payment_on'] = 0;
								$param1['exam_status'] = 0;
							}
			   }
		
		
		$mobile1 = $this->Web_model->get_data('tbl_student_referance', array('mobile1'=>$param['mobile_number']));
		$mobile2 = $this->Web_model->get_data('tbl_student_referance', array('mobile2'=>$param['mobile_number']));
		
		if($mobile1['id'] !=''){
			$param['parent_id'] = $mobile1['parent_id'];
		}
		elseif($mobile2['id'] !=''){
			$param['parent_id'] = $mobile2['parent_id'];
		}
		else{
			$param['parent_id'] = 0;
		}
		
         $student_id = $this->Web_model->insert_data('tbl_student', $param);
		 if($student_id){
			 $param1['student_id'] = $student_id;
			 $insert_exam = $this->Web_model->insert_data('tbl_student_exam', $param1);
			 
			 if($insert_exam){
			if($mobile1['id'] !=''){
			$this->Web_model->update_data('tbl_student_referance', $mobile1['id'], array('student_id'=>$student_id));
		}
		elseif($mobile2['id'] !=''){
			$this->Web_model->update_data('tbl_student_referance', $mobil2['id'], array('student_id'=>$student_id));
		}
			 $this->sendotpMobile($student_id, $mobile_number);
			 }
		 }
		 else{
			 	$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid Response!</div>');
			 	redirect('Web/registration');
		 }
         
}

  
}


}

	public function sendotpMobile($student_id, $mobile_number)
	{
	$mobile_otp = rand(111111,999999);
	$textmsg  = 'Your OTP is '.$mobile_otp.' to access your account with SSeries. Do not Share your OTP with any person. OTP is valid for 5 mins.';			
	
	$updateotp = $this->Web_model->update_data('tbl_student', $student_id, array('mobile_otp'=>$mobile_otp));
	//var_dump($updateotp); exit;
	//if($updateotp){ 
	//echo 'ok2';
		if($this->SendSMS($mobile_number, $textmsg)){
			if($textmsg){
			 $this->session->set_userdata('student_id', $student_id);
			 $this->session->set_userdata('otp_mobile', $mobile_number);
			 $this->session->set_userdata('otp', $mobile_otp);
			redirect('Web/otpverify');}
	}
}
	

public function otpverify() {
      $this->form_validation->set_rules('mobile_otp', 'mobile_otp', 'required');
   // $this->form_validation->set_rules('email_otp', 'email_otp', 'required');
    
    if ($this->form_validation->run() == FALSE)
        {
      $this->render_template('otpverify', $data);
    }

    else{
      if($this->input->post('btn')){
        $mobile_otp   = (int)$this->input->post('mobile_otp');
        // $email_otp    = $this->input->post('email_otp');

          

         $login = $this->Web_model->get_data('tbl_student', array('mobile_otp'=>$mobile_otp,'mobile_number'=>$this->session->userdata('otp_mobile'),
		 'id'=>$this->session->userdata('student_id')));
		/// var_dump($login); 
      if($login['id']) {
		
		$updateotp = $this->Web_model->update_data('tbl_student', $this->session->userdata('student_id'), array('is_mobile_varify'=>1,'status'=>1));
       // var_dump($login); exit;
		$sessiondata = array(
									'id' => $login['id'],
									'username'  => $login['name'],
									'email'     => $login['email'],
									'group_id'     => $login['group_id'],
									'logged_in' => TRUE);
									
		$this->session->set_userdata($sessiondata);
        if($this->session->userdata('logged_in')==TRUE){
			$getexam = $this->Web_model->get_data('tbl_student_exam', array('student_id'=>$this->session->userdata('id')));
			$this->session->set_userdata('exam_id', $getexam['exam_id']);
			if($getexam['payment_status']=='0'){
			redirect('razorpay/checkout');
			}
			else{
				redirect('secure/dashboard', 'refresh');
			}
									
		}
}
    else{
  				$this->session->set_flashdata('msg', '<div class="alert alert-danger"> invalid otp!</div>');
           		redirect('Web/otpverify');
      }
    } 
   
      }
   
    }
  
	
    
    public function login() {

    $this->form_validation->set_rules('mobile_number', 'Mobile', 'required|numeric|min_length[10]|max_length[10]');
    $this->form_validation->set_rules('passkey', 'passkey', 'required');
    
    
    if ($this->form_validation->run() == FALSE)
        {
      $this->render_template('login', $data);
    }
    else{
        
         if($this->input->post('btn')){
          if($this->Web_model->checkmobile($this->input->post('mobile_number'))){
            $login= $this->Web_model->login($this->input->post('mobile_number'), $this->input->post('passkey'));
            if($login!=NULL){
          
              if($login['is_forget']==1){
				  $this->forgetPassword();
			  }
			  elseif($login['is_mobile_varify']==0){
				  $this->sendotpMobile($login['id'], $login['mobile_number']);
			  }
			  else{
				  
				$getexam  = $this->Web_model->get_data('tbl_student_exam', array('student_id'=>$login['id'])); 
				//var_dump($getexam); exit;
              $sessiondata = array( 
                  'id' => $login['id'],
                  'email'  => $login['email'],
				  'username'  => $login['name'],
                  'mobile_number'     => $login['mobile_number'],
                  'group_id'     => $login['group_id'],
				  'exam_id'     => $getexam['exam_id'],
                  'user_id' => TRUE,
				  'logged_in' =>TRUE);
                  
                  $this->session->set_userdata($sessiondata);
                  if($this->session->userdata('user_id')==TRUE){
					 if($getexam['payment_status']=='0'){
						redirect('razorpay/checkout');
					}
					 else{
						
                  			redirect('secure/Dashboard/index', 'refresh');
					 }
                  
                  }
                  
                  
            }
			}
            else{
              $this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid Password!</div>');
              redirect('Web/login');
            }
            
          }
          else{
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Mobile invalid!</div>');
            redirect('Web/login');
          }
        }
    }

        
    }
	
	public function forgetPassword(){
		$this->form_validation->set_rules('mobile_number', 'Mobile', 'required|numeric|min_length[10]|max_length[10]');
		
		$mobile_number = $this->input->post('mobile_number');
		 if ($this->form_validation->run() == FALSE)
        {
		$this->render_template('forget_password', $data);
		}
		else{
			///var_dump($_POST);
			if($this->input->post('btn')){
          		if($this->Web_model->checkmobile($mobile_number)){
					$get_student = $this->Web_model->get_data('tbl_student', array('mobile_number'=>$mobile_number));
					$mobile_otp = rand(111111, 999999);
					$textmsg  = 'Your Reset Password OTP is '.$mobile_otp.' to access your account with SSeries. Do not Share your OTP with any person. OTP is valid for 5 mins.';			
	
					$updateotp = $this->Web_model->update_data('tbl_student', $get_student['id'], array('mobile_otp'=>$mobile_otp,'is_mobile_varify'=>0,'is_forget'=>1));
					  //var_dump($updateotp); exit;
					  //if($updateotp){
						  if($this->SendSMS($mobile_number, $textmsg)){
							  if($textmsg){
							   $this->session->set_userdata('student_id', $get_student['id']);
							   $this->session->set_userdata('otp_mobile', $mobile_number);
							  	redirect('Web/setNewPassward');
								}
					  }
					
					
					
		  		}
				}
				else{
            			$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid Mobile Number ! Please Enter Correct Number</div>');
            			redirect('Web/forgetPassword');
          			}
			}
		}
	

	
	public function setNewPassward(){
		$this->form_validation->set_rules('password_otp', 'OTP', 'required|numeric|min_length[6]|max_length[6]');
		$this->form_validation->set_rules('new_password', 'New Password', 'required');
		$this->form_validation->set_rules('confirm_password', 'Confirm password', 'required|matches[new_password]');
		
		$otp = $this->input->post('password_otp');
		$password = $this->input->post('confirm_password');
		 if ($this->form_validation->run() == FALSE)
        {
		$this->render_template('new_password', $data);
		}
		else{
			///var_dump($this->session->userdata()); exit;
			 $get_student = $this->Web_model->get_data('tbl_student', array('id'=>$this->session->userdata('student_id'),'mobile_otp'=>$otp));
			 
			 if($get_student['id']){
				 
				 $h = hash("sha256", $password.$get_student['salt']);
				 $params = array(
				 	'passkey'=>$h,
				 	'is_mobile_varify'=>1,
					'is_forget'=>0,
				 );
				 
				 $update = $this->Web_model->update_data('tbl_student', $get_student['id'], $params);
				 if($update){
					 $this->session->set_flashdata('msg', '<div class="alert alert-success">Password Change Successfull! Please Login With New Password</div>');
            			redirect('Web/setNewPassward');
				 }
				 else{
					 $this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid OTP</div>');
            			redirect('Web/setNewPassward');
				 }
			 }
			 else{
				 $this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid OTP</div>');
            			redirect('Web/setNewPassward');
			 }
			 
			 
		}
	}


	}
?>
    

