<?php

class Product_m extends CI_Model
{
    
    function addproductpro()
    {
        trim($pname = $this->input->post("name") );
        trim($ptype = $this->input->post("type") );
        trim($pmodel = $this->input->post("model") );
        trim($pcode = $this->input->post("code") );
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

    function search_db_for_product($name)
    {
      $this->db->select('*');
      $this->db->from('person');
      $this->db->where('Per_type','p');
      $this->db->like('Per_name',$name);
      $data = $this->db->get()->result();
        // echo '<pre>';print_r($data);die;
      if($data)
      {
        // echo'<pre>';print_r($data);die;
        return $data;
      }
      else{
        return 0;
      }
    }

    function purchaseproduct()
    {
      
      $name = $this->input->post('company_name');
      $cnic = $this->input->post( 'cnic' );    
              $this->db
                   ->select('*')
                   ->from('person');
                   if( !empty( $name != null ) ){
                      $this->db
                              ->where('Per_name', $name);
                   }else{
                      $this->db
                              ->where('Per_cnic', $cnic);
                   }
                   $data = $this->db
                                 ->get()
                                 ->result();
      
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
      $this->db->order_by('p_type','asc');
      $this->db->where('p_name',$prod_cat);
      $data = $this->db->get()->result();
      return $data;
    }

    function get_product_type($product,$type)
    {
      $this->db->select('*');
      $this->db->from('product');
      $this->db->order_by('p_model','asc');
      $this->db->where('p_name',$product);
      $this->db->where('p_type',$type);
      $data = $this->db->get()->result();
      return $data;
    }
// ---------------------------------------------------------------

   function get_product_code_pr($p,$t,$m)
    {
      $this->db->select('product.*,purchase.par_id,purchase.par_weapon_no,purchase.p_quantity AS par_quantity,purchase.par_price,purchase.sale_price');
      $this->db->from('product');   
      $this->db->where('product.p_name',$p);
      $this->db->where('product.p_type',$t);
      $this->db->where('product.p_model',$m);
      $this->db->join('purchase','product.p_id = purchase.p_id','left');
      $data = $this->db->get()->result();
      return $data;
    }

    function get_code_search_data_pr($code)
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

//----------------------------------------------------------------    
    function get_product_code($p,$t,$m)
    {
      $this->db->select('product.*,purchase.par_id,purchase.par_weapon_no,purchase.p_quantity AS par_quantity,purchase.par_price,purchase.sale_price');
      $this->db->from('product');  
      $this->db->where('product.p_name',$p);
      $this->db->where('product.p_type',$t);
      $this->db->where('product.p_model',$m);
      $this->db->order_by('purchase.par_date','desc');
      // $this->db->limit(1);
      $this->db->join('purchase','product.p_id = purchase.p_id');
      $data = $this->db->get()->result();
      // echo 'i am fine';die;
      $this->db->where('p_id', $data[0]->p_id);
      $this->db->order_by('purchase.par_date','asc');
        $data1 = $this->db->get('purchase')->result();
        foreach( $data1 as $var ){
          if( $var->p_quantity != '0' ){
            $purchase_price = $var->par_price;
            break;
          }
          $purchase_price = $var->par_price;
        }
        $data[0]->par_price = $purchase_price;
        
      return $data;
    }

    function get_code_search_data($code)
    {
        $this->db->select('product.*,purchase.par_id,purchase.par_weapon_no,purchase.p_quantity AS par_quantity,purchase.par_price,purchase.sale_price');
        $this->db->from('product');
        $this->db->order_by('purchase.par_date','desc');
        $this->db->limit(1);
        $this->db->where('p_code',$code);
        $this->db->join('purchase','product.p_id = purchase.p_id');
        $data = $this->db->get()->result();
        // echo '<pre>';print_r($data);die;
        // echo $data[0]->p_id;die; 
        $this->db->where('p_id', $data[0]->p_id);
        $this->db->order_by('purchase.par_date','asc');
        $data1 = $this->db->get('purchase')->result();
        // echo '<pre>';print_r($data1);die; 
        foreach( $data1 as $var ){
          if( $var->p_quantity != '0' ){
            $purchase_price = $var->par_price;
            break;
          }
          $purchase_price = $var->par_price;
        }
        // echo '<pre>';print_r($data);die;
        $data[0]->par_price = $purchase_price;
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
      $p_id     = trim($this->input->post('prod_id'));
      $s_q      = trim($this->input->post('stock_weapon_no'));
      $n_q      = trim($this->input->post('qnty') );
      $weap_no  = trim($this->input->post('weapon_no_1') );
       
      $remarks = trim($this->input->post('remarks'));
      if($remarks != ''){$remarks = $remarks;}else{$remarks = '';}
      // if( isset($weap_no) && $wea_no != '') {$weap_no = $weap_no;}else{$weap_no = '';}
      //----------- Get product value to add new values ----------------------//
      $this->db->where('p_id',$p_id); 
      $qry_1_0 = $this->db->get('product')->result();
      $old_qnty = $qry_1_0[0]->p_quantity;  
       //echo'<pre>';print_r($qry_1_0);die;
       
      $new_total = $old_qnty+$n_q;
      $prod_data = array(
              'p_quantity'=>$new_total
      );
       //echo '<pre>';print_r($prod_data);
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
                'par_price'        => trim($this->input->post('pur_price')),
                'sale_price'       => trim($this->input->post('sal_price')),
                'remarks'          => $remarks,
                'par_date'         => $this->input->post('par_date'),
                'par_quantity'     => 1
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
  if( $weap_no == null )
  {
            $purchase_s_data = array(
              'p_id'             => $p_id,
              'par_weapon_no'    => '',
              'Per_id'           => $this->input->post('per_id'),
              'p_quantity'       => $n_q,
              'par_price'        => $this->input->post('pur_price'),
              'sale_price'       => $this->input->post('sal_price'),
              'remarks'          => $remarks,
              'par_date'         => $this->input->post('par_date'),
              'par_quantity'     => $n_q
            );
          // echo '<pre>';print_r($purchase_s_data);die; 
          $this->db->insert('purchase',$purchase_s_data);   
  }
  return 1;
}

//-----------------------Insert New Customer And Purchase----------------------//

    function insert_new_purchase_customer()
    {
        $p_id     = trim($this->input->post('prod_id'));
        $s_q      = trim($this->input->post('stock_weapon_no'));
        $n_q      = trim($this->input->post('qnty'));
        $weap_no  = trim($this->input->post('wea_no'));

        $remarks = trim($this->input->post('remarks') );
      if($remarks != ''){$remarks = $remarks;}else{$remarks = '';}

        $new_total = $s_q+$n_q; 

        $nic = $this->input->post('per_cnic');
        if(isset($nic))
        {
          $nic = $nic;
        }else{
          $nic = '';
        }
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
              'Per_name'        =>trim($this->input->post('per_name') ),
              'Per_cnic'        =>$nic,
              'Per_number'      =>trim($this->input->post('per_number') ),
              'Per_address'     =>trim($this->input->post('per_address') ),
              'Per_license_no'  =>trim($this->input->post('license_no') ),
              'purchase_from'   =>trim($this->input->post('purchase_from') ),
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
              'remarks'          => $remarks,
              'par_date'         => $this->input->post('par_date'),
              'par_quantity'     => 1
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
            'remarks'          => $remarks,
            'par_date'         => $this->input->post('par_date'),
            'par_quantity'     => 1
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
              'remarks'          => $remarks,
              'par_date'         => $this->input->post('par_date'),
              'par_quantity'     => $n_q
            );
           echo 'i am fine' .  $this->db->insert('purchase',$purchase_new_data);   
            return $per_id; 
  }         
    

}
//----------------- END Updation of Product table ---------------------//

function search_product()
  { 
     /*$this->db->select('prod.*,pur.par_id,pur.par_weapon_no,pur.Per_id,pur.par_price,pur.sale_price,pur.par_date,pur.remarks,pur.p_quantity AS pur_quantity');
     $this->db->from('product prod');*/
      $this->db->from('product prod');
      $this->db->select('pur.*,prod.p_name,prod.p_type,prod.p_model,prod.p_code,prod.p_date');
      // $this->db->from('person p');
      $this->db->order_by('pur.par_date','asc');
      $product_name = $_GET['product_name'];
      $prod_type    = $_GET['prod_type'];
      $prod_model   = $_GET['prod_model'];
      $pr_code      = $_GET['pr_code'];

      if( empty($product_name) && empty($prod_type) && empty($prod_model) && empty($pr_code) )
      {
        $qry = $this->db->query(" SELECT pur.*,prod.p_name,prod.p_type,prod.p_model,prod.p_code,prod.p_date FROM product prod INNER JOIN purchase pur ON pur.p_id = prod.p_id ORDER BY pur.par_date asc ");
        $res_data = $qry->result();
        // echo '<pre>';print_r($res_data1);die;
        
        $result1 = [];
          foreach ( $res_data as $values ) 
          {
            $var = $values->p_id . $values->Per_id . $values->par_date;
                if( !array_key_exists($var, $result1 ) ){
                    $result1[$var]      = $values;
               }else{
                $result1[$var]->p_quantity += $values->p_quantity;
               }
        }
        return $result1;  
      }
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
      }

      $this->db->join('purchase pur','prod.p_id = pur.p_id');
      $this->db->where('pur.p_quantity!=', 0);
      $res_data = $this->db->get()->result();
      // echo '<pre>';print_r($res_data);die;
        $result1 = [];
          foreach ( $res_data as $values ) 
          {
            $var = $values->p_id . $values->par_price . $values->sale_price;
                if( !array_key_exists($var, $result1 ) ){
                    $result1[$var]      = $values;
               }else{
                $result1[$var]->p_quantity += $values->p_quantity;
                $result1[$var]->par_date   = $values->par_date;
               }
        }
      return $result1; 
      // echo '<pre>';print_r($res_data);die;
  }

  function get_purchased_detail($p_id,$per_id,$par_date)
  {
    $this->db->from('product');
    $this->db->where('product.p_id',$p_id);
    $this->db->where('purchase.Per_id',$per_id);
    $this->db->where('purchase.par_date',$par_date);
    // $this->db->where('purchase.p_quantity !=',0);
    $this->db->join('purchase','product.p_id = purchase.p_id');
    $res = $this->db->get()->result();
    return $res;
  }
   function get_stock_detail($p_id,$par_price,$sale_price)
  {
    $this->db->select('product.*,purchase.Per_id,purchase.par_weapon_no,purchase.par_date,purchase.par_id,purchase.p_quantity AS qnty');
    $this->db->from('product');
    $this->db->where('product.p_id',$p_id);
    $this->db->where('purchase.par_price',$par_price);
    $this->db->where('purchase.sale_price',$sale_price);
    $this->db->where('purchase.p_quantity !=',0);
    $this->db->join('purchase','product.p_id = purchase.p_id');
    // $this->db->limit(1);
    $res = $this->db->get()->result();
    // echo '<pre>';print_r($res);die;
    return $res;
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

// --------------------------------- Get product --------------------------//
    public function get_all_products()
    {
        // $this->db->select("*");
        $this->db->select('p_name');
        $this->db->order_by('p_name','asc');
        $this->db->from('product');
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }

    // -------------------------------------------------------------------------

    public function get_product_code_purchase($p,$t,$m){

                $this->db->where('p_name', $p);
                $this->db->where('p_type', $t);
                $this->db->where('p_model', $m);
        return  $this->db->get('product')->result();

    }

    // --------------------------------------------------------------------------

    public function get_code_search_data_purchase($code){

              $this->db->where('p_code', $code);
      return  $this->db->get('product')->result();
      
    }

    // ---------------------------------------------------------------------------
}