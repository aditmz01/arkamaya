<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{

		parent::__construct();

		// Load model
		$this->load->model('data');
		$this->load->helper("url");
		$this->load->library('session');
	}

	public function index()
	{

		// $this->session->set_userdata('username', $username);
		$data = $this->data->get_profile($_SESSION['username']);
		$this->load->view('v_dashboard', $data);
	}
	public function logout()
	{
		$this->session->sess_destroy();
		$this->load->view('v_login');
	}
}
