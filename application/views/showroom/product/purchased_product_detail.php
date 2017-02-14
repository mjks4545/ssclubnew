<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
          <h1>
            SSClub Dashboard
            <small> <a href="<?= site_url()?>admin/">Home</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; <a href="<?= site_url()?>showroom/index">Showroom Section</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;View Product Form</small>
         </h1>
        </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h2 style="text-align:center;">Weapon Numbers</h2>
                        <a href="<?= site_url()?>showroom/" class="pull-right"> Back</a>
                        <?php $this->load->view("include/alert"); ?>
                    </div><!-- /.box-header -->
                    
                    <div class="box-body">
                        <table id="example" style="width:50%;" align="center" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.no</th>
                                <th>Product Name</th>
                                <th>Product Type</th>
                                <th>Product Model</th>
                                <th>Weapon No</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $sno = 1; foreach ($result as $value) { ?>
                              <tr>
                                  <td><?=$sno;?></td>
                                  <td><?= $value->p_name?></td>
                                  <td><?= $value->p_type?></td>
                                  <td><?= $value->p_model?></td>
                                  <td><?php 
                                  if($value->par_weapon_no){
                                    echo $value->par_weapon_no;
                                    }else{
                                      echo $value->qnty;
                                      }?>

                                  </td>
                              </tr> 
                             <?php $sno++; }?>  
                            </tbody>
                        </table>
                </div>                    
                </div>
            </div> 
        </div> 
    </section>              