<?php

/**
 * @author justaddwater
 * @copyright 2015
 */

class sub_regions extends CI_Controller
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
        $this->load->model('sub_regions_model');
        $this->load->library('datatables');             
	}
    
    /**
     * Sub Regions list
     *
     * @return void
     */
    function index()
    {
        $data["admin_data"] = $this->verify_for_direct_request();

        $data["title"] = "Sub Regions";
        $region_opt['0'] = '-- Select Region --';
        if($this->sub_regions_model->get_region_list())                                                                                                     
        $data['regions'] = $region_opt + $this->sub_regions_model->get_region_list() ; 
        else
        $data['regions']=$region_opt;
        $this->load->view('includes/inner_header', $data);
        $this->load->view('sub_regions/sub_region_list', $data);
        $this->load->view('includes/inner_footer', $data);
    }
     /**
     * Get sub regions list by datatable
     *
     * @return void
     */
    function get_sub_region_list()
    {
        $this->verify_for_ajax_request();
         $add_on = "sub_regions.is_deleted <> 1";
        $this->datatables->select('sub_regions.sub_region_name,regions.region_name,v2_users.role,sub_regions.created,sub_regions.disabled,sub_regions.sub_region_id')
             -> join('regions', 'regions.region_id = sub_regions.region_id', 'LEFT')
             -> join('v2_users', 'v2_users.id = sub_regions.created_by', 'LEFT')
             -> from('sub_regions')
             ->where($add_on);
            
        echo $this->datatables->generate();

    }
    /**
     * Generate sub region for view sub region details
     * @param int
     * @return html
     */
    public function view_sub_region($sub_region_id)
    {
        $this->verify_for_ajax_request();
        $data["details"] = $this->sub_regions_model->view_sub_region($sub_region_id);
        $this->load->view('sub_regions/view_sub_region', $data);
    }
     /**         *
     * Edit Sub Region 
     * @param int
     * @return 
     * */
    function edit_sub_region($sub_region_id)
    {
        $data["admin_data"] = $this->verify_for_direct_request();
        
        $region_opt['0'] = '-- Select Region --';
        if($this->sub_regions_model->get_region_list())                                                                                                     
        $data['regions'] = $region_opt + $this->sub_regions_model->get_region_list() ; 
        else
        $data['regions']=$region_opt;   
        
        $data["details"] = $this->sub_regions_model->view_sub_region($sub_region_id);
        $this->load->view('sub_regions/edit_sub_region', $data);
    }
    /**
     * Update sub region information
     * @param  int
     * @return void
     */
    function update($sub_region_id)
    {
        $data["admin_data"] = $this->verify_for_direct_request();      
       
        $this->form_validation->set_rules('region_id', 'Region Name', 'trim|greater_than[0]|xss_clean');
        $this->form_validation->set_rules('sub_region_name', 'Sub Region Name', 'trim|required|xss_clean');
        
        if ($this->form_validation->run()) { // validation ok
                 if ($this->sub_regions_model->update_sub_region($sub_region_id)) {
                    $result["status"] = 1;
                    $result["message"] = $this->lang->line('update_success');

                } else {
                    $result["status"] = 0;
                    $result["message"] = $this->lang->line('update_error');
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
     * Add sub region
     * @param void
     * @return string
     * */
    function add()
    {
            $data["admin_data"] = $this->verify_for_direct_request();
            $this->form_validation->set_rules('region_id', 'Region Name', 'trim|greater_than[0]| xss_clean');
            $this->form_validation->set_rules('sub_region_name', 'Sub Region Name','trim|required|xss_clean');
             $unique_name = $this->tank_auth->seo_friendly_url($this->input->post('sub_region_name'));
             if ($this->form_validation->run()) {
                    if ($this->sub_regions_model->insert_sub_regions_details($this->tank_auth->get_user_id(),$unique_name)) {

                        $result["status"] = 1;
                        $result["message"] = $this->lang->line('new_sub_region_added', 'tank_auth');
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
                die();
    }
      /**
     * delete sub question
     * @param int
     * @return void
     * */
    function delete_sub_region($sub_region_id)
    {
         $data["admin_data"] = $this->verify_for_direct_request();
         $is_deleted = $this->sub_regions_model->delete_sub_region($this->tank_auth->get_user_id(),$sub_region_id);
            if ($is_deleted) {
                $result["status"] = 1;
                $result["message"] = $this->lang->line('sub_region_delete_success');
            } else {
                $result["status"] = 0;
                $result["message"] = $this->lang->line('delete_error');
            }
        
        echo json_encode($result);
        die();
    }
    /**
     * Disable Sub Region
     *
     * @param	int
     * @return	void
     */
    public function disable_sub_region($sub_region_id)
    { 
            $data["admin_data"] = $this->verify_for_direct_request();
            $is_deleted = $this->sub_regions_model->disable_sub_region($sub_region_id);
            if ($is_deleted) {
                $result["status"] = 1;
                $result["message"] = $this->lang->line('sub_region_disable_success');
            } else {
                $result["status"] = 0;
                $result["message"] = $this->lang->line('update_error');
            }
        
        echo json_encode($result);
        die();
    }
    
    
    
    /**
     * Enable Sub Region
     *
     * @param	int
     * @return	void
     */
    public function enable_sub_region($sub_region_id)
    {
            $data["admin_data"] = $this->verify_for_direct_request();
            $is_deleted = $this->sub_regions_model->enable_sub_region($sub_region_id);
            if ($is_deleted) {
                $result["status"] = 1;
                $result["message"] = $this->lang->line('sub_region_enable_success');
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
    
    function chk_unique_slug()
    {
         $name = $this->input->post('sub_region_slug');
         
         
         if(isset($_POST['sub_region_id']))
         {
             $id = $this->input->post('sub_region_id');
         }
         else
         {
             $id = 0;
         }
         $unique_name = $this->tank_auth->seo_friendly_url($name);
         if($this->sub_regions_model->chk_unique_slug($unique_name,$id)) // topic slug exist than true else false
         {
                        $result["status"] = 0;
                        $result["message"] = $this->lang->line('slug_exists', 'tank_auth');
         } 
         else
         {
                        $result["status"] = 1;
                        $result["message"] = $unique_name;
         }
         
         echo json_encode($result);
         die();
             
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
        if(!$this->tank_auth->is_admin() && !$this->tank_auth->is_mod()){
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
              
         if (!$this->tank_auth->is_admin() && !$this->tank_auth->is_mod()) {
            echo "<div class='alert alert-danger'>Invalid Access Or Session Timed Out</div>";
            die();
              }  
      } 
        
    
    
 }
 ?>   