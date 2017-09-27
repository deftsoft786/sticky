<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class products_model extends CI_Model
{
    private $table_name			= 'products';
    public function __construct()
	{
	    $this->load->database(); //LOADS THE DATABASE AND CREATES DATABASE OBJECT
	}
    
     /**
	 * Insert New Product
	 *
	 * @param	int (admin id,store id,product category id)
	 * @return	bool
	 */
     
     function insert_product_details($uid,$store_id,$product_cat_id)
     {
        $data['product_name']=$this->input->post('product_name');
        $data['description']=$this->input->post('product_description');
        $data['store_id']=$store_id;
        $data['product_category_id']=$product_cat_id;          
        $data['created'] = date('Y-m-d H:i:s');
        $data['created_by'] = $uid;
      	if ($this->db->insert($this->table_name, $data)) {//insert in product categories table success
      	 $insert_id = $this->db->insert_id();//get last insert id
         $product_cost=$this->input->post('product_cost');//get array of product cost
         $unit_ids=$this->input->post('product_units');
         $grand_data= array();
         foreach($product_cost as $var=>$val){            
                $data = array(
               'product_id' => $insert_id ,
               'cost' => $val ,
               'product_unit_id'=>$unit_ids[$var],
               'created' => date('Y-m-d H:i:s') 
              );             
              array_push($grand_data,$data);
        }
        if(count($grand_data)>0)
        {
            $inserted = $this->db->insert_batch('product_cost', $grand_data);   //execute insert query
            if($inserted)            
           	return true;
            else
            return false;
        }
	}
    else
    {
        return false;
    }
     }
     
     /**
      * Product update
      * @param int (product id,product category id)
      * @return void
      * */
     function update_product($product_id,$product_cat_id)
    {
        $data['product_name']=$this->input->post('product_name_edit');
        $data['description']=$this->input->post('product_description_edit');
        $data['product_category_id']=$product_cat_id; 
        $this->db->where('product_id',$product_id);       
      	if ($this->db->update($this->table_name, $data)) {
        $this->db->where('product_id',$product_id);
        $this->db->delete('product_cost');
        if($this->input->post('edit_product_cost'))        
        $product_cost=$this->input->post('edit_product_cost');//get array of product cost
        else
        $product_cost=$this->input->post('product_cost');//get array of product cost
         $unit_ids=$this->input->post('product_units');
         $grand_data= array();
         if($product_cost){
         foreach($product_cost as $var=>$val){            
                $data = array(
               'product_id' => $product_id ,
               'cost' => $val ,
               'product_unit_id'=>$unit_ids[$var],
               'created' => date('Y-m-d H:i:s') 
              );             
              array_push($grand_data,$data);
        }
        if(count($grand_data)>0)
        {
            $inserted = $this->db->insert_batch('product_cost', $grand_data);   //execute insert query
            if($inserted)            
           	return true;
            else
            return false;
        }
        }return true;
	}
    else
    {
        return false;
    }
      	}
        
    /**
     * Get all rows of units
     * @param product category id
     * @return arraty(all unit rows)
     * */
	function get_unit_count($product_cat_id)
	{       
        $this->db->where('product_category_id',$product_cat_id);
        $this->db->join('product_unit','product_unit.product_unit_id=cat_to_unit.product_unit_id','LEFT');
         $query = $this->db->get('cat_to_unit');
         $number_of_units=$query->num_rows();
         if($number_of_units >0) //topic slug exist or not
             return $query->result_array();
          return FALSE;
	}
    /**
       * View product 
       * @param  int
       * @return array
       * */ 
    public function view_product($product_id)    
    {
        $data=array('products.product_id'=>$product_id);        
        $this->db->where($data);
        $this->db->join('product_categories','product_categories.product_category_id=products.product_category_id','LEFT');        
        $query = $this->db->get($this->table_name);        
        if ($query->num_rows() == 1) 
        return $query->result_array();
        return NULL;    	
    }
    /**
       * Get product cost with units 
       * @param  int
       * @return array
       * */ 
    public function get_cost_by_product_id($product_id)    
    {
        $data=array('product_cost.product_id'=>$product_id);        
        $this->db->where($data);
        $this->db->join('product_unit','product_unit.product_unit_id=product_cost.product_unit_id','LEFT');        
        $query = $this->db->get('product_cost');        
        if ($query->num_rows() > 0) 
        return $query->result_array();
        return NULL;    	
    }
    /**
      * delete product 
      * @param int
      * @return bool
      */
      function delete_product($uid,$product_id)
      {          
          $data["is_deleted"] = 1;
          $data["deleted_by"] = $uid;
          $this->db->where('product_id', $product_id);
          if($result = $this->db->update($this->table_name,$data))
          return true;
          else
          return false;
      }
       /**
    * Disable product   
    * @param int
    * @return bool
    * */ 
    public function disable_product($product_id)
    {
        $data["status"] = "2";
        $this->db->where('product_id',$product_id);
        if($this->db->update($this->table_name,$data))
        return true;
        return false;
    }
    
    /**
    * Enable product category 
    * @param int
    * @return bool
    * */ 
    public function enable_product($product_id)
    {
        $data["status"] = "1";
        $this->db->where('product_id',$product_id);
        if($this->db->update($this->table_name,$data))
        return true;
        return false;
    }
 }
 ?>