<?php

class Teacher_m extends CI_Model{
    
    function addteacherpro(){
        
        $name         = $this->input->post('name');
        $email        = $this->input->post('email');
        $cnic         = $this->input->post('cnic');
        $subject      = $this->input->post('subject');
        $address      = $this->input->post('address');
        $contact      = $this->input->post('contact');
        $percentage   = $this->input->post('percentage');
        $created_date = date("d-M-Y");
        $created_time = date("h:i:sa");
        $length = 6;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ,@#$%*';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        $password = $randomString;
        $insert_array = array(
          'name'          => $name,
          'email'         => $email,
          'password'      => $password,
          'cnic'          => $cnic,
          'address'       => $address,
          'subject'       => $subject,
          'contact'       => $contact,
          'percentage'    => $percentage,
          'created_date'  => $created_date,
          'created_time'  => $created_time
        );
        $result = $this->db->insert('teacher',$insert_array);
        
        if($result){
            return 1;
        }else{
            return 0;
        }
        
    }
    
    //--------------------------------------------------------------------------
    function updateteacherpro($id){
        
        $name         = $this->input->post('name');
        $email        = $this->input->post('email');
        $cnic         = $this->input->post('cnic');
        $subject      = $this->input->post('subject');
        $address      = $this->input->post('address');
        $contact      = $this->input->post('contact');
        $percentage   = $this->input->post('percentage');
        $updated_date = date("d-M-Y");
        $updated_time = date("h:i:sa");
        
        $this->db->where('id',$id);

        $insert_array = array(
          'name'          => $name,
          'email'         => $email,
          'cnic'          => $cnic,
          'address'       => $address,
          'subject'       => $subject,
          'contact'       => $contact,
          'percentage'    => $percentage,
          'updated_date'  => $updated_date,
          'updated_time'  => $updated_time
        );
        $result = $this->db->update('teacher',$insert_array);
        
        if($result){
            return 1;
        }else{
            return 0;
        }
        
    }
    
    //--------------------------------------------------------------------------
    function viewteachers(){
        $this->db->select("*");
        $query = $this->db->get("teacher");
        $num = $query->num_rows();
        $config2['base_url'] = site_url()."teacher/viewteacher";
        $config2['total_rows'] = $num;
        $config2['per_page'] = 10;
        $config2['num_links'] = 4;
        //config for bootstrap pagination class integration
        $config2['uri_segment'] = 3;
        $this->db->order_by('id','desc');
        $this->pagination->initialize($config2);
        $query = $this->db->get('teacher', $config2['per_page'], $this->uri->segment(3));

        if ($query->num_rows() > 0) {
            $result = $query->result();
            foreach ($result as $row) {
                $data[] = $row;
            }
            return $data;
        } else {
            return 0;
        }
    }
    
    //--------------------------------------------------------------------------
    function delete_teacher($id){
        
        $query = $this->db->delete('teacher', ['id' => $id]);
        if($query){
            return 1;
        }else{
            return 0;
        }
        
    }
    
    //--------------------------------------------------------------------------
    function view_teacherdetails($id){
        $this->db->select('*');
        $this->db->where('id',$id);
        $this->db->from('teacher');
        $query  = $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    //--------------------------------------------------------------------------
    function update_teacher($id){
        $this->db->select('*');
        $this->db->from('teacher');
        $this->db->where('id',$id);
        
        $query  = $this->db->get();
        $result = $query->result();
        
        foreach ($result as $row){
            $data[] = $row;
        }
        return $data; 
    }

    //---------------------------------------------------------------------------
    function get_teacher( $id = null ){
	
	if( $id == null ){
	    return 0;
	}
	
	$this->db->where( 'subject', $id );
        $query  = $this->db->get('teacher');
        $result = $query->result();
        return $result;
	
    }
    
}
