<?php

class Purchase_reports extends CI_Controller
{

// -------------------------------------------------------------------------
	 function __construct() {
	
	parent::__construct();
	$this->load->model( 'purchase_reports_m' );
	
    }
// -------------------------------------------------------------------------

	function index()
	{
		$this->load->view('include/header');
        // $this->load->view('include/sidebar');
        $this->load->view('showroom/product/purchase_report');
        $this->load->view('include/footer');
	}

	function purchase_reports_search()
	{
			$result['s_result'] = $this->purchase_reports_m->search_purchase_data();
			// echo '<pre>';print_r($result);die;
			$this->load->view('include/header');
        	// $this->load->view('include/sidebar');
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

}
?>