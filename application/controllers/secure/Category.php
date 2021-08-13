<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends Admin_Controller {

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
		$this->load->model('secure/Category_model');
		$this->not_logged_in();
	}
	
	 function index()
    {
		$per = $this->check_permission();
		
		
		if($per=='All'){
        $data['categorylist'] = $this->Category_model->get_all_categorylist();
		}
		elseif($per=='Own'){
		$data['categorylist'] = $this->Category_model->get_own_categorylist();	
		}
        
        $this->render_template('secure/category/index',$data);
    }

    /*
     * Adding a new category
     */
    function add()
    {   
       	$this->check_permission();
	   	
	   	$this->load->library('form_validation');
		$this->form_validation->set_rules('category_title','Category Title','is_unique[tbl_category.category_title]|required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'category_title' => $this->input->post('category_title'),
				'status' => $this->input->post('status'),
				'createdby' => $this->session->userdata('id'),
				'createdon' => date_timestamp_get(date_create()),
            );
            
            $category_id = $this->Category_model->add_category($params);
            if($category_id){
			$this->session->set_flashdata('msg', '<div class="alert alert-success">record Added!</div>');
			redirect('secure/category/index');
			}
        }
        else
        {			$data['all_categorylist'] = $this->Category_model->get_all_categorylist();
            
            
			$this->render_template('secure/category/add',$data);
        }
    }  

    /*
     * Editing a category
     */
    function edit($id)
    {   
        // check if the category exists before trying to edit it
        $data['category'] = $this->Category_model->get_category($id);
       //check permission 
	   
	   $per = $this->check_permission();
		
		
		if($per=='Own'){
		if(!$data['category']['createdby']==$this->session->userdata('id')){
			echo '<script> alert("Access Denied! You do not have permission to access this page");</script>';
			echo '<script> window.history.back();</script>';
		}
		}
        if(isset($data['category']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('category_title','Category Title','required');

		
			if($this->form_validation->run())     
            {   
                $params = array(
					'category_title' => $this->input->post('category_title'),
					'status' => $this->input->post('status'),
					'updatedby' => $this->session->userdata('id'),
					'updatedon' => date_timestamp_get(date_create()),
                );

                if($this->Category_model->update_category($id,$params)){
				$this->session->set_flashdata('msg', '<div class="alert alert-success">record updated!</div>');            
                redirect('secure/category/index');
				}
            }
            else
            {				$data['all_categorylist'] = $this->Category_model->get_all_categorylist();

               
				$this->render_template('secure/category/edit', $data);
            }
        }
        else
            
			$this->session->set_flashdata('msg', '<div class="alert alert-danger">The category you are trying to edit does not exist.</div>'); 
    } 

    /*
     * Deleting menu
     */
    function delete($id)
    {
        $menu = $this->Category_model->get_menu($id);
		$per = $this->check_permission();
		
		
		if($per=='Own'){
		if(!$category['category']['createdby']==$this->session->userdata('id')){
			echo '<script> alert("Access Denied! You do not have permission to access this page");</script>';
			echo '<script> window.history.back();</script>';
		}
		}
        // check if the category exists before trying to delete it
        if(isset($category['id']))
        {
            $this->Category_model->delete_category($id);
            redirect('secure/category/index');
        }
        else
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">The category you are trying to delete does not exist.</div>');
    }
	
}
