<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Deals_model extends CI_Model
{
    private $table_name	= 'deals';
    public function __construct()
	{
	    $this->load->database(); //LOADS THE DATABASE AND CREATES DATABASE OBJECT
	}
    /**
       * View deal
       * @param  int
       * @return array
       * */ 
    public function view_deal($deal_id)    
    {
        $data=array('deal_id'=>$deal_id); 
        $this->db->select('deals.deal_id,deals.unique_name as deals_slug,deal,deal_image,start_time,end_time,deals.created as deals_created,deals.how_to_use,deals.description,deals.terms_of_use');
        $this->db->select('v2_stores.store_name');
        $this->db->select('product_categories.product_category_name,product_categories.product_category_id');
        
        $this->db->join('v2_stores', 'v2_stores.store_id = deals.store_id', 'LEFT');
         $this->db->join('product_categories', 'product_categories.product_category_id = deals.product_category_id', 'LEFT');
        $this->db->where($data);
        $query = $this->db->get('deals');
        
        if ($query->num_rows() == 1) 
        return $query->result_array();
        return NULL;    	
    }
    
    
    /**
	 * Create Store
	 *
	 * @param	int,int
     * @return	bool
	 */
	function insert_deal_details($uid,$unique_name,$store_id,$region_id,$sub_region_id)
	{
        
        $data['deal'] = $this->input->post('deal');
        $data['unique_name']=$unique_name; 
        $data['store_id']=$store_id; 
        $data['deal_image']=$this->input->post('deal_avater');
        $data['product_category_id'] = $this->input->post('product_category_id');
        $data['start_time'] = date('Y-m-d H:i:s',  strtotime($this->input->post('start_time')));
        $data['end_time'] = date('Y-m-d H:i:s',  strtotime($this->input->post('end_time')));
        $data['description']=$this->input->post('deal_description'); 
        $data['how_to_use']=$this->input->post('how_to_use');       
        $data['terms_of_use'] = $this->input->post('terms_of_use');
        $data['region_id'] = $region_id;
        $data['sub_region_id'] =$sub_region_id; 
              
        $data['created'] = date('Y-m-d H:i:s');
        $data['created_by'] = $uid;
        
      	if ($this->db->insert($this->table_name, $data)) {	
			return true;
		}
		return false;
	}
    /**
     * Update Profile
     * @param int,int
     * @return void
     * 
     */
    function update_deal($deal_id)
    {
       $data['deal'] = $this->input->post('deal_edit');
        $data['unique_name']=$this->input->post('deal_slug'); 
         $data['deal_image']=$this->input->post('deal_avater');
        $data['product_category_id'] = $this->input->post('product_category_id');
        $data['start_time'] = date('Y-m-d H:i:s',  strtotime($this->input->post('start_time_edit')));
        $data['end_time'] = date('Y-m-d H:i:s',  strtotime($this->input->post('end_time_edit')));
        $data['description']=$this->input->post('deal_description_edit'); 
        $data['how_to_use']=$this->input->post('how_to_use_edit');       
        $data['terms_of_use'] = $this->input->post('terms_of_use_edit');
       
        $this->db->where('deal_id', $deal_id);
        if($this->db->update('deals', $data))
        {
            return true; //returning true if query runs correctly
        } 
        else
        {
            return false; // return false if something goes wrong

        }  
    }
    /**
     * check unique slug
     * @param type $new_slug
     * @param type $id
     * @return boolean
     */
     function chk_unique_slug($new_slug,$id)
     {
         $this->db->where('unique_name',$new_slug);
         $this->db->where('deal_id != '.$id);
         $query = $this->db->get('deals');
         if($query->num_rows()>0) //topic slug exist or not
             return TRUE;
          return FALSE;
         
     }
     
     /**
	 * Get all available product categories
	 * @return array
	 */
	public function get_product_categories_list() { 
	   
	   $condition=array('status'=>1,'is_deleted'=>0); 
      $this->db->where($condition);
    	$query = $this->db->get('product_categories');
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
    /**
      * delete deal
      * @param int
      * @return bool
      */
      function delete_deal($uid,$deal_id)
      {          
          $data["is_deleted"] = 1;
          $data["deleted_by"] = $uid;
          $this->db->where('deal_id', $deal_id);
          if($result = $this->db->update('deals',$data))
          return true;
          else
          return false;
      }
      /**
    * Disable Region 
    * @param int
    * @return bool
    * */ 
    public function disable_deal($deal_id)
    {
        $data["status"] = "0";
        $this->db->where('deal_id',$deal_id);
        if($this->db->update('deals',$data))
        return true;
        return false;
    }
    
    /**
    * Enable region 
    * @param int
    * @return bool
    * */ 
    public function enable_deal($deal_id)
    {
        $data["status"] = "1";
        $this->db->where('deal_id',$deal_id);
        if($this->db->update('deals',$data))
        return true;
        return false;
    }
    

     
    }
    ?>