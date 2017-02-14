var Home = function(){
    
    // -------------------------------------------------------------------------
    
    this.__construct = function(){
        
        console.log('Home created');
        //Template = new Template;
        event = new Events;
	autocomplete();
    };
    
    // -------------------------------------------------------------------------
    
    var autocomplete = function(){
	
	$('#idcnic').on('keyup',function(){
	    
	    var url = document.location.href;
	    if( url == 'http://sstechnologiez.com/ssclub/ssshootingclub/checkin_search' ){
	    
		url = url.replace("checkin_search", "returncheckin");
		$.post( url , {cnic:$(this).val()} , function( data ){
		    $( "#idcnic" ).autocomplete({
			source: data.array
		      });

		});
		
	    } else if( url == 'http://sstechnologiez.com/ssclub/Ssshootingclub/searchmemeber/' ){
		
		url = url.replace("searchmemeber", "returncheckin");
		$.post( url , {cnic:$(this).val()} , function( data ){
		    $( "#idcnic" ).autocomplete({
			source: data.array
		      });

		});
		
	    } else if ( url == 'http://sstechnologiez.com/ssclub/Ssshootingclub/advancesearch/' ){
		
		url = url.replace("advancesearch", "returncheckin");
		$.post( url , {cnic:$(this).val()} , function( data ){
		    $( "#idcnic" ).autocomplete({
			source: data.array
		      });

		});
		
	    } 
	
	});
	
	$('#name').on('keyup',function(){
	    
	    var url = document.location.href;
	    if( url == 'http://sstechnologiez.com/ssclub/Ssshootingclub/searchmemeber/' ){
	    
		url = url.replace("searchmemeber", "return_name_member_search");
		$.post( url , {cnic:$(this).val()} , function( data ){
		    $( "#name" ).autocomplete({
			source: data.array
		      });

		});
	    } else if ( url == 'http://sstechnologiez.com/ssclub/Ssshootingclub/advancesearch/' ){
	    
		url = url.replace("advancesearch", "return_name_member_search");
		$.post( url , {cnic:$(this).val()} , function( data ){
		    $( "#name" ).autocomplete({
			source: data.array
		      });

		});
	    }
	
	});
	
	$('#card_no').on('keyup',function(){
	    
	    var url = document.location.href;
	    if( url == 'http://sstechnologiez.com/ssclub/Ssshootingclub/searchmemeber/' ){
	    
		url = url.replace("searchmemeber", "return_card_member_search");
		$.post( url , {cnic:$(this).val()} , function( data ){
		    $( "#card_no" ).autocomplete({
			source: data.array
		      });

		});
	    } else if( url == 'http://sstechnologiez.com/ssclub/Ssshootingclub/advancesearch/' ){
	    
		url = url.replace("advancesearch", "return_card_member_search");
		$.post( url , {cnic:$(this).val()} , function( data ){
		    $( "#card_no" ).autocomplete({
			source: data.array
		      });

		});
	    }
	
	});
	
	$('#mobile').on('keyup',function(){
	    
	    var url = document.location.href;
	    if( url == 'http://sstechnologiez.com/ssclub/Ssshootingclub/searchmemeber/' ){
		url = url.replace("searchmemeber", "return_mobile_member_search");
		$.post( url , {cnic:$(this).val()} , function( data ){
		    $( "#mobile" ).autocomplete({
			source: data.array
		    });
		});
	    } else if( url == 'http://sstechnologiez.com/ssclub/Ssshootingclub/advancesearch/' ){
		url = url.replace("advancesearch", "return_mobile_member_search");
		$.post( url , {cnic:$(this).val()} , function( data ){
		    $( "#mobile" ).autocomplete({
			source: data.array
		    });
		});
	    }
	});
	
	$('#license_no').on('keyup',function(){
	    
	    var url = document.location.href;
	    if( url == 'http://sstechnologiez.com/ssclub/searchmemeber/' ){
	    
		url = url.replace("searchmemeber", "return_license_no_member_search");
		$.post( url , {cnic:$(this).val()} , function( data ){
		    $( "#license_no" ).autocomplete({
			source: data.array
		    });
		});
	    }
	});	
	
	$('#reg_no').on('keyup',function(){
	    
	    var url = document.location.href;
	    if( url == 'http://sstechnologiez.com/ssclub/Ssshootingclub/advancesearch/' ){
	    
		url = url.replace("advancesearch", "return_reg_no_member_search");
		$.post( url , {cnic:$(this).val()} , function( data ){
		    $( "#reg_no" ).autocomplete({
			source: data.array
		    });
		});
	    }
	});

	$('#product_name').on('keyup',function(){
	    var url = document.location.href;
	    console.log(url);
	    if( url == 'http://sstechnologiez.com/ssclub/showroom/addproduct' ){
	    console.log('hi');
		url = url.replace("addproduct", "return_product_name");
		$.post( url , {product_name:$(this).val()} , function( data ){
			console.log(data);
		    $( "#product_name" ).autocomplete({
			source: data.array
		    });
		});
	    }
	});

	$('#product_type').on('keyup',function(){
		var product_name = $('#product_name').val();
	    var url = document.location.href;
	    console.log(url);
	    if( url == 'http://sstechnologiez.com/ssclub/showroom/addproduct' ){
		url = url.replace("addproduct", "return_product_type");
		$.post( url , { product_name:product_name, product_type:$(this).val() } , function( data ){
			console.log(data);
		    $( "#product_type" ).autocomplete({
			source: data.array
		    });
		});
	    }
	});

	$('#product_model').on('keyup',function(){
		var product_name = $('#product_name').val();
		var product_type = $('#product_type').val();
	    var url = document.location.href;
	    if( url == 'http://sstechnologiez.com/ssclub/showroom/addproduct' ){
		url = url.replace("addproduct", "return_product_model");
		$.post( url , { product_name:product_name, product_type:product_type, product_model:$(this).val() } , function( data ){
			console.log(data);
		    $( "#product_model" ).autocomplete({
			source: data.array
		    });
		});
	    }
	});

	$('#product_main').on('keyup',function(){
	    var url = document.location.href;
	    // console.log(url);
	    if( url == 'http://sstechnologiez.com/ssclub/sale/search_by_nic' ){
	    // console.log('hi');
		url = url.replace("search_by_nic", "return_product_name");
		$.post( url , {product_name:$(this).val()} , function( data ){
			// console.log(data);
		    $( "#product_main" ).autocomplete({
			source: data.array
		    });
		});
	    }
	});

// ----------------------------- Purchase --------------------------------//
		$('#product_main').on('keyup',function(){
	    var url = document.location.href;
	    if( url == 'http://sstechnologiez.com/ssclub/showroom/parchasedetailsearch' ){
		url = url.replace("parchasedetailsearch","return_product_name");
		$.post( url , {product_name:$(this).val()} , function( data ){
		    $( "#product_main" ).autocomplete({
			source: data.array
		    });
			});
		    }
		});
// -------------------------- Purchase Reports ----------------------------//
		$('#product_main').on('keyup',function(){
	    var url = document.location.href;
	    // console.log(url);
	    if( url == 'http://sstechnologiez.com/ssclub/Purchase_reports/index' ){
		url = url.replace("index","return_product_name");
		$.post( url , {product_name:$(this).val()} , function( data ){
		    $( "#product_main" ).autocomplete({
			source: data.array
		    });
			});
		    }
		});
// -------------------------- Sale Reports ----------------------------//
		$('#product_main').on('keyup',function(){
	    var url = document.location.href;
	    // console.log(url);
	    if( url == 'http://sstechnologiez.com/ssclub/sale_reports/index' ){
		url = url.replace("index","return_product_name");
		$.post( url , {product_name:$(this).val()} , function( data ){
		    $( "#product_main" ).autocomplete({
			source: data.array
		    });
			});
		    }
		});
	//----------------------------------------------//
	$('#product_main').on('keyup',function(){
	    var url = document.location.href;
	    if( url == url ){
		url = url.replace("add_more_sale","return_product_name");
		$.post( url , {product_name:$(this).val()} , function( data ){
		    $( "#product_main" ).autocomplete({
			source: data.array
		    });
			});
		    }
		});	
	//------------------------------------------//
		$('#product_main').on('keyup',function(){
	    var url = document.location.href;
	    if( url == 'http://sstechnologiez.com/ssclub/showroom/viewproduct' ){
		url = url.replace("viewproduct","return_product_name");
		$.post( url , {product_name:$(this).val()} , function( data ){
		    $( "#product_main" ).autocomplete({
			source: data.array
		    });
			});
		    }
		});		 
// -------------------- NIC Sale search -----------------------//
	$('#nic_search_sale').on('keyup',function(){
	    var url = document.location.href;
	    if( url == url ){
		url = url.replace("index","return_search_nic");
		$.post( url , {nic:$(this).val()} , function( data ){
		    $( "#nic_search_sale" ).autocomplete({
			source: data.array
		    });
			});
		    }
		});
// -------------------- NIC Sale search -----------------------//
	$('#purchase_name_search').on('keyup',function(){
	    var url = document.location.href;
	    if( url == url ){
		url = url.replace("parchaseproduct","return_search_parchaseproduct");
		$.post( url , {name:$(this).val()} , function( data ){
		    $( "#purchase_name_search" ).autocomplete({
			source: data.array
		    });
			});
		    }
		});
	
// -------------------------------------------------------------------------
         $('#product_main').on('keyup',function(){
	    var url = document.location.href;
	    if( url == url ){
		url = url.replace("viewallproductupdate","return_product_name");
		$.post( url , {product_name:$(this).val()} , function( data ){
		    $( "#product_main" ).autocomplete({
			source: data.array
		    });
			});
		    }
		});	

    };


    this.__construct();

};



$('#purchase_from').change(function(){
	var pur_from = $(this).val();

	if(pur_from == "Dealer")
	{
		$("#per_cnic").attr("disabled","");
		$("#per_cnic").removeAttr("required",""); 
	}
	else if(pur_from == "Individual")
	{
		$("#per_cnic").removeAttr("disabled","");
		$("#per_cnic").attr("required",'');
	}

});

$("#product_main").change(function(){
	var product = $(this).val();
	// alert( $("input[name= 'remarks']").val() );
	if(product =='Rifle' || product =='Shortgun' || product =='Pistol')
	{
		// $("#remarks").attr("disabled","");
		$("#remarks").removeAttr("disabled","");
		$("#weapon_no").removeAttr("disabled","");
		$(".add_field_button").removeAttr("disabled",'');
	}
	else{
		$("#remarks").attr("disabled","");
		$("#weapon_no").attr("disabled","");
		$(".add_field_button").attr("disabled",'');
	}
});

//------------------- Checkin Nominated click to add ----------------------

$("#n_row1").on('click',function(){
	var name1 		= $("#n_name1").val();
	var nic1 		= $("#n_nic1").val();
	var mobile1 	= $("#n_mobile1").val();
	var address1 	= $("#n_address1").val();
	// alert(name1 + nic1 + mobile1 + address1);
    if( $("#c_name1").val() == '' )
    {
   		$("#c_name1").val(name1);
   		$("#c_nic1").val(nic1);
   		$("#c_mobile1").val(mobile1);
   		$("#c_address1").val(address1);
   	}
   	else if( $("#c_name2").val() == ''  ){
   		$("#c_name2").val(name1);
   		$("#c_nic2").val(nic1);
   		$("#c_mobile2").val(mobile1);
   		$("#c_address2").val(address1);
   	}else if( $("#c_name3").val() == '' ){
   		$("#c_name3").val(name1);
   		$("#c_nic3").val(nic1);
   		$("#c_mobile3").val(mobile1);
   		$("#c_address3").val(address1);
   	}
});

$("#n_row2").on('click',function(){
	var name2 		= $("#n_name2").val();
	var nic2 		= $("#n_nic2").val();
	var mobile2 	= $("#n_mobile2").val();
	var address2 	= $("#n_address2").val();
	// alert(name1 + nic1 + mobile1 + address1);
    if( $("#c_name1").val() == '' )
    {
   		$("#c_name1").val(name2);
   		$("#c_nic1").val(nic2);
   		$("#c_mobile1").val(mobile2);
   		$("#c_address1").val(address2);
   	}
   	else if( $("#c_name2").val() == ''  ){
   		$("#c_name2").val(name2);
   		$("#c_nic2").val(nic2);
   		$("#c_mobile2").val(mobile2);
   		$("#c_address2").val(address2);
   	}else if( $("#c_name3").val() == '' ){
   		$("#c_name3").val(name2);
   		$("#c_nic3").val(nic2);
   		$("#c_mobile3").val(mobile2);
   		$("#c_address3").val(address2);
   	}
});

$("#n_row3").on('click',function(){
	var name3 		= $("#n_name3").val();
	var nic3 		= $("#n_nic3").val();
	var mobile3 	= $("#n_mobile3").val();
	var address3 	= $("#n_address3").val();
	// alert(name1 + nic1 + mobile1 + address1);
    if( $("#c_name1").val() == '' )
    {
   		$("#c_name1").val(name3);
   		$("#c_nic1").val(nic3);
   		$("#c_mobile1").val(mobile3);
   		$("#c_address1").val(address3);
   	}
   	else if( $("#c_name2").val() == ''  ){
   		$("#c_name2").val(name3);
   		$("#c_nic2").val(nic3);
   		$("#c_mobile2").val(mobile3);
   		$("#c_address2").val(address3);
   	}else if( $("#c_name3").val() == '' ){
   		$("#c_name3").val(name3);
   		$("#c_nic3").val(nic3);
   		$("#c_mobile3").val(mobile3);
   		$("#c_address3").val(address3);
   	}
});


$(".emty_fields1").on('click',function(){
	$("#c_name1").val('');
   		$("#c_nic1").val('');
   		$("#c_mobile1").val('');
   		$("#c_address1").val('');
});
$(".emty_fields2").on('click',function(){
	$("#c_name2").val('');
   		$("#c_nic2").val('');
   		$("#c_mobile2").val('');
   		$("#c_address2").val('');
});
$(".emty_fields3").on('click',function(){
	$("#c_name3").val('');
   		$("#c_nic3").val('');
   		$("#c_mobile3").val('');
   		$("#c_address3").val('');
});
$(document).ready(function(){
 var pur_from = $("#purchase_from").val();
 if(pur_from == "Dealer")
 {
  $("#per_cnic").attr("disabled","");
  $("#per_cnic").removeAttr("required",""); 
 }
 else if(pur_from == "Individual")
 {
  $("#per_cnic").removeAttr("disabled","");
  $("#per_cnic").attr("required",'');
 }
});

$(document).ready(function(){
 if($("#no_fire_checkin").val() == '')
 {
  // alert('empty');
  $("#checkout_btn").removeAttr("href");
  $("#checkout_btn").attr("disabled","");
 }

 if($("#no_fire_checkin").val() == '' )
 {
 $("#no_fire_checkin").keyup(function(){
  $("#checkout_btn").removeAttr("disabled","");
  $("#checkout_btn").attr('href');
 });
 }
});
$("#product_main").change(function(){
 if($(this).val() == 'Ammunition'){
  $("#remarks").removeAttr("disabled","");
 }
})