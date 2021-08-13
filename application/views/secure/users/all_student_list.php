<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><a href="javascript:window.history.back();"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">
                            <a href="<?=base_url('dashboard');?>">Dashboard</a></span> - 
                            <a href="#">Student List</a></h4>
						</div>

						
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="<?=base_url('dashboard');?>"><i class="icon-home2 position-left"></i> Home</a></li>
							<li class="active"><a href="#">Student List</a></li>
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
										<h5 class="panel-title">Student List</h5>
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
<table class="table datatable-basic">
<thead>
    <tr>
		<th>Name</th>
		<th>Email</th>
		<th>Mobile</th>
        <th>Mobile Verify</th>
        <th>Email Verify</th>
        <th>Register On</th>
        <th>Status</th>
		
    </tr>
    </thead>
    <tbody>
	<?php foreach($studentList as $t){ ?>
    <tr>
		<td><?php echo $t['name']; ?></td>
		<td><?php echo $t['email']; ?></td>
        <td><?php echo $t['mobile_number']; ?></td>
        <td><?php if($t['is_mobile_varify']=='1'){echo '<span class="text-success">Yes</span>';}else{echo '<span class="text-danger">No</span>';}?></td>
        <td><?php if($t['is_email_varify']=='1'){echo '<span class="text-success">Yes</span>';}else{echo '<span class="text-danger">No</span>';}?></td>
        <td><?php echo gmdate("d-m-Y", $t['reg_date']);?></td>
		<td><?php if($t['status']=='1'){echo '<span class="text-success">Active</span>';}else{echo '<span class="text-danger">Inactive</span>';}?></td>
		
		
    </tr>
	<?php } ?>
    </tbody>
</table>
</div></div></div></div>