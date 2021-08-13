<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Users_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get user by id
     */
    function get_user($value, $id)
    {
        $this->db->select($value);
		$this->db->from('tbl_users');
		$this->db->join('tbl_users_details', 'tbl_users.id=tbl_users_details.user_id');
		$this->db->where('tbl_users.id', $id);
		$query = $this->db->get();
		return $query->row_array();
    }
        
    /*
     * Get all userlist
     */
    function get_all_userslist()
    {
        if($this->session->userdata('id')==1){
		$this->db->select('*');
		$this->db->from('tbl_users');
		$this->db->join('tbl_users_details', 'tbl_users.id=tbl_users_details.user_id');
		$this->db->join('tbl_group', 'tbl_group.id=tbl_users.group_id');
		$this->db->order_by('tbl_users.id', 'desc');
		$query = $this->db->get();
		return $query->result_array();
		}
		else{
		$this->db->select('*');
		$this->db->from('tbl_users');
		$this->db->join('tbl_users_details', 'tbl_users.id=tbl_users_details.user_id');
		$this->db->where('tbl_users.group_id >', $this->session->userdata('group_id'));
		$this->db->where('tbl_users.group_id <>', 6);
		$this->db->order_by('tbl_users.id', 'desc');
		$query = $this->db->get();
		return $query->result_array();
        
		}
    }
	function get_all_executivelist()
    {
        $this->db->select('*');
		$this->db->from('tbl_users');
		$this->db->join('tbl_users_details', 'tbl_users.id=tbl_users_details.user_id');
		$this->db->where('tbl_users.parent_id', $this->session->userdata('id'));
		$this->db->order_by('tbl_users.id', 'desc');
		$query = $this->db->get();
		return $query->result_array();
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
	 function get_own_userslist()
    {
        if($this->session->userdata('id')==1){
		$this->db->select('*');
		$this->db->from('tbl_users');
		$this->db->join('tbl_users_details', 'tbl_users.id=tbl_users_details.user_id');
		$this->db->where('tbl_users.id', $id);
		$this->db->order_by('tbl_users.id', 'desc');
		$query = $this->db->get();
		return $query->row_array();
		}
		else{
			$this->db->select('*');
			$this->db->from('tbl_users');
			$this->db->join('tbl_users_details', 'tbl_users.id=tbl_users_details.user_id');
			$this->db->where('tbl_users.id', $id);
			$this->db->where('tbl_users.group_id >', $this->session->userdata('group_id'));
			$this->db->where('tbl_users.createdby', $this->session->userdata('id'));
			$this->db->order_by('tbl_users.id', 'desc');
			$query = $this->db->get();
			return $query->row_array();
		}
	} 
	
	
	 function get_coordinaterlist()
    {
       	$this->db->select('tbl_users.id,tbl_users_details.name');
		$this->db->from('tbl_users');
		$this->db->join('tbl_users_details', 'tbl_users.id=tbl_users_details.user_id');
		$this->db->where('tbl_users.group_id', 4);
		$this->db->order_by('tbl_users.id', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	} 
	function get_member_list()
    {
       	$this->db->select('tbl_users.id,tbl_users_details.name,tbl_group.group_title');
		$this->db->from('tbl_users');
		$this->db->join('tbl_users_details', 'tbl_users.id=tbl_users_details.user_id');
		$this->db->join('tbl_group', 'tbl_group.id=tbl_users.group_id');
		$this->db->where_in('tbl_users.group_id', array(4,5));
		$this->db->where('tbl_users.status', 1);
		$this->db->order_by('tbl_users_details.name', 'asc');
		$query = $this->db->get();
		return $query->result_array();
	}   
	function get_excutivelist($id)
    {
       $this->db->select('*');
		$this->db->from('tbl_users');
		$this->db->join('tbl_users_details', 'tbl_users.id=tbl_users_details.user_id');
		$this->db->where('tbl_users.parent_id', $id);
		$this->db->order_by('tbl_users.id', 'asc');
		$query = $this->db->get();
		return $query->result_array();
	}   
    /*
     * function to add new group
     */
    function add_users($table,$params)
    {
        $this->db->insert($table,$params);
        return $this->db->insert_id();
    }
    function insert_data($table, $params)
    {
        $this->db->insert($table,$params);
        return $this->db->insert_id();
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
	
	function get_capter_num($wherein)
    {
        $this->db->select('id');
		$this->db->from('tbl_chapter');
		$this->db->where_in('sub_id', $wherein);
        $query = $this->db->get();
		return $query->num_rows();
    }
    /*
     * function to update group
     */
    function update_users($table, $id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update($table,$params);
    }
    function get_selected_value($value, $table, $where)
    {
        $this->db->select($value);
		$this->db->from($table);
		$this->db->where($where);
        $query = $this->db->get();
		return $query->row_array();
    }
	function update_data_where($table, $where,$params)
    {
        $this->db->where($where);
        return $this->db->update($table,$params);
    }
    /*
     * function to delete group
     */
    function delete_users($id)
    {
        $this->db->delete('tbl_users',array('id'=>$id));
		return $this->db->delete('tbl_users_details',array('user_id'=>$id));
    }
	function update_data($table, $where,$params)
    {
        $this->db->where($where);
        return $this->db->update($table,$params);
    }
}
