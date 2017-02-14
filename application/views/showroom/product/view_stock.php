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
            <small> <a href="<?= site_url()?>admin/">Home</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; <a href="<?= site_url()?>showroom/index">Showroom Section</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; <a href="<?=  site_url()?>showroom/viewproduct">View Product Form</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;View Searched Product Details</small>
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
                        <h2 style="text-align:center;">Search Result For Stock</h2>
                        
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.no</th>
                                <th>Product Name</th>
                                <th>Product Type</th>
                                <th>Product Model</th>
                                <th>Product Code</th>
                                <th>Status</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Sale Price</th>
                                <th>Total P Price</th>
                                <th>Total S Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if($result)
                            {
                               $total_qnty=0;     
                            $sno =1; $total_p =0; $total_s=0; foreach ($result as $key => $value) { ?>
                                <tr>
                                    <?php $prod_code = $value->p_code;?>
                                    <td><?= $sno; ?></td>
                                    <td><?= $value->p_name; ?></td>
                                    <td><?= $value->p_type; ?></td>
                                    <td><?= $value->p_model; ?></td>
                                    <td><?= $value->p_code; ?></td>
                                    <td><?= $value->remarks;?></td>
                                    <td>
                                      <a href="<?= site_url('Showroom/get_stock_detail/' . $value->p_id . '/' . $value->par_price . '/' . $value->sale_price);?>"> <?=$value->p_quantity;?></a>
                                    </td>
                                    <td><?= $value->par_price;?></td>
                                    <td><?= $value->sale_price;?></td>
                                    <td><?php echo $total_p_pr = $value->p_quantity * $value->par_price; ?></td>
                                    <td><?php echo $total_s_pr = $value->p_quantity * $value->sale_price; ?></td>
                                </tr>
                                <?php $total_p = $total_p + $total_p_pr;
                                      $total_s = $total_s + $total_s_pr;
                                    $total_qnty = $total_qnty + $value->p_quantity;
                                  ?>
                                <?php $sno++; }?>
                           <br>
                           </tbody>
                           <tr>
                           <td></td><td></td><td></td><td></td>
                           <td></td><td></td>
                           <td>
                               <?php echo $total_qnty;?>
                           </td>
                           <td></td><td></td>
                                      
                                    <td><?= $total_p;?> </td>
                                    <td><?= $total_s;?>  </td>
                                    
                           </tr>
                           <?php }else{ ?>
                            <tr>
                            <td></td><td></td><td></td><td></td><td></td>
                                <td>
                                    No data
                                </td>
                            <td></td><td></td><td></td>  
                                <td></td><td></td>
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


                                                   
