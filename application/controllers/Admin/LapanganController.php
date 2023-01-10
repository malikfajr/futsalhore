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
            'lapangan' => $this->M_Lapangan->all() ?? [],
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
        
        $this->db->trans_begin();
        try {
            $lapangan_id = $this->M_Lapangan->create([
                            'nama_lapangan' => $nama,
                            'harga_perjam' => $harga,
                        ]);
            $this->M_Facility->lapangan($lapangan_id, $fasilitas);
            $this->db->trans_commit();
            $this->session->set_flashdata('success', 'Berhasil menambahkan data');
            return redirect(base_url('admin/lapangan'));

        } catch (\Throwable $th) {
            $this->db->trans_rollback();
            $this->session->set_flashdata('failed', $th->getMessage());
            return redirect(base_url('admin/lapangan/add'));
        } 
        
    }

    public function edit($id)
    {
        try {
            $lapangan = $this->M_Lapangan->firstOrFail($id);
            $data = [
                'title' => 'Lapangan',
                'lapangan' => $lapangan,
                'fasilitas' => $this->M_Facility->all()
            ];
            $this->load->view('admin/lapangan/form', $data);

        } catch (\Throwable $th) {
            // echo '<pre>';
            // var_dump($th);
            $this->load->view('errors/html/error_404');
        }
        
    }

    public function update($kode)
    {
        $nama = $this->input->post('nama');
        $harga = $this->input->post('harga');
        $fasilitas = $this->input->post('fasilitas');
        
        $this->db->trans_begin();
        try {
            $this->M_Lapangan->update(
                        $kode,
                        [
                            'nama_lapangan' => $nama,
                            'harga_perjam' => $harga,
                        ]);
            $this->M_Facility->lapangan($kode, $fasilitas);
            $this->db->trans_commit();
            $this->session->set_flashdata('success', 'Berhasil menambahkan data');
            return redirect(base_url('admin/lapangan'));

        } catch (\Throwable $th) {
            $this->db->trans_rollback();
            $this->session->set_flashdata('failed', $th->getMessage());
            return redirect(base_url('admin/lapangan/edit/' . $kode));
        } 
    }

    public function destroy($kode)
    {
        $this->db->trans_begin();
        
        try {
            $this->M_Lapangan->delete($kode);
            $this->db->trans_commit();
            $code = 200;
            $data = [
                'success' => true,
                'msg' => 'Berhasil menghapus data'
            ];
        } catch (\Throwable $th) {
            $this->db->trans_rollback();
            $code = 400;
            $data = [
                'success' => false,
                'msg' => 'Gagal menghapuas data'
            ];
        } finally {
            header('Content-Type: Application/json');
            http_response_code($code);
            echo json_encode($data);
        }
        // if ($this->db->trans_status() === FALSE)
        // {
                
        //         // $this->session->set_flashdata('failed', 'Gagal menghapus data');
        // } else {
                
        //         // $this->session->set_flashdata('success', 'Berhasil menghapus data');
        // } 
        // return redirect('admin/lapangan');
    }
}