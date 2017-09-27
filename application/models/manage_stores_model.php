<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Manage_stores_model extends CI_Model
{
    private $table_name	= 'v2_stores';
    public function __construct()
	{
	    $this->load->database(); //LOADS THE DATABASE AND CREATES DATABASE OBJECT
	}
    
    /**
	 * Get all available regions
	 * @return array
	 */
	public function get_region_list() {              
	
        $this->db->where('is_deleted = ',0);
    	$query = $this->db->get('regions');
        if($query->num_rows>0){
        foreach ($query->result_array() as $row) {
			$data[$row['region_id']] = $row['region_name'];
		}
        //to sort dropdown list in asending order
        asort($data);
		if(!empty($data))
        return $data;
        }
        return false;
	}
    
    /**
	 * Create Store
	 *
	 * @param	int,int
     * @return	bool
	 */
	function insert_store_details($uid,$unique_name)
	{
        $data['region_id'] = $this->input->post('region_id');
        $data['sub_region_id']=$this->input->post('sub_region_id'); 
        $data['unique_name']=$unique_name; 
        $data['store_name']=$this->input->post('dispensary_name'); 
        $data['street']=$this->input->post('street'); 
        $data['city']=$this->input->post('city');
        
        $data['state'] = $this->input->post('state');
        $data['sub_region_id']=$this->input->post('sub_region_id'); 
        $data['zip_code']=$this->input->post('zip_code'); 
        $data['contact_first_name']=$this->input->post('contact_first_name'); 
        $data['contact_last_name']=$this->input->post('contact_last_name'); 
        
         $data['contact_number'] = $this->input->post('contact_number');
        $data['email']=$this->input->post('email'); 
        $data['store_type']=$this->input->post('store_type'); 
        $data['latitude']=$this->input->post('latitude'); 
        $data['longitude']=$this->input->post('longitude'); 
       
        $data['created'] = date('Y-m-d H:i:s');
        $data['created_by'] = $uid;
        
      	if ($this->db->insert($this->table_name, $data)) {	
      	 $insert_id=$this->db->insert_id();
          $w_hours['monday_start'] = date("H:i",strtotime('10:00 AM'));
        $w_hours['monday_end'] = date("H:i",strtotime('10:00 PM'));        
        $w_hours['tuesday_start'] = date("H:i",strtotime('10:00 AM'));
        $w_hours['tuesday_end'] = date("H:i",strtotime('10:00 PM'));        
        $w_hours['wednesday_start'] = date("H:i",strtotime('10:00 AM'));
        $w_hours['wednesday_end'] = date("H:i",strtotime('10:00 PM'));
        $w_hours['thursday_start'] = date("H:i",strtotime('10:00 AM'));
        $w_hours['thursday_end'] = date("H:i",strtotime('10:00 PM'));
        $w_hours['friday_start'] = date("H:i",strtotime('10:00 AM'));
        $w_hours['friday_end'] = date("H:i",strtotime('10:00 PM'));
        $w_hours['saturday_start'] = date("H:i",strtotime('10:00 AM'));
        $w_hours['saturday_end'] = date("H:i",strtotime('10:00 PM'));
        $w_hours['sunday_start'] = date("H:i",strtotime('10:00 AM'));
        $w_hours['sunday_end'] = date("H:i",strtotime('10:00 PM'));
        $w_hours['store_id'] = $insert_id;
       
        if($this->db->insert('v2_working_hours', $w_hours))
        {
            return true; //returning true if query runs correctly
        } 
        else
        {
            return false; // return false if something goes wrong

        }  
        
         
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
         $this->db->where('store_id != '.$id);
         $query = $this->db->get('v2_stores');
         if($query->num_rows()>0) //store slug exist or not
             return TRUE;
          return FALSE;
         
     }
    
      /**
       * Get store details
       * @param  int
       * @return array
       * */ 
    public function view_store($store_id)    
    {
        $data=array('store_id'=>$store_id,'v2_stores.is_deleted'=>0);        
        $this->db->select('v2_stores.*,regions.region_name,sub_regions.sub_region_name');
        $this->db->where($data);
        $this->db->join('sub_regions', 'v2_stores.sub_region_id = sub_regions.sub_region_id','LEFT');
        $this->db->join('regions', 'v2_stores.region_id = regions.region_id','LEFT');        
        $query = $this->db->get('v2_stores');
        
        if ($query->num_rows() == 1) 
        return $query->result_array();
        return NULL;    	
    }
    
    
     /**
	 * Update store basic  information
	 *
	 * @param	int 
	 * @return	bool
	 */      
    public function update_store_basic_info($store_id,$latitude,$longitude)
    {      									
        $data['region_id'] = $this->input->post('region_id');
        $data['sub_region_id']=$this->input->post('sub_region_id'); 
        $data['unique_name']=$this->input->post('unique_name'); 
        $data['store_name']=$this->input->post('dispensary_name'); 
        $data['street']=$this->input->post('street'); 
        $data['city']=$this->input->post('city');
        
        $data['state'] = $this->input->post('state');
        $data['sub_region_id']=$this->input->post('sub_region_id'); 
        $data['zip_code']=$this->input->post('zip_code'); 
        $data['contact_first_name']=$this->input->post('contact_first_name'); 
        $data['contact_last_name']=$this->input->post('contact_last_name'); 
        
         $data['contact_number'] = $this->input->post('contact_number');
        $data['email']=$this->input->post('email'); 
        $data['store_type']=$this->input->post('store_type'); 
        $data['latitude']=$latitude; 
        $data['longitude']=$longitude;   
        $this->db->where('store_id', $store_id);
        if($this->db->update('v2_stores', $data))
        {
            return true; //returning true if query runs correctly
        } 
        else
        {
            return false; // return false if something goes wrong

        }
    }
    /**
     * Update Profile
     * @param int,int
     * @return void
     * 
     */
    function update_store_profile($store_id)
    {
        $data['description'] = $this->input->post('description');
        $data['store_logo']=$this->input->post('avater');
        $data['first_time_patients']=$this->input->post('first_time_patients'); 
        $data['announcement']=$this->input->post('announcement');
        $data['show_first_time_patients']=$this->input->post('show_first_time_patients'); 
        $data['show_announcement']=$this->input->post('show_announcement');
        //social media links
        $data['fb_link'] = $this->input->post('fb_link');
        $data['ints_link']=$this->input->post('ints_link'); 
        $data['twitter_link']=$this->input->post('twitter_link');
        $data['pinterest_link']=$this->input->post('pinterest_link'); 
        $data['you_tube_link']=$this->input->post('you_tube_link');
        $this->db->where('store_id', $store_id);
        if($this->db->update('v2_stores', $data))
        {
            return true; //returning true if query runs correctly
        } 
        else
        {
            return false; // return false if something goes wrong

        }  
    }
     /**
     * Get working hours of store 
     * @param int
     * @return void
     * 
     */ 
    function get_working_hours($store_id)
    {
         $data=array('store_id'=>$store_id);        
        $this->db->where($data);
        $query = $this->db->get('v2_working_hours');
        
        if ($query->num_rows() == 1) 
        return $query->result_array();
        return NULL;
    }
    /**
     * Update working hours of store 
     * @param int
     * @return void
     * 
     */ 
    function update_working_hours($store_id)
    {
        $this->db->delete('v2_working_hours', array('store_id' => $store_id)); 
        if($this->input->post('show_mon')=='on')
        $data["show_mon"] =  1; 
        else
        $data["show_mon"] =  0;
        if($this->input->post('show_tues')=='on')
        $data["show_tues"] =  1; 
        else
        $data["show_tues"] =  0;
        if($this->input->post('show_wed')=='on')
        $data["show_wed"] =  1; 
        else
        $data["show_wed"] =  0;
        if($this->input->post('show_thu')=='on')
        $data["show_thu"] =  1; 
        else
        $data["show_thu"] =  0;
        if($this->input->post('show_fri')=='on')
        $data["show_fri"] =  1; 
        else
        $data["show_fri"] =  0;
        if($this->input->post('show_sat')=='on')
        $data["show_sat"] =  1; 
        else
        $data["show_sat"] =  0;
        if($this->input->post('show_sun')=='on')
        $data["show_sun"] =  1; 
        else
        $data["show_sun"] =  0;
       
        $data['monday_start'] = date("H:i",strtotime($this->input->post('mon_start')));
        $data['monday_end'] = date("H:i",strtotime($this->input->post('mon_end')));        
        $data['tuesday_start'] = date("H:i",strtotime($this->input->post('tues_start')));
        $data['tuesday_end'] = date("H:i",strtotime($this->input->post('tues_end')));        
        $data['wednesday_start'] = date("H:i",strtotime($this->input->post('wed_start')));
        $data['wednesday_end'] = date("H:i",strtotime($this->input->post('wed_end')));
        $data['thursday_start'] = date("H:i",strtotime($this->input->post('thu_start')));
        $data['thursday_end'] = date("H:i",strtotime($this->input->post('thu_end')));
        $data['friday_start'] = date("H:i",strtotime($this->input->post('fri_start')));
        $data['friday_end'] = date("H:i",strtotime($this->input->post('fri_end')));
        $data['saturday_start'] = date("H:i",strtotime($this->input->post('sat_start')));
        $data['saturday_end'] = date("H:i",strtotime($this->input->post('sat_end')));
        $data['sunday_start'] = date("H:i",strtotime($this->input->post('sun_start')));
        $data['sunday_end'] = date("H:i",strtotime($this->input->post('sun_end')));
        $data['store_id'] = $store_id;
       
        if($this->db->insert('v2_working_hours', $data))
        {
            return true; //returning true if query runs correctly
        } 
        else
        {
            return false; // return false if something goes wrong

        }  
        
        
    }
    
    /**
     * function to delete store 
     * @param int,int
     * @return void
     * 
     */
     public function delete_store($uid,$store_id)
     {
        $data["is_deleted"] = 1;
        $data["deleted_by"] = $uid;
        $this->db->where('store_id', $store_id);
        $result = $this->db->update('v2_stores',$data);        
        if($result)                
        return true;                
        else
        return false;
     } 
   /**
    * Deactivate Store 
    * @param int
    * @return bool
    * */ 
    public function deactivate_store($store_id)
    {
        $data["status"] = "2";
        $this->db->where('store_id',$store_id);
        if($this->db->update('v2_stores',$data))
        return true;
        return false;
    }
    
    /**
    * Active store 
    * @param int
    * @return bool
    * */ 
    public function active_store($store_id)
    {
        $data["status"] = "1";
        $this->db->where('store_id',$store_id);
        if($this->db->update('v2_stores',$data))
        return true;
        return false;
    }
    
      
 }