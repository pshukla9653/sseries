						<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                                
            <?php  for($i=0; $i < count($menu_order); $i++):
						$main_menu =''; $ma='';
						if($this->session->userdata('exam_id') == '3'){
						$main_menu = $this->Menu_model->get_data(array('id'=>$menu_order[$i]['id'],'menu_parent_id'=>0,'display_in_menu'=>1,'status'=>1));	
						}
						else{
						$main_menu = $this->Menu_model->get_data(array('id'=>$menu_order[$i]['id'],'menu_parent_id'=>0,'display_in_menu'=>1,'status'=>1));	
						}
						
						
						$ma = explode('/', $main_menu['menu_url']);
						if(in_array($main_menu['menu_function'], $this->GroupPermission)){?>
						<li class="<?php if($main_menu['menu_url']==$this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3) || $ma[0]==$this->uri->segment(2)){ echo 'active';}?>">
                                
                                <a href="<?=base_url($main_menu['menu_url']);?>"><i class="<?=$main_menu['menu_icon'];?>"></i> <span><?=$main_menu['menu_title'];?></span></a>
                          <?php if($menu_order[$i]['children']!=null){
								$sub_menu_order1 = $menu_order[$i]['children'];
							echo '<ul>';
							for($r=0; $r < count($sub_menu_order1); $r++){
								$menu2 ='';
								$menu2 =$this->Menu_model->get_data(array('id'=>$sub_menu_order1[$r]['id'],'menu_parent_id'=>$menu_order[$i]['id'],'display_in_menu'=>1,'status'=>1));
								
								if($menu2!=''){ $sma='';
									$sma = explode('/', $menu2['menu_url']);
									if(in_array($menu2['menu_function'], $this->GroupPermission)){?>
                                    <li class="<?php if($menu2['menu_url']==$this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3) || $sma[0]==$this->uri->segment(2)){ echo 'active';}?>"><a href="<?=base_url($menu2['menu_url']);?>"><i class="<?=$menu2['menu_icon'];?>"></i> <?=str_replace('Own','',$menu2['menu_title']);?></a>
											<?php if($sub_menu_order1[$r]['children']!=null){
                                                $sub_menu_order2 = $sub_menu_order1[$r]['children'];
                                            echo '<ul>';
                                            for($j=0; $j < count($sub_menu_order2); $j++){
                                                $menu3 ='';
                                                $menu3 =$this->Menu_model->get_data(array('id'=>$sub_menu_order2[$j]['id'],'menu_parent_id'=>$sub_menu_order1[$r]['id'],'display_in_menu'=>1,'status'=>1));
                                               //var_dump($menu3);
											    if($menu3!=''){ $smas='';
                                                    $smas = explode('/', $menu3['menu_url']);
                                                    if(in_array($menu3['menu_function'], $this->GroupPermission)){?>
                                                    <li class="<?php if($menu3['menu_url']==$this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3) || $smas[0]==$this->uri->segment(2)){ echo 'active';}?>"><a href="<?=base_url($menu3['menu_url']);?>"><i class="<?=$menu3['menu_icon'];?>"></i> <?=str_replace('Own','',$menu3['menu_title']);?></a></li>
                                                
                                                <?php 
                                                        }
                                                    }
                                                }
                                                echo '</ul>';
                                             }?>
                                             </li> 
								<?php 
										}
									}
								}
								echo '</ul>';
									}?>      
                        </li>
                        <?php }
			endfor;?>
               
								
								
								

							</ul>
						</div>
					</div>






					
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">