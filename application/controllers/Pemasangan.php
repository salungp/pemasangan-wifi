<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pemasangan extends CI_Controller
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
		$data = $this->Builder->setTable('pemasangan')->get(['order_by' => ['id', 'desc']])->result_array();
		$this->load->view('templates/header');
		$this->load->view('pemasangan/index', ['data' => $data]);
		$this->load->view('templates/footer');
	}

	public function create()
	{
		$stocks = $this->Builder->setTable('stocks')->get(['order_by' => ['id', 'desc']])->result_array();
		$user   = $this->Builder->setTable('pengguna')->get(['order_by' => ['id', 'desc']])->result_array();
		$this->load->view('templates/header');
		$this->load->view('pemasangan/create', ['stocks' => $stocks, 'user' => $user]);
		$this->load->view('templates/footer');
	}

	public function store()
	{
		$bahan = [];
		foreach ($this->input->post('bahan') as $key => $value) {
			array_push($bahan, $value);
		}

		$this->Builder->setTable('pemasangan')->store([
			'waktu'           => htmlspecialchars($this->input->post('waktu_number').' '.$this->input->post('waktu_ket')),
			'stock_id'        => implode(',', $bahan),
			'pengguna_id'     => $this->input->post('pengguna_id'),
			'titik_koordinat' => htmlspecialchars($this->input->post('titik_koordinat'))
		]);

		$message = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                Data berhasil ditambah!
              </div>';
		$this->session->set_flashdata('message', $message);
		redirect($this->agent->referrer());
	}

	public function destroy($id)
	{
		$this->Builder->setTable('pemasangan')->delete(['id' => $id]);
		$message = '<div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-check"></i> Success!</h4>
              Data berhasil dihapus!
            </div>';
		$this->session->set_flashdata('message', $message);
		redirect($this->agent->referrer());
	}

	public function edit($id)
	{
		$data  = $this->Builder->setTable('pemasangan')->get(['where' => ['id', $id]])->row_array();
		$stock = $this->Builder->setTable('stocks')->get(['order_by' => ['id', 'desc']])->result_array();
		$user  = $this->Builder->setTable('pengguna')->get(['order_by' => ['id', 'desc']])->result_array();
		if ($data)
		{
			$this->load->view('templates/header');
			$this->load->view('pemasangan/edit', [
				'data' 	   => $data,
				'stocks'   => $stock,
				'user' => $user
			]);
			$this->load->view('templates/footer');
		} else {
			show_404();
		}
	}

	public function update($id)
	{
		$bahan = [];
		foreach ($this->input->post('bahan') as $key => $value) {
			array_push($bahan, $value);
		}
		
		$data = $this->Builder->setTable('pemasangan')->get(['where' => ['id', $id]])->row_array();
		if ($data)
		{
			$this->Builder->setTable('pemasangan')->update(['id' => $id], [
				'waktu'           => htmlspecialchars($this->input->post('waktu_number').' '.$this->input->post('waktu_ket')),
				'stock_id'        => implode(',', $bahan),
				'pengguna_id'     => $this->input->post('pengguna_id'),
				'titik_koordinat' => htmlspecialchars($this->input->post('titik_koordinat'))
			]);

			$message = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                Data berhasil diedit!
              </div>';
			$this->session->set_flashdata('message', $message);
			redirect('pemasangan');
		} else {
			show_404();
		}
	}

	public function excel()
	{
		$data = $this->Builder->setTable('pemasangan')->get(['order_by' => ['id', 'desc']])->result_array();
		$this->load->view('pemasangan/excel', ['data' => $data]);
	}
}