<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Advanced Membership Search
            <small></small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
         <!-- SELECT2 EXAMPLE -->
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Advance Search</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
			<div class="box-header">
              <a href="<?= site_url()?>Ssshootingclub/advance_all_members_search/" class="btn btn-default">Show All Members</a>
              </div>
              <form method="post" action="<?= site_url()?>Ssshootingclub/advance_search_full/">
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6 col-xs-offset-3">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="adv_name" class="form-control" style="width: 100%;">
                  </div><!-- /.form-group -->
                </div><!-- /.col -->
				<div class="col-md-6 col-sm-6 col-xs-6 col-xs-offset-3">
                  <div class="form-group">
                    <label>Reg No</label>
                    <input type="text" name="adv_reg_no" class="form-control" style="width: 100%;">
                  </div><!-- /.form-group -->
                </div>
				<div class="col-md-6 col-sm-6 col-xs-6 col-xs-offset-3">
                  <div class="form-group">
                    <label>Mobile No</label>
                    <input type="text" name="adv_mobile_no" class="form-control" style="width: 100%;">
                  </div><!-- /.form-group -->
                 </div>
				<div class="col-md-6 col-sm-6 col-xs-6 col-xs-offset-3">
                  <div class="form-group">
                    <label>Card No</label>
                    <input type="text" name="adv_card_no" class="form-control" style="width: 100%;">
                  </div><!-- /.form-group -->
                 </div>
				 <div class="col-md-6 col-sm-6 col-xs-6 col-xs-offset-3">
                  <div class="form-group">
                    <label>Nic</label>
                    <input type="text" name="adv_nic" class="form-control" style="width: 100%;">
                  </div><!-- /.form-group -->
                 </div>
				 <div class="col-md-6 col-sm-6 col-xs-6 col-xs-offset-3">
                  <div class="form-group">
                    <label>Guest Nic</label>
                    <input type="text" name="adv_g_nic" class="form-control" style="width: 100%;">
                  </div><!-- /.form-group -->
                 </div>
				 <div class="col-md-6 col-sm-6 col-xs-6 col-xs-offset-3">
                  <div class="form-group">
                    <label>Booth No</label>
                    <input type="text" name="adv_booth_no" class="form-control" style="width: 100%;">
                  </div><!-- /.form-group -->
                 </div>
				<div class="col-md-6 col-sm-6 col-xs-6 col-xs-offset-3">
                  <div class="form-group">
                    <label>Membership</label>
          <select name="adv_member_type" class="form-control" style="width: 100%;">
						<option value="">Select Membership</option>
						<option value="Gold">Gold</option>
						<option value="Silver">silver</option>
            <option value="Platinum">Platinum</option>
            <option value="walkin">Walkin</option>
					</select>
                  </div><!-- /.form-group -->
                </div>
				<div class="col-md-6 col-sm-6 col-xs-6 col-xs-offset-3">
                  <div class="form-group">
                    <label>Weapon</label>
          <select name="adv_weapon" class="form-control" style="width: 100%;">
						<option value="">Select Weapon</option>
						<option value="self">SELF</option>
						<option value="club">CLUB</option>
					</select>
                  </div><!-- /.form-group -->
                </div>
				<div class="col-md-6 col-sm-6 col-xs-6 col-xs-offset-3">
                  <div class="form-group">
                    <label>Weapon Name/No</label>
                    <input type="text" name="adv_weapon_no" class="form-control" style="width: 100%;">
                  </div><!-- /.form-group -->
                </div>
				<div class="col-md-6 col-sm-6 col-xs-6 col-xs-offset-3">
                  <div class="form-group">
                    <label>From</label>
                    <input type="date" name="adv_from" class="form-control" style="width: 100%;">
                   </div><!-- /.form-group -->
                </div>
				<div class="col-md-6 col-sm-6 col-xs-6 col-xs-offset-3">
                  <div class="form-group">
                    <label>To</label>
                    <input type="date" name="adv_to" class="form-control" style="width: 100%;">
                   </div><!-- /.form-group -->
                </div>

				<div class="col-md-6 col-sm-6 col-xs-6 col-xs-offset-3">
                  <div class="form-group">
                    <input type="submit" value="Search" class="btn btn-info" style="width: 100%;">
                      
                  </div><!-- /.form-group -->
                </div>
				
              </div><!-- /.row -->
            </form>
            </div><!-- /.box-body -->
           
          </div><!-- /.box -->
       </section><!-- /.content -->
      </div><!-- /.content-wrapper -->