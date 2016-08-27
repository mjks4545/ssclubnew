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
	var availableTags = [
	    "ActionScript",
	    "AppleScript",
	    "Asp",
	    "BASIC",
	    "C",
	    "C++",
	    "Clojure",
	    "COBOL",
	    "ColdFusion",
	    "Erlang",
	    "Fortran",
	    "Groovy",
	    "Haskell",
	    "Java",
	    "JavaScript",
	    "Lisp",
	    "Perl",
	    "PHP",
	    "Python",
	    "Ruby",
	    "Scala",
	    "Scheme"
	  ];
	  $( "#idcnic" ).autocomplete({
	    source: availableTags
	  });
    };
    
    // -------------------------------------------------------------------------

    this.__construct();

};



