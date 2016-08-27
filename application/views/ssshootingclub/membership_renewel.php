 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
              Director Dashboard
            <small>Membership
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
               Membership Renewel</small>
          </h1>
        </section>
     <!-- Main content -->
     <section class="content">
         <div class="row">
             <!-- left column -->
             <div class="col-md-12">
                 <!-- general form elements -->
                 <div class="box box-primary">
                     <div class="box-header with-border">
                         <?php $this->load->view('include/alert'); ?>
                         <h3 class="box-title">Membership Renewel</h3>
                         <a href="<?= site_url()?>customer/" class="pull-right"> Back</a>
                     </div><!-- /.box-header -->
                     <!-- form start -->
                     <form role="form" data-toggle="validator" action="<?= site_url()?>Ssshootingclub/insert_membership_renewal" method="post">
                         <div class="box-body">
                             <div class="col-md-12">
                                 <div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">Name</label>
                                     <input type="text" name="name" class="form-control" maxlength="50" minlength="3" value="<?= $persondata[0]->Per_name?>" placeholder="Name" required/>
                                     <input type="hidden" name="red_id" value="<?= $this->uri->segment(3)?>"/>
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
								 <div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">Cnic</label>
                                     <input type="text" name="cnic" class="form-control" pattern="(?=.*\d).{13,15}" minlength="13" maxlength="15" value="<?= $persondata[0]->Per_cnic?>" placeholder="Cnic" required/>
                                     <input type="hidden" name="m_id" value="<?= $persondata[0]->m_id?>">
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>

                                
                             </div>
                             <div class="col-md-12">
                                <div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">Mobile</label>
                                     <input type="text" name="mobile" pattern="(?=.*\d).{10,15}" class="form-control"  value="<?= $persondata[0]->Per_number?>" placeholder="Mobile" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
								 <div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">Address</label>
                                     <input type="text" name="address"  maxlength="50" minlength="1"   class="form-control" value="<?= $persondata[0]->Per_address?>" placeholder="Address" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
                             </div>
							  <div class="col-md-12">
                                <div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">Membership</label>
                                     <select type="text" name="membership" class="form-control" minlength="1" maxlength="50" value="<?= $persondata[0]->m_type?>" required>
									 <option>Membership</option>
									 <option <?php if($persondata[0]->m_type=="Silver"){ echo "selected";} ?> value="Silver">Silver</option>
                                    <option <?php if($persondata[0]->m_type=="Gold"){ echo "selected";} ?> value="Gold">Gold</option>
                                    <option <?php if($persondata[0]->m_type=="Platinum"){ echo "selected";} ?> value="Platinum">Platinum</option>
                                    <option <?php if($persondata[0]->m_type=="WalkIn"){ echo "selected";} ?> value="WalkIn">Walk In</option>
									 </select>
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
							    <div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">Card Number</label>
                                     <input type="text" name="card_no"  pattern="(?=.*\d).{1,15}" minlength="1" maxlength="10"  class="form-control" value="<?= $persondata[0]->m_card_no?>" placeholder="Enter Card Number" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
                            </div>
							<div class="col-md-12">
                                <div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">Fee Schedule</label>
                                     <select type="text" name="membership" class="form-control" minlength="1" maxlength="50" value="<?= $persondata[0]->m_f_shadule?>" required>
									 <option>Fee Schedule</option>
									 <option>Monthly</option>
									 <option>Daily</option>
									 <option>Weakly</option>
									 </select>
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
								 <div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">Payments</label>
                                     <input type="text" name="payments"  pattern="(?=.*\d).{1,15}"  class="form-control" id="exampleInputEmail1" placeholder="Enter payments" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
                             </div>
							 <div class="col-md-12">
                                <div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">Valid From</label>
                                     <input type="date" name="valid_from"  class="form-control" pattern="(?=.*\d).{1,15}" id="exampleInputEmail1" placeholder="valid from" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
								 <div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">Valid To</label>
                                     <input type="date" name="valid_to"  pattern="(?=.*\d).{1,15}"  class="form-control" id="exampleInputEmail1" placeholder="Enter Remarks" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
                             </div>
                           <div class="col-md-12">
                                <div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">Renewal Date</label>
                                     <input type="date" name="ren_date"  class="form-control" pattern="(?=.*\d).{1,15}" id="exampleInputEmail1" placeholder="valid from" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>  
							</div>
                            </div><!-- /.box-body -->
                         <div class="box-footer">
                             <button type="submit" class="btn btn-primary col-sm-1 pull-right">Submit</button>
                         </div>
                     </form>
                 </div><!-- /.box -->
             </div>
         </div>
     </section>
 </div>