<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Delete extends CI_Controller
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

        $project_id = $_GET['project_id'];

        if ($this->data->deleteData($project_id)) {
            echo "<script>alert('Data Berhasil dihapus')</script>";
            $data = $this->data->getAllData();
            $this->load->view('v_viewData', ['data' => $data]);
        }
    }
}
