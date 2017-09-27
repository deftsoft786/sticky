<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class comments_model extends CI_Model
{
    public function __construct()
	{
	    $this->load->database(); //LOADS THE DATABASE AND CREATES DATABASE OBJECT
       
	}
        
             
    public function update_comment_status($comment_id,$status)
    {
        $data = array(
            'status' => $status
        );
        
        $this->db->where('comment_id', $comment_id);
       
        if ( $this->db->update('comments',$data))
            return true;
        return false;
         
        
    }
        
    
     /**
     * View staff 
     * @param lesson_id
     * @return lesson details
     * */
    public function view_comment($comment_id) {
        $data = array('comment_id' => $comment_id);

        $this->db->select('comments.*,users.email,v2_stores.store_name');
        $this->db->where($data);
        $this->db->join('v2_stores', ' v2_stores.store_id = comments.store_id', 'LEFT');
        $this->db->join('users', 'users.id = comments.user_id', 'LEFT');
        $query = $this->db->get('comments');

        if ($query->num_rows() == 1)
            return $query->result_array();
        return NULL;
    }
    
    
    
    public function delete_comment($comment_id)
    {
        $data = array(
            'is_deleted' => '1',
            'deleted_by' => $this->tank_auth->get_user_id()
        );
        
      
        $this->db->where('comment_id', $comment_id);
       
        if ( $this->db->update('comments',$data))
            return true;
        return false;
         
        
    }

}