<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {
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
    }
    
    public function index()
    {
        $this->load->view('admin/index');
    }
}