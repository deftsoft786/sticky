<?php
class staff_model extends CI_Model
{
    public function __construct()
	{
	    $this->load->database(); //LOADS THE DATABASE AND CREATES DATABASE OBJECT
       
	}
    
   
    
    /**
     * Get staff member details
     * @param int 
     * @return array()
     * */
    
     public function view_member($uid)
    {
    
    	$query = $this->db->query("SELECT v2_users.*, v2_users.id as uid , v2_user_profiles.* from v2_users LEFT OUTER JOIN v2_user_profiles ON (v2_users.id = v2_user_profiles.user_id ) WHERE v2_users.id=".$uid);
        $row = $query->result_array();
        return  $row;
    	
    }
    
    
    
     public function delete_staff_member($uid)
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
 }
 ?>