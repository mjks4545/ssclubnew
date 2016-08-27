<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
              Sale Report 
            <small>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></small>
          </h1>
        </section>
	
	<section class="content">
		 <a href="<?= site_url()?>" class="pull-right"> Back</a>
	         <div class="row">
				<div class="col-md-12">
                 <!-- general form elements -->
	                 <div class="box box-primary">
	                 <?php $this->load->view('include/alert'); ?>
	                     <div class="box-header">

	                     <h3 style="text-align:center">Search Result For:</h3>
	                     <h3 style="color:#ccc;text-align:center">
	                     <?= $persondata[0]->Per_name ?>
	                     </h3>	
	                        <table id="" class="table table-bordered table-striped">
						<thead>
						<br>
						<tr>
						  <th>Name:</th>
						  <td><?= $persondata[0]->Per_name; ?></td>
						  <th>NIC:</th>
						  <td><?= $persondata[0]->Per_cnic; ?></td>
						</tr>
						
						<tr>
						  <th>Mobile:</th>
						  <td><?= $persondata[0]->Per_number; ?></td>
						  <th>Address:</th>
						  <td><?= $persondata[0]->Per_address; ?></td>
						</tr>
						<tr>
						  <th>License No:</th>
						  <td><?= $persondata[0]->Per_license_no; ?></td>
						  <th>Membership</th>
						  <td><?= $persondata[0]->m_type; ?></td>
						</tr>
						<tr>
						  <th>Details</th>
						  <td><?= $persondata[0]->notes; ?></td>
						  <th>Date:</th>
						  <td><?= date('M-d-Y', strtotime($persondata[0]->s_date)); ?></td>
						</tr>

						</thead>
					  </table>
					  <hr>

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
								<?php 
									$total_all = 0;
									$qnty = 0;
									$rates =0;
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
								<!-- <tr>
									<td>Total Qty:  <?= $qnty; ?></td>
									<td></td><td></td>
									<td>Total: <?= $rates; ?> </td>
									<td>Total:   <?= $total_all; ?></td>
									<input type="hidden" name="qnty" value="<?= $qnty?>">
									<input type="hidden" name="rate" value="<?= $rates?>">
									<input type="hidden" name="amount" value="<?= $total_all?>">
									<input type="hidden" name="rate" value="<?= $rates?>">
									<input type="hidden" name="details" value="<?= $persondata[0]->notes; ?>">
								</tr> -->
						 </table>
						 <br>
						 <br>
						 <input type="hidden" name="per_id" id="per_id" value="<?= $this->uri->segment(3) ?>">
						 <input type="hidden" name="b_id" id="b_id" value="<?= $this->uri->segment(4) ?>">
						 <div align="center">
						<a href="<?= base_url('sale_reports/sale_bill_reports/'.$this->uri->segment(3).'/'.$this->uri->segment(4) ) ?>" class="btn btn-info">View Bill</a>
						<a href="javascript:void(0);" id="delete_bill" class="btn btn-info">Delete Bill</a> 
						</div>
	                     </div>
	                </div>         
	         </div>
	</section>         	

</div>        

<script type="text/javascript">
	$(document).ready(function(){
			$('body').on('click','#delete_bill',function(){
				var c = confirm("Are you sure you want to delete this bill");
				if( c== true )
    			{
				var per_id = $("#per_id").val();
				var b_id   = $("#b_id").val();
				$.ajax({
					url : 	"<?= site_url('sale_reports/delete_bill')?>",
					type:   "POST",
					data:   {per_id:per_id,b_id:b_id},
					success:function()
					{
						location.href = "<?= site_url('sale_reports/sale_reports_search') ?>";
					}

				});
		}
			});
	});

</script>