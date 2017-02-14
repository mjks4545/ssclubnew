 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
               
            <section class="content-header">
          <h1>
            SSClub Dashboard
            <small> <a href="<?= site_url()?>admin/">Home</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; <a href="<?= site_url()?>showroom/index">Showroom Section</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; <a href="<?=  site_url()?>showroom/parchaseproduct">Purchase Product Form</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Purchase Customer Form</small>
         </h1>
        </section>
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
                         <h2 cstyle="text-align:center;">Purchase</h2>
						 
                         <?php $this->load->view('include/alert')?>

                         <a href="<?= site_url('Showroom/parchaseproduct')?>" class="pull-right btn btn-default"> New Purchase</a>
                     </div><!-- /.box-header -->
                     <!-- form start -->
                     <form role="form" data-toggle="validator" action="<?= site_url()?>Showroom/insert_purchase_data/<?php echo $company_details[0]->Per_id;?>" method="post">
                         <div class="box-body">
                             <div class="col-md-6 col-sm-offset-3" style="width:47%;">
                                  <div class="form-group has-feedback">
                                     <label for="exampleInputEmail1">Product</label>
                                     <select name="product_name" id="product_main" class="form-control" required>
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
                                 <div class="col-md-6 col-sm-offset-3"  style="width:47%;">
                                  <div class="form-group has-feedback">
                                     <label for="exampleInputEmail1">Product Type</label>
                                    <select class="form-control" id="prod_type" required>
                                       <option value="">Select Type</option>
                                    </select>
                                 </div>
                                </div>
                                <div class="col-md-6 col-sm-offset-3" style="width:47%;">
                                  <div class="form-group has-feedback">
                                     <label for="exampleInputEmail1">Product Model</label>
                                       <select class="form-control" id="prod_model" required>
                                           <option value="">Select Type</option>
                                        </select>
                                 </div>
                                </div>

                                <div class="col-md-6 col-sm-offset-3" style="width:47%;">
                                  <div class="form-group has-feedback">
                                     <label for="exampleInputEmail1">Prd Code</label>
                                    <input type="text" name="pr_code" class="form-control"  id="pr_code" />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
                                </div>
                        
                            <div class="col-md-6 col-sm-offset-3">
                                  <div class="form-group has-feedback">
                                     <label for="exampleInputEmail1">Quantity</label>
                                    <input type="text" name="qnty"  class="form-control"  id="qnty" placeholder=""  />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
                            </div>

                            <div class="col-md-6 col-sm-offset-3">
                                     <label for="exampleInputEmail1">Weapon Number</label>
                                  <div class="form-group has-feedback form-inline weapon_appento">
                                    <input type="text" name="weapon_no_1"  class="form-control"  id="weapon_no" placeholder="" style="width:90%" disabled="" />
                                    <span class="add_field_span">
                                    <button class="add_field_button btn-sm btn btn-info" style="width:8%" disabled=""><i class="fa fa-plus"></i></button>
                                    </span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
                                </div>

                                    <input type="hidden"  name="stock_weapon_no" id="stock_weapon_no"  class="form-control"  id="stock_weapon_no" />
                                
                                
                                <div class="col-md-6 col-sm-offset-3">
                                  <div class="form-group has-feedback">
                                     <label>Remarks</label>
                                     <select class="form-control" id="remarks" name="remarks" disabled="">
                                         <option value="">Select</option>
                                         <option value="registred">Registred</option>
                                         <option value="unregistred">Un Registred</option>
                                     </select>
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
                                </div>

                                 <div class="col-md-6 col-sm-offset-3">
                                  <div class="form-group has-feedback">
                                     <label for="exampleInputEmail1">Purchase Price</label>
                                    <input type="text" name="pur_price"  class="form-control"  id="exampleInputEmail1" placeholder="" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
                                 </div>
                                 <div class="col-md-6 col-sm-offset-3">
                                  <div class="form-group has-feedback">
                                     <label for="exampleInputEmail1">Sales Price</label>
                                    <input type="text" name="sal_price"  class="form-control"  id="exampleInputEmail1" placeholder="" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
                                 </div>

                         <div class="col-md-6 col-sm-offset-3">
                                  <div class="form-group has-feedback">
                                     <label for="exampleInputEmail1">Name</label>
                                    <input type="text" name="name" class="form-control" value="<?php if($company_details){ echo trim($company_details[0]->Per_name); } ?>" required />
                                    <input type="hidden" name="per_id"  class="form-control" value="<?php if($company_details){echo trim($company_details[0]->Per_id); } ?>" />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
                        </div>

                         <div class="col-md-6 col-sm-offset-3">
                                  <div class="form-group has-feedback">
                                     <label for="exampleInputEmail1">Purchase From</label>
                                     <select type="text" name="product" class="form-control" id="purchase_from" required>
                                     <option>Select</option>
                                     <option value="Individual" <?php if($company_details){  if($company_details[0]->purchase_from=="Individual"){ echo "selected";} } ?> >Individual</option>
                                     <option value="Dealer" <?php if($company_details){ if($company_details[0]->purchase_from=="Dealer"){ echo "selected";} } ?> >Dealer</option>
                                     </select>
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
                        </div>

                        


                                
                                    <input type="hidden" name="prod_id" class="form-control"  id="prod_id" />
                               
                                
                                 <div class="col-md-6 col-sm-offset-3">
                                  <div class="form-group has-feedback">
                                     <label for="exampleInputEmail1">Cnic</label>
                                    <input type="text" name="cnic" id="per_cnic" class="form-control" value="<?php if($company_details){echo trim($company_details[0]->Per_cnic); } ?>" placeholder="" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
                                 </div>
                                 <div class="col-md-6 col-sm-offset-3">
                                  <div class="form-group has-feedback">
                                     <label for="exampleInputEmail1">Phone no</label>
                                    <input type="text" name="phone"  class="form-control" value="<?php if($company_details){echo trim($company_details[0]->Per_number); } ?>" placeholder="" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
                                 </div>
                                 <div class="col-md-6 col-sm-offset-3">
                                  <div class="form-group has-feedback">
                                     <label for="exampleInputEmail1">Address</label>
                                    <input type="text" name="address"  class="form-control" value="<?php if($company_details){echo trim($company_details[0]->Per_address); } ?>" placeholder="" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
                                 </div>
                                 <div class="col-md-6 col-sm-offset-3">
                                  <div class="form-group has-feedback">
                                     <label for="exampleInputEmail1">License no</label>
                                    <input type="text" name="le_no"  class="form-control" value="<?php if($company_details){echo trim($company_details[0]->Per_license_no); } ?>" placeholder="" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
                                 </div>


								<div class="col-md-6 col-sm-offset-3">
                                 <div class="form-group has-feedback">
                                     <label for="">Purchase date</label>
                                     <input type="date" name="par_date"  class="form-control" value="<?= date("Y-m-d")?>" placeholder="" required />
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
 <script type="text/javascript">
$(function(){

 $("#product_main").change(function(){
     var prod_cat = this.value;
       /*if(prod_cat =='Acessories' || prod_cat =='Ammunition' || prod_cat=='Air Rifle' )
       {
        $("#weapon_no").attr("disabled","");
        $(".add_field_button").attr("disabled","");
       }else{
        $("#weapon_no").removeAttr("disabled");
        $(".add_field_button").removeAttr("disabled");
       } */ 


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
        url:"<?= site_url('Showroom/get_product_code_pr')?>",
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
    /*if(code =='Ammunition'){
        $("#remarks").removeAttr("disabled","");
    }*/
    $.ajax({
        url:"<?= site_url('Showroom/get_code_search_data_pr')?>",
        type:'POST',
        data:{code:code},
        success:function( data )
        {
         
       /*  if(data.p_name =='Acessories' || data.p_name =='Ammunition' || data.p_name=='Air Rifle' )
       {
        $("#weapon_no").attr("disabled","");
         $(".add_field_button").attr("disabled","");
       }else{
        $("#weapon_no").removeAttr("disabled");
         $(".add_field_button").removeAttr("disabled");
       }*/
            $("#product_main").val(data.p_name);
            if(data.p_name == 'Rifle' || data.p_name =='Shortgun' || data.p_name =='Pistol' )
            {
                $("#remarks").removeAttr("disabled","");
                $("#weapon_no").removeAttr("disabled","");
                $(".add_field_button").removeAttr("disabled",'');
            }else if(data.p_name == 'Ammunition')
            {
                $("#remarks").removeAttr("disabled","");
            } 

            $("#prod_id").val(data.p_id);
            $("#stock_weapon_no").val(data.p_quantity);
            $("#prod_type").html('<option>'+data.p_type+'</option>');
            $("#prod_model").html('<option>'+data.p_model+'</option>');
        }
    });
});

///-------------------------END HERE-----------------------------------//////////
});


$(document).ready(function() {

$("#qnty").keyup(function(){

    var max_fields      = $("#qnty").val(); //maximum input boxes allowed
    var field_span         = $(".add_field_span"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(field_span).append('<div><input type="text" class="form-control" name="weapon_no_'+x+'" style="width:90%;margin-top:3px;"/ required><a href="#" class="remove_field" style="width:7%;">Remove</a></div>'); //add input box
        }
    });
    
    $(field_span).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
});

 /*$(function() {
        var scntDiv = $('.weapon_appento');
        var i = $('#weapon_no').size() + 1;
        
        $('.add_field_button').on('click', function() {
            // alert('hy');exit;
                $('<p><input type="text" class="form-control" name="weapon_no_'+i+'" style="width:90%;margin-top:3px;"/ required> <a href="javascript:void(0)" class="rem_field" id="remScnt">Remove</a></p>').appendTo(scntDiv);
                i++;
                return false;
        });
        
        $('body').on('click','.rem_field', function() { 
                // alert('osha kana');
                if( i > 2 ) {
                        $(this).parents('p').remove();
                        i--;
                }
                return false;
        });
});*/

 </script>
