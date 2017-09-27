<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Image_upload extends CI_Controller {

    public function __construct() {
        parent::__construct();
       
        $this->load->helper(array('url','html','form'));
        $this->load->library('tank_auth');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->lang->load('tank_auth');
        $this->load->model('image_upload_model');
    }

    public function index($store_id)
    {
         $data['user_data'] = $this->verify_for_direct_request();
           if(!$this->image_upload_model->is_store_exist($store_id))
                redirect ('user');
         $data["title"]  = "Images";
         $data["store_id"] = $store_id;
         $this->load->view('include/inner_header',$data);
         $this->load->view('images/image_list');
         $this->load->view('include/inner_footer');
    }

    
    function reArrayFiles($file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}
    
function do_upload($store_id =0) {
    
        $this->verify_for_ajax_request();
        
        

        $directory = 'user_images';
        $size_limit = 5242880; //5MB   
        $output_dir = "uploads/" . $directory . "/";


        $_FILES['files'] = $this->reArrayFiles($_FILES['file']);

       
        if (isset($_FILES["files"])) {
            $i = 0;
            $result=array();
            
            foreach ($_FILES['files'] as $_FILES['file']) {
                $file_name = time() . "_" . $this->tank_auth->get_user_id() . '_' . $i;
                //Filter the file types , if you want.
                if ($_FILES["file"]["error"] > 0) {
                    
                    $result["image_status"] = 0;
                    $result["message"] = $this->lang->line('file_not_upload')." Filename:".$_FILES['file']['name']; 
                    
                } else {

                    $path = $_FILES['file']['name'];
                    $ext = "." . pathinfo($path, PATHINFO_EXTENSION);
                    if ($_FILES["file"]["size"] < $size_limit) {

                        if ($_FILES['file']['type'] == "image/jpg" || $_FILES['file']['type'] == "image/jpeg" || $_FILES['file']['type'] == "image/pjpeg" || $_FILES['file']['type'] == "image/gif" || $_FILES['file']['type'] == "image/png") {
                            //  print_r($_FILES); die;
                            $tmpName = $_FILES['file']['tmp_name'];

                            if (!file_exists($output_dir))
                                mkdir($output_dir, 0755, true) or die("cannot make dir");
                            $uploaded = move_uploaded_file($tmpName, $output_dir . $file_name . $ext);
                            if ($uploaded) {

                                $this->load->library('SimpleImage');
                                $image = new SimpleImage();
                                $image->load($output_dir . $file_name . $ext);
                                
                                // code for compress image
                                
                                if ($image->getWidth() > 1280)
                                    $image->resizeToWidth(1280);

                                if ($image->getHeight() > 1024)
                                    $image->resizeToHeight(1024);

                                if ($ext == '.png') {
                                  //  $thumb = $image->save($output_dir . $file_name . "_thumb" . $ext, IMAGETYPE_PNG);
                                    $thumb = $image->save($output_dir . $file_name . "_compress" . $ext, IMAGETYPE_PNG);
                                } else {
                                  //  $thumb = $image->save($output_dir . $file_name . "_thumb" . $ext);
                                    $thumb = $image->save($output_dir . $file_name . "_compress" . $ext);
                                }

                                //code for generate thumbnail
                                
                                 if ($image->getWidth() > 200)
                                    $image->resizeToWidth(200);

                                if ($image->getHeight() > 150)
                                    $image->resizeToHeight(150);

                                if ($ext == '.png') {
                                    $thumb = $image->save($output_dir . $file_name . "_thumb" . $ext, IMAGETYPE_PNG);
                                   // $thumb = $image->save($output_dir . $file_name . "_compress" . $ext, IMAGETYPE_PNG);
                                } else {
                                   $thumb = $image->save($output_dir . $file_name . "_thumb" . $ext);
                                   // $thumb = $image->save($output_dir . $file_name . "_compress" . $ext);
                                }
                                
                                $data[$i]["original_imagename"] = $_FILES['file']['name'];
                                $data[$i]["disk_imagename"] = $file_name . "_compress" . $ext;
                                $data[$i]["image_thumb"] = $file_name . "_thumb" . $ext;
                                //code to send path of file
                               // $data['path'] = base_url() . $output_dir . $file_name . "_thumb" . $ext;
                                unlink($output_dir . $file_name . $ext);
                               
                               $result["image_status"] = 1;
                               $result["message"] = $this->lang->line('upload_success')." Filename:".$_FILES['file']['name']; 
                                
                            } else {
                                $result["image_status"] = 0;
                                $result["message"] = $this->lang->line('file_not_upload')." Filename:".$_FILES['file']['name']; 
                            }
                        } else {
                            
                             $result["image_status"] = 0;
                             $result["message"] = $this->lang->line('invalid_file_type')." Filename:".$_FILES['file']['name']; 
                        }
                    } else {
                         $result["image_status"] = 0;
                         $result["message"] = $this->lang->line('invalid_file_size')." Filename:".$_FILES['file']['name']; 
                    }
                }
                $i++;
                
                $resultArr[] =$result; 
            }//foreach close
            
            //save file into database 
            if($this->image_upload_model->save_images($data,$store_id))
            {
               $response["status"] = 1;
               $response["images"] = $resultArr;
               echo json_encode($response);
               die();   
               
            }
            else
            {
               $response["status"] = 0;
               $response["message"] = $this->lang->line('unable_to_save');
               echo json_encode($response);
               
            }
            }
        
       
           $response["status"] = 0;
           $response["message"] = $this->lang->line('no_file');;
           echo json_encode($response);
           die();   
    }
    
    public function load_images($store_id)
    {
         $this->verify_for_ajax_request();
         if(!$this->image_upload_model->is_store_exist($store_id))
                redirect ('stores');
         $data['images'] = $this->image_upload_model->load_images($store_id);
         $this->load->view('images/all_images',$data);
    }
    
    public function load_edit($image_id)
    {
        $this->verify_for_ajax_request();
        
          if(!$this->image_upload_model->is_image_exist($image_id))
                redirect ('stores');
         $data['image'] = $this->image_upload_model->load_image($image_id);
        $this->load->view('images/edit_image',$data);
    }
    
    
    public function update_caption()
    {
        $this->verify_for_ajax_request();
         $this->form_validation->set_rules('image_caption', 'Caption', 'trim|required|xss_clean');

        if ($this->form_validation->run()) { // validation ok
          
                if ( $this->image_upload_model->update_caption()) {
                    $result["status"] = 1;
                    $result["message"] = $this->lang->line('update_success');

                } else {
                    $result["status"] = 0;
                    $result["message"] = $this->lang->line('update_error');
                }
        } else {
            $result["status"] = 0;
            $result["message"] = validation_errors();
        }
        echo json_encode($result);
        die();
        
        
    }
    
public function delete($image_id) {
    
        $this->verify_for_direct_request();
        if (!$this->image_upload_model->is_image_exist($image_id))
            redirect('manage_stores');
        
        if ($this->image_upload_model->delete($image_id)) {
            $result["status"] = 1;
            $result["message"] = $this->lang->line('image_delete_success');
        } else {
            $result["status"] = 0;
            $result["message"] = $this->lang->line('delete_error');
        }
        echo json_encode($result);
        die();
}

   
   


       public function load_all_images()
    {
         $this->verify_for_ajax_request();
         $data['images'] = $this->image_upload_model->load_all_images();
         $this->load->view('images/all_global_images',$data);
    }



    private function verify_for_direct_request() {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('welcome');
            die();
        }
        return $this->session->all_userdata();
    }

    private function verify_for_ajax_request() {
        if (!$this->tank_auth->is_logged_in()) {
            echo "<div class='alert alert-danger'>Invalid Access Or Session Timed Out</div>";
            die();
        }
    }

}
?>


