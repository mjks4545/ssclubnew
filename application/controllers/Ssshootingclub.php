<?php
class Ssshootingclub extends CI_Controller{

    // -------------------------------------------------------------------------
    function __construct() {
	
	parent::__construct();
	$this->load->model( 'Membership_m' );

        $user = $this->session->userdata('session_data');
          if (!isset($user)) { 
            $this->session->set_flashdata('msg','Please enter eamil and password to login');
            $this->session->set_flashdata('type','warning');
           redirect('home');
          } 
    } 
    
    function index(){
	
        $this->load->view('include/header');
        $this->load->view('ssshootingclub/home_view');
        $this->load->view('include/footer');
    
    }
    
    // -------------------------------------------------------------------------
    
    function checkin(){
	
        $this->load->view('include/header');
        // $this->load->view('include/sidebar');
        $this->load->view('ssshootingclub/checkin_view');
        $this->load->view('include/footer');
    
    }
    
    // -------------------------------------------------------------------------
    
    function checkin_search(){
	
        $this->load->view('include/header');
        $this->load->view('ssshootingclub/checkin_search');
        $this->load->view('include/footer');
    
    }
    
    function search_checkin_nic()
    {
            $nic = $this->input->post('search');
            $this->db->select('Per_cnic');
            $this->db->from('person');
            $this->db->like('Per_cnic',$nic);
            $data = $this->db->get()->result();
            if( !empty($data) ){
                $output = '';
                foreach ($data as $value) {
                    $output .= '<a class="listitem" href="#"><li class="list-group-item">'.$value->Per_cnic.'</li></a>';
                }
            }else{
                $output = '';
            }
            return $output;
        
    }

    // -------------------------------------------------------------------------
    
    function checkmember(){
        trim($nic['nic_no'] = $this->input->post('cnic_cardno'));
        $this->load->model('main_m');
        $data = $this->main_m->searchmember();
        $data_1['data'] = $this->main_m->searchmember_person($nic['nic_no']);
       // echo '<pre>';print_r($data);die;
        if( $data != NULL )
        {
            $this->load->view('include/header');
            $this->load->view('ssshootingclub/checkin_view',$data);
            $this->load->view('include/footer');
            
        } else if ( $data_1['data'] != NULL ){
            // echo '<pre>';
            // print_r($data_1);
            // die;
            $this->load->view('include/header');
            $this->load->view('ssshootingclub/new_checkin_view', $data_1);
            $this->load->view('include/footer');
            
        }else{
	        $this->load->view('include/header');
            $this->load->view('ssshootingclub/new_checkin_view', $nic);
            $this->load->view('include/footer');
            
        }
    }
    
    // -------------------------------------------------------------------------
    
    function membership_add(){
	    $this->load->view('include/header');
        $this->load->view('ssshootingclub/membership_add');
        $this->load->view('include/footer');
    }
    
    public function membership_add_after_post(){
    	$result = $this->Membership_m->insert();
        $this->session->set_flashdata('msg','Membership added Successfully');
        $this->session->set_flashdata('type','success');
        redirect('admin');
    }

	//---------------------------------------------------------------------------
	public function booths(){
        $data = $this->Membership_m->get_booth_data();
        //$data['booths_data'] = $this->Membership_m->get_booth_data();
        // echo '<pre>';print_r($data);die;
		$this->load->view('include/header');
/*        $this->load->view('include/sidebar');*/
        $this->load->view('ssshootingclub/booths',$data);
        $this->load->view('include/footer');	
	}
///////////////////// SEARCH ////////////////////////////////////    
public function searchmemeber(){
	   $this->load->view('include/header');
        $this->load->view('ssshootingclub/searchmemeber');
        $this->load->view('include/footer');
}

public function searchmembertable2(){
        
        $data['search_data'] = $this->Membership_m->search_member_data();
        $data['search_data'] = $this->Membership_m->payment_history_membership( $data['search_data'] );
	    $this->load->view('include/header');
        $this->load->view('ssshootingclub/searchmembertable2',$data);
        $this->load->view('include/footer');
	
}
public function searchallmember(){

        $data['all_data'] = $this->Membership_m->search_all_data();
	    $this->load->view('include/header');
        $this->load->view('ssshootingclub/searchallmember',$data);
        $this->load->view('include/footer');
	
}
public function advancesearch(){
	    $this->load->view('include/header');
        $this->load->view('ssshootingclub/advancesearch');
        $this->load->view('include/footer');
}

    function advance_all_members_search()
    {
        $data['adv_mem_data'] = $this->Membership_m->advance_all_members_search();
       // echo '<pre>';print_r($data);die;
        $this->load->view('include/header');
/*        $this->load->view('include/sidebar');*/
        $this->load->view('ssshootingclub/show_all_members_advance',$data);
        $this->load->view('include/footer');
    }

    ////////// Advance search Full/////////////////
    function advance_search_full()
    {
        $data = $this->Membership_m->advance_search_full(); 
        // echo '<pre>';print_r($data);die;
        $this->load->view('include/header');
        $this->load->view('ssshootingclub/advance_search_result',$data);
        $this->load->view('include/footer');

    }

    function adv_search_member_detail()
    {
        $per_id   = $this->uri->segment(3);
        $c_id     = $this->uri->segment(4);
        $mem_id   = $this->uri->segment(5); 

        $data = $this->Membership_m->member_details($per_id,$c_id,$mem_id);    
         //echo '<pre>';print_r($data);die; 
        $this->load->view('include/header');
        $this->load->view('ssshootingclub/adv_search_member_detail',$data);
        $this->load->view('include/footer');    
    }

    ///////// ADVANCE SEARCH FINISH////////////////

////////////////////////// FINISH SEARCH//////////////////////////////
    function insert_checkin_data() 
    {
        $data = $this->Membership_m->insert_checkin_data();
        $this->session->set_flashdata('checkedIn', 'Checked in Successfully');
        redirect('Ssshootingclub/booths/');
        //echo '<pre>';print_r($data);
    }

    function person_detail($id)
    {
        $p_id = $this->uri->segment(3);
        $m_id = $this->uri->segment(4);
        $c_id = $this->uri->segment(5);
        $this->load->model('main_m');
        $data = $this->main_m->get_person_data($p_id,$m_id,$c_id);
        // echo '<pre>';print_r($data);die;
        // echo '<br>'.$data['guest_checkindata'][2][0]->g_profile_img;
        // die;
        $this->load->view('include/header');
        /* $this->load->view('include/sidebar');*/
        $this->load->view('ssshootingclub/person_detail',$data);
        $this->load->view('include/footer');
    }

    function checkout_person() 
    {
        $c_id      = $this->uri->segment(3);
        $arr_time  = $this->uri->segment(4); 
        
        $this->load->model('main_m');
        $this->main_m->checkOut_data($c_id,$arr_time);  
         $this->session->set_flashdata('checkout', 'Checked Out Successfully');
        redirect('Ssshootingclub/booths/');
    }

// ----------------------------- SAVE data in checkin -------------------//
    function save_checkin_person_data()
    {
        $p_id = $this->uri->segment(3);
        $m_id = $this->uri->segment(4);
        $c_id = $this->uri->segment(5);
        $data = $this->Membership_m->save_checkin_person_data();
        // echo'<pre>';print_r($data);die;
        $this->session->set_flashdata('msg','Record updated Successfully');
        $this->session->set_flashdata('type','success');
        redirect('Ssshootingclub/person_detail/'.$p_id.'/'.$m_id.'/'.$c_id);
    }

    function insert_new_checkin_data() 
    {
        $this->Membership_m->insert_new_checkin();
        redirect('Ssshootingclub/booths');
    }
    
    function insert_new_checkin_data_w( $id ) 
    {
        $this->Membership_m->insert_new_checkin_data_w( $id );
        redirect('Ssshootingclub/booths');
    }

    function member_detail()
    {
        $per_id = $this->uri->segment(3);
        $data = $this->Membership_m->membership_search_member_details($per_id);    
        // echo '<pre>';print_r($data);die;
        $this->load->view('include/header');
        $this->load->view('ssshootingclub/member_details',$data);
        $this->load->view('include/footer');
    }

    function edit_membership()
    {
        $per_id = $this->uri->segment(3);
        $m_id   = $this->uri->segment(4);
        $data = $this->Membership_m->membership_search_member_details($per_id);
        // echo '<pre>';print_r($data);die;    
        $this->load->view('include/header');
        $this->load->view('ssshootingclub/edit_membership',$data);
        $this->load->view('include/footer');
    }

    function update_membership_record()
    {
        $update_mem = $this->Membership_m->update_membership_record();
        if($update_mem==1){
            $this->session->set_flashdata('msg','Membership Successfully Updated');
            $this->session->set_flashdata('type','success');
            redirect('Ssshootingclub/searchmembertable2/');
        }else{
            echo'ghalat de';
        }
    }

    function delete_mem_data()
    {
        $per_id = $this->input->post('per_id');
        echo $per_id;
    }

    function cancel_membership()
    {
        $red_id = $this->input->post('red_id');

        $m_id = $this->input->post('m_id');
        $cancel_data = array(
                'm_reason'=>$this->input->post('reason'),
                'm_status'=>$this->input->post('cancel_type')                
            );
        // echo '<pre>';print_r($cancel_data);die;
        $this->Membership_m->cancel_membership($m_id,$cancel_data);
        $this->session->set_flashdata('msg','Membership Is Being Blocked Successfully');
        $this->session->set_flashdata('type','success');
        redirect('Ssshootingclub/member_detail/'.$red_id);
        //echo'<pre>';print_r($cancel_data);die;
    }


    function membership_renewel()
    {
        $per_id = $this->uri->segment(3);
        $m_r_data['persondata'] = $this->Membership_m->membership_renewel_data($per_id);
      // echo '<pre>';print_r($m_r_data);die;
        $this->load->view('include/header');
        $this->load->view('ssshootingclub/membership_renewel',$m_r_data);
        $this->load->view('include/footer');
    }

    function insert_membership_renewal()
    {
        $red_id = $this->input->post('red_id');
        $insert_member = $this->Membership_m->insert_membership_renewal();
        if($insert_member==1)
        {
            $this->session->set_flashdata('msg','Membership renewal Successfully');
            $this->session->set_flashdata('type','success');
            redirect('Ssshootingclub/member_detail/'.$red_id);
        }
        else{
            $this->session->set_flashdata('msg','Membership Not renewal Successfully');
            $this->session->set_flashdata('type','danger');
            redirect('Ssshootingclub/member_detail/'.$red_id);    
        }
    }

    function payment_history()
    {
        $per_id = $this->uri->segment(3);
        $data = $this->Membership_m->payment_history($per_id);
        // echo '<pre>';print_r($data);die;    
        $this->load->view('include/header');
        $this->load->view('ssshootingclub/payment',$data);
        $this->load->view('include/footer');
    }
    
//  ------------------------- Check booth is free or not ----------------//
    function check_booth_status()
    {
        $b_no = $this->input->post('booth_no');
        if($b_no>15)
        {
            echo 'over_num';
        }
        else
        {

        $this->db->where('bo_id',$b_no);
        $this->db->where('status',1);
        $qry_01 = $this->db->get('booths')->result();
        // echo $qry_01->num_rows();die;
        if(!empty($qry_01))
        {
            echo 'not_empty';
            // /echo '<pre>';print_r($qry_01);die;
        }
        else
        {
            echo 'empty';
        }

        }
        // $result = $this->Membership_m->check_booth_status($b_no);
    }


    function search_by_nic_ajax()
    {
        $nic = $this->input->post('nic_no');
        $result = $this->Membership_m->search_by_nic_ajax($nic);
        foreach ($result as $value) 
        {
            $output[] = $value->Per_cnic;
            echo json_encode($output);
        }
    }

// ------------------- SEARCH by keys starts HERE --------------- //
    //  ------------------------------------------------------------------------
    
    function returncheckin (){
 
 $this->db->like( 'Per_cnic',$_POST['cnic'] );
            $this->db->where('Per_type','M');
            $this->db->or_where('Per_type','W');
 $query   = $this->db->get('person');
 $result  = $query->result_array();
 foreach ( $result as $row ){
     $array[] = $row['Per_cnic'];
 }
 $this->output->set_content_type('application_json');
 $this->output->set_output( json_encode([
     'result'   => 1,
     'array'    => $array
 ]) );
 
    }
    
    //  ------------------------------------------------------------------------
    
    function return_reg_no_member_search (){
 
 $this->db->like('m_id',$_POST['cnic']);
 $query   = $this->db->get('membership');
 $result  = $query->result_array();
 foreach ( $result as $row ){
     $array[] = $row['m_id'];
 }
 $this->output->set_content_type('application_json');
 $this->output->set_output( json_encode([
     'result'   => 1,
     'success'  => 'The Teacher have been successfully inserted',
     'array'    => $array
 ]) );
 
    } 
 
    //  ------------------------------------------------------------------------
    
    function return_name_member_search(){
 
 $this->db->like('Per_name',$_POST['cnic']);
 $query   = $this->db->get('person');
 $result  = $query->result_array();
 foreach ( $result as $row ){
     $array[] = $row['Per_name'];
 }
 $this->output->set_content_type('application_json');
 $this->output->set_output( json_encode([
     'result'   => 1,
     'success'  => 'The Teacher have been successfully inserted',
     'array'    => $array
 ]) );
 
    }
    
    //  ------------------------------------------------------------------------
    
    function return_mobile_member_search(){
 
 $this->db->like('Per_number',$_POST['cnic']);
 $query   = $this->db->get('person');
 $result  = $query->result_array();
 foreach ( $result as $row ){
     $array[] = $row['Per_number'];
 }
 $this->output->set_content_type('application_json');
 $this->output->set_output( json_encode([
     'result'   => 1,
     'success'  => 'The Teacher have been successfully inserted',
     'array'    => $array
 ]) );
 
    }
    
    //  ------------------------------------------------------------------------
    
    function return_license_no_member_search(){
 
 $this->db->like('Per_license_no',$_POST['cnic']);
 $query   = $this->db->get('person');
 $result  = $query->result_array();
 foreach ( $result as $row ){
     $array[] = $row['Per_license_no'];
 }
 $this->output->set_content_type('application_json');
 $this->output->set_output( json_encode([
     'result'   => 1,
     'success'  => 'The Teacher have been successfully inserted',
     'array'    => $array
 ]) );
 
    }
    
    //  ------------------------------------------------------------------------
    
    function return_card_member_search(){
 
 $this->db->like('m_card_no',$_POST['cnic']);
 $query   = $this->db->get('membership');
 $result  = $query->result_array();
 foreach ( $result as $row ){
     $array[] = $row['m_card_no'];
 }
 $this->output->set_content_type('application_json');
 $this->output->set_output( json_encode([
     'result'   => 1,
     'success'  => 'The Teacher have been successfully inserted',
     'array'    => $array
 ]) );
 
    }
    //  ------------------------------------------------------------------------
// ------------------- Update data On CheckIn Save Button -----------------// 

    function save_checkin_data()
    {
          
    }

    //  ------------------------------------------------------------------------

    public function checkProductDuplication(){
                   $this->db->where( 'p_code', $this->input->post('name') );
          $query  = $this->db->get('product');
          $result = $query->result();
          if( empty( $result ) ){
               echo '1';
          }else{
               echo '0';
          }
    }
    
    //  ------------------------------------------------------------------------
    public function get_guest_cnic(){
        
        $result = $this->main_m->get_guest_cnic();
        
    }
    //  ------------------------------------------------------------------------

}