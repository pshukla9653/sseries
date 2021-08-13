
<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><a href="javascript:window.history.back();"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">
                            <a href="<?=base_url('dashboard');?>">Dashboard</a></span> - 
                            <a href="<?=base_url($this->uri->segment(2));?>"><?=ucfirst($this->uri->segment(2));?></a></h4>
						</div>

						
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="<?=base_url('dashboard');?>"><i class="icon-home2 position-left"></i> Home</a></li>
							<li class="active"><a href="<?=base_url($this->uri->segment(2));?>"><?=ucfirst($this->uri->segment(2));?></a></li>
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
									
                                    <div class="col-md-8">
										<fieldset>
						                	<legend class="text-semibold"> <?=ucfirst($this->uri->segment(2));?> List</legend>
											<table class="table datatable-basic">
                      <thead>
                      <th>Exam Name</th>
                       <th>Exam Fee</th>
                    <th>Enroll Status</th>
                      <th>Payment Status</th>
                    
                      </thead>
                                        <tbody>
                                    <?php foreach($ExamList as $item) {
										$getexamdata = $this->Exam_model->get_data('tbl_student_exam', array('exam_id'=>$item['id'],'student_id'=>$this->session->userdata('id')));
										 ?>
									
									
									
                                    <tr style="text-align:center;">
                                        <td><?php echo $item['exam_name']; ?></td>
                                        <td><?php echo $item['exam_fee']; ?></td>
                                        <td>
                                       <?php if($getexamdata['id']){?>
										   <span class="text-success"><strong>Enrolled</strong></span>
									   <?php }else{?>
										   <span class="text-danger"><strong>Not Enrolled</strong></span>
									   <?php }?>
                                        </td>
                                        <td><?php if($getexamdata['payment_status']){?>
										   <span class="text-success"><strong>Done</strong></span>
									   <?php }elseif($getexamdata['id']){?>
										   <a href="<?=base_url('Razorpay/examPayment/'.$item['id']);?>">Pay Now</a> 
									   <?php }else{?>
                                       <a href="<?=base_url('Razorpay/examPayment/'.$item['id']);?>">Enroll Now</a>
                                       <?php }?>
                                       </td>
                                       
                                    </tr>
                                    <?php } ?>
                                </tbody>
                    </table>
										</fieldset>
									</div>
								</div>

								
							</div>
						</div>

</div>

</div>
<script type="text/javascript"> 
		
		
		function editExpenses(getId){
				$.ajax({
							type:'POST',
							url:'<?php echo base_url('secure/exam/getmodeDetail');?>',
							data:'getId='+getId,
							dataType:'json',
							success:function(response){
								x = response.founddata.sub_ids;
								cvalue = x.split(",");
								//console.log(cvalue);
								$('#exam_name').val(response.founddata.exam_name);
								$('#exam_fee').val(response.founddata.exam_fee);
								$('#exam_id').val(response.founddata.id);
								$('#bt').val('Update');
								$('input[name="sub_ids[]"]').val(cvalue);
								$("#status option").each(function(){
									 if($(this).val() === response.founddata.status){
										$(this).prop('selected', true);
									 }	 
								});
							}
					}); 
		}
		
		
</script>