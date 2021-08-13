<?php
class Question_model extends CI_Model
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
	
	 function get_chapter_list()
    {
        $this->db->select('tbl_chapter.*,tbl_class.class_name,tbl_subject.sub_name');
		$this->db->from('tbl_chapter');
		$this->db->join('tbl_class', 'tbl_class.id=tbl_chapter.class_id');
		$this->db->join('tbl_subject', 'tbl_subject.id=tbl_chapter.sub_id');
		$query = $this->db->get();
		return $query->result_array();
    }
    function get_chapter_list_where($where)
    {
        $this->db->select('id,chapter_name');
        $this->db->from('tbl_chapter');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_question_list()
    {	
        $this->db->select('tbl_question.*,tbl_class.class_name,tbl_subject.sub_name,tbl_chapter.chapter_name');
        $this->db->from('tbl_question');
        $this->db->join('tbl_class', 'tbl_class.id=tbl_question.class_id');
        $this->db->join('tbl_subject', 'tbl_subject.id=tbl_question.sub_id');
        $this->db->join('tbl_chapter', 'tbl_chapter.id=tbl_question.chapter_id');
		//$this->db->limit(3);
		//$this->db->order_by('tbl_question.id', 'RANDOM');
		
        $query = $this->db->get();
        return $query->result_array();
    }
	
	function get_question($where)
    {
        $this->db->select('tbl_question.*,tbl_class.class_name,tbl_subject.sub_name,tbl_chapter.chapter_name');
        $this->db->from('tbl_question');
        $this->db->join('tbl_class', 'tbl_class.id=tbl_question.class_id');
        $this->db->join('tbl_subject', 'tbl_subject.id=tbl_question.sub_id');
        $this->db->join('tbl_chapter', 'tbl_chapter.id=tbl_question.chapter_id');
		$this->db->where($where);
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_question_list_where($where)
    {
        $this->db->select('id');
        $this->db->from('tbl_question');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result_array();
    }

    
}
