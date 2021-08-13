<div class="row">
    <div class="col-lg-12">
        <center><h2>Exam Fee</h2></center>                 
    </div>
</div><!-- /.row -->
<?php
$productinfo = $examDetail['exam_name'];
$txnid = time();
$surl = $surl;
$furl = $furl;        
$key_id = RAZOR_KEY_ID;
$currency_code = $currency_code;            
$total = ($examDetail['exam_fee'] * 100); 
$amount = $examDetail['exam_fee'];
$merchant_order_id = $examDetail['id'].'-'.time();
$card_holder_name = $student['name'];
$email = $student['email'];
$phone = $student['mobile_number'];
$name = $student['name'];
$return_url = site_url().'razorpay/callbackforexam/'.$examDetail['id'];
?>
<div class="row">
    <div class="col-lg-12">
        <?php if(!empty($this->session->flashdata('msg'))){ ?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('msg'); ?>
            </div>        
        <?php } ?>
        <?php if(validation_errors()) { ?>
          <div class="alert alert-danger">
            <?php echo validation_errors(); ?>	
          </div>
        <?php } ?>
    </div>
</div>
 <form name="razorpay-form" id="razorpay-form" action="<?php echo $return_url; ?>" method="POST">
  <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id"/>
  <input type="hidden" name="merchant_order_id" id="merchant_order_id" value="<?php echo $merchant_order_id; ?>"/>
  <input type="hidden" name="merchant_trans_id" id="merchant_trans_id" value="<?php echo $txnid; ?>"/>
  <input type="hidden" name="merchant_product_info_id" id="merchant_product_info_id" value="<?php echo $productinfo; ?>"/>
  <input type="hidden" name="merchant_surl_id" id="merchant_surl_id" value="<?php echo $surl; ?>"/>
  <input type="hidden" name="merchant_furl_id" id="merchant_furl_id" value="<?php echo $furl; ?>"/>
  <input type="hidden" name="card_holder_name_id" id="card_holder_name_id" value="<?php echo $card_holder_name; ?>"/>
  <input type="hidden" name="merchant_total" id="merchant_total" value="<?php echo $total; ?>"/>
  <input type="hidden" name="merchant_amount" id="merchant_amount" value="<?php echo $amount; ?>"/>
</form>
    <div class="row"> 
    	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">  
                              
           
        </div>  
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <table class="table">
        <tr>
        	<th>Exam: </th>
            <td><?php echo $examDetail['exam_name'];?></td>
        </tr>
        <tr>
        	<th>Name: </th>
           <td><?php echo $student['name'];?></td>
        </tr>
        <tr>
        	<th>Mobile: </th>
            <td><?php echo $student['mobile_number'];?></td>
        </tr>
        <tr>
        	<th>Email: </th>
            <td><?php echo $student['email'];?></td>
        </tr>
        <tr>
        	<th>Exam Fee: </th>
           <td><?php echo $examDetail['exam_fee'];?></td>
        </tr>
        <tr>
        	<?php /*?><td style="text-align:left;"><a href="<?php echo base_url('secure/exam/demo');?>" class="btn btn-primary">Skip payment go for demo</a></td><?php */?>
           <td style="text-align:right;"><input  id="submit-pay" type="submit" onclick="razorpaySubmit(this);" value="Pay Now" class="btn btn-primary" /></td>
        </tr>
        </table>                      
           
        </div>
        
    </div>
 
   
 
 

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
  var razorpay_options = {
    key: "<?php echo $key_id; ?>",
    amount: "<?php echo $total; ?>",
    name: "<?php echo $name; ?>",
    description: "Order # <?php echo $merchant_order_id; ?>",
    netbanking: true,
    currency: "<?php echo $currency_code; ?>",
    prefill: {
      name:"<?php echo $card_holder_name; ?>",
      email: "<?php echo $email; ?>",
      contact: "<?php echo $phone; ?>"
    },
    notes: {
      soolegal_order_id: "<?php echo $merchant_order_id; ?>",
    },
    handler: function (transaction) {
        document.getElementById('razorpay_payment_id').value = transaction.razorpay_payment_id;
        document.getElementById('razorpay-form').submit();
    },
    "modal": {
        "ondismiss": function(){
            location.reload()
        }
    }
  };
  var razorpay_submit_btn, razorpay_instance;
 
  function razorpaySubmit(el){
    if(typeof Razorpay == 'undefined'){
      setTimeout(razorpaySubmit, 200);
      if(!razorpay_submit_btn && el){
        razorpay_submit_btn = el;
        el.disabled = true;
        el.value = 'Please wait...';  
      }
    } else {
      if(!razorpay_instance){
        razorpay_instance = new Razorpay(razorpay_options);
        if(razorpay_submit_btn){
          razorpay_submit_btn.disabled = false;
          razorpay_submit_btn.value = "Pay Now";
        }
      }
      razorpay_instance.open();
    }
  }  
</script>