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
	    if( url == 'http://localhost/ssclubnew/ssshootingclub/checkin_search' ){
	    
		url = url.replace("checkin_search", "returncheckin");
		$.post( url , {cnic:$(this).val()} , function( data ){
		    $( "#idcnic" ).autocomplete({
			source: data.array
		      });

		});
		
	    } else if( url == 'http://localhost/ssclubnew/Ssshootingclub/searchmemeber/' ){
		
		url = url.replace("searchmemeber", "returncheckin");
		$.post( url , {cnic:$(this).val()} , function( data ){
		    $( "#idcnic" ).autocomplete({
			source: data.array
		      });

		});
		
	    } else if ( url == 'http://localhost/ssclubnew/Ssshootingclub/advancesearch/' ){
		
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
	    if( url == 'http://localhost/ssclubnew/Ssshootingclub/searchmemeber/' ){
	    
		url = url.replace("searchmemeber", "return_name_member_search");
		$.post( url , {cnic:$(this).val()} , function( data ){
		    $( "#name" ).autocomplete({
			source: data.array
		      });

		});
	    } else if ( url == 'http://localhost/ssclubnew/Ssshootingclub/advancesearch/' ){
	    
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
	    if( url == 'http://localhost/ssclubnew/Ssshootingclub/searchmemeber/' ){
	    
		url = url.replace("searchmemeber", "return_card_member_search");
		$.post( url , {cnic:$(this).val()} , function( data ){
		    $( "#card_no" ).autocomplete({
			source: data.array
		      });

		});
	    } else if( url == 'http://localhost/ssclubnew/Ssshootingclub/advancesearch/' ){
	    
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
	    if( url == 'http://localhost/ssclubnew/Ssshootingclub/searchmemeber/' ){
		url = url.replace("searchmemeber", "return_mobile_member_search");
		$.post( url , {cnic:$(this).val()} , function( data ){
		    $( "#mobile" ).autocomplete({
			source: data.array
		    });
		});
	    } else if( url == 'http://localhost/ssclubnew/Ssshootingclub/advancesearch/' ){
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
	    if( url == 'http://localhost/ssclubnew/searchmemeber/' ){
	    
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
	    if( url == 'http://localhost/ssclubnew/Ssshootingclub/advancesearch/' ){
	    
		url = url.replace("advancesearch", "return_reg_no_member_search");
		$.post( url , {cnic:$(this).val()} , function( data ){
		    $( "#reg_no" ).autocomplete({
			source: data.array
		    });
		});
	    }
	});
	
    };
    
    // -------------------------------------------------------------------------

    this.__construct();

};



