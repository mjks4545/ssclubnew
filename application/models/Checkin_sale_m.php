<?php
class Checkin_sale_m extends CI_Model
{
   
  function checkin_sale_data($c_id,$per_id)
  {
  	$this->db->from('person');
  	$this->db->where('person.Per_id',$per_id);
  	$this->db->join('membership m','person.Per_id = m.per_id');
  	$res = $this->db->get()->result();
  	// echo '<pre>';print_r($res->result());die;
  	return $res;
  } 

  function insert_checkin_sale()
  {
  	$c_id   = $this->input->post('c_id');
  	$per_id = $this->input->post('per_id');
	$wea_no = $this->input->post('weapon_no_1');
  	$p_id   = $this->input->post('p_id');
	$qnty   = $this->input->post('quantity');
	$p_qnty   = $this->input->post('quantity');
	
	if( $wea_no != null  ) 
	{
		$qry_c1 = $this->db->query(" SELECT * FROM purchase where p_id = ".$p_id." AND p_quantity != 0 AND par_weapon_no ='$wea_no' ORDER BY par_date asc ");
		$w_result_data = $qry_c1->result();	
	}
	else
	{
		$chk_rec  = $this->db->query(" SELECT * FROM purchase where p_id = ".$p_id." AND p_quantity != ".$qnty." ORDER BY par_date asc ");
		$pr_res   = $chk_rec->result();
		$par_id   = $pr_res[0]->par_id;
		$par_qnty = $pr_res[0]->p_quantity;
		if( $par_qnty > $qnty )
		{
			$pur_rec = $this->db->query(" SELECT * FROM `purchase` where p_id = ".$p_id." AND par_id = ".$par_id." ORDER BY purchase.par_date ");
			$pur_rec = $pur_rec->result();
		// echo '<pre>';print_r($pur_rec);die;
		}else
		{
		$qry_c1 = $this->db->query(" SELECT * FROM purchase where p_id = ".$p_id." AND p_quantity != 0 ORDER BY par_date asc ");
		$result_data = $qry_c1->result(); 
		// echo '<pre>';print_r($result_data);die;
		}	
	}
		if(isset($w_result_data)) 
	  	{
		  	if(empty($w_result_data))
		  	{
		  		echo 'No weapon found';die;
		  	}
		  	else
		  	{
				$old_qnty = $w_result_data[0]->p_quantity;
		  		$par_id = $w_result_data[0]->par_id;
		  		 $new_total = $old_qnty - $qnty;
		  		//---------- Update purchase value here -------------//
		  		$update_pur = array(
		  				'p_quantity'  => $new_total
		  			);
		  		$this->db->where('par_id',$par_id);
		  		$this->db->update('purchase',$update_pur);
		  		// ---------- Update Product table -----------------//
		  		$this->db->where('p_id',$p_id);
		  		$res = $this->db->get('product')->result();
		  		$prod_qnty = $res[0]->p_quantity;
		  		$new_qnty = $prod_qnty - $qnty;
		  		$update_prod = array(
		  					'p_quantity'	=> $new_qnty
		  			);
		  		// echo '<pre>';print_r($update_prod);
		  		$this->db->where('p_id',$p_id);
		  		$this->db->update('product',$update_prod); 
		  		//-------------- Insert Item to sale Table -----------//
		  		$sale_data = array(
						'Per_id'	 => $per_id,
						'p_id'		 => $p_id,
						's_weapon_no'=>	$wea_no,
						's_quantity' => 1,
						's_price'	 => $this->input->post('rate'),
						'p_price'	 => $this->input->post('par_price'),
						's_total_price'=>$this->input->post('total'),
						'b_id'		 => 0,
						'status'	 => 1,
						's_date'	 =>	$this->input->post('sale_date'),   //date('Y-m-d'),
						'notes'		 => $this->input->post('details'),
						'trans_status'=>1,
						'par_id'	 => $par_id,
						'c_id'		 => $c_id
					);
				// echo '<pre>';print_r($sale_data);die;
				$this->db->insert('sale',$sale_data);
				return $per_id;	
			}
		}
//------------------------------------------------------------------------------------
	if( isset($pur_rec) && !empty($pur_rec) )
	{
			$database_qnty    = $pur_rec[0]->p_quantity;
			$total_insertable = $database_qnty - $qnty;
			$par_id           = $pur_rec[0]->par_id;

			$pur_data = array(
						'p_quantity'	=> $total_insertable
				);
			$this->db->where('par_id',$par_id);
			$this->db->update('purchase',$pur_data);
		// -----------------------------------------------------\
		$sale_data = array(
					'Per_id'	 	=> $this->input->post('per_id'),
					'p_id'		 	=> $p_id,
					's_weapon_no'	=>	'',
					's_quantity' 	=> $qnty,
					's_price'	 	=> $this->input->post('rate'),
					'p_price'	 	=> $this->input->post('par_price'),
					's_total_price' =>$this->input->post('total'),
					'b_id'		 	=> 0,
					'status'	 	=> 1,
					's_date'	 	=> $this->input->post('sale_date'),
					'notes'		 	=> $this->input->post('details'),
					'trans_status'  => 1,
					'par_id'	 	=> $par_id
						);
			$this->db->insert('sale',$sale_data);
		//----------------------------------------------------------------
		$this->db->where('p_id',$p_id);
		  		$res = $this->db->get('product')->result();
		  		$prod_qnty = $res[0]->p_quantity;
		  		$new_qnty = $prod_qnty - $p_qnty; 
		  		/*if($new_qnty > 0)
		  		{*/			  			
			  		$update_prod = array(
			  				'p_quantity'	=> $new_qnty
			  			);
			  		// echo '<pre>';print_r($update_prod);	
			  		$this->db->where('p_id',$p_id); 
			  		$this->db->update('product',$update_prod);
		//---------------------------------------------------------------
			$prod_name = $this->input->post('product_name');
					  	if($prod_name == 'Ammunition')
					  	{
					  		$no_fire = array(
					  				'c_fire'=>$this->input->post('quantity')
					  			);
					  		$this->db->where('c_id',$c_id);
					  		$this->db->update('checkin',$no_fire);
					  	}	  		 

	}
	else if(isset($result_data))
  	{

	  	if(empty($result_data))
	  	{
		  		$sale_data = array(
							'Per_id'	 => $this->input->post('per_id'),
							'p_id'		 => $p_id,
							's_weapon_no'=>	'',
							's_quantity' => $qnty,
							's_price'	 => $this->input->post('rate'),
							'p_price'	 => $this->input->post('par_price'),
							's_total_price'=>$this->input->post('total'),
							'b_id'		 => 0,
							'status'	 => 1,
							's_date'	 =>	$this->input->post('sale_date'),
							'notes'		 => $this->input->post('details'),
							'trans_status'=>1,
							'par_id'	 => ''
						);
					$this->db->insert('sale',$sale_data);
		  	}
		  	else
		  	{
		  		$data = [];
		  		$var = count($result_data);

		  		for ($i=0; $i <= $var; $i++) { 
		  			
		  			$value = $result_data[$i];

		  			$par_id       = $value->par_id;
			  		$old_all_qnty = $value->p_quantity;

			  	if( $qnty == 0 ){
			  		break;
			  	}	
			  		
		  		if( $old_all_qnty <= $qnty && $old_all_qnty != 0 )
		  		{
			  		$qnty    = $qnty - $old_all_qnty;
			  		$data[]  = $qnty;
			  		$new_pur_data = array(
						'p_quantity' => 0
						);
					$this->db->where('purchase.par_id',$par_id);
				    $update_pur = $this->db->update('purchase',$new_pur_data);
			// ----------------------------------------------------------------
			 		$sale_data = array(
							'Per_id'	 	=> $this->input->post('per_id'),
							'p_id'		 	=> $p_id,
							's_weapon_no'	=>	'',
							's_quantity' 	=> $old_all_qnty,
							's_price'	 	=> $this->input->post('rate'),
							'p_price'	 	=> $this->input->post('par_price'),
							's_total_price' =>$this->input->post('total'),
							'b_id'		 	=> 0,
							'status'	 	=> 1,
							's_date'	 	=>	$this->input->post('sale_date'),
							'notes'		 	=> $this->input->post('details'),
							'trans_status'  =>1,
							'par_id'	 	=> $par_id
						);
					// echo '<pre>';print_r($sale_data);die;
					$this->db->insert('sale',$sale_data);
		  		}
		  		else if( $qnty != 0 && $old_all_qnty != 0 ) 
		  		{
		  			$old_all_qnty  =  $old_all_qnty - $qnty;
		  			
		  			$new_pur_data = array(
						'p_quantity' => $old_all_qnty
						);

		  			$this->db->where('purchase.par_id',$par_id);
				    $update_pur = $this->db->update('purchase',$new_pur_data);
			// -------------------------------------------------------------------
			 		$sale_data = array(
							'Per_id'	 	=> $this->input->post('per_id'),
							'p_id'		 	=> $p_id,
							's_weapon_no'	=>	'',
							's_quantity' 	=> $qnty,
							's_price'	 	=> $this->input->post('rate'),
							'p_price'	 	=> $this->input->post('par_price'),
							's_total_price' =>$this->input->post('total'),
							'b_id'		 	=> 0,
							'status'	 	=> 1,
							's_date'	 	=>	$this->input->post('sale_date'),
							'notes'		 	=> $this->input->post('details'),
							'trans_status'  =>1,
							'par_id'	 	=> $par_id
						);
					// echo '<pre>';print_r($sale_data);die;
					$this->db->insert('sale',$sale_data);

					$qnty = 0;
		  		}
		  		else
		  		{	
		  			$sale_data = array(
							'Per_id'	 	=> $this->input->post('per_id'),
							'p_id'		 	=> $p_id,
							's_weapon_no'	=>	'',
							's_quantity' 	=> $qnty,
							's_price'	 	=> $this->input->post('rate'),
							'p_price'	 	=> $this->input->post('par_price'),
							's_total_price' =>$this->input->post('total'),
							'b_id'		 	=> 0,
							'status'	 	=> 1,
							's_date'	 	=>	$this->input->post('sale_date'),
							'notes'		 	=> $this->input->post('details'),
							'trans_status'  =>1,
							'par_id'	 	=> ''
						);
					$this->db->insert('sale',$sale_data);

		  		}

		  	}	

//---------------------------------- Insert Item to sale Table --------------------//
		  	if( !empty($result_data) )
			{
				$this->db->where('p_id',$p_id);
		  		$res = $this->db->get('product')->result();
		  		$prod_qnty = $res[0]->p_quantity;
		  		$new_qnty = $prod_qnty - $p_qnty; 
		  		/*if($new_qnty > 0)
		  		{*/			  			
			  		$update_prod = array(
			  				'p_quantity'	=> $new_qnty
			  			);
			  		// echo '<pre>';print_r($update_prod);	
			  		$this->db->where('p_id',$p_id);
			  		$this->db->update('product',$update_prod);

			//--------------------------------------------------------------------
			  	$prod_name = $this->input->post('product_name');
				  	if($prod_name == 'Ammunition')
				  	{
				  		$no_fire = array(
				  				'c_fire'=>$this->input->post('quantity')
				  			);
				  		$this->db->where('c_id',$c_id);
				  		$this->db->update('checkin',$no_fire);
				  	}	
			//--------------------------------------------------------------------  						
						return $per_id;
			  		/*}*/
			  	}
/*			  		else
			  		{
			  			echo 'Not enought Product';die;
			  		}*/

			  			
			}
		


  }

}
}