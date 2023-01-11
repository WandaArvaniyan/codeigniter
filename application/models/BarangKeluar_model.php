<?php
defined('BASEPATH') or exit('No direct script access allowed');
class BarangKeluar_model extends CI_Model{
    public function getDataBarangKeluar(){
        $this->db->select('*');
        $this->db->from('barang_keluar');
        $query = $this->db->get();
        return $query->result();
    }
}
?>