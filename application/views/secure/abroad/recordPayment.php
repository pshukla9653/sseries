<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><a href="javascript:window.history.back();"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">
                            <a href="<?=base_url('dashboard');?>">Dashboard</a></span> - 
                            <a href="#">Payment for <?=$paymentdata['student_name'];?> (<?=$paymentdata['pp_no'];?>) - For Country : <?=$abroad_country['country_name'];?></a></h4>
						</div>

						
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="<?=base_url('dashboard');?>"><i class="icon-home2 position-left"></i> Home</a></li>
							<li class="active"><a href="#">Record Payment</a></li>
						</ul>

						
					</div>
				</div>
				<!-- /page header -->
<!-- Content area -->
				<div class="content">
                

					<!-- Horizontal form options -->
					<div class="row">
<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title"></h5>
								<div class="heading-elements">
									<ul class="icons-list">
				                		<li><a data-action="collapse"></a></li>
				                		<li><a data-action="reload"></a></li>
				                		<li><a data-action="close"></a></li>
				                	</ul>
			                	</div>
							</div>

							<div class="panel-body">
								<div class="row">
                                <?php if($paymentdata['payment_status'] == '2'){?>
                                <div class="col-md-12">
										<fieldset>
						                	<legend class="text-semibold"> Payment List</legend>
											<table class="table datatable-basic">
                      <thead>
                      <th>SN.</th>
                      <th>Reference no.</th>
                      <th>Passport no.</th>
                      <th>Fee Paid</th>
                      <th>Fee Due</th>
                      <th>Payment Date</th>
                      <th>Payment Mode</th>
                      <th>Transcation Id</th>
                      <th>Note</th>
                      <th>Action</th>
                      </thead>
                                        <tbody>
                                    <?php $r=1; foreach($record_llist as $item) { ?>
                                    <tr>
                                    	<td><?php echo $r; ?></td>
                                        <td><?php echo $item['referance_no']; ?></td>
                                        <td><?php echo $paymentdata['pp_no']; ?></td>
                                        <td><?php echo $item['amount_received']; ?></td>
                                         <td><?php echo $item['due_fee']; ?></td>
                                        
                                         <td><?php echo date_format(date_create($item['payment_date']),"d-m-Y"); ?></td>
                                         <td><?php echo $item['payment_mode']; ?></td>
                                          <td><?php echo $item['tran_id']; ?></td>
                                          <td><?php echo $item['note']; ?></td>
                                        
                                       
                                        <td>
                                        <a  class="text-info" href="<?=base_url('secure/abroad/showpaymentrecipt/'.$item['id']);?>" >Show</a>
        </td>
                                    </tr>
                                    <?php $r++; } ?>
                                </tbody>
                    </table>
										</fieldset>
									</div>
                                <?php }else{?>
									<div class="col-md-4">
										<fieldset>
											<legend class="text-semibold"> Payment for <strong><?=$paymentdata['student_name'];?> (<?=$paymentdata['pp_no'];?>)- For Country : <?=$abroad_country['country_name'];?></strong></legend>
                            <?php echo form_open_multipart('secure/abroad/recordPayment/'.$paymentdata['id'], array('class'=>'form-horizontal')); ?>
                               <?php echo $this->session->flashdata('msg'); ?>            
                                       
								<div class="form-group">
                                <label class="col-lg-3 control-label">Amount Received</label>
								<div class="col-lg-9">
<input type="text" class="form-control" name="amount_received" id="amount_received" placeholder="Amount Received" value="<?php echo $paymentdata['due_fee'];?>"/>
                                <input type="hidden" id="due_fee" class="form-control" name="due_fee" value="<?php echo $paymentdata['due_fee'];?>"/>
                                <span class="text-danger"><?php echo form_error('amount_received'); ?></span>
								</div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Payment Date</label>
								<div class="col-lg-9">
                                <input type="date" class="form-control" name="payment_date" value="<?php echo date("Y-m-d"); ?>">
                               
                                <span class="text-danger"><?php echo form_error('payment_date'); ?></span>
								</div>
                            </div>
                             <div class="form-group">
                                <label class="col-lg-3 control-label">Payment Mode</label>
								<div class="col-lg-9">
                                <select class="form-control" name="payment_mode">
                                                    <option value="1">Bank Transfer</option>
                                                    <option value="2">Cheque</option>
                                                    <option value="3">Demand Draft</option>
                                                    </select>
                               
                                <span class="text-danger"><?php echo form_error('payment_mode'); ?></span>
								</div>
                            </div>
                            
                             <div class="form-group">
                                <label class="col-lg-3 control-label">Transcation Id</label>
								<div class="col-lg-9">
                                <input type="text" class="form-control" name="tran_id" value="<?php echo set_value('tran_id'); ?>">
                               
                                <span class="text-danger"><?php echo form_error('tran_id'); ?></span>
								</div>
                            </div>
                            
                             <div class="form-group">
                                <label class="col-lg-3 control-label">Note</label>
								<div class="col-lg-9">
                                
                                <textarea class="form-control" name="note"></textarea>
                               
                                <span class="text-danger"><?php echo form_error('note'); ?></span>
								</div>
                            </div>
                            
                            <div class="text-right">
									<input type="submit" class="btn btn-primary" name="btn" value="Submit" id="bt">
								</div>
                                <?php echo form_close(); ?>
                            
                           
										</fieldset>
									</div>
                                    <div class="col-md-8">
										<fieldset>
						                	<legend class="text-semibold"> Payment List</legend>
											<table class="table datatable-basic">
                      <thead>
                      <th>SN.</th>
                      <th>Reference no.</th>
                      <th>Fee Paid</th>
                      <th>Fee Due</th>
                      <th>Payment Date</th>
                      <th>Payment Mode</th>
                      <th>Transcation Id</th>
                      <th>Note</th>
                      <th>Action</th>
                      </thead>
                                        <tbody>
                                    <?php $r=1; foreach($record_llist as $item) { ?>
                                    <tr>
                                    	<td><?php echo $r; ?></td>
                                        <td><?php echo $item['referance_no']; ?></td>
                                        <td><?php echo $item['amount_received']; ?></td>
                                         <td><?php echo $item['due_fee']; ?></td>
                                        
                                         <td><?php echo date_format(date_create($item['payment_date']),"d-m-Y"); ?></td>
                                         <td><?php echo $item['payment_mode']; ?></td>
                                          <td><?php echo $item['tran_id']; ?></td>
                                          <td><?php echo $item['note']; ?></td>
                                        
                                       
                                        <td>
                                       <a  class="text-info" href="<?=base_url('secure/abroad/showpaymentrecipt/'.$item['id']);?>" >Show</a>
        </td>
                                    </tr>
                                    <?php $r++; } ?>
                                </tbody>
                    </table>
										</fieldset>
									</div>
                                    <?php }?>
								</div>

								
							</div>
						</div>

</div>

</div>
<script type="text/javascript"> 
$(document).ready(function() {
    $('#amount_received').on('change',function(){
        var amount_received = parseInt($(this).val());
		var due_fee = parseInt($('#due_fee').val());
		console.log(amount_received);
		console.log(due_fee);
        if(amount_received > due_fee || amount_received == 0){
            $('#bt').prop('disabled', true);
        }else{
            $('#bt').prop('disabled', false);
        }
    });		
		
	 });	
		
		
		
</script>