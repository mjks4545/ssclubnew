  <?php 
class Sale_reports extends CI_controller
{
	 function __construct()
    {
        parent::__construct();
        $this->load->model("sale_reports_m");

        $user = $this->session->userdata('session_data');
        if (!isset($user)) { 
            $this->session->set_flashdata('msg','Please enter eamil and password to login');
            $this->session->set_flashdata('type','warning');
            redirect('home');
        } 
    }

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
        $this->load->view('showroom/sales/sale_report',$data_res);
        $this->load->view('include/footer');
  }  

  function sale_reports_search() 
  {
        $result['res_data'] = $this->sale_reports_m->sale_reports_search();
        //echo '<pre>';print_r($result);die;	
        $this->load->view('include/header');
        $this->load->view('showroom/sales/sale_report_search_view',$result);
        $this->load->view('include/footer');
  }

  function sale_person_details()
  {
  		$per_id = $this->uri->segment(3);
  		$b_id = $this->uri->segment(4);
      $s_id  = $this->uri->segment(5);
  		  
      if(isset($b_id))
  		{
  		  $result = $this->sale_reports_m->sale_person_details($per_id,$b_id,$s_id);		
  		}else{
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
      $b_id   = $this->uri->segment(4);
      $s_id   = $this->uri->segment(5);
      // if( $s_id == null ){

      //   $this->sale_reports_m->sale_bill_reports

      // }
      // die;
      $result = $this->sale_reports_m->sale_bill_reports($per_id,$b_id,$s_id);
       // echo '<pre>';print_r($result);die;
      $this->load->view('include/header');
      $this->load->view('showroom/sales/sale_report_bill',$result);
      $this->load->view('include/footer');
  }

  function delete_bill()
  {
    // echo '<pre>';print_r($_POST);die; 
     $m_id    = $this->input->post('m_id');
    $per_id  = $this->input->post('per_id');
     $b_id    = $this->input->post('b_id');
     $arr_len = $this->input->post('arr_len');

    for ($i=0; $i < $arr_len; $i++) 
    { 
    $par_id     =  $this->input->post('par_id_'.$i);
    $s_quantity =  $this->input->post('s_quantity_'.$i);
    $p_id       =  $this->input->post('p_id_'.$i);
    $s_id       =  $this->input->post('s_id_'.$i);

    $this->db->where('p_id',$p_id);
    $p_data = $this->db->get('product')->result();
    // echo '<pre>';print_r($par_data);
   // ----------------- Reset Product Data -----------//
    foreach ($p_data as $value) {
        $p_quantity = $value->p_quantity;
    }
      $reset_qnty = ($p_quantity + $s_quantity);

      $reset_prod = array(
            'p_quantity'  => $reset_qnty
        );  
      // print_r($reset_prod);
      $this->db->where('p_id',$p_id);
      $this->db->update('product',$reset_prod);
    // ---------------- Reset Purchase Data ----------//
     $this->db->where('par_id',$par_id);
     $par_data = $this->db->get('purchase')->result(); 
      foreach ($par_data as $value) {
        $par_quantity = $value->p_quantity;
      }

      $rst_par_qnty  = ($par_quantity + $s_quantity);
      $reset_par = array(
            'p_quantity'  => $rst_par_qnty
        );
       $this->db->where('par_id',$par_id);
      $this->db->update('purchase',$reset_par);
      //-----------------------------------------------//

      $this->db->where('s_id',$s_id);
      $this->db->delete('sale');

    }
     $result = $this->sale_reports_m->delete_bill($per_id,$b_id);  
     $this->session->set_flashdata('msg','Report deleted Successfully');
     $this->session->set_flashdata('type','success');
     redirect('sale_reports/index');
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

// ------------------------------------------------------------------------------------

public function paid_bill(){

  $per_id = $this->uri->segment(3);
  $b_id   = $this->uri->segment(4);
  $result = $this->sale_reports_m->paid_bill( $b_id );
  redirect( site_url() . 'sale_reports/sale_person_details/' . $per_id . '/' . $b_id );

}

// --------------------------------------------------------------------------------------

}

?>