<?php
class Checkin_sale extends CI_Controller{

    // -------------------------------------------------------------------------
    function __construct() 
    {
        parent::__construct();
        $this->load->model( 'checkin_sale_m' );

        $user = $this->session->userdata('session_data');
          if (!isset($user)) { 
            $this->session->set_flashdata('msg','Please enter eamil and password to login');
            $this->session->set_flashdata('type','warning');
            redirect('home');
          } 
    }

    function checkin_sale_view()
    {
    	$c_id   = $this->uri->segment(3);
    	$per_id = $this->uri->segment(4);
    	$result['persondata'] = $this->checkin_sale_m->checkin_sale_data($c_id,$per_id);

        $this->load->model('product_m');
        $data_res = $this->product_m->get_all_products();
           $array = [];
            foreach ($data_res as $value) {
                if( !in_array($value->p_name, $array) ){
                    $array[] = $value->p_name;          
                }
            }
            $result['product'] = $array; 
    	// echo '<pre>';print_r($result);die;
    	$this->load->view('include/header');
        $this->load->view('showroom/sales/checkin_sale',$result);
        $this->load->view('include/footer');	
    }

    function insert_checkin_sale()
    {
    	$result = $this->checkin_sale_m->insert_checkin_sale();
    	$per_id = $this->uri->segment(3);
    	$c_id   = $this->uri->segment(4);
    	redirect('sale/add_more_sale/'.$per_id.'/'.$c_id);
    }

}    