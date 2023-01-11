<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Peminjaman_model extends CI_Model{
    public function getDataPeminjaman(){
        $this->db->select('*');
        $this->db->from('peminjaman');
        $query = $this->db->get();
        return $query->result();
    }
}
?>