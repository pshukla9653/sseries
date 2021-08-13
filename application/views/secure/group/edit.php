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
<?php echo form_open('secure/group/edit/'.$group['id'],array("class"=>"form-horizontal")); ?>

	
	<div class="form-group">
		<label for="group_title" class="col-md-4 control-label"><span class="text-danger">*</span>Group Title</label>
		<div class="col-md-8">
			<input type="text" name="group_title" value="<?php echo ($this->input->post('group_title') ? $this->input->post('group_title') : $group['group_title']); ?>" class="form-control" id="group_title" />
			<span class="text-danger"><?php echo form_error('group_title');?></span>
		</div>
	</div>
    <div class="form-group">
		<label for="status" class="col-md-4 control-label"><span class="text-danger">*</span>Status</label>
		<div class="col-md-8">
			<select name="status" class="form-control">
				<option value="1" <?=$group['status']==1?'selected':'';?>>Active</option>
                <option value="0" <?=$group['status']==0?'selected':'';?>>Inactive</option>
				
			</select>
			<span class="text-danger"><?php echo form_error('status');?></span>
		</div>
	</div>
	<?php $permission_group = explode(',', $group['group_permission']);?>
	<div class="form-group">
		<label for="group_permission" class="col-md-12 control-label"><span class="text-danger">*</span><strong>Group Permission</strong></label>
		<div class="col-md-12">
		 <input type="checkbox" id="checkAll"/>Select All
		<table class="table" id="allmenu">
        <tr><th>Menu Title</th><th><div class="col-lg-12">Access Menus</div></th></tr>
        <?php foreach($main_menu_list as $mainmenu): ?>
        <tr><td><input type="checkbox" value="<?=$mainmenu['menu_function'];?>" name="permission[]" <?php if(in_array($mainmenu['menu_function'], $permission_group)){echo 'checked';}?>/><?=$mainmenu['menu_title'];?></td>
        
        
        <td>
        <div class="col-lg-12">
        <?php $submenulist = $this->Menu_model->get_all_sub_menulist($mainmenu['id'],'own');
		//var_dump($submenulist);
		foreach($submenulist as $submenu):
		$getownmenu = $this->Menu_model->get_data(array('menu_function'=>$submenu['menu_function'].'-own'));
		
		
		?>
        <div class="col-md-3">
        <?php if($submenu!=null && $getownmenu==null){?>
        <input type="checkbox" value="<?=$submenu['menu_function'];?>" name="permission[]" <?php if(in_array($submenu['menu_function'], $permission_group)){echo 'checked';}?>/><?=$submenu['menu_title']?>
        <?php }elseif($submenu!=null && $getownmenu!=null){?>
        <label><?=$submenu['menu_title']?></label>
        <select name="permission[]" class="form-control">
        <option value="0">None</option>
        <option value="<?=$submenu['menu_function']?>" <?php if(in_array($submenu['menu_function'], $permission_group)){echo 'selected';}?>/><?=$submenu['menu_title']?></option>
        <option value="<?=$getownmenu['menu_function']?>"<?php if(in_array($getownmenu['menu_function'], $permission_group)){echo 'selected';}?>/><?=$getownmenu['menu_title']?></option>
        </select>
        <?php }?>
        </div>
        <?php $subsubmenulist = $this->Menu_model->get_all_sub_menulist($submenu['id'],'own'); 
			foreach($subsubmenulist as $subsubmenu):
			$getownsubmenu = $this->Menu_model->get_data(array('menu_function'=>$subsubmenu['menu_function'].'-own'));
		?>
        	<div class="col-md-3">
        <?php if($subsubmenu!=null && $getownsubmenu==null){?>
        <input type="checkbox" value="<?=$subsubmenu['menu_function'];?>" name="permission[]" <?php if(in_array($subsubmenu['menu_function'], $permission_group)){echo 'checked';}?>/><?=$subsubmenu['menu_title']?>
        <?php }elseif($subsubmenu!=null && $getownsubmenu!=null){?>
        <label><?=$subsubmenu['menu_title']?></label>
        <select name="permission[]" class="form-control">
        <option value="0">None</option>
        <option value="<?=$subsubmenu['menu_function']?>" <?php if(in_array($subsubmenu['menu_function'], $permission_group)){echo 'selected';}?>/><?=$subsubmenu['menu_title']?></option>
        <option value="<?=$getownsubmenu['menu_function']?>"<?php if(in_array($getownsubmenu['menu_function'], $permission_group)){echo 'selected';}?>/><?=$getownsubmenu['menu_title']?></option>
        </select>
        <?php }?>
        </div>
        <?php
		endforeach;endforeach;?>
         </div>
        </td>
        
        
        </tr>
        <?php endforeach; ?>
        </table>	
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>

<script>
$('#checkAll').on('click', function() {
        if (this.checked == true)
            $('#allmenu').find('input[type="checkbox"]').prop('checked', true);
        else
            $('#allmenu').find('input[type="checkbox"]').prop('checked', false);
    });
</script>
</div></div>

</div>
</div>