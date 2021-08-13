
    <!-- Start Breadcrumb 
    ============================================= -->

    
            <div class="row">
                <?php /*?><div class="col-sm-12 bgrgba" style="background:url(<?=base_url('uploads/page/7b1e0ea5a737d47561cfa25b94c9b40b.jpg');?>);background-repeat: no-repeat;background-size: cover;padding-top:50px;text-align: center;min-height: 150px;"><?php */?>

<h2 style="color:#377dff; text-align:center;"><span class="fa fa-edit"></span> &nbsp;Registration Here</h2>
</div>
            </div>
    
    <!-- End Breadcrumb -->

    <!-- Start Contact Info
    ============================================= -->
    <div class="contact-info-area default-padding">
        <div class="container">
            <div class="row">
           

                <!-- Start Maps & Contact Form -->
                <div class="maps-form">
                   <div class="col-md-3"></div>
                    <div class="col-md-6 form">
                      <?php echo $this->session->flashdata('msg'); ?>    
 <?php echo form_open('Web/registration');?>
                            <div class="col-md-12">
                                <div class="row">
                    <div class="form-group">
                        
                      <?php echo form_input(array('class'=>'form-control', 'name'=>'name','placeholder'=>'Name','value'=>set_value('name')));?>
                  </div>
                    
                    <?php echo form_error('name', '<p class="class alert-danger">', '</p>'); ?>
                </div>
                            </div>
                            <div class="col-md-12">
                                 <div class="row">
                    <div class="form-group">

                       <?php echo form_input(array('class'=>'form-control', 'name'=>'email','placeholder'=>'Email','value'=>set_value('email')));?>
                   </div>
                
                    <?php echo form_error('email', '<p class="class alert-danger">', '</p>'); ?>
                </div>
                            </div>
                            <div class="col-md-12">
<div class="row">
                    <div class="form-group">
                        
<?php echo form_input(array('class'=>'form-control', 'name'=>'mobile_number','placeholder'=>'Mobile no.','value'=>set_value('mobile_number')));?>
                    
                    <?php echo form_error('mobile_number', '<p class="class alert-danger">', '</p>'); ?>
                </div>
                            </div></div>
                            <div class="col-md-12">
                                 <div class="row">
                    <div class="form-group">
                       
                        <select class="form-control" name="exam_id">
                            <option>Select exam</option>
                            <?php foreach($examList as $exam):?>
                                <option value="<?=$exam['id'];?>" <?=set_value('exam_id')==$exam['id']?'selected':'';?>><?=$exam['exam_name'];?></option>
                            <?php endforeach;?>
                        </select>
        
                    </div>
                    <?php echo form_error('exam_id', '<p class="class alert-danger">', '</p>'); ?>
                </div>
                            </div>

                                        <div class="col-md-12">
                <div class="row">
                    <div class="form-group">
                        
                       <?php echo form_password(array('class'=>'form-control', 'name'=>'passkey','placeholder'=>'Password','value'=>set_value('passkey')));?>
                    </div></div>
                    <?php echo form_error('passkey', '<p class="class alert-danger">', '</p>'); ?>
                </div>
            

                        <div class="col-md-12">
                <div class="row">
                    <div class="form-group">
                        
                       <?php echo form_password(array('class'=>'form-control', 'name'=>'confirm_password','placeholder'=>'Confirm Password','value'=>set_value('confirm_password')));?>
                    </div>
                    <?php echo form_error('confirm_password', '<p class="class alert-danger">', '</p>'); ?>
                </div>
            </div>
           <input type="checkbox" name="condition" value="1" style="margin:0px;min-height:5px" required/> I have read the Terms and Conditions and accept them.
            
                            <div class="col-md-12">
                               
                                    <input type="submit" name="btn" id="btn" value="submit" class="btn btn-primary" style="margin:5px;">
                                
                               
                            </div>
                            <!-- Alert Message -->
                            <div class="col-md-12">
                               <a href="<?=base_url('web/login');?>" class="btn btn-info" style="margin:5px;">Registered User Login Here</a>
                            </div>
                                                <?php echo form_close();?>
                    </div>
                </div>
                <!-- End Maps & Contact Form -->

            </div>
        </div>
    </div>
    <!-- End Contact Info -->