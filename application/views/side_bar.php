

<div class="col-sm-3 col-md-3">
	            	<div class="sidebar-col">
                     <div class="sidebar-box add wow animated fadeInUp" data-wow-delay="0.2s">
                        <a class="weatherwidget-io" href="https://forecast7.com/en/26d8580d95/lucknow/" data-label_1="LUCKNOW" data-label_2="WEATHER" data-icons="Climacons Animated" data-days="3" data-theme="original" >LUCKNOW WEATHER</a>
<script>
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
</script>
            <p class="text-right">Weather Updates</p>
		                </div>  
		                <div class="sidebar-box add wow animated fadeInUp" data-wow-delay="0.2s">
	<script>  app="www.cricwaves.com"; mo="f1_zd"; tor =""; mtype =""; width="100%"  wi="{{wi}}";  Height="100%";  co ="ban";</script>
	<script type="text/javascript" src="http://www.cricwaves.com/cricket/widgets/script/scoreWidgets.js"></script>
		                    <p class="text-right">Cricket Score</p>
		                </div>
                        <!--<div class="sidebar-box add wow animated fadeInUp" data-wow-delay="0.2s">
		                    <a href="#" target="blank">
		                    	<img src="<?=base_url('assets/frontend/img/cumei.jpg');?>" class="img-responsive" alt=""> 
		                    </a>
		                    <p class="text-right">Advertisement</p>
		                </div>-->
                        <?php $recent_new = $this->web_model->get_postlist_by_limit(array('status'=>1), 3, 0);?>
		                <div class="sidebar-box wow animated fadeInUp" data-wow-delay="0.4s">
		                    <h3>Recent Posts</h3>
                            <?php foreach($recent_new as $r):?>
		                    <div class="media">
		                        <div class="media-left">
                                <?php if($$r['upload_type']=='1'){?>
                         <a href="#"> <img class="media-object" src="<?=base_url('uploads/post/photo/'.$r['upload_file']);?>" width="100" alt="..."> </a>
						 <?php }elseif($$r['upload_type']=='2'){?>
                         <video controls width="100%" height="100%">
  						<source src="<?=base_url('uploads/post/video/'.$r['upload_file']);?>" type="video/mp4">
						Your browser does not support the video tag.
							</video>
                         <?php }?>
		                        </div>
		                        <div class="media-body"> 
		                            <h4 class="media-heading"><a href="<?=base_url('web/singlepost/'.$r['id']);?>"><?=$r['post_title'];?></a></h4> 
		                            <span class="date">By: Admin</span> 
                                    <span class="date">Publish On: <?=$r['post_date'];?></span> 
                                    
		                        </div>
		                    </div>
                            <?php endforeach;?>
		                    
		                </div>
		                <!--sidebar box-->
		                
		                <!--sidebar box-->
		                <div class="sidebar-box add wow animated fadeInUp" data-wow-delay="0.2s">
		                    <a href="#" target="blank"> 
		                    	<img src="<?=base_url('assets/frontend/img/cumei.jpg');?>" class="img-responsive" alt=""> 
		                    </a>
		                    <p class="text-right">Advertisement</p>
		                </div>
		               <div class="sidebar-box add wow animated fadeInUp" data-wow-delay="0.2s">
		                    <div class="fb-page" data-href="https://www.facebook.com/livesamacharnine/" data-tabs="timeline" data-height="200" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/livesamacharnine/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/livesamacharnine/">Live samachar 9</a></blockquote></div>
		                    <p class="text-right">Social Updates</p>
		                </div>
                                 
		                <div class="sidebar-box wow animated fadeInUp" data-wow-delay="1.2s">
		                    <h3>Follow Us</h3>
		                    <ul class="social-footer list-inline">
		                        <li><a href="https://www.facebook.com/livesamacharnine/"><i class="fa fa-facebook"></i></a></li>
		                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
		                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
		                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
		                        <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
		                    </ul>
		                </div>
		                
		                
		            </div>
	            </div>