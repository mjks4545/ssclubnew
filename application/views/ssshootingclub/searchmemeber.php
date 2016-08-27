<div class="content-wrapper">
        <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
            SSClub Dashboard
            <small> <a href="<?= site_url()?>admin/">Home</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; <a href="<?= site_url()?>ssshootingclub/index">Ssshootingclub Section</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; Membership Search Form &nbsp;&nbsp;&nbsp;</small>
        </h1>
        </section>

        <!-- Main content -->
        <section class="content">
         <!-- SELECT2 EXAMPLE -->
          <div class="box box-default">
            <div class="box-header with-border">
              <h2 style="text-align:center;">Membership Search</h2>
            </div><!-- /.box-header -->
            <div class="box-body">
			  <div class="box-header">
              <a href="<?= site_url()?>Ssshootingclub/searchallmember/" type="button" name="button" class="btn btn-default" value="">Show All Numbers</a>
              </div>
          <form method="post" action="<?= site_url()?>Ssshootingclub/searchmembertable2/">
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6 col-xs-offset-3">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" id="name" class="form-control" style="width: 100%;">
                  </div><!-- /.form-group -->
                </div><!-- /.col -->
				<div class="col-md-6 col-sm-6 col-xs-6 col-xs-offset-3">
                  <div class="form-group">
                    <label>Cnic No</label>
                    <input type="text" name="cnic_no" id="idcnic" class="form-control" style="width: 100%;">
                  </div><!-- /.form-group -->
                </div>
				<div class="col-md-6 col-sm-6 col-xs-6 col-xs-offset-3">
                  <div class="form-group">
                    <label>Card No</label>
                    <input type="text" name="card_no" id="card_no" class="form-control" style="width: 100%;">
                  </div><!-- /.form-group -->
                 </div>
				<div class="col-md-6 col-sm-6 col-xs-6 col-xs-offset-3">
                  <div class="form-group">
                    <label>Membership</label>
                    <select name="member_type" class="form-control" style="width: 100%;">
          						<option value="">Select Membership</option>
          						<option value="gold">Gold</option>
          						<option value="silver">silver</option>
                      <option value="walkin">Walkin</option>
        					</select>
                  </div><!-- /.form-group -->
                </div>
				<div class="col-md-6 col-sm-6 col-xs-6 col-xs-offset-3">
                  <div class="form-group">
                    <label>Mobile</label>
                    <input type="text" name="mobile" id="mobile" class="form-control" style="width: 100%;">
                  </div><!-- /.form-group -->
                </div>
				<div class="col-md-6 col-sm-6 col-xs-6 col-xs-offset-3">
                  <div class="form-group">
                    <label>License No</label>
                    <input type="text" name="license_no" id="license_no" class="form-control" style="width: 100%;">
                   </div><!-- /.form-group -->
                </div>
 				<div class="col-md-6 col-sm-6 col-xs-6 col-xs-offset-3">
                  <!-- <div class="form-group">
                    <label>Show All Members</label>
                    <a href="<?= site_url()?>Ssshootingclub/searchmemebertable/" type="button" name="license_no" class="btn btn-success" style="width: 100%;background-color: #d0d0d0;border:0px">Show All Members</a>
                  </div> -->
        </div> 
				<div class="col-md-6 col-sm-6 col-xs-6 col-xs-offset-3">
                  <div class="form-group">
                    <input type="submit" value="Search" class="btn btn-info" style="width: 100%;">  
                  </div><!-- /.form-group -->
        </div>

				
              </div><!-- /.row -->
            </div><!-- /.box-body -->
           
          </div><!-- /.box -->
          </form>
       </section><!-- /.content -->
      </div><!-- /.content-wrapper -->