<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'libraries/REST_Controller.php';

class WatchVideoPoint extends REST_Controller{

     public function __construct() {
        parent::__construct();
        

    }
     
       public function index_post(){
        $user_id=$this->input->post('user_id');
        $video_id=$this->input->post('video_id');
        $this->form_validation->set_rules('user_id', 'user_id', 'trim|required');
        $this->form_validation->set_rules('video_id', 'video_id', 'trim|required');
        if($this->form_validation->run() === FALSE){
          $this->response(array(
            "status" => false,
            "message" => "Field Not Be Empty",
            "data"    =>"User Id And Video Id Required",
            "failed_code" => "0",
          ), REST_Controller::HTTP_OK);
        }else{
         
             $check_user_id = $this->user_api_model->check_user_id_is_valid($user_id);
             $check_video_id = $this->user_api_model->check_video_id_is_valid($video_id);
            if(count($check_user_id)>0 && count($check_video_id)>0){
                $check_user_is_watch_video=$this->user_api_model->check_user_is_watched_video($user_id,$video_id);
                if(count($check_user_is_watch_video)>0){
                  $this->response(array(
                    "status" => false,
                    "message" => "User Allready Watch This Video.",
                    "failed_code" => "2",
                  ), REST_Controller::HTTP_OK);
                }else{
                  $user_present_mask=$this->user_api_model->user_present_mask_number_by_user($user_id);
                  $user_present_mask_number = $user_present_mask->user_mask;
                  $user_present_total_mask_number = $user_present_mask->user_total_mask;
                  $user_new_present_mask_number = $user_present_mask_number+1;
                  $user_new_present_total_mask_number = $user_present_total_mask_number+1;
                 $update_user_data=array(
                   "user_mask"=>$user_new_present_mask_number,
                   "user_total_mask"=>$user_new_present_total_mask_number,
                   "user_id"=>$user_id,
                 );
                  $update_user_new_mask_number=$this->user_api_model->update_new_mask_number_by_user_id($update_user_data);
                  $user_video_watch=array(
                    "video_id"=>$video_id,
                    "user_id"=>$user_id,
                    "video_watch_time"=>date("Y-m-d H:i:s"),
                    
                  );
                  $insert_watch_video_user=$this->user_api_model->insert_watch_video_user_data($user_video_watch);

                  $this->response(array(
                    "status" => true,
                    "message" => "User Get New Mask For Video Watching.",
                  ), REST_Controller::HTTP_OK);


                }


            }else{
                $this->response(array(
                    "status" => false,
                    "message" => "Your User id Or Video Id Not Match In Our System",
                    "failed_code" => "1",
                  ), REST_Controller::HTTP_OK);
            }


        }
        












      }
}