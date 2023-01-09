<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Lapangan extends CI_Model {
    protected  $table = 'lapangan';

    public function all()
    {
        $this->db->get($this->table)->result();
    }

    public function create()
    {
        // proses menambahkan data ke database
    }

    public function update($id, $data)
    {
        # code...
    }

    public function delete($id)
    {
        # code...
    }
}