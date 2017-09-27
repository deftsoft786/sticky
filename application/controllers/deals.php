<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Deals extends CI_Controller
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
        $this->load->model('deals_model');
    }
    /**
   * Loads the Deals list core
   *
   * @return void
   */
  function index()
  {
        $data["admin_data"] = $this->verify_for_direct_request();
        $data["title"]  = "Deals";
         
        $this->load->view('includes/inner_header', $data);
        $this->load->view('manage_stores/edit_stores', $data);
        $this->load->view('includes/inner_footer', $data);
  }




    /**
    * Load Deals list for datatable
    *
    * @return json
    */
  function get_deals_list($store_id)
    {
        $data["admin_data"] = $this->verify_for_direct_request();
        $data=array('deals.is_deleted'=>0,'deals.store_id'=>$store_id);
        $this->datatables->select('deal,v2_stores.store_name,deals.start_time,deals.end_time,deals.status,deals.deal_id')
        ->join('v2_stores', 'v2_stores.store_id = deals.store_id', 'LEFT')
        ->from('deals')->where($data);
        echo $this->datatables->generate();
    }
     /**
     * Generate deal for view deal details
     * @param int
     * @return html
     */
    public function view_deals($deal_id)
    {
        $this->verify_for_ajax_request();
        $data["details"] = $this->deals_model->view_deal($deal_id);        
        $this->load->view('manage_stores/view_deal', $data);
    }
    /**         *
     * Edit deal 
     * @param int
     * @return 
     * */
    function edit_deal($deal_id)
    {
        
        $data["admin_data"] = $this->verify_for_direct_request();        
       $data["deals"] = $this->deals_model->view_deal($deal_id); 
       //get all product categories list
        $product_category_opt['0'] = '-- Select Product Category --';
        if($this->deals_model->get_product_categories_list())                                                                                                     
        $data['product_categories'] = $product_category_opt + $this->deals_model->get_product_categories_list() ; 
        else
        $data['product_categories']=$product_category_opt;       
        
        $this->load->view('manage_stores/edit_deal', $data);
    }
    /**
     * Update deal
     * @param  int
     * @return void
     */
    function update_deal($deal_id)
    {
       $data["admin_data"] = $this->verify_for_direct_request();
              
        $this->form_validation->set_rules('deal_edit', 'Deal','trim|required|xss_clean');
       $this->form_validation->set_rules('deal_slug', 'Deal Slug','trim|required|xss_clean');
       $start = $this->input->post('start_time_edit');
       $end = $this->input->post('end_time_edit');
        if ($this->form_validation->run()) { // validation ok
            if($this->chk_unique_slug($deal_id))//check unique slug
            { 
               
                 if($this->deals_model->update_deal($deal_id)){//update data
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
     * Add Deal
     * @param int
     * @return void
     * */
     function add($store_id,$region_id,$sub_region_id)
     {
       $data["admin_data"] = $this->verify_for_direct_request();
       $this->form_validation->set_rules('deal', 'Deal','trim|required|xss_clean');
       $unique_name = $this->tank_auth->seo_friendly_url($this->input->post('deal'));
       $start = $this->input->post('start_time');
       $end = $this->input->post('end_time');
      if ($this->form_validation->run()) {
                 if ($this->deals_model->insert_deal_details($this->tank_auth->get_user_id(),$unique_name,$store_id,$region_id,$sub_region_id)) {
                        $result["status"] = 1;
                        $result["message"] = $this->lang->line('new_deal_added', 'tank_auth');
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
                die;
                
     }
     function do_upload()
	           {
	               
                            
	               
	            $directory=$this->input->post('path');
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
	 * Delete Deal
	 *
	 * @param	int
	 * @return	void
	 */
    public function delete($deal_id)
    {
        
        $data["admin_data"] = $this->verify_for_direct_request();
        
        $is_deleted = $this->deals_model->delete_deal($this->tank_auth->get_user_id(),$deal_id);
        if($is_deleted)
        {
         $result["status"] = 1; 
         $result["message"] = $this->lang->line('deal_delete_success');
        }
        else
        {
           $result["status"] = 0; 
           $result["message"] = $this->lang->line('update_error');
        }  
       echo json_encode($result);
       die();     
    }
    /**
     * Disable Region
     *
     * @param	int
     * @return	void
     */
    public function disable_deal($deal_id)
    { 
            $data["admin_data"] = $this->verify_for_direct_request();
            $is_deleted = $this->deals_model->disable_deal($deal_id);
            if ($is_deleted) {
                $result["status"] = 1;
                $result["message"] = $this->lang->line('deal_disable_success');
            } else {
                $result["status"] = 0;
                $result["message"] = $this->lang->line('update_error');
            }
        
        echo json_encode($result);
        die();
    }  
    /**
     * Enable Region
     *
     * @param	int
     * @return	void
     */
    public function enable_deal($deal_id)
    {
            $data["admin_data"] = $this->verify_for_direct_request();
            $is_deleted = $this->deals_model->enable_deal($deal_id);
            if ($is_deleted) {
                $result["status"] = 1;
                $result["message"] = $this->lang->line('deal_enable_success');
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
    
    function chk_unique_slug($deal_id)
    {
         $name = $this->input->post('unique_name');       
         $unique_name = $this->tank_auth->seo_friendly_url($name);
         if($this->deals_model->chk_unique_slug($unique_name,$deal_id)) // topic slug exist than true else false
         return false;          
         else         
         return true;                
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