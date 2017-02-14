<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
          <h1>
            SSclub Dashboard
            <small> <a href="<?= site_url()?>admin/">Home</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; <a href="<?= site_url()?>showroom/index">Showroom Section</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Sale Product</small>
         </h1>
        </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h2 style="text-align:center;">Sale Products</h2>
                        <a href="<?= site_url()?>showroom/" class="pull-right"> Back</a>
                        <?php $this->load->view("include/alert"); ?>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class="col-md-6 col-xs-offset-3">
                                    <form role="form"  action="<?php echo site_url() ?>sale/search_by_nic" method="post">
                                        <div class="form-group has-feedback">
                                            <label for="exampleInputEmail1">Enter NIC Number</label>
                                            <input name="nic_no" id="nic_search_sale" class="form-control" required maxlength="50"/>
                                            
                                        </div>
                                         <button type="submit" class="btn btn-success pull-right">
                                             <i class="fa fa-search" aria-hidden="true"></i>
                                             Search
                                         </button>
                                    </form>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.box -->
        </div>
    </section>
</div>