<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FacilityController extends CI_Controller {
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

        $this->load->model('M_Facility');
    }

    public function index()
    {
        $data = array(
            'title' => 'Fasilitas',
            'facilities' => $this->M_Facility->all()
        );

        $this->load->view('admin/facility/index', $data);
    }

    public function store()
    {
        
        $nama = $this->input->post('nama');
        $facility = $this->M_Facility->create(['nama_fasilitas' => $nama]);
        
        if ($facility) {
            http_response_code(201);
            $data = [
                'success' => true,
                'data' => $facility
            ];
        } else {
            http_response_code(400);
            $data = [
                'success' => false,
                'msg' => 'Gagal menambah data'
            ];
        }

        header('Content-Type: Application/json');
        echo json_encode($data); die();
    }

    public function destroy($id)
    {
        $exec = $this->M_Facility->delete($id);
        if ($exec) {
            http_response_code(200);
            $data = [
                'success' => true,
                'msg' => 'Berhasil menghapus data'
            ];
        } else {
            http_response_code(400);
            $data = [
                'success' => false,
                'msg' => 'Gagal menghapus data',
            ];
        }

        header('Content-Type: Application/json');
        echo json_encode($data);
        die();
    }

    public function update($id)
    {
        $nama = $this->input->post('nama');
        $exec = $this->M_Facility->update($id, ['nama_fasilitas' => $nama]);
        
        if ($exec) {
            http_response_code(200);
            $data = [ 
                'success' => true,
                'msg' => 'Berhasil menghapuus data'
            ];
        } else {
            http_response_code(400);
            $data = [
                'success' => false,
                'msg' => 'Gagal menghapus data'
            ];
        }
        
        header('Content-Type: Application/json');
        echo json_encode($data);
        die();
    }
}