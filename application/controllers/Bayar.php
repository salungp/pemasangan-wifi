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
		$this->load->model(['Invoice', 'Customers']);
	}

	public function index()
	{
		$data = $this->Invoice->order_by('id', 'desc')->All();
		$this->load->view('templates/header');
		$this->load->view('telat_bayar/index', ['data' => $data]);
		$this->load->view('templates/footer');
	}

	public function excel()
	{
		$data = $this->Invoice->order_by('id', 'desc')->All();
		$this->load->view('telat_bayar/excel', ['data' => $data]);
	}

	public function detail($id)
	{
		$data = $this->Invoice->detail($id);
		$this->load->view('templates/header');
		$this->load->view('telat_bayar/detail', ['data' => $data]);
		$this->load->view('templates/footer');
	}

	public function destroy($id)
	{
		$this->Invoice->delete($id);
		$this->Messages->alert('success', 'Data berhasil dihapus!');
		redirect($this->agent->referrer());
	}
}
