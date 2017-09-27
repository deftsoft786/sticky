<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller{
    public function __construct() {
        parent::__construct();
         
         $this->load->library(array('datatables','tank_auth','form_validation'));
         $this->lang->load('tank_auth');
         $this->load->helper(array('form','url'));
          $this->load->model('user_model');
        
    }
    
    /**
     * function for load index of user
     */
    
    public function index()
    {
        $data["admin_data"] = $this->verify_for_direct_request();
        
        $data['title'] = 'Users';
        $this->load->view('includes/inner_header', $data);
        $this->load->view('user/user_list');
        $this->load->view('includes/inner_footer');
    }
    
    
    public function get_user_list()
    {
        $this->verify_for_direct_request();
        
         $this->datatables->select('users.email,users.created,users.id,users.banned')
                          ->from('users');

        echo $this->datatables->generate();
        
    }
    
    public function view_user($user_id)
    {
        $this->verify_for_ajax_request();
        $data["details"] = $this->user_model->view_user($user_id);
        $this->load->view('user/view_user', $data);
    }
    
    
    
    public function ban_user()
    {
       
        $data["admin_data"] = $this->verify_for_direct_request();
        
        $this->form_validation->set_rules('ban_reason', 'Ban Reason', 'trim|required|xss_clean');
        
        if ($this->form_validation->run()) { // validation ok
        
        $is_ban = $this->user_model->ban_user();
        if ($is_ban) {
            $result["status"] = 1;
            $result["message"] = $this->lang->line('user_ban_success');
        } else {
            $result["status"] = 0;
            $result["message"] = $this->lang->line('update_error');
        }

       
        }
        else
        {
            $result["status"] = 0;
            $result["message"] = validation_errors();
        }
       
         echo json_encode($result);
        die();
    }
    
    public function un_ban_user($user_id)
    {
        $data["admin_data"] = $this->verify_for_direct_request();
        $is_un_ban = $this->user_model->un_ban_user($user_id);
        if ($is_un_ban) {
            $result["status"] = 1;
            $result["message"] = $this->lang->line('user_un_ban_success');
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
     * */
    private function verify_for_direct_request() {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
            die();
        }
        if (!$this->tank_auth->is_admin() && !$this->tank_auth->is_mod()) {
            redirect('/auth/login/');
            die();
        }

        return $this->session->all_userdata();
    }

    /**
     * Verify if user is logged in and is admin (for ajax requests)
     * 
     * */
    private function verify_for_ajax_request() {
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

