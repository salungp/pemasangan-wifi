<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model
{
	private $table = 'users';

	public function loggedIn()
	{
		$query = $this->db->get_where($this->table, ['login_token' => $this->session->userdata('login_token')]);
		return $query->row_array();
	}
}