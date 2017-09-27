<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Settings
 *
 * This model represents user Setting and profile data. It operates the following tables:
 * - users ,
 * - user profiles
 *
 */
class Homepage_settings_model extends CI_Model
{
	private $table_name		= 'homepage_settings';			// user accounts
	

	function __construct()
	{
		parent::__construct();
                $ci =& get_instance();
		
	}
    
    function get_homepage_settings()
    {
      $query = $this->db->get('homepage_settings');        
        if ($query->num_rows() >0) 
        return $query->result_array();
        return NULL;  
    }

	  /**
       * get homepage boilers
       * @param list no int
       * @return array or string
       * */
       function get_featured_deals($list_no)
       {
              
        $this->db->where('list =',$list_no);
        $this->db->order_by('deals.created','ASC');
        $this->db->join('deals','homepage_featured_deal.deal_id = deals.deal_id');
                     
        $query = $this->db->get('homepage_featured_deal');        
        if ($query->num_rows() >0) 
        return $query->result_array();
        return NULL;
        
       }
       /**
    * get boilers 
    * @param user id
    * @return void
    * */ 
    public function get_deals($deal_id = NULL)
    {       
        
        if($deal_id)       
        $this->db->where('deal_id =',$deal_id);        
        $this->db->where('is_deleted =',0); 
        $this->db->where('status =',1); 
        $query = $this->db->get('deals');        
        if ($query->num_rows() >0) 
        return $query->result_array();
        return NULL;
       
    }
    /**
    * get boilers 
    * @param user id
    * @return void
    * */ 
    public function get_stores($store_id = NULL)
    {       
        
        if($store_id)       
        $this->db->where('store_id =',$store_id);        
        $this->db->where('is_deleted =',0); 
        $this->db->where('status =',1); 
        $query = $this->db->get('v2_stores');        
        if($query->num_rows>0){
            $data[''] = '----Select Store----';
        foreach ($query->result_array() as $row) {
			$data[$row['store_id']] = $row['store_name'];
		}
        //to sort dropdown list in asending order
        asort($data);
		if(!empty($data))
        return $data;
        }
        return false;
       
    }
      public function sort_rows()
    {
        $new_order = $this->input->post('new_order');
        $new_order = explode(',',$new_order);
        
        $sorted=0;
        foreach($new_order as $position => $id_mixed )
        {
            $id_mixed = explode('_',$id_mixed);
            $id_pure = $id_mixed[1];
          										
        $data["display_order"] =  $position+1;
        $this->db->where('deal_id', $id_pure);
        $sorted += $this->db->update('homepage_featured_deal', $data);  
        }
       return $sorted;
    }
     public function update_homepage_deals()
    {
        
        $list  =  $this->input->post('list_no');
        $deals = $this->input->post('deals');
        
        $this->db->where('list',$list);
        $query = $this->db->get('homepage_featured_deal');
        $old_beers = $query->result_array();
        foreach($old_beers as $a)
        {
            $old_positions[$a["deal_id"]]=$a["display_order"];
        }
        
        
        $this->db->where('list',$list);
        $this->db->delete('homepage_featured_deal');
        
        $grand_data= array();
        foreach($deals as $var=>$val)
        {
            if(trim($val)!='')
            {
              $data = array(
               'deal_id' => $val ,
               'list' => $list ,
               'created' => date('Y-m-d h:i:s',time()) 
              ); 
              
              $key = $old_positions[$val];
              if($key)
              $data["display_order"] = $key;
              else
              $data["display_order"] = 0; 
              
              array_push($grand_data,$data);
            }
        }
        if(count($grand_data)>0)
        {	
            $inserted = $this->db->insert_batch('homepage_featured_deal', $grand_data);   //execute insert query
            $inserted_rows = $this->db->affected_rows();
            if($inserted)
            {
               return $inserted_rows; //returning true if query runs correctly
            } 
            else
            {
                return $inserted_rows; // return false if something goes wrong
    
            }
         }
        else
        {
            return 1;
        }	    		
    }
    function show_popular_deals($homepage_setting_id)
    {
        $data["show_popular_deals"] = $this->input->post('is_popular');
        $data["show_latest_deals"] = $this->input->post('is_latest');
        $data["show_featured_deal"] = $this->input->post('is_featured');
       $this->db->where('homepage_setting_id',$homepage_setting_id);
        $updated =$this->db->update('homepage_settings', $data);
        if($updated)
        return true;
        else
        false;
        
        
    }
    function update_video_url($homepage_setting_id)
    {
        $url = $this->input->post('video_url');
        //parse_str( parse_url($url , PHP_URL_QUERY ), $my_array_of_vars );
       
        $data["video_url"] =$url;     
        $this->db->where('homepage_setting_id',$homepage_setting_id);
        $updated =$this->db->update('homepage_settings', $data);
        if($updated)
        return true;
        else
        false;
        
        
    }
    function update_store($homepage_setting_id)
    {   
        $data['type'] = $this->input->post('menu_type');
  
        if($data['type'] == 'video')
        {
            $data['video_url_home'] = $this->input->post('video_url_home');
        }elseif($data['type'] == 'popular_store')
        {
            $data['featured_store_id'] = $this->input->post('store_id');
        }elseif($data['type'] == 'picture')
        {
            $data['image'] = $this->input->post('home_image');
        }

        $this->db->where('homepage_setting_id',$homepage_setting_id);
        $updated =$this->db->update('homepage_settings', $data);
        if($updated)
        return true;
        else
        false;
        
        
    }
}
