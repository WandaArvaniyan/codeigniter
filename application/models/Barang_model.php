<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Barang_model extends CI_Model{
    public function getDataBarang(){
        $this->db->select('*');
        $this->db->from('barang');
        $query = $this->db->get();
        return $query->result();
    }
}
?>