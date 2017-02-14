 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            SS club
            <small> <a href="<?= site_url()?>admin/">Home</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; <a href="<?= site_url()?>showroom/index">Showroom Section</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Search Sale Report</small>
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
                         <h2 style="text-align:center;">Sale Report</h2>
						 
                         <a href="<?= site_url()?>" class="pull-right"> Back</a>
                     </div><!-- /.box-header -->
                     <!-- form start -->
                     <form role="form" data-toggle="validator" action="<?= site_url()?>sale_reports/sale_reports_search" method="get">
                         <div class="box-body">
                             <div class="col-md-6 col-sm-offset-3">
                                  <div class="form-group has-feedback">
                                     <label for="exampleInputEmail1">Name</label>
                                      <input type="text" name="name"  class="form-control"  id="exampleInputEmail1" placeholder="" />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
						        </div>
								 <div class="col-md-6 col-sm-offset-3">
                                  <div class="form-group has-feedback">
                                     <label for="exampleInputEmail1">Cnic</label>
                                    <input type="text" name="cnic"  class="form-control"  id="exampleInputEmail1" placeholder="">
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
						        </div>
                                <div class="col-md-6 col-sm-offset-3">
                                  <div class="form-group has-feedback">
                                     <label for="exampleInputEmail1">Bill Number</label>
                                    <input type="text" name="bill_no"  class="form-control"  id="exampleInputEmail1" placeholder="">
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
                                </div>
								<div class="col-md-6 col-sm-offset-3">
                                  <div class="form-group has-feedback">
                                     <label for="exampleInputEmail1">Weapon Number</label>
                                    <input type="text" name="wea_no"  class="form-control"  id="exampleInputEmail1" placeholder="">
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
						        </div>
								<div class="col-md-6 col-sm-offset-3">
                                  <div class="form-group has-feedback">
                                     <label for="exampleInputEmail1">License Number</label>
                                    <input type="text" name="l_no"  class="form-control"  id="exampleInputEmail1" placeholder="">
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
						        </div>
								 <div class="col-md-6 col-sm-offset-3">
                                  <div class="form-group has-feedback">
                                     <label for="exampleInputEmail1">Membership</label>
                                     <select name="membership" class="form-control" minlength="1" maxlength="50" id="exampleInputEmail1" >
    									 <option value="">Select Membership</option>
                                         <option value="gold">Gold</option>
                                         <option value="silver">silver</option>
                                         <option value="walkin">Walkin</option>
                                         <option value="Platinum">Platinum</option>
									 </select>
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
						        </div>
								
                            <div class="col-md-6 col-sm-offset-3">
                                  <div class="form-group has-feedback">
                                     <label for="exampleInputEmail1">Product</label>
                                     <select name="product_name" id="product_main" class="form-control">
                                     <option value="">Select</option>
                                     <?php 
                                     if(isset($product)){
                                        foreach ($product as  $value) {?>
                                     <option value="<?= $value?>"><?= $value?></option>
                                     <?php }}?>?>   
</select>
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
                            </div>
                                 <div class="col-md-6 col-sm-offset-3">
                                  <div class="form-group has-feedback">
                                     <label for="exampleInputEmail1">Product Type</label>
                                    <select name="prod_type" class="form-control" id="prod_type">
                                       <option value="">Select Type</option>
                                    </select>
                                 </div>
                                </div>
                                <div class="col-md-6 col-sm-offset-3">
                                  <div class="form-group has-feedback">
                                     <label for="exampleInputEmail1">Product Model</label>
                                       <select name="prod_model" class="form-control" id="prod_model">
                                           <option value="">Select Type</option>
                                        </select>
                                 </div>
                                </div>

                                <div class="col-md-6 col-sm-offset-3">
                                  <div class="form-group has-feedback">
                                     <label for="exampleInputEmail1">Prd Code</label>
                                    <input type="text" name="pr_code"  class="form-control"  id="pr_code" placeholder="">
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
                                </div>
								
								 <div class="col-md-6 col-sm-offset-3">
                                  <div class="form-group has-feedback">
                                     <label for="exampleInputEmail1">From</label>
                                    <input type="date" name="from_date"  class="form-control"  id="exampleInputEmail1" placeholder="">
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
								 </div>
								 <div class="col-md-6 col-sm-offset-3">
                                  <div class="form-group has-feedback">
                                     <label for="exampleInputEmail1">To</label>
                                    <input type="date" name="to_date"  class="form-control"  id="exampleInputEmail1" placeholder="">
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
								 </div>
							     
							</div><!-- /.box-body -->
                         <div class="box-footer">
                             <button type="submit" class="btn btn-primary col-md-6 col-sm-offset-3 ">Search</button>
                         </div>
                     </form>
                 <div class="box-body">
                    <div class="col-md-6 col-md-offset-3">
                    <hr>
                    
                    </div>
                    <!-- <div class="col-md-3 col-md-offset-3">
                                  <div class="form-group has-feedback">
                                     <label >Paid reports</label>
                                      <a href="<?//= site_url('sale_reports/paid_reports') ?>" class="btn btn-primary btn-block">Paid reports</a>
                                 </div>
                    </div> -->
                    <div class="col-md-4 col-md-offset-3">
                                  <div class="form-group has-feedback">
                                     <label >UnPaid reports</label>
                                      <a href="<?= site_url('sale_reports/unpaid_reports') ?>" class="btn btn-info btn-block">UnPaid reports</a>
                                 </div>
                    </div>
                 </div>   
                 </div><!-- /.box -->
             </div>
         </div>
     </section>
 </div>




 <script type="text/javascript">
    $(function(){

 $("#product_main").change(function(){
     var prod_cat = this.value;
       if(prod_cat =='Acessories' || prod_cat =='Ammunition' || prod_cat=='Air Rifle' )
       {
        $("#weapon_no").attr("disabled","");
        $(".add_field_button").attr("disabled","");
       }else{
        $("#weapon_no").removeAttr("disabled");
        $(".add_field_button").removeAttr("disabled");
       }  


     $("#pr_code").val('');  
    $.ajax({
        url: '<?= site_url("Showroom/get_product_cat")?>',
        type:"POST",
        data:{prod_cat:prod_cat},
        success:function( data )
        {
             $('#prod_type').each(function () {
                 $(this).html(data);
             });
        }
    });
  });

///////////////////////// Types that get model data////////////////

$("#prod_type").change(function(){
    var product = $("#product_main").val();
    var type = this.value;
    $(".prod_model").show();
    $.ajax({
        url:"<?= site_url('Showroom/get_product_type')?>",
        type:'POST',
        data:{product:product,type:type},
        success:function( data )
        {
            $('#prod_model').each(function () {
                 $(this).html(data);
             });
        }
    });
});

///--------------------------- GET Product Code-------------------------------//
 
$("#prod_model").change(function(){
    var product = $("#product_main").val();
    var type = $("#prod_type").val();
    var model = this.value;
    
    $.ajax({
        url:"<?= site_url('Showroom/get_product_code')?>",
        type:'POST',
        data:{product:product,type:type,model:model},
        success:function( data )
        {
            // alert(data.p_quantity);
            // console.log(data);
          $("#pr_code").val(data.p_code);
          $("#stock_weapon_no").val(data.p_quantity);
          $("#prod_id").val(data.p_id);      
        }
    });
});

//------------------------- GET PRODUCT TYPE AND MODEL by code search/////////////

$("#pr_code").keyup(function(){
    var code = $("#pr_code").val();
    // alert(code);exit;
    $.ajax({
        url:"<?= site_url('Showroom/get_code_search_data')?>",
        type:'POST',
        data:{code:code},
        success:function( data )
        {
         
         if(data.p_name =='Acessories' || data.p_name =='Ammunition' || data.p_name=='Air Rifle' )
       {
        $("#weapon_no").attr("disabled","");
         $(".add_field_button").attr("disabled","");
       }else{
        $("#weapon_no").removeAttr("disabled");
         $(".add_field_button").removeAttr("disabled");
       }
            $("#product_main").val(data.p_name);
            $("#prod_id").val(data.p_id);
            $("#stock_weapon_no").val(data.p_quantity);
            $("#prod_type").html('<option>'+data.p_type+'</option>');
            $("#prod_model").html('<option>'+data.p_model+'</option>');
        }
    });
});

///-------------------------END HERE-----------------------------------//////////
});

 </script>