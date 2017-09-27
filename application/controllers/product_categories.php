<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Product_categories extends CI_Controller
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
        $this->load->model('product_categories_model');
    }
    /**
   * Loads the Product Category list core
   *
   * @return void
   */
  function index()
  {
        $data["admin_data"] = $this->verify_for_direct_request();
        $data["title"]  = "Product Categories";
        $data["product_units"]= $this->product_categories_model->get_all_units();
         
        $this->load->view('includes/inner_header', $data);
        $this->load->view('product_category/product_category_list', $data);
        $this->load->view('includes/inner_footer', $data);
  }




    /**
    * Load Products list for datatable
    *
    * @return json
    */
  function get_product_category_list()
    {
        $data["admin_data"] = $this->verify_for_direct_request();
        $this->verify_for_ajax_request();
        $data=array('product_categories.is_deleted'=>0);
        $this->datatables->select('product_category_name,v2_users.role,product_categories.created,product_categories.status,product_category_id')
        ->join('v2_users', 'v2_users.id = product_categories.created_by', 'LEFT')        
        ->from('product_categories')->where($data);
        echo $this->datatables->generate();
    }
    /**
     * Generate product category for view product category details
     * @param int
     * @return html
     */
    public function view_product_category($cat_id)
    {
        $this->verify_for_ajax_request();
        $data["details"] = $this->product_categories_model->view_product_category($cat_id);
        $data["product_units"]=$this->product_categories_model->get_units_by_cat_id($cat_id);
        $this->load->view('product_category/view_product_category', $data);
    }
     /**         *
     * Edit Product Ctegory
     * @param int
     * @return 
     * */
    function edit_product_category($cat_id)
    {
        $data["admin_data"] = $this->verify_for_direct_request();        
        $data["details"] = $this->product_categories_model->view_product_category($cat_id);
        $data["product_units"]=$this->product_categories_model->get_units_by_cat_id($cat_id);
         $data["product_all_units"]= $this->product_categories_model->get_all_units();       
        
        
        $this->load->view('product_category/edit_product_category', $data);
    }
    /**
     * Update product category information
     * @param  int
     * @return void
     */
    function update($cat_id)
    {
        $data["admin_data"] = $this->verify_for_direct_request();  
        $this->form_validation->set_rules('product_cat_name_edit', 'Category Name','trim|required|xss_clean');
        if ($this->form_validation->run()) { // validation ok
                 if ($this->product_categories_model->update_product_category($cat_id)) {
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
     * Add Product category
     * @param int
     * @return void
     * */
     function add()
     {

       $data["admin_data"] = $this->verify_for_direct_request();
       $this->form_validation->set_rules('product_cat_name', 'Category Name','trim|required|xss_clean');
        if ($this->form_validation->run()) {
                 if ($this->product_categories_model->insert_product_cat_details($this->tank_auth->get_user_id())) {
                        $result["status"] = 1;
                        $result["message"] = $this->lang->line('new_category_added', 'tank_auth');
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
      /**         
    * load delete product category
    * @param int
    * @return html
    * */
    function delete_product_category($cat_id)
    {
        $data["admin_data"] = $this->verify_for_direct_request();
        
        
        $product_opt['0'] = '-- Select Product Category --';
        if($this->product_categories_model->product_categories($cat_id))                                                                                                     
        $data['product_categories'] = $product_opt +@$this->product_categories_model->product_categories($cat_id) ;
        else
        $data['product_categories']=$product_opt;
       
        $data["cat_id"]=$cat_id;
        $this->load->view('product_category/delete_product_category', $data);
    }
    
     /**
	 * Delete Product Category
	 *
	 * @param	int
	 * @return	void
	 */
   
     function delete($cat_id)
     {
        $data["admin_data"] = $this->verify_for_direct_request();  
        if ($cat_id) { 

        if($this->input->post('delete_cat')==0)
        {
        
        $this->form_validation->set_rules('product_category_id', 'Category Name', 'trim|greater_than[0]|required|xss_clean');
        
                if ($this->form_validation->run()) { // validation ok
       
                    if ($this->product_categories_model->delete_product_category($cat_id)) {
                    $result["status"] = 1;
                    $result["message"] = $this->lang->line('category_delete_success');

                     } else {
                    $result["status"] = 0;
                    $result["message"] = $this->lang->line('update_error');
                    }
                }else {
                    $data = validation_errors();
                    $result["status"] = 0;
                    $result["message"] = $data;
                        }
        }else{
                if($this->input->post('delete_cat')==1)
                {
                    if ($this->product_categories_model->delete_product_category($cat_id)) {
                    $result["status"] = 1;
                    $result["message"] = $this->lang->line('category_delete_success');

                    } else {
                    $result["status"] = 0;
                    $result["message"] = $this->lang->line('update_error');
                            }
                }    
            }
           
            
            
        }
        
            
        echo json_encode($result);
        die();
     }
 
    /**
     * Disable Product Categories
     *
     * @param	int
     * @return	void
     */
    public function disable_product_category($cat_id)
    { 
            $data["admin_data"] = $this->verify_for_direct_request();
            $is_deleted = $this->product_categories_model->disable_product_category($cat_id);
            if ($is_deleted) {
                $result["status"] = 1;
                $result["message"] = $this->lang->line('category_disable_success');
            } else {
                $result["status"] = 0;
                $result["message"] = $this->lang->line('update_error');
            }
        
        echo json_encode($result);
        die();
    }  
    /**
     * Enable Product Category
     *
     * @param	int
     * @return	void
     */
    public function enable_product_category($cat_id)
    {
            $data["admin_data"] = $this->verify_for_direct_request();
            $is_deleted = $this->product_categories_model->enable_product_category($cat_id);
            if ($is_deleted) {
                $result["status"] = 1;
                $result["message"] = $this->lang->line('category_enable_success');
            } else {
                $result["status"] = 0;
                $result["message"] = $this->lang->line('update_error');
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