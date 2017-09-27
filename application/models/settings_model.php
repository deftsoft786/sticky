<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Settings
 *
 * This model represents user Setting and profile data. It operates the following tables:
 * - users ,
 * - user profiles
 *
 */
class Settings_model extends CI_Model
{
	private $table_name		= 'v2_users';			// user accounts
	

	function __construct()
	{
		parent::__construct();
                $ci =& get_instance();
		
	}

	/**
	 * Get user record by Id
	 *
	 * @param	int
	 * @param	bool
	 * @return	object
	 */
	function get_user_by_id($user_id)
	{
            
            $this->db->select('*');
            $this->db->from($this->table_name);
            $this->db->join('v2_user_profiles','v2_users.id = v2_user_profiles.user_id');
            $this->db->where($this->table_name.'.id', $user_id);
            $query = $this->db->get();
			if ($query->num_rows() == 1) return $query->row();
			return NULL;
           
	}
        
     /**
	 * Update users basic information
	 *
	 * @param	string
	 * @param	string
     * @param	string
	 * @return	bool
	 */      
    public function update_user_profile($user_id,$first_name,$last_name,$zip)
    {

        									
        $data = array(
           'first_name' => $first_name ,
           'last_name' => $last_name ,
          );
       
        $this->db->where('user_id', $user_id);
        if($this->db->update('v2_user_profiles', $data))
        {
            return true; //returning true if query runs correctly
        } 
        else
        {
            return false; // return false if something goes wrong

        }

    }
        
}
