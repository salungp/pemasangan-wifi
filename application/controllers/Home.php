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
		$this->load->model(['Helper']);
	}

	public function index()
	{
		$this->Helper->find();
		$stock       = $this->db->get_where('stocks', ['status' => 0])->result_array();
		$pengguna    = $this->db->get('pengguna')->result_array();
		$pemasangan  = $this->db->get('pemasangan')->result_array();
		$telat_bayar = $this->db->get('telat_bayar')->result_array();

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
