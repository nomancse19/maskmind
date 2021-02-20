<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'libraries/REST_Controller.php';

class UserHomeData extends REST_Controller{

     public function __construct() {
        parent::__construct();
        

    }
     
       public function index_post(){
        $user_id=$this->input->post('user_id');
        $this->form_validation->set_rules('user_id', 'user_id', 'trim|required');
        if($this->form_validation->run() === FALSE){
          $this->response(array(
            "status" => false,
            "message" => "Field Not Be Empty",
            "data"    =>"User Id Is Required.",
            "failed_code" => "0",
          ), REST_Controller::HTTP_OK);
        }else{
         
            $check_user_id = $this->user_api_model->check_user_id_is_valid($user_id);
            if(count($check_user_id)>0){
               $user_info_data=$this->user_api_model->select_user_info_mask_number($user_id);
               foreach($user_info_data as $all_user_info_data){
                $user_info_data=array(
                  "user_id"=>$all_user_info_data->user_id,
                  "user_name"=>$all_user_info_data->user_name,
                  "user_home_address"=>$all_user_info_data->user_home_address,
                  "user_number"=>$all_user_info_data->user_number,
                  "user_email"=>$all_user_info_data->user_email,
                  "user_mask"=>$all_user_info_data->user_mask,
                  "user_firebase_token"=>$all_user_info_data->user_firebase_token,
                );
              }
            
                $this->response(array(
                  "status" => true,
                  "message" => "User data Found",
                  "data" =>$user_info_data,
                ), REST_Controller::HTTP_OK);
            }else{
                $this->response(array(
                    "status" => false,
                    "message" => "Your User Id is Invalid..",
                    "failed_code" => "1",
                  ), REST_Controller::HTTP_OK);
            }


        }
        












      }
}