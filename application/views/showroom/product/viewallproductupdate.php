<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
          <h1>
            SSClub Dashboard
            <small> <a href="<?= site_url()?>admin/">Home</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; <a href="<?= site_url()?>showroom/index">Showroom Section</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Update Product Form</small>
         </h1>
        </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <?php //print_r($result);die();?>
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h2 class="" style="text-align:center;">Update Product</h2>
                        <a href="<?= site_url()?>admin/" class="pull-right"> Back</a>
                        <?php $this->load->view("include/alert"); ?>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" data-toggle="validator" action="<?= site_url()?>showroom/viewallproductupdatepro/<?=$result[0]['p_id']?>" method="post">
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class="form-group has-feedback col-md-6">
                                    <label for="exampleInputEmail1">Product Name</label>
                                    <select name="name" class="form-control" required>
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
                                <div class="form-group has-feedback col-md-6">
                                    <label for="exampleInputEmail1">Product Type</label>
                                    <input type="text" name="type" class="form-control" maxlength="50" minlength="1" value="<?=$result[0]['p_type'];?>"  placeholder="Enter Type" required/>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group has-feedback col-md-6">
                                    <label for="exampleInputEmail1">Product Model</label>
                                    <input type="text" name="model" maxlength="50"  class="form-control" value="<?=$result[0]['p_model'];?>" placeholder="Enter Model" required />
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                                <div class="form-group has-feedback col-md-6">
                                    <label for="exampleInputEmail1">Product Code</label>
                                    <input type="text" name="code"  maxlength="50"  class="form-control" value="<?=$result[0]['p_code'];?>" placeholder="Enter Code" required/>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <!-- <div class="form-group has-feedback col-md-6">
                                    <label for="exampleInputEmail1">Product Quantity</label>
                                    <input type="text" name="quantity"   pattern="(?=.*\d).{1,6}" class="form-control" id="exampleInputEmail1" placeholder="Enter Quantity" required />
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div> 
                                <div class="form-group has-feedback col-md-6">
                                    <label>Add product date</label>
                                    <input type="date"name="add_prod_date" class="form-control">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div> -->
                                <!--<div class="form-group has-feedback col-md-6">
                                    <label>Note</label>
                                    <textarea name="note" class="form-control" maxlength="250" minlength="1" style="resize: none;height:100px; "  placeholder="Write Some Words" required></textarea>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>-->
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer ">
                            <button type="submit" class="btn btn-primary pull-right" style="margin-right:20px; ">Update</button>
                        </div>
                    </form>
                </div><!-- /.box -->
            </div><!-- /.box -->
        </div>
    </section>
</div>


