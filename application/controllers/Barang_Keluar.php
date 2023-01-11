<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_Keluar extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('BarangKeluar_model');
    }

	public function index()
	{
        $recordUser = $this->BarangKeluar_model->getDataBarangKeluar();
        // print_r($recordUser);
        // die(0);

		// $this->load->view('welcome_message');
		$this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar');
        $this->load->view('barang_keluar');
        $this->load->view('admin/footer');
        $this->load->view('admin/scripts');
	}
}
