<?php

class Product_m extends CI_Model
{


    //---------------------------------------------------------
    function addproductpro()
    {
        $pname = $this->input->post("name");
        $ptype = $this->input->post("type");
        $pmodel = $this->input->post("model");
        $pcode = $this->input->post("code");
        $pquantity = '';
        $pnote = '';
      $inser_arr=array(
          "p_name"  =>$pname,
          "p_type"  =>$ptype,
          "p_model" =>$pmodel,
          "p_code"  =>$pcode,
          "p_quantity"=>$pquantity,
          "notes"   =>$pnote,
          "p_date"  => date("Y-m-d")
      );
        //--- insert the product
        $insert = $this->db->insert("product",$inser_arr);
       if($insert)
       { 
           return 1;
       } 
        else{
            return 0;
        }
    }

    function purchaseproduct()
    {
      $company_name = $this->input->post('company_name');
      $this->db->select('*');
      $this->db->from('person p');
      $this->db->where('p.Per_type','p');
      $this->db->where('p.Per_name',$company_name);
      $data = $this->db->get()->result();
      if($data)
      {
        return $data;
      }
      else{
        return 0;
      }
    }

    function get_products()
    {
      $data = $this->db->get('product');
      return $data->result();
    }

    function get_product_cat($prod_cat)
    {
      $this->db->from('product');
      $this->db->where('p_name',$prod_cat);
      $data = $this->db->get()->result();
      return $data;
    }

    function get_product_type($product,$type)
    {
      $this->db->select('*');
      $this->db->from('product');
      $this->db->where('p_name',$product);
      $this->db->where('p_type',$type);
      $data = $this->db->get()->result();
      return $data;
    }

    function get_product_code($p,$t,$m)
    {
      $this->db->select('product.*,purchase.par_id,purchase.par_weapon_no,purchase.p_quantity AS par_quantity,purchase.par_price,purchase.sale_price');
      $this->db->from('product');
      /*->where('p_name',$p)
      ->group_start()
      ->where('p_type',$t)
      ->or_where('p_model',$m)
      ->group_end();  */    
      $this->db->where('product.p_name',$p);
      $this->db->where('product.p_type',$t);
      $this->db->where('product.p_model',$m);
      $this->db->join('purchase','product.p_id = purchase.p_id','left');
      $data = $this->db->get()->result();
      return $data;
    }

    function get_code_search_data($code)
    {
        $this->db->select('product.*,purchase.par_id,purchase.par_weapon_no,purchase.p_quantity AS par_quantity,purchase.par_price,purchase.sale_price');
        $this->db->from('product');
        $this->db->order_by('purchase.par_id','desc');
        $this->db->limit(1);
        $this->db->where('p_code',$code);
        $this->db->join('purchase','product.p_id = purchase.p_id','left');
        $data = $this->db->get()->result();
        return $data;
    }
// ----------------------- Get product by inserting weapon Number -------------//
    function get_product_by_wea_no($wea_no)
    {
        $this->db->select('product.*,purchase.par_id,purchase.par_weapon_no,purchase.p_quantity AS par_quantity,purchase.par_price,purchase.sale_price');
        $this->db->from('product');
        $this->db->where('purchase.par_weapon_no',$wea_no);
        $this->db->where('purchase.p_quantity >',0);
        $this->db->join('purchase','product.p_id = purchase.p_id');
        $data = $this->db->get()->result();
        // echo '<pre>';print_r($data);die;
        return $data;

    }
//----------------------------------------------------------------------------//

    function insert_purchase_data()
    {
      $p_id = $this->input->post('prod_id');
      $s_q = $this->input->post('stock_weapon_no');
      $n_q = $this->input->post('qnty');
      $weap_no = $this->input->post('weapon_no_1');
      //----------- Get product value to add new values ----------------------//
      $this->db->where('p_id',$p_id);
      $qry_1_0 = $this->db->get('product')->result();
      // echo'<pre>';print_r($qry_1_0);die;
      $old_qnty = $qry_1_0[0]->p_quantity;  
       
      $new_total = $old_qnty+$n_q;
      $prod_data = array(
              'p_quantity'=>$new_total
      );
      // echo '<pre>';print_r($prod_data);die;
        if( !empty($prod_data) )
        {
          $this->db->where('p_id',$p_id);
          $this->db->update('product',$prod_data);
        }

//----------------- END Updation of Product table ---------------------//
for ($i=1; $i<=$n_q ; $i++) 
  {
    $wea_no = $this->input->post('weapon_no_'.$i);
    if(!empty($wea_no))
    {
            $purchase_data = array(
                'p_id'             => $p_id,
                'par_weapon_no'    => $wea_no,
                'Per_id'           => $this->input->post('per_id'),
                'p_quantity'       => 1,
                'par_price'        => $this->input->post('pur_price'),
                'sale_price'       => $this->input->post('sal_price'),
                'remarks'          => $this->input->post('remarks'),
                'par_date'         => $this->input->post('par_date')
              );
            $result[] = $purchase_data; 
         // $pur_insert = $this->db->insert_batch('purchase',$res_data);
        }
    }
    if( !empty($wea_no) )
    {
        $res_data = $result;
        // echo '<pre>';print_r($res_data);die;  
        $this->db->insert_batch('purchase',$res_data);
    }

  
//------------------------ INSERT WITHOUT WEAPON NUMBER -----------------------//
  if( !isset($weap_no) )
  {
    $purchase_s_data = array(
              'p_id'             => $p_id,
              'par_weapon_no'    => '',
              'Per_id'           => $this->input->post('per_id'),
              'p_quantity'       => $n_q,
              'par_price'        => $this->input->post('pur_price'),
              'sale_price'       => $this->input->post('sal_price'),
              'remarks'          => $this->input->post('remarks'),
              'par_date'         => $this->input->post('par_date')
            );
          // echo '<pre>';print_r($purchase_s_data);die; 
           $this->db->insert('purchase',$purchase_s_data);   
  }

}

//-----------------------Insert New Customer And Purchase----------------------//

    function insert_new_purchase_customer()
    {
        $p_id = $this->input->post('prod_id');
        $s_q = $this->input->post('stock_weapon_no');
        $n_q = $this->input->post('qnty');
        $weap_no =  $this->input->post('wea_no');
        $new_total = $s_q+$n_q; 
        $prod_data = array(
            'p_quantity'=>$new_total
        );

          if( !empty($prod_data) )
          {
            $this->db->where('p_id',$p_id);
            $prod_update = $this->db->update('product',$prod_data);
          }
//---------------------------- Insert in Person table ----------------------//
          $per_data = array(
              'Per_name'        =>$this->input->post('per_name'),
              'Per_cnic'        =>$this->input->post('per_cnic'),
              'Per_number'      =>$this->input->post('per_number'),
              'Per_address'     =>$this->input->post('per_address'),
              'Per_license_no'  =>$this->input->post('license_no'),
              'purchase_from'   =>$this->input->post('purchase_from'),
              'Per_type'        =>'p',
              'Per_date'        => $this->input->post('par_date')
            );
           if( !empty($per_data) )
           {
            $insert_per = $this->db->insert('person',$per_data);
            $per_id = $this->db->insert_id();
           } 
          // echo '<pre>';print_r($per_data);die;
//---------------------------- Inserted Purchase Data ------------------///
for ($i=2; $i<=$n_q ; $i++) 
  { 
 $wea_no = $this->input->post('weapon_no_'.$i);
    if(!empty($wea_no))
      {
          $purchase_data = array(
              'p_id'             => $p_id,
              'par_weapon_no'    => $wea_no,
              'Per_id'           => $per_id,
              'p_quantity'       => 1,
              'par_price'        => $this->input->post('pur_price'),
              'sale_price'       => $this->input->post('sal_price'),
              'remarks'          => $this->input->post('remarks'),
              'par_date'         => $this->input->post('par_date')
            );
          $result[] = $purchase_data;
      }
 }

if(isset($weap_no))
  {    
         $purchase_s_data = array(
            'p_id'             => $p_id,
            'par_weapon_no'    => $weap_no,
            'Per_id'           => $per_id,
            'p_quantity'       => 1,
            'par_price'        => $this->input->post('pur_price'),
            'sale_price'       => $this->input->post('sal_price'),
            'remarks'          => $this->input->post('remarks'),
            'par_date'         => $this->input->post('par_date')
          );
        $result[] = $purchase_s_data;
        $res_data = $result;
    if( $res_data )
      {
        $pur_insert = $this->db->insert_batch('purchase',$res_data);
        return $per_id; 
      }
  }     
  //------------------------ INSERT WITHOUT WEAPON NUMBER -----------------------//
if( !isset($weap_no) )
  {
    $purchase_new_data = array(
              'p_id'             => $p_id,
              'par_weapon_no'    => '',
              'Per_id'           => $per_id,
              'p_quantity'       => $n_q,
              'par_price'        => $this->input->post('pur_price'),
              'sale_price'       => $this->input->post('sal_price'),
              'remarks'          => $this->input->post('remarks'),
              'par_date'         => $this->input->post('par_date')
            );
           $this->db->insert('purchase',$purchase_new_data);   
            return $per_id; 
  }         
    

}
//----------------- END Updation of Product table ---------------------//

function search_product()
  {
     $this->db->from('product prod');
      $product_name= $this->input->post('product_name');
      $prod_type  = $this->input->post('prod_type');
      $prod_model = $this->input->post('prod_model');
      $pr_code    = $this->input->post('pr_code');

      if(!empty($product_name))
      {
        $this->db->where('prod.p_name',$product_name); 
      }
      if(!empty($prod_type))
      {
       $this->db->where('prod.p_type',$prod_type);  
      }
      if(!empty($prod_model))
      {
        $this->db->where('prod.p_model',$prod_model); 
      }
      if(!empty($pr_code))
      {
        $this->db->where('prod.p_code',$pr_code);
        $this->db->join('purchase pur','prod.p_id = pur.p_id');
        $this->db->order_by('pur.par_id','desc');
        $this->db->limit(1);
        $res_data = $this->db->get()->result();
        return $res_data;
      }
     
      $this->db->join('purchase pur','prod.p_id = pur.p_id');
      $res_data = $this->db->get()->result();
      return $res_data; 
      // echo '<pre>';print_r($res_data);die;
  }
  function viewallproduct(){
    $this->db->select('*');
    $this->db->from('product');
    $query  = $this->db->get();
    $result = $query->result_array();
    //print_r($result);die();
    return $result;
  }
  function viewallproductupdate($id){
    $this->db->select('*');
    //$this->db->from('product');
    $this->db->where('p_id',$id);
    $query  = $this->db->get('product');
    $result = $query->result_array();
    //print_r($result);die();
    return $result;
  }
  public function viewallproductupdatepro($id){
        $pname = $this->input->post("name");
        $ptype = $this->input->post("type");
        $pmodel = $this->input->post("model");
        $pcode = $this->input->post("code");
        $inser_arr=array(
          "p_name"  =>$pname,
          "p_type"  =>$ptype,
          "p_model" =>$pmodel,
          "p_code"  =>$pcode,
      );
        //--- insert the product
      $this->db->where('p_id',$id);
        $insert = $this->db->update("product",$inser_arr);
       if($insert)
       { 
           redirect('showroom/viewallproduct');
       } 
        else{
            return 0;
        }
    }

}