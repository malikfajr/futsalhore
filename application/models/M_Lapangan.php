<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Lapangan extends CI_Model {
    protected  $table = 'lapangan';

    public function all()
    {
        $data = $this->db->get($this->table)->result();
        
        foreach ($data as $item) {
            $item->fasilitas = $this->fasilitas($item->kode_lapangan);
        };

        return $data;
    }

    public function create($data)
    {
        // proses menambahkan data lapangan ke db
        $kode = $this->newKode();
        $data['kode_lapangan'] = $kode;
        $this->db->insert($this->table, $data);
        
        return $kode;
    }

    public function update(string $kode, array $data)
    {
        $check = $this->firstOrFail($kode);
        if (empty($check)) {
            throw new Exception("Data not foudn", 1);
        }

        $condition = ['kode_lapangan' => $kode];

        $this->db->where($condition);
        $this->db->update('lapangan', $data);
    }

    public function delete($kode)
    {
        $condition = ['kode_lapangan' => $kode];
        $this->db->delete('fasilitas_lapangan', $condition);
        $this->db->delete('lapangan', $condition);
    }

    private function newKode() {
        $sql = "SELECT IFNULL(MAX(RIGHT(kode_lapangan, 3)), 0) AS lastKode FROM lapangan";
        $kode = $this->db->query($sql)->row();
        return 'L' . substr('000' . $kode->lastKode + 1, -3);
    }

    private function fasilitas($kode_lapangan)
    {
        $sql = "SELECT  f.nama_fasilitas AS nama FROM fasilitas f 
                    RIGHT JOIN fasilitas_lapangan fl 
                    ON f.id = fl.fasilitas_id
                WHERE fl.kode_lapangan='$kode_lapangan'";
        $fasilitas = $this->db->query($sql)->result();
        
        $data = array();
        foreach ($fasilitas as $item) {
            $data[] = $item->nama;
        }
        return implode(', ', $data);
    }

    public function firstOrFail($kode)
    {
        $condition = ['kode_lapangan' => $kode];
        $data = $this->db->get_where('lapangan', $condition)->row();
        if (!$data) {
            throw new Exception("Data tidak ditemukan", 1);
        }
        $fasilitas = $this->db->get_where('fasilitas_lapangan', $condition)->result();
        $fasilitas = array_map(function($e) {
            return $e->fasilitas_id;
        }, $fasilitas);
        
        $data->fasilitas = $fasilitas;
        
        return $data;
    }
}