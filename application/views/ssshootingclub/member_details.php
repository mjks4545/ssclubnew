<style>
    .course{
        margin-top: 10px;
    }
    .has-feedback{
      border: 1px solid #ccc!important;
      min-height: 55px;
    }
</style>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
	    SSClub Dashboard
	    <small> <a href="<?= site_url()?>admin/">Home</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; <a href="<?= site_url()?>ssshootingclub/index">Search Members</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; <a href="<?=  site_url()?>ssshootingclub/checkin_search">Member Details</a> </small>
	  </h1>
        </section>
        <!-- Main content -->
        
        <section class="content">

          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <?php $this->load->view('include/alert')?>
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">

                  <!--<h2 class="box-title text-primary ">Step-I</h2>-->
                  <a href="<?= site_url()?>ssshootingclub/checkin_search"class="pull-right"> Back</a>
                </div><!-- /.box-header -->
                <!-- form start -->
                 
                 <div class="row">
                   <div class="box-body">
                   <h3 style="text-align:center;">Cancel Membership</h3>
                   <h5 style="text-align:center;color:#ccc">Member Since:  <?= $persondata[0]->m_valid_from?></h5>
                   <br>  
                    <form class="form-inline" method="post" action="<?php echo base_url('ssshootingclub/cancel_membership')?>" role="form">
                        <div class="form-group col-md-5">
                          <input type="text" style="width:100%;height:50px" class="form-control" name="reason" placeholder="Reason" maxlength="50" minlength="1" required>
                          <input type="hidden" name="m_id" value="<?= $persondata[0]->m_id?>" class="form-control">
                          <input type="hidden" name="red_id" value="<?= $this->uri->segment(3);?>" class="form-control" minlength="1" required>
                        </div>
                        <div class="form-group col-md-5">
                           
                            <select class="form-control" name="cancel_type" style="width:100%;height:50px">
                              <option>Select</option>
                              <option value="1">Block</option>
                              <option value="2">Cancel</option>
                            </select>
                          </div>
                      
                        <button type="submit" style="height:50px" class="btn btn-warning btn-md">Cancel Membership</button>
                    </form>
                </div>
                </div>
                <hr>
                  <h3 style="text-align:center;color: #8a8a8a;">Member Data</h3>
                 <div class="">
                    <div class="col-md-12">
                        <div class="form-group col-md-6">
                          <a href="<?= site_url('Ssshootingclub/payment_history/'.$persondata[0]->Per_id) ?>" class="btn btn-info btn-md">View Payment History</a>
                      </div>
                      <div class="form-group  col-md-6">
                          <a href="<?= site_url('ssshootingclub/membership_renewel/'.$persondata[0]->Per_id);?>" class="btn btn-info btn-md pull-right">Membership Renewal</a>
                      </div>
                       
                    </div>
                    </div>

              
                <hr>
                <form role="form" data-toggle="validator" action="<?=site_url()?>ssshootingclub/insert_checkin_data" method="post">
                 <div class="box-body">
                    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Name</label>
                          <p><?=$persondata[0]->Per_name;?></p>
                      </div>
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Father Name</label>
                            <p><?=$persondata[0]->Per_f_name;?></p>
                      </div>
                       
                    </div>
                    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">License NO</label>
                            <p><?=$persondata[0]->Per_license_no;?></p>
                      </div>
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Card No</label>
                            <?=$persondata[0]->m_card_no;?>
                      </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">NIC NO</label>
                            <p><?=$persondata[0]->Per_cnic;?></p>
                      </div>
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Date of Birth</label>
                            <p><?=$persondata[0]->m_date_of_birth?></p>
                      </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
			                   <label for="exampleInputEmail1">MemberShip</label>
			                     <p><?=$persondata[0]->m_type;?></p>
                      </div>
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Address</label>
                            <p><?=$persondata[0]->Per_address;?></p>
                      </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
			                     <label for="exampleInputEmail1">Image</label><div class="clearfix"></div>
                            <img src="<?php echo site_url('uploads/members/'.$persondata[0]->m_image)?>" width="120" class="img-circle" height="80">           
                        </div>
      <div class="form-group has-feedback col-md-6" style="height:106px">
			    <label for="exampleInputEmail1">Weapon</label><br>
			     <p><?= $persondata[0]->m_w_type; ?></p>    
      </div>
                    </div>
		    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Weapon Name / NO</label>
                           <p><?= $persondata[0]->m_no_w;?></p> 
			</div>
			<div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Mobile No</label>
                            <p><?=$persondata[0]->Per_number;?></p>
                        </div>
                    </div>
		    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">No of Fire</label>
                            <p><?php if($checkindata){echo $checkindata[0]->c_fire;}?></p>
                      </div>
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Shooting Experience</label>
                            <p><?=$persondata[0]->Per_experience;?></p>
                      </div>
                    </div>

            <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
                         <label for="exampleInputEmail1">Valid From</label>
                           <p><?=$persondata[0]->m_valid_from;?></p>
                      </div>
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Valid To</label>
                            <p><?=$persondata[0]->m_valid_to;?></p>
                      </div>
            </div> 

            <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
                         <label for="exampleInputEmail1">Fee Shedule</label>
                           <p><?=$persondata[0]->m_f_shadule;?></p>
                      </div>
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Payment</label>
                            <p><?=$persondata[0]->m_payment;?></p>
                      </div>
            </div>                        

		    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Type of Weapon</label>
                          <p><?=$persondata[0]->m_w_type;?></p>  
			                 </div>
                      
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Profession</label>
                          <p><?php if($checkindata){ echo $checkindata[0]->c_profession; }?></p>
                      </div>
                    
         </div>

        <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">No of Weapon</label>
                          <p><?=$persondata[0]->m_no_w;?></p>  
                       </div>
                      
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Any Convection</label>
                          <p><?php if($persondata){echo $persondata[0]->m_conviction; }?></p>
                      </div>
                    
         </div>    

        <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Education</label>
                          <p><?=$persondata[0]->m_education;?></p>  
                       </div>
                      
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Current Employment</label>
                          <p><?php if($persondata){echo $persondata[0]->m_employment; }?></p>
                      </div>
                    
         </div>   
        <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
                           <label for="exampleInputEmail1">NIC Image 1</label><div class="clearfix"></div>
                            <img src="<?php echo site_url('uploads/members/'.$persondata[0]->m_nic_image1)?>" width="120" class="img-circle" height="80">           
                        </div>
                        <div class="form-group has-feedback col-md-6">
                           <label for="exampleInputEmail1">NIC Image 2</label><div class="clearfix"></div>
                            <img src="<?php echo site_url('uploads/members/'.$persondata[0]->m_nic_image2)?>" width="120" class="img-circle" height="80">           
                        </div>
        </div>                              
		 
    <hr style="border: 1px solid #f2f2f2;">
    <div>
      <h3 style="text-align:center;color:#8a8a8a;">Emergency Contect Details</h3>
    <hr style="border: 1px solid #f2f2f2;">      
    </div>
		
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
        <p><?php if(isset($emergency_data)){ echo $emergency_data[0]->Per_name; }?></p>                 
			</div>
			<div class="form-group has-feedback col-md-3">
        <p><?php if(isset($emergency_data)){ echo $emergency_data[0]->Per_cnic; }?></p>
			</div>
       <div class="form-group has-feedback col-md-3">
        <p><?php if(isset($emergency_data)){ echo $emergency_data[0]->Per_number; }?></p>          
			</div>
		
			<div class="form-group has-feedback col-md-3">
        <p><?php if(isset($emergency_data)){ echo $emergency_data[0]->Per_address; }?></p>
			</div>
</div>

  <hr style="border: 1px solid #f2f2f2;">
    <div>
      <h3 style="text-align:center;color:#8a8a8a;">Refrence Contact Details</h3>
    <hr style="border: 1px solid #f2f2f2;">      
    </div>
    
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
        <p><?php if(isset($refrence_data)){ echo $refrence_data[0]->Per_name; }?></p>                 
      </div>
      <div class="form-group has-feedback col-md-3">
        <p><?php if(isset($refrence_data)){ echo  $refrence_data[0]->Per_cnic; }?></p>
      </div>
       <div class="form-group has-feedback col-md-3">
        <p><?php if(isset($refrence_data)){ echo  $refrence_data[0]->Per_number; }?></p>          
      </div>
    
      <div class="form-group has-feedback col-md-3">
        <p><?php if(isset($refrence_data)){ echo  $refrence_data[0]->Per_address; }?></p>
      </div>
</div>	
  
<hr style="border: 1px solid #f2f2f2;">
		     <h3 style="text-align: center;color:#8a8a8a;">
			Nominated Guests
		    </h3>
<hr style="border: 1px solid #f2f2f2;">        
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
<?php if(isset($nominated_data))
   { 
 foreach ($nominated_data as $value) {?>		     
<div class="col-md-12">
      <div class="form-group has-feedback col-md-3">
          <p><?php echo $value->Per_name?></p>
		  </div>
			<div class="form-group has-feedback col-md-3">
        <?php echo $value->Per_cnic?>
			</div>
       <div class="form-group has-feedback col-md-3">
          <p><?php echo $value->Per_number?></p>
			</div>
			<div class="form-group has-feedback col-md-3">
          <p><?php echo $value->Per_address?></p>
			</div>
</div>

<?php } } ?>

		     
                </div><!-- /.box-body -->
             </form>
          </div><!-- /.box -->
       </div>
     </div>
   </section>
</div>
              