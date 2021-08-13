<?php
class Subject_model extends CI_Model
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
	
	function get_all_ques_list_limit($value, $table, $where, $limit)
    {
        $this->db->select($value);
		$this->db->from($table);
		$this->db->where($where);
		$this->db->order_by('id', 'RANDOM');
		$this->db->limit($limit);
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
	
	function get_subject_setting_list()
    {
        $this->db->select('tbl_subject_setting.*,tbl_exam.exam_name,tbl_subject.sub_name');
		$this->db->from('tbl_subject_setting');
		$this->db->join('tbl_exam', 'tbl_exam.id=tbl_subject_setting.exam_id');
		$this->db->join('tbl_subject', 'tbl_subject.id=tbl_subject_setting.sub_id');
		$query = $this->db->get();
		return $query->result_array();
    }
	 
}
