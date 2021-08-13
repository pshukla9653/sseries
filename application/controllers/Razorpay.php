<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * @package Razorpay :  CodeIgniter Razorpay Gateway
 *
 * @author S Series Team
 *
 * @email  info@sseries.org
 *   
 * Description of Razorpay Controller
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Razorpay extends Public_controller {
    // construct
    public function __construct() {
        parent::__construct();   
        $this->load->model('Web_model');     
    }
    // index page
    public function index() {
        $data['title'] = 'Razorpay | S Series';  
        //$data['productInfo'] = $this->site->getProduct();           
        $this->render_template('razorpay/checkout', $data);
    }
    
    // checkout page
    public function checkout() {
		//
        $data['title'] = 'Checkout payment | Sseries';  
		$data['student'] = $this->Web_model->get_data('tbl_student', array('id'=>$this->session->userdata('id'),'status'=>1));
		$data['sudentexamdata'] = $this->Web_model->get_data('tbl_student_exam', array('student_id'=>$this->session->userdata('id'),'exam_id'=>$this->session->userdata('exam_id'),'payment_status'=>0));
		$data['examDetail'] = $this->Web_model->get_data('tbl_exam', array('id'=>$this->session->userdata('exam_id')));
        //$this->site->setProductID($id);
        //$data['itemInfo'] = $this->site->getProductDetails(); 
        $data['return_url'] = site_url().'razorpay/callback';
        $data['surl'] = site_url().'razorpay/success';;
        $data['furl'] = site_url().'razorpay/failed';;
        $data['currency_code'] = 'INR';
		//var_dump($data); exit;
        $this->render_template('razorpay/checkout', $data);
    }

   public function examPayment($exam_id) {
		//
        $data['title'] = 'Checkout payment | Sseries';  
		$data['student'] = $this->Web_model->get_data('tbl_student', array('id'=>$this->session->userdata('id'),'status'=>1));
		$data['sudentexamdata'] = $this->Web_model->get_data('tbl_student_exam', array('student_id'=>$this->session->userdata('id'),'exam_id'=>$exam_id,'payment_status'=>0));
		$data['examDetail'] = $this->Web_model->get_data('tbl_exam', array('id'=>$exam_id));
        //$this->site->setProductID($id);
        //$data['itemInfo'] = $this->site->getProductDetails(); 
        $data['return_url'] = site_url().'razorpay/callbackforexam/'.$exam_id;
        $data['surl'] = site_url().'razorpay/success';;
        $data['furl'] = site_url().'razorpay/failed';;
        $data['currency_code'] = 'INR';
		//var_dump($data); exit;
        $this->render_template('razorpay/checkoutforexam', $data);
    }
   
        
    // callback method
    public function callbackforexam($exam_id) { 
	//var_dump($this->session->userdata());
	///var_dump($_POST);  
        if (!empty($this->input->post('razorpay_payment_id')) && !empty($this->input->post('merchant_order_id'))) {
          	$param['student_id'] = $this->session->userdata('id');
			$param['exam_id'] = $exam_id;
		  	foreach($_POST as $key=>$value){
				if($key!='merchant_surl_id' && $key!='merchant_furl_id'){
				$param[$key] = $value;
				}
			}
			//var_dump($param); exit;
			$checkdata = $this->Web_model->get_data('tbl_razorpay_payment', array('razorpay_payment_id'=>$param['razorpay_payment_id']));
			
			if($checkdata['id']==''){
				$insert = $this->Web_model->insert_data('tbl_razorpay_payment', $param);
				if($insert){
					$update_where = array(
						'student_id' => $this->session->userdata('id'),
						'exam_id' => $exam_id,
					);
					$examdata = $this->Web_model->get_data('tbl_student_exam', $update_where);
					$getstudent = $this->Web_model->get_data('tbl_student', $this->session->userdata('id'));
					$getuser = $this->Web_model->get_data('tbl_users', array('id'=>$getstudent['parent_id']));
					if($examdata['id']){
					$update_payment = array(
						'exam_fee' => $param['merchant_amount'],
						'payment_status' => 1,
						'payment_on' => date_timestamp_get(date_create()),
						'exam_status' => 1,
					);
					
					$updatepaymentt = $this->Web_model->update_data_where('tbl_student_exam', $update_where, $update_payment);
						if($updatepaymentt){
						if($getstudent['parent_id'] !='0'){
						
						if($getuser['group_id'] == '4'){
								$coordinator_payment = round(((float)$examdata['exam_fee'] * 20 /100), 2);
								$coordinator = array(
													'user_id'=>$getuser['id'],
													'group_id'=>4,
													'student_id'=>$this->session->userdata('id'),
													'exam_id'=>$examdata['id'],
													'exam_fee'=>$examdata['exam_fee'],
													'total_commssion'=>$coordinator_payment,
													'current_commssion'=>$coordinator_payment,
													'deducate_commssion'=>0,
													'commssion'=>$coordinator_payment,
													'parent_id'=>0,
													'payment_status'=>0,
													'payment_id'=>0,
													'status'=>1,
													'createdby'=>$this->session->userdata('id'),
													'createdon'=>date_timestamp_get(date_create()),
												
													);
							$coordinator = $this->Web_model->insert_data('tbl_member_payment', $coordinator);						
							}
						elseif($getuser['group_id'] == '5'){
								$totalcommission = round(((float)$examdata['exam_fee'] * 20 /100), 2);
								if($totalcommission > $getuser['commission']){
									
									$coordinator_payment = $totalcommission - (float)$getuser['commission'];
									$executive_payment = (float)$getuser['commission'];
									
								}
								elseif($totalcommission <= $getuser['commission']){
									$coordinator_payment = 0;
									$executive_payment = $totalcommission;
								}
								$coordinator = array(
													'user_id'=>$getuser['parent_id'],
													'group_id'=>4,
													'student_id'=>$this->session->userdata('id'),
													'exam_id'=>$examdata['id'],
													'exam_fee'=>$examdata['exam_fee'],
													'total_commssion'=>$totalcommission,
													'current_commssion'=>$totalcommission,
													'deducate_commssion'=>$executive_payment,
													'commssion'=>$coordinator_payment,
													'parent_id'=>$getuser['id'],
													'payment_status'=>0,
													'payment_id'=>0,
													'status'=>1,
													'createdby'=>$this->session->userdata('id'),
													'createdon'=>date_timestamp_get(date_create()),
													);
								$executive = array(
													'user_id'=>$getuser['id'],
													'group_id'=>5,
													'student_id'=>$this->session->userdata('id'),
													'exam_id'=>$examdata['id'],
													'exam_fee'=>$examdata['exam_fee'],
													'total_commssion'=>$totalcommission,
													'current_commssion'=>(float)$getuser['commission'],
													'deducate_commssion'=>0,
													'commssion'=>$executive_payment,
													'parent_id'=>$getuser['parent_id'],
													'payment_status'=>0,
													'payment_id'=>0,
													'status'=>1,
													'createdby'=>$this->session->userdata('id'),
													'createdon'=>date_timestamp_get(date_create()),
													);
								$coordinator = $this->Web_model->insert_data('tbl_member_payment', $coordinator);
								$executive = $this->Web_model->insert_data('tbl_member_payment', $executive);
								///var_dump($totalcommission);
								
								
							}
					}		
						$this->success($insert);
						}
					}
					else{
						$param1 = array(
						'student_id' => $this->session->userdata('id'),
						'exam_id' => $exam_id,
						'exam_fee' => $param['merchant_amount'],
						'payment_status' => 1,
						'payment_on' => date_timestamp_get(date_create()),
						'exam_status' => 1,
					);
						
						
						
						$insertexam = $this->Web_model->insert_data('tbl_student_exam', $param1);
						if($insertexam){
							if($getstudent['parent_id'] !='0'){
						
						if($getuser['group_id'] == '4'){
								$coordinator_payment = round(((float)$param['merchant_amount'] * 20 /100), 2);
								$coordinator = array(
													'user_id'=>$getuser['id'],
													'group_id'=>4,
													'student_id'=>$this->session->userdata('id'),
													'exam_id'=>$exam_id,
													'exam_fee'=>$param['merchant_amount'],
													'total_commssion'=>$coordinator_payment,
													'current_commssion'=>$coordinator_payment,
													'deducate_commssion'=>0,
													'commssion'=>$coordinator_payment,
													'parent_id'=>0,
													'payment_status'=>0,
													'payment_id'=>0,
													'status'=>1,
													'createdby'=>$this->session->userdata('id'),
													'createdon'=>date_timestamp_get(date_create()),
												
													);
							$coordinator = $this->Web_model->insert_data('tbl_member_payment', $coordinator);						
							}
						elseif($getuser['group_id'] == '5'){
								$totalcommission = round(((float)$param['merchant_amount'] * 20 /100), 2);
								if($totalcommission > $getuser['commission']){
									
									$coordinator_payment = $totalcommission - (float)$getuser['commission'];
									$executive_payment = (float)$getuser['commission'];
									
								}
								elseif($totalcommission <= $getuser['commission']){
									$coordinator_payment = 0;
									$executive_payment = $totalcommission;
								}
								$coordinator = array(
													'user_id'=>$getuser['parent_id'],
													'group_id'=>4,
													'student_id'=>$this->session->userdata('id'),
													'exam_id'=>$exam_id,
													'exam_fee'=>$param['merchant_amount'],
													'total_commssion'=>$totalcommission,
													'current_commssion'=>$totalcommission,
													'deducate_commssion'=>$executive_payment,
													'commssion'=>$coordinator_payment,
													'parent_id'=>$getuser['id'],
													'payment_status'=>0,
													'payment_id'=>0,
													'status'=>1,
													'createdby'=>$this->session->userdata('id'),
													'createdon'=>date_timestamp_get(date_create()),
													);
								$executive = array(
													'user_id'=>$getuser['id'],
													'group_id'=>5,
													'student_id'=>$this->session->userdata('id'),
													'exam_id'=>$exam_id,
													'exam_fee'=>$param['merchant_amount'],
													'total_commssion'=>$totalcommission,
													'current_commssion'=>(float)$getuser['commission'],
													'deducate_commssion'=>0,
													'commssion'=>$executive_payment,
													'parent_id'=>$getuser['parent_id'],
													'payment_status'=>0,
													'payment_id'=>0,
													'status'=>1,
													'createdby'=>$this->session->userdata('id'),
													'createdon'=>date_timestamp_get(date_create()),
													);
								$coordinator = $this->Web_model->insert_data('tbl_member_payment', $coordinator);
								$executive = $this->Web_model->insert_data('tbl_member_payment', $executive);
								///var_dump($totalcommission);
								
								
							}
					}	
						$this->success($insert);
						}
					}
				}
			}
			else{
				$this->success($checkdata['id']);
			}
		    
		}
		else{
				$this->failed();
		}
    } 
	
	public function callback() { 
	//var_dump($this->session->userdata());
	///var_dump($_POST);  
        if (!empty($this->input->post('razorpay_payment_id')) && !empty($this->input->post('merchant_order_id'))) {
          	$param['student_id'] = $this->session->userdata('id');
			$param['exam_id'] = $this->session->userdata('exam_id');
		  	foreach($_POST as $key=>$value){
				if($key!='merchant_surl_id' && $key!='merchant_furl_id'){
				$param[$key] = $value;
				}
			}
			//var_dump($param); exit;
			$checkdata = $this->Web_model->get_data('tbl_razorpay_payment', array('razorpay_payment_id'=>$param['razorpay_payment_id']));
			
			if($checkdata['id']==''){
				$insert = $this->Web_model->insert_data('tbl_razorpay_payment', $param);
				if($insert){
					$update_where = array(
						'student_id' => $this->session->userdata('id'),
						'exam_id' => $this->session->userdata('exam_id'),
					);
					$examdata = $this->Web_model->get_data('tbl_student_exam', $update_where);
					$getstudent = $this->Web_model->get_data('tbl_student', $this->session->userdata('id'));
					$getuser = $this->Web_model->get_data('tbl_users', array('id'=>$getstudent['parent_id']));
					
					if($examdata['id']){
					$update_payment = array(
						'exam_fee' => $param['merchant_amount'],
						'payment_status' => 1,
						'payment_on' => date_timestamp_get(date_create()),
						'exam_status' => 1,
					);
					
					$updatepaymentt = $this->Web_model->update_data_where('tbl_student_exam', $update_where, $update_payment);
						if($updatepaymentt){
						if($getstudent['parent_id'] !='0'){
						
						if($getuser['group_id'] == '4'){
								$coordinator_payment = round(((float)$examdata['exam_fee'] * 20 /100), 2);
								$coordinator = array(
													'user_id'=>$getuser['id'],
													'group_id'=>4,
													'student_id'=>$this->session->userdata('id'),
													'exam_id'=>$examdata['id'],
													'exam_fee'=>$examdata['exam_fee'],
													'total_commssion'=>$coordinator_payment,
													'current_commssion'=>$coordinator_payment,
													'deducate_commssion'=>0,
													'commssion'=>$coordinator_payment,
													'parent_id'=>0,
													'payment_status'=>0,
													'payment_id'=>0,
													'status'=>1,
													'createdby'=>$this->session->userdata('id'),
													'createdon'=>date_timestamp_get(date_create()),
												
													);
							$coordinator = $this->Web_model->insert_data('tbl_member_payment', $coordinator);						
							}
						elseif($getuser['group_id'] == '5'){
								$totalcommission = round(((float)$examdata['exam_fee'] * 20 /100), 2);
								if($totalcommission > $getuser['commission']){
									
									$coordinator_payment = $totalcommission - (float)$getuser['commission'];
									$executive_payment = (float)$getuser['commission'];
									
								}
								elseif($totalcommission <= $getuser['commission']){
									$coordinator_payment = 0;
									$executive_payment = $totalcommission;
								}
								$coordinator = array(
													'user_id'=>$getuser['parent_id'],
													'group_id'=>4,
													'student_id'=>$this->session->userdata('id'),
													'exam_id'=>$examdata['id'],
													'exam_fee'=>$examdata['exam_fee'],
													'total_commssion'=>$totalcommission,
													'current_commssion'=>$totalcommission,
													'deducate_commssion'=>$executive_payment,
													'commssion'=>$coordinator_payment,
													'parent_id'=>$getuser['id'],
													'payment_status'=>0,
													'payment_id'=>0,
													'status'=>1,
													'createdby'=>$this->session->userdata('id'),
													'createdon'=>date_timestamp_get(date_create()),
													);
								$executive = array(
													'user_id'=>$getuser['id'],
													'group_id'=>5,
													'student_id'=>$this->session->userdata('id'),
													'exam_id'=>$examdata['id'],
													'exam_fee'=>$examdata['exam_fee'],
													'total_commssion'=>$totalcommission,
													'current_commssion'=>(float)$getuser['commission'],
													'deducate_commssion'=>0,
													'commssion'=>$executive_payment,
													'parent_id'=>$getuser['parent_id'],
													'payment_status'=>0,
													'payment_id'=>0,
													'status'=>1,
													'createdby'=>$this->session->userdata('id'),
													'createdon'=>date_timestamp_get(date_create()),
													);
								$coordinator = $this->Web_model->insert_data('tbl_member_payment', $coordinator);
								$executive = $this->Web_model->insert_data('tbl_member_payment', $executive);
								///var_dump($totalcommission);
								
								
							}
					}	
						$this->success($insert);
						}
					}
					else{
						$param1 = array(
						'student_id' => $this->session->userdata('id'),
						'exam_id' => $this->session->userdata('exam_id'),
						'exam_fee' => $param['merchant_amount'],
						'payment_status' => 1,
						'payment_on' => date_timestamp_get(date_create()),
						'exam_status' => 1,
					);
						
						
						
						$insertexam = $this->Web_model->insert_data('tbl_student_exam', $param1);
						if($insertexam){
							if($getstudent['parent_id'] !='0'){
						
						if($getuser['group_id'] == '4'){
								$coordinator_payment = round(((float)$param['merchant_amount'] * 20 /100), 2);
								$coordinator = array(
													'user_id'=>$getuser['id'],
													'group_id'=>4,
													'student_id'=>$this->session->userdata('id'),
													'exam_id'=>$this->session->userdata('exam_id'),
													'exam_fee'=>$param['merchant_amount'],
													'total_commssion'=>$coordinator_payment,
													'current_commssion'=>$coordinator_payment,
													'deducate_commssion'=>0,
													'commssion'=>$coordinator_payment,
													'parent_id'=>0,
													'payment_status'=>0,
													'payment_id'=>0,
													'status'=>1,
													'createdby'=>$this->session->userdata('id'),
													'createdon'=>date_timestamp_get(date_create()),
												
													);
							$coordinator = $this->Web_model->insert_data('tbl_member_payment', $coordinator);						
							}
						elseif($getuser['group_id'] == '5'){
								$totalcommission = round(((float)$param['merchant_amount'] * 20 /100), 2);
								if($totalcommission > $getuser['commission']){
									
									$coordinator_payment = $totalcommission - (float)$getuser['commission'];
									$executive_payment = (float)$getuser['commission'];
									
								}
								elseif($totalcommission <= $getuser['commission']){
									$coordinator_payment = 0;
									$executive_payment = $totalcommission;
								}
								$coordinator = array(
													'user_id'=>$getuser['parent_id'],
													'group_id'=>4,
													'student_id'=>$this->session->userdata('id'),
													'exam_id'=>$this->session->userdata('exam_id'),
													'exam_fee'=>$param['merchant_amount'],
													'total_commssion'=>$totalcommission,
													'current_commssion'=>$totalcommission,
													'deducate_commssion'=>$executive_payment,
													'commssion'=>$coordinator_payment,
													'parent_id'=>$getuser['id'],
													'payment_status'=>0,
													'payment_id'=>0,
													'status'=>1,
													'createdby'=>$this->session->userdata('id'),
													'createdon'=>date_timestamp_get(date_create()),
													);
								$executive = array(
													'user_id'=>$getuser['id'],
													'group_id'=>5,
													'student_id'=>$this->session->userdata('id'),
													'exam_id'=>$this->session->userdata('exam_id'),
													'exam_fee'=>$param['merchant_amount'],
													'total_commssion'=>$totalcommission,
													'current_commssion'=>(float)$getuser['commission'],
													'deducate_commssion'=>0,
													'commssion'=>$executive_payment,
													'parent_id'=>$getuser['parent_id'],
													'payment_status'=>0,
													'payment_id'=>0,
													'status'=>1,
													'createdby'=>$this->session->userdata('id'),
													'createdon'=>date_timestamp_get(date_create()),
													);
								$coordinator = $this->Web_model->insert_data('tbl_member_payment', $coordinator);
								$executive = $this->Web_model->insert_data('tbl_member_payment', $executive);
								///var_dump($totalcommission);
								
								
							}
					}	
						$this->success($insert);
						}
					}
				}
			}
			else{
				$this->success($checkdata['id']);
			}
		    
		}
		else{
				$this->failed();
		}
    } 
    public function success($insert) {
        $data['title'] = 'Razorpay Success | Sseries'; 
		$data['paymentdata'] = $this->Web_model->get_data('tbl_razorpay_payment', array('id'=>$insert));
		$data['student'] = $this->Web_model->get_data('tbl_student', array('id'=>$data['paymentdata']['student_id']));
		$data['exam'] = $this->Web_model->get_data('tbl_exam', array('id'=>$data['paymentdata']['exam_id']));
		//var_dump($data); exit;
		$msg = 'Thanks for register in '.$data['exam']['exam_name'].' test series with us. Your payment transaction ID is '.$data['paymentdata']['razorpay_payment_id'].' for INR '.$data['paymentdata']['merchant_amount'].'. Regards SSeries Team';
		$this->SendSMS($data['student']['mobile_number'], $msg);
        $this->render_template('razorpay/success', $data);
    }  
    public function failed() {
        $data['title'] = 'Razorpay Failed | Sseries';
		//var_dump($_POST); exit;            
        $this->render_template('razorpay/failed', $data);
    } 
}
?>