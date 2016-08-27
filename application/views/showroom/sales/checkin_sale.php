<style>
    td, th {
        text-align: center;
    }

</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
          <h1>
        SSClub Dashboard
        <small> <a href="<?= site_url()?>admin/">Home</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; <a href="<?= site_url()?>ssshootingclub/index">Ssshootingclub Section</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; <a href="<?=  site_url()?>ssshootingclub/booths">Booth Section</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;
        <a href="<?= site_url('Ssshootingclub/person_detail/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(3) );?>"> Person Details</a>&nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Generated Bill</small>
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
                    <h2 style="text-align:center;">Generate Bill</h2>
                        <?php $this->load->view('include/alert'); ?>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                     <form method="post" action="<?= site_url('checkin_sale/insert_checkin_sale/'.$persondata[0]->Per_id.'/'.$this->uri->segment(3) );?>" >   
                        <table id="example1" class="table table-bordered table-striped">
                            <tbody>
                            <thead>
                            <tr>
                                <th>Name</th>
                                <td>
                                    <input type="text" name="name" value="<?= $persondata[0]->Per_name?>" class="form-control" placeholder="Enter Name" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </td>
                                <th>NIC</th>
                                <td>
                                    <input type="text" name="mobile" value="<?= $persondata[0]->Per_cnic?>" class="form-control" placeholder="Enter Nic">
                                </td>
                             </tr>
                             <tr>   
                                <th>Address</th>
                                <td>
                                    <input type="text" name="address" value="<?= $persondata[0]->Per_address?>" class="form-control" placeholder="Enter Address">
                                </td>
                                <th>Phone</th>
                                <td>
                                    <input type="text" name="number" class="form-control" value="<?= $persondata[0]->Per_number?>" placeholder="Enter Phone">
                                </td>
                              </tr> 
                              <tr> 
                                <th>Product</th>
                                <td>
                                    <select type="text" name="product_name" id="product_main" class="form-control" minlength="1" maxlength="50" id="exampleInputEmail1" required>
                                        <option>Select Option</option>
                                        <option value="Acessories">Acessories</option>
                                        <option value="Ammunition">Ammunition</option>
                                        <option value="Pistol">Pistol</option>
                                        <option value="Rifle">Rifle</option>
                                        <option value="Shortgun">Shortgun</option>
                                        <option value="Air Rifle">Air Rifle</option>
                                     </select>
                                </td>
                                <th>Product Type</th>
                                <td>
                                    <select nam='prod_type' class="form-control" id="prod_type">
                                       <option>Select Type</option>
                                    </select>
                                </td>
                               </tr> 
                               <tr>
                                <th>Product Model</th>
                                <td>
                                    <select name="prod_model" class="form-control" id="prod_model">
                                           <option>Select Type</option>
                                    </select>
                                </td>
                                <th>Prod Code</th>
                                <td>
                                    <input type="text" name="pr_code"  class="form-control"  id="pr_code" placeholder="Product code" required />
                                     <input type="hidden" name="p_id" id="p_id"/>
                                     <input type="hidden" name="par_price" id="par_price" />
                                     <input type="hidden" name="per_id" id="per_id" value="<?= $this->uri->segment(4);?>">
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </td>
                                </tr>
                                <tr>
                                <th>License No</th>
                                <td>
                                    <input type="text" name="l_no" value="<?= $persondata[0]->Per_license_no?>" class="form-control" placeholder="Enter License No">
                                </td>
                                <th>Weapon Number</th>
                                <td>
                                    <input type="text" name="weapon_no_1" class="form-control"  id="weapon_no" placeholder="Weapon Number" required/>
                                </td>
                                </tr>
                                <tr>
                                <th>Membership</th>
                                <td>
                                    <?= $persondata[0]->m_type; ?>
                                </td>
                                <th></th>
                                <td></td>
                                </tr>
                                <input type="hidden" name="c_id" value="<?= $this->uri->segment(3); ?>">
                            </thead>
                             </tbody>
                        </table>
                       <div class="col-md-12">
                                <div class="form-group has-feedback col-md-2">
                                     <label for="exampleInputEmail1">Date</label>
                                      <input type="date" name="sale_date" value="" class="form-control" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
                                 <div class="form-group has-feedback col-md-3">
                                     <label >Quantity</label>
                                     <input type="text" name="quantity" id="quantity" minlength="1" maxlength="20"  class="form-control" placeholder="Quantity" required />
                                     <p style="color:green;display:none;" id="instock">In Stock</p>
                                     <p style="color:red;display:none;" id="outstock">Sorry out of stock</p>
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
                                 <div class="form-group has-feedback col-md-2">
                                     <label for="exampleInputEmail1">Rate</label>
                                     <input type="text" name="rate" id="rate" minlength="1" maxlength="20"  class="form-control" id="exampleInputEmail1" placeholder="Rate" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
                                 <div class="form-group has-feedback col-md-2">
                                     <label for="exampleInputEmail1">Total</label>
                                     <input type="text" name="total" id="total" pattern="(?=.*\d).{1,15}" minlength="1" maxlength="100"  class="form-control" id="exampleInputEmail1" placeholder="Total" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
                                  <div class="form-group has-feedback col-md-3">
                                     <label for="exampleInputEmail1">Details</label>
                                     <input type="text" name="details" class="form-control" placeholder="Details" />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
                            </div>
                            <input type="submit" class="btn btn-info pull-right" value="Save">
                        </form>       
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.box -->
        </div>

    </section>
</div>


<script type="text/javascript">

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
          // $("#par_price").val( data.par_price );
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
        $("#weapon_no").attr("disabled","");
        $(".add_field_button").attr("disabled","");
       }else{
        $("#weapon_no").removeAttr("disabled");
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
            $("#weapon_no").val(data.par_weapon_no);
            $("#stock_weapon_no").val(data.p_quantity);
            $("#prod_type").html('<option>'+data.p_type+'</option>');
            $("#prod_model").html('<option>'+data.p_model+'</option>');
            $("#pr_code").val(data.p_code);
        }
    });
  });
});
// ----------------------- Check values in stock --------------------------//


</script>