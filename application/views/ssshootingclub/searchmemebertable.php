  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Tables
            <small>advanced tables</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Search Members</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Members Search</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>S.no</th>
                        <th>Name</th>
                        <th>Cnic</th>
                        <th>License No:</th>
                        <th>Mobile</th>
                        <th>Payment</th>
                        <th>Membership</th>
                        <th>Card No</th>
                        <th>Valid From</th>
                        <th>Valid To</th>
                        <th>Renewal Due </th>
                        <!-- th>Reason</th>
                        <th>Remarks</th> -->
                      </tr>
                    </thead>
                    <tbody>
                    <?php $c_date=date('Y-m-d'); $sno=1; $total_pay = 0; foreach ($search_all_data as $value) {?>
                      <tr>
                        <td><?php echo $sno?></td>
                        <td>
                          <a href="<?= site_url('Ssshootingclub/member_detail/'.$value->Per_id)?>">
                            <?= $value->Per_name?>
                            </a>
                          </td>
                        <td><?= $value->Per_cnic?></td>
                        <td> <?= $value->Per_license_no?></td>
                        <td><?= $value->Per_number?></td>
                        <td><?= $value->m_payment?></td>
                        <td><?= $value->m_type?></td>
                        <td><?= $value->m_card_no?></td>
                        <td><?= $value->m_valid_from?></td>
                        <td><?= $value->m_valid_to?></td>
                        <td>
                            <?php if($c_date < $value->m_valid_to) {
                                echo '<b style="color:green"> Member </b>';
                              }else{
                               echo '<b style="color:red"> Expired </b>';
                                } ?>

                        </td>
                        <!-- <td>X</td> -->
                      </tr>
                      <?php $total_pay = $value->m_payment + $total_pay; ?>
                     <?php $sno++; }?>
                    </tbody>
                    <tr>
                      <td></td><td></td><td></td><td></td><td></td>
                      <td>
                        <?=$total_pay?>
                      </td>
                      <td></td><td></td><td></td><td></td><td></td>
                    </tr>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

             
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->