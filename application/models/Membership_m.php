<?php

class Membership_m extends CI_Model
{
    
    // -------------------------------------------------------------------------
    
    function insert() {
	$data_person = [
	    'Per_name'         => $this->input->post('name'),
	    'Per_f_name'       => $this->input->post('father_name'),
	    'Per_number'       => $this->input->post('mobile_no'),
	    'Per_cnic'         => $this->input->post('n_no'),
	    'Per_address'      => $this->input->post('address'),
	    'Per_license_no'   => $this->input->post('l_no'),
	    'Per_weapon_no'    => $this->input->post('w_no'),
	    'Per_experience'   => $this->input->post('shooting_exp'),
	    'Per_date'         => $this->input->post('mem_create_date'), //date('Y-m-d')
	    'Per_type'         => 'M',
	    'Per_notes'        => '',
	];
	$cnic = $this->input->post('n_no');
	$this->db->select('*');
	$this->db->from('person');
	$this->db->where('Per_cnic',$cnic);
	$query = $this->db->get();
	/*$num = $query->num_rows();
	if ($num == 0){
		*/ 
	 
	$insert_person = $this->db->insert('person',$data_person);
	$person_id = $this->db->insert_id();

// ------------------ Image Uploading Section ------------------------//

	$profile_img = $_FILES['userfile']['name'];

	$nic_1 = $_FILES['m_nic_1']['name'];

	$nic_2 = $_FILES['m_nic_2']['name'];
    
     // echo '1 ' . $profile_img . '<br> 2 ' . $nic_1 . '<br> 3 ' . $nic_2;

	if($profile_img !== ""){
         $config['overwrite'] = TRUE;
		 $config['encrypt_name'] = FALSE;
		 $config['remove_spaces'] = TRUE;
		 $config['upload_path'] = './uploads/members/'; // use an absolute path
		 $config['allowed_types'] = 'jpg|png|jpeg|gif';
		 $config['max_size'] = '0'; 
		 if ( ! is_dir($config['upload_path']) ) die("THE UPLOAD DIRECTORY DOES NOT EXIST");
		 $this->load->library('upload',$config);
		 if ( ! $this->upload->do_upload('userfile') )
		 {
		  echo "UPLOAD ERROR ! ".$this->upload->display_errors();
		 } else {
		  echo "THE IMAGE HAS BEEN UPLOADED : "; var_dump( $this->upload->data() );
		 }     
    }
    if($nic_1 !== ""){
       $config['overwrite'] = TRUE;
		 $config['encrypt_name'] = FALSE;
		 $config['remove_spaces'] = TRUE;
		 $config['upload_path'] = './uploads/members/'; // use an absolute path
		 $config['allowed_types'] = 'jpg|png|jpeg|gif';
		 $config['max_size'] = '0'; 
		 if ( ! is_dir($config['upload_path']) ) die("THE UPLOAD DIRECTORY DOES NOT EXIST");
		 $this->load->library('upload',$config);
		 if ( ! $this->upload->do_upload('m_nic_1') )
		 {
		  echo "UPLOAD ERROR ! ".$this->upload->display_errors();
		 } else {
		  echo "THE IMAGE HAS BEEN UPLOADED : "; var_dump( $this->upload->data() );
		 }   
    }
    if($nic_2 !== ""){
        $config['overwrite'] = TRUE;
		 $config['encrypt_name'] = FALSE;
		 $config['remove_spaces'] = TRUE;
		 $config['upload_path'] = './uploads/members/'; // use an absolute path
		 $config['allowed_types'] = 'jpg|png|jpeg|gif';
		 $config['max_size'] = '0'; 
		 if ( ! is_dir($config['upload_path']) ) die("THE UPLOAD DIRECTORY DOES NOT EXIST");
		 $this->load->library('upload',$config);
		 if ( ! $this->upload->do_upload('m_nic_2') )
		 {
		  echo "UPLOAD ERROR ! ".$this->upload->display_errors();
		 } else {
		  echo "THE IMAGE HAS BEEN UPLOADED : "; var_dump( $this->upload->data() );
		 }   
    }
	// echo '1 ' . $profile_img . ' 2 ' . $nic_1 . ' 3 ' . $nic_2;	
// ------------------------- Finish Image Uploading Section ------------------ //	

	$data_membership = [
	    'Per_id'          => $person_id,
	    'm_date_of_birth' => $this->input->post('d_o_birth'),
		'm_image'         => $profile_img,
 		// This was for Services/Buisness but changed to relationship but the so only front-end will changed //		
	    'm_service'       => $this->input->post('service'),
		//-----------------------------------------------------------------------------------//	
	    'm_type'          => $this->input->post('membership'),
	    'm_card_no'       => $this->input->post('c_no'),
	    'm_valid_from'    => $this->input->post('valid_from'),
	    'm_valid_to'      =>  $this->input->post('valid_to'),
	    'm_f_shadule'	  =>  $this->input->post('feeschedule'),
	    'm_refrance_name' => $this->input->post('ref_name'),
	    'm_date'		  => $this->input->post('mem_create_date'), //date('Y-m-d')
	    'm_w_type'		  => $this->input->post('w_type'),
	    'm_payment'		  => $this->input->post('payment'),
	    'm_conviction'	  => $this->input->post('a_conviction'),
	    'm_education'	  => $this->input->post('education'),
	    'm_employment'	  => $this->input->post('c_employment'),
	    'm_no_w'		  => $this->input->post('no_w'),
	    'm_status'		  => 1,
	    'm_date'		  => $this->input->post('mem_create_date'),
	    'm_nic_image1'	  => $nic_1,
	    'm_nic_image2'	  => $nic_2

	];
	  if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
            echo $error;

        } else {
            $data = array('upload_data' => $this->upload->data());
            $image_path = $data['upload_data']['file_name'];
            // echo $image_path;
        }
	// echo'<pre>';print_r($data_membership);die;
	$insert_membership = $this->db->insert('membership',$data_membership);
	$member_id = $this->db->insert_id();
	// echo '1 ' . $profile_img . ' 2 ' . $nic_1 . ' 3 ' . $nic_2;
	// die;
	//------------------------------------------------------------------
	$data_person1 = [
	    'Per_name'         => $this->input->post('e_name'),
	    'Per_number'       => $this->input->post('e_mobile'),
	    'Per_cnic'         => $this->input->post('e_cnic'),
	    'Per_address'      => $this->input->post('e_address'),
	    'Per_type'		   => 'E',
	    'Per_date'         => $this->input->post('mem_create_date'), //date('Y-m-d')

	];
	$insert_person = $this->db->insert('person',$data_person1);
	$e_mem_id = $this->db->insert_id();

	//-----------------------------------------------------------------------
	$data_emergency = [
	    'Per_id'           => $e_mem_id, 
	    'e_services'       => $this->input->post('e_service'),
		'm_id'             => $member_id,
	];
	$insert_membership = $this->db->insert('emergencydetails',$data_emergency);
    
	//--------------------------------------------------------------------------
	$refrence_person = [
	   'Per_name'          => $this->input->post('ref_name'),
	    'Per_number'       => $this->input->post('ref_mobile'),
	    'Per_cnic'         => $this->input->post('ref_cnic'),
	    'Per_address'      => $this->input->post('ref_address'),
	    'Per_type'		   => 'R',
	    'Per_date'         => $this->input->post('mem_create_date'), //date('Y-m-d')
	];
	$insert_person = $this->db->insert('person',$refrence_person);
	$ref_mem_id = $this->db->insert_id();
    //--------------------------------------------------------------------------
	$data_refrence = [
	    'Per_id'           => $ref_mem_id, 
	    'ref_service'  => $this->input->post('ref_service'),
		'm_id'              => $member_id,
	];
	$insert_membership = $this->db->insert('reference_person',$data_refrence);
    
    // -------------------------------------------------------------------------
    $data_nominated = [
     'Per_name'         => $this->input->post('nominated_name'),
     'Per_number'       => $this->input->post('nominated_mobile'),
     'Per_cnic'         => $this->input->post('nominated_cnic'),
     'Per_address'      => $this->input->post('nominated_address'),
     'Per_type'		    => 'N',
     'Per_date'         => $this->input->post('mem_create_date'), //date('Y-m-d')
 ];
 $insert_person = $this->db->insert('person',$data_nominated);
 $nominated_mem_id = $this->db->insert_id();
    //--------------------------------------------------------------------------
 $data_nominated_guest = [
     'Per_id'           => $nominated_mem_id, 
     'm_id'              => $member_id,
 ];
 $insert_guest_nominated = $this->db->insert('nominated_guests',$data_nominated_guest);
 
 $data_nominated = [
     'Per_name'         => $this->input->post('nominated_1_name'),
     'Per_number'       => $this->input->post('nominated_1_mobile'),
     'Per_cnic'         => $this->input->post('nominated_1_cnic'),
     'Per_address'      => $this->input->post('nominated_1_address'),
     'Per_type'		    => 'N',
     'Per_date'         => $this->input->post('mem_create_date'), //date('Y-m-d')
 ];
 $insert_person = $this->db->insert('person',$data_nominated);
 $nominated_mem_id = $this->db->insert_id();
    //--------------------------------------------------------------------------
 $data_nominated_guest = [
     'Per_id'           => $nominated_mem_id, 
     'm_id'              => $member_id,
 ];
 $insert_guest_nominated = $this->db->insert('nominated_guests',$data_nominated_guest);

 $data_nominated = [
     'Per_name'         => $this->input->post('nominated_2_name'),
     'Per_number'       => $this->input->post('nominated_2_mobile'),
     'Per_cnic'         => $this->input->post('nominated_2_cnic'),
     'Per_address'      => $this->input->post('nominated_2_address'),
     'Per_type'		   => 'N',
     'Per_date'         => $this->input->post('mem_create_date'), //date('Y-m-d')
 ];
 $insert_person = $this->db->insert('person',$data_nominated);
 $nominated_mem_id = $this->db->insert_id();
    //--------------------------------------------------------------------------
 $data_nominated_guest = [
     'Per_id'           => $nominated_mem_id, 
     'm_id'              => $member_id,
 ];
 $insert_guest_nominated = $this->db->insert('nominated_guests',$data_nominated_guest);
	
    /*}
	else {
		$this->session->set_flashdata('msg','Membership already exist! ');
        $this->session->set_flashdata('type','danger');
        redirect('admin');
		// echo "double entry";
	}*/
	}
	
	function upload_image( $profile_img ){
		/*$config['upload_path'] = './uploads/members/';                        
        //$config['log_threshold'] = 1;
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['max_size'] = '0'; // 0 = no file size limit
        $config['file_name']= $profile_img;          
        $config['overwrite'] = false;
        $this->load->library('upload', $config);
        $this->upload->do_upload($profile_img);
        $upload_data = $this->upload->data();
        $file_name = $upload_data['file_name'];
        return 0;*/
   	 $config['overwrite'] = TRUE;
	 $config['encrypt_name'] = FALSE;
	 $config['remove_spaces'] = TRUE;
	 $config['upload_path'] = './uploads/members/'; // use an absolute path
	 $config['allowed_types'] = 'jpg|png|jpeg|gif';
	 $config['max_size'] = '0'; 
	 if ( ! is_dir($config['upload_path']) ) die("THE UPLOAD DIRECTORY DOES NOT EXIST");
	 $this->load->library('upload',$config);
	 if ( ! $this->upload->do_upload($profile_img) )
	 {
	  echo "UPLOAD ERROR ! ".$this->upload->display_errors();
	 } else {
	  echo "THE IMAGE HAS BEEN UPLOADED : "; var_dump( $this->upload->data() );
	 }     
	}

	function update_membership_record()
	{
		$per_id = $this->input->post('update_id');
		$data_person = [
	    'Per_name'         => $this->input->post('name'),
	    'Per_f_name'       => $this->input->post('father_name'),
	    'Per_number'       => $this->input->post('mobile_no'),
	    'Per_cnic'         => $this->input->post('n_no'),
	    'Per_address'      => $this->input->post('address'),
	    'Per_license_no'   => $this->input->post('l_no'),
	    'Per_weapon_no'    => $this->input->post('per_w_no'),
	    'Per_experience'   => $this->input->post('shooting_exp'),
	    'Per_date'         => $this->input->post('edit_mem_date'), //date('Y-m-d'),
	    'Per_type'         => 'M',
	    'Per_notes'        => ''
	];
	//echo '<pre>';print_r($data_person);die;
	$this->db->where('Per_id',$per_id);
	$this->db->update('person',$data_person); 
///////////////// GETTING M_ID FROM MEMBERSHIP //////////////////
	$this->db->where('per_id',$per_id);
	$qry = $this->db->get('membership');
	$data = $qry->result();
	$m_id = $data[0]->m_id;
	$m_image = $data[0]->m_image;
////////////////// MEMBERSHIP DATA /////////////////////////////
		$config['upload_path']='./uploads/members';
		$config['allowed_types']='jpg|png|gif';
		$config['max_size']='50000';
		$this->load->library('upload',$config);
	if( empty( $_FILES['userfile']['name'] ) ){

		$img = $m_image;

	}else{
		
		$img = $_FILES['userfile']['name'];
	}

	$data_membership = [
	    'Per_id'           => $per_id,
	    'm_date_of_birth'  => $this->input->post('d_o_birth'),
		'm_image'          => $img,
		'm_type'		   => $this->input->post('m_type'),
	    'm_service'        => $this->input->post('service'),
	    'm_w_type'         => $this->input->post('w_type'),
	    'm_card_no'        => $this->input->post('c_no'),
	    'm_valid_from'     => $this->input->post('valid_from'),
	    'm_valid_to'       => $this->input->post('valid_to'),
	    'm_refrance_name'  => $this->input->post('ref_name'),
	    'm_employment'	   => $this->input->post('c_employment'),
		'm_payment'		   => $this->input->post('payment'),
		'm_education'	   => $this->input->post('education'),	
		'm_no_w'	       => $this->input->post('no_w'),
		'm_w_type'		   => $this->input->post('w_type'),
		'm_conviction'	   => $this->input->post('a_conviction'),
		'm_f_shadule'	   => $this->input->post('feeschedule'),
		'm_date'		   => $this->input->post('edit_mem_date')
	];
	  if (!$this->upload->do_upload('userfile')) {
        $error = array('error' => $this->upload->display_errors());
        echo $error;

    } else {
        $data = array('upload_data' => $this->upload->data());
        $image_path = $data['upload_data']['file_name'];
        //echo $image_path;
    }
	$this->db->where('m_id',$m_id);
	$this->db->update('membership',$data_membership);
		//echo '<pre>';print_r($data_membership);die;
/////////////////////// EMERGENCY DETAILS DATA //////////////////////
	$this->db->where('m_id',$m_id);
	$qry_1 = $this->db->get('emergencydetails');
	$data_1 = $qry_1->result();
 	$e_p_id = $data_1[0]->Per_id;

		$data_person1 = [
	    'Per_name'         => $this->input->post('e_name'),
	    'Per_number'       => $this->input->post('e_mobile'),
	    'Per_cnic'         => $this->input->post('e_cnic'),
	    'Per_address'      => $this->input->post('e_address'),
	    'Per_date'		   => $this->input->post('edit_mem_date'),
	];
	//echo '<pre>';print_r($data_person1);die;
	$this->db->where('Per_id',$e_p_id);
	$this->db->update('person',$data_person1);
		
		$data_emergency = [
	    'Per_id'           => $e_p_id, 
	    'e_services'       => $this->input->post('e_service'),
		'm_id'             => $m_id,
	];	
	$this->db->where('m_id',$m_id);
	$this->db->update('emergencydetails',$data_emergency);
	//echo '<pre>';print_r($qry_1->result() );die;
/////////////////////// REFRENCE DETAILS DATA //////////////////////
	$this->db->where('m_id',$m_id);
	$qry_2 = $this->db->get('reference_person');
	$data_2 = $qry_2->result();
	//print_r($data_2);die;
 	$r_p_id = $data_2[0]->per_id;
 	//echo $r_p_id;die;
	$update_refrence_person = [
	   'Per_name'         => $this->input->post('ref_name'),
	    'Per_number'       => $this->input->post('ref_mobile'),
	    'Per_cnic'         => $this->input->post('ref_cnic'),
	    'Per_address'      => $this->input->post('ref_address'),
	    'Per_date'		   => $this->input->post('edit_mem_date'),	    
	];
	//echo '<pre>';print_r($data_person1);die;
	$this->db->where('Per_id',$r_p_id);
	$this->db->update('person',$update_refrence_person);
		
	$update_data_refrence = [
	    'Per_id'           => $r_p_id, 
	    'ref_service'  => $this->input->post('ref_service'),
		'm_id'              => $m_id,
	];
	$this->db->where('m_id',$m_id);
	$this->db->update('reference_person',$update_data_refrence);
	//echo '<pre>';print_r($qry_1->result() );die;
/////////////////////NOMINATED DATA UPDATE////////////////
	$this->db->where('m_id',$m_id);
	$qry_8 = $this->db->get('nominated_guests');
	$data_8 = $qry_8->result();
	$n_p_id_1 = $data_8[0]->Per_id;
	$n_p_id_2 = $data_8[1]->Per_id;
	$n_p_id_3 = $data_8[2]->Per_id;
//////////////////////START UPDATIG ///////////////////////

$update_data_nominated = [
     'Per_name'         => $this->input->post('nominated_name'),
     'Per_number'       => $this->input->post('nominated_mobile'),
     'Per_cnic'         => $this->input->post('nominated_cnic'),
     'Per_address'      => $this->input->post('nominated_address'),
     'Per_date'		   => $this->input->post('edit_mem_date'),
     
 ];
 		$this->db->where('Per_id',$n_p_id_1);
 		$this->db->update('person',$update_data_nominated);
 /////////////////// UPDATE NOMINATED/////////////////////////
 /*$data_nominated_guest = [
     'Per_id'           => $n_p_id_1, 
     'm_id'              => $m_id,
 ];
 		$this->db->where('per_id',$n_p_id_1);
 		$this->db->update('nominated_guests',$data_nominated_guest);*/
    //--------------------------------------------------------------------------
 
 $update_data_nominated_1 = [
     'Per_name'         => $this->input->post('nominated_1_name'),
     'Per_number'       => $this->input->post('nominated_1_mobile'),
     'Per_cnic'         => $this->input->post('nominated_1_cnic'),
     'Per_address'      => $this->input->post('nominated_1_address'),
     'Per_date'		   => $this->input->post('edit_mem_date')
     
 ];
 	$this->db->where('Per_id',$n_p_id_2);
 	$this->db->update('person',$update_data_nominated_1);
 /////////////////// UPDATE NOMINATED/////////////////////////
 /*$data_nominated_guest_1 = [
     'Per_id'           => $n_p_id_2, 
     'm_id'              => $m_id,
 ];
 		$this->db->where('per_id',$n_p_id_2);
 		$this->db->update('nominated_guests',$data_nominated_guest_2);	*/
    //--------------------------------------------------------------------------
 $update_data_nominated_2 = [
     'Per_name'         => $this->input->post('nominated_2_name'),
     'Per_number'       => $this->input->post('nominated_2_mobile'),
     'Per_cnic'         => $this->input->post('nominated_2_cnic'),
     'Per_address'      => $this->input->post('nominated_2_address'),
     'Per_date'		   => $this->input->post('edit_mem_date') 
 ];

 		$this->db->where('Per_id',$n_p_id_3);
 		$result = $this->db->update('person',$update_data_nominated_2); 
 		if($result){
 			return 1;
 		}else{
 			return 0;
 		}
/////////////////// UPDATE NOMINATED/////////////////////////
 /*$data_nominated_guest_2 = [
     'Per_id'           => $n_p_id_2, 
     'm_id'              => $m_id,
 ];
 		$this->db->where('per_id',$n_p_id_2);
 		$this->db->update('nominated_guests',$data_nominated_guest_2); 		*/
    //--------------------------------------------------------------------------
	}
///////////////////// END UPDATIGN ///////////////////////	

//---------------------- Save Data at Checkin time ---------------------//

	function save_checkin_person_data()
	{
		$per_id = $this->input->post('per_id');
		$m_id   = $this->input->post('m_id');
		$c_id   = $this->input->post('c_id');
		$bo_id  = $this->input->post('bo_id');
		
		$person_data = array(
    	 'Per_name'         => $this->input->post('name'),
    	 'Per_number'       => $this->input->post('contact'),
    	 'Per_cnic'         => $this->input->post('n_no'),
    	 'Per_address'      => $this->input->post('address'),
    	 'Per_f_name'		=> $this->input->post('father_name'),
    	 'Per_license_no'	=> $this->input->post('l_no'),
    	 'Per_weapon_no'	=> $this->input->post('w_no'),
    	 'Per_experience'	=> $this->input->post('s_e'),
    	 'Per_date'			=> $this->input->post('c_date'),   //date('Y-m-d'),
    	 'Per_type'			=> 'W'
     		);
		/*$this->db->where('Per_id',$per_id);
		$this->db->update('person',$person_data);*/
		
//------------------------------------------------------------- //
		$data_new_member = array(
			    'Per_id'         => '$per_id',
			    'm_type'         => $this->input->post('membership'),
			    'm_card_no'      => $this->input->post('c_no'),
			    'm_w_type'		 => $this->input->post('weapon'),
			    'm_no_w'		 => $this->input->post('w_no'),
			    'm_date'		 => $this->input->post('c_date')   //date('Y-m-d'),
			);
		/*$this->db->where('m_id',$m_id);
		$this->db->update('membership',$data_new_member);*/
		// echo '<pre>';print_r($data_new_member);
// ----------------------- CheckIn data ----------------------------//
		$new_checkin = array(
		  	'c_fire'			=>$this->input->post('no_fire'),
		  	'm_id'				=>$m_id,
		  	'c_profession'		=>$this->input->post('proffession'),
		  	'boot_no'			=>$this->input->post('booth_no'),
		  	'no_persons'		=>$this->input->post('no_person'),
			'range_charge'		=>$this->input->post('range_charge'),
			'remarks'			=>$this->input->post('remarks'),
			'c_arrival_date'	=> $this->input->post('arr_date'),//date('Y-m-d'),
			'c_arrival_time'	=>$this->input->post('arr_t'),//date('h:i sa'),
			'c_departure_date'	=> $this->input->post('dep_date'),//date('Y-m-d'),
			'c_departure_time'	=>$this->input->post('dep_time'),//date('h:i sa'),
			'c_status'			=>1,
			'c_weapon'			=>$this->input->post('weapon'),
			'c_weapon_name'		=>$this->input->post('w_no')		  	
		  	);	
		// echo '<pre>';print_r($new_checkin);
		/*$this->db->where('c_id',$c_id);
		$this->db->update('checkin',$new_checkin);*/

// ------------------------------ Chekin Guest ---------------------//
// -----------------------------------------------------------------//
		 $data_guest_1 = [
    	 'Per_name'         => $this->input->post('nominated_name'),
    	 'Per_number'       => $this->input->post('nominated_mobile'),
    	 'Per_cnic'         => $this->input->post('nominated_cnic'),
    	 'Per_address'      => $this->input->post('nominated_address'),
    	 'Per_type'			=> 'C_G',
    	 'Per_date'			=> $this->input->post('c_date'),   //date('Y-m-d'), 
     	];
	// echo '<pre>';print_r($data_guest_1);
	/*$this->db->where('Per_id',$this->input->post('guest_1_id'));
	$this->db->update('person',$data_guest_1);	*/	 

// ------------------------------------------------------------------//
		 $data_guest_2 = [
		     'Per_name'         => $this->input->post('nominated_1_name'),
		     'Per_number'       => $this->input->post('nominated_1_mobile'),
		     'Per_cnic'         => $this->input->post('nominated_1_cnic'),
		     'Per_address'      => $this->input->post('nominated_1_address'),
		     'Per_type'			=> 'C_G',
		     'Per_date'			=> $this->input->post('c_date'),   //date('Y-m-d'),
		    ];
			// echo '<pre>';print_r($data_guest_2);
		   /* $this->db->where('Per_id',$this->input->post('guest_2_id'));
			$this->db->update('person',$data_guest_2);	*/
// ------------------------------------------------------------------------------//
 $data_guest_3 = [
		     'Per_name'         => $this->input->post('nominated_2_name'),
		     'Per_number'       => $this->input->post('nominated_2_mobile'),
		     'Per_cnic'         => $this->input->post('nominated_2_cnic'),
		     'Per_address'      => $this->input->post('nominated_2_address'),
		     'Per_type'			=> 'C_G',
		     'Per_date'			=> $this->input->post('c_date'),   //date('Y-m-d'),
		     
		 ];
		// echo '<pre>';print_r($data_guest_3);
		/* $this->db->where('Per_id',$this->input->post('guest_3_id'));
		 $this->db->update('person',$data_guest_3);*/	
	// -----------------------------------------------------------------//
		if($bo_id != $this->input->post('booth_no'))
		{
			// echo $this->input->post('booth_no');die;
			$data_new_booth = array(
		  		'c_id'			=>$c_id,
		  		'per_id'		=>$per_id,
		  		'no_persons'	=>$this->input->post('no_person'),
		  		'range_charges' =>$this->input->post('range_charge'),
		  		'remarks'		=>$this->input->post('remarks'),
		  		'status'		=>1
		  	);
  		 $booth_id = $this->input->post('booth_no');
  		 // echo $booth_id;die;
		 $this->db->where('bo_id',$booth_id);
		 $this->db->update('booths',$data_new_booth);
		 // ----------------------------------------------//
		 $restore_booth = array(
		 		'status'	=> 0
		 	);	
		 $this->db->where('bo_id',$bo_id);
		 $this->db->update('booths',$restore_booth);

		 $checkin_update = array(
		 		'boot_no'	=> $this->input->post('booth_no')
		 	);	
		 $this->db->where('c_id',$c_id);
		 $this->db->update('Checkin',$checkin_update);

		}
		else{
			// echo 'Not changed something';die;
				$data_booth = array(
		  		'c_id'			=>$c_id,
		  		'per_id'		=>$per_id,
		  		'no_persons'	=>$this->input->post('no_person'),
		  		'range_charges' =>$this->input->post('range_charge'),
		  		'remarks'		=>$this->input->post('remarks'),
		  		);
			$this->db->where('bo_id',$bo_id);
			$this->db->update('booths',$data_booth);	

		}
		 


	}


	function insert_new_checkin()
	{
		$person_data = array(
    	 'Per_name'         => $this->input->post('new_name'),
    	 'Per_number'       => $this->input->post('new_contact'),
    	 'Per_cnic'         => $this->input->post('new_n_no'),
    	 'Per_address'      => $this->input->post('new_address'),
    	 'Per_f_name'		=> $this->input->post('new_father_name'),
    	 'Per_license_no'	=> $this->input->post('new_l_no'),
    	 'Per_weapon_no'	=> $this->input->post('new_w_no'),
    	 'Per_experience'	=> $this->input->post('new_s_e'),
    	 'Per_date'			=> $this->input->post('c_date'),   //date('Y-m-d'),
    	 'Per_type'			=> 'W'
     		);

		$this->db->insert('person',$person_data);
		$per_id = $this->db->insert_id();
	////////////////////////////////////////////////////
// ----------------------- Image Upload ------------------------//
	$profile_img = $_FILES['img']['name'];
	if($profile_img !== ""){
         $config['upload_path'] = './uploads/members/';   
         $config['log_threshold'] = 1;                     
         $config['allowed_types'] = 'jpg|png|jpeg|gif';
         $config['max_size'] = '0'; // 0 = no file size limit
         $config['overwrite'] = false;
         $this->load->library('upload', $config);
         $this->upload->do_upload('img');
         $upload_data = $this->upload->data();
         $file_name = $upload_data['file_name'];
    }
//------------------------------------------------------------- //
		$data_new_member = array(
			    'Per_id'         => $per_id,
				'm_image'        => $profile_img,
			    'm_type'         => $this->input->post('membership'),
			    'm_card_no'      => $this->input->post('new_c_no'),
			    'm_w_type'		 => $this->input->post('new_weapon'),
			    'm_no_w'		 => $this->input->post('new_w_no'),
			    'm_date'		 => $this->input->post('c_date')   //date('Y-m-d'),
			);
		//echo '<pre>';print_r($data_new_member);die;
		$insert_new_member = $this->db->insert('membership',$data_new_member);
		$m_id = $this->db->insert_id();
	////////////////////////////////////////////////////	
		//echo $id;die;  
		  $new_checkin = array(
		  	'c_fire'			=>$this->input->post('new_no_fire'),
		  	'm_id'				=>$m_id,
		  	'c_profession'		=>$this->input->post('new_proffession'),
		  	'boot_no'			=>$this->input->post('new_booth_no'),
		  	'no_persons'		=>$this->input->post('new_no_person'),
			'range_charge'		=>$this->input->post('new_range_charge'),
			'remarks'			=>$this->input->post('new_remarks'),
			'c_arrival_date'	=> $this->input->post('arr_date'),//date('Y-m-d'),
			'c_arrival_time'	=>$this->input->post('new_a_t'),//date('h:i sa'),
			'c_departure_date'	=> $this->input->post('dep_date'),//date('Y-m-d'),
			'c_departure_time'	=>$this->input->post('dep_time'),//date('h:i sa'),
			'c_status'			=>1,
			'c_weapon'			=>$this->input->post('new_weapon'),
			'c_weapon_name'		=>$this->input->post('new_w_no')		  	
		  	);
		// echo '<pre>';print_r($new_checkin);
		  $this->db->insert('checkin',$new_checkin);
		 $c_id = $this->db->insert_id();
//////////////////////////////////////////////////////////////
		  $data_new_booth = array(
		  		'c_id'=>$c_id,
		  		'per_id'=>$per_id,
		  		'status'=>'1'
		  	);
		 //echo "<pre>";print_r($data_new_booth);
  		 $bo_id = $this->input->post('new_booth_no');
		 $this->db->where('bo_id',$bo_id);
		 $this->db->update('booths',$data_new_booth);

/////////////////////////// Insert Nominated Guest////////////////

// ----------------------- GUEST 1 Images Upload ------------------------//
	$profile_img_1 = $_FILES['userfile_1']['name'];
	$g1_nic_1 = $_FILES['g1_nic_1']['name'];
	$g1_nic_2 = $_FILES['g1_nic_2']['name'];
	
	if($profile_img_1 !== ""){
         $config['upload_path'] = './uploads/members/';  
         $config['log_threshold'] = 1;                      
         $config['allowed_types'] = 'jpg|png|jpeg|gif';
         $config['max_size'] = '0'; // 0 = no file size limit
         $config['overwrite'] = false;
         $this->load->library('upload', $config);
         $this->upload->do_upload('userfile_1');
         $upload_data = $this->upload->data();
         $file_name = $upload_data['file_name'];
    }
    if($g1_nic_1 !== ""){
         $config['upload_path'] = './uploads/members/';  
         $config['log_threshold'] = 1;                      
         $config['allowed_types'] = 'jpg|png|jpeg|gif';
         $config['max_size'] = '0'; // 0 = no file size limit
         $config['overwrite'] = false;
         $this->load->library('upload', $config);
         $this->upload->do_upload('g1_nic_1');
         $upload_data = $this->upload->data();
         $file_name = $upload_data['file_name'];
    }
    if($g1_nic_2 !== ""){
         $config['upload_path'] = './uploads/members/'; 
         $config['log_threshold'] = 1;                       
         $config['allowed_types'] = 'jpg|png|jpeg|gif';
         $config['max_size'] = '0'; // 0 = no file size limit
         $config['overwrite'] = false;
         $this->load->library('upload', $config);
         $this->upload->do_upload('g1_nic_2');
         $upload_data = $this->upload->data();
         $file_name = $upload_data['file_name'];
    }
//------------------------------------------------------------- //		 
		$new_data_nominated = [
    	 'Per_name'         => $this->input->post('new_nominated_name'),
    	 'Per_number'       => $this->input->post('new_nominated_mobile'),
    	 'Per_cnic'         => $this->input->post('new_nominated_cnic'),
    	 'Per_address'      => $this->input->post('new_nominated_address'),
    	 'Per_type'			=> 'C_G',
    	 'Per_date'			=> $this->input->post('c_date'),   //date('Y-m-d'), 
     	];
     	//echo '<pre>';print_r($new_data_nominated);die;
		 $insert_person = $this->db->insert('person',$new_data_nominated);
		 $new_nominated_mem_id = $this->db->insert_id();
		    //--------------------------------------------------------------------------
		 $new_data_guest_checkin = [
		     'Per_id'           => $new_nominated_mem_id, 
		     'c_id'              => $c_id,
		     'g_status'			=>'1',
		     'g_date'			=>$this->input->post('c_date'),
		     'g_nic_1'			=> $g1_nic_1,
		     'g_nic_2'			=> $g1_nic_2,
		     'g_profile_img'	=> $profile_img_1
		 ];
		 //echo '<pre>';print_r($new_data_guest_checkin);die;
		$this->db->insert('guest_checkin',$new_data_guest_checkin);
		 
		 $new_data_nominated_0 = [
		     'Per_name'         => $this->input->post('new_nominated_1_name'),
		     'Per_number'       => $this->input->post('new_nominated_1_mobile'),
		     'Per_cnic'         => $this->input->post('new_nominated_1_cnic'),
		     'Per_address'      => $this->input->post('new_nominated_1_address'),
		     'Per_type'			=> 'C_G',
		     'Per_date'			=> $this->input->post('c_date'),   //date('Y-m-d'),
		    ];
		   
		 $insert_person = $this->db->insert('person',$new_data_nominated_0);
		 $new_nominated_mem_id = $this->db->insert_id();
		//--------------------------------------------------------------------------
		 
// ----------------------- GUEST 2 Images Upload ------------------------//
	$profile_img_2 = $_FILES['userfile_2']['name'];
	$g1_nic_1 = $_FILES['g2_nic_1']['name'];
	$g1_nic_2 = $_FILES['g2_nic_2']['name'];
	
	if($profile_img_2 !== ""){
         $config['upload_path'] = './uploads/members/';  
         $config['log_threshold'] = 1;                      
         $config['allowed_types'] = 'jpg|png|jpeg|gif';
         $config['max_size'] = '0'; // 0 = no file size limit
         $config['overwrite'] = false;
         $this->load->library('upload', $config);
         $this->upload->do_upload('userfile_2');
         $upload_data = $this->upload->data();
         $file_name = $upload_data['file_name'];
    }
    if($g2_nic_1 !== ""){
         $config['upload_path'] = './uploads/members/';  
         $config['log_threshold'] = 1;                      
         $config['allowed_types'] = 'jpg|png|jpeg|gif';
         $config['max_size'] = '0'; // 0 = no file size limit
         $config['overwrite'] = false;
         $this->load->library('upload', $config);
         $this->upload->do_upload('g2_nic_1');
         $upload_data = $this->upload->data();
         $file_name = $upload_data['file_name'];
    }
    if($g2_nic_2 !== ""){
         $config['upload_path'] = './uploads/members/';  
         $config['log_threshold'] = 1;                      
         $config['allowed_types'] = 'jpg|png|jpeg|gif';
         $config['max_size'] = '0'; // 0 = no file size limit
         $config['overwrite'] = false;
         $this->load->library('upload', $config);
         $this->upload->do_upload('g2_nic_2');
         $upload_data = $this->upload->data();
         $file_name = $upload_data['file_name'];
    }
//------------------------------------------------------------- //		 		 

		 $new_data_guest_checkin_1 = [
		     'Per_id'           => $new_nominated_mem_id, 
		     'c_id'              => $c_id,
		     'g_status'			=>'1',
		     'g_date'			=>$this->input->post('c_date'),
		     'g_nic_1'			=> $g1_nic_1,
		     'g_nic_2'			=> $g1_nic_2,
		     'g_profile_img'	=> $profile_img_2
		 ];
		 $this->db->insert('guest_checkin',$new_data_guest_checkin_1);

		 $new_data_nominated_1 = [
		     'Per_name'         => $this->input->post('new_nominated_2_name'),
		     'Per_number'       => $this->input->post('new_nominated_2_mobile'),
		     'Per_cnic'         => $this->input->post('new_nominated_2_cnic'),
		     'Per_address'      => $this->input->post('new_nominated_2_address'),
		     'Per_type'			=> 'C_G',
		     'Per_date'			=> $this->input->post('c_date'),   //date('Y-m-d'),
		     
		 ];
		 $insert_person = $this->db->insert('person',$new_data_nominated_1);
		 $new_nominated_mem_id = $this->db->insert_id();
		    //--------------------------------------------------------------------------

// ----------------------- GUEST 2 Images Upload ------------------------//
	$profile_img_3 = $_FILES['userfile_3']['name'];
	$g3_nic_1 = $_FILES['g3_nic_1']['name'];
	$g3_nic_2 = $_FILES['g3_nic_2']['name'];
	
	if($profile_img !== ""){
         $config['upload_path'] = './uploads/members/';  
         $config['log_threshold'] = 1;                      
         $config['allowed_types'] = 'jpg|png|jpeg|gif';
         $config['max_size'] = '0'; // 0 = no file size limit
         $config['overwrite'] = false;
         $this->load->library('upload', $config);
         $this->upload->do_upload('userfile_3');
         $upload_data = $this->upload->data();
         $file_name = $upload_data['file_name'];
    }
    if($g3_nic_1 !== ""){
         $config['upload_path'] = './uploads/members/'; 
         $config['log_threshold'] = 1;                       
         $config['allowed_types'] = 'jpg|png|jpeg|gif';
         $config['max_size'] = '0'; // 0 = no file size limit
         $config['overwrite'] = false;
         $this->load->library('upload', $config);
         $this->upload->do_upload('g3_nic_1');
         $upload_data = $this->upload->data();
         $file_name = $upload_data['file_name'];
    }
    if($g3_nic_2 !== ""){
         $config['upload_path'] = './uploads/members/'; 
         $config['log_threshold'] = 1;                       
         $config['allowed_types'] = 'jpg|png|jpeg|gif';
         $config['max_size'] = '0'; // 0 = no file size limit
         $config['overwrite'] = false;
         $this->load->library('upload', $config);
         $this->upload->do_upload('g3_nic_2');
         $upload_data = $this->upload->data();
         $file_name = $upload_data['file_name'];
    }
//------------------------------------------------------------- //
		 $new_data_guest_checkin_2 = [
		     'Per_id'           => $new_nominated_mem_id, 
		     'c_id'              => $c_id,
		     'g_status'			=>'1',
		     'g_date'			=>$this->input->post('c_date'),
		     'g_nic_1'			=> $g3_nic_1,
		     'g_nic_2'			=> $g3_nic_2,
		     'g_profile_img'	=> $profile_img_3
		 ];
		 $this->db->insert('guest_checkin',$new_data_guest_checkin_2);		
		
		}

//////////////////// SEARCH START///////////////////////////////////////////////

		function search_by_nic($nic)
		{
			$this->db->select('*');
			$this->db->from('person');
			$this->db->like('Per_cnic',$nic);
			$data = $this->db->get()->result();
			return $data;
		}


		function search_member_data()
		{
			$name = $this->input->post('name');
			$nic_no= $this->input->post('cnic_no');
			$c_no  = $this->input->post('card_no');
			$mobile  = $this->input->post('mobile');
			$l_no  = $this->input->post('license_no');
			$mem_type  = $this->input->post('member_type');
			
			$this->db->select('m.m_id,p.Per_type,p.per_id,p.Per_name,p.per_number,p.Per_license_no,p.Per_cnic,m.m_type,m.m_card_no,m.m_valid_from,m.m_valid_to');
			$this->db->from('person p');
			
			//$this->db->like('p.Per_name',$name);
			if( !empty( $name ) ){
			$this->db->where('p.Per_name',$name);
			$where = "(p.Per_type ='M' OR p.Per_type = 'W' )";
			$this->db->where($where);
			// $this->db->or_where('p.Per_type','W');
			}	
			if(!empty($mobile)){
				$this->db->where('p.per_number',$mobile);
				$where = "(p.Per_type ='M' OR p.Per_type = 'W' )";
				$this->db->where($where);
				// $this->db->where('p.Per_type','M');
				// $this->db->or_where('p.Per_type','W');
			}

		//print_r($_POST);die;

		if( !empty( $l_no ) ){
			$this->db->where('p.Per_license_no',$l_no);
			$where = "(p.Per_type ='M' OR p.Per_type = 'W' )";
			$this->db->where($where);
			// $this->db->where('p.Per_type','M');
			// $this->db->or_where('p.Per_type','W');
		}
		
			if( !empty( $nic_no ) ){
			$this->db->where('p.Per_cnic',$nic_no);
			$where = "(p.Per_type ='M' OR p.Per_type = 'W' )";
			$this->db->where($where);
			// $this->db->where('p.Per_type','M');
			// $this->db->or_where('p.Per_type','W');
			}
		if(!empty($c_no)){
			$this->db->where('m.m_card_no',$c_no);
			$where = "(p.Per_type ='M' OR p.Per_type = 'W' )";
			$this->db->where($where);
			// $this->db->where('p.Per_type','M');
			// $this->db->or_where('p.Per_type','W');
		}
		if(!empty($mem_type)){
			$this->db->where('m.m_type',$mem_type);
			$where = "(p.Per_type ='M' OR p.Per_type = 'W' )";
			$this->db->where($where);
			// $this->db->where('p.Per_type','M');
			// $this->db->or_where('p.Per_type','W');
		}
			$this->db->join('membership m','p.per_id = m.per_id');
			$qry = $this->db->get();
			$data =  $qry->result();
			// echo '<pre>';print_r($data);die;
			return $data;
		}

		function search_all_data()
		{
			$this->db->select('p.per_id,p.per_name,p.per_number,m.m_type,p.Per_type');
			$this->db->from('person p');
			$this->db->where('p.Per_type','M');
			$this->db->or_where('p.Per_type','W');
			$this->db->join('membership m','p.per_id=m.per_id');
			$qry = $this->db->get();
			$data = $qry->result();
			// echo '<pre>';print_r($data);die;
			return $data;
		}
////////////////// ADVANCE SEARCH//////////////////
		function advance_all_members_search()
		{
			$this->db->select('p.Per_id,p.Per_name,p.Per_number');
			$this->db->from('person p');
			$this->db->where('p.Per_type','M');
			$this->db->or_where('p.Per_type','W');
			$this->db->or_where('p.Per_type','p');
			$this->db->or_where('p.Per_type','S');
			$qry_s = $this->db->get();
			$s_data = $qry_s->result();
			//echo '<pre>';print_r($s_data);die;
			return $s_data;
		}

		function advance_search_full()
		{
		//------------- Create array from fields --------------//
			$name        = $this->input->post('adv_name');
			$reg_no      = $this->input->post('adv_reg_no');
			$mobile      = $this->input->post('adv_mobile_no');
			$card_no     = $this->input->post('adv_card_no');
			$nic_no      = $this->input->post('adv_nic');
			$booth_no    = $this->input->post('adv_booth_no');
			$mem_type    = $this->input->post('adv_member_type');
			$weapon_type = $this->input->post('adv_weapon');
			$weapon_no   = $this->input->post('adv_weapon_no');
			$from 	     = $this->input->post('adv_from');
			$to 	     = $this->input->post('adv_to');
			// ----------------------------------------------------------
			if($name=='' && $reg_no=='' && $mobile=='' && $card_no=='' && $nic_no=='' && $mem_type=='' && $booth_no =='' && $weapon_type=='' && $weapon_no=='' && $from =='' && $to =='' )
			{
				$this->db->select('*');
				$this->db->from('person p');
				$this->db->join('membership m','p.Per_id = m.Per_id');
				$this->db->join('checkin c','m.m_id = c.m_id');
				$data['all_data'] = $this->db->get()->result();
				return $data;	
				// echo '<pre>';print_r($res);die;
			}
			// ----------------------------------------------------------
				if( !empty( $booth_no ) )
				{
					if( $from )
					{
						$this->db->where('c_arrival_date >= ',$from);
					}
					if( $to )
					{
						$this->db->where('c_arrival_date <= ',$to);
					}

					$this->db->where('boot_no',$booth_no);
					$this->db->from('checkin');
					$this->db->join('membership m','m.m_id = checkin.m_id');
					$this->db->join('person p','p.Per_id = m.per_id');
					$checkin_q = $this->db->get();
					$checkin_result = $checkin_q->result();
					$data['booth_with_date'] = $checkin_result;	
					return $data;
				} elseif ( !empty($from) && !empty($to) )
				{
					$this->db->where('checkin.c_arrival_date >= ',$from);
					$this->db->where('checkin.c_arrival_date <= ',$to);
					$this->db->from('checkin');
					$this->db->join('membership m','m.m_id = checkin.m_id');
					$this->db->join('person p','p.Per_id = m.per_id');
					$checkin_q = $this->db->get();
					$checkin_result = $checkin_q->result();
				 	$data['search_by_date'] = $checkin_q->result();
				 	return $data;
				}
				if( !empty($to) && empty($from) )
				{
					$this->db->where('checkin.c_arrival_date =',$to );
					$this->db->from('checkin');
					$this->db->join('membership m','m.m_id = checkin.m_id');
					$this->db->join('person p','p.Per_id = m.per_id');
					$checkin_q = $this->db->get();
					$checkin_result = $checkin_q->result();
				 	$data['search_by_date'] = $checkin_q->result();
				 	return $data;	
				}
				if( !empty($from) && empty($to) )
				{
					$this->db->where('checkin.c_arrival_date =',$from );
					$this->db->from('checkin');
					$this->db->join('membership m','m.m_id = checkin.m_id');
					$this->db->join('person p','p.Per_id = m.per_id');
					$checkin_q = $this->db->get();
					$checkin_result = $checkin_q->result();
				 	$data['search_by_date'] = $checkin_q->result();
				 	return $data;	
				}

			// ----------------------------------------------------------

			///////// SELECT DATA FROM TABLES/////////////////
			$this->db->select('p.per_id, p.Per_name, p.per_number, p.Per_license_no, 
							   p.Per_cnic,m.m_type,m.m_card_no,m.m_valid_from,m.m_valid_to,
							   m.m_id, p.Per_type,m.m_w_type,m.m_no_w,m.m_valid_from,
							   m.m_valid_to ');
			$this->db->from('person p');

				if( !empty($name))
					{
					$this->db->where('p.Per_name',$name);
					}

				if( !empty($reg_no))
					{
					$this->db->where('m.m_id',$reg_no);
					}

				if(!empty($mobile))
					{
					$this->db->where('p.per_number',$mobile);
					}
				if( !empty($nic_no))
					{
					$this->db->where('p.Per_cnic',$nic_no);
					}

				if(!empty($card_no))
					{
					$this->db->like('m.m_card_no',$card_no);
					}

				if(!empty($weapon_type))
					{
					$this->db->like('m.m_w_type',$weapon_type);
					}	

				if(!empty($weapon_no))
					{
					$this->db->like('m.m_no_w',$weapon_no);
					}
					
				if(!empty($mem_type))
					{
					$this->db->like('m.m_type',$mem_type);
					}
				$this->db->join('membership m','p.per_id = m.per_id','left');
				$qry = $this->db->get();
				$qry_4 = $qry->num_rows();
				 // echo '<pre>';print_r($qry->result());
				if($qry_4>0)
				{
					$dataa['data5'] =  $qry->result();
					// $person_type 	=  $dataa['data5'][0]->Per_type;
					foreach ($dataa['data5'] as $value) 
					{
					$person_type = $value->Per_type;
						if( $person_type != "M" && $person_type != "W" ) 
						{
							// echo '<pre>';print_r($dataa);die;
							return $dataa;
						}
					}
				}
				else
				{
					return NULL;
				}
				
				foreach ( $dataa['data5'] as $value ) 
				{
					 $m_id = $value->m_id;
					//$per_id = $value->Per_id;
					 $this->db->where('m.m_id',$m_id);
					 $this->db->from('membership m');
					 // $this->db->join('person p','p.Per_id=m.per_id','left');
					 $this->db->join('checkin c','m.m_id=c.m_id');
					 $qry3 = $this->db->get();
					 $qry_4 = $qry3->num_rows();
					 //echo $qry_4;die;
					 if($qry_4>0)
					 {
					 $this->db->where('m.m_id',$m_id);
					 $this->db->from('membership m');
					 $this->db->join('person p','p.Per_id=m.per_id');
					 $this->db->join('checkin c','m.m_id=c.m_id');
					 $qry3 = $this->db->get();	 	
					 }
					 else
					 {
					 $this->db->where('m.m_id',$m_id);
					 $this->db->from('membership m');
					 $this->db->join('person p','p.Per_id=m.per_id');
					 $qry3 = $this->db->get();	
					 }
					 

					$data['all_data_search'] = $qry3->result();
					 // echo '<pre>';print_r($s_data);die;
				}

				if($data!= NULL)
				{
				// echo '<pre>';print_r($data);die;
					return $data;
				}
				else
				{
				// echo '<pre>';print_r($dataa['data5']);die;
					// return $dataa;
					//return $dataa;
				}

		}
 
/////////////////////////// SEARCH END HERE/////////////////////////////////////////////
		function get_booth_data()
		{
		$query_1 = $this->db->query("SELECT * FROM `booths` where status=0 ORDER BY bo_id asc ");
			$data['status_0'] = $query_1->result();
		
		$query = $this->db->query(' SELECT * FROM person p INNER JOIN booths b ON p.Per_id = b.per_id INNER JOIN checkin c ON b.bo_id = c.boot_no where b.status=1 AND c.c_status=1 ORDER BY bo_id asc ');	
			$data['status_1'] = $query->result();
			return $data;
		}

// ------------------------- Membership Search Member Details --------------------//
    function membership_search_member_details($per_id)
    {
////////////////////PERSONEL MEMBERSHIP DATA///////////////
         $this->db->select('*');
         $this->db->from('person');
         $this->db->where('person.per_id',$per_id);
         $this->db->join('membership',"membership.per_id=person.per_id");
        $query = $this->db->get();
        $num_data_2 = $query->num_rows();
        //echo $num_data_2;die;
        if($num_data_2>0)
        {       
        	$data['persondata'] = $query->result();
        }
        $m_id = $data['persondata'][0]->m_id;
        //echo '<pre>'; print_r($data);die;
///////////////////////NOMINATED GUEST DATA ////////////////
        $this->db->from('nominated_guests');
        $this->db->where('m_id',$m_id);
        $this->db->join('person',"person.per_id=nominated_guests.per_id");
        $query_1 = $this->db->get();
        $num_data_1 = $query_1->num_rows();
        if($num_data_1>0)
        {
        $data['nominated_data'] = $query_1->result();
        }
////////////////CHECKIN DATA///////////////////////////////
        $this->db->from('checkin');
        $this->db->where('membership.m_id',$m_id);
        $this->db->join('membership',"membership.m_id=checkin.m_id");
        $query_2 = $this->db->get();
        $num_data = $query->num_rows();
        if($num_data>0)
        {
            $data['checkindata'] = $query_2->result();
        }
        
            
////////////////////////REFRENCE DATA /////////////////////////
        $this->db->from('reference_person');        
        $this->db->where('reference_person.m_id',$m_id);
        $this->db->join('person',"person.Per_id=reference_person.per_id");
         $query_3 = $this->db->get();
         $num_data_3 = $query_3->num_rows();
        if($num_data_1>0)
        {
        $data['refrence_data'] = $query_3->result();
        }
///////////////////////// EMERGENCY DETAILS DATA ////////////////////////////
        $this->db->from('emergencydetails');        
        $this->db->where('emergencydetails.m_id',$m_id);
        $this->db->join('person',"person.Per_id=emergencydetails.per_id");
        $query_4 = $this->db->get();
       // echo'<pre>';print_r($query_4->result());die;
        $num_data_4 = $query_4->num_rows();
        if($num_data_4>0)
        { 
        $data['emergency_data'] = $query_4->result();
        }   
///////////////////////// NOMINATED GUEST DATA ////////////////////////////
        /*$this->db->from('nominated_guests');      
        $this->db->where('nominated_guests.m_id',$m_id);
        $this->db->join('person',"person.Per_id=nominated_guests.per_id");
        $query_5 = $this->db->get();
        $num_data_5 = $query_5->num_rows();
        if($num_data_5>0)
        {
        $data['nominated_data'] = $query_5->result();
        }*/
////////////////////////////////////////////////////////////////        
        //echo '<pre>';print_r($data);die;
         return $data;      

    }


// ------------------------ Advance Search Member details -----------------------//
		function member_details($per_id,$mem_id=NULL)
		{
			// echo $per_id;die;
////////////////////PERSONEL MEMBERSHIP DATA///////////////
		if(isset($mem_id))
		{	
		 $this->db->select('*');
		 $this->db->from('person');
		 $this->db->where('person.per_id',$per_id);
		 $this->db->join('membership',"membership.per_id = person.per_id",'left');
		 $this->db->join('checkin c','c.m_id = membership.m_id','left');
		 $this->db->join('booths b','b.bo_id = c.boot_no','left');
     	 $query = $this->db->get();
		 $data['persondata'] = $query->result();
		 // echo '<pre>';print_r($data);die;
		 $c_id = $data['persondata'][0]->c_id;
		 if(isset($c_id))
		 {	
		 $checkin_data = $this->db->query(" SELECT * FROM checkin c INNER JOIN guest_checkin g_c ON ssclubnew.c.c_id = ssclubnew.g_c.c_id INNER JOIN person p ON ssclubnew.p.Per_id = ssclubnew.g_c.per_id where ssclubnew.c.m_id = ".$mem_id." AND ssclubnew.g_c.c_id = ".$c_id."  ");
		 $data['checkin_data'] = $checkin_data->result();
		 }
	     return $data;		
		 // print_r($data);die;
    	}
    	else{
    		// echo $Per_id;die;
    		 $this->db->select('*');
			 $this->db->from('person');
			 $this->db->where('person.per_id',$per_id);
			 $this->db->join('membership m','person.Per_id = m.Per_id','left');
			 $this->db->join('nominated_guests n_g',"n_g.per_id = person.per_id",'left');
	     	 $this->db->join('guest_checkin','person.Per_id = guest_checkin.per_id','left');	
	     	 $query = $this->db->get();
			 $data['other_data'] = $query->result();
			 // echo '<pre>';print_r($data);die;
			 return $data;
    		}
    	}

	 	
		function cancel_membership($m_id,$cancel_data)
		{
			$this->db->where('m_id',$m_id);
			$this->db->update('membership',$cancel_data);
		}

		function membership_renewel_data($per_id)
		{
			$this->db->from('person p');
			$this->db->where('p.Per_id',$per_id);
			$this->db->join('membership m','p.Per_id=m.per_id');
			$m_r_data = $this->db->get();
			$data 	  = $m_r_data->result();
			//echo '<pre>';print_r($data);die;
			return $data;
		}

		function insert_membership_renewal()
		{
			$m_r_data = array(
				'r_payment'	 	=>$this->input->post('payments'),
				'r_date' 		=>$this->input->post('ren_date'),   //date('Y-m-d'),
				'r_valid_from'	=>$this->input->post('valid_from'),
				'r_valid_to'	=>$this->input->post('valid_to'),
				'm_id'			=>$this->input->post('m_id'),
				'r_status'		=>1
				);
			//echo'<pre>';print_r($m_r_data);die;
			$insert_r_data = $this->db->insert('membership_renewal',$m_r_data);
			if($insert_r_data)
			{
				return 1;
			}
			else{
				return 0;
			}
		}

	function payment_history($per_id)
	{
		$this->db->from('person p');
		$this->db->where('p.Per_id',$per_id);
		$this->db->join('membership m','p.Per_id= m.per_id');
		$qry = $this->db->get();
		$data['persondata'] = $qry->result();
		// echo '<pre>';print_r($data);die;
		$m_id = $data['persondata'][0]->m_id;
		$per_id = $data['persondata'][0]->Per_id;
		// echo $per_id;die;
		////////////// PAYMENT HISTORY///////////////
		
		$qry_1 = $this->db->query('SELECT mr.r_payment,mr.r_date,mr.r_valid_to 
								   FROM membership_renewal mr INNER JOIN membership m 
								   ON m.m_id= mr.m_id where mr.m_id='.$m_id.' ');
		
		$data['payment_data'] = $qry_1->result();

		//echo '<pre>';print_r($data);die;
		return $data;
	}

// ---------------------- CheckIn if person data is exist -----------------------//
	function insert_checkin_data()
	{
		$per_id = $this->input->post('per_id');
		$m_id   = $this->input->post('m_id');
		$booth_no = $this->input->post('booth_no');
		// die;
		$checkin = array(
		  	'c_fire'				=>$this->input->post('no_fire'),
		  	'm_id'					=>$m_id,
		  	'c_profession'			=>$this->input->post('proffession'),
		  	'boot_no'				=>$booth_no,
		  	'no_persons'			=>$this->input->post('no_person'),
			'range_charge'			=>$this->input->post('range_charge'),
			'remarks'				=>$this->input->post('remarks'),
			//--------- Old format that will change after -------//
			// 'c_arrival_date'=>date('Y-m-d'),
			// 'c_arrival_time'=>date('h:i sa'),
			// --------------------------------------------------//
			'c_arrival_date'		=>$this->input->post('arr_date'),
			'c_arrival_time'		=>$this->input->post('arr_time'),
			'c_departure_date'		=>$this->input->post('dep_date'),
			'c_departure_time'		=>$this->input->post('dep_time'),
			'c_status'				=>1,
			'c_weapon'				=>$this->input->post('weapon'),
			'c_weapon_name'			=>$this->input->post('w_no'),

		  	);
		  $this->db->insert('checkin',$checkin);
		 $c_id = $this->db->insert_id();
		// echo '<pre>';print_r($checkin);
//////////////////////////////////////////////////////////////

		  $data_booth = array(
		  		'c_id'=>$c_id,
		  		'per_id'=>$per_id,
		  		'status'=>1
		  	);
		 // echo "<pre>";print_r($data_booth);
  		 $bo_id = $this->input->post('booth_no');

		 $this->db->where('bo_id',$bo_id);
		 $this->db->update('booths',$data_booth);

/////////////////////////// Insert Nominated Guest////////////////
		$data_nominated = [
    	 'Per_name'         => $this->input->post('nominated_name'),
    	 'Per_number'       => $this->input->post('nominated_mobile'),
    	 'Per_cnic'         => $this->input->post('nominated_cnic'),
    	 'Per_address'      => $this->input->post('nominated_address'),
    	 'Per_type'			=> 'C_G',
    	 'Per_date'			=> $this->input->post('c_date')
     		];
     	// echo '<pre>';print_r($data_nominated);
		 $insert_person = $this->db->insert('person',$data_nominated);
		 $new_nominated_mem_id = $this->db->insert_id();
		    //--------------------------------------------------------------------------

// ----------------------- GUEST 1 Images Upload ------------------------//
	$profile_img_1 = $_FILES['userfile_1']['name'];
	$g1_nic_1 = $_FILES['g1_nic_1']['name'];
	$g1_nic_2 = $_FILES['g1_nic_2']['name'];
	
	if($profile_img_1 !== ""){
         $config['upload_path'] = './uploads/members/';  
         $config['log_threshold'] = 1;                      
         $config['allowed_types'] = 'jpg|png|jpeg|gif';
         $config['max_size'] = '0'; // 0 = no file size limit
         $config['overwrite'] = false;
         $this->load->library('upload', $config);
         $this->upload->do_upload('userfile_1');
         $upload_data = $this->upload->data();
         $file_name = $upload_data['file_name'];
    }
    if($g1_nic_1 !== ""){
         $config['upload_path'] = './uploads/members/';  
         $config['log_threshold'] = 1;                      
         $config['allowed_types'] = 'jpg|png|jpeg|gif';
         $config['max_size'] = '0'; // 0 = no file size limit
         $config['overwrite'] = false;
         $this->load->library('upload', $config);
         $this->upload->do_upload('g1_nic_1');
         $upload_data = $this->upload->data();
         $file_name = $upload_data['file_name'];
    }
    if($g1_nic_2 !== ""){
         $config['upload_path'] = './uploads/members/'; 
         $config['log_threshold'] = 1;                       
         $config['allowed_types'] = 'jpg|png|jpeg|gif';
         $config['max_size'] = '0'; // 0 = no file size limit
         $config['overwrite'] = false;
         $this->load->library('upload', $config);
         $this->upload->do_upload('g1_nic_2');
         $upload_data = $this->upload->data();
         $file_name = $upload_data['file_name'];
    }
//------------------------------------------------------------- //	
		 $data_guest_checkin = [
		     'Per_id'           => $new_nominated_mem_id, 
		     'c_id'              => $c_id,
		     'g_status'			=>'1',
		     'g_date'			=>$this->input->post('c_date'),  //date('Y-m-d')
		     'g_nic_1'			=> $g1_nic_1,
		     'g_nic_2'			=> $g1_nic_2,
		     'g_profile_img'	=> $profile_img_1
		 ];
		 // echo '<pre>';print_r($data_guest_checkin);
		$this->db->insert('guest_checkin',$data_guest_checkin); 
		 $data_nominated_0 = [
		     'Per_name'         => $this->input->post('nominated_1_name'),
		     'Per_number'       => $this->input->post('nominated_1_mobile'),
		     'Per_cnic'         => $this->input->post('nominated_1_cnic'),
		     'Per_address'      => $this->input->post('nominated_1_address'),
		     'Per_type'			=> 'C_G',
		     'Per_type'			=> $this->input->post('c_date'),
		    ];
		   // echo '<pre>';print_r($data_nominated_0);	
		 $insert_person = $this->db->insert('person',$data_nominated_0);
		 $new_nominated_mem_id_1 = $this->db->insert_id();
		    //--------------------------------------------------------------------------

// ----------------------- GUEST 2 Images Upload ------------------------//
	$profile_img_2 = $_FILES['userfile_2']['name'];
	$g2_nic_1 = $_FILES['g2_nic_1']['name'];
	$g2_nic_2 = $_FILES['g2_nic_2']['name'];
	
	if($profile_img_2 !== ""){
         $config['upload_path'] = './uploads/members/';  
         $config['log_threshold'] = 1;                      
         $config['allowed_types'] = 'jpg|png|jpeg|gif';
         $config['max_size'] = '0'; // 0 = no file size limit
         $config['overwrite'] = false;
         $this->load->library('upload', $config);
         $this->upload->do_upload('userfile_2');
         $upload_data = $this->upload->data();
         $file_name = $upload_data['file_name'];
    }
    if($g2_nic_1 !== ""){
         $config['upload_path'] = './uploads/members/';  
         $config['log_threshold'] = 1;                      
         $config['allowed_types'] = 'jpg|png|jpeg|gif';
         $config['max_size'] = '0'; // 0 = no file size limit
         $config['overwrite'] = false;
         $this->load->library('upload', $config);
         $this->upload->do_upload('g2_nic_1');
         $upload_data = $this->upload->data();
         $file_name = $upload_data['file_name'];
    }
    if($g2_nic_2 !== ""){
         $config['upload_path'] = './uploads/members/';  
         $config['log_threshold'] = 1;                      
         $config['allowed_types'] = 'jpg|png|jpeg|gif';
         $config['max_size'] = '0'; // 0 = no file size limit
         $config['overwrite'] = false;
         $this->load->library('upload', $config);
         $this->upload->do_upload('g2_nic_2');
         $upload_data = $this->upload->data();
         $file_name = $upload_data['file_name'];
    }
//------------------------------------------------------------- //			 


		 $data_guest_checkin_1 = [
		     'Per_id'           => $new_nominated_mem_id_1, 
		     'c_id'              => $c_id,
		     'g_status'			=>'1',
		     'g_date'			=>$this->input->post('c_date'),
		     'g_nic_1'			=> $g2_nic_1,
		     'g_nic_2'			=> $g2_nic_2,
		     'g_profile_img'	=> $profile_img_2
		 ];
		 // echo '<pre>';print_r($data_guest_checkin_1);	
		 $this->db->insert('guest_checkin',$data_guest_checkin_1);

		 $data_nominated_1 = [
		     'Per_name'         => $this->input->post('nominated_2_name'),
		     'Per_number'       => $this->input->post('nominated_2_mobile'),
		     'Per_cnic'         => $this->input->post('nominated_2_cnic'),
		     'Per_address'      => $this->input->post('nominated_2_address'),
		     'Per_type'			=> 'C_G',
		     'Per_type'			=> $this->input->post('c_date')
		 ];
		 // echo '<pre>';print_r($data_nominated_1);	
		 $insert_person = $this->db->insert('person',$data_nominated_1);
		 $nominated_mem_id_2 = $this->db->insert_id();
		    //--------------------------------------------------------------------------

// ----------------------- GUEST 2 Images Upload ------------------------//
	$profile_img_3 = $_FILES['userfile_3']['name'];
	$g3_nic_1 = $_FILES['g3_nic_1']['name'];
	$g3_nic_2 = $_FILES['g3_nic_2']['name'];
	
	if($profile_img_3 !== ""){
         $config['upload_path'] = './uploads/members/';  
         $config['log_threshold'] = 1;                      
         $config['allowed_types'] = 'jpg|png|jpeg|gif';
         $config['max_size'] = '0'; // 0 = no file size limit
         $config['overwrite'] = false;
         $this->load->library('upload', $config);
         $this->upload->do_upload('userfile_3');
         $upload_data = $this->upload->data();
         $file_name = $upload_data['file_name'];
    }
    if($g3_nic_1 !== ""){
         $config['upload_path'] = './uploads/members/'; 
         $config['log_threshold'] = 1;                       
         $config['allowed_types'] = 'jpg|png|jpeg|gif';
         $config['max_size'] = '0'; // 0 = no file size limit
         $config['overwrite'] = false;
         $this->load->library('upload', $config);
         $this->upload->do_upload('g3_nic_1');
         $upload_data = $this->upload->data();
         $file_name = $upload_data['file_name'];
    }
    if($g3_nic_2 !== ""){
         $config['upload_path'] = './uploads/members/'; 
         $config['log_threshold'] = 1;                       
         $config['allowed_types'] = 'jpg|png|jpeg|gif';
         $config['max_size'] = '0'; // 0 = no file size limit
         $config['overwrite'] = false;
         $this->load->library('upload', $config);
         $this->upload->do_upload('g3_nic_2');
         $upload_data = $this->upload->data();
         $file_name = $upload_data['file_name'];
    }
//------------------------------------------------------------- //

		 $data_guest_checkin_2 = [
		     'Per_id'            => $nominated_mem_id_2, 
		     'c_id'              => $c_id,
		     'g_status'			 =>'1',
		     'g_date'			 =>$this->input->post('c_date'),
		     'g_nic_1'			=> $g3_nic_1,
		     'g_nic_2'			=> $g3_nic_2,
		     'g_profile_img'	=> $profile_img_3 
		 ];
		 $this->db->insert('guest_checkin',$data_guest_checkin_2);
		 // echo '<pre>';print_r($data_guest_checkin_2);die;	
	}


	function search_by_nic_ajax($nic)
	{
		$this->db->from('person p');
		$this->db->or_where('p.Per_type', 'W');
		$this->db->or_where('p.Per_type', 'm');
		$this->db->or_where('p.Per_type', 'S');
		$this->db->or_where('p.Per_type', 'P');
		$this->db->like('p.Per_cnic',$nic);
		$res = $this->db->get()->result();
		// echo '<pre>';print_r($res);
		return $res;	
	}

// ------------------- Update data On CheckIn Save Button -----------------// 

	function save_checkin_data()
	{

	}


	

}