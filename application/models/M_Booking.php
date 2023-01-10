<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Booking extends CI_Model {
    protected  $table = 'booking';

    public function get(string $tgl, string $kode_lapangan)
    {
        $sql = "SELECT b.tanggal, b.waktu_mulai, b.waktu_selesai, u.nama as nama_user, l.nama_lapangan, b.kode_lapangan 
        FROM booking b join users u 
        ON u.username = b.username 
        JOIN lapangan l
        ON l.kode_lapangan = b.kode_lapangan
        WHERE b.tanggal='$tgl'";

        if (!empty($kode_lapangan)) {
            $sql = $sql . " AND b.kode_lapangan='$kode_lapangan'";
        }

        $data = $this->db->query($sql)->result();
        foreach ($data as $item) {
            $item->fasilitas = $this->fasilitas($item->kode_lapangan);
        }

        return $data;
    }

    public function create(array $data)
    {
        $data['kode_booking'] = $this->newKodeBooking();
        $this->db->insert($this->table, $data);
    }

    private function newKodeBooking() {
        $condition = date('Ym');
        $sql = "SELECT IFNULL(RIGHT(MAX(kode_booking), 4), 0) as kode FROM booking WHERE LEFT(kode_booking, 6) = '$condition'";
        $data = $this->db->query($sql)->row();

        return $condition . substr('0000' . ($data->kode + 1), -4);
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
}