<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
          <h1>
            SSClub Dashboard
            <small> <a href="<?= site_url()?>admin/">Home</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; <a href="<?= site_url()?>showroom/index">Showroom Section</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Add Product Form</small>
         </h1>
        </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h2 class="" style="text-align:center;">Add New Product</h2>
                        <a href="<?= site_url()?>admin/" class="pull-right"> Back</a>
                        <?php $this->load->view("include/alert"); ?>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" data-toggle="validator" action="<?= site_url()?>showroom/addproductpro" method="post">
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class="form-group has-feedback col-md-6">
                                    <label for="exampleInputEmail1">Product Name</label>
                                    <input type="text" name="name" id="product_name" class="form-control">
                                    
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                                <div class="form-group has-feedback col-md-6">
                                    <label for="exampleInputEmail1">Product Type</label>
                                    <input type="text" name="type" id="product_type" class="form-control" required/>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group has-feedback col-md-6">
                                    <label for="exampleInputEmail1">Product Model</label>
                                    <input type="text" name="model" id="product_model" class="form-control" required />
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                                <div class="form-group has-feedback col-md-6">
                                    <label for="exampleInputEmail1">Product Code</label>
                                    <input type="text" name="code" id="add_code" class="form-control" required/>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span id="p_code_error" class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer ">
                            <button type="submit" class="btn btn-primary pull-right add_prod_btn" style="margin-right:20px; ">Save</button>
                        </div>
                    </form>
                </div><!-- /.box -->
            </div><!-- /.box -->
        </div>
    </section>
</div>


