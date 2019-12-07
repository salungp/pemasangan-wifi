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
		$this->load->model('Notifcations');
	}

	public function index()
	{
		$data = $this->Notifications->order_by('id', 'desc')->all();
		$this->load->view('templates/header');
		$this->load->view('notification/index', ['data' => $data]);
		$this->load->view('templates/footer');
	}

	public function clear()
	{
		$this->db->like('id', '');
		$this->db->delete('notifications');
		redirect($this->agent->referrer());
	}
}
