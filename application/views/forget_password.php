                  <div class="row">
                <div class="col-sm-12 bgrgba" style="background:url(<?=base_url('uploads/page/7b1e0ea5a737d47561cfa25b94c9b40b.jpg');?>);background-repeat: no-repeat;background-size: cover;padding-top:50px;text-align: center;min-height: 150px;">

<h2 style="color:#377dff;"><span class="fa fa-lock"></span> &nbsp;Forget Password</h2>
</div>
            </div>
    

                  <div class="contact-info-area default-padding">
        <div class="container">
            <div class="row">

                <div class="maps-form">
                   <div class="col-md-3"></div>
                    <div class="col-md-5 form">
<?php echo $this->session->flashdata('msg'); ?>  
<?php echo form_open('Web/forgetPassword');?>
                            <div class="col-md-12">
                                <div class="row">
                    <div class="form-group">
                        <div class="input-group">
<span class="input-group-addon" style="color:black;"><span class="fa fa-unlock"></span></span>
                      <?php echo form_input(array('class'=>'form-control', 'name'=>'mobile_number','placeholder'=>'Enter Your Valid Mobile Number','value'=>set_value('mobile_number')));?>
                  </div>
                  <?php echo form_error('mobile_number', '<p class="class alert-danger">', '</p>'); ?>
                    </div>
                    
                </div>
                            </div>
                           

                              <div class="col-md-12">
                                <div class="row">
<input type="submit" name="btn" id="btn" value="Generate OTP" class="form-control" style="color: white;background-color: #405975;border-radius: 10px;width: auto;">
                                  
                                </div>
                            </div>

 <?php echo form_close();?>
                        </div>

                    </div>
                </div>
            </div>
        </div>