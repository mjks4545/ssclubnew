  <style type="text/css">
.no_data td{
    border:0px solid!important;
  }
  </style>
  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Member Details
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo site_url()?>admin"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= site_url()?>Ssshootingclub/searchmemeber/">Tables</a></li>
            <li class="active">searchmemebers</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Member Details</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <!-- <th>S.no</th>
                        <th>Name</th>
                        <th>License No</th>
                        <th>CNIC</th> -->
                        
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($member_details as $value) {?>

                        <div class="row">
                         <div class="col-md-5"></div>
                         <div class="col-md-4">
                           <img src="<?= site_url()?>public/img/pic.jpg" width="200" class="img-circle">
                          </div>
                        </div>
                        <br>
                        <tr>
                          <td><b>Name:</b></td>
                          <td><?= $value->Per_name?></td>
                          <td><b>Father Name:</b></td>
                          <td><?= $value->Per_f_name?></td>
                        </tr>
                        <tr>
                          <td><b>CNIC:</b></td>
                          <td><?= $value->Per_cnic?></td>
                          <td><b>Date of Birth:</b></td>
                          <td><?= $value->m_date_of_birth?></td>
                        </tr>
                         <tr>
                          <td><b>Mobile:</b></td>
                          <td><?= $value->Per_number?></td>
                          <td><b>Address:</b></td>
                          <td><?= $value->Per_address?></td>
                        </tr>
                        <tr>
                          <td><b>Card No:</b></td>
                          <td><?=$value->m_card_no ?></td>
                          <td><b>Membership:</b></td>
                          <td><?= $value->m_type?></td>
                        </tr>
                        <tr>
                          <td><b>License No:</b></td>
                          <td><?=$value->Per_license_no ?></td>
                          <td><b>Valid From:</b></td>
                          <td><?= $value->m_valid_from?></td>
                        </tr>
                        <tr>
                          <td><b>Valid To:</b></td>
                          <td><?=$value->m_valid_to ?></td>
                          <td><b>Fee Schedule:</b></td>
                          <td><?= $value->m_f_shadule?></td>
                        </tr>
                        <tr>
                          <td><b>Payment:</b></td>
                          <td><?=$value->m_valid_to ?></td>
                          <td><b>Weapon Name/No:</b></td>
                          <td><?= $value->m_payment?></td>
                        </tr>
                        <tr>
                          <td><b>Payment:</b></td>
                          <td><?=$value->m_valid_to ?></td>
                          <td><b>Fee Schedule:</b></td>
                          <td><?= $value->m_payment?></td>
                        </tr>
                        <?php }?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

             
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


      <script type="text/javascript">
   $(document).ready(function () {
    $(".actionbtn").mouseenter(function(){
        $(".btnn").fadeIn(500);
    });
    $(".actionbtn").mouseleave(function(){
      $(".btnn").hide(); 
    });
});
      </script>