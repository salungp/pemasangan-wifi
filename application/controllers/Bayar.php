<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Bayar extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('login_token'))
		{
			redirect('login');
		}
		$this->load->model('Builder');
	}

	public function index()
	{
		$data = $this->Builder->setTable('telat_bayar')->get(['order_by' => ['id', 'desc']])->result_array();
		$this->load->view('templates/header');
		$this->load->view('telat_bayar/index', ['data' => $data]);
		$this->load->view('templates/footer');
	}

	public function excel()
	{
		$data = $this->Builder->setTable('telat_bayar')->get(['order_by' => ['id', 'desc']])->result_array();
		$this->load->view('telat_bayar/excel', ['data' => $data]);
	}
}