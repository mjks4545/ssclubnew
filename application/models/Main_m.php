<?php
class Main_m extends CI_Model
{
    //---------------------------------------------------------
    
    function __construct() {
        
        parent::__construct();
        //$this->autcall();
    }
    
    //---------------------------------------------------------
    
    public function autcall(){
        
        $this->db->select('*');
        $this->db->from('product');
        $result = $this->db->get()->result();
        $products = [];
        
        foreach( $result as $product ){
            $this->db->select_sum('p_quantity');
            $this->db->where('p_id',$product->p_id);
            $products[$product->p_id] = $this->db->get('purchase')->result();
            $products[$product->p_id] = $products[$product->p_id][0];
            $products[$product->p_id]->p_id = $product->p_id;
        }
        foreach ( $products as $product){
            
            $this->db->where( 'p_id', $product->p_id );
            
            $array = ['p_quantity' => $product->p_quantity ];
            echo $this->db->update('product', $array);
            
        }
        echo '<pre>';print_r( $products );die;
    }
    
    // -------------------------------------------------------------------------
    
    function loginpro(){
			$email =$this->input->post('email');
			$pwd = $this->input->post('password');
			$role = $this->input->post('role');
			//check in database
			$this->db->select('*');
			$this->db->where('email',$email);
			$this->db->where('pwd',$pwd);
			$query = $this->db->get('admin');
			$num = $query->num_rows();
			// echo $num;die;
			if($num>0){
			$result = $query->result();
			foreach($result as $row){
				if($row->status==0){
					return 0;
				}
				else
				{
					$session_data = array(
						'email'=>$email,
						'pwd'=>$pwd,
						'role'=>$role,
						'logged_in'=>1
					);
					$session = $this->session->set_userdata('session_data',$session_data);
				   return 1;
				}
			}
			
			}
		}
		
  // -------------------------------------------------------------------------
  function searchmemberss(){
		$cnic = $this->input->post('cnic_crdno');
		$this->db->select('*');
		$this->db->from('person');
		$this->db->where('person.Per_cnic',$cnic);
		// $this->db->join('');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	  
  }
          
          function searchmember_person( $nic ){
                $this->db->select('person.*,guest_checkin.g_id,guest_checkin.c_id,guest_checkin.g_status,guest_checkin.g_date,guest_checkin.g_nic_1,guest_checkin.g_nic_2,guest_checkin.g_profile_img');
                $this->db->from('person');
                $this->db->order_by('person.Per_id', 'desc');
                $this->db->join('guest_checkin', 'guest_checkin.Per_id = person.Per_id', 'left');
                $this->db->where('person.Per_cnic', $nic);
                return $this->db->get()->result();
          }
          
	  function searchmember()
	  {
		 $cnic = $this->input->post('cnic_cardno');
		 $this->db->select('*');
		 $this->db->from('person');
                 $this->db->where('person.Per_type!=','s');
                 $this->db->where('person.Per_type!=','R');
                 $this->db->where('person.Per_type!=','P');
                 $this->db->where('person.Per_type!=','N');
                 $this->db->where('person.Per_type!=','E');
                 $this->db->where('person.Per_type!=','C_G');
                 //$this->db->where('person.Per_type','W');
		 $this->db->where('person.per_cnic',$cnic);

		 $tab_data = $this->db->get();
		 $per_data = $tab_data->num_rows(); 
                 if( $per_data!=0 ){
		 $this->db->select('*');
		 $this->db->from('person');
                 $this->db->order_by('person.Per_id', 'desc');
		 $this->db->where('person.per_cnic',$cnic);
                 $this->db->where('person.Per_type!=','s');
                 $this->db->where('person.Per_type!=','R');
                 $this->db->where('person.Per_type!=','P');
                 $this->db->where('person.Per_type!=','N');
                 $this->db->where('person.Per_type!=','E');
                 $this->db->where('person.Per_type!=','C_G');
//		 $this->db->where('person.Per_type!=','s');
//		 $this->db->where('person.Per_type!=','R');
		 $this->db->join('membership',"membership.per_id=person.per_id");
		
		$query = $this->db->get();
		$data['persondata'] = $query->result();
		$m_id   = $data['persondata'][0]->m_id;
		//echo '<pre>'; print_r($data);die;
		$this->db->where('m_id',$m_id);
		$data['c_data'] = $this->db->get('checkin')->result();
		// echo '<pre>';print_r($c_data['c_data'][0]);die;
		$this->db->from('nominated_guests');
		$this->db->where('m_id',$m_id);
		$this->db->join('person',"person.per_id=nominated_guests.per_id");
		$query_1 = $this->db->get();
		$data['memberdata'] = $query_1->result();
		// echo '<pre>';print_r($query_1->result());die;	
		//---------------------------------------------------
		$this->db->where('m_id',$m_id);
		$this->db->limit(1);
		$this->db->order_by('c_id','desc');
		$checkin_data = $this->db->get('checkin')->result();
		if(!empty($checkin_data))
		{
		$c_id = $checkin_data[0]->c_id;

		$this->db->from('guest_checkin');
		$this->db->where('c_id',$c_id);
		$this->db->join('person','person.Per_id = guest_checkin.Per_id');
		$data['checkin_guest_data'] = $this->db->get()->result();
		}
		
		// echo '<pre>';print_r($chck);die;
        return $data;		
	 //print_r($data);die;
    	}
    	else
    	{
    		return $per_data;
    	}
	 }

	 function get_person_data($p_id,$m_id,$c_id)
	 {
	 	$this->db->from('person');
	 	$this->db->where('per_id',$p_id);
	 	$qry = $this->db->get();
	 	$data['persondata'] = $qry->result();
	 	////////////////////////////////////
	 	$this->db->from('membership');
	 	$this->db->where('m_id',$m_id);
	 	$qry1 = $this->db->get();
	 	$data['memberdata'] = $qry1->result();	
	 	////////////////////////////////////
	 	$this->db->from('checkin');
	 	$this->db->where('c_id',$c_id);
	 	$qry2 = $this->db->get();
	 	$data['checkindata'] = $qry2->result();
		////////////////////////////////////
		$this->db->from('billinfo');
	 	$this->db->where('billinfo.c_id',$c_id);
	 	$this->db->limit(1);
	 	$this->db->order_by('billinfo.b_id','desc');
	 	$this->db->join('sale','sale.b_id = billinfo.b_id');
	 	$qry2 = $this->db->get();
	 	$data['bill_data'] = $qry2->result();
	 	// echo '<pre>';print_r($data['bill_data']);die;
		////////////////////////////////////
	 	$this->db->from('guest_checkin');
	 	$this->db->where('c_id',$c_id);
	 	$this->db->join('person','person.Per_id = guest_checkin.Per_id');
	 	$qry3 = $this->db->get();
	 	$qry5[] = $qry3->result();
	 	// echo '<pre>';print_r($qry5);die;
	 	/*foreach ($qry5 as $value) 
		 	{
		 	$this->db->from('person');
		 	$this->db->where('person.per_id',$value->Per_id);
		 	$this->db->where('guest_checkin.c_id',$value->c_id);
		 	$this->db->join('guest_checkin','person.Per_id = guest_checkin.Per_id');
		 	$qury = $this->db->get();
		 	$p_data[] = $qury->result();
		 	}*/	
	 	$data['guest_checkindata']= $qry5;
	 	// echo '<pre>';print_r($data['guest_checkindata']);die;
	 	////////////////////////////////////
	 	$this->db->from('booths');
	 	$this->db->where('per_id',$p_id);
	 	$this->db->where('status',1);
	 	$qry4 = $this->db->get();
	 	$data['booth_data'] = $qry4->result();
	 	//echo '<pre>';print_r($data);die;
	 	return $data;
	 }

	 function checkOut_data($c_id,$arr_time)
	 {
	 	// $c_id = $this->input->post('c_id');
	 	// $arr_time;die;
	 	$checkin_data = array(
	 		'c_time_out'	  => $arr_time, //date('h:i sa'),
	 		'c_status'		  => 0,
	 		'c_departure_date'=> date("Y-m-d")
	 		);
	 	// echo '<pre>';print_r($checkin_data);die;
	 	$this->db->where('c_id',$c_id);
	 	$this->db->update('checkin',$checkin_data);

	 	$booth_data = array(
	 		'status'=>'0'
	 		);
	 	$this->db->where('c_id',$c_id);
	 	$this->db->update('booths',$booth_data);

	 }
         
         // -------------------------------------------------------------------
         
         public function get_guest_cnic(){
             $cnic = $this->input->post('cnic');
             $this->db->where('Per_cnic', $cnic);
             $query = $this->db->get('person');
             $result = $query->result();
             $result = $result[0];
             $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode( $result ));
             return 1;
         }
         
         // -------------------------------------------------------------------
		
	}