<?php
class M_login extends CI_Model
{
    public function login($post){
        $this->db->select('*');
        $this->db->from('petugas');
        $this->db->where('username', $post['username']);
        $this->db->where('password', $post['password']);
        $query = $this->db->get();
        return $query;
    }
}
