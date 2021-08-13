<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><a href="javascript:window.history.back();"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">
                            <a href="<?=base_url('dashboard');?>">Dashboard</a></span> - 
                            <a href="#">Executive List</a></h4>
						</div>

						
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="<?=base_url('dashboard');?>"><i class="icon-home2 position-left"></i> Home</a></li>
							<li class="active"><a href="#">Executive List</a></li>
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
										<h5 class="panel-title">Executive List</h5>
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
		<th>Email</th>
		<th>Mobile</th>
        <th>DOB</th>
		<th>Group</th>
        <th>Gender</th>
        <th>Status</th>
		<th>Actions</th>
    </tr>
    </thead>
    <tbody>
	<?php foreach($excutivelist as $t){ ?>
    <tr>
		<td><?php echo $t['name']; ?></td>
		<td><?php echo $t['email']; ?></td>
        <td><?php echo $t['mobile']; ?></td>
        <td><?php echo $t['date_of_birth']; ?></td>
        <td><?php 
		$group = $this->Group_model->get_group($t['group_id']);
		echo $group['group_title'];
		//var_dump($group);
		?></td>
        <td><?php echo $t['gender']; ?></td>
		<td><?php if($t['status']=='1'){echo '<span class="text-success">Active</span>';}else{echo '<span class="text-danger">Inactive</span>';}?></td>
		
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