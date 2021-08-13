<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SSeries | <?=$title;?></title>
	<link rel="shortcut icon" type="image/png" href="<?=base_url('uploads/logo/favicon.png');?>"/>
	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?=base_url('assets/backend/assets/css/icons/icomoon/styles.css');?>" rel="stylesheet" type="text/css">
    <link href="<?=base_url('assets/backend/assets/css/icons/fontawesome/styles.min.css');?>" rel="stylesheet" type="text/css">
	<link href="<?=base_url('assets/backend/assets/css/bootstrap.css');?>" rel="stylesheet" type="text/css">
	<link href="<?=base_url('assets/backend/assets/css/core.css');?>" rel="stylesheet" type="text/css">
	<link href="<?=base_url('assets/backend/assets/css/components.css');?>" rel="stylesheet" type="text/css">
	<link href="<?=base_url('assets/backend/assets/css/colors.css');?>" rel="stylesheet" type="text/css">
    <link href="<?=base_url('assets/backend/assets/css/croppie.min.css');?>" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="<?=base_url('assets/backend/assets/js/plugins/loaders/pace.min.js');?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/backend/assets/js/core/libraries/jquery.min.js');?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/backend/assets/js/core/libraries/bootstrap.min.js');?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/backend/assets/js/plugins/loaders/blockui.min.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/backend/assets/js/plugins/editors/summernote/summernote.min.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/backend/assets/js/croppie.min.js');?>"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
    <script type="text/javascript" src="<?=base_url('assets/backend/assets/js/plugins/tables/datatables/datatables.min.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/backend/assets/js/plugins/tables/datatables/extensions/buttons.min.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/backend/assets/js/plugins/tables/datatables/extensions/responsive.min.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/backend/assets/js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/backend/assets/js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/backend/assets/js/plugins/tables/datatables/extensions/jszip/jszip.min.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/backend/assets/js/plugins/forms/selects/select2.min.js')?>"></script>
	
	
	<script type="text/javascript" src="<?=base_url('assets/backend/assets/js/plugins/forms/styling/uniform.min.js');?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/backend/assets/js/plugins/forms/selects/bootstrap_multiselect.js');?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/backend/assets/js/plugins/ui/moment/moment.min.js');?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/backend/assets/js/plugins/pickers/daterangepicker.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/backend/assets/js/plugins/forms/inputs/duallistbox.min.js');?>"></script>

    <script type="text/javascript" src="<?=base_url('assets/backend/assets/js/plugins/notifications/pnotify.min.js');?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/backend/assets/js/pages/form_layouts.js');?>"></script>
    	
	<script type="text/javascript" src="<?=base_url('assets/backend/assets/js/core/app.js');?>"></script>
    
    <script type="text/javascript" src="<?=base_url('assets/backend/assets/js/plugins/visualization/d3/d3.min.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/backend/assets/js/plugins/visualization/c3/c3.min.js');?>"></script>
	
    
	
    
   
    
	<!-- /theme JS files -->

</head>

<body class="navbar-top">

	<!-- Main navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-header">
		
			<a class="navbar-brand" href="<?=base_url('admin');?>"><img src="<?=base_url('uploads/logo/'.$this->site_setting['logo']);?>" alt=""></a>

			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>

				<!--<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-git-compare"></i>
						<span class="visible-xs-inline-block position-right">Git updates</span>
						<span class="badge bg-warning-400">9</span>
					</a>
					
					<div class="dropdown-menu dropdown-content">
						<div class="dropdown-content-heading">
							Git updates
							<ul class="icons-list">
								<li><a href="#"><i class="icon-sync"></i></a></li>
							</ul>
						</div>

						<ul class="media-list dropdown-content-body width-350">
							<li class="media">
								<div class="media-left">
									<a href="#" class="btn border-primary text-primary btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-pull-request"></i></a>
								</div>

								<div class="media-body">
									Drop the IE <a href="#">specific hacks</a> for temporal inputs
									<div class="media-annotation">4 minutes ago</div>
								</div>
							</li>

							<li class="media">
								<div class="media-left">
									<a href="#" class="btn border-warning text-warning btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-commit"></i></a>
								</div>
								
								<div class="media-body">
									Add full font overrides for popovers and tooltips
									<div class="media-annotation">36 minutes ago</div>
								</div>
							</li>

							<li class="media">
								<div class="media-left">
									<a href="#" class="btn border-info text-info btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-branch"></i></a>
								</div>
								
								<div class="media-body">
									<a href="#">Chris Arney</a> created a new <span class="text-semibold">Design</span> branch
									<div class="media-annotation">2 hours ago</div>
								</div>
							</li>

							<li class="media">
								<div class="media-left">
									<a href="#" class="btn border-success text-success btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-merge"></i></a>
								</div>
								
								<div class="media-body">
									<a href="#">Eugene Kopyov</a> merged <span class="text-semibold">Master</span> and <span class="text-semibold">Dev</span> branches
									<div class="media-annotation">Dec 18, 18:36</div>
								</div>
							</li>

							<li class="media">
								<div class="media-left">
									<a href="#" class="btn border-primary text-primary btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-pull-request"></i></a>
								</div>
								
								<div class="media-body">
									Have Carousel ignore keyboard events
									<div class="media-annotation">Dec 12, 05:46</div>
								</div>
							</li>
						</ul>

						<div class="dropdown-content-footer">
							<a href="#" data-popup="tooltip" title="All activity"><i class="icon-menu display-block"></i></a>
						</div>
					</div>
				</li>-->
			</ul>

			<p class="navbar-text"><span class="label bg-success">Online</span></p>
            
			<ul class="nav navbar-nav navbar-right">
				

				

				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?=base_url('uploads/avatar.jpg');?>" alt="">
						<span>Hello ! <?=$this->session->userdata('name');?></span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<?php if($this->session->userdata('group_id') == '6'){?>
                        <li><a href="<?=base_url('secure/dashboard/student_profile');?>"><i class="icon-pencil7"></i> Profile</a></li>
                        <?php }?>
						<li><a href="<?=base_url('secure/dashboard/changePassword');?>"><i class="icon-key"></i> Change Password</a></li>
                        <li><a href="<?=base_url('secure/auth/logout');?>"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
            <ul class="nav navbar-nav navbar-right">
				<li><a class="btn-sm btn-info" onclick="window.history.go(1); return false;"><i class="fa fa-arrow-right"></i></a></li>
			</ul>
            <ul class="nav navbar-nav navbar-right">
				<li><a class="btn btn-info" onClick="window.location.href=window.location.href"><i class="fa fa-refresh"></i></a></li>
			</ul>
            <ul class="nav navbar-nav navbar-right">
				<li><a class="btn btn-info" onclick="window.history.go(-1); return false;"><i class="fa fa-arrow-left"></i></a></li>
			</ul>
            <?php if($this->session->userdata('group_id') == '4' || $this->session->userdata('group_id') == '5'){?>
            <ul class="nav navbar-nav navbar-right">
				<li style="margin-top:20px;"><strong>Your Wallet Balance : <i class="fa fa-rupee"></i> <?=$this->WalletBlanace;?></strong></li>
			</ul>
            <?php }?>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main sidebar-fixed">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left"><img src="<?=base_url('uploads/avatar.jpg');?>" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold"><?=$this->GroupName;?> Zone</span>
                                     <?php if($this->CityName){
										 
										 ?>
                                     <div class="text-size-mini text-muted">
										<i class="icon-pin text-size-small"></i>
                                         <strong><?=$this->CityName;?></strong>
									</div>
                                     <?php }?>
                                    
                                    <?php /*?><?php if($this->session->userdata('company_id')!='0' && $this->session->userdata('branch_id')=='0'){?>
									
                                    <?php }?>
                                    <?php if($this->session->userdata('company_id')!='0' && $this->session->userdata('branch_id')!='0'){?>
									<div class="text-size-mini text-muted">
										<i class="icon-pin text-size-small"></i>
                                         <strong><?=$this->CompanyDetail['company_name'];?></strong><br>
                                         <strong><?=$this->BranchDetail['branch_name'];?></strong>
										<br><?=$this->BranchDetail['address'];?>, <?=$this->BranchDetail['city_name'];?>
                                        <br><?=$this->BranchDetail['state_name'];?>, <?=$this->BranchDetail['country_name'];?> - <?=$this->BranchDetail['pincode'];?>
									</div>
                                    <?php }?><?php */?>
								</div>

								<div class="media-right media-middle">
									<ul class="icons-list">
										<li>
                                        <?php if($this->session->userdata('group_id') == '6'){?>
                        
											<a href="<?=base_url('secure/dashboard/student_profile');?>"><i class="icon-cog3"></i></a>
                                            <?php }else{?>
                                            <a href="#"><i class="icon-cog3"></i></a>
                                            <?php }?>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->


					<!-- Main navigation -->