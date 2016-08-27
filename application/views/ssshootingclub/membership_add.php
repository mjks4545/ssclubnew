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
	    <small> <a href="<?= site_url()?>admin/">Home</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; <a href="<?= site_url()?>ssshootingclub/index">Ssshootingclub Section</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; Membership Form &nbsp;&nbsp;&nbsp;</small>
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
                  <h2 style="text-align:center;">Membership Add Form</h2>
                  <a href="<?= site_url()?>ssshootingclub/checkin_search"class="pull-right"> Back</a>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" data-toggle="validator" action="<?= site_url()?>ssshootingclub/membership_add_after_post" method="post" enctype="multipart/form-data">
          <div class="box-body">
			<div class="col-md-12">
				<div class="form-group has-feedback col-md-6">
				  <label for="exampleInputEmail1">Name</label>
				  <input type="text" name="name" class="form-control" maxlength="50" minlength="1" id="exampleInputEmail1" placeholder="Enter Name" required/>
				   <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
				   <span class="help-block with-errors" style="margin-left:10px; "></span>
			  </div>
			  <div class="form-group has-feedback col-md-6">
				  <label for="exampleInputEmail1">Father Name</label>
				  <input type="text" name="father_name" class="form-control" maxlength="50" placeholder="Enter Father Name" />
			  </div>
			</div>
            <div class="col-md-12">
			<div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">NIC NO</label>
			    <input type="text" name="n_no" class="form-control" maxlength="50" placeholder="Enter ID Card number" />
			</div>
			<div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">Date Of Birth</label>
			    <input type="date" name="d_o_birth" class="form-control" maxlength="50" placeholder="Enter Date Of Birth" />
			</div>
		    </div> 
                    <div class="col-md-12">
			<div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">Mobile No</label>
			    <input type="text" name="mobile_no" maxlength="15"  class="form-control" id="exampleInputEmail1" placeholder="Enter Contact Number"  />
                        </div>
			<div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">Address</label>
			    <textarea name="address" class="form-control" maxlength="50" placeholder="Enter Address" ></textarea>
			</div>
		    </div> 
            <div class="col-md-12">
			<div class="form-group has-feedback col-md-6">
			    <!-- <label for="exampleInputEmail1">Upload Image</label>
			    <input type="file" name="userfile" class="form-control" maxlength="50" minlength="3" placeholder="Upload Image"  > -->
				<div class="form-group">
            		<label>Upload Image</label>
            		<input name="userfile" id="file-1" type="file" multiple=true >
                </div>				    
			</div>
			<div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">MemberShip</label>
			    <select name="membership" class="form-control" maxlength="50" placeholder="Select Membership"  >
					<option>Select Membership</option>
					<option value="Silver">Silver</option>
					<option value="Gold">Gold</option>
					<option value="Platinum">Platinum</option>
					<option value="WalkIn">Walk In</option>
			    </select>
			</div>
		    </div> 
            <div class="col-md-12">
			<div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">Card No</label>
			    <input type="text" name="c_no" class="form-control" maxlength="50" placeholder="Enter Card No" />
			</div>
            <div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">License NO</label>
			    <input type="text" name="l_no" class="form-control" maxlength="50" placeholder="Enter Number" />
			</div>
            </div>
            <div class="col-md-12">
            <div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">Valid From</label>
			    <input type="date" name="valid_from" class="form-control" maxlength="50" placeholder="Enter Valid From" />
			</div>
            <div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">Valid To</label>
			    <input type="date" name="valid_to" class="form-control" maxlength="50" placeholder="Enter Valid To" />
			</div>
            </div>
                    <div class="col-md-12">
			<div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">Fee Schedule</label>
			    <select name="feeschedule" class="form-control" maxlength="50" placeholder="Select Fee Schedule"  >
					<option>Select Fee Schedule</option>
					<option value="Silver">Membership</option>
					<option value="Gold">Monthly</option>
					<option value="Platinum">Yearly</option>
			    </select>
			</div>
                        <div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">Payment</label>
			    <input type="text" name="payment" class="form-control" maxlength="50" placeholder="Enter Payment" />
			</div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
			    <label>Relationship</label>
			    <!-- This was for Services/Buisness but changed to relationship but the so only front-end will changed --> 
			    <input type="text" name="service" class="form-control" maxlength="50" placeholder="Relationship" />
			</div>
                        <div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">Education Qualification</label>
			    <input type="text" name="education" class="form-control" maxlength="50" placeholder="Enter Education Qualification" />
			</div>
                    </div>
		    <div class="col-md-12">
			<div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">Current Employment</label>
			    <input type="text" name="c_employment" maxlength="15"  class="form-control" placeholder="Enter Current Employment" />
			    
                        </div>
                        <div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">No of Weapon</label>
			    <input type="text" name="no_w" class="form-control" maxlength="50" placeholder="Enter Number Of Weapon"/>
			    
			</div>
                    </div>
		    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Type of Weapon</label>
                          <input type="text" name="w_type" class="form-control" maxlength="50" placeholder="Type of Weapon"/>
                           
                      </div>
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Any Conviction</label>
                          <input type="text" name="a_conviction" class="form-control" maxlength="50" placeholder="Enter Any Conviction" />
                           
                      </div>
                    </div>
		    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Shooting Experience</label>
                          <input type="text" name="shooting_exp" class="form-control" maxlength="50" placeholder="Type Shooting Experience"/>
                      </div>
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Weapon Name / NO</label>
                          <input type="text" name="w_no" class="form-control" maxlength="50" placeholder="Enter Weapon Name / NO" />
                           
                      </div>
                    </div>
            <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Membership Create Date</label>
                          <input type="date" name="mem_create_date" class="form-control" maxlength="50" placeholder="Type Shooting Experience"/>
                          
                        </div>
                        <div class="form-group has-feedback col-md-3">
                          <div class="form-group">
                    		<label>NIC image 1</label>
                    		<input name="m_nic_1" id="file-3" type="file" multiple=true >
                		  </div>
                        </div><div class="form-group has-feedback col-md-3">
                           <label>NIC image 2</label>
                    		<input name="m_nic_2" id="file-4" type="file" multiple=true >
                			</div>
                        </div>
                      
                    </div>        
		    <h2 style="text-align: center;">
			In Case Of Emergency Contact Details
		    </h2>
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
			    <label>Relationship</label>
			</div>
                        <div class="col-md-3">
			    <label>Address</label>
			</div>
                    </div>
		    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-2">
                          <input type="text" name="e_name" class="form-control" maxlength="50" placeholder="Enter Name" />
			  
			</div>
			<div class="form-group has-feedback col-md-2">
                          <input type="text" name="e_cnic" class="form-control" maxlength="50"placeholder="Enter cnic" />
                           
			</div>
                        <div class="form-group has-feedback col-md-2">
                          <input type="text" name="e_mobile" class="form-control" maxlength="50" placeholder="Enter mobile number" />
			  
			</div>
			<div class="form-group has-feedback col-md-3">
                          <input type="text" name="e_service" class="form-control" placeholder="Relationship" />
                           
			</div>
			<div class="form-group has-feedback col-md-3">
                          <input type="text" name="e_address" class="form-control" placeholder="Enter address" />
                           
			</div>
                    </div>
		    <h2 style="text-align: center;">
			Reference contact details
		    </h2>
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
			    <label>Relationship</label>
			</div>
                        <div class="col-md-3">
			    <label>Address</label>
			</div>
                    </div>
		   <div class="col-md-12">
                        <div class="form-group has-feedback col-md-2">
                          <input type="text" name="ref_name" class="form-control" maxlength="50" placeholder="Enter name" />
			  			  
			</div>
			<div class="form-group has-feedback col-md-2">
                          <input type="text" name="ref_cnic" class="form-control" maxlength="50" placeholder="Enter cnic" />
                           
			</div>
                        <div class="form-group has-feedback col-md-2">
                          <input type="text" name="ref_mobile" class="form-control" maxlength="50" placeholder="Enter mobile number" />
			 			 
			</div>
			<div class="form-group has-feedback col-md-3">
                          <input type="text" name="ref_service" class="form-control" placeholder="Relationship" />
                           
			</div>
			<div class="form-group has-feedback col-md-3">
                          <input type="text" name="ref_address" class="form-control" placeholder="Enter address" />
                           
			</div>
                    </div>
		        
		    <h2 style="text-align: center;">
			Nominated Guests
		    </h2>
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
		     
		    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_name" class="form-control" maxlength="50" placeholder="Enter name" />
			  
			</div>
			<div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_cnic" class="form-control" maxlength="50" placeholder="Enter cnic" />
                           
			</div>
                        <div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_mobile" class="form-control" maxlength="50" placeholder="Enter mobile" />
			  
			</div>
			<div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_address" class="form-control" placeholder="Enter address" />
                           
			</div>
                    </div>
		    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_1_name" class="form-control" maxlength="50" placeholder="Enter name" />
			  
			</div>
			<div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_1_cnic" class="form-control" maxlength="50" placeholder="Enter cnic" />
                           
			</div>
                        <div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_1_mobile" class="form-control" maxlength="50" placeholder="Enter mobile" />
			  
			</div>
			<div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_1_address" class="form-control" placeholder="Enter address" />
                           
			</div>
                    </div>
		    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_2_name" class="form-control" maxlength="50" placeholder="Enter name" />
			  
			</div>
			<div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_2_cnic" class="form-control" maxlength="50" placeholder="Enter cnic" />
                           
			</div>
                        <div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_2_mobile" class="form-control" maxlength="50" placeholder="Enter mobile" />
			  
			</div>
			<div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_2_address" class="form-control" placeholder="Enter address" />
                           
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
              

<script type="text/javascript">

$("#file-1").fileinput({
		showUpload: false,
		showCaption: false,
		browseClass: "btn btn-primary btn-sm",
		fileType: "any",
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
	});

$("#file-3").fileinput({
		showUpload: false,
		showCaption: false,
		browseClass: "btn btn-primary btn-sm",
		fileType: "any",
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
	});
$("#file-4").fileinput({
		showUpload: false,
		showCaption: false,
		browseClass: "btn btn-primary btn-sm",
		fileType: "any",
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
	});

</script>              