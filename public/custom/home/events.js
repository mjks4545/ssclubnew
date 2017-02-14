var Events = function(){
    
    // -------------------------------------------------------------------------
    
    this.__construct = function(){
        
	Template = new Template;
        console.log('events created');
	product_code();
    };
    
    // -------------------------------------------------------------------------
    
    var product_code = function(){
        $('#add_code').on('keyup', function(){
             $('#p_code_error').html('');
             var getUrl = window.location;
             var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + '/ssshootingclub/checkProductDuplication';
             
             $.post(baseUrl, {name: $(this).val()}, function(data){
                      console.log(data);
                  if( data == '1' ){
                       $(".add_prod_btn").removeAttr("disabled");
                  }else{
                      $('#p_code_error').html('Already Exists');
                      $(".add_prod_btn").attr('disabled','');
                  }
             }); 
             
             //console.log(baseUrl);             

        }); 
    }
    
    // ------------------------------------------------------------------------ 
    
    this.__construct();

};


