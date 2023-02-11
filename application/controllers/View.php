<?php
defined('BASEPATH') or exit('No direct script access allowed');

class View extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();

        // Load model
        $this->load->model('data');
        $this->load->helper("url");
    }

    public function index()
    {

        $data = $this->data->getAllData();
        $this->load->view('v_viewData', ['data' => $data]);
    }
}
