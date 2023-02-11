<?php
// defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/JWT.php';
require APPPATH . '/libraries/ExpiredException.php';
require APPPATH . '/libraries/BeforeValidException.php';
require APPPATH . '/libraries/SignatureInvalidException.php';
require APPPATH . '/libraries/JWK.php';

use \Firebase\JWT\JWT;
use \Firebase\JWT\ExpiredException;

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('data');
        $this->load->helper("url");
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->view('v_login');
    }

    public function aksi_login()
    {
        // $jwt = new JWT();
        // $JWTSecretKey = "myloginsecret";

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $result = $this->data->login($username, $password);
        if ($result) {
            $this->session->set_userdata('username', $username);
            $data = $this->data->get_profile($username);
            $this->session->set_userdata('name', $data['name']);
            $this->load->view('v_dashboard', $data);
        } else {
            $data['error_message'] = "invalid username or password";
            $this->load->view('v_login', $data);
        }

        // $token = $jwt->encode($result, $JWTSecretKey, 'HS256');
        // echo json_encode($token);
    }

    // function configToken()
    // {
    //     $cnf['exp'] = 3600; //milisecond
    //     $cnf['secretkey'] = 'awoidkawdwkmnsnxsiue';
    //     return $cnf;
    // }
    // public function getToken_post()
    // {
    //     $exp = time() + 3600;
    //     $token = array(
    //         "iss" => 'apprestservice',
    //         "aud" => 'pengguna',
    //         "iat" => time(),
    //         "nbf" => time() + 10,
    //         "exp" => $exp,
    //         "data" => array(
    //             "username" => $this->input->post('username'),
    //             "password" => $this->input->post('password')
    //         )
    //     );

    //     $jwt = JWT::encode($token, $this->configToken()['secretkey']);
    //     $output = [
    //         'status' => 200,
    //         'message' => 'Berhasil login',
    //         "token" => $jwt,
    //         "expireAt" => $token['exp']
    //     ];
    //     $data = array('kode' => '200', 'pesan' => 'token', 'data' => array('token' => $jwt, 'exp' => $exp));
    //     $this->response($data, 200);
    // }

    // public function authtoken()
    // {
    //     $secret_key = $this->configToken()['secretkey'];
    //     $token = null;
    //     $authHeader = $this->input->request_headers()['Authorization'];
    //     $arr = explode(" ", $authHeader);
    //     $token = $arr[1];
    //     if ($token) {
    //         try {
    //             $decoded = JWT::decode($token, $this->configToken()['secretkey'], array('HS256'));
    //             if ($decoded) {
    //                 return 'benar';
    //             }
    //         } catch (\Exception $e) {
    //             $result = array('pesan' => 'Kode Signature Tidak Sesuai');
    //             return 'salah';
    //         }
    //     }
    // }
}
