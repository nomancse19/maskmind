<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'libraries/REST_Controller.php';

class UserLogin extends REST_Controller{

     public function __construct() {
        parent::__construct();
        

    }

    
    private function make_refer_code(){
      $query = $this->db->select('user_ref_code')
                        ->from('user_info')
                        ->get();
      $row = $query->last_row();
      if($row){
          $nextrefcode = $row->user_ref_code +rand(1,9);
          return $nextrefcode;
      }
      else{
          $nextrefcode = '1100';
          return $nextrefcode;
      }   
}





      public function index_post(){
        $input_data           = $this->input->post('user_mobile_or_email',TRUE);
        $user_firebase_token  = $this->input->post('user_firebase_token',TRUE);
        if(filter_var($input_data, FILTER_VALIDATE_EMAIL)){
            $user_email= $input_data;
            $user_number= '';
        }else{
          
            if (preg_match('/^[0-9]+$/',$input_data)){
              $user_number= $input_data;
            }else{
              $user_number= '';
            }
            $user_email= '';
        }

        $this->form_validation->set_rules('user_mobile_or_email','user_number_or_email_address','trim|required');
        $this->form_validation->set_rules('user_firebase_token','user_firebase_token','trim|required');
        if($this->form_validation->run() === FALSE){
            $this->response(array(
              "status" => false,
              "message" => "Field Must Not Be Empty",
              "failed_code" => "0",
            ), REST_Controller::HTTP_OK);
          }else{

          $user_ref_code=$this->make_refer_code();
          $user=array(
              "user_name"=>'',
              "user_number"=>$user_number,
              "user_email"=>$user_email,
              "user_home_address"=>'',
              "user_firebase_token"=>$user_firebase_token,
              "user_ref_code"=>$user_ref_code,
              "user_point"=>'0',
              "user_mask"=>'2',
              "user_total_mask"=>'2',
              "user_type"=>'new',
              "user_created_date"=>date("Y-m-d H:i:s"),
              "user_device_id"=>''

          );




            if(!empty($user_email)){
                $check_exist_email= $this->user_api_model->check_user_email_is_exist($user_email);
                if(count($check_exist_email)>0){
                    $user_info_by_email=$this->user_api_model->get_user_info_by_email($user_email);
                    
                    foreach($user_info_by_email as $all_user_info_by_email){
                      $user_info_email=array(
                        "user_id"=>$all_user_info_by_email->user_id,
                        "user_name"=>$all_user_info_by_email->user_name,
                        "user_type"=>"old",
                        "user_email"=>$all_user_info_by_email->user_email,
                        "user_number"=>$all_user_info_by_email->user_number,
                        "user_home_address"=>$all_user_info_by_email->user_home_address,
                        "user_firebase_token"=>$all_user_info_by_email->user_firebase_token,
                        "user_ref_code"=>$all_user_info_by_email->user_ref_code,
                        "user_created_date"=>$all_user_info_by_email->user_created_date,
                      );
                    }
                    $this->response(array(
                        "status" => true,
                        "message" => "User Found",
                        "data" => $user_info_email,
                      ), REST_Controller::HTTP_OK);

                }else{
                  
                  $insert_user_data=$this->user_api_model->insert_user_registration_data($user);
                 
                  foreach($insert_user_data as $all_insert_user_data){
                    $insert_user_info_email=array(
                      "user_id"=>$all_insert_user_data->user_id,
                      "user_name"=>$all_insert_user_data->user_name,
                      "user_type"=>"new",
                      "user_email"=>$all_insert_user_data->user_email,
                      "user_number"=>$all_insert_user_data->user_number,
                      "user_home_address"=>$all_insert_user_data->user_home_address,
                      "user_firebase_token"=>$all_insert_user_data->user_firebase_token,
                      "user_ref_code"=>$all_insert_user_data->user_ref_code,
                      "user_created_date"=>$all_insert_user_data->user_created_date,
                    );
                  }
                  $this->response(array(
                    "status" => true,
                    "message" => "New User Created",
                    "data" => $insert_user_info_email,
                  ), REST_Controller::HTTP_OK);

                }


            }
















            else if(!empty($user_number)){
              $check_exist_number= $this->user_api_model->check_user_number_is_exist($user_number);
              if(count($check_exist_number)>0){
                  $user_info_by_number=$this->user_api_model->get_user_info_by_number($user_number);
                  foreach($user_info_by_number as $all_user_info_by_number){
                    $all_user_info_number=array(
                      "user_id"=>$all_user_info_by_number->user_id,
                      "user_name"=>$all_user_info_by_number->user_name,
                      "user_type"=>"old",
                      "user_email"=>$all_user_info_by_number->user_email,
                      "user_number"=>$all_user_info_by_number->user_number,
                      "user_home_address"=>$all_user_info_by_number->user_home_address,
                      "user_firebase_token"=>$all_user_info_by_number->user_firebase_token,
                      "user_ref_code"=>$all_user_info_by_number->user_ref_code,
                      "user_created_date"=>$all_user_info_by_number->user_created_date,
                    );
                  }
                  $this->response(array(
                      "status" => true,
                      "message" => "User Found",
                      "data" => $all_user_info_number,
                    ), REST_Controller::HTTP_OK);

              }else{
                
                $insert_user_data=$this->user_api_model->insert_user_registration_data($user);
                foreach($insert_user_data as $all_insert_user_data){
                  $all_insert_user_info_number=array(
                    "user_id"=>$all_insert_user_data->user_id,
                    "user_name"=>$all_insert_user_data->user_name,
                    "user_type"=>"new",
                    "user_email"=>$all_insert_user_data->user_email,
                    "user_number"=>$all_insert_user_data->user_number,
                    "user_home_address"=>$all_insert_user_data->user_home_address,
                    "user_firebase_token"=>$all_insert_user_data->user_firebase_token,
                    "user_ref_code"=>$all_insert_user_data->user_ref_code,
                    "user_created_date"=>$all_insert_user_data->user_created_date,
                  );
                }
                $this->response(array(
                  "status" => true,
                  "message" => "New User Created",
                  "data" => $all_insert_user_info_number,
                ), REST_Controller::HTTP_OK);

              }
            }


            else{
              $this->response(array(
                "status" => false,
                "message" => "Wrong With Email or Number",
                "failed_code" => "1",
              ), REST_Controller::HTTP_OK);
            }

















      
      }
    }






























}