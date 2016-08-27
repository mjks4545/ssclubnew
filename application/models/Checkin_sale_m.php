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
	
	if(isset($wea_no))
	{
		$qry_c1 = $this->db->query(" SELECT * FROM purchase where p_id = 7 AND p_quantity != 0 AND par_weapon_no ='$wea_no' ");
		$w_result_data = $qry_c1->result();	
		// echo '<pre>';print_r($w_result_data);
	}
	else
	{
		$qry_c1 = $this->db->query(" SELECT * FROM purchase where p_id = ".$p_id." AND p_quantity > ".$qnty." LIMIT 1 ");
		$result_data = $qry_c1->result();
		// echo '<pre>';print_r($result_data);die;
	}

		if(isset($w_result_data))
	  	{

		  	if(empty($w_result_data))
		  	{
		  		echo 'No wea data';die;
				/*$this->session->set_flashdata('msg','Sorry Product not found in stock');
		      	$this->session->set_flashdata('type','danger');
				redirect('sale/index');*/
		  		// echo 'Sorry Product not found in stock';die;
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
		  		// echo'<pre>';print_r($update_pur);
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

		if(isset($result_data))
	  	{

		  	if(empty($result_data))
		  	{
		  		// echo '<pre>';print_r($result_data);die;
		  		echo 'No data in stock';die;
/*		  		$this->session->set_flashdata('msg','Sorry Product not found in stock');
		      	$this->session->set_flashdata('type','danger');
				redirect('sale/index');*/
		  		// echo 'Sorry Product not found in stock';die;
		  	}
		  	else
		  	{
					
			  		// ---------- Update Product table -----------------//
			  		$this->db->where('p_id',$p_id);
			  		$res = $this->db->get('product')->result();
			  		$prod_qnty = $res[0]->p_quantity;
			  		$new_qnty = $prod_qnty - $qnty;
			  		if($new_qnty > 0)
			  		{			  			
				  		$update_prod = array(
				  				'p_quantity'	=> $new_qnty
				  			);
				  		// echo '<pre>';print_r($update_prod);	
				  		$this->db->where('p_id',$p_id);
				  		$this->db->update('product',$update_prod);

				  		//---------- Update purchase value here -------------//
					  	$old_qnty  = $result_data[0]->p_quantity;
				  		$par_id    = $result_data[0]->par_id;
				  		$new_total = $old_qnty - $qnty;
				  		$update_pur = array(
				  				'p_quantity'  => $new_total
				  			);
				  			// echo'<pre>';print_r($update_pur);
				  		$this->db->where('par_id',$par_id);
				  		$this->db->update('purchase',$update_pur);

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
									's_date'	 =>	$this->input->post('sale_date'),//date('Y-m-d'),
									'notes'		 => $this->input->post('details'),
									'trans_status'=>1,
									'par_id'	 => $par_id,
									'c_id'		 => $c_id	
								);
							// echo '<pre>';print_r($sale_data);die;
							$this->db->insert('sale',$sale_data);	
							return $per_id;
			  		}	
			  		else
			  		{
			  			echo 'Not enought Product';die;
			  		}
			  			
			}
		}


  }

}