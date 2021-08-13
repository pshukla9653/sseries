<?php
class Expenses_model extends CI_Model
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
	
	public function save_file_info($file, $where, $table, $field) {
		//start db traction
		$this->db->trans_start();
		
		$this->db->where($where);
		$this->db->update($table, array($field=>$file['file_name']));
		
		//complete the transaction
		$this->db->trans_complete();
		//check transaction status
		if ($this->db->trans_status() === FALSE) {
			$file_path = $file['full_path'];
			//delete the file from destination
			if (file_exists($file_path)) {
			unlink($file_path);
		}
		//rollback transaction
		$this->db->trans_rollback();
			return FALSE;
		} else {
			//commit the transaction
			$this->db->trans_commit();
			return TRUE;
		}
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
	
	function get_expense_list()
    {
        $this->db->select('tbl_expenses.*,tbl_expense_category.category_name');
		$this->db->from('tbl_expenses');
		$this->db->join('tbl_expense_category', 'tbl_expense_category.id=tbl_expenses.category_id');
		$query = $this->db->get();
		return $query->result_array();
    }
	 
}
