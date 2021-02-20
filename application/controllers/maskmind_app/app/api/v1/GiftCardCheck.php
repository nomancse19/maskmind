<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'libraries/REST_Controller.php';

class GiftCardCheck extends REST_Controller{

     public function __construct() {
        parent::__construct();
        

    }



       public function index_post(){
        $user_id                = $this->input->post('user_id');
        $gift_card_token        = $this->input->post('gift_card_token');
        $this->form_validation->set_rules('user_id', 'user_id', 'trim|required');
        $this->form_validation->set_rules('gift_card_token', 'gift_card_token', 'trim|required');
        if($this->form_validation->run() === FALSE){
          $this->response(array(
            "status" => false,
            "message" => "Field Not Be Empty",
            "data"    =>"User Id and Gift Card Token is Required",
            "failed_code" => "0",
          ), REST_Controller::HTTP_OK);
        }else{
         
             $check_gift_card_token = $this->user_api_model->check_gift_card_token_is_valid($gift_card_token);
             $check_user_id = $this->user_api_model->check_user_id_is_valid($user_id);

            if(!empty($check_gift_card_token) && count($check_user_id)>0){
                $user_present_mask=$this->user_api_model->user_present_mask_number_by_user($user_id);
                $user_present_mask_number = $user_present_mask->user_mask;
                $user_present_total_mask_number = $user_present_mask->user_total_mask;

                $user_new_present_mask_number = $user_present_mask_number+$check_gift_card_token->gift_card_mask_number;
                $user_new_present_total_mask_number = $user_present_total_mask_number+$check_gift_card_token->gift_card_mask_number;;
             
                $update_user_data=array(
                 "user_mask"=>$user_new_present_mask_number,
                 "user_total_mask"=>$user_new_present_total_mask_number,
                 "user_id"=>$user_id,
               );

                $update_user_new_mask_number=$this->user_api_model->update_new_mask_number_by_user_id($update_user_data);
                $update_gift_card_info=$this->user_api_model->update_gift_card_info_after_used_token($gift_card_token,$user_id);
                $this->response(array(
                  "status" => true,
                  "message" => "Gift Card Token Valid. And User Used Gift Card.and Get Mask",
                ), REST_Controller::HTTP_OK);
            }else{
                $this->response(array(
                    "status" => false,
                    "message" => "Your Gift Card Token is Not Valid Or Used",
                    "failed_code" => "1",
                  ), REST_Controller::HTTP_OK);
            }


        }
        












      }
}