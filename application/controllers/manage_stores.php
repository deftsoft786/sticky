<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Manage_stores extends CI_Controller
{
    
    
	function __construct()
	{
		parent::__construct();
        $this->load->helper(array('form', 'url'));
		$this->load->library('tank_auth');
        $this->load->library('form_validation');
		$this->load->library('security');
        $this->load->library('datatables');
        $this->lang->load('tank_auth');
        $this->load->model('manage_stores_model');
        $this->load->model('sub_regions_model');
         $this->load->model('deals_model');
    }
    

    /**
   * Loads the Store owner list core
   *
   * @return void
   */
  function index()
  {
        $data["admin_data"] = $this->verify_for_direct_request();
        $data["title"]  = "Manage Stores";
        //get all region list
        $region_opt['0'] = '-- Select Region --';
        if($this->sub_regions_model->get_region_list())                                                                                                     
        $data['regions'] = $region_opt + $this->sub_regions_model->get_region_list() ; 
        else
        $data['regions']=$region_opt;
        $sub_region_opt['0'] = '-- Select Sub Region --';
        $data['sub_regions'] = $sub_region_opt;
        
        $this->load->view('includes/inner_header', $data);
        $this->load->view('manage_stores/store_list', $data);
        $this->load->view('includes/inner_footer', $data);
  }




    /**
    * Load Store  list for datatable
    *
    * @return json
    */
  function get_store_list()
    {
        $data["admin_data"] = $this->verify_for_direct_request();
        $looged_in_user_id=$this->tank_auth->get_user_id();
        $add_on = "v2_stores.created_by = $looged_in_user_id AND v2_users.role = 3 AND v2_stores.is_deleted <> 1";
        $this->datatables->select('store_name,sub_regions.sub_region_name,regions.region_name,v2_stores.created,v2_stores.status,v2_stores.store_id')
        ->join('v2_users', 'v2_stores.created_by = v2_users.id','LEFT')
        ->join('v2_user_profiles', 'v2_stores.created_by = v2_user_profiles.user_id','LEFT')
        ->join('sub_regions', 'v2_stores.sub_region_id = sub_regions.sub_region_id','LEFT')
        ->join('regions', 'v2_stores.region_id = regions.region_id','LEFT')        
        ->from('v2_stores')
        ->where($add_on);
        echo $this->datatables->generate();
    }
    /**
     * Get store details for view model
     * @param int
     * @return html
     */
    public function view_store($store_id)
    {
        $this->verify_for_ajax_request();
        $owner_id=$this->tank_auth->get_user_id();         
       if (!$this->tank_auth->is_owner($store_id,$owner_id)) {
            echo "<div class='alert alert-danger'>Invalid Access Or Session Timed Out</div>";
            die();
            } 
        
        $data["details"] = $this->manage_stores_model->view_store($store_id);                    
        $this->load->view('manage_stores/view_store', $data);
    }
    /**         *
     * Edit Store 
     * @param int
     * @return 
     * */
    function edit($store_id)
    {
        $owner_id=$this->tank_auth->get_user_id();
         if (!$this->tank_auth->is_owner($store_id,$owner_id)) {
           redirect('/auth/login/');
            die();
            }  
        
        $data["admin_data"] = $this->verify_for_direct_request();
         $data["title"]  = "Manage Store";
        $data["details"] = $this->manage_stores_model->view_store($store_id);
       if($data["details"]){
           //get all region list
        $region_opt['0'] = '-- Select Region --';
        if($this->sub_regions_model->get_region_list())                                                                                                     
        $data['regions'] = $region_opt + $this->sub_regions_model->get_region_list() ; 
        else
        $data['regions']=$region_opt;
        
        $sub_region_opt['0'] = '-- Select Sub Region --';
        if($this->sub_regions_model->get_sub_region_by_region_id($data['details'][0]['region_id'])) 
        $data['sub_regions'] =$sub_region_opt + $this->sub_regions_model->get_sub_region_by_region_id($data['details'][0]['region_id']);
          else
        $data['sub_regions']=$sub_region_opt;
        
        //get woking hours by store id
        $data["w_hours"]=$this->manage_stores_model->get_working_hours($store_id);
        //get all product categories list
        $product_category_opt['0'] = '-- Select Product Category --';
        if($this->deals_model->get_product_categories_list())                                                                                                     
        $data['product_categories'] = $product_category_opt + $this->deals_model->get_product_categories_list() ; 
        else
        $data['product_categories']=$product_category_opt;
        
        $this->load->view('includes/inner_header', $data);
        $this->load->view('manage_stores/edit_store', $data);
        $this->load->view('includes/inner_footer', $data);
        }else
        {
           redirect('/auth/login/');  
        }
    }
    /**
     * Update store basic info
     * @param  int
     * @return void
     */
    function update_store_basic_info($store_id)
    {
       $data["admin_data"] = $this->verify_for_direct_request();
       $owner_id=$this->tank_auth->get_user_id();         
       if (!$this->tank_auth->is_owner($store_id,$owner_id)) {
            echo "<div class='alert alert-danger'>Invalid Access Or Session Timed Out</div>";
            die();
            } 
       //print_r($_POST);
       $latitude=$this->input->post('latitude');       
       $longitude = $this->input->post('longitude');
       $old_latitude = $this->input->post('old_latitude');       
       $old_longitude = $this->input->post('old_longitude');
      
       if($latitude == $old_latitude)
       $latitude=$this->input->post('old_latitude');
       else
       $latitude=$this->input->post('latitude');
       
       if($longitude == $old_longitude)       
       $longitude = $this->input->post('old_longitude');
       else       
       $longitude = $this->input->post('longitude');
        
       $this->form_validation->set_rules('dispensary_name', 'Dispensary Name','trim|required|xss_clean');
       $this->form_validation->set_rules('street', 'Street','trim|required|xss_clean');
       $this->form_validation->set_rules('unique_name', 'Store Slug','trim|required|xss_clean');       
       $this->form_validation->set_rules('city', 'City','trim|required|xss_clean');
       $this->form_validation->set_rules('state', 'State','trim|required|xss_clean');
       $this->form_validation->set_rules('zip_code', 'Zip Code','trim|required|xss_clean');
       $this->form_validation->set_rules('contact_first_name', 'First Name','trim|required|xss_clean');
       $this->form_validation->set_rules('contact_last_name', 'Last Name','trim|required|xss_clean');
       $this->form_validation->set_rules('contact_number', 'Phone Number','trim|required|xss_clean');
       $this->form_validation->set_rules('email', 'Email','trim|required|xss_clean');
       $this->form_validation->set_rules('region_id', 'Region Name','trim|greater_than[0]|required|xss_clean');
       $this->form_validation->set_rules('sub_region_id', 'Sub Region Name','trim|greater_than[0]|required|xss_clean');
       $this->form_validation->set_rules('store_type', 'Store Type','trim|required|xss_clean');
       $this->form_validation->set_rules('latitude', 'Latitude','trim|required|xss_clean');
       $this->form_validation->set_rules('longitude', 'Longitude','trim|required|xss_clean');
        
        if ($this->form_validation->run()) { // validation ok
            if($this->chk_unique_slug($store_id))//check unique slug
            {     
                 if ($this->manage_stores_model->update_store_basic_info($store_id,$latitude,$longitude)) {
                    $result["status"] = 1;
                    $result["message"] = $this->lang->line('update_success');

                } else {
                    $result["status"] = 0;
                    $result["message"] = $this->lang->line('update_error');
                }             
            }else{//if unique slug already exists
                   $result["status"] = 0;
                   $result["message"] = $this->lang->line('slug_exists', 'tank_auth');
            }
        } else {
            $data = validation_errors();
            $result["status"] = 0;
            $result["message"] = $data;

        }
        echo json_encode($result);
        die();
    }
     /**
     * Update store profile
     * @param  int
     * @return void
     */
    function update_store_profile($store_id)
    {
       $data["admin_data"] = $this->verify_for_direct_request();
       $owner_id=$this->tank_auth->get_user_id();         
       if (!$this->tank_auth->is_owner($store_id,$owner_id)) {
            echo "<div class='alert alert-danger'>Invalid Access Or Session Timed Out</div>";
            die();
            }         
       $this->manage_stores_model->update_working_hours($store_id);      
      if($this->manage_stores_model->update_store_profile($store_id))
       {    $result["status"] = 1;
            $result["message"] = $this->lang->line('update_success');
       } else {
            $result["status"] = 0;
            $result["message"] = $this->lang->line('update_error');
            }       
        echo json_encode($result);
        die();
    }
    /**
     * Add store
     * @param int
     * @return void
     * */
     function add()
     {
       $data["admin_data"] = $this->verify_for_direct_request();
       $this->form_validation->set_rules('dispensary_name', 'Dispensary Name','trim|required|xss_clean');
       $this->form_validation->set_rules('street', 'Street','trim|required|xss_clean');
       $this->form_validation->set_rules('city', 'City','trim|required|xss_clean');
       $this->form_validation->set_rules('state', 'State','trim|required|xss_clean');
       $this->form_validation->set_rules('zip_code', 'Zip Code','trim|required|xss_clean');
       $this->form_validation->set_rules('contact_first_name', 'First Name','trim|required|xss_clean');
       $this->form_validation->set_rules('contact_last_name', 'Last Name','trim|required|xss_clean');
       $this->form_validation->set_rules('contact_number', 'Phone Number','trim|required|xss_clean');
       $this->form_validation->set_rules('email', 'Email','trim|required|xss_clean');
       $this->form_validation->set_rules('region_id', 'Region Name','trim|greater_than[0]|required|xss_clean');
       $this->form_validation->set_rules('sub_region_id', 'Sub Region Name','trim|greater_than[0]|required|xss_clean');
       $this->form_validation->set_rules('store_type', 'Store Type','trim|required|xss_clean');
       $unique_name = $this->tank_auth->seo_friendly_url($this->input->post('dispensary_name'));
       if ($this->form_validation->run()) {
                    if ($this->manage_stores_model->insert_store_details($this->tank_auth->get_user_id(),$unique_name)) {
                        $result["status"] = 1;
                        $result["message"] = $this->lang->line('new_store_added', 'tank_auth');
                    } else {
                        $result["status"] = 0;
                        $result["message"] = $this->lang->line('insert_error', 'tank_auth');
                    }

                } else {
                    $data = validation_errors();
                    $result["status"] = 0;
                    $result["message"] = $data;
                }
                echo json_encode($result);
                
     }
    /**
     * Get sub region dropdown by region id
     * @param int
     * @return array
     * */
     function get_sub_region_by_region_id($region_id)
     {
        $this->verify_for_ajax_request();
        $subcat = $this->sub_regions_model->get_sub_region_by_region_id($region_id);
        if ($subcat){
            $result["data"]=$subcat;
            echo json_encode($result);
            }
        else {
            $result["status"] = 0;
            $result["data"]["No categories available"] = "0";
            echo json_encode($result);
        }
     }
     /**
     * delete store
     * @param int
     * @return void
     * */
    function delete_store($store_id)
    {
         $data["admin_data"] = $this->verify_for_direct_request();
         $owner_id=$this->tank_auth->get_user_id();         
       if (!$this->tank_auth->is_owner($store_id,$owner_id)) {
            echo "<div class='alert alert-danger'>Invalid Access Or Session Timed Out</div>";
            die();
            } 
         $is_deleted = $this->manage_stores_model->delete_store($this->tank_auth->get_user_id(),$store_id);
            if ($is_deleted) {
                $result["status"] = 1;
                $result["message"] = $this->lang->line('store_delete_success');
            } else {
                $result["status"] = 0;
                $result["message"] = $this->lang->line('delete_error');
            }
        
        echo json_encode($result);
        die();
    }
    /**
     * Deactivate Store
     *
     * @param	int
     * @return	void
     */
    public function deactivate_store($store_id)
    { 
            $data["admin_data"] = $this->verify_for_direct_request();
            $owner_id=$this->tank_auth->get_user_id();         
       if (!$this->tank_auth->is_owner($store_id,$owner_id)) {
            echo "<div class='alert alert-danger'>Invalid Access Or Session Timed Out</div>";
            die();
            } 
            $is_deleted = $this->manage_stores_model->deactivate_store($store_id);
            if ($is_deleted) {
                $result["status"] = 1;
                $result["message"] = $this->lang->line('store_inactive_success');
            } else {
                $result["status"] = 0;
                $result["message"] = $this->lang->line('update_error');
            }
        
        echo json_encode($result);
        die();
    }
    
    
    
    /**
     * Active Store
     *
     * @param	int
     * @return	void
     */
    public function active_store($store_id)
    {
            $data["admin_data"] = $this->verify_for_direct_request();
            $owner_id=$this->tank_auth->get_user_id();         
       if (!$this->tank_auth->is_owner($store_id,$owner_id)) {
            echo "<div class='alert alert-danger'>Invalid Access Or Session Timed Out</div>";
            die();
            } 
            $is_deleted = $this->manage_stores_model->active_store($store_id);
            if ($is_deleted) {
                $result["status"] = 1;
                $result["message"] = $this->lang->line('store_active_success');
            } else {
                $result["status"] = 0;
                $result["message"] = $this->lang->line('update_error');
            }
       
        echo json_encode($result);
        die();
    }
    /**
     * check unique slug 
     * @param type $name
     * @param type $id
     */
    
    function chk_unique_slug($store_id)
    {
         $name = $this->input->post('unique_name');       
         $unique_name = $this->tank_auth->seo_friendly_url($name);
         if($this->manage_stores_model->chk_unique_slug($unique_name,$store_id)) // topic slug exist than true else false
         return false;          
         else         
         return true;                
    }
    function do_upload()
	           {
	               
	            $directory=$this->input->post('path_deal');
                $size_limit = 5242880; //5MB   
		        $output_dir ="uploads/".$directory."/";
                $file_name = time()."_".$this->tank_auth->get_user_id();
                    if(isset($_FILES["image_file"]))
                    {
                        //Filter the file types , if you want.
                        if ($_FILES["image_file"]["error"] > 0)
                        {
                           show_message('0',$this->lang->line('error_ocured'));
                            echo json_encode($result);
                            die(); 
                        }
                        else
                        {
                            
                            $path = $_FILES['image_file']['name'];
                            $ext = ".".pathinfo($path, PATHINFO_EXTENSION);
                            if($_FILES["image_file"]["size"] < $size_limit){
                                
                                if($_FILES['image_file']['type']=="application/vnd.ms-excel" || $_FILES['image_file']['type']=="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" || $_FILES['image_file']['type']=="application/pdf" || $_FILES['image_file']['type']=="application/vnd.openxmlformats-officedocument.wordprocessingml.document" || $_FILES['image_file']['type']=="application/msword" || $_FILES['image_file']['type']=="image/jpg" || $_FILES['image_file']['type']=="image/jpeg" || $_FILES['image_file']['type']=="image/pjpeg" || $_FILES['image_file']['type']=="image/gif" || $_FILES['image_file']['type']=="image/png" )
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
                                         $image->resizeToWidth(620);
                                       
                                        if($image->getHeight()>480)
                                         $image->resizeToHeight(480);
                                         
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
       /**
      * Verify if user is logged in and is admin (for direct requests)
      * 
      **/
      private function verify_for_direct_request()
      {
        if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
            die();
		} 
        if(!$this->tank_auth->is_store_owner()){
                redirect('/auth/login/'); 
                die();
        }
        
        return  $this->session->all_userdata();   
      }   


     /**
      * Verify if user is logged in and is admin (for ajax requests)
      * 
      **/
      private function verify_for_ajax_request()
      {
        if (!$this->tank_auth->is_logged_in()) {
            echo "<div class='alert alert-danger'>Invalid Access Or Session Timed Out</div>";
            die();
              }
              
         if (!$this->tank_auth->is_store_owner()) {
            echo "<div class='alert alert-danger'>Invalid Access Or Session Timed Out</div>";
            die();
              }  
      } 
        
    
    }
    ?>