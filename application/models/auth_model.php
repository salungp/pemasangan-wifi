<?php defined('BASEPATH') OR exit('No direct script access allowed');

class auth_model extends CI_Model
{
	private $table = 'users';

	public function user_where($where)
	{
		$query = $this->db->get_where($this->table, $where);
		return $query;
	}
}