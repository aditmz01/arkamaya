<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TambahData extends CI_Controller
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
        $data = $this->data->getAllClient();
        $this->load->view('v_tambahData', ['data' => $data]);
    }

    public function add()
    {
        $data = $this->data->tambahData();
        if ($data) {
            echo "<script>alert('Data Berhasil di Tambahkan')</script>";
            $data = $this->data->getAllClient();
            $this->load->view('v_tambahData', ['data' => $data]);
        }
    }
}
