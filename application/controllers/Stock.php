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
		$this->load->model('Builder');
	}

	public function index()
	{
		$stock = $this->Builder->setTable('stocks')->get(['order_by' => ['id', 'desc'], 'where' => ['status', 0]])->result_array();
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
		$this->Builder->setTable('stocks')->store([
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
		$stock = $this->Builder->setTable('stocks')->get(['where' => ['id', $id]])->row_array();

		if ($stock)
		{
			$this->Builder->setTable('stocks')->delete(['id' => $id]);

			$this->Messages->alert('success', 'Data berhasil dihapus!');
		} else {
			show_404();
		}
	}

	public function edit($id)
	{
		$stock = $this->Builder->setTable('stocks')->get(['where' => ['id', $id]])->row_array();
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
		$this->Builder->setTable('stocks')->update(['id' => $id], [
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
		$data = $this->Builder->setTable('stocks')->get(['order_by' => ['id', 'desc']])->result_array();
		$this->load->view('stock/excel', ['data' => $data]);
	}
}
