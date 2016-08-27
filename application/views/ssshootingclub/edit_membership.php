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
	    <small> <a href="<?= site_url()?>admin/">Home</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; <a href="<?= site_url()?>ssshootingclub/index">Ssshootingclub Section</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; <a href="<?=  site_url()?>ssshootingclub/checkin_search">Check In</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; Check In Form</small>
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
                  <!--<h2 class="box-title text-primary ">Step-I</h2>-->
                  <a href="<?= site_url()?>ssshootingclub/checkin_search"class="pull-right"> Back</a>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" data-toggle="validator" action="<?= site_url()?>ssshootingclub/update_membership_record" method="post" enctype="multipart/form-data">
          <div class="box-body">
			<div class="col-md-12">
				<div class="form-group has-feedback col-md-6">
				  <label for="exampleInputEmail1">Name</label>
				  <input type="text" name="name" class="form-control" maxlength="50" minlength="3" value="<?= $persondata[0]->Per_name;?>" placeholder="Enter Name" required/>
				  <input type="hidden" name="update_id" class="form-control" value="<?= $this->uri->segment(3);?>"/>
				   <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
				   <span class="help-block with-errors" style="margin-left:10px; "></span>
			  </div>
			  <div class="form-group has-feedback col-md-6">
				  <label for="exampleInputEmail1">Father Name</label>
				  <input type="text" name="father_name" class="form-control" maxlength="50" minlength="3" value="<?=$persondata[0]->Per_f_name;?>" placeholder="Enter Father Name Like Baba Jan" required/>
				   <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
				   <span class="help-block with-errors" style="margin-left:10px; "></span>
			  </div>
			</div>
            <div class="col-md-12">
			<div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">NIC NO</label>
			    <input type="text" name="n_no" class="form-control" maxlength="50" minlength="3" value="<?=$persondata[0]->Per_cnic;?>" placeholder="Enter ID Card number" required/>
			    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
			    <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
			<div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">Date Of Birth</label>
			    <input type="text" name="d_o_birth" class="form-control" maxlength="50" minlength="3" value="<?= $persondata[0]->m_date_of_birth;?>" placeholder="Enter Date Of Birth" required/>
			    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
			    <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
		    </div> 
                    <div class="col-md-12">
			<div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">Mobile No</label>
			    <input type="text" name="mobile_no" maxlength="15"  pattern="(?=.*\d).{7,}" minlength="11" class="form-control" value="<?= $persondata[0]->Per_number;?>" placeholder="Enter Contact Number" required />
			    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
			    <span class="help-block with-errors" style="margin-left:10px; "></span>
                        </div>
<div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">MemberShip</label>
			    <select name="m_type" class="form-control" maxlength="50" minlength="3" placeholder="Select Membership" required >
					<option>Select Membership</option>
					<option <?php if($persondata[0]->m_type=="Silver"){ echo "selected";} ?> value="Silver">Silver</option>
					<option <?php if($persondata[0]->m_type=="Gold"){ echo "selected";} ?> value="Gold">Gold</option>
					<option <?php if($persondata[0]->m_type=="Platinum"){ echo "selected";} ?> value="Platinum">Platinum</option>
					<option <?php if($persondata[0]->m_type=="WalkIn"){ echo "selected";} ?> value="WalkIn">Walk In</option>
			    </select>
				   <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
				   <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>		



		    </div> 
            <div class="col-md-12">
			<div class="form-group has-feedback col-md-6">
			    <!-- <label for="exampleInputEmail1">Image</label> -->
			    		
			    	<span>
			    		 <img src="<?php echo site_url('uploads/members/'.$persondata[0]->m_image)?>" width="80" height="90"> 
			    	</span>
			    <input type="file" name="userfile" class="form-control">
			    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
			    <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>

	<div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">Address</label>
			    <textarea name="address" rows="4" class="form-control" maxlength="50" minlength="3" placeholder="Enter Address" required ><?= $persondata[0]->Per_address?></textarea>
			    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
			    <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>

			


		    </div> 
            <div class="col-md-12">
			<div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">Card No</label>
			    <input type="text" name="c_no" class="form-control" maxlength="50" minlength="3" value="<?=$persondata[0]->m_card_no;?>" placeholder="Enter Card No" required/>
			    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
			    <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
            <div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">License NO</label>
			    <input type="text" name="l_no" class="form-control" maxlength="50" minlength="3" value="<?=$persondata[0]->Per_license_no;?>" placeholder="Enter Number" required/>
			    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
			    <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
            </div>
            <div class="col-md-12">
            <div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">Valid From</label>
			    <input type="date" name="valid_from" class="form-control" maxlength="50" minlength="3" value="<?= $persondata[0]->m_valid_from;?>" placeholder="Enter Valid From" required />
.			    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
			    <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
            <div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">Valid To</label>
			    <input type="date" name="valid_to" class="form-control" maxlength="50" minlength="3" value="<?= $persondata[0]->m_valid_to;?>" placeholder="Enter Valid To" required />
			    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
			    <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
            </div>
                    <div class="col-md-12">
			<div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">Fee Schedule</label>
			    <select name="feeschedule" class="form-control" value="" maxlength="50" minlength="3" placeholder="Select Fee Schedule" required >
					<option>Select Fee Schedule</option>
					<option <?php if($persondata[0]->m_f_shadule=="monthly"){ echo "selected";} ?> value="monthly">Monthly</option>
					<option <?php if($persondata[0]->m_f_shadule=="yearly"){ echo "selected";} ?> value="yearly">Yearly</option>
			    </select>
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
                        <div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">Payment</label>
			    <input type="text" name="payment" class="form-control" maxlength="50" minlength="3" value="<?= $persondata[0]->m_payment;?>" placeholder="Enter Payment" required />
			    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
			    <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">Service / Business</label>
			    <input type="text" name="service" class="form-control" maxlength="50" minlength="3" value="<?= $persondata[0]->m_service;?>" placeholder="Enter Service / Business" required />
			    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
			    <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
                        <div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">Education Qualification</label>
			    <input type="text" name="education" class="form-control" maxlength="50" minlength="3" value="<?= $persondata[0]->m_education;?>" placeholder="Enter Education Qualification" required />
			    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
			    <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
                    </div>
		    <div class="col-md-12">
			<div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">Current Employment</label>
			    <input type="text" name="c_employment" maxlength="15"  class="form-control" value="<?= $persondata[0]->m_employment;?>" placeholder="Enter Current Employment" required />
			    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
			    <span class="help-block with-errors" style="margin-left:10px; "></span>
                        </div>
                        <div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">No of Weapon</label>
			    <input type="text" name="no_w" class="form-control" maxlength="50" minlength="3" value="<?= $persondata[0]->m_no_w;?>" placeholder="Enter Number Of Weapon" required/>
			    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
			    <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
                    </div>
		    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Type of Weapon</label>
                          <input type="text" name="w_type" class="form-control" maxlength="50" minlength="3" value="<?= $persondata[0]->m_w_type;?>" placeholder="Type of Weapon" required/>
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Any Conviction</label>
                          <input type="text" name="a_conviction" class="form-control" maxlength="50" minlength="3" value="<?= $persondata[0]->m_conviction;?>" placeholder="Enter Any Conviction" required />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                    </div>
		    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Shooting Experience</label>
                          <input type="text" name="shooting_exp" class="form-control" maxlength="50" minlength="3" value="<?= $persondata[0]->Per_experience;?>" placeholder="Type Shooting Experience" required/>
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Weapon Name / NO</label>
                          <input type="text" name="per_w_no" class="form-control" maxlength="50" minlength="3" value="<?= $persondata[0]->Per_weapon_no;?>" placeholder="Enter Weapon Name / NO" required />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                    </div>
             <div class="col-md-12">
             		<div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Edit Membership date</label>
                          <input type="date" name="edit_mem_date" class="form-control" maxlength="50" required/>
                          <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
             </div>       
		    <h3 style="text-align: center;color: #8a8a8a;">
			In Case Of Emergency Contact Details
		    </h3>
		    <div class="col-md-12">
                        <div class="col-md-2">
			    <label>Name</label>
			</div>
                        <div class="col-md-2">
			    <label>CNIC</label>
			</div>
                        <div class="col-md-2">
			    <label>Mobile</label>
			</div>
                        <div class="col-md-3">
			    <label>Service / Business</label>
			</div>
                        <div class="col-md-3">
			    <label>Address</label>
			</div>
                    </div>
                    <?php if(isset($emergency_data)){ ?>
		    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-2">
                          <input type="text" name="e_name" class="form-control" maxlength="50" minlength="3" value="<?php echo $emergency_data[0]->Per_name?>" placeholder="Enter Booth No" required />
			  <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
			<div class="form-group has-feedback col-md-2">
                          <input type="text" name="e_cnic" class="form-control" maxlength="50" minlength="3" value="<?= $emergency_data[0]->Per_cnic?>" placeholder="Enter No Of Person" required />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
                        <div class="form-group has-feedback col-md-2">
                          <input type="text" name="e_mobile" class="form-control" maxlength="50" minlength="3" value="<?= $emergency_data[0]->Per_cnic?>" placeholder="Enter Range Charges" required />
			  <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
			<div class="form-group has-feedback col-md-3">
                          <input type="text" name="e_service" class="form-control" value="<?= $emergency_data[0]->e_services?>" placeholder="Enter Profession" />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
			<div class="form-group has-feedback col-md-3">
                          <input type="text" name="e_address" class="form-control" value="<?= $emergency_data[0]->Per_address;?>" placeholder="Enter Profession" />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
                    </div>
             <?php }else{?>
	   	<div class="col-md-12">
	   	<div>
	   		<h3 style="text-align: center;color: #ed8888;text-decoration: underline;">No emergency contact details </h3>
	   	</div>
	   	</div>
	   	<?php }?>  
	   	     
		    <h3 style="text-align: center;color: #8a8a8a;">
			REFERENCE CONTACT DETAILS
		    </h3>
		    <div class="col-md-12">
                        <div class="col-md-2">
			    <label>Reference Name</label>
			</div>
                        <div class="col-md-2">
			    <label>CNIC</label>
			</div>
                        <div class="col-md-2">
			    <label>Mobile</label>
			</div>
                        <div class="col-md-3">
			    <label>Service / Business</label>
			</div>
                        <div class="col-md-3">
			    <label>Address</label>
			</div>
                    </div>
                    <?php if(isset($refrence_data)){ ?>
		   <div class="col-md-12">
                        <div class="form-group has-feedback col-md-2">
                          <input type="text" name="ref_name" class="form-control" maxlength="50" minlength="3" value="<?= $refrence_data[0]->Per_name?>" placeholder="Enter Booth No" required />
			  <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
			<div class="form-group has-feedback col-md-2">
                          <input type="text" name="ref_cnic" class="form-control" maxlength="50" minlength="3" value="<?= $refrence_data[0]->Per_cnic?>" placeholder="Enter No Of Person" required />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
                        <div class="form-group has-feedback col-md-2">
                          <input type="text" name="ref_mobile" class="form-control" maxlength="50" minlength="3" value="<?= $refrence_data[0]->Per_number?>" placeholder="Enter Range Charges" required />
			  <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
			<div class="form-group has-feedback col-md-3">
                          <input type="text" name="ref_service" class="form-control" value="<?= $refrence_data[0]->ref_service?>" placeholder="Enter Profession" />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
			<div class="form-group has-feedback col-md-3">
                          <input type="text" name="ref_address" class="form-control" value="<?= $refrence_data[0]->Per_address?>" placeholder="Enter Profession" />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
                    </div>
		        <?php }else{?>
	   	<div class="col-md-12">
	   	<div>
	   		<h3 style="    text-align: center;color: #ed8888;text-decoration: underline;">No Refrence Contact data available</h3>
	   	</div>
	   	</div>
	   	<?php }?> 
		    <h3 style="text-align: center;color: #8a8a8a;">
			Nominated Guests
		    </h1>
		     <div class="col-md-12">
                        <div class="col-md-3">
			    <label>Name</label>
			</div>
                        <div class="col-md-3">
			    <label>CNIC</label>
			</div>
                        <div class="col-md-3">
			    <label>Mobile</label>
			</div>
                        <div class="col-md-3">
			    <label>Address</label>
			</div>
                    </div>
		     <?php if(isset($nominated_data)){ ?>
	<div class="col-md-12">
                        <div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_name" class="form-control" maxlength="50" minlength="3" value="<?= $nominated_data[0]->Per_name?>" placeholder="Enter Booth No" required />
			  <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
			<div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_cnic" class="form-control" maxlength="50" minlength="3" value="<?= $nominated_data[0]->Per_cnic?>" placeholder="Enter No Of Person" required />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
                        <div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_mobile" class="form-control" maxlength="50" minlength="3" value="<?= $nominated_data[0]->Per_number?>" placeholder="Enter Range Charges" required />
			  <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
			<div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_address" class="form-control" value="<?= $nominated_data[0]->Per_address?>" placeholder="Enter Profession" />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
    </div>

	<div class="col-md-12">
                        <div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_1_name" class="form-control" maxlength="50" minlength="3" value="<?= $nominated_data[1]->Per_name?>" placeholder="Enter Booth No" required />
			  <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
			<div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_1_cnic" class="form-control" maxlength="50" minlength="3" value="<?= $nominated_data[1]->Per_cnic?>" placeholder="Enter No Of Person" required />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
                        <div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_1_mobile" class="form-control" maxlength="50" minlength="3" value="<?= $nominated_data[1]->Per_number?>" placeholder="Enter Range Charges" required />
			  <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
			<div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_1_address" class="form-control" value="<?= $nominated_data[1]->Per_address?>" placeholder="Enter Profession" />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
    </div>

	<div class="col-md-12">
                        <div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_2_name" class="form-control" maxlength="50" minlength="3" value="<?= $nominated_data[2]->Per_name?>" placeholder="Enter Booth No" required />
			  <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
			<div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_2_cnic" class="form-control" maxlength="50" minlength="3" value="<?= $nominated_data[2]->Per_cnic?>" placeholder="Enter No Of Person" required />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
                        <div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_2_mobile" class="form-control" maxlength="50" minlength="3" value="<?= $nominated_data[2]->Per_number?>" placeholder="Enter Range Charges" required />
			  <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
			<div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_2_address" class="form-control" value="<?= $nominated_data[2]->Per_address?>" placeholder="Enter Profession" />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
    </div>        
<?php } else{?>
	   	<div class="col-md-12">
	   	<div>
	   		<h3 style="    text-align: center;color: #ed8888;text-decoration: underline;">No Guest available</h3>
	   	</div>
	   	</div>
	   	<?php }?> 
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
              