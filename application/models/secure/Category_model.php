<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Category_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get category by id
     */
    function get_category($id)
    {
        return $this->db->get_where('tbl_category',array('id'=>$id))->row_array();
    }
    
	function get_main_categorylist()
    {
		$this->db->order_by('id', 'asc');
        return $this->db->get_where('tbl_category',array('category_parent_id'=>0,'display_in_menu'=>1,'status'=>1))->result_array();
    }
	function get_sub_categorylist($id)
    {
		$this->db->order_by('id', 'asc');
        return $this->db->get_where('tbl_category',array('category_parent_id'=>$id,'display_in_menu'=>1,'status'=>1))->result_array();
    }
	
	function get_all_sub_categorylist($id, $f)
    {
		$this->db->order_by('id', 'asc');
		$this->db->like('category_function', $f);
        return $this->db->get_where('tbl_category',array('category_parent_id'=>$id))->row_array();
    }
    /*
     * Get all categorylist count
     */
    function get_all_categorylist_count()
    {
        $this->db->from('tbl_category');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all categorylist
     */
    function get_all_categorylist()
    {
        $this->db->order_by('id', 'asc');
        return $this->db->get('tbl_category')->result_array();
    }
     function get_own_categorylist()
    {
        $this->db->order_by('id', 'asc');
        return $this->db->get_where('tbl_category', array('createdby'=>$this->session->userdata('id')))->result_array();
    }   
    /*
     * function to add new category
     */
    function add_category($params)
    {
        $this->db->insert('tbl_category',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update category
     */
    function update_category($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('tbl_category',$params);
    }
    
    /*
     * function to delete category
     */
    function delete_category($id)
    {
        return $this->db->delete('tbl_category',array('id'=>$id));
    }
}
