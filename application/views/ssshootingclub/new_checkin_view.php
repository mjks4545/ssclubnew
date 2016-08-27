<style>
    .course{
        margin-top: 10px;
    }
  .file-preview-image {
    width: 100%;
    height: 40px!important;
}
.file-preview-frame {
    position: relative;
    display: table;
    margin: 2px;
    height: 160px;
    border: 1px solid #ddd;
    box-shadow: 1px 1px 5px 0 #a2958a;
    padding: 6px;
    float: left;
    text-align: center;
    vertical-align: middle;
    height: 50px!important;
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
                <h2 style="text-align:center;">Check In Form</h2>
                  <!--<h2 class="box-title text-primary ">Step-I</h2>-->
                  <a href="<?= site_url()?>ssshootingclub/checkin_search"class="pull-right"> Back</a>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" data-toggle="validator" action="<?=site_url()?>ssshootingclub/insert_new_checkin_data" method="post" enctype="multipart/form-data">
                 <div class="box-body">
                    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Name</label>
                          <input type="text" name="new_name" class="form-control" maxlength="50" minlength="3" id="exampleInputEmail1" value="" required/>
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Father Name</label>
                          <input type="text" name="new_father_name" class="form-control" maxlength="50" minlength="1" id="exampleInputEmail1" value="" required/>
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                       
                    </div>
                    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">License NO</label>
                          <input type="text" name="new_l_no"  class="form-control" maxlength="50" minlength="1" id="exampleInputEmail1"  value="" required/>
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Card No</label>
                          <input type="text" name="new_c_no" class="form-control" 
                          pattern="(?=.*\d).{1,}" maxlength="50" minlength="1" id="exampleInputEmail1" value=""  required/>
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Arrival Date</label>
                          <input type="date" name="arr_date" class="form-control" maxlength="50" minlength="1" placeholder="Arrival Date" required />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Arrival Time</label>
                          <input type="time" name="new_a_t" class="form-control" maxlength="50" minlength="1" id="exampleInputEmail1" placeholder="Arrival Time" required value="<?=date("h:i:a");?>" />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Departure Date</label>
                          <input type="date" name="dep_date" class="form-control" maxlength="50" minlength="1" placeholder="Departure Date" required />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Departure Time</label>
                          <input type="time" name="dep_time" class="form-control" maxlength="50" minlength="1" placeholder="Departure Time" required />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">NIC NO</label>
                          <input type="text" name="new_n_no" class="form-control" 
                          pattern="(?=.*\d).{13,13}" maxlength="13" minlength="13" id="exampleInputEmail1" value=""   required/>
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div> 
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Address</label>
                          <textarea name="new_address" class="form-control" maxlength="50" minlength="3" id="exampleInputEmail1"  required></textarea>
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
			                     <label for="exampleInputEmail1">Image</label><div class="clearfix"></div>
			                     <input type="file" name="img" class="form-control file-4" maxlength="50" placeholder="Upload Image" required >
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                
                      </div>
                      <div class="form-group has-feedback col-md-6">
              			    <label for="exampleInputEmail1">Weapon</label><br>
              			    <input name="new_weapon" id="optionsRadios1" value="self" checked="checked" type="radio" required/> &nbsp;&nbsp;&nbsp; Self &nbsp;&nbsp;&nbsp;
              			    <input name="new_weapon" id="optionsRadios1" value="club" type="radio" required/> &nbsp;&nbsp;&nbsp; Club &nbsp;&nbsp;&nbsp;
              			    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
              			    <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                    </div>
		          <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Weapon Name / NO</label>
                          <input type="text" name="new_w_no" class="form-control" maxlength="50" minlength="1" id="exampleInputEmail1" value="" required/>
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
			                   </div>
			               <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Mobile No</label>
                          <input type="text" name="new_contact" maxlength="15"  pattern="(?=.*\d).{11,}" minlength="11" class="form-control" id="exampleInputEmail1"  value="" required />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                </div>
		            <div class="col-md-12">
                <div class="form-group has-feedback col-md-6">
                        <label for="exampleInputEmail1">MemberShip</label>
                        <select name="membership" class="form-control" maxlength="50" minlength="1" placeholder="Select Membership" required>
                          <option>Select Membership</option>
                          <option value="Silver">Silver</option>
                          <option value="Gold">Gold</option>
                          <option value="Platinum">Platinum</option>
                          <option value="WalkIn">Walk In</option>
                        </select>
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                       
                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">No of Fire</label>
                          <input type="text" name="new_no_fire" class="form-control" maxlength="50" minlength="3" id="exampleInputEmail1" value="" required/>
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                </div>
                <div class="col-md-12">
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Shooting Experience</label>
                          <input type="text" name="new_s_e" class="form-control" maxlength="50" minlength="3" id="exampleInputEmail1" value=""  required />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>
                        <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Checkin Date</label>
                          <input type="date" name="c_date" class="form-control" maxlength="50" placeholder="Enter Date" required />
			                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
			                 </div>
                    </div>
                <div class="col-md-12">
                      <div class="form-group has-feedback col-md-6">
                          <label for="exampleInputEmail1">Profession</label>
                          <input type="text" name="new_proffession" class="form-control" maxlength="50" minlength="1" id="exampleInputEmail1" value="" required />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
                      </div>

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
                          <input type="text" name="new_booth_no" id="booth_no" class="form-control" maxlength="50" minlength="1" pattern="(?=.*\d).{1,}" id="exampleInputEmail1"   required />
    			                 <p style="color:green;display:none;" id="instock">Booth is empty</p>
                           <p style="color:red;display:none;" id="outstock">Booth already reserved</p>
                           <p style="color:red;display:none;" id="over_num_booth">Sorry this booth number is not available</p> 
                          <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
			<div class="form-group has-feedback col-md-3">
                          <input type="text" name="new_no_person" class="form-control"  maxlength="50" minlength="1" id="exampleInputEmail1" value=""  required />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
                        <div class="form-group has-feedback col-md-3">
                          <input type="text" name="new_range_charge" class="form-control" maxlength="50" minlength="1" id="exampleInputEmail1" value=""  required />
			  <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
			<div class="form-group has-feedback col-md-3">
                          <input type="text" name="new_remarks" class="form-control" id="exampleInputEmail1" value="" required/>
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
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
		   <div class="col-md-12">
          <div class="form-group has-feedback col-md-2">
              <input type="text" name="new_nominated_name" class="form-control" maxlength="50" minlength="3" id="exampleInputEmail1" value="" required />
              <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
              <span class="help-block with-errors" style="margin-left:10px; "></span>
  			 </div>
  			 <div class="form-group has-feedback col-md-2">
              <input type="text" name="new_nominated_cnic" pattern="(?=.*\d).{13,16}" class="form-control" maxlength="16" minlength="13" id="exampleInputEmail1" value="" required />
               <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
               <span class="help-block with-errors" style="margin-left:10px; "></span>
  			 </div>
           <div class="form-group has-feedback col-md-2">
              <input type="text" name="new_nominated_mobile" pattern="(?=.*\d).{11,16}" class="form-control" maxlength="16" minlength="11" id="exampleInputEmail1" value="" required />
               <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
              <span class="help-block with-errors" style="margin-left:10px; "></span>
  			 </div>
  			 <div class="form-group has-feedback col-md-2">
            <input type="text" name="new_nominated_address" class="form-control" id="exampleInputEmail1" value="" required/>
             <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
             <span class="help-block with-errors" style="margin-left:10px; "></span>
  			 </div>
         <div class="form-group has-feedback col-md-2">
            <div class="form-group">
              <input name="userfile_1" class="file-1" type="file" multiple=true required>
            </div>
             <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
             <span class="help-block with-errors" style="margin-left:10px; "></span>
         </div>
        <div class="form-group has-feedback col-md-1">
            <div class="form-group">
              <input name="g1_nic_1" class="file-2" type="file" multiple=true required>
            </div>
             <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
             <span class="help-block with-errors" style="margin-left:10px; "></span>
         </div> 
        <div class="form-group has-feedback col-md-1">
            <div class="form-group">
              <input name="g1_nic_2" class="file-3" type="file" multiple=true required>
            </div>
             <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
             <span class="help-block with-errors" style="margin-left:10px; "></span>
         </div>  
      </div>
  	<div class="col-md-12">
            <div class="form-group has-feedback col-md-2">
              <input type="text" name="new_nominated_1_name" class="form-control" maxlength="50" minlength="1" id="exampleInputEmail1"  required />
              <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
              <span class="help-block with-errors" style="margin-left:10px; "></span>
			     </div>
			<div class="form-group has-feedback col-md-2">
          <input type="text" name="new_nominated_1_cnic" class="form-control" maxlength="13" minlength="13" pattern="(?=.*\d).{13,13}" id="exampleInputEmail1" required />
           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
           <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
        <div class="form-group has-feedback col-md-2">
          <input type="text" name="new_nominated_1_mobile" class="form-control" maxlength="16" minlength="11" pattern="(?=.*\d).{11,16}" id="exampleInputEmail1"  required />
           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
          <span class="help-block with-errors" style="margin-left:10px; "></span>
       </div>
			<div class="form-group has-feedback col-md-2">
        <input type="text" name="new_nominated_1_address" class="form-control" id="exampleInputEmail1"  required/>
         <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
         <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>

      <div class="form-group has-feedback col-md-2">
            <div class="form-group">
              <input name="userfile_2" class="file-1" type="file" multiple=true required>
            </div>
             <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
             <span class="help-block with-errors" style="margin-left:10px; "></span>
      </div>
        <div class="form-group has-feedback col-md-1">
            <div class="form-group">
              <input name="g2_nic_1" class="file-2" type="file" multiple=true required>
            </div>
             <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
             <span class="help-block with-errors" style="margin-left:10px; "></span>
         </div> 
        <div class="form-group has-feedback col-md-1">
            <div class="form-group">
              <input name="g2_nic_2" class="file-3" type="file" multiple=true required>
            </div>
             <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
             <span class="help-block with-errors" style="margin-left:10px; "></span>
         </div>

    </div>

		    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-2">
                          <input type="text" name="new_nominated_2_name" class="form-control" maxlength="50" minlength="3" id="exampleInputEmail1" required />
			  <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
			<div class="form-group has-feedback col-md-2">
                          <input type="text" name="new_nominated_2_cnic" class="form-control" maxlength="13" minlength="13" pattern="(?=.*\d).{13,13}" id="exampleInputEmail1" required />
                           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                           <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
                        <div class="form-group has-feedback col-md-2">
                          <input type="text" name="new_nominated_2_mobile" class="form-control" pattern="(?=.*\d).{11,16}" maxlength="16" minlength="11" id="exampleInputEmail1"  required />
			  <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                          <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
			<div class="form-group has-feedback col-md-2">
          <input type="text" name="new_nominated_2_address" class="form-control" id="exampleInputEmail1"  required/>
           <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
           <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
      <div class="form-group has-feedback col-md-2">
            <div class="form-group">
              <input name="userfile_3" class="file-1" type="file" multiple=true required>
            </div>
             <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
             <span class="help-block with-errors" style="margin-left:10px; "></span>
         </div>
        <div class="form-group has-feedback col-md-1">
            <div class="form-group">
              <input name="g3_nic_1" class="file-2" type="file" multiple=true required>
            </div>
             <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
             <span class="help-block with-errors" style="margin-left:10px; "></span>
         </div> 
        <div class="form-group has-feedback col-md-1">
            <div class="form-group">
              <input name="g3_nic_2" class="file-3" type="file" multiple=true required>
            </div>
             <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
             <span class="help-block with-errors" style="margin-left:10px; "></span>
         </div>
    </div>
	
		     
                </div><!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary col-sm-1 pull-right ">Save  <div class="fa fa-angle-double-right"></div></button>
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
// =====================================================//

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
$(".file-4").fileinput({
    showUpload: false,
    showCaption: false,
    browseClass: "btn btn-primary btn-md",
    fileType: "any",
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
  });




</script>              