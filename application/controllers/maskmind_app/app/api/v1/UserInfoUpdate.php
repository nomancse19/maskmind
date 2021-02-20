<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'libraries/REST_Controller.php';

class UserInfoUpdate extends REST_Controller{

     public function __construct() {
        parent::__construct();
        

    }
     
       public function index_post(){
        $user_name              = $this->input->post('user_name');
        $user_home_address      = $this->input->post('user_home_address');
        $user_id                = $this->input->post('user_id');
        $this->form_validation->set_rules('user_id', 'user_id', 'trim');
        $this->form_validation->set_rules('user_name', 'user_name', 'trim');
        $this->form_validation->set_rules('user_home_address', 'user_home_address', 'trim');

        if($this->form_validation->run() === FALSE){
          $this->response(array(
            "status" => false,
            "message" => "Your Data Processing Error..",
            "failed_code" => "0",
          ), REST_Controller::HTTP_OK);
        }else{
            $check_user_id = $this->user_api_model->check_user_id_is_valid($user_id);
            if(count($check_user_id)==0){
                $this->response(array(
                    "status" => false,
                    "message" => "Your User Id Not Found In Our System..",
                    "failed_code" => "1",
                  ), REST_Controller::HTTP_OK);
            }else{
                $update_user_info=array(
                    "user_id"           =>$user_id,
                    "user_name"         =>$user_name,
                    "user_home_address" =>$user_home_address,
                );
                $update_user_info=$this->user_api_model->update_user_info_data_by_user_id($update_user_info);
                $this->response(array(
                    "status" => true,
                    "message" => "User Info Data Updated Success...",
                  ), REST_Controller::HTTP_OK);
            }

          


        }
        












      }
}