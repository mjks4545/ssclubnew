<?php 
class Sale_reports_m extends CI_Model
{
	function sale_reports_search() 
	{
            
		$name 		  	  = $this->input->get('name');
		$nic 			  = $this->input->get('cnic');
		$bill_no 		  = $this->input->get('bill_no');
		$wea_no 		  = $this->input->get('wea_no');
		$membership		  = $this->input->get('membership');
		$l_no 			  = $this->input->get('l_no');
		$purchase_from    = $this->input->get('purchase_from');
		$product_name 	  = $this->input->get('product_name');
		$prod_type 		  = $this->input->get('prod_type');
		$prod_model		  = $this->input->get('prod_model');
		$pr_code 		  = $this->input->get('pr_code');
		$from_date 		  = $this->input->get('from_date');
		$to_date 		  = $this->input->get('to_date');
                
		$this->db->select('s.*,p.*,prod.*');
		// $this->db->select('*');
		$this->db->from('sale s');
        $this->db->join( 'person p', 'p.Per_id = s.Per_id' );
		// $this->db->join('membership m','p.Per_id = m.Per_id');
		$this->db->join('product prod','prod.p_id = s.p_id');
		$this->db->order_by('s.s_date','asc');
                
		if( $name != null )
		{
            $this->db->where("p.Per_name LIKE '$name%'");
		}
		if( $nic != null )
		{
			$this->db->where('p.Per_cnic',$nic);
		} 
		if( $l_no != null )
		{
			$this->db->where('p.Per_license_no',$l_no);
		}
		if( $membership != null )
		{
			$this->db->where('m.m_type',$membership);
		}
		if( $wea_no != null )
		{
			$this->db->where('s.s_weapon_no',$wea_no);
		}
		if( $product_name != null )
		{
			$this->db->where('prod.p_name',$product_name);
		}
		if( $prod_type != null )
		{
			$this->db->where('prod.p_type',$prod_type);
		}
		if( $prod_model != null )
		{
			$this->db->where('prod.p_model',$prod_model);
		}
		if( $pr_code != null )
		{
			$this->db->where('prod.p_code',$pr_code);
		}
		if( $from_date )
		{
			$this->db->where('s.s_date >= ',$from_date);
		}
		if( $to_date )
		{
			$this->db->where('s.s_date <= ',$to_date);
		}
		if ( $from_date != null && $to_date != null )
		{
			$this->db->where('s.s_date >= ',$from_date);
			$this->db->where('s.s_date <= ',$to_date);
		}
		if( $bill_no != null )
		{
			$this->db->where('s.b_id',$bill_no);
		}	

		if( $to_date != null && $from_date != null )
		{	
			$this->db->where('s.s_date = ',$to_date);
		}
		$result = $this->db->get()->result();
		if( empty( $result ) ){
			$this->db->select('s.*,p.*,prod.*');
			$this->db->from('sale s');
	        $this->db->join( 'person p', 'p.Per_id = s.Per_id' );
			//$this->db->join('membership m','p.Per_id = m.Per_id');
			$this->db->join('product prod','prod.p_id = s.p_id');
			//$this->db->join('purchase','prod.p_id = purchase.p_id');
			$this->db->order_by('s.s_date','asc');
	                
			if( $name != null )
			{
	            $this->db->where("p.Per_name LIKE '$name%'");
			}
			if( $nic != null )
			{
				$this->db->where('p.Per_cnic',$nic);
			} 
			if( $l_no != null )
			{
				$this->db->where('p.Per_license_no',$l_no);
			}
			if( $membership != null )
			{
				$this->db->where('m.m_type',$membership);
			}
			if( $wea_no != null )
			{
				$this->db->where('s.s_weapon_no',$wea_no);
			}
			if( $product_name != null )
			{
				$this->db->where('prod.p_name',$product_name);
			}
			if( $prod_type != null )
			{
				$this->db->where('prod.p_type',$prod_type);
			}
			if( $prod_model != null )
			{
				$this->db->where('prod.p_model',$prod_model);
			}
			if( $pr_code != null )
			{
				$this->db->where('prod.p_code',$pr_code);
			}
			if( $from_date )
			{
				$this->db->where('s.s_date >= ',$from_date);
			}
			if( $to_date )
			{
				$this->db->where('s.s_date <= ',$to_date);
			}
			if ( $from_date != null && $to_date != null )
			{
				$this->db->where('s.s_date >= ',$from_date);
				$this->db->where('s.s_date <= ',$to_date);
			}
			if( $bill_no != null )
			{
				$this->db->where('s.b_id',$bill_no);
			}	

			if( $to_date != null && $from_date != null )
			{	
				$this->db->where('s.s_date = ',$to_date);
			}
			$result = $this->db->get()->result();
		}
		return $result;
	}

	function sale_person_details($per_id,$b_id=NULL,$s_id=NULL)
	{
		$this->db->from('person p');
		$this->db->where('p.Per_id',$per_id);
		$this->db->join('membership m','m.per_id = p.Per_id');
		$this->db->join('sale s','s.Per_id = p.Per_id');
		if( $s_id != null ){
			$this->db->where('s.s_id',$s_id);
		}
		// $this->db->limit(1);
		// $this->db->order_by('s.s_id','desc');
		$result['persondata'] = $this->db->get()->result();
		 // echo '<pre>';print_r($result['persondata']);die;
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
			$this->db->join('billinfo','billinfo.b_id =' . $b_id);
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

	function sale_bill_reports($per_id,$b_id,$s_id)
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
		if( $s_id != null ){
			$this->db->where('sale.s_id',$s_id);
		}else{
			$this->db->or_where('sale.s_id',$s_id);
  		}
  		$this->db->join('sale','p.Per_id = sale.Per_id');
  		// $this->db->limit(1);
		$qry_1 = $this->db->get();
		$result['persondata'] = $qry_1->result();
		 // echo '<pre>';print_r($result['persondata']);die;
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

	// ------------------------------------------------------------------------

	public function paid_bill( $b_id ){

		$this->db->where( 'b_id', $b_id );
		$this->db->update( 'billinfo', ['bill_pay_status' => 1, 'paid_date' => date('Y-M-d') ] );
		return 1;

	}

	// -------------------------------------------------------------------------
}

?>