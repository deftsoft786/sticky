<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller
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
        $this->load->model('products_model');
        $this->load->model('deals_model');
    }
    /**
   * Loads the Products list core
   *
   * @return void
   */
  function index()
  {
        $data["admin_data"] = $this->verify_for_direct_request();
        $data["title"]  = "Products";
         
        $this->load->view('includes/inner_header', $data);
        $this->load->view('manage_stores/edit_stores', $data);
        $this->load->view('includes/inner_footer', $data);
  }




    /**
    * Load Products list for datatable
    *
    * @return json
    */
  function get_products_list($store_id)
    {
        $data["admin_data"] = $this->verify_for_direct_request();
        $this->verify_for_ajax_request();
        $data=array('products.is_deleted'=>0,'products.store_id'=>$store_id);
        $this->datatables->select('products.product_name,product_categories.product_category_name,products.created,products.status,products.product_id')
        ->join('product_categories', 'product_categories.product_category_id = products.product_category_id', 'LEFT')
        ->from('products')->where($data);
        echo $this->datatables->generate();
    }
         /**
     * Generate product category for view product category details
     * @param int
     * @return html
     */
    public function view_product($product_id)
    {
        $this->verify_for_ajax_request();
        $data["details"] = $this->products_model->view_product($product_id);
        $data["product_cost"]=$this->products_model->get_cost_by_product_id($product_id);
        $this->load->view('manage_stores/view_product', $data);
    }
    /**         *
     * Edit Product 
     * @param int
     * @return 
     * */
    function edit_product($product_id)
    {
        
        $data["admin_data"] = $this->verify_for_direct_request();        
       $data["details"] = $this->products_model->view_product($product_id); 
       //get all product categories list
        $product_category_opt['0'] = '-- Select Product Category --';
        if($this->deals_model->get_product_categories_list())                                                                                                     
        $data['product_categories'] = $product_category_opt + $this->deals_model->get_product_categories_list() ; 
        else
        $data['product_categories']=$product_category_opt; 
        $data["product_cost"]=$this->products_model->get_cost_by_product_id($product_id);
             
        
        $this->load->view('manage_stores/edit_product', $data);
    }
    /**
     * Update deal
     * @param  int
     * @return void
     */
    function update($product_id,$product_cat_id)
    {
  
       $data["admin_data"] = $this->verify_for_direct_request();             
       $this->form_validation->set_rules('product_name_edit', 'Product Name','trim|required|xss_clean');
       $this->form_validation->set_rules('product_category_id', 'Product Category', 'trim|greater_than[0]|xss_clean');
      
        if ($this->form_validation->run()) {  //validation ok
                   
                 if($this->products_model->update_product($product_id,$product_cat_id)){//update data
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
     * Add Product
     * @param int
     * @return void
     * */
     function add($store_id,$product_cat_id)
     {
       $data["admin_data"] = $this->verify_for_direct_request();
       $this->form_validation->set_rules('product_name', 'Product Name','trim|required|xss_clean');
       $this->form_validation->set_rules('product_category_id', 'Product Category', 'trim|greater_than[0]|xss_clean');
       if ($this->form_validation->run()) {
                 if ($this->products_model->insert_product_details($this->tank_auth->get_user_id(),$store_id,$product_cat_id)) {
                        $result["status"] = 1;
                        $result["message"] = $this->lang->line('new_product_added', 'tank_auth');
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
     * Get all unit rows for input box
     * @param int
     * @return html
     * */
     
     function get_unit_count($store_id,$product_cat_id)
     {
       $data["admin_data"] = $this->verify_for_direct_request();
       $number_of_units=$this->products_model->get_unit_count($product_cat_id);
       if($number_of_units)
       {
        $i=1;
        $html = '<div class="row">';
        foreach($number_of_units as $var)
        {
            $html .= '<div class="col-md-3"><div class="form-group"><input type="text" name="product_cost[]"id="product_name_'.$i.'" value=""  maxlength="80" class="form-control product_unit" placeholder="'.$var["unit_label"].'"><input type="hidden" name="product_units[]" value="'.$var["product_unit_id"].'" id="product_cost_hidden" maxlength="80" class="form-control" placeholder="Product Cost"></div></div>';
            $i++;
        }
        $html .= '</div>'; 
        
        $result["status"] = 1;
        $result["message"] =$html ;
        
       }else{
        $result["status"] = 0;
        $result["message"] ='No units found';
        
       }
       echo json_encode($result);
                die;
     }

 /**
	 * Delete Product Category
	 *
	 * @param	int
	 * @return	void
	 */
    public function delete($product_id)
    {
        
        $data["admin_data"] = $this->verify_for_direct_request();
        
        $is_deleted = $this->products_model->delete_product($this->tank_auth->get_user_id(),$product_id);
        if($is_deleted)
        {
         $result["status"] = 1; 
         $result["message"] = $this->lang->line('product_delete_success');
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
     * Disable Product Categories
     *
     * @param	int
     * @return	void
     */
    public function disable_product($product_id)
    { 
            $data["admin_data"] = $this->verify_for_direct_request();
            $is_deleted = $this->products_model->disable_product($product_id);
            if ($is_deleted) {
                $result["status"] = 1;
                $result["message"] = $this->lang->line('product_disable_success');
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
    public function enable_product($product_id)
    {
            $data["admin_data"] = $this->verify_for_direct_request();
            $is_deleted = $this->products_model->enable_product($product_id);
            if ($is_deleted) {
                $result["status"] = 1;
                $result["message"] = $this->lang->line('product_enable_success');
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