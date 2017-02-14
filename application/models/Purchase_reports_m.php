<?php

class purchase_reports_m extends CI_Model
{

	function search_purchase_data()
	{
		$name 			= $this->input->get('name');
		$nic			= $this->input->get('cnic');
		$wea_no 		= $this->input->get('wea_no');
		$l_no 			= $this->input->get('l_no');
		$purchase_from  = $this->input->get('purchase_from');
		$product_name 	= $this->input->get('product_name');
		$prod_type 		= $this->input->get('prod_type');
		$prod_model 	= $this->input->get('prod_model');
		$pr_code 		= $this->input->get('pr_code');
		$from_date 		= $this->input->get('from_date');
		$to_date 		= $this->input->get('to_date');

		$this->db->select('p.*,pr.*,prod.p_name,prod.p_type,prod.p_model,prod.p_code,prod.p_date');
		$this->db->from('person p');
		$this->db->order_by('pr.par_date','asc');
		
		$this->db->join('purchase pr','p.Per_id = pr.Per_id' );
		$this->db->join('product prod','prod.p_id = pr.p_id' );
		//---------------- Search by name---------------//
		if( !empty($name) )
		{
			// echo $name;die;
			$this->db->where('p.Per_type','p');	
//			$this->db->like('p.Per_name',$name);
                        $this->db->where("p.Per_name LIKE '$name%'");
		}
		if( !empty($nic) )
		{
			$this->db->where('p.Per_type','p');	
			$this->db->where('p.Per_cnic',$nic);
		} 
		
		if( !empty($wea_no) )
		{
			$this->db->where('p.Per_type','p');	
			$this->db->like('pr.par_weapon_no',$wea_no);
		}

		if( !empty($l_no) )
		{
			$this->db->where('p.Per_type','p');	
			$this->db->like('p.Per_license_no',$l_no);
		}
		if( !empty($purchase_from) )
		{
			// $this->db->where('p.purchase_from','p');
			$this->db->where('p.purchase_from',$purchase_from);
		}
		if( !empty($product_name) )
		{
			$this->db->where('prod.p_name',$product_name);
		}
		if (!empty( $prod_type) ) 
		{
			$this->db->where('prod.p_type',$prod_type);
		}
		if (!empty( $prod_model) ) 
		{
			// echo $prod_model;
			$this->db->where('prod.p_model',$prod_model);
		}		
		if (!empty( $pr_code) ) 
		{
			// echo '<br>'. $pr_code;die;
			$this->db->where('prod.p_code',$pr_code);
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
		
		// $this->db->order_by('p.Per_name','asc');
		$qry = $this->db->get();
		$result = $qry->result();
		// echo '<pre>';print_r($result);die;
		  
 		$result1 = [];
		foreach ( $result as $values ) 
		{

			$var = $values->p_id . $values->Per_id . $values->par_date;
	        if( !array_key_exists($var, $result1 ) ){
	            $result1[$var]      = $values;
		     }else{
		     	$result1[$var]->par_quantity += $values->par_quantity;
		     }
    	}

		// echo'<pre>';print_r($result1);die;
		if($result1)
		{
			return $result1;
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