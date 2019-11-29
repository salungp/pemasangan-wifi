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
		$this->load->model('builder');
	}

	public function index()
	{
		$data = $this->builder->setTable('pengguna')->get(['order_by' => ['id', 'desc']])->result_array();
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
		$this->builder->setTable('pengguna')->store([
			'name'         => htmlspecialchars($this->input->post('name')),
			'address'      => htmlspecialchars($this->input->post('adress')),
			'phone_number' => $this->input->post('phone_number'),
			'brandwith'    => htmlspecialchars($this->input->post('brandwith')),
			'tgl_pasang'   => htmlspecialchars($this->input->post('tgl_pasang')),
			'ip_address'   => htmlspecialchars($this->input->post('ip_address'))
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
		$pengguna = $this->builder->setTable('pengguna')->get(['where' => ['id', $id]])->row_array();
		if ($pengguna)
		{
			$this->builder->setTable('pengguna')->delete(['id' => $id]);
			$message = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                Data berhasil dihapus!
              </div>';
			$this->session->set_flashdata('message', $message);
			redirect($this->agent->referrer());
		} else {
			show_404();
		}
	}

	public function edit($id)
	{
		$data = $this->builder->setTable('pengguna')->get(['where' => ['id', $id]])->row_array();
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
		$this->builder->setTable('pengguna')->update(['id' => $id], [
			'name'         => htmlspecialchars($this->input->post('name')),
			'address'      => htmlspecialchars($this->input->post('adress')),
			'phone_number' => $this->input->post('phone_number'),
			'brandwith'    => htmlspecialchars($this->input->post('brandwith')),
			'tgl_pasang'   => htmlspecialchars($this->input->post('tgl_pasang'))
		]);
		$message = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                Data berhasil diedit!
              </div>';
		$this->session->set_flashdata('message', $message);
		redirect('pengguna');
	}

	public function excel()
	{
		$data = $this->builder->setTable('pengguna')->get(['order_by' => ['id', 'desc']])->result_array();
		$this->load->view('pengguna/excel', ['data' => $data]);
	}
}