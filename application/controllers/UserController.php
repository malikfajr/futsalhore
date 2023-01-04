<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {
    public function profile()
    {
        $this->load->view('profile');
    }
}