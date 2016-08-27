<?php

class purchase_reports_m extends CI_Model
{

	function search_purchase_data()
	{
		$name = $this->input->post('name');
		// echo $name;die;
		$nic = $this->input->post('cnic');
		$wea_no = $this->input->post('wea_no');
		$l_no = $this->input->post('l_no');
		$purchase_from = $this->input->post('purchase_from');
		$product_name = $this->input->post('product_name');
		$prod_type = $this->input->post('prod_type');
		$prod_model = $this->input->post('prod_model');
		$pr_code = $this->input->post('pr_code');
		$from_date = $this->input->post('from_date');
		$to_date = $this->input->post('to_date');

		$this->db->select('*');
		$this->db->from('person p');
		$this->db->join('purchase pr','p.Per_id = pr.Per_id' );
		$this->db->join('product prod','prod.p_id = pr.p_id');
		//---------------- Search by name---------------//
		if( !empty($name) )
		{
			$this->db->where('p.Per_type','p');	
			$this->db->where('p.Per_name',$name);
		}
		if( !empty($nic) )
		{
			$this->db->where('p.Per_type','p');	
			$this->db->where('p.Per_cnic',$nic);
		} 
		
		if( !empty($wea_no) )
		{
			$this->db->like('pr.par_weapon_no',$wea_no);
		}

		if( !empty($l_no) )
		{
			$this->db->like('p.Per_license_no',$l_no);
		}
		if( !empty($purchase_from) )
		{
			// $this->db->where('p.purchase_from','p');
			$this->db->where('p.purchase_from',$purchase_from);
		}
		if( !empty($product_name) )
		{
			$this->db->like('prod.p_name',$product_name);
		}
		if (!empty( $prod_type) ) 
		{
			$this->db->like('prod.p_type',$prod_type);
		}
		if (!empty( $prod_model) ) 
		{
			$this->db->like('prod.p_model',$prod_model);
		}		
		if (!empty( $pr_code) ) 
		{
			$this->db->like('prod.p_model',$pr_code);
		}	
		if( $from_date )
		{
			$this->db->where('pr.par_date >= ',$from_date);
		}
		if( $to_date )
		{
			$this->db->where('pr.par_date <= ',$to_date);
		}
		if ( !empty($date_from) && !empty($date_to) )
		{
			$this->db->where('pr.par_date >= ',$date_from);
			$this->db->where('pr.par_date <= ',$date_to);
		}

		if( !empty($to_date) && empty($from_date) )
		{	
			$this->db->where('pr.par_date = ',$to_date);
		}
		/*if( empty($to_date) && !empty($from_date) )
		{	
			$this->db->where('pr.par_date = ',$from_date);
		}*/		

		$qry = $this->db->get();
		$result = $qry->result();
		// echo'<pre>';print_r($result);die;
		if($result)
		{
			return $result;
		}
		else
		{
			return NULL;
		}

	}

	function single_purchase_res($par_id)
	{
		$this->db->select('*');
		$this->db->from('purchase par');
		$this->db->where('par_id',$par_id);
		$this->db->join('product p','par.p_id = p.p_id ');
		$this->db->join('person per','per.Per_id = par.Per_id');	
		$qry = $this->db->get();
		$result = $qry->result();
		// echo '<pre>';print_r($result);die;
		if($result)
		{
			return $result;
		}else
		{
			return NULL;
		}
	}

}

?>