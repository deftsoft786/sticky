<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_controller {

    function __construct() {
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('security');
        $this->load->library('tank_auth');
        $this->load->library('form_validation');
       
    }

    public function index() {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {

            $data['user_id'] = $this->tank_auth->get_user_id();
            $data["admin_data"] = $this->session->all_userdata();
            $data["title"] = "Dashboard";
            $this->load->view('includes/inner_header', $data);
            $this->load->view('dashboard', $data);
            $this->load->view('includes/inner_footer', $data);
        }
    }

   
}
