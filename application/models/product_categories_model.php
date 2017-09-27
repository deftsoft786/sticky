<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class product_categories_model extends CI_Model
{
    private $table_name			= 'product_categories';
    public function __construct()
	{
	    $this->load->database(); //LOADS THE DATABASE AND CREATES DATABASE OBJECT
	}
     /**
	 * Insert New Product Category with units
	 *
	 * @param	int admin id
	 * @return	bool
	 */
     /**
       * View product category
       * @param  int
       * @return array
       * */ 
    public function view_product_category ($cat_id)    
    {
        
        $data=array('product_categories.product_category_id'=>$cat_id);        
        $this->db->where($data);        
        $query = $this->db->get($this->table_name);        
        if ($query->num_rows() == 1) 
        return $query->result_array();
        return NULL;    	
    }
    
    function get_units_by_cat_id($cat_id = NULL)
    {
      $data=array('cat_to_unit.product_category_id'=>$cat_id); 
      if($cat_id)       
        $this->db->where($data);   
        $this->db->join('product_unit','cat_to_unit.product_unit_id=product_unit.product_unit_id','LEFT');
             
        $query = $this->db->get('cat_to_unit');        
        if ($query->num_rows() >0) 
        return $query->result_array();
        return NULL;    
    }
	function insert_product_cat_details($uid)
	{       
        $data['product_category_name']=$this->input->post('product_cat_name');  
        $data['created'] = date('Y-m-d H:i:s');
        $data['created_by'] = $uid;
      	if ($this->db->insert($this->table_name, $data)) {//insert in product categories table success
      	 $insert_id = $this->db->insert_id();//get last insert id
         $units=$this->input->post('product_units');//get array of units
         $grand_data= array();
         foreach($units as $var=>$val){            
                $data = array(
               'product_category_id' => $insert_id ,
               'product_unit_id' => $val ,
               'created' => date('Y-m-d H:i:s') 
              );             
              array_push($grand_data,$data);
        }
        if(count($grand_data)>0)
        {
            $inserted = $this->db->insert_batch('cat_to_unit', $grand_data);   //execute insert query
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
    function update_product_category($cat_id)
    {
             $data['product_category_name']=$this->input->post('product_cat_name_edit');
             $this->db->where('product_category_id',$cat_id);      
      	 if ($this->db->update($this->table_name, $data)) {//insert in product categories table success
            $this->db->where('product_category_id',$cat_id);
            $this->db->delete('cat_to_unit');
            $units=$this->input->post('product_units_edit');//get array of units
         $grand_data= array();
         if($units){
         foreach($units as $var=>$val){            
                $data = array(
               'product_category_id' => $cat_id ,
               'product_unit_id' => $val ,
               'created' => date('Y-m-d H:i:s') 
              );             
              array_push($grand_data,$data);
        }
        
        if(count($grand_data)>0)
        {
            $inserted = $this->db->insert_batch('cat_to_unit', $grand_data);   //execute insert query
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
      * delete topic with questions attached to this topic
      * @param int
      * @return bool
      */
      function delete_product_category($cat_id)
      {
        
        if($this->input->post('delete_cat')==1)
        {
            if($this->db->delete('product_categories', array('product_category_id' => $cat_id)))
            if($this->db->query("DELETE FROM product_cost where product_id IN (select product_id from products where product_category_id = '$cat_id')")) 
                if($this->db->delete('products', array('product_category_id' => $cat_id))){
                    $this->db->delete('cat_to_unit',array('product_category_id' => $cat_id));
               //echo $this->db->last_query();
               return true;
                   }
                return false;
        }else
        { 
            $new_topic_id=array('product_category_id'=>$this->input->post('product_category_id'));
            $this->db->where('product_category_id', $cat_id);
            $this->db->update('products', $new_topic_id);         
            if($this->db->delete('product_categories', array('product_category_id' => $cat_id))){
            if($this->db->query("DELETE FROM product_cost where product_id IN (select product_id from products where product_category_id = '$cat_id')")) 
            
                $this->db->delete('cat_to_unit',array('product_category_id' => $cat_id));
                return true;
                
            }
            
            return false;
        }
     }
       /**
    * Disable product category  
    * @param int
    * @return bool
    * */ 
    public function disable_product_category($cat_id)
    {
        $data["status"] = "2";
        $this->db->where('product_category_id',$cat_id);
        if($this->db->update($this->table_name,$data))
        return true;
        return false;
    }
    
    /**
    * Enable product category 
    * @param int
    * @return bool
    * */ 
    public function enable_product_category($cat_id)
    {
        $data["status"] = "1";
        $this->db->where('product_category_id',$cat_id);
        if($this->db->update($this->table_name,$data))
        return true;
        return false;
    }
      /**
       * Get all units
       * @param void
       * @return array
       * */
    function get_all_units()
    {
        $query=$this->db->get('product_unit');
        if ($query->num_rows() >0) 
        return $query->result_array();
	           return false;    	
    }
    /** Get all product category except cuurent
     * @param int 
     * @return array 
     * */
     function product_categories($cat_id)
     {
         if($cat_id)
        $this->db->where('product_category_id !=',$cat_id);       
		$query = $this->db->get($this->table_name);
        if($query->num_rows>0){
        foreach ($query->result_array() as $row) {
			$data[$row['product_category_id']] = $row['product_category_name'];
		}
            //to sort dropdown list in asending order
            asort($data);
    		if(!empty($data))
            return $data;
        }
        return false;
     }
 }
 ?>