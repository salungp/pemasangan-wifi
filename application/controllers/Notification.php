<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller
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
		$data = $this->builder->setTable('notifications')->get(['order_by' => ['id', 'desc']])->result_array();
		$this->load->view('templates/header');
		$this->load->view('notification/index', ['data' => $data]);
		$this->load->view('templates/footer');
	}
}