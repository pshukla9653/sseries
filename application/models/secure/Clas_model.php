<?php
class Clas_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    
    function get_data($table, $where)
    {
        return $this->db->get_where($table, $where)->row_array();
    }
	function get_all_list($table, $where)
    {
        $this->db->order_by('id', 'asc');
        return $this->db->get_where($table, $where)->result_array();
    }
    function insert_data($table, $params)
    {
        $this->db->insert($table,$params);
        return $this->db->insert_id();
    }
    
    
    function update_data($table, $where,$params)
    {
        $this->db->where($where);
        return $this->db->update($table,$params);
    }
    
    
    function delete_data($table, $where)
    {
        return $this->db->delete($table, $where);
    }
	
	 
}
