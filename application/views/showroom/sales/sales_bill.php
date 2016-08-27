
<style type="text/css">
.gbi
ll{
	margin-left:900px;
}
td{
	font-weight: bold;
}

</style>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            SSclub Dashboard
            <small> <a href="<?= site_url()?>admin/">Home</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; <a href="<?= site_url()?>showroom/index">Showroom Section</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<a href="<?=site_url()?>sale/search_by_nic">Sale Product Form</a>&nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; <a href="<?=site_url()?>sale/add_more_sale/<?= $persondata[0]->Per_id; ?>">Add More Sales</a>&nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Generate Bill </small>
         </h1>
        </section>
     <!-- Main content -->
   <section class="content">
	 <a href="<?= site_url()?>" class="pull-right"> Back</a>
         <div class="row">
             <!-- left column -->
             <div class="col-md-12">
                 <!-- general form elements -->
                 <div class="box box-primary">
                 <?php $this->load->view('include/alert'); ?>
                     <div class="box-header">
                         <h2 style="text-align:center;">Sale Bill</h2>
                         <!---<a href="<?= site_url()?>member/" class="pull-right"> Back</a>--->
                     </div><!-- /.box-header -->
                     <!-- form start -->
					 <div class="row">
						 <div id="name" class="col-md-4 image-responsive col-sm-4 col-xs-4">
						  <img src="<?=site_url()?>/public/img/ss_arms.png" width="215" height="140">
						 <h4 style="padding-left: 10px;">Deals in Arms & Ammunition</h4>
						 <h6 style="padding-left: 10px;">GST REG NO. 05-01-9801-170-73</h6>	
						 </div>
					     <div class="col-md-4 col-sm-4 col-xs-4">
					      <strong> Authorised Arms & Ammunition Dealer
                                   License No:1422 Form VI NO 10/V Form V
                                   Deals in Arms & Ammunition
					      </strong>
					    </div>
						<div class="col-md-4 image-responsive col-sm-4 col-xs-4">
							<img id="name" src="<?=site_url()?>/public/img/shooting.png" width="215" height="140">
						<h4 style="padding-left: 20px;">NTN NO : 2565606-6</h4>	
						</div>
					 </div>
                    <div class="box-body">
                        <table id="" class="table table-bordered table-striped">
						<thead>
						<br>
						<tr>
						  <th>Name:</th>
						  <th><?= $persondata[0]->Per_name; ?></th>
						  <th>NIC:</th>
						  <th><?= $persondata[0]->Per_cnic; ?></th>
						</tr>
						
						<tr>
						  <th>Mobile:</th>
						  <th><?= $persondata[0]->Per_number; ?></th>
						  <th>Address:</th>
						  <th><?= $persondata[0]->Per_address; ?></th>
						</tr>
						<tr>
						  <th>License No:</th>
						  <th><?= $persondata[0]->Per_license_no; ?></th>
						  <th> </th>
						  <th></th>
						</tr>
						<tr>
						  <th>Remarks</th>
						  <th><?= $persondata[0]->notes; ?></th>
						  <th>Date:</th>
						  <th><?= date('M-d-Y',strtotime($persondata[0]->s_date)); ?></th>
						</tr>

						</thead>
					  </table>
					</div> 
					<hr>
					 <div class="row">
					  <div class="col-sm-4 col-sm-offset-5">
					   <strong>Bill NO: &nbsp;&nbsp;</strong>
					  </div>
					 </div>
					 <hr>
					  <form action="<?php echo site_url('sale/save_bill/'.$persondata[0]->Per_id );?>" method="post">
						 <div class="box-body">
							<table id="" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Qty</th>
										<th>Particular</th>
										<th>Weapon No</th>
										<th>Rates</th>
										<th>Amount</th>
									</tr>
								</thead>
								<tbody>
								<input type="hidden" name="c_id" value="<?= $this->uri->segment(4) ?>" />
								<?php 
								if(isset($sale_data)){
									$total_all  = 0;
									$qnty 		= 0;
									$rates 		= 0;
								 foreach($sale_data as $value) { ?>
									<tr>
										<td><?= $value->s_quantity;
											$qnty = $qnty + $value->s_quantity; 
										 ?></td>
										<td><?= $value->p_type.' / '.$value->p_model; ?></td>
										<td><?= $value->s_weapon_no; ?></td>
										<td><?= $value->s_price;
											$rates = $rates+$value->s_price;
										 ?></td>
										<td><?= $value->s_total_price;
										  $total_all = $total_all+ $value->s_total_price;
										 ?></td>
									</tr>
								<?php }?>
								</tbody>
								<tr>
									<td>Total Qty:  <?= $qnty; ?></td>
									<td></td><td></td>
									<td>Total: <?= $rates; ?> </td>
									<td>Total:   <?= $total_all; ?></td>
									<input type="hidden" name="qnty" value="<?= $qnty?>">
									<input type="hidden" name="rate" value="<?= $rates?>">
									<input type="hidden" name="amount" value="<?= $total_all?>">
									<input type="hidden" name="rate" value="<?= $rates?>">
									<input type="hidden" name="details" value="<?= $persondata[0]->notes; ?>">
								</tr>
								<?php }?>
								<?php if(!empty($saved_sale_data)){?>
								<?php 
									$total_all  = 0;
									$qnty 		= 0;
									$rates 		= 0;
								 foreach($saved_sale_data as $value) { ?>
									<tr>
										<td><?= $value->s_quantity;
											$qnty = $qnty + $value->s_quantity; 
										 ?></td>
										<td><?= $value->p_type.' / '.$value->p_model; ?></td>
										<td><?= $value->s_weapon_no; ?></td>
										<td><?= $value->s_price;
											$rates = $rates+$value->s_price;
										 ?></td>
										<td><?= $value->s_total_price;
										  $total_all = $total_all+ $value->s_total_price;
									?></td>
									</tr>
								<?php }?>
								</tbody>
								<tr>
									<td>Total Qty:  <?= $qnty; ?></td>
									<td></td><td></td>
									<td>Total: <?= $rates; ?> </td>
									<td>Total:   <?= $total_all; ?></td>
									<input type="hidden" name="qnty" value="<?= $qnty?>">
									<input type="hidden" name="rate" value="<?= $rates?>">
									<input type="hidden" name="amount" value="<?= $total_all?>">
									<input type="hidden" name="rate" value="<?= $rates?>">
									<input type="hidden" name="details" value="<?= $persondata[0]->notes; ?>">
								</tr>
								<?php } ?>
						 </table>
					   </div>
						 <div class="row">
							  <div class="col-sm-8">
								  <div class="col-sm-2">
									<div class="form-group">
									 <strong> Signature:</strong>
									</div>
								  </div>
								  <div class="col-sm-3">
									<strong><hr></strong>
								  </div>
							  </div>
								  <div class="col-sm-4">
								   <div class="form-group">
									<!-- <strong>Total:</strong>
									<?= $total_all?> -->
								   </div>
								  </div>
							</div>
							<div class="row">
							 <div class="form-group col-sm-4 pull-right">
							  <strong>Set Tax for Bill:</strong>
							  <input type="text" name="tax" value="<?php if($bill_data) { echo $bill_data[0]->bill_tax; } ?>" class="form-control" style="width:90%;" placeholder="Tax" />
							 </div>
							</div>
							<div class="row">
							 <div class="form-group col-sm-4 pull-right">
							  <strong>Extra:</strong>
							  <input type="text" name="extra" value="<?php if($bill_data) { echo $bill_data[0]->bill_extra; } ?>" class="form-control" style="width:90%;" placeholder="Extra" />
							 </div>
							</div>
							<div class="row">
								<div class="col-sm-4 pull-right">
						  		<strong>Total:</strong>
									<span style="font-size:14px;font-weight:bold;margin-left:15px"><?= $total_all?></span>
						  	</div>	
							</div>

						  <div class="row">
						  	
							<div class="col-sm-4 pull-right">
							 <strong>% Extras:</strong>
							<span style="font-size:14px;font-weight:bold;margin-left:5px">
							<?php if($bill_data) { echo $bill_data[0]->	bill_extra; } ?>
							</span>
							</div>
						  </div>
						   <div class="row">
							 <div class="col-sm-4 pull-right">
							  <strong> % Sales tax: </strong>
							  <span style="font-size:14px;font-weight:bold;margin-left:5px">
							  <?php if($bill_data) { echo $bill_data[0]->bill_tax; } ?>
							  </span>
							 </div>
						  </div>
						   <div class="row">
							 <div class="form-group col-sm-4 pull-right">
							  <strong>Rectification:</strong>
							  <input type="text" name="rectification" placeholder="Rectification" value="<?php if($bill_data) { echo $bill_data[0]->b_rectification; } ?>" class="form-control" style="width:90%;" />
							 </div>

						  	<input type="hidden" name="total" value="<?= $total_all; ?>">
						  	<div class="form-group col-sm-4 pull-right">
							  <strong>Bill Date:</strong>
							  <input type="date" name="bill_date" class="form-control" style="width:90%;" required />
							 </div>
							 <div class="clearfix"></div>
							 <div class="form-group col-sm-4 pull-right">
							 <label for="exampleInputEmail1">Bill Payment</label><br>
              			    <input name="bill_pay_status" value="1" type="radio" <?php if($bill_data) { if($bill_data[0]->bill_pay_status == 1)echo 'checked'; } ?>  required/> &nbsp;&nbsp;&nbsp; Paid &nbsp;&nbsp;&nbsp;
              			    <input name="bill_pay_status" value="0" type="radio" <?php if($bill_data) { if($bill_data[0]->bill_pay_status == 0)echo 'checked'; } ?> required/> &nbsp;&nbsp;&nbsp; Unpaid &nbsp;&nbsp;&nbsp;	
							 </div>
						  </div>
						   <div class="row">
							<div class="col-sm-4 pull-right">
							 <strong>Grand Total:</strong>
							<span><?php if( $bill_data ) { echo $bill_data[0]->b_grandtotal; } ?></span>	
							</div>
						  </div>
						  <div class="row">
							<div class="form-group col-sm-4 col-sm-offset-4">
							 <input name="submit" type="submit" class="btn btn-primary" id="submit" value="Save">
							 <!-- <input name="submit" type="submit" class="btn btn-primary" id="submit" value="Print"> -->
							 <a href="javascript:window.print()" id="print_save_bill" class="btn btn-primary">Print</a>
							</div>
						  </div>
						  </form>  
				 </div>
			 </div>
					 <!--end-->
				 </div>
			 </div>
		 </section>
	 </div>

	 <script type="text/javascript">
	 $(document).ready(function(){
	 	$("#print_save_bill").click(function(){

	 	});
	 });

	 </script>