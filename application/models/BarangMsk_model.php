<?php
defined('BASEPATH') or exit('No direct script access allowed');
class BarangMsk_model extends CI_Model{
    public function getDataBarangMasuk(){
        $this->db->select('*');
        $this->db->from('barang_masuk');
        $query = $this->db->get();
        return $query->result();
    }
}
?>