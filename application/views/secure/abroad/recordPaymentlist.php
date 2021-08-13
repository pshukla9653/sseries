<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><a href="javascript:window.history.back();"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">
                            <a href="<?=base_url('dashboard');?>">Dashboard</a></span> - Record Payment List
                            </h4>
						</div>

						
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="<?=base_url('dashboard');?>"><i class="icon-home2 position-left"></i> Home</a></li>
							<li class="active"><a href="#">Record Payment List</a></li>
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
										<fieldset>
						                	<legend class="text-semibold"> Payment List</legend>
											<table class="table datatable-basic">
                      <thead>
                      <th>SN.</th>
                      <th>Reference no.</th>
                    
                      <th>Fee Paid</th>
                      <th>Fee Due</th>
                      <th>Payment Date</th>
                      <th>Payment Mode</th>
                      <th>Transcation Id</th>
                      <th>Note</th>
                      <th>Action</th>
                      </thead>
                                        <tbody>
                                    <?php $r=1; foreach($record_llist as $item) { ?>
                                    <tr>
                                    	<td><?php echo $r; ?></td>
                                        <td><?php echo $item['referance_no']; ?></td>
                                       
                                        <td><?php echo $item['amount_received']; ?></td>
                                         <td><?php echo $item['due_fee']; ?></td>
                                        
                                         <td><?php echo date_format(date_create($item['payment_date']),"d-m-Y"); ?></td>
                                         <td><?php echo $item['payment_mode']; ?></td>
                                          <td><?php echo $item['tran_id']; ?></td>
                                          <td><?php echo $item['note']; ?></td>
                                        
                                       
                                        <td>
                                       <a  class="text-info" href="<?=base_url('secure/abroad/showpaymentrecipt/'.$item['id']);?>" >Show</a>
        </td>
                                    </tr>
                                    <?php $r++; } ?>
                                </tbody>
                    </table>
										</fieldset>
									</div>
								</div>

								
							</div>
						</div>

</div>

</div>
