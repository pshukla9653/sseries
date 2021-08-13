<?php
class Abroad_model extends CI_Model
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
	
	
	function get_last_rowid($table){
		$this->db->select('id');
		$this->db->from($table);
		$this->db->order_by('id', 'desc');
		$this->db->limit(1);
        $query = $this->db->get();
		return $query->result_array();
	}
		
	function get_all_list_whereIn($value, $table, $where)
    {
       $this->db->select($value);
		$this->db->from($table);
		$this->db->where_in($where);
        $query = $this->db->get();
		return $query->result_array();
    }
    function insert_data($table, $params)
    {
        $this->db->insert($table,$params);
        return $this->db->insert_id();
    }
    function get_selected_value($value, $table, $where)
    {
        $this->db->select($value);
		$this->db->from($table);
		$this->db->where($where);
        $query = $this->db->get();
		return $query->row_array();
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
	
	function get_abroad_student_list()
    {
        $this->db->select('tbl_student_abroad.*,tbl_admissions_abroad.country_name');
		$this->db->from('tbl_student_abroad');
		$this->db->join('tbl_admissions_abroad', 'tbl_admissions_abroad.id=tbl_student_abroad.country_id');
		$query = $this->db->get();
		return $query->result_array();
    }
	 
}
