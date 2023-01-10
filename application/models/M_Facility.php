<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Facility extends CI_Model {
    protected $table = 'fasilitas';

    public function all()
    {
        return $this->db->get($this->table)->result();
    }

    public function create($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->get_where($this->table, ['id' => $this->db->insert_id('id')])->row();
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, ['id' => $id]);
    }

    public function lapangan($kodeLapangan, $data)
    {
        $this->db->delete('fasilitas_lapangan', ['kode_lapangan' => $kodeLapangan]);
        foreach ($data as $item) {
            $this->db->insert('fasilitas_lapangan', [
                'fasilitas_id' => $item,
                'kode_lapangan' => $kodeLapangan
            ]);
        }
    }
}