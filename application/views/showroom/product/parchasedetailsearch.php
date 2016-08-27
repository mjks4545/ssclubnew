
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            SHOWROOM
            <small> <a href="<?= site_url()?>showroom/">Home</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; Ssshootingclub Section</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h2 style="text-align:center;">Product Purchase</h2>
                        <a href="<?= site_url()?>parchaseproduct/" class="pull-right"> Back</a>
                        <?php $this->load->view("include/alert"); ?>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                      <div class="row text-center">
                        <div class="badge bg-black">
                           <h3 style=" "> Purchase</h3>
                        </div>
                          <hr/>
                      </div>
                        <div class="col-md-6 col-xs-offset-3">
                                <form role="form" data-toggle="validator" action="<?= site_url()?>showroom/addproductpro" method="post">
                                <div class="form-group has-feedback">
                                    <label for="exampleInputEmail1">Product Name</label>
                                    <select name="name" id="name" class="form-control" required>
                                        <option selected="selected"  value="">--Select Option--</option>
                                        <option value="Acessories">Acessories</option>
                                        <option value="Ammunition">Ammunition</option>
                                        <option value="Pistol">Pistol</option>
                                        <option value="Rifle">Rifle</option>
                                        <option value="Shortgun">Shortgun</option>
                                        <option value="Air Rifle">Air Rifle</option>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                                 <!-- for product type or model-->
                                    <div class="form-group has-feedback">
                                        <label for="exampleInputEmail1">Product Type Or Model</label>
                                        <input type="text" name="name" id="" class="form-control" required/>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                        <span class="help-block with-errors" style="margin-left:10px; "></span>
                                    </div>
                                    <!-- for product Prd Code-->
                                    <div class="form-group has-feedback">
                                        <label for="exampleInputEmail1">Prd Code</label>
                                        <input type="text" name="name" id="" class="form-control" required/>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                        <span class="help-block with-errors" style="margin-left:10px; "></span>
                                    </div>
                                    <!-- for product Weapon Number-->
                                    <div class="form-group has-feedback">
                                        <label for="exampleInputEmail1">Weapon Number</label>
                                        <input type="text" name="name" id="" class="form-control" required/>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                        <span class="help-block with-errors" style="margin-left:10px; "></span>
                                    </div>
                                 </form>
                            </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.box -->
        </div>
    </section>
</div>


