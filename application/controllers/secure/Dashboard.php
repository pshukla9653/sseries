<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
	 public function __construct()
	{
		parent::__construct();
		
		$this->not_logged_in();
		$this->load->model('secure/Users_model');
		$this->load->model('secure/Countries_model');
	}
	public function upload_excel(){
		
		$data = $this->import_excel();	
		foreach($data['values'] as $key=>$value){
			
			$param = array(
				'sub_id'=>$value['A'],
				'class_id'=>$value['B'],
				'chapter_id'=>$value['C'],
				'ques'=>trim(htmlentities($value['D'])),
				'opt_1'=>trim(htmlentities($value['E'])),
				'opt_2'=>trim(htmlentities($value['F'])),
				'opt_3'=>trim(htmlentities($value['G'])),
				'opt_4'=>trim(htmlentities($value['H'])),
				'ans'=>trim(htmlentities($value['I'])),
				'status'=>1,
				'is_correct'=>1,
				'createdby'=>1,
				'createdon'=>date_timestamp_get(date_create()),
			);
			$id = $this->Users_model->add_users('tbl_question', $param);
			echo $id.'<br>';
		}
		
	}
	public function index()
	{
		
		////var_dump($this->session->userdata('group_id')); exit;
		$group_id = $this->session->userdata('group_id');
		$data['title'] = 'Dashboard';
		$this->render_template('secure/dashboard'.$group_id, $data);
		///$this->render_template('secure/dashboardbackup', $data);
	}
	
	public function changePassword(){
		$data['title'] = 'Change Password';
		$this->form_validation->set_rules('current_password', 'Current Password', 'required');
		$this->form_validation->set_rules('new_password', 'New Password', 'required');
		$this->form_validation->set_rules('confirm_password', 'Confirm password', 'required|matches[new_password]');
		
		$otp = $this->input->post('password_otp');
		$password = $this->input->post('confirm_password');
		 if ($this->form_validation->run() == FALSE)
        {
		$this->render_template('secure/ChangePassword', $data);
		}
		else{
				$currentPassword = $this->input->post('current_password');
				$confirm_password = $this->input->post('confirm_password');
				//var_dump($this->session->userdata()); exit;
				if($this->session->userdata('group_id') == '6'){
					$getdata = $this->Users_model->get_data('tbl_student', array('id'=>$this->session->userdata('id')));
					$tableName = 'tbl_student';
				}
				else{
					$getdata = $this->Users_model->get_data('tbl_users', array('id'=>$this->session->userdata('id')));
					$tableName = 'tbl_users';
				}
				//var_dump($getdata); exit;
				if($getdata['id']){
					$salt = $getdata['salt'];
					$h = hash("sha256", $currentPassword.$salt);
					if($h == $getdata['passkey']){
						$newpassword = hash("sha256", $confirm_password.$salt);
						
						
						$update = $this->Users_model->update_users($tableName, $getdata['id'] ,array('passkey'=>$newpassword));
						if($update){
							$this->session->set_flashdata('msg', '<div class="alert alert-success">Password Update Successfull</div>');
            				redirect('secure/dashboard/changePassword');
						}
						else{
							$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid Response!</div>');
            				redirect('secure/dashboard/changePassword');
						}
						
					}
					else{
						$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid Current Password!</div>');
            			redirect('secure/dashboard/changePassword');
					}
				}
				else{
					$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid Response!</div>');
            		redirect('secure/dashboard/changePassword');
				}
		}
	}
	
	public function student_profile(){
		$data['title'] = 'Update Profile';
		
		$data['countrieslist'] 	= $this->Countries_model->get_all_countrieslist();
		$data['student']		= $this->Users_model->get_data('tbl_student', array('id'=>$this->session->userdata('id')));
		$data['studentProfile']	= $this->Users_model->get_data('tbl_student_profile', array('student_id'=>$this->session->userdata('id')));
		if($data['studentProfile']['id']){
			$data['country'] = $this->Users_model->get_data('tbl_countries', array('country_id'=>$data['studentProfile']['country_id']));
			$data['state'] = $this->Users_model->get_data('tbl_states', array('state_id'=>$data['studentProfile']['state_id']));
			$data['city'] = $this->Users_model->get_data('tbl_cities', array('city_id'=>$data['studentProfile']['city_id']));
			
		}
		
		$this->form_validation->set_rules('mobile1', 'Mobile 1', 'required');
		//var_dump($data); exit;
		 if ($this->form_validation->run() == FALSE)
        {
		$this->render_template('secure/studentProfile', $data);
		}
		else{
			////var_dump($_FILES); exit;
				if(!empty($_FILES['profile_photo']['name']))
				{
									$config['upload_path'] = 'uploads/profile/';
									$config['allowed_types'] = 'gif|jpg|png';
									$config['max_size'] = '0';
									$config['max_filename'] = '255';
									$config['encrypt_name'] = TRUE;
									$file = array();
									$is_file_error = FALSE;
									if (!$is_file_error) {
										$s =  $this->upload->initialize($config);
										if (!$this->upload->do_upload('profile_photo'))
										{
									      
										  $this->session->set_flashdata('msg', '<div class="alert alert-danger">'.$this->upload->display_errors().'</div>');
            								redirect('secure/dashboard/student_profile');
									      $is_file_error = TRUE;
						                }
									    else
										{
							               $file = $this->upload->data();
						                }
					            }	
							    if (!$is_file_error) {
							    
						$this->Users_model->save_file_info($file, array('student_id'=>$this->session->userdata('id')), 'tbl_student_profile', 'profile_photo');
						
					}
							}
				if(!empty($_FILES['result']['name']))
				{
									$config['upload_path'] = 'uploads/profile/';
									$config['allowed_types'] = 'gif|jpg|png';
									$config['max_size'] = '0';
									$config['max_filename'] = '255';
									$config['encrypt_name'] = TRUE;
									$file = array();
									$is_file_error = FALSE;
									if (!$is_file_error) {
										$s =  $this->upload->initialize($config);
										if (!$this->upload->do_upload('result'))
										{
									      
										  $this->session->set_flashdata('msg', '<div class="alert alert-danger">'.$this->upload->display_errors().'</div>');
            								redirect('secure/dashboard/student_profile');
									      $is_file_error = TRUE;
						                }
									    else
										{
							               $file1 = $this->upload->data();
						                }
					            }	
							    if (!$is_file_error) {
							    
						$this->Users_model->save_file_info($file1, array('student_id'=>$this->session->userdata('id')), 'tbl_student_profile', 'result');
						
					}
							}
				$param = array(
					'name'=>$this->input->post('name'),
					'email'=>$this->input->post('email'),
				);
				$param_profile = array(
					'father_name'=>$this->input->post('father_name'),
					'mobile2'=>$this->input->post('mobile2'),
					'gender'=>$this->input->post('gender'),
					'category'=>$this->input->post('category'),
					'date_of_birth'=>$this->input->post('date_of_birth'),
					'address'=>$this->input->post('address'),
					'country_id'=>$this->input->post('country_id'),
					'state_id'=>$this->input->post('state_id'),
					'city_id'=>$this->input->post('city_id'),
					'pin_code'=>$this->input->post('pin_code'),
				);
				//echo 'ok'; exit;
				if($data['studentProfile']['id']){
					$updatestudent = $this->Users_model->update_users('tbl_student', $this->session->userdata('id') , $param);
					$updateProfile = $this->Users_model->update_data_where('tbl_student_profile', array('student_id'=>$this->session->userdata('id')) , $param_profile);
				}
				else{
					$param_profile['student_id'] = $this->session->userdata('id');
					$updatestudent = $this->Users_model->update_users('tbl_student', $this->session->userdata('id') , $param);
					$updateProfile = $this->Users_model->add_users('tbl_student_profile', $param_profile);
				}
				if($updatestudent && $updateProfile){
					$this->session->set_flashdata('msg', '<div class="alert alert-success"> Update Successfull</div>');
            		redirect('secure/dashboard/student_profile');
				}
				else{
					$this->session->set_flashdata('msg', '<div class="alert alert-danger"> Invalid Response</div>');
            		redirect('secure/dashboard/student_profile');
				}
				
		}
	}
	
	public function feedback(){
		$data['title'] = 'Feedback';
		
		$this->form_validation->set_rules('type', 'Type', 'required');
		$this->form_validation->set_rules('subject', 'Subject', 'required');
		$this->form_validation->set_rules('message', 'Message', 'required');
		//var_dump($data); exit;
		 if ($this->form_validation->run() == FALSE)
        {
		$this->render_template('secure/Feedback', $data);
		}
		else{
			////var_dump($_FILES); exit;
				
				$param = array(
					'type'=>$this->input->post('type'),
					'subject'=>$this->input->post('subject'),
					'message'=>$this->input->post('message'),
					'group_id'=>$this->session->userdata('group_id'),
					'createdby'=>$this->session->userdata('id'),
					'createdon'=>date_timestamp_get(date_create())
				);
				
				$insert = $this->Users_model->add_users('tbl_feedback', $param);
				if($insert){
					$this->session->set_flashdata('msg', '<div class="alert alert-success"> Record saved Successfully</div>');
            		redirect('secure/dashboard/feedback');
				}
				else{
					$this->session->set_flashdata('msg', '<div class="alert alert-danger"> Invalid Response</div>');
            		redirect('secure/dashboard/feedback');
				}
				
		}
	}
}
