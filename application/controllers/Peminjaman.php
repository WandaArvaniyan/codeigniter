<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Peminjaman_model');
    }

	public function index()
	{
        $recordUser = $this->Peminjaman_model->getDataPeminjaman();
        // print_r($recordUser);
        // die(0);

		// $this->load->view('welcome_message');
		$this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar');
        $this->load->view('peminjaman');
        $this->load->view('admin/footer');
        $this->load->view('admin/scripts');
	}
}
