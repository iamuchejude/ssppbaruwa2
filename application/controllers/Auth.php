<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct() {
		Parent::__construct();
		$this->load->model('family_model');
	}

	public function family_login()
	{
		$familyName = $this->input->post('family_name');
		$familyPasskey = $this->input->post('family_passkey');
		$validation = array (
			['field' => 'family_name', 'label' => 'Family Name', 'rules' => 'required'],
			['field' => 'family_passkey', 'label' => 'Passkey', 'rules' => 'numeric|required'],
		);
		$this->form_validation->set_rules($validation);
		if($this->form_validation->run() == false) {
			$this->session->set_flashdata('login_message', ['code' => 'error', 'msg' => validation_errors()]);
		} else {
			$checkFamily = $this->family_model->readSpecific(['name' => $familyName]);
			if(count((array)$checkFamily) <= 0) {
				$this->session->set_flashdata('login_message', ['code' => 'error', 'msg' => 'Family does not exist. Please register your family.']);
			} else {
				$hashedPasskey = sha1(md5(sha1("s@s ".$familyPasskey." p@p")));
				$attemptLogin = $this->family_model->readSpecific(['name' => $familyName, 'passkey' => $hashedPasskey]);
				if(count((array)$attemptLogin) <= 0) {
					$this->session->set_flashdata('login_message', ['code' => 'error', 'msg' => 'Passkey is incorrect.']);
				} else {
					if($attemptLogin[0]->status <= 0) {
						$this->session->set_flashdata('login_message', ['code' => 'error', 'msg' => 'Family account have been suspended. Contact the admin to activate your account.']);
					} else {
						foreach($attemptLogin[0] as $key => $value) {
							$this->session->{$key} = $value;
						}
						$this->session->loggedIn = true;
						redirect(base_url().'family/dashboard');
					}
				}
			}
		}
		header('location: '.base_url().'family/login');
	}

	public function family_register()
	{
		$validation = array (
			['field' => 'name', 'label' => 'Name', 'rules' => 'required'],
			['field' => 'phone', 'label' => 'Phone Number', 'rules' => 'required'],
			['field' => 'address', 'label' => 'Residential Address', 'rules' => 'required'],
			['field' => 'city', 'label' => 'City', 'rules' => 'required'],
			['field' => 'state', 'label' => 'State', 'rules' => 'required'],
			['field' => 'country', 'label' => 'Country', 'rules' => 'required'],
			['field' => 'passkey', 'label' => 'Passkey', 'rules' => 'required|numeric'],
			['field' => 'verify_passkey', 'label' => 'Verify Passkey', 'rules' => 'required|numeric|matches[passkey]',
				'errors' => array(
					'matches' => 'Both New Passkey must be the same'
				)
			],
		);
		$this->form_validation->set_rules($validation);
		if($this->form_validation->run() == false) {
			$this->session->set_flashdata('register_message', ['msg' => validation_errors(), 'code' => 'danger']);
			header('location: '.base_url().'family/register');
		} else {
			$dupData = array (
				'name'	=> $this->input->post('name'),
				'phone'	=> $this->input->post('phone'),
				'address'	=> $this->input->post('address')
			);
			$checkExistence = $this->family_model->readSpecific($dupData);
			if(count((array)$checkExistence) >= 1){
				$this->session->set_flashdata('register_message', ['msg' => 'Family already exist.', 'code' => 'error']);
				header('location: '.base_url().'family/register');
			} else {
				$data = array (
					'name'	=> $this->input->post('name'),
					'city'	=> $this->input->post('city'),
					'state'	=> $this->input->post('state'),
					'phone'	=> $this->input->post('phone'),
					'address'	=> $this->input->post('address'),
					'country'	=> $this->input->post('country'),
					'photo'	=> 'avatar.jpg',
					'passkey'	=> sha1(md5(sha1("s@s ".$this->input->post('passkey')." p@p"))),
					'status'	=> '1'
				);
				$attempRegister = $this->family_model->create($data);
				if($attempRegister != true) {
					$this->session->set_flashdata('register_message', ['msg' => 'Oops! Unexpected Error Occured!! Please try again later!!!', 'code' => 'success']);
					header('location: '.base_url().'family/register');
				} else {
					$this->session->set_flashdata('login_message', ['msg' => 'Registration was successful. Enter Family Name and Passkey to login.', 'code' => 'success']);
					header('location: '.base_url().'family/login');
				}
			}
		}
	}
}
