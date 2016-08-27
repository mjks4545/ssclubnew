<?php

class Student_m extends CI_Model
{

    function addstudentpro()
    {
        $student_name = $this->input->post('student_name');
        $father_name = $this->input->post('father_name');
        $student_contact = $this->input->post('student_contact');
        $guardian_contact = $this->input->post('guardian_contact');
        $current_school = $this->input->post('current_school');
        $facebook_id = $this->input->post('facebook_id');
        $address = $this->input->post('address');
        $email = $this->input->post('email');
        $course_id = $this->input->post('course');
        $created_date = date("d-M-Y");
        $created_time = date("h:i:sa");

        $insert_array = array(
            'name' => $student_name,
            'father_name' => $father_name,
            'student_contact' => $student_contact,
            'guardian_contact' => $guardian_contact,
            'current_school' => $current_school,
            'facebook_id' => $facebook_id,
            'address' => $address,
            'email' => $email,
            'fkcourse_id' => $course_id,
            'created_date' => $created_date,
            'created_time' => $created_time,
        );

        $result = $this->db->insert('student', $insert_array);
        if ($result) {
            $fkstudent_id = $this->db->insert_id();
            $ids = array(
                'student_id' => $fkstudent_id,
                'course_id' => $course_id,
            );
            return $ids;
        } else {
            return 0;
        }
    }

    //------------------------------------------------------------------------------------------------------------------
    function studentclasses($crs_id)
    {

        $this->db->select('*');
        $this->db->from('class');
        $this->db->join('subject', 'subject.su_id = class.su_id');
        $this->db->join('teacher', 'teacher.id = class.t_id');
        $this->db->where('co_id', $crs_id);

        $query = $this->db->get();
        $result = $query->result();
        if ($result) {
            return $result;
        } else {
            return 0;
        }
    }

    //---------------------------------------------------------------------------------------------------------------------
    function studentclasspro($std_id)
    {
        $co_id = $this->input->post('co_id');
        $this->db->select('*');
        $this->db->from('class');
        $this->db->where('co_id',$co_id);
        $query = $this->db->get();
        $num = $query->num_rows();
        for ($i = 1; $i<=$num; $i++)
        {
            $subject = $this->input->post('select_'.$i);
            if($subject=='on')
            {
                $cl_id = $this->input->post('class_'.$i);

                $insert_array['student_classes'.$i] = array(
                  'fkclass_id'    => $cl_id,
                  'fkstudent_id'  => $std_id,
                );
                $insert_table = $this->db->insert('student_class_fee',$insert_array['student_classes'.$i]);

            }
        }
        if ($insert_table){
            return $insert_table;
        }else{
            return 0;
        }
    }

    //------------------------------------------------------------------------------------------------------------------
    function student_class_fee($std_id){

        $this->db->select('*');
        $this->db->from('student_class_fee');
        $this->db->join('class','class.cl_id = student_class_fee.fkclass_id');
        $this->db->join('subject','subject.su_id = class.su_id');
        $this->db->where('fkstudent_id',$std_id);
        $query  = $this->db->get();
        $result = $query->result();

        if ($result){
            return $result;
        }else{
            return 0;
        }

    }

    //------------------------------------------------------------------------------------------------------------------
}