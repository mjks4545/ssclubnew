<style>
    td, th {
        text-align: center;
    }
    th{
        width:20%;
        height: 45px;
        line-height: 40px!important;
    }
    td{
        width: 28%;
        height: 45px;
        line-height: 40px!important;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            SSClub Dashboard
            <small>
            <a href="<?= site_url('admin/index');?>">Home</a>
            <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
            
            <a href="<?= site_url('showroom/index');?>">Showroom</a>
            <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
            <a href="<?= site_url('Purchase_reports');?>">Search Purchase Report</a>
            <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
            <span>Report Details</span>
            </small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-10 col-md-offset-1">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <?php //$this->load->view('include/alert'); ?>
                        <h2  style="text-align:center;">Purchase Result For: <span style="color:#ccc;">   <?= $detail[0]->Per_name;?></span> </h2>
               

                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <td><?= $detail[0]->Per_name;?></td>
                                <th>NIC</th>
                                <td><?= $detail[0]->Per_cnic;?></td>
                             </tr>
                             <tr>   
                                <th>Address</th>
                                <td><?= $detail[0]->Per_address;?></td>
                                <th>Phone</th>
                                <td><?= $detail[0]->Per_number;?></td>
                              </tr> 
                              <tr> 
                                <th>Product</th>
                                <td><?= $detail[0]->p_name;?></td>
                                <th>Product Type</th>
                                <td><?= $detail[0]->p_type;?></td>
                               </tr> 
                               <tr>
                                <th>Product Model</th>
                                <td><?= $detail[0]->p_model;?></td>
                                <th>Weapon No</th>
                                <td><?= $detail[0]->par_weapon_no;?></td>
                                </tr>
                                <tr>
                                <th>License No</th>
                                <td><?= $detail[0]->Per_license_no;?></td>
                                <th>Plan</th>
                                <td><?= $detail[0]->purchase_from;?></td>
                                </tr>
                                <tr>
                                <th>Date</th>
                                <td><?php echo date('M-d-Y', strtotime( $detail[0]->par_date )) ;?></td>
                                <th>Quantity</th>
                                <td><?= $detail[0]->p_quantity;?></td>
                                </tr>
                                <tr>
                                <th>Price</th>
                                <td><?= $detail[0]->par_price;?></td>
                                <th>Sale Price</th>
                                <td><?= $detail[0]->sale_price;?></td>
                                </tr>
                            </thead>
                             </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.box -->
        </div>

    </section>
</div>

