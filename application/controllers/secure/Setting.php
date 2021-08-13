<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends Admin_Controller {

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
		$this->load->model('secure/Setting_model');
		$this->load->model('secure/Countries_model');
		$this->load->model('secure/Auth_model');
		$this->not_logged_in();
	}
	
	 function configuration()
    {
		$per = $this->check_permission();
		$data['setting'] = $this->Setting_model->get_setting(1);
		$this->load->library('form_validation');
		//set validations
			$this->form_validation->set_rules("title", "Title", "trim|required");
			$this->form_validation->set_rules("keyword", "Keyword", "trim|required");
			$this->form_validation->set_rules("description", "description", "trim|required");
			$this->form_validation->set_rules("analytics_code", "analytics_code", "trim|required");
			$this->form_validation->set_rules("site_name", "site_name", "trim|required");
			$this->form_validation->set_rules("keyword", "Keyword", "trim|required");
		
        if($this->form_validation->run())     
        {   
            $params = array(
			'title'			=> $this->input->post("title"),
			'keyword'			=> $this->input->post("keyword"),
			'description'		=> $this->input->post("description"),
			'analytics_code'	=> $this->input->post("analytics_code"),
			'site_name'			=> $this->input->post("site_name"),
			'site_url'			=> $this->input->post("site_url"),
			'address'			=> $this->input->post("address"),
			'phone'				=> $this->input->post("phone"),
			'email'				=> $this->input->post("email"),
			'live_mode'			=> $this->input->post("live_mode"),
			
            );
			//var_dump($_FILES['logo']); exit;
            if($_FILES['logo']['name']!=''){
					$config['upload_path'] = 'uploads/logo/';
					$config['allowed_types'] = 'png|jpg|jpeg';
					$config['max_size'] = '0';
					$config['max_filename'] = '255';
					$config['encrypt_name'] = TRUE;
					$file = array();
					$is_file_error = FALSE;
					if (!$is_file_error) {
						$s =  $this->upload->initialize($config);
						if (!$this->upload->do_upload('logo')) {
							//echo $this->upload->display_errors();
							$is_file_error = TRUE;
						} else {
							$file = $this->upload->data();
						}
					}	
					if (!$is_file_error) {
						$this->Setting_model->save_file_info($file, array('id'=>1), 'tbl_setting', 'logo');
					}
					}
					if($_FILES['favicon']['name']!=''){
					$config['upload_path'] = 'uploads/logo/';
					$config['allowed_types'] = 'png|ico';
					$config['max_size'] = '0';
					$config['max_filename'] = '255';
					$config['encrypt_name'] = TRUE;
					$file = array();
					$is_file_error = FALSE;
					if (!$is_file_error) {
						$s =  $this->upload->initialize($config);
						if (!$this->upload->do_upload('favicon')) {
							//echo $this->upload->display_errors();
							$is_file_error = TRUE;
						} else {
							$file = $this->upload->data();
						}
					}	
					if (!$is_file_error) {
						$this->Setting_model->save_file_info($file, array('id'=>1), 'tbl_setting', 'favicon');
					}
					}
            $setting_id = $this->Setting_model->update_setting(1, $params);
			if($setting_id){
			$this->session->set_flashdata('msg', '<div class="alert alert-success">record Updated!</div>');
            redirect('secure/setting/configuration');
			}
        }
        else
        {            
            
		$this->render_template('secure/setting/configuration',  $data);
        }
        
    }
	
	function profile()
    {
		//$per = $this->check_permission();
		$data['user_profile'] = $this->Setting_model->get_user_details();
		$data['countrieslist'] 	= $this->Countries_model->get_all_countrieslist();
		$this->load->library('form_validation');
		//set validations
			$this->form_validation->set_rules("email", "Email", "trim|required");
			$this->form_validation->set_rules("gender", "Gender", "trim|required");
			$this->form_validation->set_rules("date_of_birth", "DOB", "trim|required");
			$this->form_validation->set_rules("mobile", "Mobile", "trim|required");
			
		
        if($this->form_validation->run())     
        {   
            $params = array(
			'email'			=> $this->input->post("email"),
			'mobile'			=> $this->input->post("mobile")
            );
			$params2 = array(
			'name'			=> $this->input->post("name"),
			'date_of_birth'			=> $this->input->post("date_of_birth"),
			'gender'		=> $this->input->post("gender"),
			'address'	=> $this->input->post("address"),
			'country_id'			=> $this->input->post("country_id"),
			'state_id'			=> $this->input->post("state_id"),
			'city_id'			=> $this->input->post("city_id"),
			'zipcode'				=> $this->input->post("zipcode"),
			'about_me'				=> $this->input->post("about_me")
            );
			//var_dump($_FILES['logo']); exit;
            if($_FILES['logo']['name']!=''){
					$config['upload_path'] = 'uploads/profile/';
					$config['allowed_types'] = 'png|jpg|jpeg';
					$config['max_size'] = '0';
					$config['max_filename'] = '255';
					$config['encrypt_name'] = TRUE;
					$file = array();
					$is_file_error = FALSE;
					if (!$is_file_error) {
						$s =  $this->upload->initialize($config);
						if (!$this->upload->do_upload('profile_photo')) {
							//echo $this->upload->display_errors();
							$is_file_error = TRUE;
						} else {
							$file = $this->upload->data();
						}
					}	
					if (!$is_file_error) {
						$this->Setting_model->save_file_info($file, array('user_id'=>$this->session->userdata('id')), 'tbl_users_details', 'profile_photo');
					}
					}
					
            $setting_id = $this->Setting_model->update_user($this->session->userdata('id'), $params);
			if($setting_id){
				
			$setting_id = $this->Setting_model->update_user_detail($this->session->userdata('id'), $params2);
			$this->session->set_flashdata('msg', '<div class="alert alert-success">record Updated!</div>');
            redirect('secure/setting/profile');
			}
        }
        else
        {            
            
		$this->render_template('secure/setting/profile',  $data);
        }
        
    }
		
    function change_password()
    {
		//$per = $this->check_permission();
		
		$this->load->library('form_validation');
		//set validations
		$this->form_validation->set_rules("old_pass", "Old Password", "trim|required|callback_check_oldpassword");
		$this->form_validation->set_rules("new_pass", "New Password", "trim|required");
		$this->form_validation->set_rules("con_pass", "Confirm Password", "trim|required|matches[new_pass]");
		$this->form_validation->set_message("check_oldpassword", "old password not match!");
			
		
        if($this->form_validation->run())     
        {   
            
			
					
            $user_data = $this->Auth_model->get_userdata($this->session->userdata('id'));
			//echo var_dump($user_data); exit;
			$newpassword['passkey'] = hash("sha256", $this->input->post('con_pass').$user_data['salt']);
			$update_password = $this->Setting_model->update_user($this->session->userdata('id'), $newpassword);
			if($update_password){
				
			
			$this->session->set_flashdata('msg', '<div class="alert alert-success">Password Changed Successfully!</div>');
            redirect('secure/setting/change_password');
			}
			else{
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Password Changed Unsuccessfully!</div>');
            	redirect('secure/setting/change_password');
			}
        }
        else
        {            
            
		$this->render_template('secure/setting/change_password',  $data);
        }
        
    }
	
	function check_oldpassword($oldpass){
		$userdata = $this->Auth_model->login($this->session->userdata('username'), $oldpass);
		if($userdata['id'] !=''){
			return TRUE;
		}
		else{
			
			return FALSE;
		}
	}
	
}
