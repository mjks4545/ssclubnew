<?php
class Membership_m extends CI_Model
{
    
// ---------------------------------------------------------------------------------
    
    function insert() {
	
        $data_person = [
	    'Per_name'         => trim( $this->input->post('name') ),
	    'Per_f_name'       => trim( $this->input->post('father_name') ) ,
	    'Per_number'       => trim( $this->input->post('mobile_no') ),
	    'Per_cnic'         => trim( $this->input->post('n_no') ),
	    'Per_address'      => trim( $this->input->post('address') ),
	    'Per_license_no'   => trim( $this->input->post('l_no') ),
	    'Per_weapon_no'    => trim( $this->input->post('w_no') ),
	    'Per_experience'   => trim( $this->input->post('shooting_exp') ),
	    'Per_date'         => trim( $this->input->post('valid_from') ), //date('Y-m-d')
	    'Per_type'         => 'M',
	    'Per_notes'        => '',
	];
        
	$cnic = $this->input->post('n_no');
	$mobile = $this->input->post('mobile_no');
	$this->db->select('Per_cnic,Per_number');
	$this->db->from('person');
	$this->db->where('Per_cnic',$cnic);
	$this->db->where('Per_number',$mobile);
	$query = $this->db->get();
	
        echo $num = $query->num_rows();
		
	if ($num == 0){
		 
	 
            $insert_person  = $this->db->insert('person',$data_person);
            $person_id      = $this->db->insert_id();

        // ------------------ Image Uploading Section ------------------------//

	$profile_img = $_FILES['userfile']['name'];
	$license_img = $_FILES['license_img']['name'];

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

    if($license_img !== ""){
         $config['overwrite'] = TRUE;
		 $config['encrypt_name'] = FALSE;
		 $config['remove_spaces'] = TRUE;
		 $config['upload_path'] = './uploads/members/'; // use an absolute path
		 $config['allowed_types'] = 'jpg|png|jpeg|gif';
		 $config['max_size'] = '0'; 
		 if ( ! is_dir($config['upload_path']) ) die("THE UPLOAD DIRECTORY DOES NOT EXIST");
		 $this->load->library('upload',$config);
		 if ( ! $this->upload->do_upload('license_img') )
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
	    'm_service'       =>  $this->input->post('service'),
		//-----------------------------------------------------------------------------------//	
	    'm_type'          =>  trim( $this->input->post('membership') ),
	    'm_card_no'       =>  trim( $this->input->post('c_no')),
	    'm_valid_from'    =>  trim( $this->input->post('valid_from')),
	    'm_valid_to'      => $this->input->post('valid_to'),
	    'm_f_shadule'	  =>  trim( $this->input->post('feeschedule')),
	    'm_refrance_name' =>  trim( $this->input->post('ref_name')),
	    'm_date'		  =>  trim( $this->input->post('valid_from')), //date('Y-m-d')
	    'm_w_type'		  =>  trim( $this->input->post('w_type')),
	    'm_payment'		  =>  trim( $this->input->post('payment')),
	    'm_conviction'	  =>  trim( $this->input->post('a_conviction')),
	    'm_education'	  =>  trim( $this->input->post('education') ),
	    'm_employment'	  =>  trim( $this->input->post('c_employment')),
	    'm_no_w'		  => trim( $this->input->post('no_w') ),
	    'm_status'		  => 1,
	    'm_date'		  => $this->input->post('valid_from'),
	    'm_nic_image1'	  => $nic_1,
	    'm_nic_image2'	  => $nic_2,
	    'license_img'	  => $license_img

	];
	// echo'<pre>';print_r($data_membership);die;
	$insert_membership = $this->db->insert('membership',$data_membership);
	$member_id = $this->db->insert_id();
	//------------------------------------------------------------------
	$data_person1 = [
	    'Per_name'         => trim( $this->input->post('e_name') ),
	    'Per_number'       => trim( $this->input->post('e_mobile') ),
	    'Per_cnic'         => trim( $this->input->post('e_cnic') ),
	    'Per_address'      => trim( $this->input->post('e_address') ),
	    'Per_type'		   => 'E',
	    'Per_date'         => $this->input->post('valid_from'), //date('Y-m-d')
	];
	$e_name = $this->input->post('e_name');
	if( $e_name != ''){		
		$insert_person = $this->db->insert('person',$data_person1);
		$e_mem_id = $this->db->insert_id();
	
//-----------------------------------------------------------------------
	$data_emergency = [
	    'Per_id'           => $e_mem_id, 
	    'e_services'       => trim( $this->input->post('e_service') ),
		'm_id'             => $member_id,
	];
			
		$insert_membership = $this->db->insert('emergencydetails',$data_emergency);
	}
    
	//--------------------------------------------------------------------------
	$refrence_person = [
	   'Per_name'          => trim( $this->input->post('ref_name') ),
	    'Per_number'       => trim( $this->input->post('ref_mobile') ),
	    'Per_cnic'         => trim( $this->input->post('ref_cnic') ),
	    'Per_address'      => trim( $this->input->post('ref_address') ),
	    'Per_type'		   => 'R',
	    'Per_date'         => $this->input->post('valid_from'), //date('Y-m-d')
	];
	$ref_name = $this->input->post('ref_name');
	if( $ref_name!= '')
	{		
		$insert_person = $this->db->insert('person',$refrence_person);
		$ref_mem_id = $this->db->insert_id();
	
    //--------------------------------------------------------------------------
	$data_refrence = [
	    'Per_id'            => $ref_mem_id, 
	    'ref_service'  		=> trim( $this->input->post('ref_service')),
		'm_id'              => $member_id,
	];
		$insert_membership = $this->db->insert('reference_person',$data_refrence);
	}
    
    // -------------------------------------------------------------------------
    $data_nominated = [
     'Per_name'         => trim( $this->input->post('nominated_name') ) ,
     'Per_number'       => trim( $this->input->post('nominated_mobile') ) ,
     'Per_cnic'         => trim( $this->input->post('nominated_cnic') ) ,
     'Per_address'      => trim( $this->input->post('nominated_address') ) ,
     'Per_type'		    => 'N',
     'Per_date'         => $this->input->post('valid_from'), //date('Y-m-d')
 ];
 $nom1_name = $this->input->post('nominated_name');
 if( $nom1_name != '' )
 {
 	$insert_person = $this->db->insert('person',$data_nominated);
	$nominated_mem_id = $this->db->insert_id();
 
    //--------------------------------------------------------------------------
 $data_nominated_guest = [
     'Per_id'           => $nominated_mem_id, 
     'm_id'              => $member_id,
 ];
	 $insert_guest_nominated = $this->db->insert('nominated_guests',$data_nominated_guest);
 }
 
 $data_nominated = [
     'Per_name'         => trim( $this->input->post('nominated_1_name') ),
     'Per_number'       => trim( $this->input->post('nominated_1_mobile') ),
     'Per_cnic'         => trim( $this->input->post('nominated_1_cnic') ),
     'Per_address'      => trim( $this->input->post('nominated_1_address') ),
     'Per_type'		    => 'N',
     'Per_date'         => $this->input->post('valid_from'), //date('Y-m-d')
 ];
 $nom2_name = $this->input->post('nominated_1_name');
 if( $nom2_name != ''){ 	
 	$insert_person = $this->db->insert('person',$data_nominated);
 	$nominated_mem_id = $this->db->insert_id();
 
//--------------------------------------------------------------------------
 $data_nominated_guest = [
     'Per_id'            => $nominated_mem_id, 
     'm_id'              => $member_id,
 ];
	 $insert_guest_nominated = $this->db->insert('nominated_guests',$data_nominated_guest);
 }
$nom2_name = $this->input->post('nominated_2_name');
 $data_nominated = [
     'Per_name'         => trim( $this->input->post('nominated_2_name') ),
     'Per_number'       => trim( $this->input->post('nominated_2_mobile') ),
     'Per_cnic'         => trim( $this->input->post('nominated_2_cnic') ),
     'Per_address'      => trim( $this->input->post('nominated_2_address') ),
     'Per_type'		   => 'N',
     'Per_date'         => $this->input->post('valid_from'), //date('Y-m-d')
 ];
 if( $nom2_name!= '')
 {
	 $insert_person = $this->db->insert('person',$data_nominated);
	 $nominated_mem_id = $this->db->insert_id();	
 
    //--------------------------------------------------------------------------
 $data_nominated_guest = [
     'Per_id'           => $nominated_mem_id, 
     'm_id'              => $member_id,
 ];
	 $insert_guest_nominated = $this->db->insert('nominated_guests',$data_nominated_guest);
 }
	
    }
	else {
		$this->session->set_flashdata('msg','Membership already exist! ');
        $this->session->set_flashdata('type','danger');
        redirect('Ssshootingclub/membership_add/');
		// echo "double entry";
	}
	}
	
	function upload_image( $profile_img ){
		
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
	 } /*else {
	  echo "THE IMAGE HAS BEEN UPLOADED : "; var_dump( $this->upload->data() );
	 } */    
	}

	function update_membership_record()
	{
		// echo trim($this->input->post('name'));die;

		$per_id = $this->input->post('update_id');
		$data_person = [
	    'Per_name'         => trim( $this->input->post('name')),
	    'Per_f_name'       => trim( $this->input->post('father_name')),
	    'Per_number'       => trim( $this->input->post('mobile_no')),
	    'Per_cnic'         => trim( $this->input->post('n_no')),
	    'Per_address'      => trim( $this->input->post('address')),
	    'Per_license_no'   => trim( $this->input->post('l_no')),
	    'Per_weapon_no'    => trim( $this->input->post('per_w_no')),
	    'Per_experience'   => trim( $this->input->post('shooting_exp')),
	    'Per_date'         => trim( $this->input->post('valid_from')), //date('Y-m-d'),
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
	$m_nic_image1 =  $data[0]->m_nic_image1;
	$m_nic_image2 =  $data[0]->m_nic_image2;
	$m_lic_img    =  $data[0]->license_img;
	
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
// -------------------- License Image ------------------------//
	$config['upload_path']='./uploads/members';
		$config['allowed_types']='jpg|png|gif';
		$config['max_size']='50000';
		$this->load->library('upload',$config);
		if( empty( $_FILES['license_img']['name'] ) ){

			$lic_img = $m_lic_img;

		}else{
			
			$lic_img = $_FILES['license_img']['name'];
		} 		
// -------------------- NIC Image 1 --------------------------//
		$config['upload_path']='./uploads/members';
		$config['allowed_types']='jpg|png|gif';
		$config['max_size']='50000';
		$this->load->library('upload',$config);
		if( empty( $_FILES['m_nic1']['name'] ) ){

			$m_nic_img1 = $m_nic_image1;

		}else{
			
			$m_nic_img1 = $_FILES['m_nic1']['name'];
		} 
// --------------------- NIC Image 2 -------------------------//
		$config['upload_path']='./uploads/members';
		$config['allowed_types']='jpg|png|gif';
		$config['max_size']='50000';
		$this->load->library('upload',$config);
		if( empty( $_FILES['m_nic2']['name'] ) )
		{
			$m_nic_img2 = $m_nic_image1;
		}else
		{
			$m_nic_img2 = $_FILES['m_nic2']['name'];
		} 

// ---------------------------------------------------------------						

	$data_membership = [
	    'Per_id'           => $per_id,
	    'm_date_of_birth'  => trim( $this->input->post('d_o_birth') ),
		'm_image'          => $img,
		'm_type'		   => trim( $this->input->post('m_type') ),
	    'm_service'        => trim( $this->input->post('service') ),
	    'm_w_type'         => trim(  $this->input->post('w_type') ),
	    'm_card_no'        => trim( $this->input->post('c_no') ),
	    'm_valid_from'     => 		$this->input->post('valid_from'),
	    'm_valid_to'       =>		 $this->input->post('valid_to'),
	    'm_refrance_name'  => trim( $this->input->post('ref_name') ),
	    'm_employment'	   => trim( $this->input->post('c_employment') ),
		'm_payment'		   => trim( $this->input->post('payment') ),
		'm_education'	   => trim( $this->input->post('education') ),	
		'm_no_w'	       => trim( $this->input->post('no_w') ),
		'm_w_type'		   => trim( $this->input->post('w_type') ),
		'm_conviction'	   => trim( $this->input->post('a_conviction') ),
		'm_f_shadule'	   => trim( $this->input->post('feeschedule') ),
		'm_date'		   =>      $this->input->post('valid_from'),
		'm_nic_image1'	   =>      $m_nic_img1 ,
		'm_nic_image2'	   => $m_nic_img2,
		'license_img'      => $lic_img
	];
// ---------------------Profile Image Uploading -------------------------//	
	  if (!$this->upload->do_upload('userfile')) {
        $error = array('error' => $this->upload->display_errors());
        //echo $error;
    	} else {
        $data = array('upload_data' => $this->upload->data());
        $image_path = $data['upload_data']['file_name'];
   		}
//--------------------- NIC image 1 Uploading ---------------------------//
   		if (!$this->upload->do_upload('m_nic1')) {
        $error = array('error' => $this->upload->display_errors());
        // echo $error;
    	} else {
        $data = array('upload_data' => $this->upload->data());
        $image_path = $data['upload_data']['file_name'];
   		}
// -------------------- NIC Image 2 Uploading --------------------------//
   		if (!$this->upload->do_upload('m_nic2')) {
        $error = array('error' => $this->upload->display_errors());
       // echo $error;
    	} else {
        $data 		= array('upload_data' => $this->upload->data());
        $image_path = $data['upload_data']['file_name'];
   		}
// -----------------------------------------------------------------------   		

	$this->db->where('m_id',$m_id);
	$this->db->update('membership',$data_membership);
		//echo '<pre>';print_r($data_membership);die;
/////////////////////// EMERGENCY DETAILS DATA //////////////////////
	$this->db->where('m_id',$m_id);
	$qry_1 = $this->db->get('emergencydetails');
	$data_1 = $qry_1->result();
 	// echo '<pre>';print_r($data_1);die;
 	if(!empty($data_1)){
 	$e_p_id = $data_1[0]->Per_id;
 }
		$data_person1 = [
	    'Per_name'         => trim( $this->input->post('e_name')),
	    'Per_number'       => trim( $this->input->post('e_mobile')),
	    'Per_cnic'         => trim( $this->input->post('e_cnic')),
	    'Per_address'      => trim( $this->input->post('e_address')),
	    'Per_date'		   => $this->input->post('valid_from'),
	];
	//echo '<pre>';print_r($data_person1);die;
	if(!empty($data_1)){
	$this->db->where('Per_id',$e_p_id);
	$this->db->update('person',$data_person1);
	}else{
	$this->db->insert('person',$data_person1);	
	$new_e_p_id = $this->db->insert_id();		
	}
	if(!empty($data_1)){
		$data_emergency = [
	    'Per_id'           => $e_p_id, 
	    'e_services'       => trim( $this->input->post('e_service') ),
		'm_id'             => $m_id,
	];	
	$this->db->where('m_id',$m_id);
	$this->db->update('emergencydetails',$data_emergency);
	}else{
		$data_emergency = [
	    'Per_id'           => $new_e_p_id, 
	    'e_services'       => trim( $this->input->post('e_service') ),
		'm_id'             => $m_id,
		];
	$this->db->insert('emergencydetails',$data_emergency);
	}
	//echo '<pre>';print_r($qry_1->result() );die;
/////////////////////// REFRENCE DETAILS DATA //////////////////////
	$this->db->where('m_id',$m_id);
	$qry_2 = $this->db->get('reference_person');
	$data_2 = $qry_2->result();
	//print_r($data_2);die;
 	if(!empty($data_2)){
 	$r_p_id = $data_2[0]->per_id;
 	}
 	//echo $r_p_id;die;
	$update_refrence_person = [
	   'Per_name'         =>  trim( $this->input->post('ref_name') ),
	    'Per_number'       => trim( $this->input->post('ref_mobile') ),
	    'Per_cnic'         => trim( $this->input->post('ref_cnic') ),
	    'Per_address'      => trim( $this->input->post('ref_address') ),
	    'Per_date'		   => trim( $this->input->post('valid_from') ),	    
	];
	//echo '<pre>';print_r($data_person1);die;
	if(!empty($data_2)){
	$this->db->where('Per_id',$r_p_id);
	$this->db->update('person',$update_refrence_person);
	}else{
		$this->db->insert('person',$update_refrence_person);
		$new_r_p_id = $this->db->insert_id();
	}
	if(!empty($data_2))	
	{
	$update_data_refrence = [
	    'Per_id'            => $r_p_id, 
	    'ref_service'  		=> trim( $this->input->post('ref_service') ),
		'm_id'              => $m_id,
	];
	$this->db->where('m_id',$m_id);
	$this->db->update('reference_person',$update_data_refrence);
	}else{
		$update_data_refrence = [
	    'Per_id'            => $new_r_p_id, 
	    'ref_service'  		=> trim( $this->input->post('ref_service') ),
		'm_id'              => $m_id,
	];
	$this->db->insert('reference_person',$update_data_refrence);
	}
	//echo '<pre>';print_r($qry_1->result() );die;
/////////////////////NOMINATED DATA UPDATE////////////////
	$this->db->where('m_id',$m_id);
	$qry_8 = $this->db->get('nominated_guests');
	$data_8 = $qry_8->result();
	if(!empty($data_8[0]))
	{
	if($data[0])
	$n_p_id_1 = $data_8[0]->Per_id;
	}
	if(!empty($data_8[1]))
	{
	$n_p_id_2 = $data_8[1]->Per_id;
	}
	if(!empty($data_8[2]))
	{
	$n_p_id_3 = $data_8[2]->Per_id;
	}

//////////////////////START UPDATIG ///////////////////////

$update_data_nominated = [
     'Per_name'         => trim( $this->input->post('nominated_name') ),
     'Per_number'       => trim( $this->input->post('nominated_mobile') ),
     'Per_cnic'         => trim( $this->input->post('nominated_cnic') ),
     'Per_address'      => trim( $this->input->post('nominated_address') ),
     'Per_date'		   =>  trim( $this->input->post('valid_from') ),
     
 ];
 if(!empty($data_8[0]))
 {
 		$this->db->where('Per_id',$n_p_id_1);
 		$this->db->update('person',$update_data_nominated);
 }else{
 		$this->db->insert('person',$update_data_nominated);
 		$p1_n_id = $this->db->insert_id();
 		$data_nominated_guest = [
		     'Per_id'           => $p1_n_id, 
		     'm_id'              => $m_id,
		 ];
 		$this->db->insert('nominated_guests',$data_nominated_guest);
 }

 /////////////////// UPDATE NOMINATED/////////////////////////
 /*$data_nominated_guest = [
     'Per_id'           => $n_p_id_1, 
     'm_id'              => $m_id,
 ];
 		$this->db->where('per_id',$n_p_id_1);
 		$this->db->update('nominated_guests',$data_nominated_guest);*/
    //--------------------------------------------------------------------------
 
 $update_data_nominated_1 = [
     'Per_name'         => trim( $this->input->post('nominated_1_name') ),
     'Per_number'       => trim( $this->input->post('nominated_1_mobile') ),
     'Per_cnic'         => trim( $this->input->post('nominated_1_cnic') ),
     'Per_address'      => trim( $this->input->post('nominated_1_address') ),
     'Per_date'		   =>        $this->input->post('valid_from') 
     
 ];
  if(!empty($data_8[1]))
 {
 	
 	$this->db->where('Per_id',$n_p_id_2);
 	$this->db->update('person',$update_data_nominated_1);
 }else{
 	
 	$this->db->insert('person',$update_data_nominated_1);
 	$n2_p_id = $this->db->insert_id();

 	$new_data_nominated_guest_1 = [
     'Per_id'           => $n2_p_id, 
     'm_id'              => $m_id,
 ];
	$this->db->insert('nominated_guests',$new_data_nominated_guest_1);
 }	
 /////////////////// UPDATE NOMINATED/////////////////////////
 /*$data_nominated_guest_1 = [
     'Per_id'           => $n_p_id_2, 
     'm_id'              => $m_id,
 ];
 		$this->db->where('per_id',$n_p_id_2);
 		$this->db->update('nominated_guests',$data_nominated_guest_2);	*/
    //--------------------------------------------------------------------------
 $update_data_nominated_2 = [
     'Per_name'         => trim( $this->input->post('nominated_2_name') ),
     'Per_number'       => trim( $this->input->post('nominated_2_mobile') ),
     'Per_cnic'         => trim( $this->input->post('nominated_2_cnic') ),
     'Per_address'      => trim( $this->input->post('nominated_2_address') ),
     'Per_date'		    => $this->input->post('valid_from') 
	 ];

	 if(!empty($data_8[2])){
 		$this->db->where('Per_id',$n_p_id_3);
 		$result = $this->db->update('person',$update_data_nominated_2); 
 	}else{
 		$this->db->insert('person',$update_data_nominated_2); 	
 		$n3_p_id = $this->db->insert_id();

 		$data_nominated_guest_2 = [
		     'Per_id'            => $n3_p_id, 
		     'm_id'              => $m_id,
		 ];
 		$this->db->insert('nominated_guests',$data_nominated_guest_2);
 	}
 		
 			return 1;
 		
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
		// echo $this->input->post('no_fire');die;
		/*echo $this->input->post('g1_per_id');
		echo'<br>'. $this->input->post('g2_per_id');
		echo'<br>'. $this->input->post('g3_per_id');
		die;*/
		$_POST['arr_t']  = date("g:i a", strtotime($_POST['arr_t']));
		$_POST['dep_time']  = date("g:i a", strtotime($_POST['dep_time']));
		
		$per_id = $this->input->post('per_id');
		$m_id   = $this->input->post('m_id');
		$c_id   = $this->input->post('c_id');
		$bo_id  = $this->input->post('bo_id');

		$person_data = array(
    	 'Per_name'         => trim( $this->input->post('name') ),
    	 'Per_number'       => trim( $this->input->post('contact') ),
    	 'Per_cnic'         => trim( $this->input->post('n_no') ),
    	 'Per_address'      => trim( $this->input->post('address') ),
    	 'Per_f_name'		=> trim( $this->input->post('father_name') ),
    	 'Per_license_no'	=> trim( $this->input->post('l_no') ),
    	 'Per_weapon_no'	=> trim( $this->input->post('w_no') ),
    	 'Per_experience'	=> trim( $this->input->post('s_e') ),
    	 'Per_date'			=> trim( $this->input->post('arr_date') )   //date('Y-m-d'),
     		);
		// echo $per_id;
		// echo '<pre>';print_r($person_data);
		$this->db->where('Per_id',$per_id);
		$this->db->update('person',$person_data);
		
//------------------------------------------------------------- //
	$profile_img = $_FILES['img']['name'];
	$lic_img = $_FILES['lic_img']['name'];
	
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
    if($lic_img !== ""){
         $config['upload_path'] = './uploads/members/';   
         $config['log_threshold'] = 1;                     
         $config['allowed_types'] = 'jpg|png|jpeg|gif';
         $config['max_size'] = '0'; // 0 = no file size limit
         $config['overwrite'] = false;
         $this->load->library('upload', $config);
         $this->upload->do_upload('lic_img'); 
         $upload_data = $this->upload->data();
         $file_name = $upload_data['file_name'];
    }

 	$p_nic_1 = $_FILES['p_nic_1']['name'];
	$p_nic_2 = $_FILES['p_nic_2']['name'];

	if($p_nic_1 !== ""){
         $config['upload_path'] = './uploads/members/';  
         $config['log_threshold'] = 1;                      
         $config['allowed_types'] = 'jpg|png|jpeg|gif';
         $config['max_size'] = '0'; // 0 = no file size limit
         $config['overwrite'] = false;
         $this->load->library('upload', $config);
         $this->upload->do_upload('p_nic_1');
         $upload_data = $this->upload->data();
         $file_name = $upload_data['file_name'];
    }
    if($p_nic_2 !== ""){
         $config['upload_path'] = './uploads/members/';  
         $config['log_threshold'] = 1;                      
         $config['allowed_types'] = 'jpg|png|jpeg|gif';
         $config['max_size'] = '0'; // 0 = no file size limit
         $config['overwrite'] = false;
         $this->load->library('upload', $config);
         $this->upload->do_upload('p_nic_2');
         $upload_data = $this->upload->data();
         $file_name = $upload_data['file_name'];
    }		
//--------------------------------------------------------------------
	$this->db->where('m_id',$m_id);
	$m_data = $this->db->get('membership')->result();
	// echo '<pre>';print_r($m_data);die;
	
	$m_prof_img 	= $m_data[0]->m_image;
	$m_nic1 		= $m_data[0]->m_nic_image1;
	$m_nic2 		= $m_data[0]->m_nic_image2;
	$licen_img 		= $m_data[0]->license_img;
	
	if(!empty($profile_img) ){ $profile_img = $profile_img; }else{ $profile_img = $m_prof_img; }
	if(!empty($lic_img) ){ $lic_img = $lic_img; }else{ $lic_img = $licen_img; }
	if(!empty($p_nic_1) ){ $p_nic_1 = $p_nic_1; }else{ $p_nic_1 = $m_nic1; }
	if(!empty($p_nic_2) ){ $p_nic_2 = $p_nic_2; }else{ $p_nic_2 = $m_nic2; }
//-----------------------------------------------------------------------------------
		$data_new_member = array(
			    'Per_id'         => $per_id,
			    'm_type'         => $this->input->post('membership'),
			    'm_card_no'      => trim( $this->input->post('c_no') ),
			    'm_w_type'		 => trim( $this->input->post('weapon') ),
			    'm_no_w'		 => trim( $this->input->post('w_no') ),
			    'm_date'		 => $this->input->post('arr_date'),   //date('Y-m-d'),
			    'm_image'		 => $profile_img,
			    'm_nic_image1'	 => $p_nic_1,
			    'm_nic_image2'	 => $p_nic_2,
			    'license_img'	 => $lic_img
			); 
		// echo '<pre>';print_r($data_new_member);die;
		$this->db->where('m_id',$m_id);
		$this->db->update('membership',$data_new_member);

// ----------------------- CheckIn data ----------------------------//
		$new_checkin = array(
		  	'c_fire'			=>trim( $this->input->post('no_fire') ),
		  	'c_profession'		=>trim( $this->input->post('proffession') ),
		  	'boot_no'			=>trim( $this->input->post('booth_no') ),
		  	'no_persons'		=>trim( $this->input->post('no_person') ),
			'range_charge'		=>trim( $this->input->post('range_charge') ),
			'remarks'			=>trim( $this->input->post('remarks') ),
			'c_arrival_date'	=> trim( $this->input->post('arr_date') ),//date('Y-m-d'),
			'c_arrival_time'	=>trim( $this->input->post('arr_t') ),//date('h:i sa'),
			'c_departure_date'	=> '',//date('Y-m-d'),
			'c_departure_time'	=>trim( $this->input->post('dep_time') ),//date('h:i sa'),
			'c_weapon'			=>trim( $this->input->post('weapon') ),
			'c_weapon_name'		=>trim( $this->input->post('w_no') )		  	
		  	);	
		// echo '<pre>';print_r($new_checkin);
		$this->db->where('c_id',$c_id);
		$this->db->update('checkin',$new_checkin);

// ------------------------------ Chekin Guest ---------------------//
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

		 $data_guest_1 = [
    	 'Per_name'         => trim( $this->input->post('nominated_name') ),
    	 'Per_number'       => trim( $this->input->post('nominated_mobile') ),
    	 'Per_cnic'         => trim( $this->input->post('nominated_cnic') ),
    	 'Per_address'      => trim( $this->input->post('nominated_address') ),
    	 'Per_date'			=> trim( $this->input->post('arr_date') ),   //date('Y-m-d'),
    	 'Per_type'			=> 'C_G', 
     	];
	// echo '<pre>';print_r($data_guest_1);
     	if($this->input->post('g1_per_id') != ''){
			$this->db->where('Per_id',$this->input->post('g1_per_id') );
			$this->db->update('person',$data_guest_1);		
		}else{
			$this->db->insert('person',$data_guest_1);
			$g1_person_id = $this->db->insert_id();
		} 
// -----------------------------------------------------------------------
	$g_i_d = $this->input->post('g1_id');
	if( $g_i_d != '' ){
	$this->db->where('g_id',$this->input->post('g1_id'));
	$n_g_1 = $this->db->get('guest_checkin')->result();

	$g_prof_img = $n_g_1[0]->g_profile_img;
	$g_nic1 = $n_g_1[0]->g_nic_1;
	$g_nic2 = $n_g_1[0]->g_nic_2;

	if(!empty($profile_img_1) ){ $profile_img_1 = $profile_img_1; }else{ $profile_img_1 = $g_prof_img; }
	if(!empty($g1_nic_1) ){ $g1_nic_1 = $g1_nic_1; }else{ $g1_nic_1 = $g_nic1; }
	if(!empty($g1_nic_2) ){ $g1_nic_2 = $g1_nic_2; }else{ $g1_nic_2 = $g_nic2; }
	}
//-----------------------------------------------------------------------------------
	 $data_guest_checkin_1 = [
		     'g_nic_1'			=> $g1_nic_1,
		     'g_nic_2'			=> $g1_nic_2,
		     'g_profile_img'	=> $profile_img_1
		 ];
		 // echo '<pre>';print_r($data_guest_checkin_1);
		 if($this->input->post('g1_id') != '')
		 {
		 $this->db->where('g_id',$this->input->post('g1_id') );	
		 $this->db->update('guest_checkin',$data_guest_checkin_1);
		 }else{
		 	$data_guest_checkin = [
		     'Per_id'           => $g1_person_id, 
		     'c_id'              => $c_id,
		     'g_status'			=>'1',
		     'g_date'			=>$this->input->post('arr_date'),  //date('Y-m-d')
		     'g_nic_1'			=> $g1_nic_1,
		     'g_nic_2'			=> $g1_nic_2,
		     'g_profile_img'	=> $profile_img_1
		 ];
		 $this->db->insert('guest_checkin',$data_guest_checkin); 
		}

//------------------------------------------------------------------------

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
	if( $this->input->post('g2_id') != '')
	{
	$this->db->where('g_id',$this->input->post('g2_id'));
	$n_g_2 = $this->db->get('guest_checkin')->result();
	$g1_prof_img = $n_g_2[0]->g_profile_img;
	$g1_nic1 = $n_g_2[0]->g_nic_1;
	$g1_nic2 = $n_g_2[0]->g_nic_2;

	if(!empty($profile_img_2) ){ $profile_img_2 = $profile_img_2; }else{ $profile_img_2 = $g1_prof_img; }
	if(!empty($g2_nic_1) ){ $g2_nic_1 = $g2_nic_1; }else{ $g2_nic_1 = $g1_nic1; }
	if(!empty($g2_nic_2) ){ $g2_nic_2 = $g2_nic_2; }else{ $g2_nic_2 = $g1_nic2; }
}
//-----------------------------------------------------------------------------------
		 $data_guest_2 = [
		     'Per_name'         => trim( $this->input->post('nominated_1_name') ),
		     'Per_number'       => trim( $this->input->post('nominated_1_mobile') ),
		     'Per_cnic'         => trim( $this->input->post('nominated_1_cnic') ),
		     'Per_address'      => trim( $this->input->post('nominated_1_address') ),
		     'Per_type'			=> 'C_G',
		    ];
			// echo '<pre>';print_r($data_guest_2);
			if( $this->input->post('g2_per_id') != '' ){
		    $this->db->where('Per_id',$this->input->post('g2_per_id'));
			$this->db->update('person',$data_guest_2);	
		}else{
			$this->db->insert('person',$data_guest_2);
			$g_person_2 = $this->db->insert_id();
		}
// ----------------------------- Guest 2 data -----------------------------------------				
		 $data_guest_checkin_2 = [
		     'g_nic_1'			=> $g2_nic_1,
		     'g_nic_2'			=> $g2_nic_2,
		     'g_profile_img'	=> $profile_img_2
		 ];
		 // echo '<pre>';print_r($data_guest_checkin_1);
		 if( $this->input->post('g2_id') != '' ){
		 $this->db->where( 'g_id',$this->input->post('g2_id') );	
		 $this->db->update( 'guest_checkin',$data_guest_checkin_2 );
		}else{
			$data_guest_checkin_2 = [
		     'Per_id'           	=> $g_person_2, 
		     'c_id'              	=> $c_id,
		     'g_status'				=>'1',
		     'g_date'				=>$this->input->post('arr_date'),
		     'g_nic_1'				=> $g2_nic_1,
		     'g_nic_2'				=> $g2_nic_2,
		     'g_profile_img'		=> $profile_img_2
		 ];	
		 $this->db->insert('guest_checkin',$data_guest_checkin_2);
		}

// ------------------------------------------------------------------------------//
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
	
	$this->db->where('g_id',$this->input->post('g3_id'));
	$n_g_dataa = $this->db->get('guest_checkin')->num_rows();
	if($n_g_dataa > 0){
	$n_g_3 = $this->db->get('guest_checkin')->result();
	$g3_prof_img = $n_g_3[0]->g_profile_img;
	$g3_nic1 = $n_g_3[0]->g_nic_1;
	$g3_nic2 = $n_g_3[0]->g_nic_2;

	if(!empty($profile_img_3) ){ $profile_img_3 = $profile_img_3; }else{ $profile_img_3 = $g3_prof_img; }
	if(!empty($g3_nic_1) ){ $g3_nic_1 = $g3_nic_1; }else{ $g3_nic_1 = $g3_nic1; }
	if(!empty($g3_nic_2) ){ $g3_nic_2 = $g3_nic_2; }else{ $g3_nic_2 = $g3_nic2; }
    }
//-----------------------------------------------------------------------------------

 $data_guest_3 = [
		     'Per_name'         => trim( $this->input->post('nominated_2_name') ),
		     'Per_number'       => trim( $this->input->post('nominated_2_mobile') ),
		     'Per_cnic'         => trim( $this->input->post('nominated_2_cnic') ),
		     'Per_address'      => trim( $this->input->post('nominated_2_address') ),
		     'Per_date'			=> $this->input->post('arr_date'),   //date('Y-m-d'),
		   	 'Per_type'			=> 'C_G'
		   ];
		// echo '<pre>';print_r($data_guest_3);
		   if( $this->input->post('g3_per_id') != '' )
		   {
		 	$this->db->where('Per_id',$this->input->post('g3_per_id'));
		 	$this->db->update('person',$data_guest_3);	
		   }else{
		   	$this->db->insert('person',$data_guest_3);
		   	$g_person_3  = $this->db->insert_id();
		   }
// -------------------------- Guest 3 data -----------------------------------

		 $data_guest_checkin_3 = [ 
			     'g_nic_1'			=> $g3_nic_1,
			     'g_nic_2'			=> $g3_nic_2,
			     'g_profile_img'	=> $profile_img_3 
			 ];
			if( $this->input->post('g3_id') != '' )
			{
			 $this->db->where('g_id',$this->input->post('g3_id') );
			 $this->db->update('guest_checkin',$data_guest_checkin_3);	
			}else{
				 $data_guest_checkin_3 = [
				     'Per_id'            => $g_person_3, 
				     'c_id'              => $c_id,
				     'g_status'			 => '1',
				     'g_date'			 => $this->input->post('arr_date'),
				     'g_nic_1'			=>  $g3_nic_1,
				     'g_nic_2'			=>  $g3_nic_2,
				     'g_profile_img'	=>  $profile_img_3 
				 ];
		 		$this->db->insert('guest_checkin',$data_guest_checkin_3);
			} 	 

// ----------------------------------------------------------------------------//
		if($bo_id != $this->input->post('booth_no'))
		{
			// echo $this->input->post('booth_no');die;
			$data_new_booth = array(
		  		'c_id'			=>$c_id,
		  		'per_id'		=>$per_id,
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
		  		'per_id'		=>$per_id
		  		);
			$this->db->where('bo_id',$bo_id);
			$this->db->update('booths',$data_booth);	

		}
		 


	}

    function insert_new_checkin_data_w( $id ){
                    
        $_POST['new_a_t']  = date("g:i a", strtotime($_POST['new_a_t']));
		$_POST['dep_time']  = date("g:i a", strtotime($_POST['dep_time']));

		$new_weapon = $this->input->post('new_weapon');
		if(isset($new_weapon)){
			$new_weapon = $new_weapon;
		}else{ 
			$new_weapon = '';
		}

		$person_data = array(
                    'Per_name'         => trim( $this->input->post('new_name') ),
                    'Per_number'       => trim( $this->input->post('new_contact') ),
                    'Per_cnic'         => trim( $this->input->post('new_n_no') ),
                    'Per_address'      => trim( $this->input->post('new_address') ),
                    'Per_f_name'		=> trim( $this->input->post('new_father_name') ),
                    'Per_license_no'	=> trim( $this->input->post('new_l_no') ),
                    'Per_weapon_no'	=> trim( $this->input->post('new_w_no') ),
                    'Per_experience'	=> trim( $this->input->post('new_s_e') ),
                    'Per_date'			=> trim( $this->input->post('arr_date') ),
                    'Per_type'			=> 'W'
 		);
        $this->db->where( 'Per_id', $id);    
		$this->db->update( 'person', $person_data );
		$per_id = $id;
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
		// ----------------------- Image Upload ------------------------//
		$lic_img = $_FILES['lic_img']['name'];
	
		if($lic_img !== ""){
	         $config['upload_path'] = './uploads/members/';   
	         $config['log_threshold'] = 1;                     
	         $config['allowed_types'] = 'jpg|png|jpeg|gif';
	         $config['max_size'] = '0'; // 0 = no file size limit
	         $config['overwrite'] = false;
	         $this->load->library('upload', $config);
	         $this->upload->do_upload('lic_img');
	         $upload_data = $this->upload->data();
	         $file_name = $upload_data['file_name'];
	    }    
		//------------------------------------------------------------- //

		// -------------------- Guest NIC Images -----------------------------//
 		$p_nic_1 = $_FILES['p_nic_1']['name'];
		$p_nic_2 = $_FILES['p_nic_2']['name'];
	
		if($p_nic_1 !== ""){
	         $config['upload_path'] = './uploads/members/';  
	         $config['log_threshold'] = 1;                      
	         $config['allowed_types'] = 'jpg|png|jpeg|gif';
	         $config['max_size'] = '0'; // 0 = no file size limit
	         $config['overwrite'] = false;
	         $this->load->library('upload', $config);
	         $this->upload->do_upload('p_nic_1');
	         $upload_data = $this->upload->data();
	         $file_name = $upload_data['file_name'];
	    }
	    if($p_nic_2 !== ""){
	         $config['upload_path'] = './uploads/members/';  
	         $config['log_threshold'] = 1;                      
	         $config['allowed_types'] = 'jpg|png|jpeg|gif';
	         $config['max_size'] = '0'; // 0 = no file size limit
	         $config['overwrite'] = false;
	         $this->load->library('upload', $config);
	         $this->upload->do_upload('p_nic_2');
	         $upload_data = $this->upload->data();
	         $file_name = $upload_data['file_name'];
	    }		
		// -------------- Insert to member table -------------------------//	
		$data_new_member = array(
			    'Per_id'         => $per_id,
				'm_image'        => $profile_img,
			    'm_type'         => $this->input->post('membership'),
			    'm_card_no'      => trim( $this->input->post('new_c_no') ),
			    'm_w_type'		 => $new_weapon,
			    'm_no_w'		 => trim( $this->input->post('new_w_no') ),
			    'm_date'		 => $this->input->post('arr_date'),   //date('Y-m-d'),
			    'm_nic_image1'	 => $p_nic_1,
			    'm_nic_image2'	 => $p_nic_2
			);
		//echo '<pre>';print_r($data_new_member);die;
		$insert_new_member = $this->db->insert('membership',$data_new_member);
		$m_id = $this->db->insert_id();

// ----------------- Start Insertion to Checkin ------------------------//

	  	$new_checkin = array(
		  	'c_fire'			=> trim( $this->input->post('new_no_fire') ),
		  	'm_id'				=>$m_id,
		  	'c_profession'		=> trim( $this->input->post('new_proffession') ),
		  	'boot_no'			=> trim( $this->input->post('new_booth_no') ),
		  	'no_persons'		=> trim( $this->input->post('new_no_person') ),
			'range_charge'		=> trim( $this->input->post('new_range_charge') ),
			'remarks'			=> trim( $this->input->post('new_remarks') ),
			'c_arrival_date'	=> $this->input->post('arr_date'),//date('Y-m-d'),
			'c_arrival_time'	=>$this->input->post('new_a_t'),//date('h:i sa'),
			'c_departure_date'	=> '',//date('Y-m-d'),
			'c_departure_time'	=>$this->input->post('dep_time'),//date('h:i sa'),
			'c_status'			=>1,
			'c_weapon'			=>$new_weapon,
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
	if( $this->input->post('new_nominated_name') != '' ){
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
		$this->db->where('Per_cnic', $this->input->post('new_nominated_cnic'));
    	$person_data = $this->db->get('person')->result();
	    if( empty($person_data) ){
	        $data_nominated_0 = [
	            'Per_name'         => trim( $this->input->post('new_nominated_name') ),
	            'Per_number'       => trim( $this->input->post('new_nominated_mobile') ),
	            'Per_cnic'         => trim( $this->input->post('new_nominated_cnic') ),
	            'Per_address'      => trim( $this->input->post('new_nominated_address') ),
	            'Per_type'	       => 'C_G',
	            'Per_date'	       => $this->input->post('arr_date') ,
	        ];	
	        $insert_person = $this->db->insert('person',$data_nominated_0);
	        $new_nominated_mem_id = $this->db->insert_id();
	    }else{
	        $new_nominated_mem_id = $person_data[0]->Per_id;
	    }
	    //--------------------------------------------------------------------------
	 	$new_data_guest_checkin = [
	     	'Per_id'           => $new_nominated_mem_id, 
	     	'c_id'              => $c_id,
	     	'g_status'			=>'1',
	     	'g_date'			=>$this->input->post('arr_date'),
	     	'g_nic_1'			=> $g1_nic_1,
	     	'g_nic_2'			=> $g1_nic_2,
	     	'g_profile_img'	=> $profile_img_1
	 	];
	 	//echo '<pre>';print_r($new_data_guest_checkin);die;
		$this->db->insert('guest_checkin',$new_data_guest_checkin);
    }
 	if( $this->input->post('new_nominated_1_name') != '' ){  
	 	$this->db->where('Per_cnic', $this->input->post('new_nominated_1_cnic'));
    	$person_1_data = $this->db->get('person')->result();
	    if( empty($person_1_data) ){
	        $data_nominated_1 = [
	            'Per_name'         => trim( $this->input->post('new_nominated_1_name') ),
	            'Per_number'       => trim( $this->input->post('new_nominated_1_mobile') ),
	            'Per_cnic'         => trim( $this->input->post('new_nominated_1_cnic') ),
	            'Per_address'      => trim( $this->input->post('new_nominated_address') ),
	            'Per_type'	       => 'C_G',
	            'Per_date'	       => $this->input->post('arr_date') ,
	        ];	
	        $insert_person = $this->db->insert('person',$data_nominated_1);
	        $new_nominated_mem_id = $this->db->insert_id();
	    }else{
	        $new_nominated_mem_id = $person_1_data[0]->Per_id;
	    }
		
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
     		'c_id'             => $c_id,
	     	'g_status'			=> '1',
	     	'g_date'			=> $this->input->post('arr_date'),
     		'g_nic_1'			=> $g1_nic_1,
	     	'g_nic_2'			=> $g1_nic_2,
	     	'g_profile_img'	=> $profile_img_2
	 	];
	 	$this->db->insert('guest_checkin',$new_data_guest_checkin_1);
    }
    
    if( $this->input->post('new_nominated_2_name') != '' ){
	 	$this->db->where('Per_cnic', $this->input->post('new_nominated_2_cnic'));
    	$person_2_data = $this->db->get('person')->result();
	    if( empty($person_2_data) ){
	        $data_nominated_2 = [
	            'Per_name'         => trim( $this->input->post('new_nominated_2_name') ),
	            'Per_number'       => trim( $this->input->post('new_nominated_2_mobile') ),
	            'Per_cnic'         => trim( $this->input->post('new_nominated_2_cnic') ),
	            'Per_address'      => trim( $this->input->post('new_nominated_2_address') ),
	            'Per_type'	       => 'C_G',
	            'Per_date'	       => $this->input->post('arr_date') ,
	        ];	
	        $insert_person = $this->db->insert('person',$data_nominated_2);
	        $new_nominated_mem_id = $this->db->insert_id();
	    }else{
	        $new_nominated_mem_id = $person_2_data[0]->Per_id;
	    }
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
	     	'g_date'			=>$this->input->post('arr_date'),
	     	'g_nic_1'			=> $g3_nic_1,
	     	'g_nic_2'			=> $g3_nic_2,
	     	'g_profile_img'	=> $profile_img_3
	 	];
		 
	 	$this->db->insert('guest_checkin',$new_data_guest_checkin_2);		
            
    }
	}
	function insert_new_checkin()
	{
		$_POST['new_a_t']  = date("g:i a", strtotime($_POST['new_a_t']));
		$_POST['dep_time']  = date("g:i a", strtotime($_POST['dep_time']));

		$new_weapon = $this->input->post('new_weapon');
		if(isset($new_weapon)){
			$new_weapon = $new_weapon;
		}else{ $new_weapon = '';}

		$person_data = array(
                    'Per_name'         => trim( $this->input->post('new_name') ),
                    'Per_number'       => trim( $this->input->post('new_contact') ),
                    'Per_cnic'         => trim( $this->input->post('new_n_no') ),
                    'Per_address'      => trim( $this->input->post('new_address') ),
                    'Per_f_name'		=> trim( $this->input->post('new_father_name') ),
                    'Per_license_no'	=> trim( $this->input->post('new_l_no') ),
                    'Per_weapon_no'	=> trim( $this->input->post('new_w_no') ),
                    'Per_experience'	=> trim( $this->input->post('new_s_e') ),
                    'Per_date'			=> trim( $this->input->post('arr_date') ),   //date('Y-m-d'),
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
// ----------------------- Image Upload ------------------------//
	$lic_img = $_FILES['lic_img']['name'];
	
	if($lic_img !== ""){
         $config['upload_path'] = './uploads/members/';   
         $config['log_threshold'] = 1;                     
         $config['allowed_types'] = 'jpg|png|jpeg|gif';
         $config['max_size'] = '0'; // 0 = no file size limit
         $config['overwrite'] = false;
         $this->load->library('upload', $config);
         $this->upload->do_upload('lic_img');
         $upload_data = $this->upload->data();
         $file_name = $upload_data['file_name'];
    }    
//------------------------------------------------------------- //

// -------------------- Guest NIC Images -----------------------------//
 	$p_nic_1 = $_FILES['p_nic_1']['name'];
	$p_nic_2 = $_FILES['p_nic_2']['name'];
	
	if($p_nic_1 !== ""){
         $config['upload_path'] = './uploads/members/';  
         $config['log_threshold'] = 1;                      
         $config['allowed_types'] = 'jpg|png|jpeg|gif';
         $config['max_size'] = '0'; // 0 = no file size limit
         $config['overwrite'] = false;
         $this->load->library('upload', $config);
         $this->upload->do_upload('p_nic_1');
         $upload_data = $this->upload->data();
         $file_name = $upload_data['file_name'];
    }
    if($p_nic_2 !== ""){
         $config['upload_path'] = './uploads/members/';  
         $config['log_threshold'] = 1;                      
         $config['allowed_types'] = 'jpg|png|jpeg|gif';
         $config['max_size'] = '0'; // 0 = no file size limit
         $config['overwrite'] = false;
         $this->load->library('upload', $config);
         $this->upload->do_upload('p_nic_2');
         $upload_data = $this->upload->data();
         $file_name = $upload_data['file_name'];
    }		
// -------------- Insert to member table -------------------------//	
		$data_new_member = array(
			    'Per_id'         => $per_id,
				'm_image'        => $profile_img,
			    'm_type'         => $this->input->post('membership'),
			    'm_card_no'      => trim( $this->input->post('new_c_no') ),
			    'm_w_type'		 => $new_weapon,
			    'm_no_w'		 => trim( $this->input->post('new_w_no') ),
			    'm_date'		 => $this->input->post('arr_date'),   //date('Y-m-d'),
			    'm_nic_image1'	 => $p_nic_1,
			    'm_nic_image2'	 => $p_nic_2
			);
		//echo '<pre>';print_r($data_new_member);die;
		$insert_new_member = $this->db->insert('membership',$data_new_member);
		$m_id = $this->db->insert_id();

// ----------------- Start Insertion to Checkin ------------------------//

		  $new_checkin = array(
		  	'c_fire'			=> trim( $this->input->post('new_no_fire') ),
		  	'm_id'				=>$m_id,
		  	'c_profession'		=> trim( $this->input->post('new_proffession') ),
		  	'boot_no'			=> trim( $this->input->post('new_booth_no') ),
		  	'no_persons'		=> trim( $this->input->post('new_no_person') ),
			'range_charge'		=> trim( $this->input->post('new_range_charge') ),
			'remarks'			=> trim( $this->input->post('new_remarks') ),
			'c_arrival_date'	=> $this->input->post('arr_date'),//date('Y-m-d'),
			'c_arrival_time'	=>$this->input->post('new_a_t'),//date('h:i sa'),
			'c_departure_date'	=> '',//date('Y-m-d'),
			'c_departure_time'	=>$this->input->post('dep_time'),//date('h:i sa'),
			'c_status'			=>1,
			'c_weapon'			=>$new_weapon,
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
   if( $this->input->post('new_nominated_name') != null ){              
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

	// ------------------------------------------------------------- 

    	$this->db->where('Per_cnic', $this->input->post('new_nominated_cnic'));
    	$person_data = $this->db->get('person')->result();
	    if( empty($person_data) ){
	        $data_nominated_0 = [
	            'Per_name'         => trim( $this->input->post('new_nominated_name') ),
	            'Per_number'       => trim( $this->input->post('new_nominated_mobile') ),
	            'Per_cnic'         => trim( $this->input->post('new_nominated_cnic') ),
	            'Per_address'      => trim( $this->input->post('new_nominated_address') ),
	            'Per_type'	       => 'C_G',
	            'Per_date'	       => $this->input->post('arr_date') ,
	        ];	
	        $insert_person = $this->db->insert('person',$data_nominated_0);
	        $new_nominated_mem_id = $this->db->insert_id();
	    }else{
	        $new_nominated_mem_id = $person_data[0]->Per_id;
	    }

		 $new_data_guest_checkin = [
		     'Per_id'           => $new_nominated_mem_id, 
		     'c_id'              => $c_id,
		     'g_status'			=>'1',
		     'g_date'			=>$this->input->post('arr_date'),
		     'g_nic_1'			=> $g1_nic_1,
		     'g_nic_2'			=> $g1_nic_2,
		     'g_profile_img'	=> $profile_img_1
		 ];
		 //echo '<pre>';print_r($new_data_guest_checkin);die;
		 
		$this->db->insert('guest_checkin',$new_data_guest_checkin);
	    }
if( $this->input->post('new_nominated_1_name') != '' ) {
		 

		// ---------------------------------------------------------------------------------------

		$this->db->where('Per_cnic', $this->input->post('new_nominated_1_cnic'));
    	$person_1_data = $this->db->get('person')->result();
	    if( empty($person_1_data) ){
	        $data_nominated_1 = [
	            'Per_name'         => trim( $this->input->post('new_nominated_1_name') ),
	            'Per_number'       => trim( $this->input->post('new_nominated_1_mobile') ),
	            'Per_cnic'         => trim( $this->input->post('new_nominated_1_cnic') ),
	            'Per_address'      => trim( $this->input->post('new_nominated_address') ),
	            'Per_type'	       => 'C_G',
	            'Per_date'	       => $this->input->post('arr_date') ,
	        ];	
	        $insert_person = $this->db->insert('person',$data_nominated_1);
	        $new_nominated_mem_id = $this->db->insert_id();
	    }else{
	        $new_nominated_mem_id = $person_1_data[0]->Per_id;
	    }

				 
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
}
//------------------------------------------------------------- //		 		 
if( $this->input->post('new_nominated_2_name') != '' ){ 
		 $new_data_guest_checkin_1 = [
		     'Per_id'           => $new_nominated_mem_id, 
		     'c_id'             => $c_id,
		     'g_status'			=> '1',
		     'g_date'			=> $this->input->post('arr_date'),
		     'g_nic_1'			=> $g1_nic_1,
		     'g_nic_2'			=> $g1_nic_2,
		     'g_profile_img'	=> $profile_img_2
		 ];
		 $this->db->insert('guest_checkin',$new_data_guest_checkin_1);
        }

        $this->db->where('Per_cnic', $this->input->post('new_nominated_2_cnic'));
    	$person_2_data = $this->db->get('person')->result();
	    if( empty($person_2_data) ){
	        $data_nominated_2 = [
	            'Per_name'         => trim( $this->input->post('new_nominated_2_name') ),
	            'Per_number'       => trim( $this->input->post('new_nominated_2_mobile') ),
	            'Per_cnic'         => trim( $this->input->post('new_nominated_2_cnic') ),
	            'Per_address'      => trim( $this->input->post('new_nominated_2_address') ),
	            'Per_type'	       => 'C_G',
	            'Per_date'	       => $this->input->post('arr_date') ,
	        ];	
	        $insert_person = $this->db->insert('person',$data_nominated_2);
	        $new_nominated_mem_id = $this->db->insert_id();
	    }else{
	        $new_nominated_mem_id = $person_2_data[0]->Per_id;
	    }

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
		     'g_date'			=>$this->input->post('arr_date'),
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
			trim($name 			= $this->input->get('name') );
			trim($nic_no		= $this->input->get('cnic_no') );
			trim($c_no  		= $this->input->get('card_no') );
			trim($mobile  		= $this->input->get('mobile') );
			trim($l_no  		= $this->input->get('license_no') );
			trim($mem_type      = $this->input->get('member_type') );
			
			if( empty($name) && empty($nic_no) && empty($c_no) && empty($mobile) && empty($l_no) && empty($mem_type) )
			{
				$qry = $this->db->query( "SELECT m.m_payment,m.m_id,m.m_reason,p.Per_type,p.per_id,p.Per_name,p.per_number,p.Per_license_no,p.Per_cnic,m.m_type,m.m_card_no,m.m_status,m.m_valid_from,m.m_valid_to FROM person p INNER JOIN membership m ON p.Per_id = m.Per_id where p.Per_type = 'M' " );
				$data =  $qry->result();
				return $data;
			}
			
			$this->db->select('m.m_payment,m.m_id,m.m_reason,p.Per_type,p.per_id,p.Per_name,p.per_number,p.Per_license_no,p.Per_cnic,m.m_type,m.m_card_no,m.m_valid_from,m.m_valid_to,m.m_status');
			$this->db->from('person p');

			if( !empty( $name ) ){
			$this->db->where('p.Per_type','M');
                $this->db->where("p.Per_name LIKE '$name%'");
			}	
			if(!empty($mobile)){
				$this->db->where('p.Per_type','M');
				$this->db->where('p.per_number',$mobile);
				
			}

		if( !empty( $l_no ) ){
			$this->db->where('p.Per_type','M');
			$this->db->where('p.Per_license_no',$l_no);
			
		}
		
			if( !empty( $nic_no ) ){
			$this->db->where('p.Per_type','M');
			$this->db->where('p.Per_cnic',$nic_no);
			
			}
		if(!empty($c_no)){
			$this->db->where('p.Per_type','M');
			$this->db->where('m.m_card_no',$c_no);
		}
		if(!empty($mem_type)){
			$this->db->where('p.Per_type','M');
			$this->db->where('m.m_type',$mem_type);
			// $where = "(p.Per_type ='M')";
			// $this->db->where($where);
		}
			$this->db->join('membership m','p.per_id = m.per_id');
			// $this->db->join('membership_renewal m_r','m_r.m_id = m.m_id');
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
			return $data;
		}
////////////////// ADVANCE SEARCH//////////////////
		function advance_all_members_search()
		{
			$this->db->select('p.Per_id,p.Per_name,p.Per_number');
			$this->db->from('person p');
			$this->db->where('p.Per_type','M');
			$this->db->or_where('p.Per_type','W');
			// $this->db->or_where('p.Per_type','p');
			$this->db->or_where('p.Per_type','S');
			$qry_s = $this->db->get();
			$s_data = $qry_s->result();
			//echo '<pre>';print_r($s_data);die;
			return $s_data;
		}

		function advance_search_full()
		{
		//------------- Create array from fields --------------//
			$name        = $this->input->get('adv_name');
			$reg_no      = $this->input->get('adv_reg_no');
			$mobile      = $this->input->get('adv_mobile_no');
			$card_no     = $this->input->get('adv_card_no');
			$nic_no      = $this->input->get('adv_nic');
			$booth_no    = $this->input->get('adv_booth_no');
			$mem_type    = $this->input->get('adv_member_type');
			$weapon_type = $this->input->get('adv_weapon');
			$weapon_no   = $this->input->get('adv_weapon_no');
			$from 	     = $this->input->get('adv_from');
			$to 	     = $this->input->get('adv_to');
			// ----------------------------------------------------------
			if($name=='' && $reg_no=='' && $mobile=='' && $card_no=='' && $nic_no=='' && $mem_type=='' && $booth_no =='' && $weapon_type=='' && $weapon_no=='' && $from =='' && $to =='' )
			{
				$this->db->select('*');
				$this->db->from('person p');
                                $this->db->order_by('p.Per_id', 'desc');
                                $this->db->or_where('p.Per_type', 'W');
                                $this->db->or_where('p.Per_type', 'M');
				$this->db->join('membership m','p.Per_id = m.Per_id');
				$this->db->join('checkin c','m.m_id = c.m_id');
				$data['all_data'] = $this->db->get()->result();
				return $data;	
				// echo '<pre>';print_r($res);die('i am here');
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
                    $this->db->where("p.Per_name LIKE '$name%'");
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
				// die('i am here');
				$this->db->join('membership m','p.per_id = m.per_id','left');
				$qry = $this->db->get();
				$qry_4 = $qry->num_rows();
				if( $qry_4 > 0 )
				{
					$dataa['data5'] =  $qry->result();
					foreach ($dataa['data5'] as $value) 
					{
						$person_type = $value->Per_type;
					}
				}
				
				foreach ( $dataa['data5'] as $value ) 
				{
					
					 $m_id = $value->m_id;
					 $this->db->from('membership m');
	                 $this->db->where('m.m_id',$m_id);
					 $this->db->join('checkin c','m.m_id=c.m_id');
	                 $this->db->join('person p','p.Per_id=m.per_id');
					 $qry3 = $this->db->get();
					 $qry_4 = $qry3->num_rows();
					 
					 
                    if( $qry_4 > 0 ){
                        $iamresult = $qry3->result();
                        foreach ( $iamresult as $somethingison ){
                            $data['all_data_search'][] = $somethingison;
                        }
                    }
				}
				if( isset( $data ) )
				{
					if( $data != NULL ){
						return $data;
					}
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
        // echo $m_id;die;
        $this->db->from('reference_person');        
        $this->db->where('reference_person.m_id',$m_id);
        $this->db->join('person',"person.Per_id=reference_person.per_id");
         $query_3 = $this->db->get();
         // echo '<pre>';print_r($query_3->result());die;
         $num_data_3 = $query_3->num_rows();
        if($num_data_3>0)
        {
        $data['refrence_data'] = $query_3->result();
        }
        // echo "<pre>";print_r($data['refrence_data']);die;
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
		function member_details($per_id,$c_id,$mem_id=NULL)
		{
			// echo $per_id;die;
////////////////////PERSONEL MEMBERSHIP DATA///////////////
		// ---------------- Get Bill No --------------------
		
			$this->db->where('per_id',$per_id);
			$this->db->where('c_id',$c_id);
			$data['bill'] = $this->db->get('billinfo')->result();


		//--------------------------------------------------	
		if(isset($mem_id))
		{	
		 $this->db->select('*');
		 $this->db->from('person');
		 $this->db->where('person.per_id',$per_id);
		 $this->db->where('c.c_id',$c_id);
		 $this->db->join('membership',"membership.per_id = person.per_id");
		 $this->db->join('checkin c','c.m_id = membership.m_id');
		 // $this->db->join('booths b','b.bo_id = c.boot_no');
		 // $this->db->order_by('c.c_id','desc');
		 // $this->db->limit(1);
     	 $query = $this->db->get();
		 $data['persondata'] = $query->result();
		 // echo '<pre>';print_r($data['persondata']);die;
		 $c_id = $data['persondata'][0]->c_id;
		 if(isset($c_id))
		 {
		 $checkin_data = $this->db->query(" SELECT * FROM checkin c INNER JOIN guest_checkin g_c ON sstechn1_fiver.c.c_id = sstechn1_fiver.g_c.c_id INNER JOIN person p ON sstechn1_fiver.p.Per_id = sstechn1_fiver.g_c.per_id where sstechn1_fiver.c.m_id = ".$mem_id." AND sstechn1_fiver.g_c.c_id = ".$c_id." ORDER BY c.c_id desc ");
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
				'r_date' 		=>$this->input->post('valid_from'),   //date('Y-m-d'),
				'r_valid_from'	=>$this->input->post('valid_from'),
				'r_valid_to'	=>$this->input->post('valid_to'),
				'm_id'			=>$this->input->post('m_id'),
				'r_status'		=>1
				);
			//echo'<pre>';print_r($m_r_data);die;
			$insert_r_data = $this->db->insert('membership_renewal',$m_r_data);

			$update_mem = array(
					'm_valid_to' => $this->input->post('valid_to')		
				);
			// echo '<pre>';print_r($update_mem);die;
			$this->db->where('m_id',$this->input->post('m_id') );
			$this->db->update('membership',$update_mem);

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
		return $data;
	}

// ---------------------- CheckIn if person data is exist -----------------------//
	function insert_checkin_data()
	{
        // getting data from post    
		$_POST['arr_time']  = date("g:i a", strtotime($_POST['arr_time']));
		$_POST['dep_time']  = date("g:i a", strtotime($_POST['dep_time']));
		$weapon = $this->input->post('weapon');
		if(isset($new_weapon)){
			$new_weapon = $new_weapon;
		}else{ 
			$new_weapon = '';
		}
		$per_id = $this->input->post('per_id');
		$m_id   = $this->input->post('m_id');
		$booth_no = $this->input->post('booth_no');
		$checkin = array(
		  	'c_fire'				=>trim( $this->input->post('no_fire') ) ,
		  	'm_id'					=>trim( $m_id),
		  	'c_profession'			=>trim( $this->input->post('proffession') ),
		  	'boot_no'				=>trim( $booth_no),
		  	'no_persons'			=>trim( $this->input->post('no_persons') ),
			'range_charge'			=>trim( $this->input->post('range_charge') ),
			'remarks'				=>trim( $this->input->post('remarks') ),
			//--------- Old format that will change after -------//
			// 'c_arrival_date'=>date('Y-m-d'),
			// 'c_arrival_time'=>date('h:i sa'),
			// --------------------------------------------------//
			'c_arrival_date'		=>trim( $this->input->post('arr_date') ),
			'c_arrival_time'		=>trim( $this->input->post('arr_time') ),
			'c_departure_date'		=>'',
			'c_departure_time'		=>trim( $this->input->post('dep_time') ),
			'c_status'				=>1,
			'c_weapon'				=>trim( $weapon ),
			'c_weapon_name'			=>trim( $this->input->post('w_no') ),
		  	);
		// echo '<pre>';print_r($checkin);die;
                    $this->db->insert('checkin',$checkin);
                    $c_id = $this->db->insert_id();
		// echo '<pre>';print_r($checkin);
		//////////////////////////////////////////////////////////////

		  $data_booth = array(
		  		'c_id'			=>$c_id,
		  		'per_id'		=>$per_id,
		  		'status'		=>1
		  	);
		 // echo "<pre>";print_r($data_booth);
  		 $bo_id = $this->input->post('booth_no');

		 $this->db->where('bo_id',$bo_id);
		 $this->db->update('booths',$data_booth);

/////////////////////////// Insert Nominated Guest////////////////
    if( $this->input->post('nominated_name') != null ){               
        
        $this->db->where('Per_cnic', $this->input->post('nominated_cnic'));
        $person_1_data = $this->db->get('person')->result();
        if( empty($person_1_data) ){
            $data_nominated = [
                'Per_name'         => trim( $this->input->post('nominated_name') ),
                'Per_number'       => trim( $this->input->post('nominated_mobile') ),
                'Per_cnic'         => trim( $this->input->post('nominated_cnic') ),
                'Per_address'      => $this->input->post('nominated_address'),
                'Per_type'	       => 'C_G',
                'Per_date'	       => trim( $this->input->post('arr_date') )
            ];        

            $insert_person = $this->db->insert('person',$data_nominated);
            $new_nominated_mem_id = $this->db->insert_id();
        }else{
            $new_nominated_mem_id = $person_1_data[0]->Per_id;
        }
        
        //--------------------------------------------------------------------------

// ----------------------- GUEST 1 Images Upload ------------------------//
	$profile_img_1 = $_FILES['userfile_1']['name'];
	$g1_nic_1 = $_FILES['g1_nic_1']['name'];
	$g1_nic_2 = $_FILES['g1_nic_2']['name'];
	
	if($profile_img_1 !== ""){
         $config['upload_path'] 		= './uploads/members/';  
         $config['log_threshold'] 		= 1;                      
         $config['allowed_types'] 		= 'jpg|png|jpeg|gif';
         $config['max_size'] 			= '0'; // 0 = no file size limit
         $config['overwrite'] 			= false;
         $this->load->library('upload', $config);
         $this->upload->do_upload('userfile_1');
         $upload_data 					= $this->upload->data();
         $file_name 					= $upload_data['file_name'];
    }
    if($g1_nic_1 !== ""){
         $config['upload_path'] 		= './uploads/members/';  
         $config['log_threshold'] 		= 1;                      
         $config['allowed_types'] 		= 'jpg|png|jpeg|gif';
         $config['max_size'] 			= '0'; // 0 = no file size limit
         $config['overwrite'] 			= false;
         $this->load->library('upload', $config);
         $this->upload->do_upload('g1_nic_1');
         $upload_data 					= $this->upload->data();
         $file_name 					= $upload_data['file_name'];
    }
    if($g1_nic_2 !== ""){
         $config['upload_path'] 		= './uploads/members/'; 
         $config['log_threshold'] 		= 1;                       
         $config['allowed_types'] 		= 'jpg|png|jpeg|gif';
         $config['max_size'] 			= '0'; // 0 = no file size limit
         $config['overwrite'] 			= false;
         $this->load->library('upload', $config);
         $this->upload->do_upload('g1_nic_2');
         $upload_data 					= $this->upload->data();
         $file_name 					= $upload_data['file_name'];
    }
    
  
    
// --------------Check the fields is empty or has data ----------------------
/*if(!empty($profile_img_1)){$profile_img_1 =$profile_img_1; }else{$profile_img_1 = 'qzq.gif';}
if(!empty($g1_nic_1)){$g1_nic_1 =$g1_nic_1; }else{$g1_nic_1 = 'qzq.gif';}
if(!empty($g1_nic_2)){$g1_nic_2 =$g1_nic_2; }else{$g1_nic_2 = 'qzq.gif';}*/
//------------------------------------------------------------- //
		 $data_guest_checkin = [
		     'Per_id'           => $new_nominated_mem_id, 
		     'c_id'              => $c_id,
		     'g_status'			=>'1',
		     'g_date'			=>$this->input->post('arr_date'),  //date('Y-m-d')
		     'g_nic_1'			=> $g1_nic_1,
		     'g_nic_2'			=> $g1_nic_2,
		     'g_profile_img'	=> $profile_img_1
		 ];
		 // echo '<pre>';print_r($data_guest_checkin);
		$this->db->insert('guest_checkin',$data_guest_checkin);
}
if( $this->input->post('nominated_1_name') != null ){
    $this->db->where('Per_cnic', $this->input->post('nominated_1_cnic'));
    $person_2_data = $this->db->get('person')->result();
    if( empty($person_2_data) ){
        $data_nominated_0 = [
            'Per_name'         => trim( $this->input->post('nominated_1_name') ),
            'Per_number'       => trim( $this->input->post('nominated_1_mobile') ),
            'Per_cnic'         => trim( $this->input->post('nominated_1_cnic') ),
            'Per_address'      => trim( $this->input->post('nominated_1_address') ),
            'Per_type'	       => 'C_G',
            'Per_date'	       => $this->input->post('arr_date') ,
        ];	
        $insert_person = $this->db->insert('person',$data_nominated_0);
        $new_nominated_mem_id_1 = $this->db->insert_id();
    }else{
        $new_nominated_mem_id_1 = $person_2_data[0]->Per_id;
    }
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

// --------------Check the fields is empty or has data ----------------------
/*if(!empty($profile_img_2)){$profile_img_2 =$profile_img_2; }else{$profile_img_2 = 'qzq.gif';}
if(!empty($g2_nic_1)){$g2_nic_1 =$g2_nic_1; }else{$g2_nic_1 = 'qzq.gif';}
if(!empty($g2_nic_2)){$g2_nic_2 =$g2_nic_2; }else{$g2_nic_2 = 'qzq.gif';}*/

//------------------------------------------------------------- //			 


		 $data_guest_checkin_1 = [
		     'Per_id'           => $new_nominated_mem_id_1, 
		     'c_id'              => $c_id,
		     'g_status'			=>'1',
		     'g_date'			=>$this->input->post('arr_date'),
		     'g_nic_1'			=> $g2_nic_1,
		     'g_nic_2'			=> $g2_nic_2,
		     'g_profile_img'	=> $profile_img_2
		 ];
		 // echo '<pre>';print_r($data_guest_checkin_1);	
		 $this->db->insert('guest_checkin',$data_guest_checkin_1);
}
if( $this->input->post('nominated_2_name') != null ){
    $this->db->where('Per_cnic', $this->input->post('nominated_2_cnic'));
    $person_3_data = $this->db->get('person')->result();
    if( empty( $person_3_data ) ){
        $data_nominated_1 = [
            'Per_name'         => trim( $this->input->post('nominated_2_name') ),
            'Per_number'       => trim( $this->input->post('nominated_2_mobile') ),
            'Per_cnic'         => trim( $this->input->post('nominated_2_cnic') ),
            'Per_address'      => trim( $this->input->post('nominated_2_address') ),
            'Per_type'	   => 'C_G',
            'Per_date'	   => trim( $this->input->post('arr_date') )
        ];
        $insert_person = $this->db->insert('person',$data_nominated_1);
        $nominated_mem_id_2 = $this->db->insert_id();
    }else{
        $nominated_mem_id_2 = $person_3_data[0]->Per_id;
    }
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

// --------------Check the fields is empty or has data ----------------------
/*if(!empty($profile_img_3)){$profile_img_3 =$profile_img_3; }else{$profile_img_3 = 'qzq.gif';}
if(!empty($g3_nic_1)){$g3_nic_1 =$g3_nic_1; }else{$g3_nic_1 = 'qzq.gif';}
if(!empty($g3_nic_2)){$g3_nic_2 =$g3_nic_2; }else{$g3_nic_2 = 'qzq.gif';}*/
    
//------------------------------------------------------------- //

		 $data_guest_checkin_2 = [
		     'Per_id'            => $nominated_mem_id_2, 
		     'c_id'              => $c_id,
		     'g_status'			 =>'1',
		     'g_date'			 =>$this->input->post('arr_date'),
		     'g_nic_1'			=> $g3_nic_1,
		     'g_nic_2'			=> $g3_nic_2,
		     'g_profile_img'	=> $profile_img_3 
		 ];
		 $this->db->insert('guest_checkin',$data_guest_checkin_2);
		 // echo '<pre>';print_r($data_guest_checkin_2);die;	
	}
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

	public function payment_history_membership( $data ){
		$array = [];
		foreach( $data as $member ){
			$array[$member->m_id] = $member;
			$this->db->select_sum('r_payment');
		    $this->db->from('membership_renewal');
		   	$this->db->where('m_id',$member->m_id);
		    $query = $this->db->get();
		    $array[$member->m_id]->renewal = $query->row()->r_payment;

		}
		return $array;
	}

}