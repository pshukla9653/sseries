<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web_model extends CI_Model
{

    function __construct(){
     
          parent::__construct();
		  
     }
function get_site_setting(){
	return $this->db->get_where('tbl_setting',array('id'=>1))->row_array();
}

public function getpagedata($slug) {
	
		$this->db->select('*');
		$this->db->from('tbl_pages');
		$this->db->where('slug', $slug);
		$this->db->where('status', '1');
		$query = $this->db->get();
		if($query->num_rows() > 0){
		return array_shift($query->result_array());
		}
		else
		{
			return false;	
		}
		
	}

public function select_list($value, $table, $where, $orderby){
		$this->db->select($value);
		$this->db->from($table);
		$this->db->where('status', '1');
		$this->db->where($where);
		$this->db->order_by($orderby, 'ASC');
		$query = $this->db->get();
		if($query){
		return $query->result_array();
		}
		else
		{
			return false;	
		}	
	}

	public function insert_data($table, $data)
	{
	  	
	  	$this->db->insert($table, $data);
		return $this->db->insert_id();

	}

	 public function checkmobile($mobile){
  		// echo $username, $password;exit;
		$this -> db -> select('*');
		$this -> db -> from('tbl_student');
		$this -> db -> where('mobile_number', $mobile);
		$this -> db -> where('status', '1');
		$query = $this->db->get();
		
		if($query -> num_rows() == 1) {
			return true;
		} else {
			
			return false;
		}			
     }	

     public function login($email, $passkey){
  		// echo $username, $password;exit;
		$this -> db -> select('*');
		$this -> db -> from('tbl_student');
		$this -> db -> where('mobile_number', $email);
		$this -> db -> where('status', '1');
		$query = $this->db->get();
		
		if($query -> num_rows() == 1) {
		//echo "hello";exit;
			$res['result'] = array_shift($query->result_array());
			//echo var_dump($res['result']);
			$h = hash("sha256", $passkey.$res['result']['salt']);
			//echo $h;
			if($h==$res['result']['passkey'])
			//echo "hello";exit;
				return array_shift($query->result_array());
		} else {
			//echo "hiii";exit;
			return false;
		}			
     }	

	
	
function get_data($table, $where)
    {
        return $this->db->get_where($table, $where)->row_array();
    }

public function select_records($value, $table, $where, $orderby){
		$this->db->select($value);
		$this->db->from($table);
		$this->db->where('status', 0);
		$this->db->where($where);
		$this->db->order_by($orderby, 'ASC');
		$query = $this->db->get();
		if($query){
		return $query->result_array();
		}
		else
		{
			return false;	
		}	
	}

	

function get_registration_list()
    {
		$this->db->order_by('id', 'asc');
        return $this->db->get_where('tbl_reg
        	',array('status'=>0))->result_array();
    } 


function update_data($table, $id, $params)
    {
        $this->db->where('id', $id);
        return $this->db->update($table, $params);
    } 
	
function update_data_where($table, $where, $params)
    {
        $this->db->where($where);
        return $this->db->update($table, $params);
    } 	 

}
?>