<?php 
class Sale extends CI_Controller
{

//------------------------------------------------------------------------
    function __construct()
    {
        parent::__construct();
        $this->load->model("sales_m");
    }

    // -------------------------------------------------------------------------


	function index()
	{
		$this->load->view('include/header');
        // $this->load->view('include/sidebar');
        $this->load->view('showroom/sales/search_sales');
        $this->load->view('include/footer');
	}
	
	function search_by_nic()
	{
		$result['search_data'] = $this->sales_m->search_by_nic();
        if($result['search_data'] )
         {
            $this->load->view('include/header');
            // $this->load->view('include/sidebar');
            $this->load->view('showroom/sales/searched_sales',$result);
            $this->load->view('include/footer');
         }
        else
        {
            $this->load->view('include/header');
            // $this->load->view('include/sidebar');
            $this->load->view('showroom/sales/new_sale');
            $this->load->view('include/footer');   
        }

	}

    function insert_sale_data()
    {
        $result = $this->sales_m->insert_sale_data();
        $id = $this->uri->segment(3);
        $this->session->set_flashdata('msg','Your sale added successfully');
        $this->session->set_flashdata('type','success');
        redirect('sale/add_more_sale/'.$id);
    }

    function insert_new_sale() 
    {
        $result = $this->sales_m->insert_new_sale();
        // echo '<pre>';print_r($result);die;
        // echo $id = $this->uri->segment(3);
        // $per_id = $this->session->userdata('sess_per_id');
        redirect('sale/F/'.$result);
    }

    function add_more_sale()
    {
        $per_id = $this->uri->segment(3);
        // $c_id = $this->uri->segment(4);
        $sale_data['saled_data'] = $this->sales_m->saled_records($per_id);
        // echo '<pre>';print_r($sale_data);die;
        $this->load->view('include/header');
        // $this->load->view('include/sidebar');
        $this->load->view('showroom/sales/add_more_sales',$sale_data);
        $this->load->view('include/footer');    

        // $this->session->unset_userdata('sess_per_id');
    }

    function add_sale()
    {
        $per_id = $this->input->post('per_id');
        $c_id = $this->input->post('c_id');
        if(isset($c_id))
        {
            $c_id = $c_id;
        }
        else
        {
            $c_id = '';
        }
        $result = $this->sales_m->add_sale();
        $this->session->set_flashdata('msg','Your sale added successfully');
        $this->session->set_flashdata('type','success');
        redirect('sale/add_more_sale/'.$per_id.'/'.$c_id);
    }

    function delete_sale()
    {
        $qnty = $this->input->post('qnty');
        $s_id = $this->input->post('s_id');
        $result = $this->sales_m->delete_sale($s_id,$qnty);
        $this->session->set_flashdata('msg','successfully deleted');
        $this->session->set_flashdata('type','success');
        // redirect('sale/add_more_sale/'.$per_id);
    }

    function get_data_update()
    {
        $s_id   = $this->uri->segment(3);
        $per_id = $this->uri->segment(4);
        $s_result['per_id'] = $per_id;
        // echo $s_result['per_id'];die;
        $s_result['data'] = $this->sales_m->get_data_update($per_id,$s_id);
        // echo '<pre>'; print_r($s_result);die;
        $this->load->view('include/header');
        // $this->load->view('include/sidebar');
        $this->load->view('showroom/sales/update_sale',$s_result);
        $this->load->view('include/footer');
    }

    function update_sale()
    {
        $s_id = $this->input->post('old_s_id');
        $per_id = $this->input->post('old_per_id');
        $c_id = $this->input->post('c_id');
        $old_data = $this->sales_m->get_data_update($per_id,$s_id);
        // echo '<pre>';print_r($old_data);die;
        $o_w_no     = $old_data[0]->s_weapon_no;
        $o_qnty     = $old_data[0]->s_quantity;
        $s_price    = $old_data[0]->s_price;
        $o_pr_code  = $old_data[0]->p_code;
        $old_par_id = $old_data[0]->par_id;
        $p_id       = $old_data[0]->p_id;
        // ------------------- Input field data -------------------//
        $prd_code   = $this->input->post('pr_code');
        $wea_no     = $this->input->post('weapon_no_1');
        $qnty       = $this->input->post('quantity');
        $rate       = $this->input->post('rate');

        $check_data = $this->sales_m->update_sale();
        // echo '<pre>';print_r($check_data);die;

        //-------------- Check condition for Update ---------------//
        if($o_pr_code == $prd_code && $o_w_no == $wea_no && $o_qnty == $qnty && $s_price ==$rate )
        {
            echo 'No Data Updated';die;
        }

        if($check_data == 1 )
        {
         // -------- Add Previous Sale data to its product --------//   
            //----------- Add Quantity to Purchase -----------//
                $this->db->where('par_id',$old_par_id);
                $res_p = $this->db->get('purchase')->result();
                $pur_qnty = $res_p[0]->p_quantity;
                $new_qnty = $pur_qnty + $o_qnty;
                $pur_data = array(
                        'p_quantity'=> $new_qnty
                    );
                // echo '<pre>';print_r($pur_data);
                $this->db->where('par_id',$old_par_id);
                $this->db->update('purchase',$pur_data);
              //----------- Add Quantity to Product Table -----------//
                $this->db->where('p_id',$p_id);
                $res_p = $this->db->get('product')->result();
                $old_qnty = $res_p[0]->p_quantity;
                $new_p_qnty = $old_qnty + $o_qnty;

                $product_data = array(
                        'p_quantity'=> $new_p_qnty
                    );

                // echo '<pre>';print_r($product_data);
                $this->db->where('p_id',$p_id);
                $this->db->update('product',$product_data);

           //---------------- Update item with new one ------------//
            $s_u_data = array(
                    'trans_status' => 0 
                );
            // echo '<pre>';print_r($s_u_data);die;
           $update_result = $this->sales_m->add_sale();
           $this->db->where('s_id',$s_id);
           $this->db->update('sale',$s_u_data);
           redirect('sale/add_more_sale/'.$per_id.'/'.$c_id);
                      
        }
        else
        { 
            echo 'item Not found in stock';die;
        } 

    }

    // ---------------------- Report Of All sales ---------------------//
    function sales_bill()
    {
        $per_id    = $this->uri->segment(3);
        $b_id      = $this->uri->segment(4);
        $sale_bill = $this->sales_m->sales_bill($per_id,$b_id); 
        // echo '<pre>';print_r($sale_bill);die;
        $this->load->view('include/header');
        // $this->load->view('include/sidebar');
        $this->load->view('showroom/sales/sales_bill',$sale_bill);
        $this->load->view('include/footer');
    }

    function save_bill() 
    {
        $per_id = $this->uri->segment(3);
        $result = $this->sales_m->save_bill($per_id);
        // echo '<pre>';print_r($result);die;
        $saled_data = $this->sales_m->saled_data($per_id);
        if($result == 0 )
        {
            $this->session->set_flashdata('msg','Bill Already Saved');
            $this->session->set_flashdata('type','warning');
            redirect('sale/sales_bill/'.$per_id);
        }
        else
        {
        $update_sale = array(
                'b_id'      => $result,
                'sale_save_status' =>1
            );
        foreach ($saled_data as $value) 
        {
            $s_id = $value->s_id;
            $this->db->where('s_id',$s_id);
            $this->db->update('sale',$update_sale);    
        }
        // --------- Close sale after save the bill ------------ //
        $close_sale = array(
                'trans_status' => 0
            );
        $this->db->where('per_id',$per_id);
        $this->db->update('sale',$close_sale);
        // echo $s_id;die;
         // echo '<pre>';print_r($saled_data);die;
        $this->session->set_flashdata('msg','Bill Saved Successfully');
        $this->session->set_flashdata('type','success');
        redirect('sale/sales_bill/'.$per_id.'/'.$result);

        }

    }


}

?>