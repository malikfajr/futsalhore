<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_User extends CI_Model {
    protected $table = 'users';

    public function auth($u, $p)
    {
        $credential = array(
            'username' => $u,
            'password' => $p
        );

        return $this->db->get_where($this->table, $credential);
    }

    public function first(string $username)
    {
        return $this->db->get_where($this->table, ['username' => $username])->row();
    }

    public function update(string $username, array $data)
    {
        $this->db->where('username', $username);
        $this->db->update($this->table, $data);
    }
}