<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

	public function __construct() {
		Parent::__construct();
	}

	public function family_login($name)
	{
		$get = $this->db->query("SELECT * FROM family WHERE family.name='$name'");
		return $get->result_array();
	}
}
