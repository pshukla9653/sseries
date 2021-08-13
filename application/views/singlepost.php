<!--breadcrumb-->
    <section class="breadcrumb">
        <div class="container">
          <ol class="cm-breadcrumb">
            <li><a href="<?=base_url();?>">Home</a></li>
            <li><a href="#">News</a></li>
            <li class="cm-active"><?=$post['post_title'];?></li>
          </ol>
        </div>
    </section>
    <!--end breadcrumb-->

    <!--content-->
    <section class="content item-list">
        <div class="container">
            <div class="row">
                <div class="col-md-9 page-content-column wow animated zoomIn">
                    <div class="single-post clearfix">
                        <div class="topic"> 
                           
                            <h3><?=$post['post_title'];?></h3>
                            <ul class="post-tools">
                              <li> by <a href="#"><strong> Admin</strong> </a></li>
                              <li>Publish On: <?=$post['post_date'];?> </li>
                              <li><a href="#"> <i class="ti-thought"></i></a> </li>
                            </ul>
                        </div>
                        <?php if($post['upload_type']=='1'){?>
                         <img src="<?=base_url('uploads/post/photo/'.$post['upload_file']);?>" class="img-responsive" alt="">
						 <?php }elseif($post['upload_type']=='2'){?>
                         <video controls width="100%" height="450">
  						<source src="<?=base_url('uploads/post/video/'.$post['upload_file']);?>" type="video/mp4">
						Your browser does not support the video tag.
							</video>
                         <?php }?>
                        <div class="post-text">
                           <?=$post['description'];?>
                        </div>
                       
                        <br>
                       
                        <div class="tg-rightarea">
                               <!-- AddToAny BEGIN -->
<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
<a class="a2a_button_facebook"></a>
<a class="a2a_button_twitter"></a>
<a class="a2a_button_google_plus"></a>
<a class="a2a_button_whatsapp"></a>
</div>

<!-- AddToAny END -->
                              </div>
                        
                        <br><br><br><br>
                        <div class="clearfix"></div>
                    
                    </div>

                    
                </div>
               <?php $this->load->view('side_bar');?>
            </div>
        </div>
    </section>
    <!--end content-->

     <!--footer-->
    