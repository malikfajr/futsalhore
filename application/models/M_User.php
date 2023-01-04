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
}