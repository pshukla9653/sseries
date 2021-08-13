
    <!-- Start Breadcrumb 
    ============================================= -->
   
    <!-- End Breadcrumb -->

    <!-- Start Contact Info
    ============================================= -->
    <div class="contact-info-area default-padding">
        <div class="container">
            <div class="row">
            
                <!-- Start Maps & Contact Form -->
                   <div class="col-md-7">
                        <img class="img-responsive" width="100%" height="auto" src="<?=base_url('uploads/page/2767708.jpg');?>" alt="" title=""/>
                    </div>
                    <div class="col-md-5 form">
                        <div class="heading">
                           
                            
                        </div>
                        <?php echo $this->session->flashdata('msg'); ?> 
                        <form action="<?=base_url('web/contact');?>" method="POST">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control" name="name" placeholder="Name*" type="text">
                                        <?php echo form_error('name', '<p class="class alert-danger">', '</p>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control" id="email" name="email" placeholder="Email*" type="email">
                                        <?php echo form_error('email', '<p class="class alert-danger">', '</p>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control"  name="phone" placeholder="Phone*" type="text">
                                       <?php echo form_error('phone', '<p class="class alert-danger">', '</p>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group comments">
                                        <textarea class="form-control" name="comments" placeholder="Tell Me About Courses *"></textarea>
                                    </div>
                                    <?php echo form_error('comments', '<p class="class alert-danger">', '</p>'); ?>
                                </div>
                            </div>
                           <div class="col-md-12">
								 <div class="row">		 
                                      <div class="col-md-1"> <input type="checkbox" name="check" style="margin-top:-11px;" required/></div>
                                      <div class="col-md-11" style="font-size:10px;">I agreed with Terms &amp; Condition and Privacy Policy.</div>
                                     
                                       </div></div>
                            <div class="col-md-12">
                                <div class="row">
                                    <input type="submit"  style="background-color: #FE9900;border:#FE9900;" name="submit" class="btn btn-sm btn-info" value="Send Message">
                               
                                    
                                </div>
                            </div>
                            
                        </form>
                    </div>
                <!-- End Maps & Contact Form -->
                <div class="seperator col-md-12">
                    <span class="border"></span>
                </div>
                <!-- Start Contact Info -->
                <div class="contact-info">
                    <div class="col-md-4 col-sm-4">
                        <div class="item">
                            <div class="icon">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                            <div class="info">
                                <h4>Call Us</h4>
                                <span>+91-7400380224</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="item">
                            <div class="icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="info">
                                <h4>Address</h4>
                                <span>C-6, Unique Aurum,<br>
    Poonam Garden,<br>
    Nr. Mira Bhayandar Road,<br>
    Mira Road, Mumbai-Thane,<br>
    Maharashtra, INDIA-401107</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="item">
                            <div class="icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="info">
                                <h4>Email Us</h4>
                                <span>support@centum.site</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Contact Info -->

               

            </div>
        </div>
    </div>
    <!-- End Contact Info -->