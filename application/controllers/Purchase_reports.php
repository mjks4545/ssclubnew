<?php

class Purchase_reports extends CI_Controller
{

// -------------------------------------------------------------------------
	 function __construct() {
	
	parent::__construct();
	$this->load->model( 'purchase_reports_m' );

	$user = $this->session->userdata('session_data');
          if (!isset($user)) { 
            $this->session->set_flashdata('msg','Please enter eamil and password to login');
            $this->session->set_flashdata('type','warning');
           redirect('home');
          } 
	
    }
// -------------------------------------------------------------------------

	function index()
	{
      $this->load->model('product_m');
      $data = $this->product_m->get_all_products();
      $array = [];
        foreach ($data as $value) {
            if( !in_array($value->p_name, $array) ){
                $array[] = $value->p_name;          
            }
        }
        $data_res['product'] = $array;

    	$this->load->view('include/header');
      $this->load->view('showroom/product/purchase_report',$data_res);
      $this->load->view('include/footer');
	}

	function purchase_reports_search()
	{
            $result['s_result'] = $this->purchase_reports_m->search_purchase_data();
//             echo '<pre>';print_r($result);die;
            $this->load->view('include/header');
            $this->load->view('showroom/product/product_report_search_view',$result);
            $this->load->view('include/footer');
	}

	function single_purchase_details($id)
	{
            $par_id = $this->uri->segment(3);
            $res_data['detail'] = $this->purchase_reports_m->single_purchase_res($par_id);
            $this->load->view('include/header');
            // $this->load->view('include/sidebar');
            $this->load->view('showroom/product/single_purchase_details',$res_data);
            $this->load->view('include/footer');
	}

public function return_product_name(){
        $this->db->select('p_name');
        $this->db->like('p_name',$this->input->post('product_name'));
        $query = $this->db->get('product');
        $data = $query->result();
        $array = [];
        foreach ($data as $value) {
            if( !in_array($value->p_name, $array) ){
                $array[] = $value->p_name;          
            }
        }
        $this->output->set_content_type('application_json');
         $this->output->set_output( json_encode([
             'result'   => 1,
             'array'    => $array
         ]) );
    }

}
?>