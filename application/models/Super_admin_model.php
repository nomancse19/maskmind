<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Super_admin_model extends CI_Model{
    
    public function select_all_user_info(){
        $this->db->select('*');
        $this->db->from('user_info');
        $this->db->order_by('user_id','DESC');
        $qresult=$this->db->get();
        $result=$qresult->result();
        return $result;
    }

    public function select_all_gift_card_info(){
        $this->db->select('*');
        $this->db->from('gift_card');
        $this->db->order_by('gift_card_id','DESC');
        $qresult=$this->db->get();
        $result=$qresult->result();
        return $result;
    }

    public function user_info_data_by_user_id($user_id){
        $this->db->select('*');
        $this->db->from('user_info');
        $this->db->where('user_id',$user_id);
        $qresult=$this->db->get();
        $result=$qresult->row();
        return $result;
    }



    public function update_user_new_mask_number_by_given_mask($user_new_mask_number,$user_id){
        $this->db->set('user_mask',$user_new_mask_number);
        $this->db->where('user_id',$user_id);
        $this->db->update('user_info');
    }


    public function insert_given_mask_count_system($given_mask_count){
        $this->db->insert("user_given_mask",$given_mask_count);
    }

    
    public function insert_gift_card_token_data($gif_card_data){
        $this->db->insert("gift_card",$gif_card_data);
    }


    public function delete_giftcard_token_with_qr($giftcard_id){
        $query_get_image =$this->db->get_where('gift_card', array('gift_card_id' =>$giftcard_id));
        $file_name=$query_get_image->row('gift_card_token_qr_code');
        unlink(FCPATH.$file_name);
        $this->db->where('gift_card_id',$giftcard_id);
        $this->db->delete('gift_card');
    }










    }

?>