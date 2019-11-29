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
		$this->load->model(['builder', 'helper']);
	}

	public function index()
	{
		$this->helper->find();
		$stock       = $this->builder->setTable('stocks')->get()->result_array();
		$pengguna    = $this->builder->setTable('pengguna')->get()->result_array();
		$pemasangan  = $this->builder->setTable('pemasangan')->get()->result_array();
		$telat_bayar = $this->builder->setTable('telat_bayar')->get()->result_array();

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