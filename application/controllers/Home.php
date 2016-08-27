<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {

        $this->load->view('include/header_login');
        $this->load->view('home_view');
        $this->load->view('include/footer_login');
    }

//-------------------------------------------------------------
    function loginpro()
    {
        $role = $this->input->post('role');
        $result = $this->main_m->loginpro();
        if($result==0)
        {
            echo 'status is 0';
        }
        if($result==1){
            $this->session->set_flashdata('msg','Welcome To SS Shooting Club');
            $this->session->set_flashdata('type','success');
            redirect("admin/index");
        }
        if($result==2){
            echo 'data not founded';
        }
    }
}