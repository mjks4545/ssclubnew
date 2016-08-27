
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
          <h1>
            SSClub Dashboard
            <small> <a href="<?= site_url()?>admin/">Home</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; <a href="<?= site_url()?>showroom/index">Showroom Section</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;View Product Form</small>
         </h1>
        </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h2 style="text-align:center;">View Product</h2>
                        <a href="<?= site_url()?>showroom/" class="pull-right"> Back</a>
                        <?php $this->load->view("include/alert"); ?>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" data-toggle="val idator" action="<?= site_url()?>showroom/search_product" method="post">
                        <div class="box-body">
                            <div class="col-md-6 col-sm-offset-3">
                                  <div class="form-group has-feedback">
                                     <label for="exampleInputEmail1">Product</label>
                                     <select type="text" name="product_name" id="product_main" class="form-control" minlength="1" maxlength="50" id="exampleInputEmail1" required>
                                     <option value="">Select Product</option>
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
                                </div>
                                 <div class="col-md-6 col-sm-offset-3">
                                  <div class="form-group has-feedback">
                                     <label for="exampleInputEmail1">Product Type</label>
                                    <select name="prod_type" class="form-control" id="prod_type" required>
                                       <option value="">Select Type</option>
                                    </select>
                                 </div>
                                </div>
                                <div class="col-md-6 col-sm-offset-3">
                                  <div class="form-group has-feedback">
                                     <label for="exampleInputEmail1">Product Model</label>
                                       <select name="prod_model" class="form-control" id="prod_model" required>
                                           <option value="">Select Type</option>
                                        </select>
                                 </div>
                                </div>
                                <div class="col-md-6 col-sm-offset-3">
                                  <div class="form-group has-feedback">
                                     <label for="exampleInputEmail1">Prd Code</label>
                                    <input type="text" name="pr_code"  class="form-control"  id="pr_code" placeholder="" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
                                </div>
                        <div class="box-footer col-sm-6 col-xs-offset-3 ">
                            <button type="submit" class="btn btn-primary btn-block">
                                <i class="fa fa-search" aria-hidden="true"></i>
                                Search
                            </button>
                        </div>
                        </div><!-- /.box-body -->
                    </form>
                </div><!-- /.box -->
            </div><!-- /.box -->
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