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
                 
              
                  <h2 style="text-align:center;color: #8a8a8a;">Search Result for : 
                          <span style="color:#000;">
                                  <?php if(isset($persondata)) {echo $persondata[0]->Per_name;} ?>
                                  <?php if(isset($other_data)) {echo $other_data[0]->Per_name;} ?>
                          </span>
                     <h3 style="text-align:center;color: #8a8a8a;">Reg No: 
                          <span style="color:#000;">
                                  <?php if(isset($persondata)) {echo $persondata[0]->m_id;}?>
                                  <?php if(isset($other_data)) {echo $other_data[0]->g_id;} ?>
                          </span> 
                     </h3>
                     <h5 style="text-align:center;color: #8a8a8a;"> 
                                  <?php if(isset($persondata)) {echo$persondata[0]->m_valid_from;}?>
                     </h5>
                  </h2>
                 

              
                <hr>
                <form role="form" data-toggle="validator" action="<?=site_url()?>ssshootingclub/insert_checkin_data" method="post">
                 <div class="box-body">
                    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Name</label>
                          <p><?php if(isset($persondata)){echo $persondata[0]->Per_name;}?></p>
                          <?php if(isset($other_data)) {echo $other_data[0]->Per_name;} ?>
                      </div>
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Father Name</label>
                            <p><?php if(isset($persondata)){echo $persondata[0]->Per_f_name;}?></p>
                      </div>
                       
                    </div>
                    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">License NO</label>
                            <p><?php if(isset($persondata)){echo $persondata[0]->Per_license_no;} ?></p>
                      </div>
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Card No</label>
                            <?php if(isset($persondata)){echo $persondata[0]->m_card_no;}?>
                      </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Arrival date</label>
                            <p><?php if(isset($persondata)){ echo date('M-d-Y', strtotime( $persondata[0]->c_arrival_date )); } ?></p>
                             <?php if(isset($other_data)) {echo $other_data[0]->g_date;} ?>                       
                        </div>
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Arrival time</label>
                            <p><?php if(isset($persondata)){echo $persondata[0]->c_arrival_time; } ?></p>
                      </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Departure date</label>
                            <p><?php if(isset($persondata)) {echo date('M-d-Y', strtotime( $persondata[0]->c_departure_date )); } ?></p>
                      </div>
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Departure time</label>
                            <p><?php if(isset($persondata)){echo $persondata[0]->c_departure_time;} ?></p>
                      </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
			                   <label for="exampleInputEmail1">NIC</label>
			                     <p><?php if(isset($persondata)){echo $persondata[0]->Per_cnic;}?></p>
                            <?php if(isset($other_data)) {echo $other_data[0]->Per_number;} ?>
                      </div>
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Address</label>
                            <p><?php if(isset($persondata)){ echo $persondata[0]->Per_address;}?></p>
                             <?php if(isset($other_data)) {echo $other_data[0]->Per_address;} ?>
                      </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">Image</label><div class="clearfix"></div>
			           
                      <?php
                        $profile_img ='';

                        if(isset($persondata))
                        {
                          $profile_img = $persondata[0]->m_image;
                        }
                        elseif(isset($other_data[0]->g_profile_img))
                        {
                          $profile_img = $other_data[0]->g_profile_img;  
                        }
                        elseif(isset($other_data[0]->m_image)){
                          $profile_img = $other_data[0]->m_image;
                        }
                      ?>

          <img src="<?php echo site_url('uploads/members/'.$profile_img)?>" width="120" class="img-circle" height="80">            
                      </div>
      <div class="form-group has-feedback col-md-6" style="height:106px">
			    <label for="exampleInputEmail1">Weapon</label><br>
			     <p><?php if(isset($persondata)) {echo $persondata[0]->m_w_type;} ?></p>    
      </div>
                    </div>
		               <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Weapon Name / NO</label>
                           <p><?php if(isset($persondata)) {echo $persondata[0]->m_no_w;}?></p> 
			              </div>
			             <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Mobile No</label>
                            <p><?php if(isset($persondata)){echo $persondata[0]->Per_number;}?></p>
                        </div>
                    </div>
		    <div class="col-md-12">
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Membership</label>
                            <p><?php if(isset($persondata)){echo $persondata[0]->m_type;}?></p>
                      </div>
                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">No of Fire</label>
                            <p><?php if(isset($persondata[0]->c_fire)){echo $persondata[0]->c_fire;} ?></p>
                      </div>
          </div>

            <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
                         <label for="exampleInputEmail1">Shooting experience</label>
                           <p><?php if(isset($persondata)){echo $persondata[0]->Per_experience;}?></p>
                      </div>
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Profession</label>
                            <p><?php if(isset($persondata[0]->c_profession)){$persondata[0]->c_profession; } ?></p>
                      </div>
            </div>                      

        
		 
    <hr style="border: 1px solid #f2f2f2;">
    <div>
      <h3 style="text-align:center;color:#8a8a8a;">Booth Details</h3>
    <hr style="border: 1px solid #f2f2f2;">      
    </div>
		
 <div class="col-md-12">
      <div class="col-md-3">
			    <label>Booth No</label>
			</div>
      <div class="col-md-3">
			    <label>Number of persons</label>
			</div>
      <div class="col-md-3">
			    <label>Range charges</label>
			</div>
      <div class="col-md-3">
			    <label>Remarks</label>
			</div>
 </div>
<div class="col-md-12">
         <div class="form-group has-feedback col-md-3">
        <p><?php if(isset($persondata[0]->bo_id)){ echo $persondata[0]->bo_id; } ?></p>                 
			</div>
			<div class="form-group has-feedback col-md-3">
        <p><?php if(isset($persondata[0]->no_persons)){ echo $persondata[0]->no_persons; } ?></p>
			</div>
       <div class="form-group has-feedback col-md-3">
        <p><?php if(isset($persondata[0]->range_charges)){ echo $persondata[0]->range_charges; } ?></p>          
			</div>
		
			<div class="form-group has-feedback col-md-3">
        <p><?php if(isset($persondata[0]->remarks)){ echo $persondata[0]->remarks; } ?></p>
			</div>
</div>

  <hr style="border: 1px solid #f2f2f2;">
    <div>
      <h3 style="text-align:center;color:#8a8a8a;">Check in guests details</h3>
    <hr style="border: 1px solid #f2f2f2;">      
    </div>
    
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
          <label>Address</label>
      </div>
      <div class="col-md-3">
          <label>Image</label>
      </div>
 </div>
 <?php if(isset($checkin_data))
    {
      foreach ($checkin_data as $value) {
        
 ?>
<div class="col-md-12">
         <div class="form-group has-feedback col-md-2">
        <p><?php echo $value->Per_name; ?></p>                 
      </div>
      <div class="form-group has-feedback col-md-2">
        <p><?php echo $value->Per_cnic; ?></p>
      </div>
       <div class="form-group has-feedback col-md-2">
        <p><?php echo $value->Per_number; ?></p>          
      </div>
    
      <div class="form-group has-feedback col-md-3">
        <p><?php echo $value->Per_address;  ?></p>
      </div>
      <div class="form-group has-feedback col-md-3">
        <p>
          <img src="<?php echo site_url('uploads/members/'.$value->g_profile_img)?>"  width="100" class="img-circle" height="80">
        </p>
      </div>
</div>	

  <?php } }?>


		     
                </div><!-- /.box-body -->
             </form>
          </div><!-- /.box -->
       </div>
     </div>
   </section>
</div>
              