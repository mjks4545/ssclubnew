<style type="text/css">
.gbi
ll{
	margin-left:900px;
}
td{
	font-weight: bold;
}
@media print
   {
      .display-none-on-print {display: none;}
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
	 <a href="<?= site_url()?>" class="display-none-on-print pull-right"> Back</a>
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
					 <center>
					 	<strong>Bill NO: <?php if(isset($saved_sale_data[0])){echo $saved_sale_data[0]->b_id;}?> &nbsp;&nbsp;</strong>
					 	<?php if(isset($bill_data[0]->b_id)){ $b_id = $bill_data[0]->b_id; }else{$b_id = '';}   ?>
					 </center>
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
                                                  <?php if( $sale_data == null ){ ?>
                                                    <th><?= $saved_sale_data[0]->s_date; ?></th>
                                                  <?php }else{ ?>
						  <th><?= $sale_data[0]->s_date; ?></th>
                                                  <?php } ?>
						</tr>

						</thead>
					  </table>
					</div> 
					  <form action="<?php echo site_url('sale/save_bill/'.$this->uri->segment(3).'/'.$b_id );?>" method="post">
						 <div class="box-body">
							<table id="" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Particular</th>
										<th>Weapon No</th>
										<th>Qty</th>
										<th>Rates</th>
										<th>Amount</th>
									</tr>
								</thead>
								<tbody>
								<input type="hidden" name="bill_date" value="<?=$persondata[0]->s_date;?>">
								<!-- <input type="hidden" name="bill_date" value="<?php// if(isset($bill_date[0])){echo $bill_date[0]->b_id;}?>"> -->
								<input type="hidden" name="a_bill_id" value="<?php if(isset($bill_data[0])) {echo $bill_data[0]->b_id;} ?>" />
								<input type="hidden" name="c_id" value="<?php echo $this->uri->segment(4); ?>" />
								<?php 
								if( !empty( $sale_data ) ){
									$total_all  = 0;
									$qnty 		= 0;
									$rates 		= 0;
								 foreach($sale_data as $value) { ?>
									<tr>
										<td><?= $value->p_type.'/'.$value->p_model; ?></td>
										<td><?= $value->s_weapon_no; ?></td>
										<td><?= $value->s_quantity;
											$qnty = $qnty + $value->s_quantity;?>
										</td>
										<td><?= $value->s_price;
											$rates = $rates+$value->s_price;
										 ?></td>
										<td><?= $value->s_total_price;
										  $total_all += $value->s_quantity * $value->s_price;
										 ?></td>
									</tr>
								<?php }?>
								</tbody>
								<tr>
									<td></td>
									<td></td><td><?= $qnty?></td>
									<td></td>
									<td></td>
									<input type="hidden" name="qnty" value="<?= $qnty?>">
									<input type="hidden" name="rate" value="<?= $rates?>">
									<input type="hidden" name="amount" value="<?= $total_all?>">
									<input type="hidden" name="rate" value="<?= $rates?>">
									<input type="hidden" name="details" value="<?= $persondata[0]->notes; ?>">
								</tr>
								<?php } else if(!empty($saved_sale_data)){?>
								<?php 
									$total_all  = 0;
									$qnty 		= 0;
									$rates 		= 0;
								 foreach($saved_sale_data as $value) { ?>
									<tr>
										<td><?= $value->p_type.' / '.$value->p_model; ?></td>
                                                                                <td><?= $value->s_weapon_no; ?></td>
										<td><?= $value->s_quantity;
											$qnty = $qnty + $value->s_quantity; 
										 ?></td>
										<td><?= $value->s_price;
											$rates = $rates+$value->s_price;
										 ?></td>
										<td><?= $value->s_quantity * $value->s_price;
										  $total_all += $value->s_quantity * $value->s_price;
									?></td>
									</tr>
								<?php }?>
								</tbody>
								<tr>
									<td></td>
									<td></td><td><?= $qnty?></td>
									<td></td>
									<td></td>
									<input type="hidden" name="qnty" value="<?= $qnty?>">
									<input type="hidden" name="rate" value="<?= $rates?>">
									<input type="hidden" name="amount" value="<?= $total_all?>">
									<input type="hidden" name="rate" value="<?= $rates?>">
									<input type="hidden" name="details" value="<?= $persondata[0]->notes; ?>">
								</tr>
								<?php } ?>
						 </table>
					   </div>
							<div class="row display-none-on-print">
							 <div class="form-group col-sm-4">
							  <strong>Set Tax for Bill:</strong>
							  <input type="text" name="tax" value="<?php if($bill_data) {  } ?>" class="form-control" style="width:90%;" />
							 </div>
							</div>
								<div class="col-sm-4 pull-right">
						  		<strong>Total:</strong>
									<span style="font-size:14px;font-weight:bold;margin-left:70px"><?= $total_all?></span>
						  	    </div>
						  <div class="clearfix"></div>
						   <div class="row">
							 <div class="col-sm-4 pull-right">
							  <strong> % Sales tax: </strong>
							  <span style="font-size:14px;font-weight:bold;margin-left:70px">
							  <?php if($bill_data) { echo $bill_data[0]->bill_tax; } ?>
							  </span>
							 </div>
						  </div>
						   <div class="row">
							 <div class="form-group col-sm-4 pull-right display-none-on-print">
							  <strong>Rectification:</strong>
							  <span><b style="margin-left:17px" ><?php if($bill_data){ echo $bill_data[0]->b_rectification; } ?> </b> </span>
							  <input type="text" name="rectification" value="<?php if($bill_data){ echo $bill_data[0]->b_rectification; } ?>" class="form-control" style="width:90%;" />
							 
							 </div>

						  	<input type="hidden" name="total" value="<?= $total_all; ?>">
						  	<!-- <div class="form-group col-sm-4 pull-right">
							  <strong>Bill Date:</strong>
							  <input type="date" name="bill_date" class="form-control" style="width:90%;" required />
							 </div> -->
							 <div class="clearfix"></div>
						   <div class="row">
							<div class="col-sm-4 pull-right">
							 <strong>Grand Total:</strong>
							<span style="font-size:14px;font-weight:bold;margin-left:30px;margin-right:30px"><?php if( $bill_data) { echo $bill_data[0]->b_grandtotal; }else{echo $total_all;} ?></span>	
							</div>
						  </div>
							 
						  </div>
						  <div class="row display-none-on-print">
						  	<div style="font-size:26px;" class="form-group col-sm-4 col-md-offset-1">
							 <label >Bill Payment</label><br>
              			    <input name="paid" id="value_paid" value="" type="hidden" <?php if($bill_data) { if($bill_data[0]->bill_pay_status == 1)echo 'checked'; } ?>  required/>
              			    <input name="unpaid" id="value_unpaid" value="" type="hidden" <?php if($bill_data) { if($bill_data[0]->bill_pay_status == 0)echo 'checked'; } ?> required/>
                                    <a href="#" id="paid" class="btn btn-lg btn-success" >Paid</a>
                                    <a href="#" id="unpaid" class="btn btn-lg btn-primary">UNPaid</a>
							 </div>
							<div class="form-group col-sm-4">
							<?php if(empty($bill_data[0]->b_id)){?>
							 <input name="submit" type="submit" class="btn btn-lg btn-warning" id="submit" value="Save">
							 <?php }else{ ?>
							 <input name="submit" type="submit" class="btn btn-lg btn-warning" disabled="" value="Save">
							 <?php } ?>	
							 <!-- <input name="submit" type="submit" class="btn btn-primary" id="submit" value="Print"> -->
							 <a href="javascript:window.print()" id="print_save_bill" class="btn btn-lg btn-danger">Print</a>
							</div>
							<!-- <div class="form-group col-sm-4">
							 <label >Bill Payment</label><br>
              			    <input name="bill_pay_status" value="1" type="radio" <?php if($bill_data) { if($bill_data[0]->bill_pay_status == 1)echo 'checked'; } ?>  required/> &nbsp;&nbsp;&nbsp; Paid &nbsp;&nbsp;&nbsp;
              			    <input name="bill_pay_status" value="0" type="radio" <?php if($bill_data) { if($bill_data[0]->bill_pay_status == 0)echo 'checked'; } ?> required/> &nbsp;&nbsp;&nbsp; Unpaid &nbsp;&nbsp;&nbsp;	
							 </div> -->
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
                $('#submit').attr('disabled',true);
	 	$("#print_save_bill").click(function(){

	 	});
	 });

</script>
	<?php
		if( !isset( $saved_sale_data[0] )){
			
	?>
	<div class="row">
	  <div class="col-sm-8">
		  <div class="col-sm-2">
			<div class="form-group">
			 <strong> Manager Signature:</strong>
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
	<script type="text/javascript">
         $('#paid').click( function(e){
             e.preventDefault();
             $('#value_paid').val('1');
             $('#value_unpaid').val('0');
             $('#paid').attr('disabled',true);
             $('#unpaid').attr('disabled',false);
             $('#submit').attr('disabled',false);
         } );   
         $('#unpaid').click( function(e){
             e.preventDefault();
             $('#value_unpaid').val('1');
             $('#value_paid').val('0');
             $('#unpaid').attr('disabled',true);
             $('#paid').attr('disabled',false);
             $('#submit').attr('disabled',false);
         } );  
 	</script>
 	<?php
 		}else{
 	?>
 	<script type="text/javascript">
 		$('#paid').click( function(e){
             e.preventDefault();
         } );   
         $('#unpaid').click( function(e){
             e.preventDefault();
         } );
 	</script>
 	<?php
 	}
 	?>