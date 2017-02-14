<?php
class Admin extends CI_Controller{

function __construct() {
	
	parent::__construct();

    $user = $this->session->userdata('session_data');
          if (!isset($user)) { 
            $this->session->set_flashdata('msg','Please enter eamil and password to login');
            $this->session->set_flashdata('type','warning');
           redirect('home');
          } 
    }
    // -------------------------------------------------------------------------
    
    function index(){
	
        $this->load->view('include/header');
        $this->load->view('admin/admin_home');
        $this->load->view('include/footer');

    
    }

    // -------------------------------------------------------------------------

    
}