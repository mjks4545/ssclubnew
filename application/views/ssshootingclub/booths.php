
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
      SSClub Dashboard
      <small> <a href="<?= site_url()?>admin/">Home</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; <a href="<?= site_url()?>ssshootingclub/index">Ssshootingclub Section</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Booth Section &nbsp;&nbsp;&nbsp;</small>
        </h1>
        </section>
        
        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
          <?php foreach ($status_0 as $value) {?>
            <div class="col-lg-3 col-xs-3">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?= $value->bo_no?></h3>
                    <h4> </h4>    
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="javascript:void(0)" class="small-box-footer">Click for more info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <?php }?>

        <?php foreach ($status_1 as $value) { ?>
         <div class="col-lg-3 col-xs-3">
            
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?= $value->bo_no?></h3>
                  <h4><?= $value->Per_name?></h4>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="<?php echo base_url('Ssshootingclub/person_detail/'.$value->per_id.'/'.$value->m_id.'/'.$value->c_id);?>" class="small-box-footer">Click for more info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <?php }?>
           </div>
          


        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     