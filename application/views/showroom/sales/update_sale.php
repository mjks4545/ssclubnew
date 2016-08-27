 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
              
            <small>
               <a href="<?= site_url('admin/');?>">Home</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                <a href="<?= site_url('showroom/index');?>">Showroom</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                 <a href="<?= site_url('sale/');?>">Sale Product</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                 <a href="<?= site_url('sale/add_more_sale/'.$per_id);?>">Add more sale</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                <span>Update Sale</span>

               </small>

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
                         <h3 class="box-title"></h3>
                         <a href="<?= site_url()?>customer/" class="pull-right"> Back</a>
                     </div><!-- /.box-header -->
                     <!-- form start -->
                     <form role="form" data-toggle="validator" action="<?= site_url()?>sale/update_sale/" method="post">
                         <div class="box-body">
                             <div class="col-md-12">
                             <input type="hidden" name="c_id" value="<?= $this->uri->segment(5); ?>">
                                 <div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">Name</label>
                                     <input type="text" name="name" class="form-control" value="<?= $data[0]->Per_name?>" maxlength="50" minlength="3" placeholder="Name" required/>
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
								 <div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">Cnic</label>
                                     <input type="text" name="cnic" class="form-control" maxlength="14" value="<?= $data[0]->Per_cnic?>"  placeholder="Cnic" required/>
                                     <input type="hidden" name="p_id" id="p_id" />
                                     <input type="hidden" name="par_price" id="par_price" />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true"  style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>   
                             </div>
                             <div class="col-md-12">
                                <div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">Mobile</label>
                                     <input type="text" name="number" pattern="(?=.*\d).{10,15}" value="<?= $data[0]->Per_number?>" class="form-control" placeholder="Mobile" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
								 <div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">Address</label>
                                     <input type="text" name="address"  maxlength="200" minlength="1" value="<?= $data[0]->Per_address?>" class="form-control" placeholder="Address" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
                             </div>
							  <div class="col-md-12">
                                <div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">Product</label>
                                     <select type="text" name="product_name" id="product_main" class="form-control" minlength="1" maxlength="50" id="exampleInputEmail1" required>
                                     <option>Select Option</option>
                                        <option value="Acessories">Acessories</option>
                                        <option value="Ammunition">Ammunition</option>
                                        <option value="Pistol">Pistol</option>
                                        <option value="Rifle">Rifle</option>
                                        <option value="Shortgun">Shortgun</option>
                                        <option value="Air Rifle">Air Rifle</option>
                                     </select>
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
								  <div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">Product Type</label>
                                    <select nam='prod_type' class="form-control" id="prod_type">
                                       <option>Select Type</option>
                                    </select>
                                 </div>
                            </div>

							<div class="col-md-12">    
                                <div class="col-md-6">
                                  <div class="form-group has-feedback">
                                     <label for="exampleInputEmail1">Product Model</label>
                                       <select name="prod_model" class="form-control" id="prod_model">
                                           <option>Select Type</option>
                                        </select>
                                 </div>
                                </div>

                                <div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">Prd code</label>
                                    <input type="text" name="pr_code"  class="form-control" value="<?= $data[0]->p_code ?>" id="pr_code" placeholder="Product code" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
                                
                            </div>
                                
							<div class="col-md-12">
							     <div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">License Number</label>
                                     <input type="text" name="l_no" minlength="1" maxlength="10"  class="form-control" value="<?php if(isset($data)){ echo $data[0]->Per_license_no; } ?>" placeholder="Enter license Number" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
                                 <div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">Weapon Number</label>
                                  <div class="form-group has-feedback form-inline">
                                    <input type="text" name="weapon_no_1" class="form-control" value="<?= $data[0]->s_weapon_no?>" id="weapon_no_1" placeholder="Weapon Number" style="width:100%" />
                                    <span class="add_field_span">
                                   <!--  <button class="add_field_button btn-sm btn btn-info" style="width:8%"><i class="fa fa-plus"></i></button> -->
                                    </span>
                                        
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
                                </div>
                                
                             </div>
							 <div class="col-md-12">
                                <div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">Membership</label>
                                     <select type="text" name="m_type" class="form-control" minlength="1" maxlength="50" id="exampleInputEmail1" required>
									  <option>Select Membership</option>
                                     
									    <option>Select Membership</option>
                                        <option <?php if($data[0]->m_type=="Silver"){ echo "selected";} ?> value="Silver">Silver</option>
                                        <option <?php if($data[0]->m_type=="Gold"){ echo "selected";} ?> value="Gold">Gold</option>
                                        <option <?php if($data[0]->m_type=="Platinum"){ echo "selected";} ?> value="Platinum">Platinum</option>
                                        <option <?php if($data[0]->m_type=="WalkIn"){ echo "selected";} ?> value="WalkIn">Walk In</option>
									
                                     </select>
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
                                 <div class="form-group has-feedback col-md-6">
                                     <label>Sale update date</label>
                                     <input type="date" name="sale_date"  class="form-control" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
								 
							    
                            </div>
							<div class="col-md-12">
                                <div class="form-group has-feedback col-md-2">
                                     <label for="exampleInputEmail1">Date</label>
                                      <input type="text" name="date" value="<?= date('Y-m-d')?>" class="form-control" readonly />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
								 <div class="form-group has-feedback col-md-3">
                                     <label >Quantity</label>
                                     <input type="text" name="quantity" id="quantity" value="<?= $data[0]->s_quantity?>" minlength="1" maxlength="20" class="form-control" placeholder="Quantity" required />
                                     <p style="color:green;display:none;" id="instock">In Stock</p>
                                     <p style="color:red;display:none;" id="outstock">Sorry out of stock</p>
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
								 <div class="form-group has-feedback col-md-2">
                                     <label for="exampleInputEmail1">Rate</label>
                                     <input type="text" name="rate" id="rate" value="<?= $data[0]->s_price?>" minlength="1" maxlength="20"  class="form-control" id="exampleInputEmail1" placeholder="Rate" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
								 <div class="form-group has-feedback col-md-2">
                                     <label for="exampleInputEmail1">Total</label>
                                     <input type="text" name="total" id="total" value="<?= $data[0]->s_total_price?>" pattern="(?=.*\d).{1,15}" minlength="1" maxlength="100"  class="form-control" id="exampleInputEmail1" placeholder="Total" required />
                                     <input type="hidden" name="old_per_id" value="<?= $this->uri->segment(4) ?>"/>
                                     <input type="hidden" name="old_s_id" value="<?= $this->uri->segment(3) ?>"/>
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
								  <div class="form-group has-feedback col-md-3">
                                     <label for="exampleInputEmail1">Details</label>
                                     <input type="text" name="details" value="<?= $data[0]->notes?>" minlength="1" class="form-control" placeholder="Details" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
							    
                            </div>
							</div><!-- /.box-body -->
                         <div class="box-footer">
                             <button type="submit" class="btn btn-primary col-sm-1 pull-right" id="save_btn">Save</button>
                         </div>
                     </form>
                 </div><!-- /.box -->
             </div>
         </div>
     </section>
 </div>


 <script type="text/javascript">
 // -------------------------------- GET CODE BY DEFAULT FOR UPDATE -----------------//
$(document).ready(function(){
    var code = $("#pr_code").val();
    $.ajax({
        url:"<?= site_url('Showroom/get_code_search_data')?>",
        type:'POST',
        data:{code:code},
        success:function( data )
        {
         // alert(data);
         if(data.p_name =='Acessories' || data.p_name =='Ammunition' || data.p_name=='Air Rifle' )
       {
        $("#weapon_no_1").attr("disabled","");
        $(".add_field_button").attr("disabled","");
       }else{
        $("#weapon_no_1").removeAttr("disabled");
        $(".add_field_button").removeAttr("disabled");
       }

            $("#par_price").val( data.par_price );
            $("#p_id").val( data.p_id );    
            $("#product_main").val(data.p_name);
            $("#prod_id").val(data.p_id);
            $("#stock_weapon_no").val(data.p_quantity);
            $("#prod_type").html('<option>'+data.p_type+'</option>');
            $("#prod_model").html('<option>'+data.p_model+'</option>');
        }
    });
});
//------------------------------------------------------------------------------------//

 $(document).ready(function(){
    $('#quantity,#rate').keyup(function () {
    var qnty = $('#quantity').val();
    var rate = $("#rate").val();
    var totl = qnty * rate; 
    // alert(totl);
    $("#total").val(totl);
});
 });


$(function(){

 $("#product_main").change(function(){
     var prod_cat = this.value;
       if(prod_cat =='Acessories' || prod_cat =='Ammunition' || prod_cat=='Air Rifle' )
       {
        $("#weapon_no_1").attr("disabled","");
        $(".add_field_button").attr("disabled","");
       }else{
        $("#weapon_no_1").removeAttr("disabled");
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

///--------------------------- GET Product Code -------------------------------//
 
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
          $("#par_price").val( data.par_price );
          $("#p_id").val( data.p_id );
          $("#pr_code").val(data.p_code);
          $("#rate").val(data.sale_price);
          $("#stock_weapon_no").val(data.p_quantity);
          $("#prod_id").val(data.p_id);      
        }
    });
});

//------------------------- GET PRODUCT TYPE AND MODEL by code search /////////////

$("#pr_code").keyup(function(){
    var code = $("#pr_code").val();
    // alert(code);exit;
    $.ajax({
        url:"<?= site_url('Showroom/get_code_search_data')?>",
        type:'POST',
        data:{code:code},
        success:function( data )
        {
         // alert(data);
         if(data.p_name =='Acessories' || data.p_name =='Ammunition' || data.p_name=='Air Rifle' )
       {
        $("#weapon_no_1").attr("disabled","");
        $(".add_field_button").attr("disabled","");
       }else{
        $("#weapon_no_1").removeAttr("disabled");
        $(".add_field_button").removeAttr("disabled");
       }
            $("#par_price").val( data.par_price );
            $("#p_id").val( data.p_id );    
            $("#product_main").val(data.p_name);
            $("#prod_id").val(data.p_id);
            $("#rate").val(data.sale_price);
            $("#stock_weapon_no").val(data.p_quantity);
            $("#prod_type").html('<option>'+data.p_type+'</option>');
            $("#prod_model").html('<option>'+data.p_model+'</option>');
        }
    });
});
});
///-------------------------END HERE-----------------------------------//////////

//------------------------ Get All Data with insert Weapon No --------------//
$(document).ready(function() {
$("#weapon_no_1").keyup(function(){
    var wea_no = $("#weapon_no_1").val();
    $.ajax({
        url : "<?= site_url('Showroom/get_product_by_wea_no')?>",
        type: "POST",
        data: {wea_no:wea_no},
        success:function( data )
        {
            $("#par_price").val( data.par_price );
            $("#p_id").val( data.p_id );    
            $("#product_main").val(data.p_name);
            $("#prod_id").val(data.p_id);
            $("#rate").val(data.sale_price);
            $("#weapon_no_1").val(data.par_weapon_no);
            $("#stock_weapon_no").val(data.p_quantity);
            $("#prod_type").html('<option>'+data.p_type+'</option>');
            $("#prod_model").html('<option>'+data.p_model+'</option>');
            $("#pr_code").val(data.p_code);
        }
    });
  });
});
// ----------------------- Check values in stock --------------------------//


$(document).ready(function() {
$("#quantity").keyup(function(){

    var max_fields      = $("#quantity").val(); //maximum input boxes allowed
    var field_span         = $(".add_field_span"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(field_span).append('<div><input type="text" class="form-control" id="weapon_no" name="weapon_no_'+x+'" style="width:90%;margin-top:3px;"/ required><a href="#" class="remove_field" style="width:7%;">Remove</a></div>'); //add input box
        }
    });
    
    $(field_span).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
});

// ----------------------- Check values in stock --------------------------//

$(document).ready(function(){
    $("#quantity").keyup(function(){
        var qnty = $("#quantity").val();
        var p_id = $("#p_id").val();
        $.ajax({
        url:"<?= site_url('Showroom/check_stock_values') ?>",
        type:"POST",
        data:{qnty:qnty, p_id:p_id },
        success:function( e )
        {
            // alert(e);
              if(e=='yes')
                {
                    $("#instock").show();
                    $("#outstock").hide();
                    $("#save_btn").removeAttr("disabled","");
                }
                if(e=='no'){
                    $("#outstock").show();
                    $("#instock").hide();
                    $("#save_btn").
                    $("#save_btn").attr("disabled","");
                }
        }
        });
    });
});





</script>