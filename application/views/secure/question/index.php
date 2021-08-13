<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><a href="javascript:window.history.back();"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">
                            <a href="<?=base_url('dashboard');?>">Dashboard</a></span> - 
                            <a href="<?=base_url($this->uri->segment(2));?>"><?=ucfirst($this->uri->segment(2));?></a></h4>
						</div>

						
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="<?=base_url('dashboard');?>"><i class="icon-home2 position-left"></i> Home</a></li>
							<li class="active"><a href="<?=base_url($this->uri->segment(2));?>"><?=ucfirst($this->uri->segment(2));?></a></li>
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
								<h5 class="panel-title"></h5>
								<div class="heading-elements">
									<ul class="icons-list">
				                		<li><a data-action="collapse"></a></li>
				                		<li><a data-action="reload"></a></li>
				                		<li><a data-action="close"></a></li>
				                	</ul>
			                	</div>
							</div>

							<div class="panel-body">
								<div class="row">
                      <div class="col-md-12">
    <?php if(in_array('question-add', $this->GroupPermission)){?>
    <a href="<?php echo base_url('secure/question/add');?>" class="btn btn-primary btn-lg pull-right">Add Question</a>
    <?php }?>
</div>
                                    <div class="col-md-12">
										<fieldset>
						                	<legend class="text-semibold"> <?=ucfirst($this->uri->segment(2));?> List</legend>
											<table class="table datatable-basic">
                      <thead>
                      	<th>Class</th>
                      	<th>Subject</th>
                      <th>Chapter Name</th>
                      <th>Question</th>
                       <th>Status</th>
                      <th>Action</th>
                      </thead>
                     
                     
                                        <tbody>
                                    <?php
									///var_dump($getmode);
									 foreach($getmode as $item) {
									 ?>
                                       
									
                                    <tr style="text-align:left;">
                                    	 <td>
                                        <?php echo $item['class_name'];?>
                                        </td>
                                        <td>
                                         <?php echo $item['sub_name'];?>
                                        </td>
                                        <td><?php echo $item['chapter_name']; ?></td>
                                       <td><?php echo $item['ques']; ?></td>
                                        
                                       
                                        <td><?php echo ($item['status'] == 1) ? '<span class="text-success">Active</span>':'<span class="text-danger">Inactive</span>'; ?></td>
                                        <td>
               <a  class="text-info" onClick="showQuestion('<?php echo $item['id']; ?>')">Show</a>                          
                                         
        	<?php if(in_array('question-edit', $this->GroupPermission)){$showedit = true;}
			elseif(in_array('question-edit-own', $this->GroupPermission) && $t['createdby']==$this->session->userdata('id')){$showedit = true;} 
			if($showedit == true){ ?>
			| <a class="text-info" href="<?php echo base_url('secure/question/edit/'.$item['id']);?>">Edit</a>
            <?php }?>
            
        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                    </table>
										</fieldset>
									</div>
								</div>

								
							</div>
						</div>

</div>

</div>
<!-- Modal -->
<div id="ShowdataModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Question Detail</h4>
      </div>
      <div class="modal-body">
      <div id="showq"></div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script type="text/javascript"> 
		
		
		function showQuestion(getId){
				$.ajax({
							type:'POST',
							url:'<?php echo base_url('secure/question/getquestion');?>',
							data:'getId='+getId,
							success:function(res){
								console.log(res);
								$('#showq').html(res);
								$('#ShowdataModal').modal('show');
								
								
								
								
							}
					}); 
		}
		
		
</script>