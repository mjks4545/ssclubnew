<?php 
class Sale_reports_m extends CI_Model
{
	function sale_reports_search()
	{
		$name 		  	= $this->input->Post('name');
		$nic 			= $this->input->post('cnic');
		$bill_no 		= $this->input->post('bill_no');
		$wea_no 		= $this->input->post('wea_no');
		$membership		= $this->input->post('membership');
		$l_no 			= $this->input->post('l_no');
		$purchase_from  = $this->input->post('purchase_from');
		$product_name 	= $this->input->post('product_name');
		$prod_type 		= $this->input->post('prod_type');
		$prod_model		= $this->input->post('prod_model');
		$pr_code 		= $this->input->post('pr_code');
		$from_date 		= $this->input->post('from_date');
		$to_date 		= $this->input->post('to_date');
		
		$this->db->select('*');
		$this->db->from('person p');
		$this->db->join('membership m','p.Per_id = m.Per_id');
		$this->db->join('sale s','p.Per_id = s.per_id');
		$this->db->join('product prod','prod.p_id = s.p_id');
		// $this->db->join('billinfo b','p.Per_id = b.per_id');

		if(!empty($name))
		{
			$this->db->where('p.Per_name',$name);
		}
		if(!empty($nic))
		{
			$this->db->where('p.Per_cnic',$nic);
		} 
		if(!empty($l_no))
		{
			$this->db->where('p.Per_license_no',$l_no);
		}
		if(!empty($membership))
		{
			$this->db->where('m.m_type',$membership);
		}
		if(!empty($wea_no))
		{
			$this->db->where('s.s_weapon_no',$wea_no);
		}
		if(!empty($product_name))
		{
			$this->db->like('prod.p_name',$product_name);
		}
		if(!empty($prod_type))
		{
			$this->db->like('prod.p_type',$prod_type);
		}
		if(!empty($prod_model))
		{
			$this->db->like('prod.p_model',$prod_model);
		}
		if(!empty($pr_code))
		{
			$this->db->like('prod.p_code',$pr_code);
		}
		if( $from_date )
		{
			$this->db->where('s.s_date >= ',$from_date);
		}
		if( $to_date )
		{
			$this->db->where('s.s_date <= ',$to_date);
		}
		if ( !empty($date_from) && !empty($date_to) )
		{
			$this->db->where('s.s_date >= ',$date_from);
			$this->db->where('s.s_date <= ',$date_to);
		}
		if(!empty($bill_no))
		{
			$this->db->where('s.b_id',$bill_no);
		}	

		if( !empty($to_date) && empty($from_date) )
		{	
			$this->db->where('s.s_date = ',$to_date);
		}

		// echo '<pre>';print_r($this->db->get()->result());die;
		$result = $this->db->get()->result();
		return $result;
	}

	function sale_person_details($per_id,$b_id=NULL)
	{
		$this->db->from('person p');
		$this->db->where('p.Per_id',$per_id);
		$this->db->join('membership m','m.per_id = p.Per_id');
		$this->db->join('sale s','s.Per_id = p.Per_id');
		$this->db->limit(1);
		$this->db->order_by('s.s_id','desc');
		$result['persondata'] = $this->db->get()->result();
		//----------------- Get Sale Data -----------------//
		if(isset($b_id))
		{
			// echo $b_id.'  '.$per_id;die;
			$this->db->from('sale')
			->where('sale.per_id',$per_id)
	  		->group_start()
	  		// ->where('sale.trans_status',1)
	  		->where('sale.b_id',$b_id)
	  		->or_where('sale.s_id',$b_id)
	  		->group_end();
			$this->db->join('product pr','sale.p_id = pr.p_id');
			$qry = $this->db->get();
			$result['sale_data'] = $qry->result();
		}else if( $b_id == 0 )
		{
			$this->db->from('sale')
			->where('sale.per_id',$per_id)
	  		->group_start()
	  		->where('sale.trans_status',1)
	  		->group_end();
			$this->db->join('product pr','sale.p_id = pr.p_id');
			$qry = $this->db->get();
			$result['sale_data'] = $qry->result();
		}
		// echo '<pre>';print_r($result);die;
		return $result;
	}

	function sale_bill_reports($per_id,$b_id)
	{
		// -------------------- Saved Bill Data ----------//
		$this->db->where('per_id',$per_id);
		$this->db->order_by('b_id','desc');
		$result['bill_data']= $this->db->get('billinfo')->result();
		//--------------- Get Saled Data --------------//
		$this->db->from('sale')
		->where('sale.per_id',$per_id)
  		->group_start()
  		->where('sale.trans_status',0)
  		->where('sale.b_id',$b_id)
	  	->or_where('sale.s_id',$b_id)
  		->group_end();
		$this->db->join('product pr','sale.p_id = pr.p_id');
		$qry = $this->db->get();
		$result['sale_data'] = $qry->result();

		//------------- Get Person details -----------//
		$this->db->from('person p');
		$this->db->where('p.Per_id',$per_id);
  		$this->db->join('sale','p.Per_id = sale.Per_id');
  		$this->db->limit(1);
		$qry_1 = $this->db->get();
		$result['persondata'] = $qry_1->result();
		// echo '<pre>';print_r($result);die;
		return $result;
	}

	function delete_bill($per_id,$b_id)
	{
		// -------- Delete sale data --------//
		$this->db->from('sale')
		->where('sale.per_id',$per_id)
  		->group_start()
  		->where('sale.trans_status',1)
  		->where('sale.b_id',$b_id)
	  	->or_where('sale.s_id',$b_id)
  		->group_end();
  		$this->db->delete('sale');
  		// ---------- Delete Bill ----------// 
  		$this->db->where('b_id',$b_id);
  		$this->db->delete('billinfo');
		// $qry = $this->db->get();
		// $result = $qry->result();
		// echo '<pre>';print_r($result);die;
	}
}

?>