<style>
    td, th {
        text-align: center;
    }
   .per_rec td{
        line-height: 80px!important;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Director Dashboard
            <small><a href="<?= site_url()?>student/">Payment</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                View Payment
            </small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <?php $this->load->view('include/alert'); ?>
                        <h3 class="box-title">View Payment</h3>

                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Cnic</th>
                                <th>Mobile</th>
                                <th>Address</th>
                                <th>Valid Till</th>
                            </tr>
                            </thead>
                            <tbody>
                           <tr style="height:80px" class="per_rec"> 
						      <td><?= $persondata[0]->Per_name?></td>
                              <td><?= $persondata[0]->Per_cnic?></td>
                              <td><?= $persondata[0]->Per_number?></td>
                              <td><?= $persondata[0]->Per_address?></td>
                              <!-- <td><?= $persondata[0]->m_valid_to?></td> -->
                              <td><?php echo date( 'M-d-Y', strtotime( $persondata[0]->m_valid_to ) );  ?></td>
                           </tr>
                             </tbody>
                        </table>
				  
                    </div>
                    <hr>
					<h2 style="text-align:center;">Payment History</h2>
					<!--payment history-->
					  <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>S.no</th>
                                <th>Payment</th>
                                <th>Date</th>
                                <th>Valid Till</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr> 
                              <td>1</td>
                              <td><?= $persondata[0]->m_payment?></td>
                              <td><?= $persondata[0]->m_valid_to?></td>
                              <td><?= $persondata[0]->m_valid_from?></td>
                          </tr>
                           <?php $sno=2; 
                                 $total_payment = $persondata[0]->m_payment; 
                           foreach ($payment_data as $value) {?>
                           <tr> 
						                  <td><?= $sno?></td>
                              <td><?= $value->r_payment?></td>
                              <td><?= $value->r_date?></td>
                              <td><?= $value->r_valid_to?></td>
                          </tr>
                          <?php 
                            $total_payment = $total_payment + $value->r_payment;
                          ?>
                          <?php $sno++; } ?>
                             </tbody>
                          <tr>
                            <td></td><td><?=$total_payment?></td>
                            <td></td><td></td>
                          </tr>
                             
                        </table>
				  
                    </div>
					<!--================= end =======================-->
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.box -->
        </div>

    </section>
</div>

