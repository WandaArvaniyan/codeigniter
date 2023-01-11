<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_Masuk extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('BarangMsk_model');
    }

	public function index()
	{
        $recordUser = $this->BarangMsk_model->getDataBarangMasuk();
        // print_r($recordUser);
        // die(0);

		// $this->load->view('welcome_message');
		$this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar');
        $this->load->view('barang_masuk');
        $this->load->view('admin/footer');
        $this->load->view('admin/scripts');
	}
}
