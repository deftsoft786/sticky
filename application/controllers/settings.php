<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class settings extends CI_controller
{
    function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
        $this->load->model('settings_model');
        date_default_timezone_set('America/New_York');
	}
        
        public function index()
        {
            if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		      } else {
      
            $data['user_id']	= $this->tank_auth->get_user_id();
      	    $data["admin_data"] = $this->session->all_userdata();     
            $data["profile_info"] = $this->settings_model->get_user_by_id($this->tank_auth->get_user_id());            
			
            $data["title"]  = "Settings";
            $this->load->view('includes/inner_header', $data);
            $this->load->view('settings', $data);
            $this->load->view('includes/inner_footer', $data);
            
          
		}
        }
        
        
        
        public function profile_edit()
        {
            if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
                    
                        
                        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean');
                        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|xss_clean');
                        $this->form_validation->set_rules('zip', 'Zipcode', 'trim|xss_clean');
                       
                        
                        $data['errors'] = array();
                    
                       if ($this->form_validation->run()) {
                                if($inserted_rows = $this->settings_model->update_user_profile($this->tank_auth->get_user_id(),
                                                                                               $this->form_validation->set_value('first_name'),
                                                                                               $this->form_validation->set_value('last_name'),
                                                                                               $this->form_validation->set_value('zip')
                                                                                               ))                                                          
                                  {
                                     $this->_show_message('Your changes has been saved.','success','settings');
                                  }
                                  else
                                  {
                                     $this->_show_message('Error updating changes. Please try again later','error','settings');
                                  }
                       }
                       else
                       {
                           $errors = $this->tank_auth->get_error_message();
    					   foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);    
                       }
                          
                      
                           
                           
                           
            $data['user_id']	= $this->tank_auth->get_user_id();
			$data["admin_data"] = $this->session->all_userdata(); 
            $data["profile_info"] = $this->settings_model->get_user_by_id($this->tank_auth->get_user_id());
                        
            $this->load->view('header.php', $data);
			$this->load->view('settings', $data);
            $this->load->view('footer.php', $data);
                	
		}
         }
         
         
         
    


        
                
                
          
                
     /**
	 * Show info message
	 *
	 * @param	string
	 * @return	void
	 */
	function _show_message($message,$css_class="info",$redirect='/auth/')
	{
		$this->session->set_flashdata('message', $message);
        $this->session->set_flashdata('class', $css_class);
		redirect($redirect);
	}   
}