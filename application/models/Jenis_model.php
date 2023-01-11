<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Jenis_model extends CI_Model{
    public function getDataJenis(){
        $this->db->select('*');
        $this->db->from('jenis_barang');
        $query = $this->db->get();
        return $query->result();
    }
}
?>