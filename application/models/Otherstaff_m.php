<?php

class Otherstaff_m extends CI_Model{

    function addstaffpro(){

        $name           = $this->input->post('name');
        $contact        = $this->input->post('contact');
        $cnic           = $this->input->post('cnic');
        $type           = $this->input->post('type');
        $salary         = $this->input->post('salary');
        $address        = $this->input->post('address');
        $email          = $this->input->post('email');
        $created_date   = date("d-M-Y");
        $created_time   = date("h:i:sa");

        $insert_array = array(
          'name'            => $name,
          'contact'         => $contact,
          'cnic'            => $cnic,
          'type'            => $type,
          'salary'          => $salary,
          'address'         => $address,
          'email'           => $email,
          'created_date'    => $created_date,
          'created_time'    => $created_time,
        );

        $result = $this->db->insert('otherstaff',$insert_array);
        if($result){
            return 1;
        }else{
            return 0;
        }
    }

    //------------------------------------------------------------------------------------------------------------------
    function updatestaffpro($id){

        $name           = $this->input->post('name');
        $contact        = $this->input->post('contact');
        $cnic           = $this->input->post('cnic');
        $type           = $this->input->post('type');
        $salary         = $this->input->post('salary');
        $address        = $this->input->post('address');
        $email          = $this->input->post('email');
        $updated_date = date("d-M-Y");
        $updated_time = date("h:i:sa");

        $this->db->where('id',$id);

        $insert_array = array(
            'name'            => $name,
            'contact'         => $contact,
            'cnic'            => $cnic,
            'type'            => $type,
            'salary'          => $salary,
            'address'         => $address,
            'email'           => $email,
            'updated_date'  => $updated_date,
            'updated_time'  => $updated_time
        );
        $result = $this->db->update('otherstaff',$insert_array);

        if($result){
            return 1;
        }else{
            return 0;
        }

    }

    //------------------------------------------------------------------------------------------------------------------
    function viewstaff(){
        $this->db->select("*");
        $query = $this->db->get("otherstaff");
        $num = $query->num_rows();
        $this->load->library('table');
        //$this->table->set_heading('S.N0','NAME','CONTENT');
        $config2['base_url'] = site_url()."otherstaff/viewstaff";
        $config2['total_rows'] = $num;
        $config2['per_page'] = 10;
        $config2['num_links'] = 4;
        //config for bootstrap pagination class integration
        $config2['full_tag_open'] = '<ul class="pagination">';
        $config2['full_tag_close'] = '</ul>';
        $config2['first_link'] = 'First';
        $config2['last_link'] = 'Last';
        $config2['first_tag_open'] = '<li>';
        $config2['first_tag_close'] = '</li>';
        $config2['prev_link'] = '&laquo';
        $config2['prev_tag_open'] = '<li class="prev">';
        $config2['prev_tag_close'] = '</li>';
        $config2['next_link'] = '&raquo';
        $config2['next_tag_open'] = '<li>';
        $config2['next_tag_close'] = '</li>';
        $config2['last_tag_open'] = '<li>';
        $config2['last_tag_close'] = '</li>';
        $config2['cur_tag_open'] = '<li class="active"><a href="#">';
        $config2['cur_tag_close'] = '</a></li>';
        $config2['num_tag_open'] = '<li>';
        $config2['num_tag_close'] = '</li>';
        $config['use_page_numbers'] = TRUE;
        $config2['uri_segment'] = 3;
        $this->pagination->initialize($config2);
        $this->db->order_by('id','desc');
        $query = $this->db->get('otherstaff', $config2['per_page'], $this->uri->segment(3));
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

    //------------------------------------------------------------------------------------------------------------------
    function view_staffdetails($id){
        $this->db->select('*');
        $this->db->from('otherstaff');
        $this->db->where('id',$id);

        $query  = $this->db->get();
        $result = $query->result();

        foreach ($result as $row){
            $data[] = $row;
        }
        return $data;
    }

    //------------------------------------------------------------------------------------------------------------------
    function update_staff($id){
        $this->db->select('*');
        $this->db->from('otherstaff');
        $this->db->where('id',$id);

        $query  = $this->db->get();
        $result = $query->result();

        foreach ($result as $row){
            $data[] = $row;
        }
        return $data;
    }

    //------------------------------------------------------------------------------------------------------------------
    function delete_staff($id){
        $query = $this->db->delete('otherstaff', ['id' => $id]);
        if($query){
            return 1;
        }else{
            return 0;
        }
    }

    //------------------------------------------------------------------------------------------------------------------
    function staff_salaries($id){
        $this->db->select('*');
        $this->db->from('otherstaff');
        $this->db->join('staff_salaries','staff_salaries.fkstaff_id = otherstaff.id');
        $this->db->where('fkstaff_id',$id);
        $query= $this->db->get();
        $data = $query->result();
        return $data;
    }

    //------------------------------------------------------------------------------------------------------------------
    function staff_data($id){
        $this->db->select('*');
        $this->db->where('id',$id);
        $query= $this->db->get('otherstaff');
        $data = $query->result();
        return $data;
    }

    //------------------------------------------------------------------------------------------------------------------
    function salarypaymentpro(){
        $id               = $this->input->post('staff_id');
        $total_salary     = $this->input->post('total_salary');
        $paid_month       = $this->input->post('paid_month');
        $amount_reason    = $this->input->post('reason');
        $paid_salary      = $this->input->post('amount');
        $created_date     = date("d-M-Y");
        $created_time     = date("h:i:sa");


        $this->db->select("*");
        $this->db->where("fkstaff_id",$id);
        $this->db->order_by('id','desc');
        $this->db->limit(1);
        $query = $this->db->get("staff_salaries");
        if($query->num_rows()>0) {
            $result = $query->result();
            foreach ($result as $r) {
                $last_paid = $r->paid_month;
                $remaining_salary = $r->remaining_salary;
                if ($last_paid == $paid_month) {
                    $remaining_salary = ($remaining_salary) - ($paid_salary);
                    $insert_array = array(

                            'fkstaff_id'        => $id,
                            'paid_month'        => $paid_month,
                            'total_salary'      => $total_salary,
                            'amount_reason'     => $amount_reason,
                            'paid_salary'       => $paid_salary,
                            'remaining_salary'  => $remaining_salary,
                            'created_date'      => $created_date,
                            'created_time'      => $created_time,

                        );
                    $result = $this->db->insert('staff_salaries',$insert_array);
                }
                if($last_paid!==$paid_month){
                    $remaining_salary=($total_salary)+($remaining_salary)-($paid_salary);
                    $insert_array = array(

                            'fkstaff_id'         => $id,
                            'paid_month'         => $paid_month,
                            'total_salary'       => $total_salary,
                            'amount_reason'      => $amount_reason,
                            'paid_salary'        => $paid_salary,
                            'remaining_salary'   =>$remaining_salary ,
                            'created_date'       => $created_date,
                            'created_time'       => $created_time,

                        );
                    $result = $this->db->insert('staff_salaries',$insert_array);
                }
            }
        }else {
            $remaining_salary = ($total_salary) - ($paid_salary);

            $insert_array = array(

                'fkstaff_id' => $id,
                'paid_month' => $paid_month,
                'total_salary' => $total_salary,
                'amount_reason' => $amount_reason,
                'paid_salary' => $paid_salary,
                'remaining_salary' => $remaining_salary,
                'created_date' => $created_date,
                'created_time' => $created_time,

            );
            $result = $this->db->insert('staff_salaries', $insert_array);
        }
        if($result){
            return 1;
        }else{
            return 0 ;
        }
    }

}