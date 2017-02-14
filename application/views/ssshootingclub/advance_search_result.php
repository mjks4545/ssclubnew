  <style type="text/css">
    .no_data td{
    border:0px solid!important;
  }
  @media print {
  a[href]:after {
    content: none !important;
  }
}
  </style>
  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            SSClub Dashboard
            <small> <a href="<?= site_url()?>admin/">Home</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; <a href="<?= site_url()?>ssshootingclub/index">Ssshootingclub Section</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; <a href="<?=  site_url()?>ssshootingclub/advancesearch">Advance Membership Search Form</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Advance Searched Member View</small>
         </h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h2 style="text-align:center;">Advance Search Result Data</h2>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>S.no</th>
                        <th>Reg#</th>
                        <th>Name</th>
                        <th>Cnic</th>
                        <th>License No:</th>
                        <th>Weapon</th>
                        <th>Fires</th>
                        <th>Person</th>
                        <th>Booth Changes</th>
                        <th>Date</th>
                        <th>Out Time</th>
                        <!-- <th>Person Type</th> -->
                      </tr>
                    </thead>
                    <tbody>
                      <?php $sno=1; 
                            $total_booth_charges = 0;
                            $total_no_person = 0;
                            $total_no_fire = 0;
                            if(isset($all_data_search)){
                            foreach ($all_data_search as $value) {?>
                      <tr>
                       <td><?= $sno?></td>
                       <td><?= $value->c_id?></td>
                       <td>
                          <a href="<?php echo site_url('Ssshootingclub/adv_search_member_detail/'.$value->Per_id.'/'.$value->c_id.'/'.$value->m_id);?>">
                              <?= $value->Per_name?></a>
                       </td>
                       <td><?= $value->Per_cnic?></td>
                       <td><?= $value->Per_license_no?></td>
                       <td><?= $value->m_w_type?></td> 
                       <td><?php if(isset($value->c_fire)){?><?= $value->c_fire;$total_no_fire += $value->c_fire; ?><?php }?></td>
                       <td><?php if(isset($value->no_persons)){?><?= $value->no_persons;$total_no_person += $value->no_persons; ?><?php }?></td>
                       <td><?php if(isset($value->range_charge)){?><?= $value->range_charge;$total_booth_charges += $value->range_charge; ?><?php }?></td>
                       <td><?php if(isset($value->c_arrival_date)){?><?php echo date('M-d-Y', strtotime( $value->c_arrival_date )); ?><?php }?> </td>
                       <td><?php if(isset($value->c_time_out)){?><?= str_replace( '%', ':', $value->c_time_out ) ?><?php }?></td>
                       <!-- <td>Member</td>  -->
                      </tr>
                     <?php $sno++; } } ?>
<!--/////////////////////  OTHER SEARCH PART/////////////////////////////////////////////-->                      
<!-- ///////////////////   ALL Data without search something ////////////////////////////-->
                      <?php $sno=1; 

                            if(isset($all_data)){
                            foreach ($all_data as $value) {?>
                      <tr>
                       <td><?= $sno?></td>
                       <td><?= $value->c_id?></td>
                       <td>
                       <!--<?//php echo '<pre>'; print_r($value) ?>-->
                          <a href="<?php echo site_url('Ssshootingclub/adv_search_member_detail/'.$value->Per_id.'/'.$value->c_id.'/'.$value->m_id);?>">
                              <?= $value->Per_name?></a>
                       </td>
                       <td><?= $value->Per_cnic?></td>
                       <td><?= $value->Per_license_no?></td>
                       <td><?= $value->m_w_type?></td> 
                       <td><?php if(isset($value->c_fire)){?><?= $value->c_fire;$total_no_fire += $value->c_fire;?><?php }?></td>
                       <td><?php if(isset($value->no_persons)){?><?= $value->no_persons;$total_no_person += $value->no_persons; ?><?php }?></td>
                       <td><?php if(isset($value->range_charge)){?><?= $value->range_charge;$total_booth_charges += $value->range_charge;?><?php }?></td>
                       <td><?php if(isset($value->c_arrival_date)){?><?php echo $value->c_arrival_date; ?><?php }?> </td>
                       <td><?php if(isset($value->c_time_out)){?><?= str_replace( '%', ':', $value->c_time_out ) ?><?php }?></td>
                       <!-- <td>Member</td>  -->
                      </tr>
                     <?php $sno++; } } ?>
                     
<!-- ////////////////////////////////////////////////////////////////////////////////////--> 
                    <?php if(isset($booth_with_date)) 
                     { 
                      $sno = 1;
                          foreach ($booth_with_date as $value) {?>
                      <tr>
                       <td><?= $sno?></td>
                       <td><?= $value->c_id?></td>
                       <td>
                          <?php if(isset($value->per_id)){?>
                          <a href="<?php echo site_url('Ssshootingclub/adv_search_member_detail/'.$value->per_id.'/'.$value->c_id.'/'.$value->m_id);?>">
                              <?= $value->Per_name?>
                          </a>
                          <?php } else { ?>
                          <a href="<?php echo site_url('Ssshootingclub/adv_search_member_detail/'.$value->Per_id.'/'.$value->c_id.'/'.$value->m_id);?>">
                              <?= $value->Per_name?>
                          </a>
                          <?php }?>
                       </td>
                       <td><?= $value->Per_cnic?></td>
                       <td><?= $value->Per_license_no?></td>
                       <td><?= $value->m_w_type?></td> 
                       <td><?php if(isset($value->c_fire)){?><?= $value->c_fire;$total_no_fire += $value->c_fire;?><?php }?></td>
                       <td><?php if(isset($value->no_persons)){?><?= $value->no_persons;$total_no_person += $value->no_persons;?><?php }?></td>
                       <td><?php if(isset($value->range_charge)){?><?= $value->range_charge;$total_booth_charges += $value->range_charge;?><?php }?></td>
                       <td><?php if(isset($value->c_arrival_date)){?><?php echo date('M-d-Y', strtotime( $value->c_arrival_date ));?><?php }?> </td>
                       <td><?php if(isset($value->c_time_out)){?><?= str_replace( '%', ':', $value->c_time_out ); ?><?php }?></td>
                       <!-- <td>Member</td>  -->
                      </tr>
                     <?php $sno++;} } ?>

<!-- ============================= Data without Membership =======================-->
                  <?php if(isset($data5)) 
                     { 
                      $sno = 1;
                          foreach ($data5 as $value) {?>
                      <tr>
                       <td><?= $sno?></td>
                       <td><?= $value->c_id?></td>
                       <td>
                          <?php if(isset($value->per_id)){?>
                          <a href="<?php echo site_url('Ssshootingclub/adv_search_member_detail/'.$value->per_id.'/'.$value->c_id.'/'.$value->m_id);?>">
                              <?= $value->Per_name?>
                          </a>
                          <?php } else { ?>
                          <a href="<?php echo site_url('Ssshootingclub/adv_search_member_detail/'.$value->Per_id.'/'.$value->c_id.'/'.$value->m_id);?>">
                              <?= $value->Per_name?>
                          </a>
                          <?php }?>
                       </td>
                       <td><?= $value->Per_cnic?></td>
                       <td><?= $value->Per_license_no?></td>
                       <td><?= $value->m_w_type?></td> 
                       <td><?php if(isset($value->c_fire)){?><?= $value->c_fire;$total_no_fire += $value->c_fire;?><?php }?></td>
                       <td><?php if(isset($value->no_persons)){?><?= $value->no_persons;$total_no_person += $value->no_persons;?><?php }?></td>
                       <td><?php if(isset($value->range_charge)){?><?= $value->range_charge;$total_booth_charges += $value->range_charge;?><?php }?></td>
                       <td><?php if(isset($value->c_arrival_date)){?><?php echo date('M-d-Y', strtotime( $value->c_arrival_date ));?><?php }?> </td>
                       <td><?php if(isset($value->c_time_out)){?><?= str_replace( '%', ':', $value->c_time_out ); ?><?php }?></td>
                       <!-- <td>Guest</td> -->
                      </tr>
                     <?php $sno++;} } ?>                     
                     
<!--/ ////////////////////// OTHER SEARCH DATA ROW START/////////////////////////-->

                     <?php if(isset($search_by_date)) { 
                          $sno = 1;
                          foreach ($search_by_date as $value) {?>
                      <tr>
                       <td><?= $sno?></td>
                       <td><?= $value->c_id?></td>
                       <td>
                          <?php if(isset($value->per_id)){?>
                          <a href="<?php echo site_url('Ssshootingclub/adv_search_member_detail/'.$value->per_id.'/'.$value->c_id.'/'.$value->m_id);?>">
                              <?= $value->Per_name?>
                          </a>
                          <?php } else { ?>
                          <a href="<?php echo site_url('Ssshootingclub/adv_search_member_detail/'.$value->Per_id.'/'.$value->c_id.'/'.$value->m_id);?>">
                              <?= $value->Per_name?>
                          </a>
                          <?php }?>
                       </td>
                       <td><?= $value->Per_cnic?></td>
                       <td><?= $value->Per_license_no?></td>
                       <td><?= $value->m_w_type?></td> 
                       <td><?php if(isset($value->c_fire)){?><?= $value->c_fire;$total_no_fire += $value->c_fire;?><?php }?></td>
                       <td><?php if(isset($value->no_persons)){?><?= $value->no_persons;$total_no_person += $value->no_persons;?><?php }?></td>
                       <td><?php if(isset($value->range_charge)){?><?= $value->range_charge;$total_booth_charges += $value->range_charge;?><?php }?></td>
                       <td><?php if(isset($value->c_arrival_date)){?><?php echo date('M-d-Y', strtotime( $value->c_arrival_date ));?><?php }?> </td>
                       <td><?php if(isset($value->c_time_out)){?><?= str_replace( '%', ':', $value->c_time_out )?><?php }?></td>
                      <!-- <td>Member</td> -->
                      </tr>
                     <?php $sno++;} }else{ ?>
<!--/ ////////////////////// OTHER SEARCH DATA ROW START/////////////////////////-->
                   <!--  <tr class="no_data">
                         <td></td><td></td><td></td><td></td><td></td><td></td>
                           <td>
                             <h4>No Data Found</h4>
                           </td>
                         <td></td><td></td><td></td><td></td><td></td><td></td>
                     </tr> -->
                      <?php }?>
                      <tfoot>
                          <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th><?= $total_no_fire; ?></th>
                            <th><?= $total_no_person; ?></th>
                            <th><?= $total_booth_charges ?></th>
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