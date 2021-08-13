    <!-- Start Breadcrumb 
    ============================================= -->
    <div class="breadcrumb-area shadow dark text-center text-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                 
                 
                    <h1 style="margin-top:0px; margin-bottom:12px; color:#FE9900"><?=$page_data['page_title'];?><?php if($page_data['slug'] == 'neet'){?>
                 - Pre Medical Test for MBBS/BDS
                 <h3 style="color:#FE9900;">Admission in All Medical Colleges including AIIMS and JIPMER</h3>
                 <?php }?></h1>
                 <?php if($page_data['slug'] == 'notes'){?>
                 <h3 style="color:#FE9900;">Scientifically designed notes for all subjects</h3>
                 <?php }?>
                    
                    <?php /*?><ul class="breadcrumb">
                        <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
                        <li><a href="#">Page</a></li>
                        <li class="active"><?=$page_data['page_title'];?></li>
                    </ul><?php */?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Contact Info
    ============================================= -->
    <div class="contact-info-area default-padding">
        <div class="container">
            <div class="row">
            <?php if($page_data['slug']!='welcome-to-the-biggest-online-test-series-of-various-competitions'){
				if($page_data['slug']!='notes'){?>
            <div><img class="img-responsive" width="100%" height="auto" src="<?=base_url('uploads/page/'.$page_data['upload_file']);?>" alt="" title=""/></div>
                <br>
                <?php }}?>
                
                
                <?=$page_data['description'];?>
            <?php if($page_data['slug']=='services' || $page_data['slug']=='mbbs-admission'){?>
            <div class="col-md-12" style="margin-top:25px;">
                    <div class="text-center">
                    <div class="col-md-6 button text-center" style="margin-bottom:20px;">
                        <a class="btn btn-dark effect circle btn-md" href="<?=base_url('web/page/mbbs-admission-in-kazakhstan');?>">Click here for KAZAKHSTAN</a>
                    </div>
                    <div class="col-md-6 button text-center">
                        <a class="btn btn-dark effect circle btn-md" href="<?=base_url('web/page/mbbs-admission-in-belarus');?>">Click here for BELARUS</a>
                    </div>
                        
                    </div>
                </div>    
            <?php }?>
            </div>
        </div>
    </div>
    <!-- End Contact Info -->