<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LapanganController extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->login) {
            return redirect('/auth/login');
        }    

        if (!$this->session->admin) {
            echo "<h2>403, Unauthenticate</h2>";
            exit();
        }

        $this->load->model('M_Lapangan');
        $this->load->model('M_Facility');
    }

    public function index()
    {
        $data = [
            'title' => 'Lapangan',
            'lapangan' => $this->M_Lapangan->all()
        ];

        $this->load->view('admin/lapangan/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Tambah Lapangan',
            'fasilitas' => $this->M_Facility->all(),
        ];

        $this->load->view('admin/lapangan/form', $data);
    }

    public function store()
    {
        $nama = $this->input->post('nama');
        $harga = $this->input->post('harga');
        $fasilitas = $this->input->post('fasilitas');

        var_dump($this->input->post());
    }

    public function edit($id)
    {
        # code...
    }

    public function update($id)
    {
        # code...
    }

    public function destroy()
    {
        # code...
    }
}