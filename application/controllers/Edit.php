<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Edit extends CI_Controller
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
        $id_project = $_GET['project_id'];
        $data = $this->data->getDataProject($id_project);
        $this->load->view('v_editData', ['data' => $data]);
    }
    public function update()
    {
        $data = [
            "project_id" => $this->input->post('project_id', true),
            "project_name" => $this->input->post('project_name', true),
            "client_id" => $this->input->post('client_id', true),
            "project_start" => $this->input->post('project_start', true),
            'project_end' => $this->input->post('project_end', true),
            "project_status" => $this->input->post('project_status', true),
        ];
        if ($this->data->editData($data['project_id'], $data)) {
            echo "<script>alert('Data Berhasil di Update')</script>";
            $data = $this->data->getAllData();
            $this->load->view('v_viewData', ['data' => $data]);
        }
    }
}
