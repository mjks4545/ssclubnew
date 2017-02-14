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
	                <form method="post" action="<?php echo site_url('sale_reports/delete_bill')?>">     
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
						  <td><?= $persondata[0]->s_date; ?></td>
						</tr>

						</thead>
					  </table>
					  <hr>
					  <input type="hidden" name="arr_len" value="<?= count($sale_data)?>">
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
									$i    = 0;

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
										<td><?= $value->s_quantity * $value->s_price;
										  $total_all = $total_all+ $value->s_total_price;
										 ?></td>
											<input type="hidden" name="par_id_<?php echo$i?>" value="<?= $value->par_id?>">
											<input type="hidden" name="s_quantity_<?php echo$i?>" value="<?= $value->s_quantity?>">
											<input type="hidden" name="p_id_<?php echo$i?>" value="<?= $value->p_id?>">
											<input type="hidden" name="s_id_<?php echo$i?>" value="<?= $value->s_id?>">
									</tr>	
								<?php $i++; }?>
								</tbody>
								<input type="hidden" name="m_id" value="<?=$persondata[0]->m_id;?>">		
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
						<a href="<?= base_url('sale_reports/sale_bill_reports/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5) ) ?>" class="btn btn-warning btn-lg">View Bill</a>
						<!-- <a href="<?//= site_url('sale_reports/delete_bill/'.$value->Per_id.'/'.$value->b_id)?>" id="delete_bill" class="btn btn-info">Delete Bill</a>  -->
						<input type="submit" value="Delete bill" onclick="return confirm('Are you sure you want to delete this bill?');" class="btn btn-danger btn-lg">
						<?php 
							if( isset( $sale_data[0]->bill_pay_status ) ){
								if( $sale_data[0]->bill_pay_status == 0 ){
									?>
										<a href="<?= site_url(); ?>sale_reports/paid_bill/<?= $per_id = $this->uri->segment(3); ?>/<?= $per_id = $this->uri->segment(4); ?>" class="btn btn-success btn-lg">Pay This Bill</a>
									<?php
								}
							}
						?>
						
						</div>
	                     </div>
	                </form>     
	                </div>         
	         </div>
	</section>         	

</div>        

<script type="text/javascript">
	$(document).ready(function(){
			$('body').on('click','#delte_bill',function(){
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
