<?php
class store_model extends CI_Model
{
    public function __construct()
	{
	    $this->load->database(); //LOADS THE DATABASE AND CREATES DATABASE OBJECT
       
	}
      
    /**
     * Get store owner details
     * @param int 
     * @return array()
     * */
    
     public function view_member($uid)
    {
    
    	$query = $this->db->query("SELECT v2_users.*, v2_users.id as uid , v2_user_profiles.* from v2_users LEFT OUTER JOIN v2_user_profiles ON (v2_users.id = v2_user_profiles.user_id ) WHERE v2_users.id=".$uid);
        $row = $query->result_array();
        return  $row;
    	
    }
        
    /**
     * Get store list
     * @param int 
     * @return array()
     * */
    
     public function view_store($owner_id)
    {
        
    
    $data=array('id'=>$owner_id,'v2_stores.is_deleted'=>0);        
        $this->db->select('v2_stores.*,v2_users.username');
        $this->db->where($data);
        $this->db->join('v2_stores', 'v2_stores.created_by = v2_users.id','LEFT');
         $query = $this->db->get('v2_users');
        
        if ($query->num_rows() >0) 
        return $query->result_array();
        return NULL;    
    	
    }
    
    
    
    
  /**
   * Delete store owner
   * @param int
   * */   
     public function delete_store_member($uid)
    {
            $data["is_deleted"] = 1;
            $this->db->where('id', $uid);
            $result = $this->db->update('v2_users',$data); 
        
             if($result)
                {
                   return true; 
                } 
                else
                {
                    return false; 
        
                }
    }
    /**
     * Update store owner basic details
     * @package int
     * @return void
     * */
    
    public function update_member($uid)
    {
        
        $data = array(
        'first_name' => $this->input->post('first_name'),
        'last_name' => $this->input->post('last_name'),
        );
       
        $this->db->where('user_id', $uid);
        $inserted = $this->db->update('v2_user_profiles', $data); 
        if($inserted)
        {
           return true; 
        } 
        else
        {
            return false; 

        }

    }
       /**
    * Disapprove Store  
    * @param int
    * @return bool
    * */ 
    public function disapprove_store($store_id)
    {
       
       $data["status"] = "3";
        $this->db->where('store_id',$store_id);
        if($this->db->update('v2_stores',$data))
        return true;
        return false;
    }
    
    /**
    * Approve Store 
    * @param int
    * @return bool
    * */ 
    public function approve_store($store_id)
    {
        $data["status"] = "1";
        $this->db->where('store_id',$store_id);
        if($this->db->update('v2_stores',$data))
        return true;
        return false;
    }
 }
 ?>