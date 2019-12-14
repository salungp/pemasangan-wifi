<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('login_token'))
		{
			redirect('login');
		}
		$this->load->model('Customers');
	}

	public function index()
	{
		$data = $this->Customers->order_by('id', 'desc')->All();
		$this->load->view('templates/header');
		$this->load->view('pengguna/index', ['data' => $data]);
		$this->load->view('templates/footer');
	}

	public function create()
	{
		$this->load->view('templates/header');
		$this->load->view('pengguna/create');
		$this->load->view('templates/footer');
	}

	public function store()
	{
		$this->Customers->store([
			'name'         => htmlspecialchars($this->input->post('name')),
			'address'      => htmlspecialchars($this->input->post('address')),
			'phone_number' => $this->input->post('phone_number'),
			'brandwith'    => htmlspecialchars($this->input->post('brandwith')),
			'tgl_pasang'   => htmlspecialchars($this->input->post('tgl_pasang')),
			'ip_address'   => htmlspecialchars($this->input->post('ip_address'))
		]);

		$this->Messages->alert('success', 'Data berhasil ditambah!');
		redirect($this->agent->referrer());
	}

	public function destroy($id)
	{
		$pengguna = $this->Customers->find($id);
		if ($pengguna)
		{
			$this->Customers->delete($id);
			$this->Messages->alert('success', 'Data berhasil dihapus!');
			redirect($this->agent->referrer());
		} else {
			show_404();
		}
	}

	public function edit($id)
	{
		$data = $this->Customers->find($id);
		if ($data)
		{
			$this->load->view('templates/header');
			$this->load->view('pengguna/edit', ['data' => $data]);
			$this->load->view('templates/footer');
		} else {
			show_404();
		}
	}

	public function update($id)
	{
		$this->Customers->where('id', 'desc')->update([
			'name'         => htmlspecialchars($this->input->post('name')),
			'address'      => htmlspecialchars($this->input->post('address')),
			'phone_number' => $this->input->post('phone_number'),
			'brandwith'    => htmlspecialchars($this->input->post('brandwith')),
			'ip_address'   => htmlspecialchars($this->input->post('ip_address')),
			'tgl_pasang'   => htmlspecialchars(date('Y-m-d H:i:s', strtotime($this->input->post('tgl_pasang'))))
		]);
		$this->Messages->alert('success', 'Data berhasil diupdate!');
		redirect('pengguna');
	}

	public function excel()
	{
		$data = $this->Customers->order_by('id', 'desc')->All();
		$this->load->view('pengguna/excel', ['data' => $data]);
	}
}
