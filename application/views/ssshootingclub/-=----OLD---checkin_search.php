<style>
    .course{
        margin-top: 10px;
    }
    .list-group-item {
    position: relative;
    display: block;
    padding: 4px 15px;
    margin-bottom: -1px;
    background-color: #fff;
    border: 1px solid #f9f9f9;
}
ul{
	list-style-type:none;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
	SSClub Dashboard
	<small> <a href="<?= site_url()?>admin/">Home</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; <a href="<?= site_url()?>ssshootingclub/index">Ssshootingclub Section</a> &nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; Check In</small>
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
		  <h2 class="box-title text-primary ">Step-I</h2>
		  <a href="<?= site_url()?>ssshootingclub/index" class="btn btn-primary pull-right"> Back</a>
		</div><!-- /.box-header -->
		<!-- form start -->
		<form role="form" data-toggle="validator" action="<?= site_url()?>ssshootingclub/checkmember" method="post">
		    <div class="box-body">
			<div class="col-md-12">
			    <div class="col-md-3"></div>
			    <div class="form-group has-feedback col-md-6">
			      <label for="idcnic">Cnic OR Card Number</label>
			      <input type="text" name="cnic_cardno" id="cnic_no" value="" class="form-control" maxlength="50" minlength="3" id="idcnic" placeholder="Enter Cnic or Card Number" required/>
			       <div id="s_result" style="display:none"></div>
			       <ul id="nic_data"class="dropdown">
			       	<li>
			       		
			       	</li>
			       </ul>
			       <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
			       <span class="help-block with-errors" style="margin-left:10px; "></span>
			       <input type="hidden" name="checkin_id">
			    </div>
			</div>               
		    </div><!-- /.box-body -->
		    <div class="box-footer">
		      <button type="submit" class="btn btn-primary col-sm-1 pull-right ">Next  <div class="fa fa-angle-double-right"></div></button>
		    </div>
		</form>
	    </div><!-- /.box -->
	</div>
      </div>
    </section>
</div>
              
 <script type="text/javascript">
 $(document).ready(function(){
 	 $("#idcnic").keyup(function(){
       var search = $("#idcnic").val();

       $.ajax({
       	url : '<?php echo base_url("ssshootingclub/search_checkin_nic")?>',
       	type: 'POST',
       	data: {search:search},
       	success:function( data )
       	{
       		$('#nic_data li').each(function () {
			 $(this).append(data);
			});
       		// alert(data);exit;
       		// $("#s_data").text( data );
       	}
       });

    });
 
 $("body").on('click','.listitem',function(e){
 			//console.log( $(this) );
 			e.preventDefault();
 			var currentLi = $(this).text();
 			//console.log(currentLi);
 			$("#idcnic").val(currentLi);	
 			if("#idcnic"!='')
 			{
 				$(".listitem").hide();
 			}else
 			{
 				
 			}

 });


$("#cnic_no").keyup(function(){
	var nic_no = $("#cnic_no").val();
	$.ajax({
        url : "<?= site_url('ssshootingclub/search_by_nic_ajax') ?>",
		type: "POST",
		data: {nic_no:nic_no},
		success:function( data )
		{

			$( "#cnic_no" ).autocomplete({
     			 source: data
    		});
/*			$("#s_result").show();
			$("#s_result").html(data);*/
		}
	});
});


 });	
 


 </script>