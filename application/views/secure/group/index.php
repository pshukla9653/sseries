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
										<h5 class="panel-title"><?=ucfirst($this->uri->segment(2));?></h5>
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
<?php if(in_array('group-add', $this->GroupPermission)){?>
	<a href="<?php echo site_url('group/add'); ?>" class="btn btn-success">Add</a>
    <?php }?> 
</div>
<?php echo $this->session->flashdata('msg'); ?>
<table class="table datatable-basic">
<thead>
    <tr>
		<th>ID</th>
		<th>Group Title</th>
		<th>Status</th>
		<th>Group Permission</th>
		<th>Actions</th>
    </tr>
    </thead>
    <tbody>
	<?php foreach($grouplist as $t){ ?>
    <tr>
		<td><?php echo $t['id']; ?></td>
		<td><?php echo $t['group_title']; ?></td>
		<td><?php if($t['status']=='1'){echo '<span class="text-success">Active</span>';}else{echo '<span class="text-danger">Inactive</span>';}?></td>
		<td><?php echo $t['group_permission']; ?></td>
		<td>
        	<?php //if(in_array('group-edit', $this->GroupPermission)){$showedit = true;}elseif(in_array('group-edit-own', $this->GroupPermission) && $t['createdby']==$this->session->userdata('id')){$showedit = true;} if($showedit == true){ ?>
            <a href="<?php echo site_url('secure/group/edit/'.$t['id']); ?>" class="text-info">Edit</a>
            <?php //}?>
            <?php if(in_array('group-delete', $this->GroupPermission)){$showdelete = true;}elseif(in_array('group-delete-own', $this->GroupPermission) && $t['createdby']==$this->session->userdata('id')){$showdelete = true;} if($showdelete == true){ ?>
            <a href="<?php echo site_url('secure/group/delete/'.$t['id']); ?>" class="text-danger" onclick="return confirm('Are you sure? You want to delete!')">Delete</a>
        	<?php }?>
        </td>
    </tr>
	<?php } ?>
    </tbody>
</table>
</div></div></div></div>