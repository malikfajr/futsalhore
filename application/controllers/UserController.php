<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->login) {
            return redirect('/auth/login');
        }    

        $this->load->model('M_User');
        $this->load->model('M_Lapangan');
        $this->load->model('M_Booking');
    }

    public function profile()
    {
        $data['user'] = $this->M_User->first($this->session->username);
        $this->load->view('profile', $data);
    }

    public function update()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'alamat' =>  $this->input->post('alamat'),
        ];
        
        if (!empty($_FILES['foto']['name'])) {
            $foto = $this->do_upload();
            $data['foto'] = $foto;
        }

        $username = $this->session->username;
        $this->M_User->update($username, $data);

        $this->session->set_flashdata('success', 'Berhasil merubah data');
        return redirect(base_url('profile'));
    }

    private function do_upload()
    {
        $config['upload_path']          = './asset/img/';
        $config['allowed_types']        = 'jpg|jpeg|png|svg';
        $config['max_size']             = 10240;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        $config['file_name']            = date('YmdHis');

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('foto'))
        {
            // var_dump(array('error' => $this->upload->display_errors())); die();
            $this->session->set_flashdata('failed', $this->upload->display_errors());
            redirect(base_url('profile')); die();
        }
        $file_name = $this->upload->data()['file_name'];

        $this->session->foto = 'asset/img/' . $file_name;
        return 'asset/img/' . $file_name;
    }

    public function edit_password()
    {
        $pass1 = $this->input->post('pass1');
        $pass2 = $this->input->post('pass2');

        try {
            if (empty($pass1) || empty($pass2)) {
                throw new Exception("Password tidak boleh kosong", 1);
            }
            if ($pass1 != $pass2) {
                throw new Exception("Password harus sama", 1);
            }

            $username = $this->session->username;
            $this->M_User->update($username, ['password' => $pass1]);
            $this->session->set_flashdata('success', 'Berhasil merubah password');
            redirect(base_url('profile'));
        } catch (\Throwable $th) {
            $this->session->set_flashdata('failed', $th->getMessage());
            redirect(base_url('profile'));
        } 
    }

    public function booking_view()
    {
        $data['title'] = 'Booking Lapangan';
        $data['lapangan'] = $this->M_Lapangan->all();
        $this->load->view('booking/form', $data);
    }

    public function booking_store()
    {
        $data = [
            'username' => $this->session->username,
            'kode_lapangan' => $this->input->post('kode_lapangan'),
            'tanggal' => $this->input->post('tanggal'),
            'waktu_mulai' => $this->input->post('waktu_mulai'),
            'waktu_selesai' => $this->input->post('waktu_selesai'),
        ];

        try {
            $this->M_Booking->create($data);
            $this->session->set_flashdata('success', 'Berhasil memesan lapangan');
            return redirect(base_url('profile'));
        } catch (\Throwable $th) {
            // echo '<pre>';
            // print_r($th); die();
            $this->session->set_flashdata('failed', 'Gagal memesan lapangan');
            return redirect(base_url('booking'));

        }
    }
}