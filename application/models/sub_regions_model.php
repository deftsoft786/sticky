<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class sub_regions_model extends CI_Model
{
    private $table_name	= 'sub_regions';
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
	 * Create new sub region
	 *
	 * @param	uid
     * @return	bool
	 */
	function insert_sub_regions_details($uid,$unique_name)
	{
        $data['region_id'] = $this->input->post('region_id');
        $data['sub_region_name']=$this->input->post('sub_region_name'); 
        $data['unique_name']=$unique_name; 
        $data['latitude']=$this->input->post('latitude'); 
        $data['longitude']=$this->input->post('longitude'); 
        $data['address']=$this->input->post('address'); 
              
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
         $this->db->where('sub_region_id != '.$id);
         $query = $this->db->get('sub_regions');
         if($query->num_rows()>0) //sub region slug exist or not
             return TRUE;
          return FALSE;         
     }
    
      /**
       * View sub region
       * @param  int
       * @return array
       * */ 
    public function view_sub_region($sub_region_id)    
    {
        $data=array('sub_region_id'=>$sub_region_id);        
        $this->db->select('sub_regions.*,regions.region_name');
        $this->db->where($data);
        $this->db->join('regions','regions.region_id=sub_regions.region_id','LEFT');
        $query = $this->db->get('sub_regions');
        
        if ($query->num_rows() == 1) 
        return $query->result_array();
        return NULL;    	
    }
    
    
     /**
	 * Update sub region information
	 *
	 * @param	int 
	 * @return	bool
	 */      
    public function update_sub_region($sub_region_id)
    {      									
        $data['region_id'] = $this->input->post('region_id');
        $data['sub_region_name']=$this->input->post('sub_region_name'); 
        $data['unique_name']=$this->input->post('unique_name'); 
        $data['latitude']=$this->input->post('latitude'); 
        $data['longitude']=$this->input->post('longitude'); 
        $data['address']=$this->input->post('address');      
        $this->db->where('sub_region_id', $sub_region_id);
        if($this->db->update('sub_regions', $data))
        {
            return true; //returning true if query runs correctly
        } 
        else
        {
            return false; // return false if something goes wrong

        }
    }  
    
    /**
     * function to delete sub region 
     * @param int,int
     * @return void
     * 
     */
     public function delete_sub_region($uid,$sub_region_id)
     {
        $data["is_deleted"] = 1;
        $data["deleted_by"] = $uid;
        $this->db->where('sub_region_id', $sub_region_id);
        $result = $this->db->update('sub_regions',$data);        
        if($result)                
        return true;                
        else
        return false;
     } 
   /**
    * Disable Sub Region 
    * @param int
    * @return bool
    * */ 
    public function disable_sub_region($sub_region_id)
    {
        $data["disabled"] = "1";
        $this->db->where('sub_region_id',$sub_region_id);
        if($this->db->update('sub_regions',$data))
        return true;
        return false;
    }
    
    /**
    * Enable Sub region 
    * @param int
    * @return bool
    * */ 
    public function enable_sub_region($sub_region_id)
    {
        $data["disabled"] = "0";
        $this->db->where('sub_region_id',$sub_region_id);
        if($this->db->update('sub_regions',$data))
        return true;
        return false;
    }
    /**
	 * Get all sub regions by region id
     * @param int
	 * @return array
	 */
	public function get_sub_region_by_region_id($region_id) {
                
                $arr = array('is_deleted'=>'0','region_id'=> $region_id);
                 $this->db->where($arr);
		$this->db->select('*', FALSE);
		$this->db->from('sub_regions');
		$query = $this->db->get();
        foreach ($query->result_array() as $row) {
			$data[$row['sub_region_id']] = $row['sub_region_name'];
		}
		if(!empty($data))
                    return $data;
                return FALSE;
	}
      
 }