<style>
    .course{
        margin-top: 10px;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
	SSClub Dashboard
	<small> <a href="<?= site_url()?>admin/">Home</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; <a href="<?= site_url()?>ssshootingclub/index">Ssshootingclub Section</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; Check In</small>
      </h1>
    </section>
    <!-- Main content -->
    <?php $this->load->view('include/alert')?>
    <section class="content">
      <div class="row">
	<!-- left column -->
	<div class="col-md-12">
	    <!-- general form elements -->
	    <div class="box box-primary">
		<div class="box-header with-border">
		  <h2 class="box-title text-primary ">Step-I</h2>

		  <a href="<?= site_url()?>ssshootingclub/index" class="btn btn-primary pull-right"> Back</a>
		  <h2  style="text-align:center;">Check In</h2>
		</div><!-- /.box-header -->
		<!-- form start -->
		<form role="form" data-toggle="validator" action="<?= site_url()?>ssshootingclub/checkmember" method="post">
		    <div class="box-body">
			<div class="col-md-12">
			    <div class="col-md-3"></div>
			    <div class="form-group has-feedback col-md-6">
			      <label for="idcnic">Cnic OR Card Number</label>
			      <input type="text" name="cnic_cardno" class="form-control"   id="idcnic" placeholder="Enter Cnic or Card Number" />
			       <input type="hidden" name="checkin_id">
			    </div>
			</div>               
		    </div><!-- /.box-body -->
		    <div class="box-footer">
		      <button type="submit" class="btn btn-primary col-sm-1 pull-right ">Next  <div class="fa fa-angle-double-right"></div></button>
		    </div>
		</form>
	    </div><!-- /.box -->
	</div>
      </div>
    </section>
</div>
              