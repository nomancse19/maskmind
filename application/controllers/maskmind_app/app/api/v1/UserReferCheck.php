<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'libraries/REST_Controller.php';

class UserReferCheck extends REST_Controller{

     public function __construct() {
        parent::__construct();
        

    }



       public function index_post(){
        $user_ref_code=$this->input->post('user_ref_code');
        $user_id=$this->input->post('user_id');
        $this->form_validation->set_rules('user_ref_code', 'user_ref_code', 'trim|required');
        $this->form_validation->set_rules('user_id', 'user_id', 'trim|required');
        if($this->form_validation->run() === FALSE){
          $this->response(array(
            "status" => false,
            "message" => "Field Not Be Empty",
            "data"    =>"No Refer Code Or User Id Given",
            "failed_code" => "0",
          ), REST_Controller::HTTP_OK);
        }else{

             $check_ref_code = $this->user_api_model->check_ref_code_is_valid($user_ref_code);
            if(count($check_ref_code)>0){

              $check_ref_code_is_own_user_id= $this->user_api_model->check_ref_code_is_own_user_id($user_id,$user_ref_code);
              if(count($check_ref_code_is_own_user_id)>0){
                $this->response(array(
                  "status" => false,
                  "message" => "This Refer Code is not Recived Any Mask..",
                ), REST_Controller::HTTP_OK);
              }else{

                $user_present_mask=$this->user_api_model->ref_code_user_present_mask_number($user_ref_code);
                $user_present_mask_number = $user_present_mask->user_mask;
                $user_present_total_mask_number = $user_present_mask->user_total_mask;

                $user_new_present_mask_number = $user_present_mask_number+1;
                $user_new_present_total_mask_number = $user_present_total_mask_number+1;
               $update_user_data=array(
                 "user_mask"=>$user_new_present_mask_number,
                 "user_total_mask"=>$user_new_present_total_mask_number,
                 "user_ref_code"=>$user_ref_code,
               );
                $update_user_new_mask_number=$this->user_api_model->update_new_mask_number_ref_code($update_user_data);
                $this->response(array(
                  "status" => true,
                  "message" => "Refer Code User Received Mask",
                ), REST_Controller::HTTP_OK);

              }
            }else{
                $this->response(array(
                    "status" => false,
                    "message" => "Your Ref Code Not Match In Our System",
                    "failed_code" => "1",
                  ), REST_Controller::HTTP_OK);
            }


        }
        












      }
}