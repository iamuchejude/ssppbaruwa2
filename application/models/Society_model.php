<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Society_model extends CI_Model {
	private $table = 'society';

	public function __construct() {
		Parent::__construct();
	}

	public function create($data)
	{
		return $this->db->insert($ths->table, $data);
	}

	public function read()
	{
		return $this->db->get($this->table)->result();
	}

	public function readSpecific($params)
	{
		foreach($params as $key => $value) {
			$this->db->where($key, $value);
		}
		return $this->db->get($this->table)->result();
	}

	public function update($data, $param)
	{
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
