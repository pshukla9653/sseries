<style>
.clearfix {
	margin:10px;	
}

</style>
<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><a href="javascript:window.history.back();"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">
                            <a href="<?=base_url('dashboard');?>">Dashboard</a></span> - 
                            <a href="#">Generate Payment</a></h4>
						</div>

						
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="<?=base_url('dashboard');?>"><i class="icon-home2 position-left"></i> Home</a></li>
							<li class="active"><a href="#">Generate Payment</a></li>
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
										<h5 class="panel-title">Payment List</h5>
										<div class="heading-elements">
											<ul class="icons-list">
						                		<li><a data-action="collapse"></a></li>
						                		<li><a data-action="reload"></a></li>
						                		<li><a data-action="close"></a></li>
						                	</ul>
					                	</div>
									</div>

<div class="panel-body">
<div class="pull-right">

</div>
<?php echo $this->session->flashdata('msg'); ?>
<?php echo form_open_multipart('secure/users/makePayment', array('class'=>'form-horizontal')); ?>
<input type="hidden" name="user_id" value="<?=$paymentList[0]['user_id'];?>"/>
<table class="table datatable-basic">
<thead>
    <tr>
    	<th style="width:10%;"><input type="checkbox" value="<?=$t['id'];?>" id="select_all"/>All</th>
		<th>Student Name</th>
		<th>Exam Name</th>
		<th>Exam Fee</th>
        <th>Total Commssion</th>
        <th>Default Commssion</th>
        <th>Deduction from Commssion</th>
        <th>Payable Commssion</th>
		
    </tr>
    </thead>
    <tbody>
    
	<?php foreach($paymentList as $t){ ?>
    
    <tr>
    <td><input type="checkbox" name="payment_id[]" value="<?=$t['id'];?>" id="row<?=$t['id'];?>" class="checkbox"/>
    <input type="hidden" name="examdetail[<?=$t['id'];?>]" value="<?=$t['student_id'];?>-<?=$t['exam_id'];?>"/>
    </td>
		<td><?php $student = $this->Users_model->get_data('tbl_student', array('id'=>$t['student_id'])); echo $student['name']; ?></td>
        <td><?php $exam = $this->Users_model->get_data('tbl_exam', array('id'=>$t['exam_id'])); echo $exam['exam_name']; ?></td>
        <td><?php echo $t['exam_fee']; ?></td>
        <td><?php echo $t['total_commssion']; ?></td>
        <td><?php echo $t['current_commssion']; ?></td>
        <td><?php echo $t['deducate_commssion']; ?></td>
        <td id="amount<?=$t['id'];?>"><?php echo $t['commssion']; ?></td>
        
		
		
    </tr>
	<?php } ?>
    </tbody>
</table>
<div class="col-md-4">
<div class="col-md-6"><strong>SUB TOTAL</strong></div>
<div class="col-md-6"><input type="text" class="form-control" name="sub_total" id="sub_total" value="0" readonly/></div>
</div>
<div class="clearfix"></div>
<div class="col-md-4">
<div class="col-md-6"><input type="text" class="form-control" name="bonus_head" value="Bonus"/></div>
<div class="col-md-6"><input type="text" class="form-control" name="bonus_value" id="bonus_value" value="0"/></div>
</div>
<div class="clearfix"></div>
<div class="col-md-4">
<div class="col-md-6"><input type="text" class="form-control" name="fine_head" value="Fine"/></div>
<div class="col-md-6"><input type="text" class="form-control" name="fine_value" id="fine_value" value="0"/></div>
</div>
<div class="clearfix"></div>
<div class="col-md-4">
<div class="col-md-6"><strong>TOTAL</strong></div>
<div class="col-md-6"><input type="text" class="form-control" name="total" id="total" value="0" readonly/></div>
</div>
<div class="clearfix"></div>
<div class="col-md-4">
<div class="col-md-6"><strong>TDS (5%)</strong></div>
<div class="col-md-6"><input type="text" class="form-control" name="tds" id="tds" value="0" readonly/></div>
</div>
<div class="clearfix"></div>
<div class="col-md-4">
<div class="col-md-6"><strong>GRAND TOTAL</strong></div>
<div class="col-md-6"><input type="text" class="form-control" name="grand_total" id="grand_total" value="0" readonly/></div>
</div>
<div class="clearfix"></div>
<div class="col-md-4">
<div class="col-md-6"><input type="submit" value="Generate Payment" class="btn btn-success"/></div>
</div>
</div></div></div></div>
<?php echo form_close(); ?>
<script type="text/javascript">
$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
				console.log(this.value);
				var paymentid = this.value;
				var amount = $('#amount'+paymentid).html();
				var sub_total = $('#sub_total').val();
				var bonus_value = $('#bonus_value').val();
				var fine_value = $('#fine_value').val();
				sub_total = parseFloat(sub_total) + parseFloat(amount);
				
				var total = sub_total + (parseFloat(bonus_value) - parseFloat(fine_value));
				var tds = parseFloat(total * 5 /100);
				var grand_total = total - tds;
				console.log(amount);
				$('#sub_total').val(sub_total.toFixed(2));
				$('#total').val(total.toFixed(2));
				$('#tds').val(tds.toFixed(2));
				$('#grand_total').val(grand_total.toFixed(2));
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
				var paymentid = this.value;
				var amount = $('#amount'+paymentid).html();
				var sub_total = $('#sub_total').val();
				var bonus_value = $('#bonus_value').val();
				var fine_value = $('#fine_value').val();
				sub_total = parseFloat(sub_total) - parseFloat(amount);
				
				var total = sub_total + (parseFloat(bonus_value) - parseFloat(fine_value));
				var tds = parseFloat(total * 5 /100);
				var grand_total = total - tds;
				console.log(amount);
				$('#sub_total').val(sub_total.toFixed(2));
				$('#total').val(total.toFixed(2));
				$('#tds').val(tds.toFixed(2));
				$('#grand_total').val(grand_total.toFixed(2));
            });
        }
    });
    
    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
		if(this.checked){
		
				var paymentid = this.value;
				var amount = $('#amount'+paymentid).html();
				var sub_total = $('#sub_total').val();
				var bonus_value = $('#bonus_value').val();
				var fine_value = $('#fine_value').val();
				sub_total = parseFloat(sub_total) + parseFloat(amount);
				
				var total = sub_total + (parseFloat(bonus_value) - parseFloat(fine_value));
				var tds = parseFloat(total * 5 /100);
				var grand_total = total - tds;
				
				$('#sub_total').val(sub_total.toFixed(2));
				$('#total').val(total.toFixed(2));
				$('#tds').val(tds.toFixed(2));
				$('#grand_total').val(grand_total.toFixed(2));
		}
		else{
			
				var paymentid = this.value;
				var amount = $('#amount'+paymentid).html();
				var sub_total = $('#sub_total').val();
				var bonus_value = $('#bonus_value').val();
				var fine_value = $('#fine_value').val();
				sub_total = parseFloat(sub_total) - parseFloat(amount);
				console.log(amount);
				var total = sub_total + (parseFloat(bonus_value) - parseFloat(fine_value));
				var tds = parseFloat(total * 5 /100);
				var grand_total = total - tds;
				console.log(amount);
				$('#sub_total').val(sub_total.toFixed(2));
				$('#total').val(total.toFixed(2));
				$('#tds').val(tds.toFixed(2));
				$('#grand_total').val(grand_total.toFixed(2));
		}
    });
	$('#bonus_value').on('change', function(){
		var bonus_value = $('#bonus_value').val();
		var fine_value = $('#fine_value').val();
		var sub_total = $('#sub_total').val();
		sub_total = (parseFloat(sub_total) + parseFloat(bonus_value)) - parseFloat(fine_value);
				////console.log(amount);
				var total = sub_total;
				var tds = parseFloat(sub_total * 5 /100);
				var grand_total = total - tds;
				///console.log(amount);
				//$('#sub_total').val(sub_total.toFixed(2));
				$('#total').val(total.toFixed(2));
				$('#tds').val(tds.toFixed(2));
				$('#grand_total').val(grand_total.toFixed(2));
		
	});
	$('#fine_value').on('change', function(){
		var bonus_value = $('#bonus_value').val();
		var fine_value = $('#fine_value').val();
		var sub_total = $('#sub_total').val();
		sub_total = (parseFloat(sub_total) + parseFloat(bonus_value)) - parseFloat(fine_value);
				//console.log(amount);
				var total = sub_total;
				var tds = parseFloat(sub_total * 5 /100);
				var grand_total = total - tds;
				///console.log(amount);
				//$('#sub_total').val(sub_total.toFixed(2));
				$('#total').val(total.toFixed(2));
				$('#tds').val(tds.toFixed(2));
				$('#grand_total').val(grand_total.toFixed(2));
		
	});
});
</script>