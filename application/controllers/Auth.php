<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('cookie');
		$this->load->model('builder');
	}

	public function index()
	{
		if ($this->session->has_userdata('login_token'))
		{
			redirect('home');
			die;
		}
		$this->load->view('auth/login');
	}

	public function logout()
	{
		if ($this->session->has_userdata('login_token'))
		{
			$this->session->unset_userdata('login_token');
			redirect();
		} else {
			show_404();
		}
	}

	public function authenticate()
	{
		$user = $this->builder->setTable('users')->get(['where' => ['username', $this->input->post('username')]])->row_array();

		if ($_COOKIE['login_failed'] >= 5) {
			$message = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Login pending!</h4>
                Maaf anda telah gagal login selama 5 kali. Mohon tunggu lagi hingga <span class="timer">10.00</span>
              </div>';
			$this->session->set_flashdata('message', $message);
			redirect('login');
			die;
		}
		if ($user)
		{
			if (password_verify($this->input->post('password'), $user['password']))
			{
				setcookie('login_failed', '', time() - 3600);
				$this->session->set_userdata([
					'login_token' => $user['login_token']
				]);
				redirect('home');
			} else {
				$this->login_failed();
				$message = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Wrong password!</h4>
                Maaf password salah!
              </div>';
				$this->session->set_flashdata('message', $message);
				redirect('login');	
			}
		} else {
			$this->login_failed();
			$message = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Email not found!</h4>
                Maaf email tidak terdaftar!
              </div>';
			$this->session->set_flashdata('message', $message);
			redirect('login');
		}
	}

	public function login_failed()
	{
		$old = $_COOKIE['login_failed'];
		if ($_COOKIE['login_failed'] <= 5)
		{
			if (isset($_COOKIE['login_failed']))
			{
				setcookie('login_failed',$old+1,time()+(60 * 10),'/');
			} else {
				setcookie('login_failed',1,time()+(60 * 10),'/');
			}
		} else if ($_COOKIE['login_failed'] >= 5) {
			setcookie('login_failed',1,time()+(60 * 10),'/');
			$message = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Email not found!</h4>
                Maaf anda telah gagal login selama 5 kali. Mohon tunggu lagi hingga <span class="timer">10.00</span> menit
              </div>';
			$this->session->set_flashdata('message', $message);
			redirect('login');
			die;
		}
	}
}