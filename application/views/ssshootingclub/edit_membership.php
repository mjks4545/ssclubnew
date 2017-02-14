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
	    <small> <a href="<?= site_url()?>admin/">Home</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; <a href="<?= site_url()?>ssshootingclub/index">Ssshootingclub Section</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; <a href="<?=  site_url('Ssshootingclub/member_detail/'.$this->uri->segment(3).'/'.$this->uri->segment(4) )?>">Member details</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; Check In Form</small>
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
				  	<input type="hidden" name="per_id" value="<?= $persondata[0]->Per_id;?>">
				  	<input type="hidden" name="per_id" value="<?= $persondata[0]->m_id;?>">
				  <input type="text" name="name" class="form-control" value="<?= trim( $persondata[0]->Per_name);?>" required/>
				  <input type="hidden" name="update_id" class="form-control" value="<?= $this->uri->segment(3);?>"/>
				   <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
				   <span class="help-block with-errors" style="margin-left:10px; "></span>
			  </div>
			  <div class="form-group has-feedback col-md-6">
				  <label for="exampleInputEmail1">Father Name</label>
				  <input type="text" name="father_name" class="form-control" value="<?= trim( $persondata[0]->Per_f_name);?>"/>
				   <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
				   <span class="help-block with-errors" style="margin-left:10px; "></span>
			  </div>
			</div>
            <div class="col-md-12">
			<div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">NIC NO</label>
			    <input type="text" name="n_no" class="form-control" value="<?= trim( $persondata[0]->Per_cnic);?>"/>
			    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
			    <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
			<div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">Date Of Birth</label>
			    <input type="date" name="d_o_birth" class="form-control" maxlength="50" value="<?= trim( $persondata[0]->m_date_of_birth);?>"/>
			    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
			    <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
		    </div> 
                    <div class="col-md-12">
			<div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">Mobile No</label>
			    <input type="text" name="mobile_no" class="form-control" value="<?= trim( $persondata[0]->Per_number);?>" />
			    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
			    <span class="help-block with-errors" style="margin-left:10px; "></span>
                        </div>
<div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">MemberShip</label>
			    <select name="m_type" class="form-control" >
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
                          <label for="exampleInputEmail1">Weapon Name / NO</label>
                          <input type="text" name="per_w_no" class="form-control" value="<?= trim( $persondata[0]->Per_weapon_no);?>" />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
             </div>

			<div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">Address</label>
			    <textarea name="address" rows="4" class="form-control" ><?= trim( $persondata[0]->Per_address);?></textarea>
			    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
			    <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>

		</div>    
		    
            <div class="col-md-12">
           <div class="form-group has-feedback col-md-6">
				<div class="form-group has-feedback col-md-3">
				    <label for="exampleInputEmail1">Image</label>
				    	<span>
				    		<a href="<?php echo site_url('uploads/members/'.$persondata[0]->m_image)?>" data-lighter >
				    		 <img src="<?php echo site_url('uploads/members/'.$persondata[0]->m_image)?>" width="80" height="90"> 
				    		</a>
				    	</span>
				    <input type="file" name="userfile" class="form-control">
				    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
				    <span class="help-block with-errors" style="margin-left:10px; "></span>
				</div>
				<div class="form-group has-feedback col-md-3">
				    <label for="">License Image</label>
				    	<span>
				    		<a href="<?php echo site_url('uploads/members/'.$persondata[0]->license_img)?>" data-lighter >
				    		 <img src="<?php echo site_url('uploads/members/'.$persondata[0]->license_img)?>" width="80" height="90"> 
				    		</a>
				    	</span>
				    <input type="file" name="license_img" class="form-control">	
				    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
				    <span class="help-block with-errors" style="margin-left:10px; "></span>
				</div>
				
		  
		  </div>
		   		
		   <div class="form-group has-feedback col-md-6">
		      
		   	<div class="form-group has-feedback col-md-3">
				    <label for="exampleInputEmail1">NIC Image 1</label>
				    	<span>
				    		<a href="<?php echo site_url('uploads/members/'.$persondata[0]->m_nic_image1)?>" data-lighter >
				    		 <img src="<?php echo site_url('uploads/members/'.$persondata[0]->m_nic_image1)?>" width="80" height="90"> 
				    		</a>
				    	</span>
				    <input type="file" name="m_nic1" class="form-control">	
				    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
				    <span class="help-block with-errors" style="margin-left:10px; "></span>
				</div>
				<div class="form-group has-feedback col-md-3">
				    <label for="exampleInputEmail1">NIC Image 2</label>
				    	<span>
				    		<a href="<?php echo site_url('uploads/members/'.$persondata[0]->m_nic_image2)?>" data-lighter >
				    		 <img src="<?php echo site_url('uploads/members/'.$persondata[0]->m_nic_image2)?>" width="80" height="90"> 
				    		</a>
				    	</span>
				    <input type="file" name="m_nic2" class="form-control">
				    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
				    <span class="help-block with-errors" style="margin-left:10px; "></span>
				</div>	

		   </div>		

		    </div> 
			

            <div class="col-md-12">
			<div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">Card No</label>
			    <input type="text" name="c_no" class="form-control" value="<?= trim( $persondata[0]->m_card_no);?>"/>
			    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
			    <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
            <div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">License NO</label>
			    <input type="text" name="l_no" class="form-control" value="<?=trim( $persondata[0]->Per_license_no);?>"/>
			    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
			    <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
            </div>
            <div class="col-md-12">
            <div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">Valid From</label>
			    <input type="date" name="valid_from" class="form-control" value="<?= $persondata[0]->m_valid_from;?>" />
.			    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
			    <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
            <div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">Valid To</label>
			    <input type="date" name="valid_to" class="form-control" value="<?= $persondata[0]->m_valid_to;?>" />
			    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
			    <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
            </div>
                    <div class="col-md-12">
			<div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">Fee Schedule</label>
			    <select name="feeschedule" class="form-control" value="" >
					<option>Select Fee Schedule</option>
					<option <?php if($persondata[0]->m_f_shadule=="Membership"){ echo "selected";} ?> value="Membership">Membership</option>
					<option <?php if($persondata[0]->m_f_shadule=="monthly"){ echo "selected";} ?> value="monthly">Monthly</option>
					<option <?php if($persondata[0]->m_f_shadule=="yearly"){ echo "selected";} ?> value="yearly">Yearly</option>
			    </select>
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
                        <div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">Payment</label>
			    <input type="text" name="payment" class="form-control" value="<?= trim( $persondata[0]->m_payment);?>" />
			    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
			    <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">Service / Business</label>
			    <input type="text" name="service" class="form-control" value="<?= trim( $persondata[0]->m_service);?>"/>
			    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
			    <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
                        <div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">Education Qualification</label>
			    <input type="text" name="education" class="form-control" value="<?= trim( $persondata[0]->m_education);?>" />
			    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
			    <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
                    </div>
		    <div class="col-md-12">
			<div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">Current Employment</label>
			    <input type="text" name="c_employment" maxlength="15"  class="form-control" value="<?= trim( $persondata[0]->m_employment);?>" />
			    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
			    <span class="help-block with-errors" style="margin-left:10px; "></span>
                        </div>
                        <div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">No of Weapon</label>
			    <input type="text" name="no_w" class="form-control" value="<?= trim( $persondata[0]->m_no_w);?>"/>
			    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
			    <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
                    </div>
		    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Type of Weapon</label>
                          <input type="text" name="w_type" class="form-control" value="<?= trim( $persondata[0]->m_w_type);?>"/>
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Any Conviction</label>
                          <input type="text" name="a_conviction" class="form-control" value="<?= trim( $persondata[0]->m_conviction);?>" />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                    </div>
		    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Shooting Experience</label>
                          <input type="text" name="shooting_exp" class="form-control" value="<?= trim( $persondata[0]->Per_experience);?>"/>
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                      
                    </div>
             <div class="col-md-12">
             		<!-- <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Edit Membership date</label>
                          <input type="date" name="edit_mem_date" class="form-control" value="<?//= date("Y-m-d")?>"/>
                          <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div> -->
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
			    <label>Job/Buisness</label>
			</div>
                        <div class="col-md-3">
			    <label>Address</label>
			</div>
                    </div>
                    <?php// if($emergency_data){ ?>
		    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-2">
                          <input type="text" name="e_name" class="form-control" value="<?php if(isset($emergency_data)){echo trim( $emergency_data[0]->Per_name);} ?>" />
			  <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
			<div class="form-group has-feedback col-md-2">
                          <input type="text" name="e_cnic" class="form-control" value="<?php if(isset($emergency_data)){echo trim( $emergency_data[0]->Per_cnic);}?>" />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
                        <div class="form-group has-feedback col-md-2">
                          <input type="text" name="e_mobile" class="form-control" value="<?php if(isset($emergency_data)){echo trim( $emergency_data[0]->Per_number);}?>" />
			  <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
			<div class="form-group has-feedback col-md-3">
                          <input type="text" name="e_service" class="form-control" value="<?php if(isset($emergency_data)){echo trim( $emergency_data[0]->e_services);}?>" />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
			<div class="form-group has-feedback col-md-3">
                          <input type="text" name="e_address" class="form-control" value="<?php if(isset($emergency_data)){echo trim( $emergency_data[0]->Per_address);}?>" />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
                    </div>
             <?php //} ?>
            <!-- //else{?>
	   	<div class="col-md-12">
	   	<div>
	   		<h3 style="text-align: center;color: #ed8888;text-decoration: underline;">No emergency contact details </h3>
	   	</div>
	   	</div>
	   	<?php //}?>  -->
	   	     
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
			    <label>Job/Buisness</label>
			</div>
                        <div class="col-md-3">
			    <label>Address</label>
			</div>
                    </div>
                    <?php //if(isset($refrence_data)){ ?>
		   <div class="col-md-12">
                        <div class="form-group has-feedback col-md-2">
                          <input type="text" name="ref_name" class="form-control" value="<?php if(isset($refrence_data)) {echo trim( $refrence_data[0]->Per_name);}?>"  />
			  <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
			<div class="form-group has-feedback col-md-2">
                          <input type="text" name="ref_cnic" class="form-control" value="<?php if(isset($refrence_data)) {echo trim( $refrence_data[0]->Per_cnic);}?>"  />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
                        <div class="form-group has-feedback col-md-2">
                          <input type="text" name="ref_mobile" class="form-control" value="<?php if(isset($refrence_data)) {echo trim( $refrence_data[0]->Per_number);}?>"  />
			  <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
			<div class="form-group has-feedback col-md-3">
                          <input type="text" name="ref_service" class="form-control" value="<?php if(isset($refrence_data)) {echo trim( $refrence_data[0]->ref_service);}?>" />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
			<div class="form-group has-feedback col-md-3">
                          <input type="text" name="ref_address" class="form-control" value="<?php if(isset($refrence_data)) {echo trim( $refrence_data[0]->Per_address);}?>" />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
                    </div>
		        <?php //}else{?>
	   	<!-- <div class="col-md-12">
	   	<div>
	   		<h3 style="    text-align: center;color: #ed8888;text-decoration: underline;">No Refrence Contact data available</h3>
	   	</div>
	   	</div> -->
	   	<?php// }?> 
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
		     <?php //if(isset($nominated_data)){ ?>
	<div class="col-md-12">
                        <div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_name" class="form-control" value="<?php if(isset($nominated_data)) {echo trim( $nominated_data[0]->Per_name);}?>" />
			  <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
			<div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_cnic" class="form-control" value="<?php if(isset($nominated_data)) {echo trim( $nominated_data[0]->Per_cnic);}?>" />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
                        <div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_mobile" class="form-control" value="<?php if(isset($nominated_data)) {echo trim( $nominated_data[0]->Per_number);}?>" />
			  <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
			<div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_address" class="form-control" value="<?php if(isset($nominated_data)) {echo trim( $nominated_data[0]->Per_address);}?>"  />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
    </div>

	<div class="col-md-12">
                        <div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_1_name" class="form-control" value="<?php if(isset($nominated_data[1])) {echo trim( $nominated_data[1]->Per_name);}?>"  />
			  <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
			<div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_1_cnic" class="form-control" value="<?php if(isset($nominated_data[1])) {echo trim( $nominated_data[1]->Per_cnic);}?>" />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
                        <div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_1_mobile" class="form-control" value="<?php if(isset($nominated_data[1])) {echo trim( $nominated_data[1]->Per_number);}?>"  />
			  <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
			<div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_1_address" class="form-control" value="<?php if(isset($nominated_data[1])) {echo trim( $nominated_data[1]->Per_address);}?>" />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
    </div>

	<div class="col-md-12">
                        <div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_2_name" class="form-control" value="<?php if(isset($nominated_data[2])) {echo trim( $nominated_data[2]->Per_name);}?>"  />
			  <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
			<div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_2_cnic" class="form-control" value="<?php if(isset($nominated_data[2])) {echo trim( $nominated_data[2]->Per_cnic);}?>" />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
                        <div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_2_mobile" class="form-control" value="<?php if(isset($nominated_data[2])) {echo trim( $nominated_data[2]->Per_number);}?>" />
			  <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
			<div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_2_address" class="form-control" value="<?php if(isset($nominated_data[2])) {echo trim( $nominated_data[2]->Per_address);}?>" />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
    </div>        
<?php// } else{?>
	   	<!-- <div class="col-md-12">
	   	<div>
	   		<h3 style="    text-align: center;color: #ed8888;text-decoration: underline;">No Guest available</h3>
	   	</div>
	   	</div> -->
	   	<?php// }?> 
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
              
<script type="text/javascript">
	$(".file_upload").fileinput({
		showUpload: false,
		showCaption: false,
		browseClass: "btn btn-primary btn-sm",
		fileType: "any",
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
	});
</script>              