 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
              
            <small>Sales
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
               Sales</small>
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
                         <h3 class="box-title"></h3>
						 <a href="<?= site_url()?>sales/" class="btn btn-primary pull-left">Set Tax </a>
                         <a href="<?= site_url()?>customer/" class="pull-right"> Back</a>
                     </div><!-- /.box-header -->
                     <!-- form start -->
                     <form role="form" data-toggle="validator" action="<?= site_url()?>checkin/" method="post">
                         <div class="box-body">
                             <div class="col-md-12">
                                 <div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">Name</label>
                                     <input type="text" name="name" class="form-control" maxlength="50" minlength="1" id="exampleInputEmail1" placeholder="Name" required/>
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
								 <div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">Cnic</label>
                                     <input type="text" name="cnic" class="form-control" pattern="(?=.*\d).{13,15}" minlength="13" maxlength="15" id="exampleInputEmail1" placeholder="Cnic" required/>
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>

                                
                             </div>
                             <div class="col-md-12">
                                <div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">Mobile</label>
                                     <input type="text" name="mobile" pattern="(?=.*\d).{11,16}" class="form-control"  id="exampleInputEmail1" placeholder="Mobile" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
								 <div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">Address</label>
                                     <input type="text" name="address"  maxlength="200" minlength="1"   class="form-control" id="exampleInputEmail1" placeholder="Address" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
                             </div>
							  <div class="col-md-12">
                                <div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">Product</label>
                                     <select type="text" name="product" class="form-control" minlength="1" maxlength="50" id="exampleInputEmail1" required>
									 <option>Select Option</option>
									 <option>1</option>
									 <option>2</option>
									 </select>
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
								  <div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">Product Type</label>
                                     <input type="text" name="p_type"  maxlength="100" minlength="1"   class="form-control" id="exampleInputEmail1" placeholder="product type" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
							    
                            </div>
							<div class="col-md-12">
							<div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">License Number</label>
                                     <input type="text" name="lie_no"  pattern="(?=.*\d).{1,15}" minlength="1" maxlength="10"  class="form-control" id="exampleInputEmail1" placeholder="Enter license Number" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
                                <div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">Weapon Number</label>
                                     <input type="text" name="weapon_no"  pattern="(?=.*\d).{1,15}" minlength="1" maxlength="10"  class="form-control" id="exampleInputEmail1" placeholder="Enter Weapon no" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
                             </div>
							 <div class="col-md-12">
                                <div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">Membership</label>
                                     <select type="text" name="membership" class="form-control" minlength="1" maxlength="50" id="exampleInputEmail1" required>
									 <option>Select Membership</option>
									 <option>Silver</option>
									 <option>Gold</option>
									 </select>
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
								 <div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">P/D code</label>
                                     <input type="text" name="pd_code"  pattern="(?=.*\d).{1,15}" minlength="1" maxlength="20"  class="form-control" id="exampleInputEmail1" placeholder="P/D code" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
							    
                            </div>
							<div class="col-md-12">
                                <div class="form-group has-feedback col-md-2">
                                     <label for="exampleInputEmail1">Date</label>
                                      <input type="date" name="date"   minlength="1" maxlength="20"  class="form-control" id="exampleInputEmail1" placeholder="Date" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
								 <div class="form-group has-feedback col-md-3">
                                     <label for="exampleInputEmail1">Quantity</label>
                                     <input type="text" name="qnty"  minlength="1" maxlength="20"  class="form-control" id="exampleInputEmail1" placeholder="Quantity" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
								 <div class="form-group has-feedback col-md-2">
                                     <label for="exampleInputEmail1">Rate</label>
                                     <input type="text" name="rate"   minlength="1" maxlength="20"  class="form-control" id="exampleInputEmail1" placeholder="Rate" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
								 <div class="form-group has-feedback col-md-2">
                                     <label for="exampleInputEmail1">Total</label>
                                     <input type="text" name="total"  pattern="(?=.*\d).{1,15}" minlength="1" maxlength="100"  class="form-control" id="exampleInputEmail1" placeholder="Total" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
								  <div class="form-group has-feedback col-md-3">
                                     <label for="exampleInputEmail1">Details</label>
                                     <input type="text" name="details"  minlength="1" maxlength="20"  class="form-control" id="exampleInputEmail1" placeholder="Details" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
							    
                            </div>
							</div><!-- /.box-body -->
                         <div class="box-footer">
                             <button type="submit" class="btn btn-primary col-sm-1 pull-right">Save</button>
                         </div>
                     </form>
                 </div><!-- /.box -->
             </div>
         </div>
     </section>
 </div>