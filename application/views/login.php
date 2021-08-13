                  <div class="row">
                <?php /*?><div class="col-sm-12 bgrgba" style="background:url(<?=base_url('uploads/page/7b1e0ea5a737d47561cfa25b94c9b40b.jpg');?>);background-repeat: no-repeat;background-size: cover;padding-top:50px;text-align: center;min-height: 150px;"><?php */?>

<h2 style="color:#377dff;text-align:center;"><span class="fa fa-lock"></span> &nbsp;Login here</h2>
</div>
            </div>
    

                  <div class="contact-info-area default-padding">
        <div class="container">
            <div class="row">

                <div class="maps-form">
                   <div class="col-md-3"></div>
                    <div class="col-md-5 form">
<?php echo $this->session->flashdata('msg'); ?>  
<?php echo form_open('Web/login');?>
                            <div class="col-md-12">
                                <div class="row">
                    <div class="form-group">
                        <div class="input-group">
<span class="input-group-addon" style="color:black;"><span class="fa fa-unlock"></span></span>
                      <?php echo form_input(array('class'=>'form-control', 'name'=>'mobile_number','placeholder'=>'Enter Mobile','value'=>set_value('mobile_number')));?>
                  </div>
                  <?php echo form_error('mobile_number', '<p class="class alert-danger">', '</p>'); ?>
                    </div>
                    
                </div>
                            </div>
                            <div class="col-md-12">
                                 <div class="row">
                    <div class="form-group">
                        <div class="input-group">
<span class="input-group-addon" style="color:black;"><span class="fa fa-unlock"></span></span>
                       <?php echo form_password(array('class'=>'form-control', 'name'=>'passkey','placeholder'=>'password','value'=>set_value('passkey')));?>
                   </div>
                    </div>
                    <?php echo form_error('passkey', '<p class="class alert-danger">', '</p>'); ?>
                </div>
                            </div>

                              <div class="col-md-6">
                             
                                
<input type="submit" name="btn" id="btn" value="Login"  class="btn btn-primary" style="margin:5px;">
               
                            </div>
                             <div class="col-md-6">
                              <a href="<?=base_url('web/forgetPassword');?>" class="btn btn-primary" style="margin:5px;">Forget Password?</a>
                               
                            </div>
                             <div class="col-md-12">
                           
                             
                               
<a href="<?=base_url('web/registration');?>" class="btn btn-info" style="margin:5px;">New User Register Here</a>
               
                           
                             
                            </div>

 <?php echo form_close();?>
                        </div>

                    </div>
                </div>
            </div>
        </div>