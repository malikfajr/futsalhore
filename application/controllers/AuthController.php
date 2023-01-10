<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_User');
    }

    public function login()
    {
        if ($this->session->login) {
            return redirect(base_url('profile'));
        }
        $this->load->view('auth/login');
    }

    public function authenticate()
    {
        $username = $this->input->post('username');
        $pass = $this->input->post('password');

        $exec = $this->M_User->auth($username, $pass);
        if ($exec->num_rows() > 0) {
            # berhasil login
            $data = $exec->row(); 
            $data_session = array(
                'login' => true,
                'username' => $data->username,
                'nama'  => $data->nama,
                'foto' => $data->foto,
                'admin' => (int)$data->is_admin
            );

            $this->session->set_userdata($data_session);
            $this->session->set_flashdata('success', 'Selamat datang ' . $data->nama);
            if ($data->is_admin) {
                redirect(base_url('admin'));
            } else {
                redirect(base_url('profile'));
            }
        } else {
            # gagal login
            $this->session->set_flashdata('error', 'Username atau password salah!');
            redirect(base_url('auth/login'));
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        return redirect(base_url('auth/login'));
    }
}