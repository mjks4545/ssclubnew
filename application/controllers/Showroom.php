<?php

class Showroom extends CI_Controller
{
//------------------------------------------------------------------------
    function __construct()
    {
        parent::__construct();
        $this->load->model("product_m");
        
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
        $this->load->view('include/header');
        $this->load->view('showroom/home_view');
        $this->load->view('include/footer');

    }

    // -------------------------------------------------------------------------
    function addproduct()
    {
        $this->load->view('include/header');
        $this->load->view('showroom/product/addproduct');
        $this->load->view('include/footer');

    }

    // -------------------------------------------------------------------------
    function addproductpro()
    {
        $result = $this->product_m->addproductpro();
        if($result==1){
            $this->session->set_flashdata("msg","Product Successfully Added");
            $this->session->set_flashdata("type","success");
            redirect(site_url()."showroom/addproduct");
        }
        if($result==0){
            $this->session->set_flashdata("msg","Opss!There is Some Error While Adding Product");
            $this->session->set_flashdata("type","danger");
            redirect(site_url()."showroom/addproduct");
        }
    }
    // -------------------------------------------------------------------------
    function viewproduct()
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
        $this->load->view('showroom/product/viewproduct',$data_res);
        $this->load->view('include/footer');
    }
    //---------------------------------------------------------------------------
    
    function searchnameproduct()
    {
      //  $data['name'] = $this->product_m->searchname_product();

    }

    // -------------------------------------------------------------------------
    
    function parchaseproduct()
    {
        $this->load->view('include/header');
        $this->load->view('showroom/product/parchaseproduct');
        $this->load->view('include/footer');
    }

    // -------------------------------------------------------------------------
    
    function parchasedetailsearch()
    {

        $this->load->model('product_m');
          $data_res = $this->product_m->get_all_products();
          $array = [];
            foreach ($data_res as $value) {
                if( !in_array($value->p_name, $array) ){
                    $array[] = $value->p_name;          
                }
            }
            $data['product'] = $array;


        $com_name = $this->input->post('company_name');
        $per_id = $this->uri->segment(3);
        if(isset($per_id))
        {
            $this->db->where('Per_id',$per_id);
            $data['company_details'] = $this->db->get('person')->result();
        }
        else
        {
            $data['company_details'] = $this->product_m->purchaseproduct();
        }
            if( $data['company_details'] )
            {
                $this->load->view('include/header');
                $this->load->view('showroom/product/purchase',$data);
                $this->load->view('include/footer');
            }
            else
            {
                redirect('Showroom/new_purchase_customer/'.$com_name);
            }
        
    }
    // -------------------------------------------------------------------------

    function get_product_cat()
     {
        $prod_cat = $this->input->post('prod_cat');
        $data = $this->product_m->get_product_cat($prod_cat);
         //echo '<pre>';print_r($data);die;
        $array = [];
        $product_details = '<option value="">Select Type</option>';
        foreach ($data as $value) {
            if( !in_array($value->p_type, $array) ){
                $array[] = $value->p_type;
                $product_details .= '<option value="'.$value->p_type.'">'.$value->p_type.'</option>';           
            }
            }
         echo $product_details;       
    }

    function get_product_type()
    {
        $product = $this->input->post('product');
        $type = $this->input->post('type');
        $data = $this->product_m->get_product_type($product,$type);
        $product_type = '<option value="">Select Type</option>';
        foreach ($data as $value) {
            $product_type .= '<option value="'.$value->p_model.'">'.$value->p_model.'</option>';           
        }
         echo $product_type;
    }
//-----------------------------------------------------------------------------

    function get_product_code_pr()
    {
        $p = $this->input->post('product');
        $t = $this->input->post('type');  
        $m = $this->input->post('model');
        // echo 'P Is :'.$p. 'T Is :'.$t.'M Is :'$m;
        $data = $this->product_m->get_product_code_pr($p,$t,$m);   
        // echo '<pre>';print_r($data);die;
        $product_code = '<option value="">Select Type</option>';
        
        $this->output->set_content_type('application_json');
        if($data){
            $this->output->set_output(
                    json_encode([
                            'result'        => 1,
                            'p_id'          => $data[0]->p_id,
                            'p_code'        => $data[0]->p_code,
                            'p_quantity'    => $data[0]->p_quantity,
                            'par_price'     => $data[0]->par_price,
                            'sale_price'    => $data[0]->sale_price
                            ]) 
                );

        }else
        {
            echo '';
        }
    }

    function get_code_search_data_pr()
    {
        $code = $this->input->post('code');
        $data = $this->product_m->get_code_search_data_pr($code);
        // echo '<pre>';print_r($data);die;
        $this->output->set_content_type('application_json');
        if($data){
            $this->output->set_output( 
                    json_encode([
                            'result'        => 1,
                            'p_name'        => $data[0]->p_name,
                            'p_type'        => $data[0]->p_type,
                            'p_model'       => $data[0]->p_model,
                            'p_id'          => $data[0]->p_id,
                            'p_quantity'    => $data[0]->p_quantity,
                            'par_price'     => $data[0]->par_price,
                            'sale_price'    => $data[0]->sale_price
                        ])   
                );

        }else
        {
            echo '';
        }
    }

//-----------------------------------------------------------------------------    
    function get_product_code()
    {
        $p = $this->input->post('product');
        $t = $this->input->post('type');  
        $m = $this->input->post('model');
        // echo 'P Is :'.$p. 'T Is :'.$t.'M Is :'$m;
        $data = $this->product_m->get_product_code($p,$t,$m);   
        // echo '<pre>';print_r($data);die;
        $product_code = '<option value="">Select Type</option>';
        
        $this->output->set_content_type('application_json');
        if($data){
            $this->output->set_output(
                    json_encode([
                            'result'        => 1,
                            'p_id'          => $data[0]->p_id,
                            'p_code'        => $data[0]->p_code,
                            'p_quantity'    => $data[0]->p_quantity,
                            'par_price'     => $data[0]->par_price,
                            'sale_price'    => $data[0]->sale_price
                            ]) 
                );

        }else
        {
            echo '';
        }
    }

    function get_code_search_data()
    {
        $code = $this->input->post('code');
        $data = $this->product_m->get_code_search_data($code);
        // echo '<pre>';print_r($data);die;
        $this->output->set_content_type('application_json');
        if($data){
            $this->output->set_output( 
                    json_encode([
                            'result'        => 1,
                            'p_name'        => $data[0]->p_name,
                            'p_type'        => $data[0]->p_type,
                            'p_model'       => $data[0]->p_model,
                            'p_id'          => $data[0]->p_id,
                            'p_quantity'    => $data[0]->p_quantity,
                            'par_price'     => $data[0]->par_price,
                            'sale_price'    => $data[0]->sale_price
                        ])   
                );

        }else
        {
            echo '';
        }
    }

// ----------------Get Product by weapon Number----------------------
    function get_product_by_wea_no()
    {
       $wea_no = $this->input->post('wea_no');
        $data = $this->product_m->get_product_by_wea_no($wea_no);
        // echo '<pre>';print_r($data);
        $this->output->set_content_type('application_json');
        if($data){
            $this->output->set_output( 
                    json_encode([
                            'result'        => 1,
                            'p_name'        => $data[0]->p_name,
                            'p_type'        => $data[0]->p_type,
                            'p_model'       => $data[0]->p_model,
                            'p_id'          => $data[0]->p_id,
                            'p_quantity'    => $data[0]->p_quantity,
                            'par_price'     => $data[0]->par_price,
                            'sale_price'    => $data[0]->sale_price,
                            'par_weapon_no' => $data[0]->par_weapon_no,
                            'p_code'        => $data[0]->p_code
                        ])   
                );

        }else
        {
            echo '';
        }
    }


//--------------------------------------------------------------------

    function insert_purchase_data()
    {
            $data = $this->product_m->insert_purchase_data();
            $per_id = $this->uri->segment(3);
            $this->session->set_flashdata('msg','Purchase Successfully');
            $this->session->set_flashdata('type','success');
            redirect('showroom/parchasedetailsearch/'.$per_id);

    }
///-------------------------------- Insert New Person and Purchase-------------//
   function new_purchase_customer()
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
        $this->load->view('showroom/product/new_purchase',$data_res);
        $this->load->view('include/footer');

   }   

   function insert_new_purchase_customer()
   {
        $insert_data = $this->product_m->insert_new_purchase_customer();
        if($insert_data)
        {
            $this->session->set_flashdata('msg','Purchase Successfully');
            $this->session->set_flashdata('type','success');
            redirect('showroom/parchasedetailsearch/'.$insert_data);
        }
        else
        {
            $this->session->set_flashdata('msg','Purchase Successfully');
            $this->session->set_flashdata('type','danger');
            redirect('showroom/parchaseproduct');
        }
   }    

   //----------------- CHECK STOCK OF INSERTED WEAPON NUMBER ----------------------//

   function check_stock_values()
   {


        $qnty = $this->input->post('qnty');
        $p_id = $this->input->post('p_id');
        
        $this->db->select_sum('purchase.p_quantity');
        $this->db->from('purchase');
        $this->db->where( 'purchase.p_id', $p_id );
        $query=$this->db->get();
        $data['total'] = $query->row()->p_quantity;

        // $qry  = $this->db
        //                 ->select('*')
        //                 ->from( 'product' )
        //                 ->join( 'purchase','purchase.p_id=product.p_id' )
        //                 ->where( 'product.p_id', $p_id )
        //                 ->where( 'purchase.p_quantity >=', $qnty)
        //                 ->get()
        //                 ->result();

        // echo '<pre>';
        // print_r( $data['total'] );
        // die;
        if( $data['total'] >= $qnty )
        {            
            echo 'yes';
        }else
        {
            echo 'no';
        }
   }

   function search_product()
   { 
        $result['result'] = $this->product_m->search_product();
          // echo '<pre>';print_r($result);die; 
        $this->load->view('include/header');
        $this->load->view('showroom/product/view_stock',$result);
        $this->load->view('include/footer');
   }  

   function get_purchased_detail()
   {
       $p_id     = $this->uri->segment(3);
       $per_id   = $this->uri->segment(4);
       $par_date = $this->uri->segment(5);
       $result['result'] = $this->product_m->get_purchased_detail($p_id,$per_id,$par_date);
       $this->load->view('include/header');
       $this->load->view('showroom/product/purchased_product_detail',$result);
       $this->load->view('include/footer');
   }
   function get_stock_detail()
   {
       $p_id             = $this->uri->segment(3);
       $par_price        = $this->uri->segment(4);
       $sale_price       = $this->uri->segment(5);
       $result['result'] = $this->product_m->get_stock_detail($p_id,$par_price,$sale_price);
       $this->load->view('include/header');
       $this->load->view('showroom/product/purchased_product_detail',$result);
       $this->load->view('include/footer');
   }
   

   function view_stock()
   {
        $this->load->view('include/header');
        $this->load->view('showroom/product/view_stock');
        $this->load->view('include/footer');
   }
   
   //--------------------------------------------------------------
   
   public function viewallproduct(){

        $data['result'] = $this->product_m->viewallproduct();
        $this->load->view('include/header');
        $this->load->view('ssshootingclub/viewallproduct',$data);
        $this->load->view('include/footer');

    }

    //--------------------------------------------------------------

    public function viewallproductupdate($id){

        $this->load->model('product_m');
        $data_res = $this->product_m->get_all_products();
        $array = [];
        foreach ($data_res as $value) {
            if( !in_array($value->p_name, $array) ){
                $array[] = $value->p_name;          
            }
        }
        $data['product'] = $array;

        $p_id = $this->uri->segment(3);
        $data['result'] = $this->product_m->viewallproductupdate($p_id);
        // echo '<pre>';print_r($data);die();
        $this->load->view('include/header');
        $this->load->view('showroom/product/viewallproductupdate',$data);
        $this->load->view('include/footer');

    }
    public function viewallproductupdatepro($id){
        $p_id = $this->uri->segment(3);
        $dresult = $this->product_m->viewallproductupdatepro($p_id);
        //print_r($data);die();
    }

    public function return_product_name(){
        $this->db->select('p_name');
        $this->db->like('p_name',$this->input->post('product_name'));
        $this->db->order_by("p_name",'asc');
        $query = $this->db->get('product');
        $data = $query->result();
        $array = [];
        foreach ($data as $value) {
            if( !in_array($value->p_name, $array ) ){
                $array[] = $value->p_name;          
            }
        }
        $this->output->set_content_type('application_json');
         $this->output->set_output( json_encode([
             'result'   => 1,
             'array'    => $array
         ]) );

    }

    public function return_product_type(){
        //print_r($_POST);
        $this->db->select('p_type');
        $this->db->where('p_name',$this->input->post('product_name'));
        $this->db->like('p_type',$this->input->post('product_type'));
        $query = $this->db->get('product');
        $data = $query->result();
        $array = [];
        foreach ($data as $value) {
            if( !in_array($value->p_type, $array) ){
                $array[] = $value->p_type;          
            }
        }
        $this->output->set_content_type('application_json');
         $this->output->set_output( json_encode([
             'result'   => 1,
             'array'    => $array
         ]) );

    }
    public function return_product_model(){
        //print_r($_POST);
        $this->db->select('p_model');
        $this->db->where('p_name',$this->input->post('product_name'));
        $this->db->where('p_type',$this->input->post('product_type'));
        $this->db->like('p_model',$this->input->post('product_model'));
        $query = $this->db->get('product');
        $data = $query->result();
        $array = [];
        foreach ($data as $value) {
            if( !in_array($value->p_model, $array) ){
                $array[] = $value->p_model;          
            }
        }
        $this->output->set_content_type('application_json');
         $this->output->set_output( json_encode([
             'result'   => 1,
             'array'    => $array
         ]) );
    }

    function return_search_parchaseproduct()
    {
        $name = $this->input->post('name');
        $query = $this->product_m->search_db_for_product($name);
        // $nic = $this->input->post('nic');
        // $query = $this->product_m->($nic);
        $data = $query;
        // echo '<pre>';print_r($data);die;
        $array = [];
        foreach ($data as $value) {
            if( !in_array($value->Per_name, $array) ){
                $array[] = $value->Per_name;          
            }
        }
        $this->output->set_content_type('application_json');
         $this->output->set_output( json_encode([
             'result'   => 1,
             'array'    => $array
         ]) ); 
    }

    // ---------------------------------------------------------------

    public function get_product_code_purchase(){

        $p = $this->input->post('product');
        $t = $this->input->post('type');  
        $m = $this->input->post('model');
        
        $data = $this->product_m->get_product_code_purchase($p,$t,$m);

        $product_code = '<option value="">Select Type</option>';
        
        $this->output->set_content_type('application_json');
        if($data){
            $this->output->set_output(
                    json_encode([
                            'result'        => 1,
                            // 'p_id'          => $data[0]->p_id,
                            'p_code'        => $data[0]->p_code,
                            // 'p_quantity'    => $data[0]->p_quantity,
                            // 'par_price'     => $data[0]->par_price,
                            // 'sale_price'    => $data[0]->sale_price
                            ]) 
                );

        }else{
            echo '';
        }

    }

    // ----------------------------------------------------------------

    public function get_code_search_data_purchase(){

        $code = $this->input->post('code');
        $data = $this->product_m->get_code_search_data_purchase($code);
        // echo '<pre>';print_r($data);die;
        $this->output->set_content_type('application_json');
        if($data){
            $this->output->set_output( 
                    json_encode([
                            'result'        => 1,
                            'p_name'        => $data[0]->p_name,
                            'p_type'        => $data[0]->p_type,
                            'p_model'       => $data[0]->p_model,
                            // 'p_id'          => $data[0]->p_id,
                            // 'p_quantity'    => $data[0]->p_quantity,
                            // 'par_price'     => $data[0]->par_price,
                            // 'sale_price'    => $data[0]->sale_price
                        ])   
                );

        }else{
            echo '';
        }

    }

    // ----------------------------------------------------------------
}