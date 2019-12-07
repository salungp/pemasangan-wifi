<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
{
	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('profile/index');
		$this->load->view('templates/footer');
	}

	public function update()
	{
		$old = $this->User->loggedIn();
		$password = $this->input->post('password') != null
								? password_hash($this->input->post('password'), PASSWORD_DEFAULT)
								: $old['password'];

		$this->db->where('id', $old['id']);
		$this->db->update('users', [
			'username' => htmlspecialchars($this->input->post('username')),
			'password' => $password
		]);
		$message = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                Data berhasil diubah!
              </div>';
		$this->session->set_flashdata('message', $message);
		redirect($this->agent->referrer());
	}
}
