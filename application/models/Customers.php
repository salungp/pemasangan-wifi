<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Model
{
	private $table = 'pengguna';

	public function All()
	{
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function find($id)
	{
		$query = $this->db->get_where($this->table, ['id' => $id]);
		return $query->row_array();
	}
}
