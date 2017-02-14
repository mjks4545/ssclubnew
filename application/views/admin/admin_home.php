
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            SSClub Dashboard
            <small>Home</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                    <?php $this->load->view('include/alert'); ?>
                </div><!-- /.box-header -->
                <div class="row">
                    <div class="col-lg-1 col-xs-4"></div>
                    <div class="col-lg-5 col-xs-6">
                      <!-- small box -->
                     <a href="<?= site_url()?>ssshootingclub/index" style="color:#fff"> 
                      <div class="small-box bg-aqua">
                      <br>
                        <div class="inner">
                          <h3>SS Shooting CLub</h3>
                          <p>Click Below to Enter</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                        </div>
                        <a href="<?= site_url()?>ssshootingclub/index" class="small-box-footer">
                          Click here  <i class="fa fa-arrow-circle-right"></i>
                        </a>
                      </div>
                    </div><!-- ./col -->
                   <div class="col-lg-5 col-xs-6">
                      <!-- small box -->
                      <a href="<?= site_url()?>showroom/index" style="color:#fff">
                      <div class="small-box bg-green">
                      <br>
                        <div class="inner">
                          <h3>ShowRoom</h3>
                          <p>Click Below to Enter</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-male" aria-hidden="true"></i>
                        </div>
                          <a href="<?= site_url()?>showroom/index" class="small-box-footer">
                          Click here  <i class="fa fa-arrow-circle-right"></i>
                        </a>
                      </div>
                    </div><!-- ./col -->
                    <div class="col-lg-1 col-xs-4"></div>
                 </div><!-- /.row -->
                  </div>
                </div><!-- /.box -->
              </div>
            
        </section>
    </div>
              

