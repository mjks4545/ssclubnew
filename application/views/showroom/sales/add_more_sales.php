<style>
.gbi
ll{
	margin-left:900px;
}

</style>

 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            SSclub Dashboard
            <small> <a href="<?= site_url()?>admin/">Home</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; <a href="<?= site_url()?>showroom/index">Showroom Section</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<a href="<?=site_url()?>sale/search_by_nic/">Sale Product Form</a>&nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; Add More Sales </small>
         </h1>
        </section>
     <!-- Main content -->
     <section class="content">
	 <a href="<?= site_url()?>" class="pull-right"> Back</a>
         <div class="row">
             <!-- left column -->
             <div class="col-md-12">
                 <!-- general form elements -->
                 <div class="box box-primary">
                     <div class="box-header">

                      <?php $this->load->view('include/alert'); ?>

                         <h2 class="box-" style="text-align:center;">Add More Sales </h2>
                         <!---<a href="<?= site_url()?>member/" class="pull-right"> Back</a>->
                     </div><! /.box-header -->
                     <!-- form start -->
                     <form role="form" data-toggle="validator" action="<?= site_url('sale/insert_sale_data/'.$this->uri->segment(3).'/'.$this->uri->segment(4) )?>" method="post">
                         <div class="box-body">
                            <div class="col-md-12">
                                 
								 <div class="form-group has-feedback col-md-3">
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
								 <div class="form-group has-feedback col-md-3">
                                   <label for="exampleInputEmail1">Product Type</label>
                                    <select nam='prod_type' class="form-control" id="prod_type" required>
                                       <option>Select Type</option>
                                    </select>
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
								  <div class="form-group has-feedback col-md-3">
                                     <label for="exampleInputEmail1">Product Model</label>
                                       <select name="prod_model" class="form-control" id="prod_model" required>
                                           <option>Select Type</option>
                                       </select>
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>

                                <div class="form-group has-feedback col-md-3">
                                    <label for="exampleInputEmail1">Prd code</label>
                                     <input type="text" name="pr_code"  class="form-control"  id="pr_code" required />
                                     <input type="hidden" name="p_id" id="p_id"/>
                                     <input type="hidden" name="par_price" id="par_price" />
                                     <input type="hidden" name="per_id" id="per_id" value="<?= $this->uri->segment(3);?>">
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                            </div>

							 <div class="col-md-12">
                                <div class="form-group has-feedback col-md-2">
                                    <label for="exampleInputEmail1">Weapon Number</label>
                                    <input type="text" name="weapon_no_1" class="form-control"  id="weapon_no" />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
                                 <div class="form-group has-feedback col-md-3">
                                     <label >Quantity</label>
                                     <input type="text" name="quantity" id="quantity" minlength="1" maxlength="20"  class="form-control" required />
                                     <p style="color:green;display:none;" id="instock">In Stock</p>
                                     <p style="color:red;display:none;" id="outstock">Sorry out of stock</p>
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
                                 <div class="form-group has-feedback col-md-2">
                                     <label for="exampleInputEmail1">Rate</label>
                                     <input type="text" name="rate" id="rate" minlength="1" maxlength="20"  class="form-control" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
                                 <div class="form-group has-feedback col-md-2">
                                     <label for="exampleInputEmail1">Total</label>
                                     <input type="text" name="total" id="total" pattern="(?=.*\d).{1,15}" minlength="1" maxlength="100"  class="form-control" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
                                  <div class="form-group has-feedback col-md-3">
                                     <label for="">Details</label>
                                     <input type="text" name="details" class="form-control" />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
                         <input type="hidden" name="c_id" value="<?php echo $this->uri->segment(4);  ?>">          
                            </div>
                        <div class="col-md-12">
                                <div class="form-group has-feedback col-md-3">
                                <?php if(!isset($saled_data[0]->s_date)) {?>    
                                <label for="exampleInputEmail1">Sale date</label>
                                    <input type="date" name="sale_date" class="form-control" value="<?php echo date('Y-m-d');?>" required/>
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 <?php }else{?>
                                    <input type="hidden" name="sale_date" class="form-control" value="<?php echo $saled_data[0]->s_date;?>"/>
                                    <?php }?>
                                 </div>

                        </div> 
                                
						    </div>
							<!-- /.box-body -->
                         <div class="box-footer">
							 <a href="<?= site_url('sale/sales_bill/'.$this->uri->segment(3).'/'.$this->uri->segment(4));?>" class="btn btn-primary gbill pull-right margin-left col-md-offset-1">Generate Bill</a>
                             <button type="submit" class="btn btn-primary col-sm-1 pull-right">Save</button>
                         </div> 
                     </form>
                 </div><!-- /.box -->
				 <!--=================== table =================-->
				 <div class="box">
				 <div class="box-body" style="overflow-y:scroll; overflow-x:hidden;height:270px;">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.no</th>
                                <th>Product</th>
                                <th>Product Type</th>
                                <th>Product Model </th>
                                <th>Quantity</th>
                                <th>Weapon No</th>
                                <th>Rate</th>
                                <th>Total</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $sno = 1;
                            $total_qnty = 0;
                            $total_rate = 0;

                            foreach ($saled_data as $value) { ?>
                                <tr>
								<td><?= $sno; ?></td>
                                <td><?= $value->p_name?></td>
                                <td><?= $value->p_type?></td>
                                <td><?= $value->p_model?></td>
                                <td><?= $value->s_quantity?></td>
                                <td><?= $value->s_weapon_no?></td>
                                <td><?= $value->s_price?></td>
                                <td><?= $value->s_quantity * $value->s_price;?></td>
                                <td>
                                <?php 
                                    $total_qnty =  $total_qnty + $value->s_quantity;
                                    $total_rate = $value->s_quantity * $value->s_price;
                                ?>
                                <a href="<?= site_url('sale/get_data_update/'.$value->s_id.'/'.$value->Per_id.'/'.$this->uri->segment(4) ); ?>" style="color:#9e9e9e;">Edit</a>
                                <a href="<?= site_url('sale/delete_sale/'.$value->s_quantity.'/'.$value->s_id.'/'.$value->Per_id.'/'.$this->uri->segment(4) );?>" id="delete_sale" onclick="return confirm('Are you sure you want to delete this?');" style="color:red">Delete</a>
                                </td>
                                </tr>
                                <input type="hidden" name="qnty" id="qnty" value="<?php echo $value->s_quantity?>">
                                <input type="hidden" name="c_redir_id" id="c_id" value="<?php echo $this->uri->segment(4)?>">
                                <input type="hidden" name="per_id" id="per_id" value="<?=  $value->Per_id; ?>">
                                <input type="hidden" name="s_id" id="s_id" value="<?= $value->s_id; ?>">
							 <?php $sno++; }?>
                             
                             </tbody>
                             <tr>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td><?=$total_qnty;?></td>
                                 <td></td>
                                 <td><?php $total_rate?></td>
                                 <td></td>
                                 <td></td>
                             </tr>
                        </table>
                        </div>
					</div>
				<!--=============  end ==================-->
             </div>
         </div>
     </section>
 </div>

<!-- ======================== JQuery Code ===================================-->



<script type="text/javascript">
 $(document).ready(function(){

/*$('body').on('click','#delete_sale',function(){
   if(confirm('Are you sure you want to delete this')==true )
        {    
        var per_id = $("#per_id").val(); 
        // alert(per_id);exit;
        var qnty = $("#qnty").val();
        var s_id = $("#s_id").val();
        var c_id = $("#c_id").val();
        $.ajax({
            url: "<?= site_url('sale/delete_sale')?>",
            type: 'POST',
            data: {qnty:qnty, s_id:s_id},
            success:function( data )
            {
                //console.log(data);
                location.href = "<?= site_url('sale/add_more_sale') ?>"+'/'+per_id+'/'+c_id;
            }
        });
        }
        else{
        }
});*/



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
       if(prod_cat =='pistol' || prod_cat =='Shortgun' || prod_cat=='Rifle' )
       {
        $("#weapon_no").removeAttr("disabled","");
        $(".add_field_button").removeAttr("disabled","");
       }else{
        $("#weapon_no").attr("disabled");
        $(".add_field_button").attr("disabled");
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
            // alert(data.sale_price);exit;
            // console.log(data);
          $("#rate").val(data.sale_price);
          $("#par_price").val( data.par_price );
          $("#p_id").val( data.p_id );
          $("#pr_code").val(data.p_code);
          $("#stock_weapon_no").val(data.p_quantity);
          $("#prod_id").val(data.p_id);      
        }
    });
});

//------------------------- GET PRODUCT TYPE AND MODEL by code search /////////////

$("#pr_code").keyup(function(){
    var code = $("#pr_code").val();
    $.ajax({
        url:"<?= site_url('Showroom/get_code_search_data')?>",
        type:'POST',
        data:{code:code}, 
        success:function( data ) 
        {
         
        if(data.p_name =='Pisol' || data.p_name =='Rifle' || data.p_name=='Shortgun' )
            {
            $("#weapon_no").removeAttr("disabled","");
            $(".add_field_button").removeAttr("disabled","");
           }else{
            $("#weapon_no").attr("disabled","");
            $(".add_field_button").attr("disabled","");
           }

            $("#par_price").val( data.par_price );
            $("#p_id").val( data.p_id );    
            $("#product_main").val(data.p_name);
            $("#prod_id").val(data.p_id);
            $("#stock_weapon_no").val(data.p_quantity);
            $("#rate").val(data.sale_price);
            $("#prod_type").html('<option>'+data.p_type+'</option>');
            $("#prod_model").html('<option>'+data.p_model+'</option>');
        }
    });
});
});

//------------------------ Get All Data with insert Weapon No --------------//
$(document).ready(function() {
$("#weapon_no").keyup(function(){
    var wea_no = $("#weapon_no").val();
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

//----------------------------------------------------------------------------- //

///-------------------------END HERE-----------------------------------//////////
$(document).ready(function() {

$("#quantity").keyup(function(){

    var max_fields      = $("#quantity").val(); //maximum input boxes allowed
    var field_span      = $(".add_field_span"); //Fields wrapper
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
                    $("#save_btn").attr("disabled","");
                }
        }
        });
    });
});

</script>