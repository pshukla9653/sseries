<style type="text/css">

.cf:after { visibility: hidden; display: block; font-size: 0; content: " "; clear: both; height: 0; }
* html .cf { zoom: 1; }
*:first-child+html .cf { zoom: 1; }




/**
 * Nestable
 */

.dd { position: relative; display: block; margin: 0; padding: 0; max-width: 600px; list-style: none; font-size: 13px; line-height: 20px; }

.dd-list { display: block; position: relative; margin: 0; padding: 0; list-style: none; }
.dd-list .dd-list { padding-left: 30px; }
.dd-collapsed .dd-list { display: none; }

.dd-item,
.dd-empty,
.dd-placeholder { display: block; position: relative; margin: 0; padding: 0; min-height: 20px; font-size: 13px; line-height: 20px; }

.dd-handle { display: block; height: 30px; margin: 5px 0; padding: 5px 10px; color: #333; text-decoration: none; font-weight: bold; border: 1px solid #ccc;
    background: #fafafa;
    background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
    background:    -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
    background:         linear-gradient(top, #fafafa 0%, #eee 100%);
    -webkit-border-radius: 3px;
            border-radius: 3px;
    box-sizing: border-box; -moz-box-sizing: border-box;
}
.dd-handle:hover { color: #2ea8e5; background: #fff; }

.dd-item > button { display: block; position: relative; cursor: pointer; float: left; width: 25px; height: 20px; margin: 5px 0; padding: 0; text-indent: 100%; white-space: nowrap; overflow: hidden; border: 0; background: transparent; font-size: 12px; line-height: 1; text-align: center; font-weight: bold; }
.dd-item > button:before { content: '+'; display: block; position: absolute; width: 100%; text-align: center; text-indent: 0; }
.dd-item > button[data-action="collapse"]:before { content: '-'; }

.dd-placeholder,
.dd-empty { margin: 5px 0; padding: 0; min-height: 30px; background: #f2fbff; border: 1px dashed #b6bcbf; box-sizing: border-box; -moz-box-sizing: border-box; }
.dd-empty { border: 1px dashed #bbb; min-height: 100px; background-color: #e5e5e5;
    background-image: -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                      -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
    background-image:    -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                         -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
    background-image:         linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                              linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
    background-size: 60px 60px;
    background-position: 0 0, 30px 30px;
}

.dd-dragel { position: absolute; pointer-events: none; z-index: 9999; }
.dd-dragel > .dd-item .dd-handle { margin-top: 0; }
.dd-dragel .dd-handle {
    -webkit-box-shadow: 2px 4px 6px 0 rgba(0,0,0,.1);
            box-shadow: 2px 4px 6px 0 rgba(0,0,0,.1);
}

/**
 * Nestable Extras
 */

.nestable-lists { display: block; clear: both; padding: 30px 0; width: 100%; border: 0; border-top: 2px solid #ddd; border-bottom: 2px solid #ddd; }

#nestable-menu { padding: 0; margin: 20px 0; }

#nestable-output,
#nestable2-output { width: 100%; height: 7em; font-size: 0.75em; line-height: 1.333333em; font-family: Consolas, monospace; padding: 5px; box-sizing: border-box; -moz-box-sizing: border-box; }

#nestable2 .dd-handle {
    color: #fff;
    border: 1px solid #999;
    background: #bbb;
    background: -webkit-linear-gradient(top, #bbb 0%, #999 100%);
    background:    -moz-linear-gradient(top, #bbb 0%, #999 100%);
    background:         linear-gradient(top, #bbb 0%, #999 100%);
}
#nestable2 .dd-handle:hover { background: #bbb; }
#nestable2 .dd-item > button:before { color: #fff; }

@media only screen and (min-width: 700px) {

    .dd { float: left; width: 48%; }
    .dd + .dd { margin-left: 2%; }

}

.dd-hover > .dd-handle { background: #2ea8e5 !important; }

/**
 * Nestable Draggable Handles
 */

.dd3-content { display: block; height: 30px; margin: 5px 0; padding: 5px 10px 5px 40px; color: #333; text-decoration: none; font-weight: bold; border: 1px solid #ccc;
    background: #fafafa;
    background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
    background:    -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
    background:         linear-gradient(top, #fafafa 0%, #eee 100%);
    -webkit-border-radius: 3px;
            border-radius: 3px;
    box-sizing: border-box; -moz-box-sizing: border-box;
}
.dd3-content:hover { color: #2ea8e5; background: #fff; }

.dd-dragel > .dd3-item > .dd3-content { margin: 0; }

.dd3-item > button { margin-left: 30px; }

.dd3-handle { position: absolute; margin: 0; left: 0; top: 0; cursor: pointer; width: 30px; text-indent: 100%; white-space: nowrap; overflow: hidden;
    border: 1px solid #aaa;
    background: #ddd;
    background: -webkit-linear-gradient(top, #ddd 0%, #bbb 100%);
    background:    -moz-linear-gradient(top, #ddd 0%, #bbb 100%);
    background:         linear-gradient(top, #ddd 0%, #bbb 100%);
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}
.dd3-handle:before { content: '≡'; display: block; position: absolute; left: 0; top: 3px; width: 100%; text-align: center; text-indent: 0; color: #fff; font-size: 20px; font-weight: normal; }
.dd3-handle:hover { background: #ddd; }

/**
 * Socialite
 */

.socialite { display: block; float: left; height: 35px; }

    </style>
<script type="text/javascript" src="<?=base_url('assets/backend/assets/js/jquery.nestable.js');?>"></script>
<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><a href="javascript:window.history.back();"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">
                            <a href="<?=base_url('dashboard');?>">Dashboard</a></span> - 
                            <a href="<?=base_url($this->uri->segment(1));?>"><?=ucfirst($this->uri->segment(1));?></a></h4>
						</div>

						
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="<?=base_url('dashboard');?>"><i class="icon-home2 position-left"></i> Home</a></li>
							<li class="active"><a href="<?=base_url($this->uri->segment(1));?>"><?=ucfirst($this->uri->segment(1));?></a></li>
						</ul>

						
					</div>
				</div>
				<!-- /page header -->
<!-- Content area -->
				<div class="content">

					<!-- Horizontal form options -->
					<div class="row">

<div class="panel panel-flat">
<div class="panel-heading">
										<h5 class="panel-title"><?=ucfirst($this->uri->segment(1));?></h5>
										<div class="heading-elements">
											<ul class="icons-list">
						                		<li><a data-action="collapse"></a></li>
						                		<li><a data-action="reload"></a></li>
						                		<li><a data-action="close"></a></li>
						                	</ul>
					                	</div>
									</div>

<div class="panel-body">


 <menu id="nestable-menu">
        <button type="button" data-action="expand-all">Expand All</button>
        <button type="button" data-action="collapse-all">Collapse All</button>
    </menu>
 
<div class="cf nestable-lists">

        <div class="dd" id="nestable">
        
          
    <ol class="dd-list">
            <?php
			//echo '<pre>';
//			echo print_r($menu_order);
//			echo '</pre>';
			 for($i=0; $i < count($menu_order); $i++):
			$menu1 ='';
			$menu1 = $this->Menu_model->get_data(array('id'=>$menu_order[$i]['id'],'menu_parent_id'=>0,'display_in_menu'=>1,'status'=>1));
			
			
               echo  '<li class="dd-item" data-id="'.$menu1['id'].'">';
                echo    '<div class="dd-handle">'.$menu1['menu_title'].'</div>';
                    if($menu_order[$i]['children']!=null): 
					$sub_menu_order1 = $menu_order[$i]['children'];
					echo '<ol class="dd-list">';
							for($r=0; $r < count($sub_menu_order1); $r++):
								$menu2 ='';
								$menu2 = $this->Menu_model->get_data(array('id'=>$sub_menu_order1[$r]['id'],'menu_parent_id'=>$menu_order[$i]['id'],'display_in_menu'=>1,'status'=>1));
								echo  '<li class="dd-item" data-id="'.$menu2['id'].'">';
                				echo  '<div class="dd-handle">'.$menu2['menu_title'].'</div>';
								echo  '</li>';
								//echo print_r($sub_menu_order1[$r]['children']);
										if($sub_menu_order1[$r]['children']!=null): 
										$sub_menu_order2 = $sub_menu_order1[$r]['children'];
										echo '<ol class="dd-list">';
												for($j=0; $j < count($sub_menu_order2); $j++):
													$menu3 ='';
													$menu3 =$this->Menu_model->get_data(array('id'=>$sub_menu_order2[$j]['id'],'menu_parent_id'=>$sub_menu_order1[$r]['id'],'display_in_menu'=>1,'status'=>1));
													echo  '<li class="dd-item" data-id="'.$menu3['id'].'">';
													echo  '<div class="dd-handle">'.$menu3['menu_title'].'</div>';
													echo  '</li>';
															if($sub_menu_order2[$j]['children']!=null): 
															$sub_menu_order3 = $sub_menu_order2[$j]['children'];
															echo '<ol class="dd-list">';
																	for($k=0; $k < count($sub_menu_order3); $k++):
																		$menu4 ='';
																		$menu4 =$this->Menu_model->get_data(array('id'=>$sub_menu_order3[$k]['id'],'menu_parent_id'=>$sub_menu_order2[$j]['id'],'display_in_menu'=>1,'status'=>1));
																		echo  '<li class="dd-item" data-id="'.$menu4['id'].'">';
																		echo  '<div class="dd-handle">'.$menu4['menu_title'].'</div>';
																		echo  '</li>';
																	endfor;
															echo '</ol>';
									   						endif;
												endfor;
										echo '</ol>';
									   endif;
							endfor;
					echo '</ol>';
                   endif;
          echo '</li>';
		endfor;?>
               
            </ol>
    
        </div>

       

    </div>
    

    <p><strong>Serialised Output (per list)</strong></p>

    <input type="text" id="nestable-output" readonly/>

    <p>&nbsp;</p>
     <span id="showerror"></span>
 <input type="button" onClick="updatemenuorder();" class="btn btn-success" value="Update Order"/>
</div></div>

</div>
</div>

<script>

$(document).ready(function()
{

    var updateOutput = function(e)
    {
        var list   = e.length ? e : $(e.target),
            output = list.data('output');
        if (window.JSON) {
			objdata = window.JSON.stringify(list.nestable('serialize'));
            output.val(objdata);
			
        } else {
            output.val('JSON browser support required for this demo.');
        }
    };

    // activate Nestable for list 1
    $('#nestable').nestable({
        group: 1
    })
    .on('change', updateOutput);

    // activate Nestable for list 2

    // output initial serialised data
    updateOutput($('#nestable').data('output', $('#nestable-output')));

    $('#nestable-menu').on('click', function(e)
    {
        var target = $(e.target),
            action = target.data('action');
        if (action === 'expand-all') {
            $('.dd').nestable('expandAll');
        }
        if (action === 'collapse-all') {
            $('.dd').nestable('collapseAll');
        }
    });

    

});
function updatemenuorder(){
	var objdata = $('#nestable-output').val();
	$.ajax({
                type:'POST',
                url:'<?php echo base_url("secure/ajaxdata/admin_menu_order"); ?>',
                data:'menu_order='+objdata,
                success:function(html){
                  $('#showerror').html(html);
				  window.setTimeout(function () {
				$(".alert-success").fadeTo(300, 0).slideUp(300, function () {
				$(this).remove();
					});
				}, 3000);
				 window.setTimeout(function () {
				$(".alert-danger").fadeTo(300, 0).slideUp(300, function () {
				$(this).remove();
					});
				}, 3000);
                }
				
            }); 	
}
</script>