  <?php 
class Sale_reports extends CI_controller
{
	 function __construct()
    {
        parent::__construct();
        $this->load->model("sale_reports_m");
    }

  function index()
  {
  		  $this->load->view('include/header');
        $this->load->view('showroom/sales/sale_report');
        $this->load->view('include/footer');
  }  

  function sale_reports_search()
  {
  		$result['res_data'] = $this->sale_reports_m->sale_reports_search();
  		// echo '<pre>';print_r($result);die;	
  		$this->load->view('include/header');
        $this->load->view('showroom/sales/sale_report_search_view',$result);
        $this->load->view('include/footer');
  }

  function sale_person_details()
  {
  		$per_id = $this->uri->segment(3);
  		$b_id = $this->uri->segment(4);
  		if(isset($b_id))
  		{
  		$result = $this->sale_reports_m->sale_person_details($per_id,$b_id);		
  		}else
  		{
  		$result = $this->sale_reports_m->sale_person_details($per_id);
  		}
  		// echo '<pre>';print_r($result);die;
  		  $this->load->view('include/header');
        $this->load->view('showroom/sales/sale_person_details',$result);
        $this->load->view('include/footer');
  }

  function sale_bill_reports()
  {
      $per_id = $this->uri->segment(3);
      $b_id = $this->uri->segment(4);
      $result = $this->sale_reports_m->sale_bill_reports($per_id,$b_id);
      // echo '<pre>';print_r($result);die;
      $this->load->view('include/header');
      $this->load->view('showroom/sales/sale_report_bill',$result);
      $this->load->view('include/footer');
  }

  function delete_bill()
  {
    
    $per_id = $this->input->post('per_id');
    $b_id   = $this->input->post('b_id');
    $result = $this->sale_reports_m->delete_bill($per_id,$b_id);
    
     $this->session->set_flashdata('msg','Report deleted Successfully');
     $this->session->set_flashdata('type','success'); 
  }

  function paid_reports()
  {
     $b_res = $this->db->query(' SELECT * FROM sale s INNER JOIN billinfo b_i ON b_i.b_id = s.b_id 
                        INNER JOIN person p ON p.Per_id = s.per_id  
                        INNER JOIN product ON product.p_id = s.p_id 
                        where b_i.bill_pay_status = 1 ');  
      $b_res = $b_res->result();
    $result_bill['paid_bill_result'] = $b_res;
    // ----------- Pass to the view -------------------------//
        $this->load->view('include/header');
        $this->load->view('showroom/sales/sale_report_search_view',$result_bill);
        $this->load->view('include/footer');
   
  }

// ------------------------------- Unpaid Bills -----------------------------------//
  function unpaid_reports()
  {
    $b_res = $this->db->query('SELECT * FROM sale s INNER JOIN billinfo b_i ON b_i.b_id = s.b_id 
                        INNER JOIN person p ON p.Per_id = s.per_id  
                        INNER JOIN product ON product.p_id = s.p_id 
                        where b_i.bill_pay_status = 0 ');

      $b_res = $b_res->result();
    $result_bill['unpaid_bill_result'] = $b_res;
      // ----------- Pass to the view -------------------------//
        $this->load->view('include/header');
        $this->load->view('showroom/sales/sale_report_search_view',$result_bill);
        $this->load->view('include/footer');
  }

}

?>