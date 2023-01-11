<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mutasi extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mutasi_model');
    }

	public function index()
	{
        $recordUser = $this->Mutasi_model->getDataMutasi();
        // print_r($recordUser);
        // die(0);

		// $this->load->view('welcome_message');
		$this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar');
        $this->load->view('mutasi');
        $this->load->view('admin/footer');
        $this->load->view('admin/scripts');
	}
}
