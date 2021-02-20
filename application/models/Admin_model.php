<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model{
    
    public function check_admin_login_info($data){
        $this->db->select('*');
        $this->db->from('admin_user');
        $this->db->where('admin_user_email',$data['admin_user_email']);
        $this->db->where('admin_user_password',md5($data['admin_user_password']));
        $qresult=$this->db->get();
        $has=$qresult->num_rows();
        if($has==1){
        $result=$qresult->row();
        return $result;
        }
    }
    

    
    
    
    
}

?>