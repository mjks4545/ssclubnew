
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
          <h1>
            SSClub Dashboard
            <small> <a href="<?= site_url()?>admin/">Home</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; <a href="<?= site_url()?>showroom/index">Showroom Section</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Purchase New Product Form</small>
         </h1>
        </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h2 style="text-align:center;">  Purchase Product </h2>
                        <a href="<?= site_url()?>showroom/" class="pull-right"> Back</a>
                        <?php $this->load->view("include/alert"); ?>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class="col-md-6 col-xs-offset-3">
                                    <form role="form" data-toggle="val idator" action="<?php echo site_url() ?>showroom/parchasedetailsearch" method="post">
                                        <div class="form-group has-feedback">
                                            <label for="exampleInputEmail1">Name</label>
                                            <input name="company_name" id="purchase_name_search" class="form-control" />
                                            <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                            <span class="help-block with-errors" style="margin-left:10px; "></span>
                                        </div>
                                        <div class="form-group has-feedback">
                                            <label for="exampleInputEmail1">CNIC</label>
                                            <input name="cnic" id="purchase_cnic_search" class="form-control" />
                                            <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                            <span class="help-block with-errors" style="margin-left:10px; "></span>
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


