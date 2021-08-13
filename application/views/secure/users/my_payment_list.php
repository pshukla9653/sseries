<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><a href="javascript:window.history.back();"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">
                            <a href="<?=base_url('dashboard');?>">Dashboard</a></span> - 
                            <a href="#"><?=ucfirst($this->uri->segment(2));?></a></h4>
						</div>

						
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="<?=base_url('dashboard');?>"><i class="icon-home2 position-left"></i> Home</a></li>
							<li class="active"><a href="#">Payment List</a></li>
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
<?php if(in_array('users-addstudent', $this->GroupPermission)){?>
	<a href="<?php echo site_url('secure/users/addstudent'); ?>" class="btn btn-success">Add</a>
    <?php }?> 
</div>
<?php echo $this->session->flashdata('msg'); ?>
<table class="table datatable-basic">
<thead>
    <tr>
		<th>Student Name</th>
		<th>Exam</th>
		<th>Mobile1</th>
        <th>Payment</th>
        <th>Status</th>
		
    </tr>
    </thead>
    <tbody>
	<?php foreach($PaymentList as $t){ ?>
    <tr>
		<td><?php $student = $this->Users_model->get_data('tbl_student', array('id'=>$t['student_id'])); echo $student['name']; ?></td>
		<td><?php $exam = $this->Users_model->get_data('tbl_exam', array('id'=>$t['exam_id'])); echo $exam['exam_name']; ?></td>
        <td><?php echo $t['total_commssion']; ?></td>
        <td><?php echo $t['commssion']; ?></td>
        
		<td><?php if($t['payment_status']=='1'){echo '<span class="text-success">Paid</span>';}else{echo '<span class="text-danger">Not Paid</span>';}?></td>
		
		
    </tr>
	<?php } ?>
    </tbody>
</table>
</div></div></div></div>