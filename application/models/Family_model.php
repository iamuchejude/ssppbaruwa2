<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Family_model extends CI_Model {
	private $table = 'family';

	public function __construct() {
		Parent::__construct();
	}

	public function create($data)
	{
		$data['created_at']	= time();
		$data['updated_at']	= time();
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
		$data['updated_at']	= time();
		foreach($params as $key => $value) {
			$this->db->where($key, $value);
		}
		return $this->db->update($this->table, $data);
	}

	public function delete($param)
	{
		foreach($params as $key => $value) {
			$this->db->where($key, $value);
		}
		return $this->db->delete($this->table);
	}
}
