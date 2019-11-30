<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('login_token'))
		{
			redirect('login');
		}
		$this->load->model(['Builder', 'helper']);
	}

	public function index()
	{
		$this->helper->find();
		$stock       = $this->Builder->setTable('stocks')->get()->result_array();
		$pengguna    = $this->Builder->setTable('pengguna')->get()->result_array();
		$pemasangan  = $this->Builder->setTable('pemasangan')->get()->result_array();
		$telat_bayar = $this->Builder->setTable('telat_bayar')->get()->result_array();

		$this->load->view('templates/header');
		$this->load->view('home/index', [
			'stock'       => $stock,
			'pengguna'    => $pengguna,
			'pemasangan'  => $pemasangan,
			'telat_bayar' => $telat_bayar
		]);
		$this->load->view('templates/footer');
	}
}