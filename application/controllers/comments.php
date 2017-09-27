<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Comments extends CI_Controller{
    public function __construct() {
        parent::__construct();
         
         $this->load->library(array('datatables','tank_auth','form_validation'));
         $this->lang->load('tank_auth');
         $this->load->helper(array('form','url'));
          $this->load->model('comments_model');
        
    }
    
    /**
     * function for load index of Comment
     */
    
    public function index()
    {
        $data["admin_data"] = $this->verify_for_direct_request();
        
        $data['title'] = 'Reviews';
        $this->load->view('includes/inner_header', $data);
        $this->load->view('comments/comments_list');
        $this->load->view('includes/inner_footer');
    }
    
    
    public function get_comment_list()
    {
        $this->verify_for_direct_request();
        
        $data = array('comments.is_deleted' =>'0');
        
        $this->datatables->select('v2_stores.store_name,users.email,comments.body,comments.created ,comments.comment_id ,comments.status')
                         ->join('users', 'users.id = comments.user_id', 'LEFT')
                         ->join('v2_stores', ' v2_stores.store_id = comments.store_id', 'LEFT')
                          ->where($data)
                         ->from('comments');

        echo $this->datatables->generate();
    }
    
    
    
    public function update_comment_status($comment_id,$status)
    {
        $data["admin_data"] = $this->verify_for_ajax_request();
        $is_update= $this->comments_model->update_comment_status($comment_id,$status);
        if ($is_update) {
            $result["status"] = 1;
             $result["class"] = 'success';
            $result["message"] = $this->lang->line('comment_status_update');
        } else {
            $result["status"] = 0;
            $result["class"] = 'danger';
            $result["message"] = $this->lang->line('update_error');
        }

        echo json_encode($result);
        die();
        
    }
    
    
    public function view_comment($comment_id)
    {
          $this->verify_for_ajax_request();
        $data["details"] = $this->comments_model->view_comment($comment_id);
        $this->load->view('comments/view_comment', $data);
    }
    
        public function delete_comment($comment_id)
    {
        $data["admin_data"] = $this->verify_for_ajax_request();
        $is_delete= $this->comments_model->delete_comment($comment_id);
        if ($is_delete) {
            $result["status"] = 1;
             $result["class"] = 'success';
            $result["message"] = $this->lang->line('comment_delete');
        } else {
            $result["status"] = 0;
            $result["class"] = 'danger';
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
        if (!$this->tank_auth->is_admin()) {
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

        if (!$this->tank_auth->is_admin()) {
            echo "<div class='alert alert-danger'>Invalid Access Or Session Timed Out</div>";
            die();
        }
    }
}

