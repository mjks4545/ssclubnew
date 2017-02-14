  <style type="text/css">
.no_data td{
    border:0px solid!important;
  }
  
  </style>
  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            SSClub Dashboard
            <small> <a href="<?= site_url()?>admin/">Home</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; <a href="<?= site_url()?>ssshootingclub/index">Ssshootingclub Section</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; <a href="<?=  site_url()?>ssshootingclub/searchmemeber">Membership Search Form</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; Searched Member View</small>
         </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h2 style="text-align:center;">Searched Members</h2>
                  <?php $this->load->view('include/alert');?>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead> 
                      <tr>
                        <th>S.no</th>
                        <th>Name</th>
                        <th>License No</th>
                        <th>CNIC</th>
                        <th>Mobile</th>
                        <th>Payment</th>
                        <th>Membership</th>
                        <th>Card No</th>
                        <th style="width:10%;">Valid From</th>
                        <th style="width:10%;">Valid To</th>
                        <!-- <th>Renewal Due </th> -->
                        
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody>

                    <?php if(!empty($search_data)){
                      $total = 0;
                    $sno=1; foreach ($search_data as $value) {?>
                      <div> 
                        <tr>
                          <td><?php echo $sno ?></td>
                          <td>
                          <a href="<?= site_url('Ssshootingclub/member_detail/'.$value->per_id.'/'.$value->m_id)?>">  
                          <?= $value->Per_name?>
                          </a>
                          </td>
                          <td><?= $value->Per_license_no?></td>
                          <td><?= $value->Per_cnic?></td>
                          <td><?= $value->per_number?></td>
                          <td><?= $value->m_payment + $value->renewal;$total += $value->m_payment + $value->renewal; ?></td>
                          <td><?= $value->m_type?></td>
                          <td><?= $value->m_card_no?></td>
                          <td><?php echo date( 'M-d-Y', strtotime( $value->m_valid_from ) ); ?></td>
                          <td><?php echo date( 'M-d-Y', strtotime( $value->m_valid_to ) );  ?></td>
                          <!-- <td>X</td> -->
                          
                          <td style="width:10%;" ><!-- <a href="" class="">Action</a> -->
                            <input type="hidden" id="per_id" value="<?=  $value->per_id;?>">   
                             <!-- <a id="btnn_<?=$sno?>" href="//<?//= site_url('Ssshootingclub/member_detail/'.$value->per_id)?>" class="btn btn-xs btn-success btnn"style="display:none">View</a>  -->
                             <!-- <a href="<?//= site_url('Ssshootingclub/edit_membership/'.$value->per_id.'/'.$value->m_id)?>" class="btn btn-sm btn-info btn-block btnn"> Edit </a>-->   
                           <?php 
                            if( $value->m_valid_to < date('Y-m-d') ){?>
                                    <b style="color:red">Expired</b>
                            <?php }else if($value->m_status == 2){
                              echo '<b style="color:red">Blocked</b>';
                            }else if($value->m_status == 3){
                              echo '<b style="color:red">Canceld</b>';  
                            }
                              else{ ?>  <b style="color:green">Member</b>
                            <?php } ?>

                          </td> 
                        </tr>
                      </div>  
                           
                     <?php $sno++; } }else{ ?>
                     <tr class="no_data">
                       <td colspan="6">
                       </td>
                         <td>
                           <h4>No Data Found</h4>
                         </td>
                       <td colspan="6"></td>
                    </tr>
                     <?php }?>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th><?= $total; ?></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

             
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


