<?php
class Sales_m extends CI_Model
{

	function search_by_nic($nic=NULL)
	{
		$nic = $this->input->post('nic_no');
		// echo $nic;die;
		$this->db->select('*');
		$this->db->from('person p')
		->where('p.Per_cnic',$nic);
  		$this->db->join('membership m','p.Per_id = m.per_id');
		$qry    = $this->db->get();
		$result = $qry->result();
                //echo '<pre>';print_r($result);die;
                if( empty( $result ) ){
                    $this->db->select('*');
                    $this->db->from('person p')
                    ->where('p.Per_cnic',$nic);
//                    $this->db->join('membership m','p.Per_id = m.per_id');
                    $qry    = $this->db->get();
                    $result = $qry->result();

                }
                if(!empty($result) )
		{
			return $result;
		}
		else
		{
			return NULL;
		}

	}

	function insert_sale_data()
	{
// --------------------------- Update purchase Quantity data ------------------//
	$p_id = $this->input->post('p_id');
	$qnty = $this->input->post('quantity');
	$p_qnty = $this->input->post('quantity');
	$wea_no = $this->input->post('weapon_no_1');
	// echo $qnty .'    '. $p_id; die;
	if( isset($wea_no) )
	{

	for ($i=1; $i<=$qnty ; $i++)
  	{
    	$weapon_no[] = $this->input->post('weapon_no_'.$i);

		$qry_c1 = $this->db->query(" SELECT * FROM purchase where p_id = ".$p_id." AND p_quantity != 0 AND par_weapon_no IN ('" . implode("','", $weapon_no) . "') ORDER BY purchase.par_date asc ");
		$w_result_data = $qry_c1->result();

	}
	// echo '<pre>';print_r( $w_result_data);die;
	}
	else
	{
		$chk_rec  = $this->db->query(" SELECT * FROM purchase where p_id = ".$p_id." AND p_quantity != ".$qnty." ORDER BY par_date asc ");
		$pr_res   = $chk_rec->result();
		$par_id   = $pr_res[0]->par_id;
		$par_qnty = $pr_res[0]->p_quantity;
		if( $par_qnty > $qnty )
		{
			$pur_rec = $this->db->query(" SELECT * FROM `purchase` where p_id = ".$p_id." AND par_id = ".$par_id." ORDER BY purchase.par_date asc ");
			$pur_rec = $pur_rec->result();
		// echo '<pre>';print_r($result_qnty);die;
		}else
		{
		// $qry_c1 = $this->db->query(" SELECT * FROM purchase where p_id = ".$p_id." AND p_quantity > ".$qnty." LIMIT 1 ");
		$qry_c1 = $this->db->query(" SELECT * FROM purchase where p_id = ".$p_id." AND p_quantity != 0 ORDER BY par_date asc ");
		$result_data = $qry_c1->result();
	   }
	  // echo '<pre>';print_r($result_data);die;
	}
		if(isset($w_result_data))
		{

		if(!empty($w_result_data))
		{
			foreach ($w_result_data as $value)
			{
				$old_qnty = $value->p_quantity;
				$par_id = $value->par_id;
				$new_total = $old_qnty - 1;
				// echo $new_total;die;
			$new_pur = array(
						'p_quantity'=> $new_total
				);
// --------------------------------- UPDATE PURCHASE TABLE ---------------------- //

			$this->db->where('purchase.par_id',$par_id);
		    $update_pur = $this->db->update('purchase',$new_pur);

// -------------------------------- INSERT SALE TABLE -------------------------- //
		    $sale_data = array(
				'Per_id'	 => $this->input->post('per_id'),
				'p_id'		 => $p_id,
				's_weapon_no'=>	$value->par_weapon_no,
				's_quantity' => 1,
				's_price'	 => $this->input->post('rate'),
				'p_price'	 => $this->input->post('par_price'),
				's_total_price'=>$this->input->post('total'),
				'b_id'		 => 0,
				'status'	 => 1,
				's_date'	 =>	$this->input->post('sale_date'),
				'notes'	 	 => $this->input->post('details'),
				'trans_status'=>1,
				'par_id'	 => $par_id
				);
			// echo '<pre>';print_r($sale_data);die;
			$this->db->insert('sale',$sale_data);

// ------------------------------- END INSERTION SALE TABLE -------------------- //
			}
		}
		else
		{
			$this->session->set_flashdata('msg','Item not found in store');
      	    $this->session->set_flashdata('type','danger');
			redirect('sale/index');
			// echo 'Not found'.'<br>';die;
		}
	}

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

	}
	elseif(isset($result_data))
	{
		if( !empty($result_data) )
		  {
		  	$data = [];
		  	/*foreach ($result_data as $value) {*/
		  		$var = count($result_data);

		  		for ($i=0; $i <= $var; $i++)
		  		{

		  			$value = $result_data[$i];

		  			$par_id       = $value->par_id;
			  		$old_all_qnty = $value->p_quantity;

			  	if( $qnty == '0' ){
			  		break;
			  	}

		  		if( $old_all_qnty <= $qnty && $old_all_qnty != 0 ){
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
							'par_id'	 => $par_id
						);
					$this->db->insert('sale',$sale_data);
					$qnty = 0;
		  		}

		  		else
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

		  	}

		  }

		else
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
			//--------------------------------------------------------
			$this->db->where('p_id',$p_id);
			$qry_p_data = $this->db->get('product');
			$prod_data = $qry_p_data->row_array();
			$prod_qnty = $prod_data['p_quantity'];
			$prod_t_qnty = $prod_qnty - $p_qnty;

		}

	}

//---------------- GET DATA FROM PRODUCT TABLE FOR MINUS QUANTITY VALUES--------- //

			$this->db->where('p_id',$p_id);
			$qry_p_data = $this->db->get('product');
			$prod_data = $qry_p_data->row_array();
			$prod_qnty = $prod_data['p_quantity'];
			$prod_t_qnty = $prod_qnty - $p_qnty;
		//---------------------------------------------
			$new_prod_data = array(
					'p_quantity' =>$prod_t_qnty
				);
			$this->db->where('p_id',$p_id);
			$this->db->update('product',$new_prod_data);


	// ----------------------- UPDATE PRODUCT TABLE QUANTITY -------------------- //
	if( !empty($w_result_data ) )
		{
			$new_prod_data = array(
					'p_quantity' =>$prod_t_qnty
				);
			$this->db->where('p_id',$p_id);
			$this->db->update('product',$new_prod_data);
		}
	if( !empty( $result_data ) )
		{
			$new_prod_data = array(
					'p_quantity' =>$prod_t_qnty
				);
			// echo '<pre>';print_r($new_prod_data);die;
			$this->db->where('p_id',$p_id);
			$this->db->update('product',$new_prod_data);
		}

// --------------------------- End Update Product Data ------------------------ //

}


function insert_new_sale()
{
	//----------------------- PERSON TABLE DATA INSERTION ---------------//
	// echo $this->input->post('name');die;
	$per_data = array(
			'Per_name'  	=> trim($this->input->post('name')),
			'Per_cnic'		=> trim($this->input->post('cnic')),
			'Per_number'	=> trim($this->input->post('number')),
			'Per_address'	=> trim($this->input->post('address')),
			'Per_license_no'=> trim($this->input->post('l_no')),
			'Per_type'		=> 's',
			'Per_date'		=> $this->input->post('sale_date') //date('Y-m-d')
		);
	// echo '<pre>';print_r($per_data);die;
// --------------------------- Update purchase Quantity data ------------------//
	$p_id = $this->input->post('p_id');
	$qnty = $this->input->post('quantity');
	$p_qnty = $this->input->post('quantity');
	$wea_no = $this->input->post('weapon_no_1');
	// echo $wea_no;die;
	// echo $qnty .'    '. $p_id; die;
	if( isset($wea_no) )
	{

	for ($i=1; $i<=$qnty; $i++)
  	{
    	$weapon_no[] = $this->input->post('weapon_no_'.$i);
    	// echo '<pre>';print_r($weapon_no);
		$qry_c1 = $this->db->query(" SELECT * FROM `purchase` where p_id = ".$p_id." AND p_quantity != 0 AND par_weapon_no IN ('" . implode("','", $weapon_no) . "') ORDER BY purchase.par_date asc ");
		$w_result_data = $qry_c1->result();

	}
	// echo '<pre>';print_r( $w_result_data ); die;
	}
	else
	{
		$chk_rec  = $this->db->query(" SELECT * FROM purchase where p_id = ".$p_id." AND p_quantity != ".$qnty." ORDER BY par_date asc ");
		$pr_res   = $chk_rec->result();
		$par_id   = $pr_res[0]->par_id;
		$par_qnty = $pr_res[0]->p_quantity;
		if( $par_qnty > $qnty )
		{
			$pur_rec = $this->db->query(" SELECT * FROM `purchase` where p_id = ".$p_id." AND par_id = ".$par_id." ORDER BY purchase.par_date asc ");
			$pur_rec = $pur_rec->result();
		// echo '<pre>';print_r($result_qnty);die;
		}else
		{
		$qry_c1 = $this->db->query(" SELECT * FROM `purchase` where p_id = ".$p_id." AND p_quantity != 0 ORDER BY par_date asc ");
		$result_data = $qry_c1->result();
	}
	}

	// echo'<pre>';print_r($result_data);die;
	if( !empty($w_result_data) || !empty($result_data) || !empty($pur_rec) )
	{
		//-------------- INSERT DATA IN PERSON TABLE HERE---------------------//

				$this->db->insert('person',$per_data);
				$per_id = $this->db->insert_id();
			    // echo '<pre>';print_r($per_data);die;

		// ------------- INSERT DATA IN MEMBERSHIP TABLE -------------------//
			$mem_data = array
				(
					'per_id'		=> $per_id,
					'm_type'		=> $this->input->post('m_type'),
					'm_date'		=> $this->input->post('sale_date') //date('Y-m-d')
				);

				$this->db->insert('membership',$mem_data);
				// echo '<pre>';print_r($mem_data);die;
	}
	else
	{
		$this->session->set_flashdata('msg','Not Enough Stock');
      	$this->session->set_flashdata('type','danger');
		redirect('sale/index');
		// echo 'Not enough Items';die;
	}


	if(!empty($w_result_data))
		{
			foreach ($w_result_data as $value)
			{
				$old_qnty = $value->p_quantity;
				$par_id = $value->par_id;
				$new_total = $old_qnty - 1;
				// echo $new_total;die;
			$new_pur = array(
						'p_quantity'=> $new_total
				);
// --------------------------------- UPDATE PURCHASE TABLE ---------------------- //

			$this->db->where('purchase.par_id',$par_id);
		    $update_pur = $this->db->update('purchase',$new_pur);

// -------------------------------- INSERT SALE TABLE -------------------------- //
		    $sale_data = array(
				'Per_id'	 => $per_id,
				'p_id'		 => $p_id,
				's_weapon_no'=>	$value->par_weapon_no,
				's_quantity' => 1,
				's_price'	 => trim($this->input->post('rate')),
				'p_price'	 => trim($this->input->post('par_price')),
				's_total_price'=>trim($this->input->post('total')),
				'b_id'		 => 0,
				'status'	 => 1,
				's_date'	 =>	trim($this->input->post('sale_date')), //date('Y-m-d'),
				'notes'	 	 => trim($this->input->post('details')),
				'trans_status'=>1,
				'par_id'	 => $par_id
				);
			// echo '<pre>';print_r($sale_data);die;
			$this->db->insert('sale',$sale_data);
			return $per_id;
			}
		}
// ------------------------------- END INSERTION SALE TABLE -------------------- //
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
	// -------------------------------------------------------------
	$sale_data = array(
					'Per_id'	 			=> $per_id,
					'p_id'		 			=> $p_id,
					's_weapon_no'			=>	'',
					's_quantity' 			=> $qnty,
					's_price'	 			=> trim($this->input->post('rate') ),
					'p_price'	 			=> trim($this->input->post('par_price') ),
					's_total_price' 		=> trim($this->input->post('total') ),
					'b_id'		 			=> 0,
					'status'	 			=> 1,
					's_date'	 			=>	trim($this->input->post('sale_date') ),
					'notes'		 			=> trim($this->input->post('details') ),
					'trans_status' 			=> 1,
					'par_id'	 			=> $par_id
				);
		$this->db->insert('sale',$sale_data);

}
			else if(isset($result_data))
			{
				if( !empty($result_data) )
				  {
					$data = [];

		  		$var = count($result_data);

		  		for ($i=0; $i <= $var; $i++) {

		  			$value = $result_data[$i];

		  			$par_id       = $value->par_id;
			  		$old_all_qnty = $value->p_quantity;

			  	if( $qnty == '0' ){
			  		break;
			  	}

		  		if( $old_all_qnty <= $qnty && $old_all_qnty != 0 ){
			  		$qnty    = $qnty - $old_all_qnty;
			  		$data[]  = $qnty;
			  		$new_pur_data = array(
						'p_quantity' => 0
						);
					$this->db->where('purchase.par_id',$par_id);
				    $update_pur = $this->db->update('purchase',$new_pur_data);
			// ----------------------------------------------------------------
			 		$sale_data = array(
									'Per_id'	 	=> $per_id,
									'p_id'		 	=> $p_id,
									's_weapon_no'	=>	'',
									's_quantity' 	=> trim($old_all_qnty ),
									's_price'	 	=> trim($this->input->post('rate') ),
									'p_price'	 	=> trim($this->input->post('par_price') ),
									's_total_price' => trim($this->input->post('total') ),
									'b_id'		 	=> 0,
									'status'	 	=> 1,
									's_date'	 	=> trim($this->input->post('sale_date') ),
									'notes'		 	=> trim($this->input->post('details') ),
									'trans_status'  => 1,
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
									'Per_id'	 	=> $per_id,
									'p_id'		 	=> $p_id,
									's_weapon_no'	=>	'',
									's_quantity' 	=> trim($qnty),
									's_price'	 	=> trim($this->input->post('rate')),
									'p_price'	 	=> trim($this->input->post('par_price')),
									's_total_price' => trim($this->input->post('total')),
									'b_id'		 	=> 0,
									'status'	 	=> 1,
									's_date'	 	=> trim($this->input->post('sale_date')),
									'notes'		 	=> trim($this->input->post('details')),
									'trans_status'  => 1,
									'par_id'	 	=> $par_id
								);
					// echo '<pre>';print_r($sale_data);die;
					$this->db->insert('sale',$sale_data);

					$qnty = 0;
		  		}
		  		else
		  		{
		  			$sale_data = array(
									'Per_id'	 	=> $per_id,
									'p_id'		 	=> $p_id,
									's_weapon_no'	=>	'',
									's_quantity' 	=> trim($qnty ),
									's_price'	 	=> trim($this->input->post('rate') ),
									'p_price'	 	=> trim($this->input->post('par_price') ),
									's_total_price' => trim($this->input->post('total') ),
									'b_id'		 	=> 0,
									'status'	 	=> 1,
									's_date'	 	=> trim($this->input->post('sale_date') ),
									'notes'		 	=> trim($this->input->post('details') ),
									'trans_status'  => 1,
									'par_id'	 	=> ''
								);
					$this->db->insert('sale',$sale_data);

		  		}

		  	}

	}


				else
				{
					$sale_data = array(
							'Per_id'	 	=> $this->input->post('per_id'),
							'p_id'		 	=> $p_id,
							's_weapon_no'	=>	'',
							's_quantity' 	=> trim($qnty),
							's_price'	 	=> trim($this->input->post('rate')),
							'p_price'	 	=> trim($this->input->post('par_price')),
							's_total_price' => trim($this->input->post('total')),
							'b_id'		 	=> 0,
							'status'	 	=> 1,
							's_date'	 	=>	trim($this->input->post('sale_date')),
							'notes'		 	=> trim($this->input->post('details')),
							'trans_status'  => 1,
							'par_id'	 	=> ''
						);
					$this->db->insert('sale',$sale_data);
				}
		}
		//-----------------------------------------------------------
		// echo '<pre>';print_r($new_pur);die;
//---------------- GET DATA FROM PRODUCT TABLE FOR MINUS QUANTITY VALUES--------- //

			$this->db->where('p_id',$p_id);
			$qry_p_data = $this->db->get('product');
			$prod_data = $qry_p_data->row_array();
			$prod_qnty = $prod_data['p_quantity'];
			$prod_t_qnty = $prod_qnty - $p_qnty;

	// ----------------------- UPDATE PRODUCT TABLE QUANTITY -------------------- //
	if( !empty($w_result_data ) )
	 {
		$new_prod_data = array(
				'p_quantity' =>$prod_t_qnty
			);
		$this->db->where('p_id',$p_id);
		$this->db->update('product',$new_prod_data);
	 }
	if( !empty( $result_data ) )
	 {
		$new_prod_data = array(
				'p_quantity' =>$prod_t_qnty
			);
		// echo '<pre>';print($new_prod_data);die;
		$this->db->where('p_id',$p_id);
		$this->db->update('product',$new_prod_data);
	 }

return $per_id;
// --------------------------- End Update Product Data ------------------------ //

  }

  function saled_records($per_id,$c_id=NULL)
  {

  	$this->db->select('*');
  	$this->db->from('sale');
  	$this->db->where('Per_id',$per_id);
  	$this->db->where('trans_status',1);
  	$this->db->join('product prod','sale.p_id = prod.p_id');
  	// $this->db->join('purchase','prod.p_id=purchase.p_id');
  	$qry = $this->db->get();
  	return $qry->result();
  }

// ---------------------- Add sale to existing order -------------------------//

  function add_sale()
  {
  	$p_id   = $this->input->post('p_id');
	$qnty   = $this->input->post('quantity');
	$wea_no = $this->input->post('weapon_no_1');
	$c_id   = $this->input->post('c_id');
	// echo $c_id;die;
	if(isset($c_id))
	{
		$c_id = $c_id;
	}
	else
	{
		$c_id = '';
	}

  	// $per_id = $this->input->post('per_id');
  	// echo $p_id.'    '.$qnty;die;
  	if( $this->input->post('per_id') )
  	{
  		$per_id = $this->input->post('per_id');
  	}
  	elseif($this->input->post('old_per_id') )
  	{
  		$per_id = $this->input->post('old_per_id');
  	}

  	if( isset($wea_no) )
  	{
  		$qry = $this->db->query(" SELECT * FROM `purchase` where purchase.p_id = ".$p_id." AND purchase.p_quantity = 1 AND purchase.par_weapon_no = '$wea_no' ");
  		$wea_res = $qry->result();
  		// echo '<pre>';print_r($wea_res);die;
  	}
  	else
  	{
  		$qry_1 = $this->db->query(" SELECT * FROM purchase where p_id = ".$p_id." ORDER BY par_id asc ");
  		$res = $qry_1->result();
  	}
  	// echo '<pre>';print_r($res);die;


  	if(isset($res))
  	{

  	if( !empty($res) )
  	{
  		// echo '<pre>';print_r($res);die;
  		$old_qnty = $res[0]->p_quantity;
  		$par_id = $res[0]->par_id;
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
  		$this->db->where('p_id',$p_id);
  		$this->db->update('product',$update_prod);
  		//-------------- Insert Item to sale Table -----------//
  		$sale_data = array(
				'Per_id'	 => $per_id,
				'p_id'		 => $p_id,
				's_weapon_no'=>	'',
				's_quantity' => $qnty,
				's_price'	 => $this->input->post('rate'),
				'p_price'	 => $this->input->post('par_price'),
				's_total_price'=>$this->input->post('total'),
				'b_id'		 => 0,
				'status'	 => 1,
				's_date'	 =>	date('Y-m-d'),
				'notes'		 => $this->input->post('details'),
				'trans_status'=>1,
				'par_id'	 => $par_id,
				'c_id'		 => $c_id
			);
		// echo '<pre>';print_r($sale_data);die;
		$this->db->insert('sale',$sale_data);
  	}else
  	{
  		/*$this->session->set_flashdata('msg','Sorry Not enought stock');
      	$this->session->set_flashdata('type','danger');
		redirect('sale/index');*/
  		echo 'Sorry Not enought Weapons';die;

  	}
  }
//--------------------- Result with Weapon Number ---------------------------//
  	if(isset($wea_res))
  	{

  	if(empty($wea_res))
  	{
/*  		$this->session->set_flashdata('msg','Sorry Product not found in stock');
      	$this->session->set_flashdata('type','danger');
		redirect('sale/index');*/
  		echo 'Sorry Product not found in stock';die;
  	}
  	else
  	{
  		// echo "<pre>";print_r($wea_res);die;
  		$old_qnty = $wea_res[0]->p_quantity;
  		$par_id = $wea_res[0]->par_id;
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
				's_date'	 =>	date('Y-m-d'),
				'notes'		 => $this->input->post('details'),
				'trans_status'=>1,
				'par_id'	 => $par_id,
				'c_id'		 => $c_id
			);
		// echo '<pre>';print_r($sale_data);die;
		$this->db->insert('sale',$sale_data);
  	}
  }
}

// ---------------------------------------------------------------------------//

// ----------------------------- DELETE SALE -------------------------------- //

function delete_sale($s_id,$qnty)
{
	// echo $s_id;die;
	$this->db->where('s_id',$s_id);
	$res = $this->db->get('sale')->result();
	// echo '<pre>';print_r($res);die;
	$par_id = $res[0]->par_id;
	$p_id = $res[0]->p_id;
	//----------- Add Quantity to Purchase -----------//
	$this->db->where('par_id',$par_id);
	$res_p = $this->db->get('purchase')->result();
	$old_qnty = $res_p[0]->p_quantity;
	$new_qnty = $old_qnty + $qnty;
	$pur_data = array(
			'p_quantity'=> $new_qnty
		);
	$this->db->where('par_id',$par_id);
	$this->db->update('purchase',$pur_data);
	// ---------- Add Quantity to Product -----------//
	$this->db->where('p_id',$p_id);
	$res_p = $this->db->get('product')->result();
	$old_qnty = $res_p[0]->p_quantity;
	$new_p_qnty = $old_qnty + $qnty;
	$prod_data = array(
			'p_quantity'=> $new_p_qnty
		);
	$this->db->where('p_id',$p_id);
	$this->db->update('product',$prod_data);
	// -------------- Delete from SALE table --------//
	$this->db->where('s_id',$s_id);
	$this->db->delete('sale');
}

function get_data_update($per_id,$s_id)
{
	$this->db->from('sale s');
	$this->db->where('s.s_id',$s_id);
	$res = $this->db->get()->result();
	$per_id = $res[0]->Per_id;
	$this->db->from('person p');
	$this->db->where('p.Per_id',$per_id);
	$this->db->where('s.s_id',$s_id);
	$this->db->join('sale s','s.Per_id = p.Per_id');
	$this->db->join('membership m','p.Per_id =m.Per_id');
	$this->db->join('product prod','prod.p_id = s.p_id');
	$this->db->join('purchase par','par.par_id = s.par_id');
	// echo '<pre>';print_r($res);
	$res_1 = $this->db->get()->result();
	// echo '<pre>';print_r($res_1);die;
	return $res_1;
}

// ---------------------- UPDATE SALE ---------------//
function update_sale()
{
	$p_id = $this->input->post('p_id');
	$qnty = $this->input->post('quantity');
	$wea_no = $this->input->post('weapon_no_1');
  	$per_id = $this->input->post('per_id');
  	// echo $p_id.'    '.$qnty;die;

  	if(isset($wea_no))
  	{
  		$qry = $this->db->query(" SELECT * FROM `purchase` where purchase.p_id = ".$p_id." AND purchase.p_quantity = 1 AND purchase.par_weapon_no = '$wea_no' ");
  		$qry_w = $qry->num_rows();
  		$wea_res = $qry_w;
  		// echo '<pre>';print_r($wea_res);
  	}
  	else
  	{
  		$qry_1 = $this->db->query(" SELECT * FROM purchase where p_id = ".$p_id." AND p_quantity > ".$qnty." LIMIT 1 ");
  		$res = $qry_1->num_rows();
  		// echo '<pre>';print_r($res);
  	}

  	if(isset($res))
  	{

  	if($res == 1 )
  	{
  		// echo 'Data Found';
  		return 1;
  	}
  	else
  	{
  		// echo 'No data Found!!!!';
  		return 0;
  		//echo '<pre>';print_r($res);
  	}

  	}

  	////////////////////////////////////
  	if(isset($wea_res))
  	{

  	if($wea_res==1 )
  	{
  		// echo 'Data Found !!!';
  		return 1;
  	}
  	else
  	{
  		// echo 'No data Found';
  		return 0;
  		 // echo '<pre>';print_r($wea_res);
  	}

  	}
}

// --------------------------- Reports of Sale Data ----------------------------//

	function sales_bill($per_id,$b_id=NULL)
	{
		// -------------------- Saved Bill Data ----------//
		$this->db->where('per_id',$per_id);
		$this->db->where('c_id',$b_id);
		$this->db->limit(1);
		$this->db->order_by('b_id','desc');
		$result['bill_data']= $this->db->get('billinfo')->result();
		//--------------- Get Saled Data --------------//
		$this->db->from('sale')
		->where('sale.per_id',$per_id)
  		->group_start()
  		->where('sale.trans_status',1)
  		->group_end();
		$this->db->join('product pr','sale.p_id = pr.p_id');
		$qry = $this->db->get();
		$result['sale_data'] = $qry->result();
		//------------- Sale after Save ---------------//
		if( empty( $result['sale_data'] ) ){
			$this->db->from('sale')
			->where('sale.per_id',$per_id)
	  		->group_start()
	  		->where('sale.sale_save_status',1)
	  		->where('sale.b_id',$b_id)
	  		//->where('sale.b_id',$b_id)
	  		->group_end();
			$this->db->join('product pr','sale.p_id = pr.p_id');
			$qry = $this->db->get();
			$result['saved_sale_data'] = $qry->result();
		}else{
			$result['saved_sale_data'] = [];
		}
		//------------- Get Person details -----------//
		$this->db->from('person p');
		$this->db->where('p.Per_id',$per_id);
  		$this->db->join('sale','p.Per_id = sale.Per_id');
  		$this->db->limit(1);
		$qry_1 = $this->db->get();
		$result['persondata'] = $qry_1->result();
		 //echo '<pre>';print_r($result);die;
		return $result;
	}

	function save_bill($per_id)
	{
            
		$bill_id = $this->input->post('a_bill_id');
		$total 		 = $this->input->post('total');
		$rect  		 = $this->input->post('rectification');
		$c_id            = $this->input->post('c_id');
		$tax		 = $this->input->post('tax');
		$bill_extra	 = $this->input->post('extra');

		//$this->db->where('b_id',$bill_id);
//		$b_data = $this->db->get('billinfo')->result();
		$b_data = [];
		// echo '<pre>';print_r($b_data);die;
		if( !empty( $b_data ) )
		{
			echo 'Bill Already exist';die;
		}else
		{
			// echo "Not exist";die;
		if($bill_extra) {$bill_extra = $bill_extra; }else{ $bill_extra = ''; }

		if($tax) {$tax = $tax;}else{$tax =''; }

		if($c_id){ $c_id = $c_id;}else{$c_id = '';}

		$tax_percent = ($tax/100);
		$tax 		 = $tax_percent * $total;
		$grand_total = floor($total - $rect + $tax);
		// $grand_total = $total + $rect;
                                if( $this->input->post('paid') == 1 ){
                                    $sata_variable = 1;
                                }else{
                                   $sata_variable = 0;
                                }
				$bill_data = array(
				'b_details'		=>$this->input->post('details'),
				'b_quantity'	=>$this->input->post('qnty'),
				'b_rates'		=>$this->input->post('rate'),
				'b_amount'		=>$this->input->post('amount'),
				'b_rectification'=>$this->input->post('rectification'),
				'b_grandtotal'	=>$grand_total,
				'c_id'			=>$c_id,
				'b_status'		=>1,
				'per_id'		=> $per_id,
				'bill_date'		=> $this->input->post('bill_date'),
				'bill_pay_status' => $sata_variable,
				'bill_tax'		=> $tax,
				'bill_extra'	=> ''
			);
				// echo '<pre>';print_r($bill_data);die;
		//-----------------------------------------------
		$this->db->where($bill_data);
		$qry = $this->db->get('billinfo');
		$this->db->insert('billinfo',$bill_data);
		$bill_id = $this->db->insert_id();
		return $bill_id;
		
	}

	}

	function saled_data($per_id)
	{
		$this->db->from('sale s');
		$this->db->where('s.Per_id',$per_id);
		$this->db->where('s.b_id',0);
		$this->db->where('s.trans_status',1);
		$this->db->join('person p','p.Per_id = s.Per_id');
		$result = $this->db->get()->result();
		return $result;
	}
        
        public function updatenofires( $data, $b_id ){  
            
            $quantity = 0;
            foreach ( $data['sale_data'] as $sale ){
                if( $sale->p_name == 'Ammunition' ){
                    $quantity += $sale->s_quantity;
                }
            }
            $no_fire = array(
                            'c_fire' => $quantity
                    );
            $this->db->where('c_id',$b_id);
            $this->db->update('checkin',$no_fire);
            return 1;
        }

}
?>
