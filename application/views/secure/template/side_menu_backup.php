						<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                                
                                <?php foreach($main_menu_list as $main_menu): $ma = explode('/', $main_menu['menu_url']);
								if(in_array($main_menu['menu_function'], $this->GroupPermission)){
								?>
                                <li class="<?php if($main_menu['menu_url']==$this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3) || $ma[0]==$this->uri->segment(2)){ echo 'active';}?>">
                                <a href="<?=base_url($main_menu['menu_url']);?>"><i class="<?=$main_menu['menu_icon'];?>"></i> <span><?=$main_menu['menu_title'];?></span></a>
                           		<?php $submenulist = $this->Menu_model->get_sub_menulist($main_menu['id']);
								if($submenulist!=null):
								echo '<ul>';
									foreach($submenulist as $submenu):
									$sma = explode('/', $submenu['menu_url']);
									if(in_array($submenu['menu_function'], $this->GroupPermission)){
								?>
									
										<li class="<?php if($submenu['menu_url']==$this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3) || $sma[0]==$this->uri->segment(2)){ echo 'active';}?>"><a href="<?=base_url($submenu['menu_url']);?>"><i class="<?=$submenu['menu_icon'];?>"></i> <?=str_replace('Own','',$submenu['menu_title']);?></a></li>
										
									
								
								 <?php } endforeach;
								 echo '</ul>'; 
								 endif;?>
                                 </li>
                                <?php } endforeach; ?>
								
								
								

							</ul>
						</div>
					</div>






					
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">