<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Lapangan');
		$this->load->model('M_Booking');
	}
	public function index()
	{
		// $username = $this->session->username ?? '';
		$tgl = $this->input->get('tanggal') ?? date('Y-m-d');
		$kode = $this->input->get('kode_lapangan') ?? '';

		$data['tanggal'] = $tgl;
		$data['kode_lapangan'] = $kode;
		$data['lapangan'] = $this->M_Lapangan->all();
		$data['tabel_lapangan'] = $this->M_Booking->get($tgl, $kode);
		$data['lapangan_all'] = $this->M_Lapangan->all();
		$this->load->view('index', $data);
	}

	public function not_found()
	{
		$this->load->view('errors/html/error_404');
	}
}
