<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Regions extends CI_Controller
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
        $this->load->model('regions_model');
    }
    /**
   * Loads the Regions list core
   *
   * @return void
   */
  function index()
  {
        $data["admin_data"] = $this->verify_for_direct_request();
        $data["title"]  = "Regions";
        $this->load->view('includes/inner_header', $data);
        $this->load->view('regions/region_list', $data);
        $this->load->view('includes/inner_footer', $data);
  }




    /**
    * Load Regions list for datatable
    *
    * @return json
    */
  function get_region_list()
    {
        $data["admin_data"] = $this->verify_for_direct_request();
        $add_on = "regions.is_deleted <> 1";
        $this->datatables->select('region_name,v2_users.role,regions.created,disabled,region_id')
        ->join('v2_users', 'v2_users.id = regions.created_by', 'LEFT')
        ->from('regions')->where($add_on);
        echo $this->datatables->generate();
    }
    /**
     * Add region
     * @param int
     * @return void
     * */
     function add()
     {
       $data["admin_data"] = $this->verify_for_direct_request();
       $this->form_validation->set_rules('region_name', 'Region Name','trim|required|xss_clean');
        $unique_name = $this->tank_auth->seo_friendly_url($this->input->post('region_name'));
       if ($this->form_validation->run()) {
                    if ($this->regions_model->insert_region_details($this->tank_auth->get_user_id(),$unique_name)) {
                        $result["status"] = 1;
                        $result["message"] = $this->lang->line('new_region_added', 'tank_auth');
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
     * check unique slug 
     * @param type $name
     * @param type $id
     */
    
    function chk_unique_slug()
    {
         $name = $this->input->post('region_slug');
         
         if(isset($_POST['region_id']))
         {
             $id = $this->input->post('region_id');
         }
         else
         {
             $id = 0;
         }
         $unique_name = $this->tank_auth->seo_friendly_url($name);
         if($this->regions_model->chk_unique_slug($unique_name,$id)) // region slug exist than true else false
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
    
    
     /**         *
     * Edit Region 
     * @param region id
     * @return 
     * */
    function edit_region($rid)
    {
        
        $data["admin_data"] = $this->verify_for_direct_request();        
        $data["details"] = $this->regions_model->view_region($rid);
        
        $this->load->view('regions/edit_region', $data);
    }
     /**
     * Update Region information
     *
     * @return void
     */
    function update($rid)
    {
        $data["admin_data"] = $this->verify_for_direct_request();       
         if (!$rid) {
            $result["status"] = 0;
            $result["message"] = "Error occured at this time. Please try again later.";
            echo json_encode($result);
            die();
        }

        $this->form_validation->set_rules('region_name', 'Region Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('unique_name', 'Unique Name','trim|required|xss_clean');
        
        if ($this->form_validation->run()) { // validation ok         
                if ($this->regions_model->update_region($rid)) {
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
	 * Delete Region
	 *
	 * @param	int
	 * @return	void
	 */
    public function delete($rid)
    {
        
        $data["admin_data"] = $this->verify_for_direct_request();
        
        $is_deleted = $this->regions_model->delete_region($this->tank_auth->get_user_id(),$rid);
        if($is_deleted)
        {
         $result["status"] = 1; 
         $result["message"] = $this->lang->line('region_delete_success');
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
    public function disable_region($rid)
    { 
            $data["admin_data"] = $this->verify_for_direct_request();
            $is_deleted = $this->regions_model->disable_region($rid);
            if ($is_deleted) {
                $result["status"] = 1;
                $result["message"] = $this->lang->line('region_disable_success');
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
    public function enable_region($rid)
    {
            $data["admin_data"] = $this->verify_for_direct_request();
            $is_deleted = $this->regions_model->enable_region($rid);
            if ($is_deleted) {
                $result["status"] = 1;
                $result["message"] = $this->lang->line('region_enable_success');
            } else {
                $result["status"] = 0;
                $result["message"] = $this->lang->line('update_error');
            }
       
        echo json_encode($result);
        die();
    }
        /**  
        * Get all regions for sort 
        * @param void
        * 
        * */
       
       public function manage_regions()
            { $data["admin_data"] = $this->verify_for_direct_request();
             
            $data['title'] = 'Manage Regions Display Order';
            $data['regions'] = $this->regions_model->get_regions();
                      
            $this->load->view('includes/inner_header',$data);
            $this->load->view('regions/manage_region_order.php', $data);
            $this->load->view('includes/inner_footer',$data);
             }
       /**
        * Sorting regions
        * 
        * */
              
       public function sorter()
        {
               echo json_encode($this->regions_model->sort_rows());
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