<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crm extends CI_Model {
	private $table = 'app';
	private $id = 1;

	public function __construct() {
		Parent::__construct();
	}

	public function read()
	{
		$this->db->where('id', $this->id);
		return $this->db->get($this->table)->result();
	}

	public function update($data)
	{
		$this->db->where('id', $this->id);
		return $this->db->update($this->table, $data);
	}

	public function delete()
	{
		$this->db->where('id', $this->id);
		return $this->db->delete($this->table);
	}
}
