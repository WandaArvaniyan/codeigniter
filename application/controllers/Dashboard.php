<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		// $this->load->view('welcome_message');
		$this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar');
        $this->load->view('index');
        $this->load->view('admin/footer');
        $this->load->view('admin/scripts');
	}
}
