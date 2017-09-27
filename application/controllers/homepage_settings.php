<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class homepage_settings extends CI_controller
{
    function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
        $this->lang->load('tank_auth');
        $this->load->model('homepage_settings_model');
        date_default_timezone_set('America/New_York');
	}
        public function index()
        {
            if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		      } else {
            $data['user_id']	= $this->tank_auth->get_user_id();
      	    $data["admin_data"] = $this->session->all_userdata();     
            $data["title"]  = "Homepage Settings";
            $data["details"] = $this->homepage_settings_model->get_homepage_settings();
            $data["all_deals"] = $this->homepage_settings_model->get_deals();
            $data["all_stores"] = $this->homepage_settings_model->get_stores();
           
            $data["featured_deals"] = $this->homepage_settings_model->get_featured_deals(1);
            $this->load->view('includes/inner_header', $data);
            $this->load->view('homepage_settings', $data);
            $this->load->view('includes/inner_footer', $data);
		}
        }
      /**
      * Update homepage deals
      * */
      public function update_homepage_deals()
      { 
       
         $is_updated = $this->homepage_settings_model->update_homepage_deals();
            if($is_updated)
            {
             $msgdata = array(
                       'text'  => 'Featured Boiler Successfully Updated.',
                       'class'     => 'success'
                        );
                        $this->session->set_flashdata($msgdata);
                    }
                    else
                    {
                        $msgdata = array(
                       'text'  => 'Error Updating Featured Boiler.',
                       'class'     => 'danger'
                        );
                        $this->session->set_flashdata($msgdata);
                    }
          redirect('homepage_settings');      
      }
        public function sorter()
        {
               echo json_encode($this->homepage_settings_model->sort_rows());
        }
        
      public function show_popular_deals($homepage_setting_id)
      {
        $is_updated = $this->homepage_settings_model->show_popular_deals($homepage_setting_id);
        if($is_updated)
        {
             $result["status"] = 1;
             $result["message"] = $this->lang->line('save_changes');

        } else {
            $result["status"] = 0;
            $result["message"] = $this->lang->line('update_error');
        }   
        echo json_encode($result);
        die(); 
        
      }
       public function update_video_url($homepage_setting_id)
      {
        $is_updated = $this->homepage_settings_model->update_video_url($homepage_setting_id);
        if($is_updated)
        {
             $result["status"] = 1;
             $result["message"] = $this->lang->line('save_changes');

        } else {
            $result["status"] = 0;
            $result["message"] = $this->lang->line('update_error');
        }   
        echo json_encode($result);
        die(); 
        
      }
      public function update_store($homepage_setting_id)
      {
        $is_updated = $this->homepage_settings_model->update_store($homepage_setting_id);
        if($is_updated)
        {
             $result["status"] = 1;
             $result["message"] = $this->lang->line('save_changes');

        } else {
            $result["status"] = 0;
            $result["message"] = $this->lang->line('update_error');
        }   
        echo json_encode($result);
        die(); 
        
      }
      
      /**
     * homepage_settings::do_upload()
     * 
     * @return void
     */
      function do_upload()
	           {
	            $directory='home_page';
                $size_limit = 5242880; //5MB   
		        $output_dir ="uploads/".$directory."/";
                $file_name = time()."_".$this->tank_auth->get_user_id();
                    if(isset($_FILES["image_file"]))
                    {
                        //Filter the file types , if you want.
                        if ($_FILES["image_file"]["error"] > 0)
                        {
                           $result["status"] = 0;
                           $result["message"] = $this->lang->line('error_ocured');
                           echo json_encode($result);
                            die(); 
                        }
                        else
                        {
                           
                            $path = $_FILES['image_file']['name'];
                            $ext = ".".pathinfo($path, PATHINFO_EXTENSION);
                            
                            if($_FILES["image_file"]["size"] < $size_limit){
                                
                                if($_FILES['image_file']['type']=="image/jpg" || $_FILES['image_file']['type']=="image/jpeg" || $_FILES['image_file']['type']=="image/pjpeg" || $_FILES['image_file']['type']=="image/gif" || $_FILES['image_file']['type']=="image/png" )
                               	{
                        			$tmpName=$_FILES['image_file']['tmp_name'];
                        			if(!file_exists($output_dir))
                        				mkdir($output_dir,0755, true) or die("cannot make dir");
                                        
                        			$uploaded= move_uploaded_file($tmpName,$output_dir.$file_name.$ext);
                                    if($uploaded){
                                        
                                        $this->load->library('SimpleImage');
                                        $image = new SimpleImage(); 
                                        $image->load($output_dir.$file_name.$ext);
                                        if($image->getWidth()>620)
                                         $image->resizeToWidth(250);
                                       
                                        if($image->getHeight()>480)
                                         $image->resizeToHeight(250);
                                         
                                        if($ext=='.png'){
                                          $thumb=$image->save($output_dir.$file_name."_t".$ext,IMAGETYPE_PNG);   
                                        }
                                        else
                                        {
                                            $thumb=$image->save($output_dir.$file_name."_t".$ext); 
                                        }

                                                                                                                        
                                    $data["status"] = 1;
                                    $data["filename"] =  $file_name."_t".$ext;
                                    $data["original"] = $path;
                                    $data["image_path"]=base_url().$output_dir.$file_name."_t".$ext;
                                    unlink($output_dir.$file_name.$ext);
                                    }
                                    else{
                                    $data["status"] = 0; 
                                    $data["message"] = $this->lang->line('update_error');
                                    }
                                     echo json_encode($data);
                                     die(); 
                                }
                                else
                                {
                                     $data["status"] = 0; 
                                    $data["message"] = $this->lang->line('invalid_file_type');
                                    
                                }
                            }
                            else
                            {
                                $data["status"] = 0; 
                                $data["message"] = $this->lang->line('invalid_file_size');
                                
                            }
                        }

                    }
            	}
      
      
}