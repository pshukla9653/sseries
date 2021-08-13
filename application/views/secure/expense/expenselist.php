<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><a href="javascript:window.history.back();"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">
                            <a href="<?=base_url('dashboard');?>">Dashboard</a></span> - Expenses List
                            </h4>
						</div>

						
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="<?=base_url('dashboard');?>"><i class="icon-home2 position-left"></i> Home</a></li>
							<li class="active"><a href="#">Expenses List</a></li>
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
						                	<legend class="text-semibold"> Expenses List</legend>
											<table class="table datatable-basic">
                      <thead>
                      <th>SN.</th>
                       <th>Expense Head</th>
                      <th>Reference no.</th>
                      <th>Full Name</th>
                     
                      <th>Voucher Date</th>
                      <th>Amount</th>
                      <th>Authorized Signatory</th>
                      <th>Description</th>
                      <th style="width:20%;">Action</th>
                      </thead>
                                        <tbody>
                                    <?php $r=1; foreach($expenseList as $item) { 
									
									?>
                                    <tr>
                                    	<td><?php echo $r; ?></td>
                                        <td><?php echo $item['category_name']; ?></td>
                                        <td><?php echo $item['referance_no']; ?></td>
                                       
                                        <td><?php echo $item['full_name']; ?></td>
                                        
                                        
                                         <td><?php echo date_format(date_create($item['voucher_date']),"d-m-Y"); ?></td>
                                         <td><?php echo $item['amount']; ?></td>
                                          <td><?php echo $item['authorized_signatory']; ?></td>
                                          <td><?php echo $item['description']; ?></td>
                                        
                                       
                                        <td>
                                        <?php if($item['voucher'] !=''){?>
                                        <a  class="text-info" href="<?=base_url('uploads/expense/'.$item['voucher']);?>" target="_blank">Voucher</a> |
                                        <?php }?>
                                       <a  class="text-info" href="<?=base_url('secure/expenses/editExpenses/'.$item['id']);?>" >Edit</a> |
                                       <a  class="text-info" href="<?=base_url('secure/expenses/printvoucher/'.$item['id']);?>" >Print</a>
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
