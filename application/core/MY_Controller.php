
<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class MY_controller extends CI_Controller
{
 public $site_setting;
  function __construct()
  {
    parent::__construct();
	$this->load->model('secure/Setting_model');
	$this->site_setting = $this->Setting_model->get_setting(1);
	$this->load->library('curl');
	//var_dump($this->site_setting); exit;
	
  }
  
  function SendSMS($mob, $textmsg){
	$sender ='SSTEST';
	//$mob ='D!~1740XtHXdIGEMw';
	$auth='D!~1740XtHXdIGEMw';
	$msg = urlencode($textmsg); 

	$url = 'https://global.datagenit.com/API/sms-api.php?auth='.$auth.'&msisdn='.$mob.'&senderid='.$sender.'&message='.$msg.'';  // API URL

	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_POST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // change to 1 to verify cert
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
	//curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
	$result = curl_exec($ch);
	return $result;
} 
  
}
 
class Admin_Controller extends MY_controller 
{

	var $GroupPermission = array();
	var $GroupName = '';
	var $Setting = '';
	var $CityName = '';
	var $WalletBlanace = '';

	public function __construct() 
	{
		parent::__construct();
		
		
		if(empty($this->session->userdata('logged_in'))) {
			$session_data = array('logged_in' => FALSE);
			$this->session->set_userdata($session_data);
		}
		else {
			$group_id = $this->session->userdata('group_id');
			$this->load->model('secure/Group_model');
			//get_sum_amount($sum, $table, $where)
			
			$getAmount = $this->Group_model->get_sum_amount('commssion', 'tbl_member_payment', array('user_id'=>$this->session->userdata('id'),'payment_status'=>0));
			
			$this->WalletBlanace = $getAmount['commssion'];
			$group_data = $this->Group_model->get_group($group_id);
			if($group_data['id'] == '6'){
				$student = $this->Group_model->get_data('tbl_student_profile', array('student_id'=>$this->session->userdata('id')));
				$city = $this->Group_model->get_data('tbl_cities', array('city_id'=>$student['city_id']));
				$this->CityName = $city['city_name'];
				
			}
			else{
				$user = $this->Group_model->get_data('tbl_users_details', array('user_id'=>$this->session->userdata('id')));
				$city = $this->Group_model->get_data('tbl_cities', array('city_id'=>$user['city_id']));
				$this->CityName = $city['city_name'];
			}
			$this->GroupName = $group_data['group_title'];
			$this->GroupPermission = explode(',', $group_data['group_permission']);
		}
	}
	function getIndianCurrency(float $number)
{
    $decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(0 => '', 1 => 'one', 2 => 'two',
        3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
        7 => 'seven', 8 => 'eight', 9 => 'nine',
        10 => 'ten', 11 => 'eleven', 12 => 'twelve',
        13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
        16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
        19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
        40 => 'forty', 50 => 'fifty', 60 => 'sixty',
        70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
    $digits = array('', 'hundred','thousand','lakh', 'crore','arab');
    while( $i < $digits_length ) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? '' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' ' : null;
            $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
        } else $str[] = null;
    }
    $Rupees = implode('', array_reverse($str));
    $paise = ($decimal) ? "and " . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
   return strtoupper(($Rupees ? $Rupees . 'Rupees ' : '') . $paise).' ONLY';
}
function CTH_debug_var($data)
    {
        echo '<pre>';
			print_r($data);
		echo '</pre>';
    } 
	
public function import_excel(){
		$file = 'uploads/test1.xls';
		
		$this->load->library('PHPExcel');
		$objPHPExcel = PHPExcel_IOFactory::load($file);
		
		$cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
		//echo var_dump($cell_collection); exit;
		foreach ($cell_collection as $cell) {
    $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
    $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
    $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
 
    //header will/should be in row 1 only. of course this can be modified to suit your need.
    if ($row == 1) {
        $header[$row][$column] = $data_value;
    } elseif($row != 1) {
        $arr_data[$row][$column] = $data_value;
    }
		}
	$data['header'] = $header;
	$data['values'] = $arr_data;
		return $data;
		
	}
	
function splitn($x, $n) 
{ 
	// If we cannot split the 
	// number into exactly 'N' parts 
	
	// If x % n == 0 then the minimum 
	// difference is 0 and all 
	// numbers are x / n 
	 if ($x % $n == 0) 
	{ 
		for($i = 0; $i < $n; $i++) 
		{ 
			$r[] = ($x / $n); 
		} 
	} 
	
	else
	{ 
		// upto n-(x % n) the values 
		// will be x / n 
		// after that the values 
		// will be x / n + 1 
		$zp = $n - ($x % $n); 
		$pp = $x / $n; 
		for ($i = 0; $i < $n; $i++) 
		{ 
			if($i >= $zp) 
			{ 
				$r[] =  (int)$pp + 1; 
				//echo (" "); 
			} 
			else
			{ 
				$r[] =  (int)$pp; 
				//echo (" "); 
			} 
		} 
	} 
	return $r;
} 
public function objToArray($obj)
{
    // Not an object or array
    if (!is_object($obj) && !is_array($obj)) {
        return $obj;
    }

    // Parse array
    foreach ($obj as $key => $value) {
        $arr[$key] = $this->objToArray($value);
    }

    // Return parsed array
    return $arr;
}
	public function logged_in()
	{
		$session_data = $this->session->userdata();
		if($session_data['logged_in'] == TRUE) {
			redirect('secure/dashboard', 'refresh');
		}
		elseif($session_data['sign_off'] == TRUE) {
			redirect('secure/auth/signoff', 'refresh');
		}
	}

	public function not_logged_in()
	{
		$session_data = $this->session->userdata();
		if($session_data['sign_off'] == TRUE) {
			redirect('secure/auth/signoff', 'refresh');
		}
		elseif($session_data['logged_in'] == FALSE) {
			redirect('secure/auth/login', 'refresh');
		}
	}
	public function convertDatetoMysqlDate($date){
		$d	= explode('/', $date);
		return $date;
		}
		
		function get_first_num_of_words($string, $num_of_words)
    {
        $string = preg_replace('/\s+/', ' ', trim($string));
        $words = explode(" ", $string); // an array

        // if number of words you want to get is greater than number of words in the string
        if ($num_of_words > count($words)) {
            // then use number of words in the string
            $num_of_words = count($words);
        }

        $new_string = "";
        for ($i = 0; $i < $num_of_words; $i++) {
            $new_string .= $words[$i] . " ";
        }

        return trim($new_string);
    }
	
	
		
	public function render_template($page = null, $data = array())
	{
		
		$this->load->model('secure/Menu_model');
		$data['menu_order'] = $this->objToArray(json_decode($this->site_setting['admin_menu_order'], true));
		$this->load->view('secure/template/header', $data);
		$this->load->view('secure/template/side_menu', $data);
		$this->load->view($page, $data);
		$this->load->view('secure/template/footer', $data);
	}

	public function check_permission()
	{
		if($this->session->userdata('logged_in')==true){
		$checkallpermission = $this->uri->segment(2).'-'.$this->uri->segment(3);
		$checkownpermission = $this->uri->segment(2).'-'.$this->uri->segment(3).'-own';
		
		if(in_array($checkallpermission, $this->GroupPermission) || in_array($checkownpermission, $this->GroupPermission)){
			
			if(in_array($checkallpermission, $this->GroupPermission)){
				return 'All';
			}
			elseif(in_array($checkownpermission, $this->GroupPermission)){
				return 'Own';
			}
		}
		else{
			echo '<script> alert("Access Denied! You do not have permission to access this page");</script>';
			echo '<script> window.history.back();</script>';
		}
		}
		else{
				$this->not_logged_in();
		}

	}

	
}
 
class Public_controller extends MY_controller
{
	public $layout;
	
	public $main_menu;
  function __construct()
  {
    parent::__construct();
	

  }
  
  public function render_template($page, $data){
	  
	  $this->load->view('layout/header', $data);
	  $this->load->view($page, $data);
	  $this->load->view('layout/footer', $data);
  }
  function get_first_num_of_words($string, $num_of_words)
    {
        $string = preg_replace('/\s+/', ' ', trim($string));
        $words = explode(" ", $string); // an array

        // if number of words you want to get is greater than number of words in the string
        if ($num_of_words > count($words)) {
            // then use number of words in the string
            $num_of_words = count($words);
        }

        $new_string = "";
        for ($i = 0; $i < $num_of_words; $i++) {
            $new_string .= $words[$i] . " ";
        }

        return trim($new_string);
    }
  
}