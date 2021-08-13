<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><a href="javascript:window.history.back();"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">
                            <a href="<?=base_url('dashboard');?>">Dashboard</a></span> - 
                            <a href="#">Payment List</a></h4>
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

<?php echo $this->session->flashdata('msg'); ?>
<table class="table datatable-basic">
<thead>
    <tr>
		<th>Name</th>
		<th>Sub Total</th>
		<th>Bonus Head</th>
        <th>Bonus Amount</th>
        <th>Fine Head</th>
        <th>Fine Amount</th>
        <th>Total Amount</th>
        <th>TDS</th>
        <th>Payable Amount</th>
        <th>Payment Status</th>
		<th>Actions</th>
    </tr>
    </thead>
    <tbody>
	<?php foreach($PaymentList as $t){ ?>
    <tr>
		<td><?php echo $t['user_id']; ?></td>
		<td><?php echo $t['sub_total']; ?></td>
        <td><?php echo $t['bonus_head']; ?></td>
        <td><?php echo $t['bonus_value']; ?></td>
        <td><?php echo $t['fine_head']; ?></td>
        <td><?php echo $t['fine_value']; ?></td>
        <td><?php echo $t['total']; ?></td>
        <td><?php echo $t['tds']; ?></td>
        <td><?php echo $t['grand_total']; ?></td>
        
        
       
		<td><?php if($t['payment_status']=='1'){echo '<span class="text-success">Transferred</span>';}else{echo '<span class="text-danger">Not Transferred</span>';}?></td>
		
		<td>
        	<?php if(in_array('users-edit', $this->GroupPermission)){$showedit = true;}elseif(in_array('users-edit-own', $this->GroupPermission) && $t['createdby']==$this->session->userdata('id')){$showedit = true;} if($showedit == true){ ?>
            <a href="<?php echo site_url('secure/users/edit/'.$t['id']); ?>" class="text-info">Edit</a>
            <?php }?>
            <?php if(in_array('users-delete', $this->GroupPermission)){$showdelete = true;}elseif(in_array('users-delete-own', $this->GroupPermission) && $t['createdby']==$this->session->userdata('id')){$showdelete = true;} if($showdelete == true){ ?>
            <a href="<?php echo site_url('secure/users/delete/'.$t['id']); ?>" class="text-danger" onclick="return confirm('Are you sure? You want to delete!')">Delete</a>
        	<?php }?>
        </td>
    </tr>
	<?php } ?>
    </tbody>
</table>
</div></div></div></div>