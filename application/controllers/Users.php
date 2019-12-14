<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('login_token'))
		{
			redirect('login');
		}
		$this->load->model('User');
	}

	public function index()
	{
		$data = $this->User->order_by('id', 'desc')->all();
		$this->load->view('templates/header');
		$this->load->view('users/index', ['data' => $data]);
		$this->load->view('templates/footer');
	}
}