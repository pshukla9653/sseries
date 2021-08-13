<?php
class Chapter_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    
    function get_data($table, $where)
    {
        return $this->db->get_where($table, $where)->row_array();
    }
	function get_number_records($table, $where)
    {
        return $this->db->get_where($table, $where)->num_rows();
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
    function get_valid_chapter($where, $wherein)
    {
        $this->db->select('id');
		$this->db->from('tbl_chapter');
		$this->db->where($where);
		$this->db->where_in('sub_id', $wherein);
        $query = $this->db->get();
		return $query->row_array();
    }
	function get_sub_list_whereIn($wherein)
    {
        $this->db->select('id,sub_name');
		$this->db->from('tbl_subject');
		$this->db->where($where);
		$this->db->where_in('id', $wherein);
        $query = $this->db->get();
		return $query->result_array();
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
	
	 function get_chapter_list()
    {
        $this->db->select('tbl_chapter.*,tbl_class.class_name,tbl_subject.sub_name');
		$this->db->from('tbl_chapter');
		$this->db->join('tbl_class', 'tbl_class.id=tbl_chapter.class_id');
		$this->db->join('tbl_subject', 'tbl_subject.id=tbl_chapter.sub_id');
		$query = $this->db->get();
		return $query->result_array();
    }
	function get_chapter_setting_list()
    {
        $this->db->select('tbl_chapter_setting.*,tbl_exam.exam_name');
		$this->db->from('tbl_chapter_setting');
		$this->db->join('tbl_exam', 'tbl_exam.id=tbl_chapter_setting.exam_id');
		$query = $this->db->get();
		return $query->result_array();
    }
	
}
