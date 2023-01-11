<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User_model extends CI_Model{
    public function getDataUser(){
        $this->db->select('*');
        $this->db->from('user');
        $query = $this->db->get();
        return $query->result();
    }
}
?>