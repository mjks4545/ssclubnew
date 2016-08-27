<style>
    td, th {
        text-align: center;
    }
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
          <h1>
            Ssclub Dashboard
            <small> <a href="<?= site_url()?>admin/">Home</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; <a href="<?= site_url()?>showroom/index">Showroom Section</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<a href="<?=site_url()?>sale_reports/">Search Sale Report</a>&nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Searched Sale Report Details</small>
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
                        <h2 style="text-align:center;">View Search details</h2>
                        
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table id="example" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.no</th>
                                <th>Bill #</th>
                                <th>Name</th>
                                <th>Product</th>
                                <th>Product Type</th>
                                <th>Model</th>
                                <th>License No</th>
                                <th>Weapon No</th>
                                <th>Quantity</th>
                                <th>Rate</th>
                                <th>Total</th>
                                <th>Pr Price</th>
                                <th>Date</th> 
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            if(!empty($res_data))
                            {
                             $sno = 1;
                             $total_all = 0;
                             $qnty = 0;
                             $rates =0;
                             $pr_total =0;
                             $duplication = '';
                              foreach ($res_data as $value) {?>
                                <tr>
                                    <td>
                                        <?= $sno; ?>
                                        </td>
                                    <td>
                                        <?php if( $value->b_id == 0 ){ echo ''; }else{ echo $value->b_id; }?>
                                    </td>
                                    <td>
                                    <?php 
                                        if( $duplication != $value->b_id ){

                                         ?> 
                                          <a href="<?= site_url('sale_reports/sale_person_details/'.$value->Per_id.'/'.$value->b_id ); ?>">  
                                            <?php echo $value->Per_name;?>
                                            </a>
                                        <?php }
                                        else
                                        {
                                            echo '';
                                        }
                                        $duplication = $value->b_id; 
                                      ?>
                                    <?php if($value->b_id == 0 ){ ?>    
                                        <a href="<?= site_url('sale_reports/sale_person_details/'.$value->Per_id.'/'.$value->s_id ); ?>"><!--<?= $value->Per_name ?>--></a>
                                    <?php }else{?>
                                        <a href="<?= site_url('sale_reports/sale_person_details/'.$value->Per_id.'/'.$value->b_id ); ?>"><!--<?= $value->Per_name ?>--></a>
                                        <?php }?>
                                    </td>
                                    <td>
                                       <?= $value->p_name;?> 
                                    </td>
                                    <td><?= $value->p_type ?></td>
                                    <td><?= $value->p_model ?></td>
                                    <td><?= $value->Per_license_no ?></td>
                                    <td><?= $value->s_weapon_no ?></td>
                                    <td><?= $value->s_quantity ?></td>
                                    <td><?= $value->s_price ?></td>
                                    <td><?= $value->s_total_price ?></td>
                                    <td><?= $value->p_price ?></td>
                                    <td><?= date('M-d-Y',strtotime($value->s_date) ); ?></td>
                                </tr>
                                <?php
                                $total_all = $total_all+ $value->s_total_price;
                                $rates = $rates+$value->s_price;
                                $qnty = $qnty + $value->s_quantity; 
                                $pr_total = $pr_total + $value->p_price;
                                ?>
                            <?php $sno++; } ?>
                           <br>
                           </tbody>
                           <tr>
                           <td></td><td></td><td></td><td></td>
                           <td></td><td></td><td></td><td></td>
                                    <td>Total Qty:  <?= $qnty; ?></td>
                                    
                                    <td>Total: <?= $rates; ?> </td>
                                    <td>Total:   <?= $total_all; ?></td>
                                    <td>Total Purchase: <?= $pr_total?></td>
                           </tr>
<!-- ============================ For Paid search Result ===========================-->
                        
                        <?php   }
                            if( !empty($paid_bill_result) )
                            {
                              // echo '<pre>';print_r($paid_bill_result);
                             $sno = 1;
                             $total_all = 0;
                             $qnty = 0;
                             $rates =0;
                             $pr_total =0;
                             $duplication = '';
                              foreach ($paid_bill_result as $value) {?>
                                <tr>
                                    <td>
                                        <?= $sno; ?>
                                        </td>
                                    <td>
                                        <?php if( $value->b_id == 0 ){ echo ''; }else{ echo $value->b_id; }?>
                                    </td>
                                    <td>
                                    <?php 
                                        if( $duplication != $value->b_id ){

                                         ?> 
                                          <a href="<?= site_url('sale_reports/sale_person_details/'.$value->Per_id.'/'.$value->b_id ); ?>">  
                                            <?php echo $value->Per_name;?>
                                            </a>
                                        <?php }
                                        else
                                        {
                                            echo '';
                                        }
                                        $duplication = $value->b_id; 
                                      ?>
                                    <?php if($value->b_id == 0 ){ ?>    
                                        <a href="<?= site_url('sale_reports/sale_person_details/'.$value->Per_id.'/'.$value->s_id ); ?>"><!--<?= $value->Per_name ?>--></a>
                                    <?php }else{?>
                                        <a href="<?= site_url('sale_reports/sale_person_details/'.$value->Per_id.'/'.$value->b_id ); ?>"><!--<?= $value->Per_name ?>--></a>
                                        <?php }?>
                                    </td>
                                    <td>
                                       <?= $value->p_name;?> 
                                    </td>
                                    <td><?= $value->p_type ?></td>
                                    <td><?= $value->p_model ?></td>
                                    <td><?= $value->Per_license_no ?></td>
                                    <td><?= $value->s_weapon_no ?></td>
                                    <td><?= $value->s_quantity ?></td>
                                    <td><?= $value->s_price ?></td>
                                    <td><?= $value->s_total_price ?></td>
                                    <td><?= $value->p_price ?></td>
                                    <td><?= date('M-d-Y',strtotime($value->s_date)) ?></td>
                                    <td>
                                     <p style="color:#10d37a;">paid bills</p>
                                    </td>
                                </tr>
                                <?php
                                $total_all = $total_all+ $value->s_total_price;
                                $rates = $rates+$value->s_price;
                                $qnty = $qnty + $value->s_quantity; 
                                $pr_total = $pr_total + $value->p_price;
                                ?>
                            <?php $sno++; 
                              } ?>
                           <br>
                           </tbody>
                           <tr>
                           <td></td><td></td><td></td><td></td>
                           <td></td><td></td><td></td><td></td>
                                    <td>Total Qty:  <?= $qnty; ?></td>
                                    
                                    <td>Total: <?= $rates; ?> </td>
                                    <td>Total:   <?= $total_all; ?></td>
                                    <td>Total Purchase: <?= $pr_total?></td>
                           </tr>


<!-- ============================ End paid search Result ===========================--> 

              <?php }if( !empty($unpaid_bill_result) )
                            {
                              // echo '<pre>';print_r($paid_bill_result);
                             $sno = 1;
                             $total_all = 0;
                             $qnty = 0;
                             $rates =0;
                             $pr_total =0;
                             $duplication = '';
                              foreach ($unpaid_bill_result as $value) {?>
                                <tr>
                                    <td>
                                        <?= $sno; ?>
                                        </td>
                                    <td>
                                        <?php if( $value->b_id == 0 ){ echo ''; }else{ echo $value->b_id; }?>
                                    </td>
                                    <td>
                                    <?php 
                                        if( $duplication != $value->b_id ){

                                         ?> 
                                          <a href="<?= site_url('sale_reports/sale_person_details/'.$value->Per_id.'/'.$value->b_id ); ?>">  
                                            <?php echo $value->Per_name;?>
                                            </a>
                                        <?php }
                                        else
                                        {
                                            echo '';
                                        }
                                        $duplication = $value->b_id; 
                                      ?>
                                    <?php if($value->b_id == 0 ){ ?>    
                                        <a href="<?= site_url('sale_reports/sale_person_details/'.$value->Per_id.'/'.$value->s_id ); ?>"><!--<?= $value->Per_name ?>--></a>
                                    <?php }else{?>
                                        <a href="<?= site_url('sale_reports/sale_person_details/'.$value->Per_id.'/'.$value->b_id ); ?>"><!--<?= $value->Per_name ?>--></a>
                                        <?php }?>
                                    </td>
                                    <td>
                                       <?= $value->p_name;?> 
                                    </td>
                                    <td><?= $value->p_type ?></td>
                                    <td><?= $value->p_model ?></td>
                                    <td><?= $value->Per_license_no ?></td>
                                    <td><?= $value->s_weapon_no ?></td>
                                    <td><?= $value->s_quantity ?></td>
                                    <td><?= $value->s_price ?></td>
                                    <td><?= $value->s_total_price ?></td>
                                    <td><?= $value->p_price ?></td>
                                    <td><?= date('M-d-Y',strtotime($value->s_date)) ?></td>
                                    <td>
                                    <p style="color:red">Unpaid bills</p>
                                     </td>
                                </tr>
                                <?php
                                $total_all = $total_all+ $value->s_total_price;
                                $rates = $rates+$value->s_price;
                                $qnty = $qnty + $value->s_quantity; 
                                $pr_total = $pr_total + $value->p_price;
                                ?>
                            <?php $sno++; 
                              } ?>
                           <br>
                           </tbody>
                           <tr>
                           <td></td><td></td><td></td><td></td>
                           <td></td><td></td><td></td><td></td>
                                    <td>Total Qty:  <?= $qnty; ?></td>
                                    
                                    <td>Total: <?= $rates; ?> </td>
                                    <td>Total:   <?= $total_all; ?></td>
                                    <td>Total Purchase: <?= $pr_total?></td>
                           </tr>


<!-- ============================ End paid search Result ===========================-->  

                        <?php } if(empty($res_data) && empty($paid_bill_result) && empty($unpaid_bill_result) ){ ?>
                            <tr>
                            <td></td><td></td><td></td><td></td><td></td><td></td>
                                <td>
                                    No data
                                </td>
                            <td></td><td></td><td></td><td></td><td></td>    
                                <td></td>
                            </tr>
                           <?php }?>
                        </table>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.box -->
            </div>
        </div>

    </section>
</div>


                                                   
