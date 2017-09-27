<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class image_upload_model extends CI_Model {
              private $table_name = 'store_images';
              private $store_table = 'v2_stores';
    public function __construct() {
        $this->load->database(); //LOADS THE DATABASE AND CREATES DATABASE OBJECT
    }
    
        public function is_store_exist($store_id)
        {
                     //check user_id so that user cannot view question of other user
                     $data = array ('store_id'=> $store_id ,'created_by'=>$this->tank_auth->get_user_id());
                     $this->db->where($data);
                     $query = $this->db->get('v2_stores');
                     return $query->num_rows() == 1;
        }
        
         public function is_image_exist($image_id)
        {
                     //check user_id so that user cannot view question of other user
                     $data = array ('image_id'=> $image_id ,'user_id'=>$this->tank_auth->get_user_id());
                     $this->db->where($data);
                     $query = $this->db->get($this->table_name);
                     return $query->num_rows() == 1;
        }
        
        public function save_images($data,$store_id)
        {
            $images_array = array();
            foreach ($data as $image)
            {
            
               $image_details=array(
                'original_imagename'=>$image['original_imagename'],
                'disk_imagename'=>$image['disk_imagename'],
                'image_thumb'=>$image['image_thumb'],
                'store_id' =>$store_id,
                'user_id' =>$this->tank_auth->get_user_id(),
                'created' =>date('Y-m-d H:i:s')  
                );
                array_push($images_array,$image_details);
            }
           return $this->db->insert_batch($this->table_name, $images_array); 
        }
        
        public function load_images($store_id)
        {
            //check user_id so that user cannot view question of other user
                     $data = array ('store_id'=> $store_id ,'user_id'=>$this->tank_auth->get_user_id());
                     $this->db->where($data);
                      $query = $this->db->get($this->table_name);
                     if($query->num_rows() >0)
                         return $query->result_array();
                     return FALSE;
        }
        public function load_image($image_id)
        {
             $data = array ('image_id'=> $image_id ,'user_id'=>$this->tank_auth->get_user_id());
                     $this->db->where($data);
                      $query = $this->db->get($this->table_name);
                     if($query->num_rows() >0)
                         return $query->result_array();
                     return FALSE;
        }
      
        
     public function update_caption()
     {
         $image_id = $this->input->post('image_id');
        
          $data = array ('image_id'=> $image_id ,'user_id'=>$this->tank_auth->get_user_id());
            $this->db->where($data);
            if($this->db->update($this->table_name, array('caption' => $this->input->post('image_caption'))))
            return true; 
            return false; 
     }
        
        
        
    public function delete($image_id)
    {
        //get details of image
        $image_details = $this->load_image($image_id);
        if($image_details) {
            //delete image form db
            if($this->db->delete($this->table_name,  array ('image_id'=> $image_id ,'user_id'=>$this->tank_auth->get_user_id()) )) {
                // delete image form file 
                $disk_imagename = $image_details[0]['disk_imagename'] ;
                $image_thumb = $image_details[0]['image_thumb'] ;
               
                $size_limit = 5242880; //5MB  
                //delete main image
                $disk_imagename = 'uploads/user_images/'.$disk_imagename;
                 unlink($disk_imagename);
                // delete thumnail image
                 $image_thumb = 'uploads/user_images/'.$image_thumb;
                 unlink($image_thumb);
                 return true;
            }
        }
        return FALSE;
          
    }
    
    //function for globle image mange 
    	public function get_topics_list() {
                
                $arr = array('user_id'=>$this->tank_auth->get_user_id());
                 $this->db->where($arr);
		$this->db->select('*', FALSE);
		$this->db->from($this->topic_table);
		$query = $this->db->get();
        foreach ($query->result_array() as $row) {
			$data[$row['user_topic_id']] = $row['topic_name'];
		}
                //to sort dropdown list in asending order
                asort($data);
		if(!empty($data))
                    return $data;
                return FALSE;
	}
    
        
          public function load_all_images()
        {
            //check user_id so that user cannot view question of other user
                     $data = array ('user_id'=>$this->tank_auth->get_user_id());
                     $this->db->where($data);
                      $query = $this->db->get($this->table_name);
                     if($query->num_rows() >0)
                         return $query->result_array();
                     return FALSE;
        }
}
