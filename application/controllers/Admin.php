<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $data=array();
        if($this->session->userdata('admin_user_id')){
         redirect('MaskmindOwner/dashboard');
          }
        $this->load->model('admin_model');
    }




    public function maskmindadminbackendcontrol(){
        $this->load->view("backend/login");
    }
    

    
    public function admin_login_check(){
        if(empty($this->input->post())){
            $fdata['error_message']="Please Fill Data. Then Try.";
            $this->session->set_flashdata($fdata);
            redirect('maskmind/admin/01521451354');
            }else{
        $data['admin_user_email']=$this->input->post('user_email');
        $data['admin_user_password']=$this->input->post('password');
        if($data['admin_user_email']=='' ||  $data['admin_user_password']==''){
            $fdata=array();
            $fdata['message']="You Must Field Up All Data";
            $this->session->set_flashdata($fdata);
            redirect("maskmind/admin/01521451354");
        }else{
        $found_admin=$this->admin_model->check_admin_login_info($data);
        if($found_admin){
            $sdata=array();
            $sdata['admin_user_id']=$found_admin->admin_user_id;
            $sdata['username']=$found_admin->admin_user_name;
            $sdata['user_email']=$found_admin->admin_user_email;
            $this->session->set_userdata($sdata);
            redirect('MaskmindOwner/dashboard');
        }else{
            $sdata=array();
            $sdata['message']="Your Username Or Password Not Matching Or User Deactivated";
            $this->session->set_flashdata($sdata);
            redirect("/maskmind/admin/01521451354");
        }

    }
}
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
}
?>