  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            SSClub Dashboard
            <small> <a href="<?= site_url()?>admin/">Home</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; <a href="<?= site_url()?>showroom/index">showroom Section</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;  View All Product</small>
         </h1>
        </section>
       
        <!-- Main content -->
        <section class="content">

      <?php// print_r($result);die();?>
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h2 style="text-align:center;">View All Product</h2>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Model</th>
                        <th>Product code</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $sno=1;
                    foreach($result as $product) { ?>
                      <tr>
                      <td><?=$sno?></td>
                        <td><?=$product['p_name'];?></td>
                        <td><?=$product['p_type'];?></td>
                        <td><?=$product['p_model']?></td>
                        <td><?=$product['p_code']?></td>
                        <td><a href="<?=site_url()?>showroom/viewallproductupdate/<?=$product['p_id']?>" class="btn btn-success">Edit Product</a></td>
                      </tr>
                     <?php $sno++; } ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

             
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->