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
	    <small> <a href="<?= site_url()?>admin/">Home</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; <a href="<?= site_url()?>ssshootingclub/index">Ssshootingclub Section</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; <a href="<?=  site_url()?>ssshootingclub/checkin_search">Check In</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Check In Searched Form </small>
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
              <?php 
              if($persondata[0]->m_valid_to < date('Y-m-d') && $persondata[0]->Per_type != 'W' )
              {

                echo '<h3 style="color:red;margin-left:30px;">MemberShip Expired</h3>';
              }

              ?>  
                <div class="box-header with-border">
                  <!--<h2 class="box-title text-primary ">Step-I</h2>-->
                  <a href="<?= site_url()?>ssshootingclub/checkin_search"class="pull-right"> Back</a>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" data-toggle="validator" action="<?=site_url()?>ssshootingclub/insert_checkin_data" method="post" enctype="multipart/form-data">
                 <div class="box-body">
                <input type="hidden" name="per_id" value="<?= $persondata[0]->Per_id; ?>">
                <input type="hidden" name="m_id"   value="<?= $persondata[0]->m_id; ?>">
                    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Name</label>
                          <input type="text" name="name" class="form-control" id="noSpacesField"  value="<?= trim($persondata[0]->Per_name);?>" required/>
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Father Name</label>
                          <input type="text" name="father_name" class="form-control" id="exampleInputEmail1" value="<?= trim($persondata[0]->Per_f_name);?>" required/>
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                       
                    </div>
                    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">License NO</label>
                          <input type="text" name="l_no" class="form-control" id="exampleInputEmail1"  value="<?= trim($persondata[0]->Per_license_no);?>" required/>
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Card No</label>
                          <input type="text" name="c_no" class="form-control" id="exampleInputEmail1" value="<?= trim($persondata[0]->m_card_no);?>"  required/>
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Arrival date</label>
                          <input type="date" name="arr_date" value="<?= date('Y-m-d');?>" class="form-control" required/>
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Arrival Time</label>
                          <input type="time" name="arr_time" class="form-control" value="<?php echo  date('H:i');?>" required  />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                    </div>
                    <div class="col-md-12">
                     <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Departure time</label>
                          <input type="time" name="dep_time" class="form-control"  value="<?php echo date("H:i"); ?>"/>
                           <span class="glyphicon form-control-feedback"  aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Mobile No</label>
                          <input type="text" name="contact" class="form-control" id="exampleInputEmail1"  value="<?= trim($persondata[0]->Per_number);?>" required />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                        </div>
                    </div>

                    <div class="col-md-12">
                       <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">NIC NO</label>
                          <input type="text" name="n_no" class="form-control" id="exampleInputEmail1" value="<?= trim($persondata[0]->Per_cnic);?>"   required/>
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>  

                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Address</label>
                          <textarea name="address" class="form-control" id="exampleInputEmail1"  required ><?=trim($persondata[0]->Per_address);?></textarea>
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                    </div>
      <div class="col-md-12">
                <div class="form-group has-feedback col-md-3">
        			    <label for="exampleInputEmail1">Image</label><div class="clearfix"></div>
        			    <a href="<?php echo site_url('uploads/members/'.$persondata[0]->m_image)?>" data-lighter >   
                  <img src="<?php echo site_url('uploads/members/'.$persondata[0]->m_image)?>"  width="100" class="img-circle" height="80" >             
                  </a>         
                </div>
                <div class="form-group has-feedback col-md-3">  
                   <label>License Image</label> <br> 
                   <a href="<?php echo site_url('uploads/members/'.$persondata[0]->license_img)?>" data-lighter >
                  <img src="<?php echo site_url('uploads/members/'.$persondata[0]->license_img)?>"  width="100" class="img-circle" height="80" >  
                   </a>
               </div> 
                         
              <div class="form-group has-feedback col-md-3">  
                   <label>NIC 1</label> <br> 
                   <a href="<?php echo site_url('uploads/members/'.$persondata[0]->m_nic_image1)?>" data-lighter >
                  <img src="<?php echo site_url('uploads/members/'.$persondata[0]->m_nic_image1)?>"  width="100" class="img-circle" height="80" >  
                   </a>
               </div> 
               <div class="form-group has-feedback col-md-2">  
                   <label>NIC 2</label> <br> 
                  <a href="<?php echo site_url('uploads/members/'.$persondata[0]->m_nic_image2)?>" data-lighter>
                  <img src="<?php echo site_url('uploads/members/'.$persondata[0]->m_nic_image2)?>"  width="100" class="img-circle" height="80" >  
                  </a> 
              </div>  
        </div>
		    <div class="col-md-12">
                       <?php $variable  =  count( $c_data ) - 1; ?>
                       <div class="form-group has-feedback col-md-6">
                        <label for="exampleInputEmail1">Weapon</label><br>
                        <input name="weapon" <?php if( isset( $c_data[$variable] ) ){ echo ( $c_data[$variable]->c_weapon == 'self' )? 'checked=checked' : ''; } ?> id="optionsRadios1" value="self" type="radio" /> &nbsp;&nbsp;&nbsp; Self &nbsp;&nbsp;&nbsp;
                        <input name="weapon" id="optionsRadios1" <?php if( isset( $c_data[$variable] ) ){ echo ( $c_data[$variable]->c_weapon == 'club' )? 'checked=checked' : ''; } ?> value="club" type="radio"  /> &nbsp;&nbsp;&nbsp; Club &nbsp;&nbsp;&nbsp;
                        <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                        <span class="help-block with-errors" style="margin-left:10px; "></span>
                       </div> 

                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Weapon Name / NO</label>
                          <input type="text" name="w_no" class="form-control" id="exampleInputEmail1" value="<?= trim($persondata[0]->Per_weapon_no);?>" required/>
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
			                   </div>
                       

        </div>
		    <div class="col-md-12">
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">MemberShip</label>
                          <select name="membership" class="form-control" required >
                        <option <?php if($persondata[0]->m_type=="Silver"){ echo "selected";} ?> value="Silver">Silver</option>
                          <option <?php if($persondata[0]->m_type=="Gold"){ echo "selected";} ?> value="Gold">Gold</option>
                          <option <?php if($persondata[0]->m_type=="Platinum"){ echo "selected";} ?> value="Platinum">Platinum</option>
                          <option <?php if($persondata[0]->m_type=="WalkIn"){ echo "selected";} ?> value="WalkIn">Walk In</option>
                          </select>
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Profession</label>
                          <input type="text" name="proffession" class="form-control" value="<?php if(!empty($c_data)){echo trim($c_data[$variable]->c_profession);} ?>" required />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                     
                    </div>
		    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Shooting Experience</label>
                          <input type="text" name="s_e" class="form-control" value="<?= trim($persondata[0]->Per_experience);?>"  required />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                   <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">No of Fire</label>
                          <input type="text" name="no_fire" class="form-control" value=""/>
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>    
                      
                    </div>
         
        <hr style="border:1px solid #f8f8f8;margin-top:10px;">  
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
                          <input type="text" name="booth_no" id="booth_no" class="form-control" required />
			                     <p style="color:green;display:none;" id="instock">Booth is empty</p>
                           <p style="color:red;display:none;" id="outstock">Booth already reserved</p>
                           <p style="color:red;display:none;" id="over_num_booth">Sorry this booth is not exist</p> 
                          <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
			<div class="form-group has-feedback col-md-3">
                          <input type="text" name="no_persons" class="form-control" value=""  required />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
                        <div class="form-group has-feedback col-md-3">
                          <input type="text" name="range_charge" class="form-control" value=""  required />
			  <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
			<div class="form-group has-feedback col-md-3">
                          <input type="text" name="remarks" class="form-control" value="" />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
    </div>
      <hr style="border:1px solid #f8f8f8;margin-bottom:30px;"> 
      <div class="clearfix"></div>        
		      <div class="heading_class">
     <h1 class="h1_class">
        
     </h1>
     
  <div class="col-md-12">
        <div class="col-md-2">
          <label>CNIC</label>
			  </div>
        <div class="col-md-2">
          <label>Name</label>			    
			  </div>
        <div class="col-md-2">
			    <label>Mobile</label>
			</div>
        <div class="col-md-2">
			    <label>Address</label>
			</div>
      <div class="col-md-1"></div>
      <div class="col-md-1">
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
     <br>  
		   <div class="col-md-12">
        
        <div class="form-group has-feedback col-md-2">
          <input type="text" name="nominated_cnic" class="form-control" id="c_nic1" value="<?php if(isset($checkin_guest_data[0])){echo trim($checkin_guest_data[0]->Per_cnic);}?>" />
          <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
          <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
			<div class="form-group has-feedback col-md-2">
      <input type="text" name="nominated_name" class="form-control" id="c_name1" value="<?php if(isset($checkin_guest_data[0])){echo trim($checkin_guest_data[0]->Per_name);}?>" />
           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
           <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
              <div class="form-group has-feedback col-md-2">
                <input type="text" name="nominated_mobile" class="form-control" id="c_mobile1" value="<?php if(isset($checkin_guest_data[0])){echo trim($checkin_guest_data[0]->Per_number);}?>" />
                 <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                <span class="help-block with-errors" style="margin-left:10px; "></span>
			      </div>
      			<div class="form-group has-feedback col-md-2">
                <input type="text" name="nominated_address" class="form-control" id="c_address1" value="<?php if(isset($checkin_guest_data[0])){echo trim($checkin_guest_data[0]->Per_address);}?>" />
                 <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                 <span class="help-block with-errors" style="margin-left:10px; "></span>
      			</div>
            <div class="col-md-1">
                <i class="fa fa-times btn emty_fields1" aria-hidden="true" style="font-size:22px"></i>
            </div>
       <div class="form-group has-feedback col-md-1">
            <div class="form-group">
              <?php 
              if(isset($checkin_guest_data[0])){
                echo '<img style="width:100px;" src="' . base_url() . 'uploads/members/' . trim($checkin_guest_data[0]->g_profile_img) . '"/>';
              }
              ?>  
              <input name="userfile_1" value="<?php if(isset($checkin_guest_data[0])){echo trim($checkin_guest_data[0]->g_profile_img);}?>" class="file-1" type="file" multiple=true>
            </div>
             <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
             <span class="help-block with-errors" style="margin-left:10px; "></span>
         </div>
        <div class="form-group has-feedback col-md-1">
            <div class="form-group">
              <?php 
              if(isset($checkin_guest_data[0])){
                echo '<img style="width:100px;" src="' . base_url() . 'uploads/members/' . trim($checkin_guest_data[0]->g_nic_1) . '"/>';
              }
              ?> 
              <input name="g1_nic_1" class="file-2" value="<?php if(isset($checkin_guest_data[0])){echo trim($checkin_guest_data[0]->g_nic_1);}?>" type="file" multiple=true>
            </div>
             <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
             <span class="help-block with-errors" style="margin-left:10px; "></span>
         </div> 
        <div class="form-group has-feedback col-md-1">
            <div class="form-group">
            <?php 
              if(isset($checkin_guest_data[0])){
                echo '<img style="width:100px;" src="' . base_url() . 'uploads/members/' . trim($checkin_guest_data[0]->g_nic_2) . '"/>';
              }
              ?> 
              <input name="g1_nic_2" class="file-3" value="<?php if(isset($checkin_guest_data[0])){echo trim($checkin_guest_data[0]->g_nic_2);}?>" type="file" multiple=true>
            </div>
             <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
             <span class="help-block with-errors" style="margin-left:10px; "></span>
         </div> 
              
    </div>
		    <div class="col-md-12">
          <div class="form-group has-feedback col-md-2">
             <input type="text" name="nominated_1_cnic" class="form-control" id="c_nic2" value="<?php if( isset($checkin_guest_data[1]) ){echo trim($checkin_guest_data[1]->Per_cnic);}?>" />
             <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
            <span class="help-block with-errors" style="margin-left:10px; "></span>
			   </div>
			<div class="form-group has-feedback col-md-2">
          <input type="text" name="nominated_1_name" class="form-control"  id="c_name2" value="<?php if( isset($checkin_guest_data[1]) ){ echo trim($checkin_guest_data[1]->Per_name);}?>" />
           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
           <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
          <div class="form-group has-feedback col-md-2">
              <input type="text" name="nominated_1_mobile" class="form-control" id="c_mobile2" value="<?php if(isset($checkin_guest_data[1]) ){echo trim($checkin_guest_data[1]->Per_number);}?>" />
             <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
              <span class="help-block with-errors" style="margin-left:10px; "></span>
		  	</div>
    			<div class="form-group has-feedback col-md-2">
            <input type="text" name="nominated_1_address" class="form-control" id="c_address2" value="<?php if(isset($checkin_guest_data[1]) ){echo trim($checkin_guest_data[1]->Per_address);}?>" />
             <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
             <span class="help-block with-errors" style="margin-left:10px; "></span>
    			</div>
          <div class="col-md-1">
                <i class="fa fa-times btn emty_fields2" aria-hidden="true" style="font-size:22px"></i>
            </div>
        <div class="form-group has-feedback col-md-1">
            <div class="form-group">
            <?php 
              if(isset($checkin_guest_data[1])){
                echo '<img style="width:100px;" src="' . base_url() . 'uploads/members/' . trim($checkin_guest_data[1]->g_profile_img) . '"/>';
              }
              ?>  
              <input name="userfile_2" value="<?php if(isset($checkin_guest_data[1])){echo trim($checkin_guest_data[1]->g_profile_img);}?>" class="file-1" type="file" multiple=true>
            </div>
             <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
             <span class="help-block with-errors" style="margin-left:10px; "></span>
      </div>
        <div class="form-group has-feedback col-md-1">
            <div class="form-group">
            <?php 
              if(isset($checkin_guest_data[1])){
                echo '<img style="width:100px;" src="' . base_url() . 'uploads/members/' . trim($checkin_guest_data[1]->g_nic_1) . '"/>';
              }
              ?>  
              <input name="g2_nic_1" value="<?php if(isset($checkin_guest_data[1])){echo trim($checkin_guest_data[1]->g_nic_1);}?>" class="file-2" type="file" multiple=true>
            </div>
             <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
             <span class="help-block with-errors" style="margin-left:10px; "></span>
         </div> 
        <div class="form-group has-feedback col-md-1">
            <div class="form-group">
              <?php 
                if(isset($checkin_guest_data[1])){
                  echo '<img style="width:100px;" src="' . base_url() . 'uploads/members/' . trim($checkin_guest_data[1]->g_nic_2) . '"/>';
                }
              ?> 
              <input name="g2_nic_2" class="file-3" value="<?php if(isset($checkin_guest_data[1])){echo trim($checkin_guest_data[1]->g_nic_2);}?>" type="file" multiple=true >
            </div>
             <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
             <span class="help-block with-errors" style="margin-left:10px; "></span>
         </div>  

    </div>
		    <div class="col-md-12">
        <div class="form-group has-feedback col-md-2">
          <input type="text" name="nominated_2_cnic" class="form-control" id="c_nic3" value="<?php if(isset($checkin_guest_data[2])){echo trim($checkin_guest_data[2]->Per_cnic);}?>" />
           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
          <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
			<div class="form-group has-feedback col-md-2">
         <input type="text" name="nominated_2_name" class="form-control" id="c_name3" value="<?php if(isset($checkin_guest_data[2])){echo trim($checkin_guest_data[2]->Per_name);}?>" />
         <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
         <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
        <div class="form-group has-feedback col-md-2">
          <input type="text" name="nominated_2_mobile" class="form-control" id="c_mobile3" value="<?php if(isset($checkin_guest_data[2])){echo trim($checkin_guest_data[2]->Per_number);}?>" />
           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
          <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
        <div class="form-group has-feedback col-md-2">
          <input type="text" name="nominated_2_address" class="form-control" id="c_address3" value="<?php if(isset($checkin_guest_data[2])){echo trim($checkin_guest_data[2]->Per_address);}?>" />
           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
           <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>

      <div class="col-md-1">
                <i class="fa fa-times btn emty_fields3" aria-hidden="true" style="font-size:22px"></i>
            </div>

    <div class="form-group has-feedback col-md-1">
            <div class="form-group">
            <?php 
                if(isset($checkin_guest_data[2])){
                  echo '<img style="width:100px;" src="' . base_url() . 'uploads/members/' . trim($checkin_guest_data[2]->g_profile_img) . '"/>';
                }
            ?> 
              <input name="userfile_3" value="<?php if(isset($checkin_guest_data[2])){echo trim($checkin_guest_data[2]->g_profile_img);}?>" class="file-1" type="file" multiple=true >
            </div>
             <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
             <span class="help-block with-errors" style="margin-left:10px; "></span>
         </div>
        <div class="form-group has-feedback col-md-1">
            <div class="form-group">
            <?php 
                if(isset($checkin_guest_data[2])){
                  echo '<img style="width:100px;" src="' . base_url() . 'uploads/members/' . trim($checkin_guest_data[2]->g_nic_1) . '"/>';
                }
            ?> 
              <input name="g3_nic_1" class="file-2" value="<?php if(isset($checkin_guest_data[2])){echo trim($checkin_guest_data[2]->g_nic_1);}?>" type="file" multiple=true >
            </div>
             <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
             <span class="help-block with-errors" style="margin-left:10px; "></span>
         </div> 
        <div class="form-group has-feedback col-md-1">
            <div class="form-group">
            <?php 
                if(isset($checkin_guest_data[2])){
                  echo '<img style="width:100px;" src="' . base_url() . 'uploads/members/' . trim($checkin_guest_data[2]->g_nic_2) . '"/>';
                }
            ?> 
              <input name="g3_nic_2" value="<?php if(isset($checkin_guest_data[2])){echo trim($checkin_guest_data[2]->g_nic_2);}?>" class="file-3" type="file" multiple=true >
            </div>
             <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
             <span class="help-block with-errors" style="margin-left:10px; "></span>
         </div>  

  </div>
  <div class="clearfix"></div>
		<div class="heading_class">
     <h1 class="h1_class">
      Nominated Guests
        </h1>
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

<div class="col-md-12" id="n_row1">
          <div class="form-group has-feedback col-md-3">
            <input type="text" readonly="" name="name1" id="n_name1" class="form-control" value="<?php if( isset( $memberdata[0] ) ) {echo trim($memberdata[0]->Per_name);}?>"/>
			</div>
			<div class="form-group has-feedback col-md-3">
            <input type="text" readonly="" name="cnic1" id="n_nic1" class="form-control" value="<?php if( isset( $memberdata[0] ) ) {echo trim($memberdata[0]->Per_cnic);}?>" />
			</div>
          <div class="form-group has-feedback col-md-3">
            <input type="text" readonly="" name="mobile1" id="n_mobile1" class="form-control" value="<?php if( isset( $memberdata[0] ) ) {echo trim($persondata[0]->Per_number);}?>" />
			</div>
			<div class="form-group has-feedback col-md-3">
          <input type="text" readonly="" name="address1" id="n_address1" class="form-control" value="<?php if( isset( $memberdata[0] ) ) {echo trim($persondata[0]->Per_address);}?>" />
			</div>
</div>

<?php// }?> 
	<div class="col-md-12" id="n_row2">
                        <div class="form-group has-feedback col-md-3">
                          <input type="text" name="name2" id="n_name2" readonly="" class="form-control" value="<?php if( isset( $memberdata[1] ) ) {echo trim($memberdata[1]->Per_name);}?>" />
			</div>
			<div class="form-group has-feedback col-md-3">
                          <input type="text" name="cnic2" id="n_nic2" readonly="" class="form-control" value="<?php if( isset( $memberdata[1] ) ) {echo trim($memberdata[1]->Per_cnic);}?>" />
			</div>
                        <div class="form-group has-feedback col-md-3">
                          <input type="text" name="mobile2" id="n_mobile2" readonly="" class="form-control" value="<?php if( isset( $memberdata[1] ) ) {echo trim($memberdata[1]->Per_number);}?>" />
			</div>
			<div class="form-group has-feedback col-md-3">
                          <input type="text" name="address2" id="n_address2" readonly="" class="form-control" value="<?php if( isset( $memberdata[1] ) ) {echo trim($memberdata[1]->Per_address);}?>" />
			</div>
  </div> 
    <div class="col-md-12" id="n_row3">
          <div class="form-group has-feedback col-md-3">
            <input type="text" name="name3" readonly="" id="n_name3" class="form-control" value="<?php if( isset( $memberdata[2] ) ) {echo trim($memberdata[2]->Per_name);}?>" />
      </div>
      <div class="form-group has-feedback col-md-3">
            <input type="text" name="cnic3"readonly="" id="n_nic3" class="form-control" value="<?php if( isset( $memberdata[2] ) ) {echo trim($memberdata[2]->Per_cnic);}?>" />
      </div>
          <div class="form-group has-feedback col-md-3">
            <input type="text" name="mobile3" readonly="" id="n_mobile3" class="form-control" value="<?php if( isset( $memberdata[2] ) ) {echo trim($memberdata[2]->Per_number);}?>" />
      </div>
      <div class="form-group has-feedback col-md-3">
            <input type="text" name="address3" id="n_address3" readonly="" class="form-control" value="<?php if( isset( $memberdata[2] ) ) {echo trim($memberdata[2]->Per_address);}?>" />
      </div>
  </div> 

		     
                </div><!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary col-sm-1 pull-right " id="save_btn">Next  <div class="fa fa-angle-double-right"></div></button>
                </div>
             </form>
          </div><!-- /.box -->
       </div>
     </div>
   </section>
</div>
              


<script type="text/javascript">
  $(document).ready(function(){
    $("#booth_no").keyup(function(){
        var booth_no = $("#booth_no").val();
        // var p_id = $("#p_id").val();
        $.ajax({
        url:"<?= site_url('ssshootingclub/check_booth_status') ?>",
        type:"POST",
        data:{booth_no:booth_no},
        success:function( e )
        {
            // alert(e);
              if(e=='empty')
                {
                    $("#instock").show();
                    $("#outstock").hide();
                    $("#over_num_booth").hide();
                    $("#save_btn").removeAttr("disabled","");
                }
                if(e=='not_empty'){
                    $("#outstock").show();
                    $("#instock").hide();
                    $("#over_num_booth").hide();
                    $("#save_btn").attr("disabled","");
                }
                if(e == 'over_num')
                {
                    $("#over_num_booth").show();
                    $("#outstock").hide();
                    $("#instock").hide();
                    $("#save_btn").attr("disabled",""); 
                }
        }
        });
    });
});


    $(".file-1").fileinput({
        showUpload: false,
        showCaption: false,
        browseClass: "btn btn-primary btn-xs",
        fileType: "any",
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
      });

    $(".file-2").fileinput({
        showUpload: false,
        showCaption: false,
        browseClass: "btn btn-primary btn-xs",
        fileType: "any",
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
      });

    $(".file-3").fileinput({
        showUpload: false,
        showCaption: false,
        browseClass: "btn btn-primary btn-xs",
        fileType: "any",
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
      });

    $("#c_nic1").keyup(function (){
        var $val = $(this).val();
        var $url = 'http://localhost:8080/ssclub/ssshootingclub/get_guest_cnic';
        $.post( $url, { cnic : $val }, function(data){
            console.log( data.Per_name );
            $('#c_name1').val(data.Per_name);
            $('#c_mobile1').val(data.Per_number);
            $('#c_address1').val(data.Per_address);
        } );
    });
    
    $("#c_nic2").keyup(function (){
        var $val = $(this).val();
        var $url = 'http://localhost:8080/ssclub/ssshootingclub/get_guest_cnic';
        $.post( $url, { cnic : $val }, function(data){
            console.log( data.Per_name );
            $('#c_name2').val(data.Per_name);
            $('#c_mobile2').val(data.Per_number);
            $('#c_address2').val(data.Per_address);
        } );
    });
    
    $("#c_nic3").keyup(function (){
        var $val = $(this).val();
        var $url = 'http://localhost:8080/ssclub/ssshootingclub/get_guest_cnic';
        $.post( $url, { cnic : $val }, function(data){
            console.log( data.Per_name );
            $('#c_name3').val(data.Per_name);
            $('#c_mobile3').val(data.Per_number);
            $('#c_address3').val(data.Per_address);
        } );
    });

</script>