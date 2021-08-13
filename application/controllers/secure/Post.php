<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Post extends Admin_Controller{
    function __construct()
    {
        parent::__construct();
		$this->load->model('secure/Post_model');
		
    } 

    /*
     * Listing of postlist
     */
    function index()
    {
        $per = $this->check_permission();
		
		
		if($per=='All'){
        $data['postlist'] = $this->Post_model->get_all_postlist();
		}
		elseif($per=='Own'){
		$data['postlist'] = $this->Post_model->get_own_postlist();
		}
		$data['categorylist'] = $this->Post_model->get_post_categorylist();
		
		//var_dump($data['postlist']); exit;
		
		$this->render_template('secure/post/index', $data);
    }
	
	function postCategoryList()
    {
        $per = $this->check_permission();
		
		
		if($per=='All'){
        $data['categorylist'] = $this->Post_model->get_post_categorylist();
		}
		elseif($per=='Own'){
		$data['categorylist'] = $this->Post_model->get_own_categorylist();
		}
		
		//var_dump($data);
		$this->render_template('secure/post/postCategoryList', $data);
    }
    /*
     * Adding a new post
     */
	 
	function addPostCategory(){
		$this->check_permission();
	   	
		
	   	$this->load->library('form_validation');
		$this->form_validation->set_rules('category_parent_id','Category','is_unique[tbl_category.category_title]|required');
		$this->form_validation->set_rules('category_title','Category Title','is_unique[tbl_category.category_title]|required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'display_in_menu' => $this->input->post('display_in_menu'),
				'category_parent_id' => $this->input->post('category_parent_id'),
				'category_title' => $this->input->post('category_title'),
				'status' => $this->input->post('status'),
				'createdby' => $this->session->userdata('id'),
				'createdon' => date_timestamp_get(date_create()),
            );
            
            $category_id = $this->Post_model->insert_data('tbl_post_category',$params);
            if($category_id){
			$this->session->set_flashdata('msg', '<div class="alert alert-success">record Added!</div>');
			redirect('secure/post/addpostcategory');
			}
        }
        else
        {			$data['all_categorylist'] = $this->Post_model->get_post_categorylist();
            
            
			$this->render_template('secure/post/addPostCategory',$data);
        }
	}
	
	function editPostCategory($id){
		$data['post_category'] = $this->Post_model->get_data('tbl_post_category', '*', array('id'=>$id));
        $per = $this->check_permission();
		
		
		if($per=='Own'){
		if(!$data['post_category']['createdby']==$this->session->userdata('id')){
			echo '<script> alert("Access Denied! You do not have permission to access this page");</script>';
			echo '<script> window.history.back();</script>';
		}
		}
        if(isset($data['post_category']['id']))
        {
	   	
		
	   	$this->load->library('form_validation');
		$this->form_validation->set_rules('category_parent_id','Category','required');
		$this->form_validation->set_rules('category_title','Category Title','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'display_in_menu' => $this->input->post('display_in_menu'),
				'category_parent_id' => $this->input->post('category_parent_id'),
				'category_title' => $this->input->post('category_title'),
				'status' => $this->input->post('status'),
				'createdby' => $this->session->userdata('id'),
				'createdon' => date_timestamp_get(date_create()),
            );
            
            $category_id = $this->Post_model->update_data('tbl_post_category',$id,$params);
            if($category_id){
			$this->session->set_flashdata('msg', '<div class="alert alert-success">record Updated!</div>');
			redirect('secure/post/postcategorylist');
			}
        }
        else
        {	$data['all_categorylist'] = $this->Post_model->get_post_categorylist();
            
            
			$this->render_template('secure/post/editPostCategory',$data);
        }
		}
		 else
            
			$this->session->set_flashdata('msg', '<div class="alert alert-danger">The category you are trying to edit does not exist.</div>');
	}
	 
    function add()
    {   
        $this->check_permission();
		$data['categorylist'] = $this->Post_model->get_post_categorylist();
		
		//var_dump($data['categorylist']); exit;
		
		$this->load->library('form_validation');
		
		if($_FILES['upload_file']['name']!='')
		{$_POST['upload_file'] = $_FILES['upload_file'];
				$this->form_validation->set_rules('upload_type','Upload Type','required');
				if($this->input->post('upload_type')=='1'){
					$config['upload_path'] = 'uploads/post/photo/';
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['max_size'] = '0';
				}
				elseif($this->input->post('upload_type')=='2'){
					$config['upload_path'] = 'uploads/post/video/';
					$config['allowed_types'] = 'mp4';
				}
									
									$config['max_filename'] = '255';
									$config['encrypt_name'] = TRUE;
									//$file = array();
									$is_file_error = FALSE;
									if (!$is_file_error) {
										$s =  $this->upload->initialize($config);
										if (!$this->upload->do_upload('upload_file'))
										{
											//$this->form_validation->set_rules('upload_type','Upload Type','required',$this->upload->display_errors());
									      $this->session->set_flashdata('msg', '<div class="alert alert-danger">'.$this->upload->display_errors().'</div>');
            							redirect('secure/post/add');
										 // echo $this->upload->display_errors();
									      $is_file_error = TRUE;
						                }
									    else
										{
							               $file = $this->upload->data('file_name');
						                }
					            }	
							    
							}
		
		
		$this->form_validation->set_rules('post_title','Post Title','required');
		$this->form_validation->set_rules('description','Description','required');
		$this->form_validation->set_rules('category_id','Category','required|integer');
		$this->form_validation->set_rules('status','Status','required|integer');
		
		if($this->form_validation->run())     
        {   
				
				//var_dump($_POST);
            	$params = array(
				'post_title' => $this->input->post('post_title'),
				'description' => $this->input->post('description'),
				'post_date' => $this->input->post('post_date'),
				'category_id' => $this->input->post('category_id'),
				'upload_file' => $file,
				'display_in_main_slider' => $this->input->post('display_in_main_slider'),
				'upload_type'=>	$this->input->post('upload_type'),
				'sharing_on' => $this->input->post('sharing_on'),
				'comment_on' => $this->input->post('comment_on'),
				'status' => $this->input->post('status'),
				'createdby' => $this->session->userdata('id'),
				'createdon' => date_timestamp_get(date_create()),
            );
			//var_dump($params); exit;
            $user_id = $this->Post_model->insert_data('tbl_post', $params);
			if($user_id){
				
				
			$this->session->set_flashdata('msg', '<div class="alert alert-success">record Added!</div>');
            redirect('secure/post/index');
			}
        }
        else
        {            
            
			$this->render_template('secure/post/addPost',$data);
        }
    }  

    function editpost($id)
    {   
        $data['categorylist'] = $this->Post_model->get_post_categorylist();
		$data['post'] = $this->Post_model->get_data('tbl_post', '*', array('id'=>$id));
        $per = $this->check_permission();
		
		
		if($per=='Own'){
		if(!$data['post']['createdby']==$this->session->userdata('id')){
			echo '<script> alert("Access Denied! You do not have permission to access this page");</script>';
			echo '<script> window.history.back();</script>';
		}
		}
        if(isset($data['post']['id']))
        {
		//var_dump($data['categorylist']); exit;
		
		$this->load->library('form_validation');
		
		if($_FILES['upload_file']['name']!='')
		{$_POST['upload_file'] = $_FILES['upload_file'];
				$this->form_validation->set_rules('upload_type','Upload Type','required');
				if($this->input->post('upload_type')=='1'){
					$config['upload_path'] = 'uploads/post/photo/';
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['max_size'] = '0';
				}
				elseif($this->input->post('upload_type')=='2'){
					$config['upload_path'] = 'uploads/post/video/';
					$config['allowed_types'] = 'mp4';
				}
									
									$config['max_filename'] = '255';
									$config['encrypt_name'] = TRUE;
									//$file = array();
									$is_file_error = FALSE;
									if (!$is_file_error) {
										$s =  $this->upload->initialize($config);
										if (!$this->upload->do_upload('upload_file'))
										{
											//$this->form_validation->set_rules('upload_type','Upload Type','required',$this->upload->display_errors());
									      $this->session->set_flashdata('msg', '<div class="alert alert-danger">'.$this->upload->display_errors().'</div>');
            							redirect('secure/post/edit/'.$id);
										 // echo $this->upload->display_errors();
									      $is_file_error = TRUE;
						                }
									    else
										{
							               $file = $this->upload->data('file_name');
						                }
					            }	
							    
							}
		
		
		$this->form_validation->set_rules('post_title','Post Title','required');
		$this->form_validation->set_rules('description','Description','required');
		$this->form_validation->set_rules('category_id','Category','required|integer');
		$this->form_validation->set_rules('status','Status','required|integer');
		
		if($this->form_validation->run())     
        {   
				
				//var_dump($_POST);
            	$params = array(
				'post_title' => $this->input->post('post_title'),
				'description' => $this->input->post('description'),
				'post_date' => $this->input->post('post_date'),
				'category_id' => $this->input->post('category_id'),
				'upload_file' => $file,
				'display_in_main_slider' => $this->input->post('display_in_main_slider'),
				'upload_type'=>	$this->input->post('upload_type'),
				'sharing_on' => $this->input->post('sharing_on'),
				'comment_on' => $this->input->post('comment_on'),
				'status' => $this->input->post('status'),
				'createdby' => $this->session->userdata('id'),
				'createdon' => date_timestamp_get(date_create()),
            );
			//var_dump($params); exit;
            $update = $this->Post_model->update_data('tbl_post', $id, $params);
			if($update){
			$this->session->set_flashdata('msg', '<div class="alert alert-success">record updated!</div>');
            redirect('secure/post/index');
			}
        }
        else
        {            
            
			$this->render_template('secure/post/editPost',$data);
        }
		}
		else
		$this->session->set_flashdata('msg', '<div class="alert alert-danger">The post you are trying to edit does not exist.</div>');
    }  
    /*
     * Deleting post
     */
    function delete($id)
    {
        $post = $this->Post_model->get_data('tbl_post','*',array('id'=>$id));
		$per = $this->check_permission();
		
		
		if($per=='Own'){
		if(!$post['createdby']==$this->session->userdata('id')){
			echo '<script> alert("Access Denied! You do not have permission to access this page");</script>';
			echo '<script> window.history.back();</script>';
		}
		}
        // check if the post exists before trying to delete it
        if(isset($post['id']))
        {	//var_dump($post); exit;
			if($post['upload_file']!=''){
				if($post['upload_type']=='1'){ $filepath = 'uploads/post/photo/'.$post['upload_file'];}
				elseif($post['upload_type']=='2'){$filepath = 'uploads/post/video/'.$post['upload_file'];}
			}
			if(is_file($filepath)){
			unlink($filepath);
			}
			
            $this->Post_model->delete_data('tbl_post',$id);
			$this->session->set_flashdata('msg', '<div class="alert alert-danger">Post Deleted!</div>');
            redirect('secure/post/index');
        }
        else
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">The group you are trying to delete does not exist.</div>');
    }
    
}
