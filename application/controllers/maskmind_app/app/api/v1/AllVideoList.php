<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'libraries/REST_Controller.php';

class AllVideoList extends REST_Controller{

     public function __construct() {
        parent::__construct();
        

    }
      public function index_get(){
        $videolist = $this->user_api_model->get_all_published_video_list();
        if(count($videolist) > 0){
          $this->response(array(
            "status" => true,
            "message" => "Video found",
            "data" => $videolist
          ), REST_Controller::HTTP_OK);
        }else{
    
          $this->response(array(
            "status" => false,
            "message" => "No Video found",
          ), REST_Controller::HTTP_OK);
        }
      }






























}