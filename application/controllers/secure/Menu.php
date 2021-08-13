<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends Admin_Controller {

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
		$this->load->model('secure/Menu_model');
		$this->not_logged_in();
	}
	
	 function index()
    {
		$per = $this->check_permission();
		
		
		if($per=='All'){
        $data['menulist'] = $this->Menu_model->get_all_menulist();
		}
		elseif($per=='Own'){
		$data['menulist'] = $this->Menu_model->get_own_menulist();	
		}
        
        $this->render_template('secure/menu/index',$data);
    }

    /*
     * Adding a new menu
     */
    function add()
    {   
       	$this->check_permission();
	   	
	   	$this->load->library('form_validation');
		$this->form_validation->set_rules('menu_title','Menu Title','is_unique[tbl_menu.menu_title]|required');
		$this->form_validation->set_rules('menu_function','Menu Function','required');
		$this->form_validation->set_rules('menu_url','Menu Url','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'display_in_menu' => $this->input->post('display_in_menu'),
				'menu_parent_id' => $this->input->post('menu_parent_id'),
				'menu_title' => $this->input->post('menu_title'),
				'menu_function' => $this->input->post('menu_function'),
				'menu_url' => $this->input->post('menu_url'),
				'menu_icon' => $this->input->post('menu_icon'),
				'status' => $this->input->post('status'),
				'createdby' => $this->session->userdata('id'),
				'createdon' => date_timestamp_get(date_create()),
            );
            
            $menu_id = $this->Menu_model->add_menu($params);
            if($menu_id){
			$this->session->set_flashdata('msg', '<div class="alert alert-success">record Added!</div>');
			redirect('secure/menu/index');
			}
        }
        else
        {			$data['all_menulist'] = $this->Menu_model->get_all_menulist();
            
            
			$this->render_template('secure/menu/add',$data);
        }
    }  

    /*
     * Editing a menu
     */
    function edit($id)
    {   
        // check if the menu exists before trying to edit it
        $data['menu'] = $this->Menu_model->get_menu($id);
       //check permission 
	   
	   $per = $this->check_permission();
		
		
		if($per=='Own'){
		if(!$data['menu']['createdby']==$this->session->userdata('id')){
			echo '<script> alert("Access Denied! You do not have permission to access this page");</script>';
			echo '<script> window.history.back();</script>';
		}
		}
        if(isset($data['menu']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('menu_title','Menu Title','required');
			$this->form_validation->set_rules('menu_function','Menu Function','required');
			$this->form_validation->set_rules('menu_url','Menu Url','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'display_in_menu' => $this->input->post('display_in_menu'),
					'menu_parent_id' => $this->input->post('menu_parent_id'),
					'menu_title' => $this->input->post('menu_title'),
					'menu_function' => $this->input->post('menu_function'),
					'menu_url' => $this->input->post('menu_url'),
					'menu_icon' => $this->input->post('menu_icon'),
					'status' => $this->input->post('status'),
					'updatedby' => $this->session->userdata('id'),
					'updatedon' => date_timestamp_get(date_create()),
                );

                if($this->Menu_model->update_menu($id,$params)){
				$this->session->set_flashdata('msg', '<div class="alert alert-success">record updated!</div>');            
                redirect('secure/menu/index');
				}
            }
            else
            {				$data['all_menulist'] = $this->Menu_model->get_all_menulist();

               
				$this->render_template('secure/menu/edit', $data);
            }
        }
        else
            
			$this->session->set_flashdata('msg', '<div class="alert alert-danger">The menu you are trying to edit does not exist.</div>'); 
    } 

    /*
     * Deleting menu
     */
    function delete($id)
    {
        $menu = $this->Menu_model->get_menu($id);
		$per = $this->check_permission();
		
		
		if($per=='Own'){
		if(!$menu['menu']['createdby']==$this->session->userdata('id')){
			echo '<script> alert("Access Denied! You do not have permission to access this page");</script>';
			echo '<script> window.history.back();</script>';
		}
		}
        // check if the menu exists before trying to delete it
        if(isset($menu['id']))
        {
            $this->Menu_model->delete_menu($id);
            redirect('secure/menu/index');
        }
        else
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">The menu you are trying to delete does not exist.</div>');
    }
	function menuorderingpre()
    {
		$per = $this->check_permission();
		
		$data['menulist'] = $this->Menu_model->get_main_menulist();
		
		$this->render_template('secure/menu/menuorderpre', $data);
    }
	function menuorderingpost()
    {
		$per = $this->check_permission();
        
        $this->render_template('secure/menu/menuorderpost',$data);
    }
}
