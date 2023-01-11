<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_Aset extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Jenis_model');
    }

	public function index()
	{
        $recordUser = $this->Jenis_model->getDataJenis();
        // print_r($recordUser);
        // die(0);

		// $this->load->view('welcome_message');
		$this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar');
        $this->load->view('jenis_aset');
        $this->load->view('admin/footer');
        $this->load->view('admin/scripts');
	}
}
