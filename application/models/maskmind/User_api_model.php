<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_api_model extends CI_Model{

    public function __construct(){
      parent::__construct();
    }


    public function check_user_email_is_exist($user_email){
        $this->db->select("*");
        $this->db->from("user_info");
        $this->db->where("user_email",$user_email);
        $query = $this->db->get();
        return $query->result();
    }



    public function check_user_number_is_exist($user_number){
      $this->db->select("*");
      $this->db->from("user_info");
      $this->db->where("user_number",$user_number);
      $query = $this->db->get();
      return $query->result();
  }





    public function get_user_info_by_email($user_email){
        $this->db->select("*");
        $this->db->from("user_info");
        $this->db->where("user_email",$user_email);
        $query = $this->db->get();
        return $query->result();
      }




      public function get_user_info_by_number($user_number){
        $this->db->select("*");
        $this->db->from("user_info");
        $this->db->where("user_number",$user_number);
        $query = $this->db->get();
        return $query->result();
      }





      public function insert_user_registration_data($user){
        $this->db->insert("user_info",$user);
        $insert_id = $this->db->insert_id();
        $this->db->select("*");
        $this->db->from("user_info");
        $this->db->where("user_id",$insert_id);
        $query = $this->db->get();
        return $query->result();
      }
  



      public function check_ref_code_is_valid($user_ref_code){
        $this->db->select("*");
        $this->db->from("user_info");
        $this->db->where("user_ref_code",$user_ref_code);
        $query = $this->db->get();
        return $query->result();
      }



      public function check_ref_code_is_own_user_id($user_id,$user_ref_code){
        $this->db->select("*");
        $this->db->from("user_info");
        $this->db->where("user_ref_code",$user_ref_code);
        $this->db->where("user_id",$user_id);
        $query = $this->db->get();
        return $query->result();
      }



      public function check_gift_card_token_is_valid($gift_card_token){
        $this->db->select("*");
        $this->db->from("gift_card");
        $this->db->where("gift_card_token",$gift_card_token);
        $this->db->where("gift_card_is_used",0);
        $query = $this->db->get();
        return $query->row();
      }



      public function ref_code_user_present_mask_number($user_ref_code){
        $this->db->select("*");
        $this->db->from("user_info");
        $this->db->where("user_ref_code",$user_ref_code);
        $query = $this->db->get();
        return $query->row();
      }


      public function user_present_mask_number_by_user($user_id){
        $this->db->select("*");
        $this->db->from("user_info");
        $this->db->where("user_id",$user_id);
        $query = $this->db->get();
        return $query->row();
      }




      public function update_new_mask_number_ref_code($update_user_data){
        $this->db->set('user_mask',$update_user_data['user_mask']);
        $this->db->set('user_total_mask',$update_user_data['user_total_mask']);
        $this->db->where('user_ref_code',$update_user_data['user_ref_code']);
        $this->db->update('user_info');
      }


      public function update_new_mask_number_by_user_id($update_user_data){
        $this->db->set('user_mask',$update_user_data['user_mask']);
        $this->db->set('user_total_mask',$update_user_data['user_total_mask']);
        $this->db->where('user_id',$update_user_data['user_id']);
        $this->db->update('user_info');
      }


      public function update_gift_card_info_after_used_token($gift_card_token,$user_id){
        $this->db->set('gift_card_used_user_id',$user_id);
        $this->db->set('gift_card_is_used',1);
        $this->db->where('gift_card_token',$gift_card_token);
        $this->db->update('gift_card');
      }





      public function insert_watch_video_user_data($user_video_watch){
        $this->db->insert("videos_watch",$user_video_watch);
      }

    public function get_all_published_video_list(){
        $this->db->select("*");
        $this->db->from("videos");
        $this->db->where("video_is_publish",0);
        $query = $this->db->get();
        return $query->result();
    } 



    public function check_user_id_is_valid($user_id){
      $this->db->select("*");
      $this->db->from("user_info");
      $this->db->where("user_id",$user_id);
      $query = $this->db->get();
      return $query->result();
  } 


  public function check_video_id_is_valid($video_id){
    $this->db->select("*");
    $this->db->from("videos");
    $this->db->where("video_id",$video_id);
    $query = $this->db->get();
    return $query->result();
} 


public function check_user_is_watched_video($user_id,$video_id){
  $this->db->select("*");
  $this->db->from("videos_watch");
  $this->db->where("user_id",$user_id);
  $this->db->where("video_id",$video_id);
  $query = $this->db->get();
  return $query->result();
} 


public function select_user_info_mask_number($user_id){
  $this->db->select("*");
  $this->db->from("user_info");
  $this->db->where("user_id",$user_id);
  $query = $this->db->get();
  return $query->result();
}



public function update_user_info_data_by_user_id($update_user_info){
  $this->db->set('user_name',$update_user_info['user_name']);
  $this->db->set('user_home_address',$update_user_info['user_home_address']);
  $this->db->where('user_id',$update_user_info['user_id']);
  $this->db->update('user_info');
}










}