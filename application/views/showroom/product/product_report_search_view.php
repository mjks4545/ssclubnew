<style>
    td, th {
        text-align: center;
    }
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
          <h1>
            SSClub Dashboard
            <small> <a href="<?= site_url()?>admin/">Home</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; <a href="<?= site_url()?>showroom/index">Showroom Section</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<a href="<?=site_url()?>Purchase_reports/">Purchase Report Form</a>&nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Purchase Report Search View</small>
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
                        <h2 style="text-align:center;">Search details For Purchase</h2>
                        
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.no</th>
                                <th>Name</th>
                                <th>Product</th>
                                <th>Product Type</th>
                                <th>Weapon No</th>
                                <th>Status</th>
                                <th>Model</th>
                                <th>Quantity</th>
                                <th colspan="2">Price</th>
                                <th colspan="2">Sale Price</th>
                                <th style="width:7%;">Date</th> 
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                                if($s_result){
                                $sno=1;
                                $t_qnty = 0;
                                $t_price = 0;
                                $all_price = 0;
                                $sale_price = 0;
                                $total_sale = 0;
                                foreach($s_result as $v){?>
                                <tr>
                                <?php 
                                        $qty = $v->par_quantity;
                                        $price = $v->par_price;
                                        $sale_p = $v->sale_price;
                                 ?>
                                    <td><?php echo $sno; ?></td>
                                    <td>    <a href="<?= site_url('purchase_reports/single_purchase_details/'.$v->par_id)?>">
                                            <?php echo $v->Per_name; ?>
                                            </a>
                                    </td>
                                    <td><?php echo $v->p_name; ?></td>
                                    <td><?php echo $v->p_type; ?></td>
                                    <td><?php echo $v->par_weapon_no; ?></td>
                                    <td><?php echo $v->remarks; ?></td>
                                    <td><?php echo $v->p_model; ?></td>
                                    <td> 
                                    
                                    <a href="<?= site_url('Showroom/get_purchased_detail/'.$v->p_id.'/'.$v->Per_id.'/'.$v->par_date)?>">
                                    <?= $qty;?>
                                    </a>


                                    <?php $t_qnty = $t_qnty+$qty; ?>
                                    </td>
                                    <td><?php echo $price;
                                    $t_price = $t_price+$price; ?>
                                    </td>
                                    <td><?php echo $totl =( $qty * $price ); 
                                           $all_price = $all_price+$totl;  ?>
                                    </td>
                                    <td><?= $v->sale_price;
                                    $sale_price = $v->sale_price +$sale_price; ?>
                                    </td>
                                    <td><?php echo $total_s =($qty * $sale_p);
                                    $total_sale = $total_s+$total_sale;
                                    ?>
                                    </td>
                                    <td><?php echo $v->par_date;?></td>
                                </tr>
                            <?php $sno++; } ?>
                           <br>
                           
                           </tbody>
                           <tr>
                           <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                               <th>
                                   <?php echo $t_qnty;?> 
                               </th>
                               <th>
                                   <?= $t_price; ?>
                               </th>
                               <th>
                                   <?=  $all_price;?> 
                               </th>
                               <th>
                                  <?php echo $sale_price;?> 
                               </th>
                               <th>
                                  <?= $total_sale;?>  
                               </th>
                               <td></td>
                           </tr>
                          <?php } else{ ?>
                            <tr>
                            <td></td><td></td><td></td><td></td><td></td>
                                <td>
                                    No data
                                </td>
                            <td></td><td></td><td></td><td></td><td></td>    
                                <td></td>
                            </tr>
                            <?php } ?>
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


                                                   
