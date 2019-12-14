<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('login_token'))
		{
			redirect('login');
		}
		$this->load->model('Stocks');
	}

	public function index()
	{
		$stock = $this->Stocks->order_by('id', 'desc')->where('status', 0)->All();
		$this->load->view('templates/header');
		$this->load->view('stock/index', ['data' => $stock]);
		$this->load->view('templates/footer');
	}

	public function create()
	{
		$this->load->view('templates/header');
		$this->load->view('stock/create');
		$this->load->view('templates/footer');
	}

	public function store()
	{
		$this->Stocks->store([
			'nama_barang'   => htmlspecialchars($this->input->post('nama_barang')),
			'harga'         => htmlspecialchars(implode('', explode('.', $this->input->post('harga')))),
			'tgl_pembelian' => htmlspecialchars($this->input->post('tgl_pembelian')),
			'satuan'        => htmlspecialchars($this->input->post('satuan')),
			'jumlah'        => htmlspecialchars($this->input->post('jumlah')),
			'status'        => 0
		]);

		$this->Messages->alert('success', 'Data berhasil ditambah!');
		redirect($this->agent->referrer());
	}

	public function destroy($id)
	{
		$stock = $this->Stocks->find($id);

		if ($stock)
		{
			$this->Stocks->delete($id);

			$this->Messages->alert('success', 'Data berhasil dihapus!');
		} else {
			show_404();
		}
	}

	public function edit($id)
	{
		$stock = $this->Stocks->find($id);
		if ($stock)
		{
			$this->load->view('templates/header');
			$this->load->view('stock/edit', ['stock' => $stock]);
			$this->load->view('templates/footer');
		} else {
			show_404();
		}
	}

	public function update($id)
	{
		$this->Stocks->where('id', $id)->update([
			'nama_barang'   => htmlspecialchars($this->input->post('nama_barang')),
			'harga'         => htmlspecialchars(implode('', explode('.', $this->input->post('harga')))),
			'tgl_pembelian' => htmlspecialchars($this->input->post('tgl_pembelian')),
			'satuan'        => htmlspecialchars($this->input->post('satuan')),
			'jumlah'        => htmlspecialchars($this->input->post('jumlah'))
		]);

		$this->Messages->alert('success', 'Data berhasil diupdate!');
		redirect('stock');
	}

	public function excel()
	{
		$data = $this->Stocks->order_by('id', 'desc')->All();
		$this->load->view('stock/excel', ['data' => $data]);
	}
}
