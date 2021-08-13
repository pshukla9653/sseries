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
<?php echo form_open('secure/menu/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="display_in_menu" class="col-md-4 control-label">Display In Menu</label>
		<div class="col-md-8">
			<input type="checkbox" name="display_in_menu" value="1" id="display_in_menu" />
		</div>
	</div>
	<div class="form-group">
		<label for="menu_parent_id" class="col-md-4 control-label">Parent Menu</label>
		<div class="col-md-8">
			<select name="menu_parent_id" class="form-control select2">
				
                <option value="0">None</option>
				<?php 
				foreach($all_menulist as $menu)
				{
					$selected = ($menu['id'] == $this->input->post('menu_parent_id')) ? ' selected="selected"' : "";

					echo '<option value="'.$menu['id'].'" '.$selected.'>'.$menu['menu_title'].'</option>';
				} 
				?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="menu_title" class="col-md-4 control-label"><span class="text-danger">*</span>Menu Title</label>
		<div class="col-md-8">
			<input type="text" name="menu_title" value="<?php echo $this->input->post('menu_title'); ?>" class="form-control" id="menu_title" />
			<span class="text-danger"><?php echo form_error('menu_title');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="menu_function" class="col-md-4 control-label"><span class="text-danger">*</span>Menu Function (class-function or class-function-own)</label>
		<div class="col-md-8">
			<input type="text" name="menu_function" value="<?php echo $this->input->post('menu_function'); ?>" class="form-control" id="menu_function" />
			<span class="text-danger"><?php echo form_error('menu_function');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="menu_url" class="col-md-4 control-label"><span class="text-danger">*</span>Menu Url</label>
		<div class="col-md-8">
			<input type="text" name="menu_url" value="<?php echo $this->input->post('menu_url'); ?>" class="form-control" id="menu_url" />
			<span class="text-danger"><?php echo form_error('menu_url');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="menu_icon" class="col-md-4 control-label">Menu Icon</label>
		<div class="col-md-8">
			<input type="text" name="menu_icon" value="<?php echo $this->input->post('menu_icon'); ?>" class="form-control" id="menu_icon" />
		</div>
	</div>
	<div class="form-group">
		<label for="menu_icon" class="col-md-4 control-label">Status</label>
		<div class="col-md-8">
			<select name="status" class="form-control">
            <option value="1">Active</option>
            <option value="0">Inactive</option>
            </select>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>
</div></div>

</div>
</div>