<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class regions_model extends CI_Model
{
    private $table_name			= 'regions';
    public function __construct()
	{
	    $this->load->database(); //LOADS THE DATABASE AND CREATES DATABASE OBJECT
	}
    
     /**
	 * Insert New Region
	 *
	 * @param	int admin id
	 * @return	bool
	 */
	function insert_region_details($uid,$unique_name)
	{       
        $data['region_name']=$this->input->post('region_name');  
        $data['unique_name']=$unique_name;    
        $data['created'] = date('Y-m-d H:i:s');
        $data['created_by'] = $uid;        
      	if ($this->db->insert($this->table_name, $data)) {
		return true;
		}
		return false;
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
         $this->db->where('region_id != '.$id);
         $query = $this->db->get('regions');
         if($query->num_rows()>0) //topic slug exist or not
             return TRUE;
          return FALSE;
         
     }
     
     
    
  /**
   * View Region 
   * @param int
   * @return array
   * */ 
    public function view_region($region_id)    
    {
        $data=array('region_id'=>$region_id);       
        $this->db->where($data);
        $query = $this->db->get($this->table_name);        
        if ($query->num_rows() == 1) 
        return $query->result_array();
	           return false;    	
    }
    
     /**
	 * Update Region information
	 *
	 * @param	int
	 * @return	bool
	 */      
    public function update_region($region_id)
    {							
        $data = array(
        'region_name' => $this->input->post('region_name'),
        'unique_name' => $this->input->post('unique_name')       
         );
        $this->db->where('region_id', $region_id);
        if($this->db->update('regions', $data))
        return true; //returning true if query runs correctly
        else
        return false;// return false if something goes wrong
    }
    /**
      * delete region
      * @param int
      * @return bool
      */
      function delete_region($uid,$rid)
      {          
          $data["is_deleted"] = 1;
          $data["deleted_by"] = $uid;
          $this->db->where('region_id', $rid);
          if($result = $this->db->update('regions',$data))
          {  $result = $this->db->update('sub_regions',$data);                      
          return true;
          }                
          else
          return false;
      }

    /**
    * Disable Region 
    * @param int
    * @return bool
    * */ 
    public function disable_region($region_id)
    {
        $data["disabled"] = "1";
        $this->db->where('region_id',$region_id);
        if($this->db->update('regions',$data))
        return true;
        return false;
    }
    
    /**
    * Enable region 
    * @param int
    * @return bool
    * */ 
    public function enable_region($region_id)
    {
        $data["disabled"] = "0";
        $this->db->where('region_id',$region_id);
        if($this->db->update('regions',$data))
        return true;
        return false;
    }
    /**
    * get regions 
    * @param user id
    * @return void
    * */ 
    public function get_regions($region_id = NULL)
    {   
        
        
        $this->db->select('*', FALSE);
		$this->db->from('regions');
        $this->db->order_by('display_order','ASC');
        $this->db->where('is_deleted = ',0);
		$query = $this->db->get();
        if($query->num_rows>0)
        return $query->result_array();
        else
        return false;        
    }
    
    
    /**
       * Sort Region
       * @param int
       * @return void
       * */ 
    
     public function sort_rows()
    {
        $new_order = $this->input->post('new_order');
        $new_order = explode(',',$new_order);
        $sorted=0;
        foreach($new_order as $position => $id_mixed )
        {
            $id_mixed = explode('_',$id_mixed);
            $id_pure = $id_mixed[1];
          										
        $data["display_order"] =  $position;
        $this->db->where('region_id', $id_pure);
        $sorted += $this->db->update('regions', $data);  
        }
       return $sorted;
    }
    
    
}
    ?>
