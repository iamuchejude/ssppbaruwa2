<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_model extends CI_Model {
	private $table = 'member';

	public function __construct() {
		Parent::__construct();
	}

	public function create($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function read()
	{
		$this->db->where('id', $this->id);
		return $this->db->get($this->table)->result();
	}

	public function readSpecific($params)
	{
		foreach($params as $key => $value) {
			$this->db->where($key, $value);
		}
		return $this->db->get($this->table)->result();
	}

	public function update($data, $params)
	{
		foreach($params as $key => $value) {
			$this->db->where($key, $value);
		}
		return $this->db->update($this->table, $data);
	}

	public function delete($params)
	{
		foreach($params as $key => $value) {
			$this->db->where($key, $value);
		}
		return $this->db->delete($this->table);
	}
}
