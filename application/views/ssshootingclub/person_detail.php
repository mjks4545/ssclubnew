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
	    <small> <a href="<?= site_url()?>admin/">Home</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; <a href="<?= site_url()?>ssshootingclub/index">Ssshootingclub Section</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; <a href="<?=  site_url()?>ssshootingclub/booths">Booth Section</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; Person Details</small>
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
                <h2 style="text-align:center;">Check In Form</h2>
                  <!--<h2 class="box-title text-primary ">Step-I</h2>-->
                  <a href="<?= site_url()?>ssshootingclub/checkin_search"class="pull-right"> Back</a>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php 
                $per_id = $persondata[0]->Per_id;
                $m_id   = $memberdata[0]->m_id;
                $c_id   = $checkindata[0]->c_id;
                ?>
                <form role="form" data-toggle="validator" action="<?=site_url('ssshootingclub/save_checkin_person_data/'.$per_id.'/'.$m_id.'/'.$c_id )?>" method="post" enctype="multipart/form-data">
                 <div class="box-body">
                  <input type="hidden" name="per_id" value="<?php if($persondata){echo $persondata[0]->Per_id;} ?>">
                  <input type="hidden" name="m_id" value="<?php if($memberdata){echo $memberdata[0]->m_id;} ?>">
                  <input type="hidden" name="c_id" value="<?php if($checkindata){echo $checkindata[0]->c_id; }?>">
                  <input type="hidden" name="per_i_d" value="<?php if($booth_data){echo $booth_data[0]->bo_id; }?>">
                  <input type="hidden" name="bo_id" value="<?php if($booth_data){echo $booth_data[0]->bo_id; }?>">
                  <input type="hidden" name="g1_id" value="<?php if(isset($guest_checkindata[0][0]->g_id) ) {echo $guest_checkindata[0][0]->g_id;}?>">
                  <input type="hidden" name="g1_per_id" value="<?php if(isset($guest_checkindata[0][0]->Per_id) ){echo $guest_checkindata[0][0]->Per_id;}?>">
                  <input type="hidden" name="g2_id" value="<?php if( isset($guest_checkindata[0][1]->g_id) ) { echo $guest_checkindata[0][1]->g_id;}?>">
                  <input type="hidden" name="g2_per_id" value="<?php if(isset($guest_checkindata[0][1]->Per_id)) { echo $guest_checkindata[0][1]->Per_id;}?>">
                  <input type="hidden" name="g3_id" value="<?php if(isset($guest_checkindata[0][2]->g_id)) { echo $guest_checkindata[0][2]->g_id;}?>">
                  <input type="hidden" name="g3_per_id" value="<?php if(isset($guest_checkindata[0][2]->Per_id)) {echo $guest_checkindata[0][2]->Per_id;}?>">
                   

                    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Name</label>
                          <input type="text" name="name" class="form-control" maxlength="50" id="exampleInputEmail1" value="<?= trim($persondata[0]->Per_name);?>" required/>
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Father Name</label>
                          <input type="text" name="father_name" class="form-control" maxlength="50" id="exampleInputEmail1" value="<?=trim($persondata[0]->Per_f_name);?>" required/>
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                       
                    </div>
                    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">License NO</label>
                          <input type="text" name="l_no" class="form-control" maxlength="50" id="exampleInputEmail1"  value="<?= trim($persondata[0]->Per_license_no);?>" required/>
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Card No</label>
                          <input type="text" name="c_no" class="form-control" maxlength="50" id="exampleInputEmail1" value="<?=trim($memberdata[0]->m_card_no);?>"  required/>
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Arrival date</label>
                          <input type="date" name="arr_date" class="form-control"  required value="<?= trim($checkindata[0]->c_arrival_date);?>" />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>

                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Arrival Time</label>
                           <input type="text" name="arr_t" class="form-control" required value="<?= $checkindata[0]->c_arrival_time;?>" />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                    </div>
                    <div class="col-md-12">
                     
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Departure Time</label>
                          <input type="time" name="dep_time" class="form-control" maxlength="50" required value="<?= date('H:i');?>" />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                       <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Mobile No</label>
                          <input type="text" name="contact" class="form-control" value="<?=trim($persondata[0]->Per_number);?>" required />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                        </div>
                    </div>
                    <div class="col-md-12">
                    <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">NIC NO</label>
                          <input type="text" name="n_no" class="form-control" maxlength="50" id="exampleInputEmail1" value="<?=trim($persondata[0]->Per_cnic);?>"   required/>
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                       
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Address</label>
                          <textarea name="address" class="form-control" maxlength="50" id="exampleInputEmail1"  required ><?=trim($persondata[0]->Per_address);?></textarea>
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-3">
			                     <label for="exampleInputEmail1">Image</label><div class="clearfix"></div>
                            <a href="<?php echo site_url('uploads/members/'.$memberdata[0]->m_image)?>" data-lighter >
                            <img src="<?php echo site_url('uploads/members/'.$memberdata[0]->m_image)?>" class="img-circle" width="100" height="90"> 
                            </a>
                            <input type="file" name="img" class="form-control file-2" >
                      </div>
                      <div class="form-group col-md-3">
                            <label>License Image</label><br>
                        <a href="<?php echo site_url('uploads/members/'.$memberdata[0]->license_img)?>" data-lighter >
                        <img src="<?php echo site_url('uploads/members/'.$memberdata[0]->license_img)?>" class="img-circle" width="100" height="90">     
                        </a>
                        <input name="lic_img" class="file-2" type="file" multiple=true >
                      </div>
                      
                    <div class="form-group has-feedback col-md-3"> 
                        <label>NIC 1</label><br>
                        <a href="<?php echo site_url('uploads/members/'.$memberdata[0]->m_nic_image1)?>" data-lighter >
                        <img src="<?php echo site_url('uploads/members/'.$memberdata[0]->m_nic_image1)?>" class="img-circle" width="100" height="90">     
                        </a>
                        <input name="p_nic_1" class="file-2" type="file" multiple=true >
                    </div>
                    <div class="form-group col-md-3">
                            <label>NIC 2</label><br>
                        <a href="<?php echo site_url('uploads/members/'.$memberdata[0]->m_nic_image2)?>" data-lighter >
                        <img src="<?php echo site_url('uploads/members/'.$memberdata[0]->m_nic_image2)?>" class="img-circle" width="100" height="90">     
                        </a>
                      <input name="p_nic_2" class="file-2" type="file" multiple=true >
                    </div>  

      </div>

		    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">  
                            <label for="exampleInputEmail1">Weapon Name / NO</label>
                            <input type="text" name="w_no" class="form-control" maxlength="50" id="exampleInputEmail1" value="<?=trim($persondata[0]->Per_weapon_no);?>" required/>
                             <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                             <span class="help-block with-errors" style="margin-left:10px; "></span>
			                 </div>
                        <div class="form-group has-feedback col-md-6">
                            <label for="exampleInputEmail1">Weapon</label><br>
                             <input name="weapon" value="self" type="radio" <?php if( $checkindata[0]->c_weapon=="self"){ echo "checked"; } ?> required/> &nbsp;&nbsp;&nbsp; Self &nbsp;&nbsp;&nbsp;
                            <input name="weapon" value="club" type="radio" <?php if( $checkindata[0]->c_weapon=="club"){ echo "checked"; } ?> required/> &nbsp;&nbsp;&nbsp; Club &nbsp;&nbsp;&nbsp;
                            <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                            <span class="help-block with-errors" style="margin-left:10px; "></span>
                        </div>
                   
        </div>
		          <div class="col-md-12">
                       <div class="form-group has-feedback col-md-6">
                           <label for="exampleInputEmail1">MemberShip</label>
                           <select name="membership" class="form-control" required >
                            <option value="">Select Membership</option>
                            <option <?php if($memberdata[0]->m_type=="Silver"){ echo "selected";} ?> value="Silver">Silver</option>
                            <option <?php if($memberdata[0]->m_type=="Gold"){ echo "selected";} ?> value="Gold">Gold</option>
                            <option <?php if($memberdata[0]->m_type=="Platinum"){ echo "selected";} ?> value="Platinum">Platinum</option>
                            <option <?php if($memberdata[0]->m_type=="WalkIn"){ echo "selected";} ?> value="WalkIn">Walk In</option>
                           </select>
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>

                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Profession</label>
                          <input type="text" name="proffession" class="form-control" maxlength="50" id="exampleInputEmail1" value="<?= trim($checkindata[0]->c_profession);?>" required />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>  
                    </div>

            <div class="col-md-12">
            <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Shooting Experience</label>
                          <input type="text" name="s_e" class="form-control" maxlength="50" id="exampleInputEmail1" value="<?=trim($persondata[0]->Per_experience);?>"  required />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                  <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">No of Fire</label>
                          <input type="text" name="no_fire" id="no_fire_checkin" class="form-control"  value="<?= trim($checkindata[0]->c_fire);?>" />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                    <!-- <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Checkin date</label>
                          <input type="date" name="c_date" class="form-control" maxlength="50" required />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
                    </div> -->
            </div>  
            <div class="col-md-12">
                      
            </div>     
              <br>
              <hr style="border:1px solid #f8f8f8;">
              <div class="clearfix"></div>
      <div class="heading_class">
        <div class="col-md-12">
                        <div class="col-md-3">
			    <label>Booth Number</label>
			</div>
                        <div class="col-md-3">
			    <label>No of Persons</label>
			</div>
                        <div class="col-md-3">
			    <label>Range Charges</label>
			</div>
                        <div class="col-md-3">
			    <label>Remarks</label>
			</div>
      </div>
     </div> 
     <br>
		    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-3">
                          <input type="text" name="booth_no" class="form-control" maxlength="50" value="<?= trim($booth_data[0]->bo_id);?>" required />
			  <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
			<div class="form-group has-feedback col-md-3">
                          <input type="text" name="no_person" class="form-control" maxlength="50" value="<?= trim($checkindata[0]->no_persons);?>"  required />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
                        <div class="form-group has-feedback col-md-3">
                          <input type="text" name="range_charge" class="form-control" maxlength="50" value="<?= trim($checkindata[0]->range_charge);?>"  required />
			  <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
			<div class="form-group has-feedback col-md-3">
                          <input type="text" name="remarks" class="form-control" id="exampleInputEmail1" value="<?= trim($checkindata[0]->remarks);?>" />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
   
       <hr style="border:1px solid #f8f8f8;"> 

      <div class="heading_class">
      
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
        <div class="col-md-2">
          <label>Address</label>
      </div>
      <div class="col-md-2">
          <label>Profile Image</label>
      </div>
      <div class="col-md-1">
          <label>NIC image 1</label>
      </div>
      <div class="col-md-1">
          <label>NIC image 2</label>
      </div>
      </div>
  </div> 
    </div>
    <br>
<?php //echo '<pre>';print_r($guest_checkindata);die; ?>
<!--<?php 
  //foreach ($guest_checkindata as $data) {
    //foreach ($data as $value) {

  ?>-->

<div class="col-md-12">
                        <div class="form-group has-feedback col-md-2">
                          <input type="text" name="nominated_name" class="form-control" maxlength="50" value="<?php if(isset($guest_checkindata[0][0]->Per_name) ){ echo trim($guest_checkindata[0][0]->Per_name);} ?>" />
			  <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
			<div class="form-group has-feedback col-md-2">
                          <input type="text" name="nominated_cnic" class="form-control" maxlength="50" value="<?php if(isset($guest_checkindata[0][0]->Per_cnic) ){ echo trim($guest_checkindata[0][0]->Per_cnic);} ?>" />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
                        <div class="form-group has-feedback col-md-2">
                          <input type="text" name="nominated_mobile" class="form-control" maxlength="50" value="<?php if(isset($guest_checkindata[0][0]->Per_number) ){ echo trim($guest_checkindata[0][0]->Per_number); } ?>" />
			  <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
			<div class="form-group has-feedback col-md-2">
                          <input type="text" name="nominated_address" class="form-control" id="exampleInputEmail1" value="<?php if(isset($guest_checkindata[0][0]->Per_address) ){ echo trim($guest_checkindata[0][0]->Per_address); } ?>" />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
       <div class="form-group has-feedback col-md-2">
            <div class="form-group">
        <?php if(isset($guest_checkindata[0][0]->g_profile_img)){$g_pro_img = $guest_checkindata[0][0]->g_profile_img;}else{$g_pro_img = '';}?>    
            <a href="<?php echo site_url('uploads/members/'.$g_pro_img )?>" data-lighter >
            <img src="<?php echo site_url('uploads/members/'.$g_pro_img )?>" class="img-circle" width="90" height="70"> 
            </a>
              <input name="userfile_1" class="file-2" type="file" multiple=true>
            </div>
             <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
             <span class="help-block with-errors" style="margin-left:10px; "></span>
         </div>
        <div class="form-group has-feedback col-md-1">
            <div class="form-group">
        <?php if(isset($guest_checkindata[0][0]->g_nic_1)){$g_nic1_img = $guest_checkindata[0][0]->g_nic_1;}else{$g_nic1_img = '';}?>        
            <a href="<?php echo site_url('uploads/members/'.$g_nic1_img )?>" data-lighter >
            <img src="<?php echo site_url('uploads/members/'.$g_nic1_img )?>" class="img-circle" width="90" height="70"> 
            </a>
              <input name="g1_nic_1" class="file-2" type="file" multiple=true>
            </div>
             <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
             <span class="help-block with-errors" style="margin-left:10px; "></span>
         </div>
        <div class="form-group has-feedback col-md-1">
            <div class="form-group">
        <?php if(isset($guest_checkindata[0][0]->g_nic_2)){$g2_nic_2 = $guest_checkindata[0][0]->g_nic_2;}else{$g2_nic_2 = '';}?>    
              <a href="<?php echo site_url('uploads/members/'.$g2_nic_2 )?>" data-lighter >
              <img src="<?php echo site_url('uploads/members/'.$g2_nic_2 )?>" class="img-circle" width="90" height="70"> 
              </a>
              <input name="g1_nic_2" class="file-2" type="file" multiple=true>
            </div>
             <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
             <span class="help-block with-errors" style="margin-left:10px; "></span>
         </div>  
  </div>

<!-- ============================================================================-->
<div class="col-md-12">
        <div class="form-group has-feedback col-md-2">
          <input type="text" name="nominated_1_name" class="form-control" maxlength="50" value="<?php if(isset($guest_checkindata[0][1]->Per_name)){ echo trim($guest_checkindata[0][1]->Per_name); } ?>" />
          <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
          <span class="help-block with-errors" style="margin-left:10px; "></span>
        </div>
      <div class="form-group has-feedback col-md-2">
        <input type="text" name="nominated_1_cnic" class="form-control" maxlength="50" value="<?php if(isset($guest_checkindata[0][1]->Per_cnic) ){ echo trim($guest_checkindata[0][1]->Per_cnic); }?>" />
         <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
         <span class="help-block with-errors" style="margin-left:10px; "></span>
      </div>
      <div class="form-group has-feedback col-md-2">
        <input type="text" name="nominated_1_mobile" class="form-control" maxlength="50" value="<?php if(isset($guest_checkindata[0][1]->Per_number) ){ echo trim($guest_checkindata[0][1]->Per_number); }?>" />
        <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
        <span class="help-block with-errors" style="margin-left:10px; "></span>
      </div>
      <div class="form-group has-feedback col-md-2">
        <input type="text" name="nominated_1_address" class="form-control" id="exampleInputEmail1" value="<?php if(isset($guest_checkindata[0][1]->Per_address) ){ echo trim($guest_checkindata[0][1]->Per_address); } ?>" />
         <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
         <span class="help-block with-errors" style="margin-left:10px; "></span>
      </div>

             <div class="form-group has-feedback col-md-2">
            <div class="form-group">
            <?php if(isset($guest_checkindata[0][1]->g_profile_img)){$g_pro_pic = $guest_checkindata[0][1]->g_profile_img;}else{$g_pro_pic = '';}?>
            <!--<?//php if( isset($guest_checkindata[0][1]->g_profile_img) ){ $g_profile = $guest_checkindata[0][1]->g_profile_img; }else{$g_profile = 'axmq_2.gif';}  ?>-->
            <a href="<?php echo site_url('uploads/members/'.$g_pro_pic)?>" data-lighter>
            <img src="<?php echo site_url('uploads/members/'.$g_pro_pic)?>" class="img-circle" width="90" height="70"> 
            </a>
              <input name="userfile_2" class="file-2" type="file" multiple=true>
            </div>
             <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
             <span class="help-block with-errors" style="margin-left:10px; "></span>
         </div>
        <div class="form-group has-feedback col-md-1">
            <div class="form-group">
           <!-- <?//php if(isset($guest_checkindata[0][1]->g_nic_1)){$g2_nic = $guest_checkindata[0][1]->g_nic_1; }else{$g2_nic = 'axmq_2.gif';}  ?>-->
          <?php if(isset($guest_checkindata[0][1]->g_nic_1)){$g_nic1_pic = $guest_checkindata[0][1]->g_nic_1;}else{$g_nic1_pic = '';}?>  
            <a href="<?php echo site_url('uploads/members/'.$g_nic1_pic )?>" data-lighter >
            <img src="<?php echo site_url('uploads/members/'.$g_nic1_pic )?>" class="img-circle" width="90" height="70"> 
            </a>
              <input name="g2_nic_1" class="file-2" type="file" multiple=true>
            </div>
             <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
             <span class="help-block with-errors" style="margin-left:10px; "></span>
         </div>
        <div class="form-group has-feedback col-md-1">
            <div class="form-group">
            <!--<?//php if(isset($guest_checkindata[0][1]->g_nic_2 )){$g2_nic2 = $guest_checkindata[0][1]->g_nic_2; }else{$g2_nic2 = 'axmq_3.gif';}  ?>-->
        <?php if(isset($guest_checkindata[0][1]->g_nic_2)){$g_nic2_pic = $guest_checkindata[0][1]->g_nic_2;}else{$g_nic2_pic = '';}?>  
            <a href="<?php echo site_url('uploads/members/'.$g_nic2_pic )?>">
            <img src="<?php echo site_url('uploads/members/'.$g_nic2_pic )?>" class="img-circle" width="90" height="70"> 
            </a>
              <input name="g2_nic_2" class="file-2" type="file" multiple=true>
            </div>
             <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
             <span class="help-block with-errors" style="margin-left:10px; "></span>
         </div> 

  </div> 
<!-- ============================================================================-->
<div class="col-md-12">
                        <div class="form-group has-feedback col-md-2">
                          <input type="text" name="nominated_2_name" class="form-control" maxlength="50" value="<?php if(isset($guest_checkindata[0][2]->Per_name) ){ echo trim($guest_checkindata[0][2]->Per_name); }?>" />
        <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
      </div>
      <div class="form-group has-feedback col-md-2">
                          <input type="text" name="nominated_2_cnic" class="form-control" maxlength="50" value="<?php if(isset($guest_checkindata[0][2]->Per_cnic) ){ echo trim($guest_checkindata[0][2]->Per_cnic); }?>" />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
      </div>
                        <div class="form-group has-feedback col-md-2">
                          <input type="text" name="nominated_2_mobile" class="form-control" maxlength="50" value="<?php if(isset($guest_checkindata[0][2]->Per_number) ){ echo trim($guest_checkindata[0][2]->Per_number); }?>" />
        <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
      </div>
      <div class="form-group has-feedback col-md-2">
                          <input type="text" name="nominated_2_address" class="form-control" id="exampleInputEmail1" value="<?php if(isset($guest_checkindata[0][2]->Per_address) ){ echo trim($guest_checkindata[0][2]->Per_address); }?>" />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
      </div>

        <div class="form-group has-feedback col-md-2">
            <div class="form-group">
           <!-- <?//php if(isset($guest_checkindata[0][2]->g_profile_img )){$g2_prof = $guest_checkindata[0][2]->g_profile_img; }else{$g2_prof = 'aqxz_2.gif';}  ?>-->
        <?php if(isset($guest_checkindata[0][2]->g_profile_img)){$g2_pro_pic = $guest_checkindata[0][2]->g_profile_img;}else{$g2_pro_pic = '';}?> 
            <a href="<?php echo site_url('uploads/members/'.$g2_pro_pic )?>">
              <img src="<?php echo site_url('uploads/members/'.$g2_pro_pic )?>" class="img-circle" width="90" height="70"> 
            </a>
              <input name="userfile_3" class="file-2" type="file" multiple=true>
            </div>
             <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
             <span class="help-block with-errors" style="margin-left:10px; "></span>
         </div>
        <div class="form-group has-feedback col-md-1">
            <div class="form-group">
           <!-- <?//php if(isset($guest_checkindata[0][2]->g_nic_1 )){$g2_nic1 = $guest_checkindata[0][2]->g_nic_1; }else{$g2_nic1 = 'sqax_2.gif';}  ?>-->
      <?php if(isset($guest_checkindata[0][2]->g_nic_1)){$g2_nic_1 = $guest_checkindata[0][2]->g_nic_1;}else{$g2_nic_1 = '';}?> 
            <a href="<?php echo site_url('uploads/members/'.$g2_nic_1 )?>">
            <img src="<?php echo site_url('uploads/members/'.$g2_nic_1 )?>" class="img-circle" width="90" height="70"> 
            </a>
              <input name="g3_nic_1" class="file-2" type="file" multiple=true>
            </div>
             <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
             <span class="help-block with-errors" style="margin-left:10px; "></span>
         </div>
        <div class="form-group has-feedback col-md-1">
            <div class="form-group">
            <!--<?//php if(isset($guest_checkindata[0][2]->g_nic_2 )){$g2_nic2 = $guest_checkindata[0][2]->g_nic_2; }else{$g2_nic2 = 'saqzx_2.gif';}  ?>-->
    <?php if(isset($guest_checkindata[0][2]->g_nic_2)){$g2_nic_2 = $guest_checkindata[0][2]->g_nic_2;}else{$g2_nic_2 = '';}?>       
            <a href="<?php echo site_url('uploads/members/'.$g2_nic_2 )?>">
            <img src="<?php echo site_url('uploads/members/'.$g2_nic_2 )?>" class="img-circle" width="90" height="70"> 
            </a>
              <input name="g3_nic_2" class="file-2" type="file" multiple=true>
            </div>
             <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
             <span class="help-block with-errors" style="margin-left:10px; "></span>
         </div> 

  </div>
  <hr style="">
<!-- ============================================================================-->  
	<!--<?//php } } ?>-->

    <div>      
		     
        <hr>
     <div class="col-lg-12">
        <input type="submit" value="Save" class="btn btn-success pull-right" align="center">             
     </div>   
     <?php 
        $checkout_date = $this->input->post('checkout_date');
        $checkout_time = $this->input->post('checkout_time');
     ?>
     

		</div> 
    </div>
  </form>
  <br>
<div class="col-lg-4">
        <a href="<?= site_url('ssshootingclub/checkout_person/'.$checkindata[0]->c_id.'/'.$checkindata[0]->c_departure_time.'/'.$checkindata[0]->c_arrival_date)?>" id="checkout_btn" class="btn btn-warning btn-block">Checkout</a> 
     </div> 
     <div class="col-lg-4">
        <a href="<?= site_url('checkin_sale/checkin_sale_view/'.$checkindata[0]->c_id.'/'.$persondata[0]->Per_id.'/'.$this->uri->segment(4))?>" class="btn btn-warning btn-block">Generate Bill</a> 
     </div>
     <div class="col-lg-1"></div>
     <div class="col-lg-2">
       <?php if(!empty($bill_data)){echo "<h4>Bill Number: ";?>  <a href="<?= site_url('sale_reports/sale_bill_reports/'.$bill_data[0]->per_id.'/'.$bill_data[0]->b_id.'/'.$bill_data[0]->s_id )?>"><?=$bill_data[0]->b_id ?></a></h4><?php }?>
     </div>
<div class="box-body">
  <div class="clearfix"></div>
  <!-- ======================= Chekcout Form =============================-->
  <br>
  <br>
  <!-- <h1 style="text-align: center;">
           Check Out
        </h1>
        
        <hr>
<form method="post" action="<?//= site_url('ssshootingclub/checkout_person')?>">
   <div class="col-md-12">
                        <div class="form-group col-md-4">
                          <label>Checkout date</label>
                          <input type="date" name="checkout_date" class="form-control" maxlength="50" required />
                           </div>
                      
                    <div class="form-group col-md-4">
                          <label>CheckOut time</label>
                          <input type="time" name="checkout_time" class="form-control" maxlength="50" required/>
                          <input type="hidden" name="c_id" value="<//?=$checkindata[0]->c_id?>">
                          </div>
                    <br>
                    <div class="clearfix"></div>
         <input type="submit" value="Checkout" class="btn btn-success col-md-4" align="center">            
  </div>       
</form>

</div> -->
   </div>
                </div><!-- /.box-body -->
                <!-- <div class="box-footer">
                  <button type="submit" class="btn btn-primary col-sm-1 pull-right ">Next  <div class="fa fa-angle-double-right"></div></button>
                </div> -->
             
          </div><!-- /.box -->
       </div>
     </div>
   </section>
</div>
              

<script type="text/javascript">
  $(".file-2").fileinput({
    showUpload: false,
    showCaption: false,
    browseClass: "btn btn-primary btn-xs",
    fileType: "any",
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
  });
</script>              