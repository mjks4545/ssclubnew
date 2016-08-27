<?php
class Api extends CI_Controller{

    // -------------------------------------------------------------------------
    
    function __construct() {
	
	parent::__construct();
	$this->load->model( 'Membership_m' );
	
    }
    
    // -------------------------------------------------------------------------
        
    function membership_insert(){
	
        $this->Membership_m->insert();
    
    }

    // -------------------------------------------------------------------------

    
}