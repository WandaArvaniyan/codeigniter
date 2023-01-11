<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mutasi_model extends CI_Model{
    public function getDataMutasi(){
        $this->db->select('*');
        $this->db->from('mutasi');
        $query = $this->db->get();
        return $query->result();
    }
}
?>