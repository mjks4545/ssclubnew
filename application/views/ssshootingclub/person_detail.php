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
                $p_id = $persondata[0]->Per_id;
                $m_id = $memberdata[0]->m_id;
                $c_id = $checkindata[0]->c_id;
                ?>
                <form role="form" data-toggle="validator" action="<?=site_url('ssshootingclub/save_checkin_person_data/'.$p_id.'/'.$m_id.'/'.$c_id)?>" method="post">
                 <div class="box-body">
                  <input type="hidden" name="per_id" value="<?= $persondata[0]->Per_id?>">
                  <input type="hidden" name="m_id" value="<?= $memberdata[0]->m_id?>">
                  <input type="hidden" name="c_id" value="<?= $checkindata[0]->c_id?>">
                  <input type="hidden" name="per_i_d" value="<?= $booth_data[0]->bo_id?>">
                  <input type="hidden" name="guest_1_id" value="<?= $guest_checkindata[0][0]->Per_id?>">
                  <input type="hidden" name="guest_2_id" value="<?= $guest_checkindata[1][0]->Per_id?>">
                  <input type="hidden" name="guest_3_id" value="<?= $guest_checkindata[2][0]->Per_id?>">
                  <input type="hidden" name="bo_id" value="<?= $booth_data[0]->bo_id?>">
                    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Name</label>
                          <input type="text" name="name" class="form-control" maxlength="50" minlength="1" id="exampleInputEmail1" value="<?=$persondata[0]->Per_name;?>" required/>
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Father Name</label>
                          <input type="text" name="father_name" class="form-control" maxlength="50" minlength="1" id="exampleInputEmail1" value="<?=$persondata[0]->Per_f_name;?>" required/>
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                       
                    </div>
                    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">License NO</label>
                          <input type="text" name="l_no" class="form-control" maxlength="50" minlength="1" id="exampleInputEmail1"  value="<?=$persondata[0]->Per_license_no;?>" required/>
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Card No</label>
                          <input type="text" name="c_no" class="form-control" maxlength="50" minlength="3" id="exampleInputEmail1" value="<?=$memberdata[0]->m_card_no;?>"  required/>
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Arrival date</label>
                          <input type="date" name="arr_date" class="form-control" maxlength="50"  required value="<?= $checkindata[0]->c_arrival_date?>" />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>

                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Arrival Time</label>
                          <input type="time" name="arr_t" class="form-control" maxlength="50"required value="<?= $checkindata[0]->c_arrival_time?>" />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Departure date</label>
                          <input type="date" name="dep_date" class="form-control" maxlength="50" required value="<?= $checkindata[0]->c_departure_date?>" />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>

                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Departure Time</label>
                          <input type="time" name="dep_time" class="form-control" maxlength="50" required value="<?= $checkindata[0]->c_departure_time?>" />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                    </div>
                    <div class="col-md-12">
                    <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">NIC NO</label>
                          <input type="text" name="n_no" class="form-control" maxlength="50" minlength="3" id="exampleInputEmail1" value="<?=$persondata[0]->Per_cnic;?>"   required/>
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                       
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Address</label>
                          <textarea name="address" class="form-control" maxlength="50" minlength="3" id="exampleInputEmail1"  required ><?=$persondata[0]->Per_address;?></textarea>
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">Image</label><div class="clearfix"></div>
			             <!-- <input type="file" name="img" class="form-control" maxlength="50" minlength="3" placeholder="Upload Image" required >
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                       -->
           <img src="<?php echo site_url('uploads/members/'.$memberdata[0]->m_image)?>" class="img-circle" width="100" height="90"> 
                      </div>
                      <div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">Weapon</label><br>
			     <input name="weapon" id="optionsRadios1" value="self" type="radio" <?php if($memberdata[0]->m_w_type=="self"){ echo "checked";} ?> /> &nbsp;&nbsp;&nbsp; Self &nbsp;&nbsp;&nbsp;
          <input name="weapon" id="optionsRadios1" value="club" type="radio" <?php if($memberdata[0]->m_w_type=="club"){ echo "checked";} ?> /> &nbsp;&nbsp;&nbsp; Club &nbsp;&nbsp;&nbsp;
			    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
			    <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                    </div>
		    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Weapon Name / NO</label>
                          <input type="text" name="w_no" class="form-control" maxlength="50" minlength="1" id="exampleInputEmail1" value="<?=$persondata[0]->Per_weapon_no;?>" required/>
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
			<div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Mobile No</label>
                          <input type="text" name="contact" maxlength="15"  pattern="(?=.*\d).{7,}" minlength="11" class="form-control" id="exampleInputEmail1"  value="<?=$persondata[0]->Per_number;?>" required />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                        </div>
                    </div>
		    <div class="col-md-12">
                       <div class="form-group has-feedback col-md-6">
                           <label for="exampleInputEmail1">MemberShip</label>
                           <select name="membership" class="form-control" maxlength="50" minlength="3" placeholder="Select Membership" required >
                            <option>Select Membership</option>
                            <option <?php if($persondata[0]->m_type=="Silver"){ echo "selected";} ?> value="Silver">Silver</option>
                            <option <?php if($persondata[0]->m_type=="Gold"){ echo "selected";} ?> value="Gold">Gold</option>
                            <option <?php if($persondata[0]->m_type=="Platinum"){ echo "selected";} ?> value="Platinum">Platinum</option>
                            <option <?php if($persondata[0]->m_type=="WalkIn"){ echo "selected";} ?> value="WalkIn">Walk In</option>
                           </select>
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>

                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">No of Fire</label>
                          <input type="text" name="no_fire" class="form-control" maxlength="50" minlength="3" id="exampleInputEmail1" value="<?= $checkindata[0]->c_fire;?>" required/>
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                      
                    </div>

              </div>
            <div class="col-md-12">
            <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Shooting Experience</label>
                          <input type="text" name="s_e" class="form-control" maxlength="50" minlength="3" id="exampleInputEmail1" value="<?=$persondata[0]->Per_experience;?>"  required />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                    <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Checkin date</label>
                          <input type="date" name="c_date" class="form-control" maxlength="50" required />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
                    </div>
            </div>  

                 <div class="col-md-12">
                        <!-- <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Checkout date</label>
                          <input type="date" name="checkout_date" class="form-control" maxlength="50" required />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
                         </div> -->
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Profession</label>
                          <input type="text" name="proffession" class="form-control" maxlength="50" minlength="3" id="exampleInputEmail1" value="<?= $checkindata[0]->c_profession;?>" required />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>

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
		    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-3">
                          <input type="text" name="booth_no" class="form-control" maxlength="50" minlength="1" value="<?= $booth_data[0]->bo_id?>" required />
			  <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
			<div class="form-group has-feedback col-md-3">
                          <input type="text" name="no_person" class="form-control" maxlength="50" minlength="1"value="<?= $booth_data[0]->no_persons?>"  required />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
                        <div class="form-group has-feedback col-md-3">
                          <input type="text" name="range_charge" class="form-control" maxlength="50" minlength="1" value="<?= $booth_data[0]->range_charges?>"  required />
			  <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
			<div class="form-group has-feedback col-md-3">
                          <input type="text" name="remarks" class="form-control" id="exampleInputEmail1" value="<?= $booth_data[0]->remarks?>" />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
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
<?php //echo '<pre>';print_r($guest_checkindata);die; ?>
<!--<?php 
  //foreach ($guest_checkindata as $data) {
    //foreach ($data as $value) {

  ?>-->

<div class="col-md-12">
                        <div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_name" class="form-control" maxlength="50" minlength="3" value="<?= $guest_checkindata[0][0]->Per_name?>" required />
			  <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
			<div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_cnic" class="form-control" maxlength="50" minlength="3" value="<?= $guest_checkindata[0][0]->Per_cnic?>" required />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
                        <div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_mobile" class="form-control" maxlength="50" minlength="3" value="<?= $guest_checkindata[0][0]->Per_number?>" required />
			  <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
			<div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_address" class="form-control" id="exampleInputEmail1" value="<?= $guest_checkindata[0][0]->Per_address ?>" />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
  </div>

<!-- ============================================================================-->
<div class="col-md-12">
                        <div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_1_name" class="form-control" maxlength="50" minlength="3" value="<?= $guest_checkindata[1][0]->Per_name?>" required />
        <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
      </div>
      <div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_1_cnic" class="form-control" maxlength="50" minlength="3" value="<?= $guest_checkindata[1][0]->Per_cnic?>" required />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
      </div>
                        <div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_1_mobile" class="form-control" maxlength="50" minlength="3" value="<?= $guest_checkindata[1][0]->Per_number?>" required />
        <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
      </div>
      <div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_1_address" class="form-control" id="exampleInputEmail1" value="<?= $guest_checkindata[1][0]->Per_address ?>" />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
      </div>
  </div>
<!-- ============================================================================-->  
<!-- ============================================================================-->
<div class="col-md-12">
                        <div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_2_name" class="form-control" maxlength="50" minlength="3" value="<?= $guest_checkindata[2][0]->Per_name?>" required />
        <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
      </div>
      <div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_2_cnic" class="form-control" maxlength="50" minlength="3" value="<?= $guest_checkindata[2][0]->Per_cnic?>" required />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
      </div>
                        <div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_2_mobile" class="form-control" maxlength="50" minlength="3" value="<?= $guest_checkindata[2][0]->Per_number?>" required />
        <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
      </div>
      <div class="form-group has-feedback col-md-3">
                          <input type="text" name="nominated_2_address" class="form-control" id="exampleInputEmail1" value="<?= $guest_checkindata[2][0]->Per_address ?>" />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
      </div>
  </div>
<!-- ============================================================================-->  
	<!--<?//php } } ?>-->

    <div>      
		     <!-- <h1 style="text-align: center;">
			     Check Out
		    </h1> -->
        <br>
        <hr>
     <div class="col-lg-4">
        <button type="submit" class="btn btn-info btn-block">Save</button> 
     </div>   
     <?php 
        $checkout_date = $this->input->post('checkout_date');
        $checkout_time = $this->input->post('checkout_time');
     ?>
     <!-- <div class="col-lg-4">
        <a href="<?php //echo base_url('Ssshootingclub/checkout_person/'.$checkindata[0]->c_id);?>" class="btn btn-success btn-block">CheckOut</a> 
     </div> -->   
     <div class="col-lg-4">
        <a href="<?= site_url('checkin_sale/checkin_sale_view/'.$checkindata[0]->c_id.'/'.$persondata[0]->Per_id.'/'.$this->uri->segment(4))?>" class="btn btn-warning btn-block">Generate Bill</a> 
     </div>   
		</div> 
    </div>
  </form>

<div class="box-body">
  <div class="clearfix"></div>
  <!-- ======================= Chekcout Form =============================-->
  <br>
  <br>
  <h1 style="text-align: center;">
           Check Out
        </h1>
        
        <hr>
<form method="post" action="<?= site_url('ssshootingclub/checkout_person')?>">
   <div class="col-md-12">
                        <div class="form-group col-md-4">
                          <label>Checkout date</label>
                          <input type="date" name="checkout_date" class="form-control" maxlength="50" required />
                           </div>
                      
                    <div class="form-group col-md-4">
                          <label>CheckOut time</label>
                          <input type="time" name="checkout_time" class="form-control" maxlength="50" required/>
                          <input type="hidden" name="c_id" value="<?=$checkindata[0]->c_id?>">
                          </div>
                    <br>
                    <div class="clearfix"></div>
         <input type="submit" value="Checkout" class="btn btn-success col-md-4" align="center">            
  </div>       
</form>

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
              