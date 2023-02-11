<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Data extends CI_Model
{
    public function login($username, $password)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $username);
        $this->db->where('password', $password);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    public function get_profile($username)
    {
        if ($this->db->where('username', $username)) {
            return $this->db->get('user')->row_array();
        } else {
            return false;
        }
    }
    public function getAllData()
    {
        $this->db->select('*');
        $this->db->from('tb_m_project');
        $this->db->join('tb_m_client', 'tb_m_client.client_id = tb_m_project.client_id');
        $query = $this->db->get();
        return $query->result();
    }
    public function getAllClient()
    {
        $this->db->select('*');
        $this->db->from('tb_m_client');
        $query = $this->db->get();
        return $query->result();
    }
    public function getDataProject()
    {
        $data['project_id'] = $_GET['project_id'];
        $this->db->select('*');
        $this->db->from('tb_m_project');
        $this->db->where('project_id', $data['project_id']);
        $query = $this->db->get();
        return $query->result();
    }

    public function tambahData()
    {
        $data = [
            "project_name" => $this->input->post('project_name', true),
            "client_id" => $this->input->post('client_id', true),
            "project_start" => $this->input->post('project_start', true),
            "project_end" => $this->input->post('project_end', true),
            "project_status" => $this->input->post('project_status', true)
        ];
        return $this->db->insert('tb_m_project', $data);
    }
    public function editData($project_id, $data)
    {
        $data = [
            "project_id" => $this->input->post('project_id', true),
            "project_name" => $this->input->post('project_name', true),
            "client_id" => $this->input->post('client_id', true),
        ];
        $this->db->where('project_id', $project_id);
        return $this->db->update('tb_m_project', $data);
    }
    public function deleteData($project_id)
    {
        if (is_array($id)) {
            $this->db->where_in('project_id', $project_id);
            return $this->db->delete('tb_m_project');
        } else {
            $this->db->where('project_id', $project_id);
            return $this->db->delete('tb_m_project');
        }
    }
}
