<div class="row">
    <div class="col-lg-12">
        <center><h2>Exam Fee</h2></center>                 
    </div>
</div><!-- /.row -->

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

    <div class="row"> 
    	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">  
                              
           
        </div>  
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <table class="table" style="color:#0E9008;">
        <tr>
        	<th>Payment Status: </th>
            <td>Success</td>
        </tr>
        <tr>
        	<th>Payment Id: </th>
            <td><?php echo $paymentdata['razorpay_payment_id'];?></td>
        </tr>
        <tr>
        	<th>Trans. Id: </th>
            <td><?php echo $paymentdata['merchant_trans_id'];?></td>
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
           <td><?php echo $paymentdata['merchant_amount'];?></td>
        </tr>
        <tr>
        	<th>Exam Name: </th>
           <td><?php echo $paymentdata['merchant_product_info_id'];?></td>
        </tr>
        <tr>
        	
           <td colspan="2" style="text-align:right;"><a href="<?=base_url('secure/dashboard');?>" class="btn btn-success">GO TO DASHBOARD</a></td>
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