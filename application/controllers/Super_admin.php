<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
class Super_admin extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $data=array();
        if(!$this->session->userdata('admin_user_id')){
            redirect('/');
        }

    }



    public function index(){
        $data['admin_main_content']=$this->load->view('backend/pages/dashboard','',TRUE);
        $this->load->view("backend/master",$data);
    }



    public function mask_userlist(){
     
            $data['all_user_info']=$this->super_admin_model->select_all_user_info();
           $data['admin_main_content']=$this->load->view('backend/pages/mask_user_list',$data,TRUE);
           $this->load->view("backend/master",$data);
          
    }


    public function assign_mask($user_id){
        $data['user_data']=$this->super_admin_model->user_info_data_by_user_id($user_id);
        $this->load->view('backend/pages/assign_user_mask',$data);
    }


    public function save_assign_mask($user_id){
        $user_check=$this->super_admin_model->user_info_data_by_user_id($user_id);
        if($user_check){
            $user_earn_mask=$user_check->user_mask;
        $user_given_mask=trim($this->input->post('user_given_mask',TRUE));
        if($user_given_mask<=$user_earn_mask){
                $user_new_mask_number=$user_earn_mask-$user_given_mask;
                $update_user_mask=$this->super_admin_model->update_user_new_mask_number_by_given_mask($user_new_mask_number,$user_id);
                $given_mask_count=array(
                    "user_given_mask_number"=>$user_given_mask,
                    "user_given_mask_user_id"=>$user_id,
                    "user_given_mask_date"=>date("Y-m-d H:i:s"),
                );
                $insert_given_mask_count=$this->super_admin_model->insert_given_mask_count_system($given_mask_count);
                $fdata=array();
                $fdata['message']="<span style='color:blue;font-weight:bold;'>Success! Given Mask Number Assign To  User Account...</span>";
                $this->session->set_flashdata($fdata);
                redirect('MaskmindOwner/MaskUserList');
        }else{
            $fdata=array();
            $fdata['message']="<span style='color:red;font-weight:bold;'>Error! Given Mask Number Must Be Smaller Then User Earn Mask...</span>";
            $this->session->set_flashdata($fdata);
            redirect('MaskmindOwner/MaskUserList');
        }
        }else{
            redirect('MaskmindOwner/dashboard');
        }
    }


    public function manage_gift_card(){
        $data['gift_card_info']=$this->super_admin_model->select_all_gift_card_info();
       $data['admin_main_content']=$this->load->view('backend/pages/manage_gift_card',$data,TRUE);
       $this->load->view("backend/master",$data);
    }


    public function gift_card_token_generate(){
        $token_count=trim($this->input->post('token_count',TRUE));
        $gift_card_mask_number=trim($this->input->post('gift_card_mask_number',TRUE));
        $count=0;
        if($token_count>0 && $gift_card_mask_number!=''){
            for($count=1;$count<=$token_count;$count++){
          
                $gif_card_token=substr(md5(rand()), 0, 10);
                $qr_image=$gif_card_token.'.png';
                $params['data'] =$gif_card_token;
                $params['level'] = 'H';
                $params['size'] =7;
                $params['savename'] =FCPATH."uploads/qr_image/".$qr_image;
                $qr_code_image= "uploads/qr_image/".$qr_image;
                $this->ciqrcode->generate($params);
                $gif_card_data=array(
                    "gift_card_token"=>$gif_card_token,
                    "gift_card_token_qr_code"=>$qr_code_image,
                    "gift_card_mask_number"=>$gift_card_mask_number,
                    "gift_card_created_date"=>date("Y-m-d H:i:s"),
                );
                $insert_gift_card=$this->super_admin_model->insert_gift_card_token_data($gif_card_data);
            }
            $fdata=array();
            $fdata['message']="<span style='color:blue;font-weight:bold;'>Success! Gift Card Token is Generate...</span>";
            $this->session->set_flashdata($fdata);
            redirect('MaskmindOwner/ManageGiftCard');
        }else{
            $fdata=array();
            $fdata['message']="<span style='color:red;font-weight:bold;'>Error! Gift Card Token is Greater Then 0...</span>";
            $this->session->set_flashdata($fdata);
            redirect('MaskmindOwner/ManageGiftCard');
        }
    }




    public function delete_giftcard($gift_card_id){
        $this->super_admin_model->delete_giftcard_token_with_qr($gift_card_id);
        $fdata=array();
        $fdata['message']="<span style='color:blue;font-weight:bold;'>Success! Gift Card Token Deleted...</span>";
            $this->session->set_flashdata($fdata);
            redirect('MaskmindOwner/ManageGiftCard');
    }






   
    
    public function logout(){
         $session_array=array('admin_user_id','username','user_email');
            $this->session->unset_userdata($session_array);
            $logdata=array();
            $logdata['message']="You Are SuccessFully Logout";
            $this->session->set_flashdata($logdata);
            redirect('/maskmind/admin/01713660299');
    }
    
    
}
?>