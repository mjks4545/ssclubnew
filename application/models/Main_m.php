<?php
class Main_m extends CI_Model
{
    
    // -------------------------------------------------------------------------
    
    function loginpro(){
			$email =$this->input->post('email');
			$pwd = $this->input->post('password');
			$role = $this->input->post('role');
			//check in database
			$this->db->select('*');
			$this->db->where('email',$email);
			$this->db->where('pwd',$pwd);
			if($role=='admin'){
			   $query = $this->db->get('admin');
			}
			$num = $query->num_rows();
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
			}else
			{
				return 2;
			}
		}
		
  // -------------------------------------------------------------------------
  function searchmemberss(){
		$cnic = $this->input->post('cnic_crdno');
		$this->db->select('*');
		$this->db->from('person');
		$this->db->where('person.Per_cnic',$cnic);
		$this->db->join('');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	  
  }
  
	  function searchmember()
	  {
		 $cnic = $this->input->post('cnic_cardno');
		 $this->db->select('*');
		 $this->db->from('person');
		 $this->db->where('person.per_cnic',$cnic);
		 $tab_data = $this->db->get();
		 $per_data = $tab_data->num_rows();
		 if($per_data!=0){
		 $this->db->select('*');
		 $this->db->from('person');
		 $this->db->where('person.per_cnic',$cnic);
		 $this->db->join('membership',"membership.per_id=person.per_id");
		
		$query = $this->db->get();
		$data['persondata'] = $query->result();
		$m_id = $data['persondata'][0]->m_id;
		//echo '<pre>'; print_r($data);die;

		$this->db->from('nominated_guests');
		$this->db->where('m_id',$m_id);
		$this->db->join('person',"person.per_id=nominated_guests.per_id");
		$query_1 = $this->db->get();
		$data['memberdata'] = $query_1->result();
		//echo '<pre>';print_r($query_1->result());die;	

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
	 	$this->db->from('guest_checkin');
	 	$this->db->where('c_id',$c_id);
	 	$qry3 = $this->db->get();
	 	$qry5 = $qry3->result();
	 	// echo '<pre>';print_r($qry5);die;
	 	foreach ($qry5 as $value) 
		 	{
		 	$this->db->from('person');
		 	$this->db->where('person.per_id',$value->Per_id);
		 	$this->db->join('guest_checkin','person.per_id = guest_checkin.Per_id');
		 	$qury = $this->db->get();
		 	$p_data[] = $qury->result();
		 	}

	 	$data['guest_checkindata']= $p_data;
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

	 function checkOut_data()
	 {
	 	$c_id = $this->input->post('c_id');
	 	$checkin_data = array(
	 		'c_time_out'	=> $this->input->post('checkout_time'), //date('h:i sa'),
	 		'c_status'		=> 0,
	 		'c_arrival_date'=> $this->input->post('checkout_date')
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
		
	}