<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Family extends CI_Controller {
	public function __construct() {
		Parent::__construct();
		$this->load->model('family_model');
		$this->load->model('member_model');
		$this->load->model('society_model');
		// Check Family Counts
		$this->data['totalFamily'] = count($this->member_model->readSpecific(['family_id' => $this->session->id]));
		$this->data['totalMale'] = count($this->member_model->readSpecific(['family_id' => $this->session->id, 'gender' => 'Male']));
		$this->data['totalFemale'] = count($this->member_model->readSpecific(['family_id' => $this->session->id, 'gender' => 'Female']));
	}

	public function update_profile()
	{
		$validation = array(['field' => 'name', 'label' => 'Name', 'rules' => 'required|alpha'],
							['field' => 'phone', 'label' => 'Phone Number', 'rules' => 'required'],
							['field' => 'email', 'label' => 'Email', 'rules' => 'valid_email'],
						);
		$this->form_validation->set_rules($validation);
		if($this->form_validation->run() == false) {
			$this->session->set_flashdata('update_profile_message', ['code' => 'danger', 'msg' => validation_errors()]);
		} else {
			$dataToUpdate = array (
				'name' => $this->input->post('name'),
				'phone' => $this->input->post('phone'),
				'email' => $this->input->post('email'),
				'address' => $this->input->post('address'),
				'city' => $this->input->post('city'),
				'country' => $this->input->post('county'),
				'nationality' => $this->input->post('nationality'),
				'state_of_origin' => $this->input->post('state_of_origin'),
				'bcc' => $this->input->post('bcc')
				// 'updated_at' => time()
			);
			$update = $this->family_model->update($dataToUpdate, ['id' => $this->session->id]);
			if(!$update) {
				$this->session->set_flashdata('update_profile_message', ['code' => 'danger', 'msg' => "Error in updating profile. Please try again later."]);
			} else {
				foreach($dataToUpdate as $key => $value) {
					$this->session->$key = $value;
				}
				$this->session->set_flashdata('update_profile_message', ['code' => 'success', 'msg' => "Updated profile"]);
			}
		}
		redirect('family/settings');
	}

	public function update_passkey() 
	{
		$validation = array(
						['field' => 'current_passkey', 'label' => 'Current Passkey', 'rules' => 'min[6]|max[6]|required|numeric'],
						['field' => 'new_passkey', 'label' => 'New Passkey', 'rules' => 'min[6]|max[6]|required|numeric'],
						['field' => 're_new_passkey', 'label' => 'New Passkey', 'rules' => 'min[6]|max[6]|required|numeric|matches[new_passkey]',
							'errors' => array(
								'matches' => 'Both New Passkey must be the same'
							)
						],
						['field' => 'security_question', 'label' => 'Security Question', 'rules' => 'required|numeric'],						
					);
		$this->form_validation->set_rules($validation);
		if($this->form_validation->run() == false) {
			$this->session->set_flashdata('update_passkey_message', ['code' => 'danger', 'msg' => validation_errors()]);
		} else {
			if($this->data['security_question'] != 4) {
				$this->session->set_flashdata('update_passkey_message', ['code' => 'danger', 'msg' => "Answer to Security Question is wrong"]);
			} else {
				if($this->data['current_passkey'] != $this->session->passkey) {
					$this->session->set_flashdata('update_passkey_message', ['code' => 'danger', 'msg' => "Current Passkey is Wrong"]);
				} else {
					$update = $this->family_model->update(['passkey' => $this->input->post('current_passkey')], ['id' => $this->session->id]);
					if(!$update) {
						$this->session->set_flashdata('update_passkey_message', ['code' => 'danger', 'msg' => "Passkey update Failed! Please try again later!"]);
					} else {
						$this->session->set_flashdata('update_passkey_message', ['code' => 'success', 'msg' => "Passkey updated successfully!"]);
					}
				}
			}
		}	
		redirect('family/settings');		
	}

	public function checkStatus()
	{
		if(isset($this->session->loggedIn)) {
			if($this->session->loggedIn != true) {
				header('location: '.base_url().'family/login');	
			} else {
				return false;
			}
		} else {
			header('location: '.base_url().'family/login');	
		}
	}

	public function dashboard()
	{
		$this->checkStatus();
		$this->data['page_title'] = 'Family Dashboard - '.$this->crm->read()[0]->name;
		$this->load->view('globals/templates/head', $this->data);
		$this->load->view('family/templates/header', $this->data);
		$this->load->view('family/dashboard');
		$this->load->view('family/templates/footer', $this->data);
		$this->load->view('globals/templates/foot', $this->data);
	}

	public function profile()
	{
		$this->checkStatus();
		$this->data['page_title'] = 'Family Profile - '.$this->crm->read()[0]->name;
		$this->load->view('globals/templates/head', $this->data);
		$this->load->view('family/templates/header', $this->data);
		$this->load->view('family/profile');
		$this->load->view('family/templates/footer', $this->data);
		$this->load->view('globals/templates/foot', $this->data);
	}

	public function members()
	{
		$this->checkStatus();
		$this->data['page_title'] = 'Family Members - '.$this->crm->read()[0]->name;
		$this->data['title'] = 'Family Members';
		$this->data['members'] = $this->member_model->readSpecific(array('family_id' => $this->session->id));
		$this->load->view('globals/templates/head', $this->data);
		$this->load->view('family/templates/header', $this->data);
		$this->load->view('family/members');
		$this->load->view('family/templates/footer', $this->data);
		$this->load->view('globals/templates/foot', $this->data);
	}

	public function settings()
	{
		$this->checkStatus();
		$this->data['page_title'] = 'Family Settings - '.$this->crm->read()[0]->name;
		$this->data['title'] = 'Family Settings';
		$this->load->view('globals/templates/head', $this->data);
		$this->load->view('family/templates/header', $this->data);
		$this->load->view('family/settings');
		$this->load->view('family/templates/footer', $this->data);
		$this->load->view('globals/templates/foot', $this->data);
	}

	public function add_member()
	{
		$this->checkStatus();
		$this->data['page_title'] = 'Add New Family Member - '.$this->crm->read()[0]->name;
		$this->data['title'] = 'Add New Family Member';
		$this->data['societies'] = $this->society_model->read();
		$this->load->view('globals/templates/head', $this->data);
		$this->load->view('family/templates/header', $this->data);
		$this->load->view('family/add_member');
		$this->load->view('family/templates/footer', $this->data);
		$this->load->view('globals/templates/foot', $this->data);
	}
	
	public function view_member($id)
	{
		$this->checkStatus();
		$this->data['page_title'] = 'Member Name - '.$this->crm->read()[0]->name;
		$this->data['societies'] = $this->society_model->read();
		$this->data['family'] = $this;
		$this->data['member'] = $this->member_model->readSpecific(array('id' => $id));
		$this->load->view('family/view_member', $this->data);
	}
	
	public function edit_member($id)
	{
		$this->checkStatus();
		$this->data['page_title'] = 'Member Name - '.$this->crm->read()[0]->name;
		$this->data['title'] = 'Edit MemberName Profile';
		$this->data['member'] = $this->member_model->readSpecific(array('id' => $id));
		$this->data['societies'] = $this->society_model->read();
		$this->load->view('globals/templates/head', $this->data);
		$this->load->view('family/templates/header', $this->data);
		$this->load->view('family/edit_member', $this->data);
		$this->load->view('family/templates/footer', $this->data);
		$this->load->view('globals/templates/foot', $this->data);
	}

	public function delete_member($id)
	{
		$this->checkStatus();
		$delete = $this->member_model->delete(['id' => $id]);
		if(!$delete) {
			$this->session->set_flashdata('delete_member_message', ['code' => 'danger', 'msg' => 'Member was not deleted unsuccessfully']);
		} else {
			$this->session->set_flashdata('delete_member_message', ['code' => 'success', 'msg' => 'Member deleted Successfully']);
		}
		redirect('family/members');
	}

	public function index()
	{
		if(isset($this->session->loggedIn)) {
			if($this->session->loggedIn == true) {
				redirect('family/dashboard');
			} else {
				redirect('family/login');
			}
		} else {
			redirect('family/login');
		}
	}

	public function login()
	{
		$this->data['page_title'] = 'Family Login - '.$this->crm->read()[0]->name;
		$this->data['wrapper'] = 'small';
		$this->load->view('inc/fauthheader', $this->data);
		$this->load->view('family/login', $this->data);
		$this->load->view('inc/fauthfooter', $this->data);
	}

	public function recover()
	{
		$this->data['page_title'] = 'Recover Password - '.$this->crm->read()[0]->name;
		$this->data['wrapper'] = 'small';
		$this->load->view('inc/fauthheader', $this->data);
		$this->load->view('family/recover', $this->data);
		$this->load->view('inc/fauthfooter', $this->data);
	}

	public function register()
	{
		$this->data['page_title'] = 'Create a family account - '.$this->crm->read()[0]->name;
		$this->data['wrapper'] = 'medium';
		$this->load->view('inc/fauthheader', $this->data);
		$this->load->view('family/register', $this->data);
		$this->load->view('inc/fauthfooter', $this->data);

	}

	public function logout()
	{
		unset($this->session);
		session_destroy();
		redirect('family/login');
	}

	public function update_member($id)
	{
		
		$validation = array (
			['field' => 'first_name', 'label' => 'Firstname', 'rules' => 'required'],
			['field' => 'last_name', 'label' => 'Lastname', 'rules' => 'required'],
			['field' => 'day_of_birth', 'label' => 'Day of Birth', 'rules' => 'required|numeric'],
			['field' => 'month_of_birth', 'label' => 'Month of Birth', 'rules' => 'required|alpha'],
			['field' => 'year_of_birth', 'label' => 'Year of Birth', 'rules' => 'required|numeric'],
			['field' => 'status', 'label' => 'status', 'rules' => 'required|alpha'],
			['field' => 'baptism', 'label' => 'baptism', 'rules' => 'required|numeric'],
			['field' => 'confirmation', 'label' => 'confirmation', 'rules' => 'required|numeric'],
			['field' => 'baptism', 'holy_eucharist' => 'holy_eucharist', 'rules' => 'required|numeric'],
			['field' => 'matrimony', 'label' => 'matrimony', 'rules' => 'required|numeric']
		);
		$this->form_validation->set_rules($validation);
		if($this->form_validation->run() != true) {
			$this->session->set_flashdata('member_edit_message', ['msg' => validation_errors(), 'code' => 'danger']);
		} else {
			// Check if Member Already Exist
			$data = array(
				'soceity' => json_encode($this->input->post('soceities')),
				'prefix' => $this->input->post('prefix'),
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'gender' => $this->input->post('gender'),
				'phone' => $this->input->post('phone'),
				'email' => $this->input->post('email'),
				'day_of_birth' => $this->input->post('day_of_birth'),
				'month_of_birth' => $this->input->post('month_of_birth'),
				'year_of_birth' => $this->input->post('year_of_birth'),
				'profession' => $this->input->post('profession'),
				'sacraments' => json_encode(
									array(
										'baptism' => $this->input->post('baptism'),
										'confirmation' => $this->input->post('confirmation'),
										'holy_eucharist' => $this->input->post('holy_eucharist'),
										'matrimony' => $this->input->post('matrimony')
									)
								),
				'updated_at' => time(),
				'photo' => 'avatar.jpg'
			);
			$update = $this->member_model->update($data, ['family_id' => $this->session->id, 'id' => $id]);
			if($update) {
				$this->session->set_flashdata('member_edit_message', ['msg' => 'Member successfully edited', 'code' => 'success']);					
			} else {
				$this->session->set_flashdata('member_edit_message', ['msg' => 'Member edition failed!', 'code' => 'danger']);					
			}
			header('location: '.base_url().'family/edit_member/'.$id);
		}
	}

	public function upload_new_photo($name, $path) {
        $config['upload_path']   = $path;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 100;
        $config['max_width']     = 1024;
		$config['max_height']    = 768;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($name))
        {
            $error = array('error' => $this->upload->display_errors());
            return [false, $error];
        } else {
            $data = array('upload_data' => $this->upload->data());
            return [true, $data];
        }
	}

	public function save_member()
	{
		$validation = array (
			['field' => 'first_name', 'label' => 'Firstname', 'rules' => 'required'],
			['field' => 'last_name', 'label' => 'Lastname', 'rules' => 'required'],
			['field' => 'day_of_birth', 'label' => 'Day of Birth', 'rules' => 'required|numeric'],
			['field' => 'month_of_birth', 'label' => 'Month of Birth', 'rules' => 'required|alpha'],
			['field' => 'year_of_birth', 'label' => 'Year of Birth', 'rules' => 'required|numeric'],
			['field' => 'status', 'label' => 'status', 'rules' => 'required|alpha'],
			['field' => 'baptism', 'label' => 'baptism', 'rules' => 'required|numeric'],
			['field' => 'confirmation', 'label' => 'confirmation', 'rules' => 'required|numeric'],
			['field' => 'baptism', 'holy_eucharist' => 'holy_eucharist', 'rules' => 'required|numeric'],
			['field' => 'matrimony', 'label' => 'matrimony', 'rules' => 'required|numeric']
		);
		$this->form_validation->set_rules($validation);
		if($this->form_validation->run() != true) {
			$this->session->set_flashdata('member_add_message', ['msg' => validation_errors(), 'code' => 'danger']);
		} else {
			// Check if Member Already Exist
			$dupData = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'family_id' => $this->session->id
			);
			$checkExistence = $this->member_model->readSpecific($dupData);
			if(count((array)$checkExistence) >= 1){
				$this->session->set_flashdata('member_add_message', ['msg' => 'Member already belong to this family.', 'code' => 'danger']);
			} else {
				$data = array(
					'soceity' => json_encode($this->input->post('soceities')),
					'family_id' => $this->session->id,
					'prefix' => $this->input->post('prefix'),
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'gender' => $this->input->post('gender'),
					'phone' => $this->input->post('phone'),
					'email' => $this->input->post('email'),
					'day_of_birth' => $this->input->post('day_of_birth'),
					'month_of_birth' => $this->input->post('month_of_birth'),
					'year_of_birth' => $this->input->post('year_of_birth'),
					'status' => $this->input->post('status'),
					'profession' => $this->input->post('profession'),
					'sacraments' => json_encode(
										array(
											'baptism' => $this->input->post('baptism'),
											'confirmation' => $this->input->post('confirmation'),
											'holy_eucharist' => $this->input->post('holy_eucharist'),
											'matrimony' => $this->input->post('matrimony')
										)
									),
					'created_at' => time(),
					'updated_at' => time(),
					'photo' => 'avatar.jpg'
				);
				$create = $this->member_model->create($data);
				if($create) {
					$this->session->set_flashdata('member_add_message', ['msg' => 'Member successfully added', 'code' => 'success']);					
				} else {
					$this->session->set_flashdata('member_add_message', ['msg' => 'Member addition failed!', 'code' => 'danger']);					
				}
			}
			header('location: '.base_url().'family/add_member');
		}
	}

	public function getSociety($society)
	{
		$societies = [];
		foreach($society as $soc) {
			$fetch = $this->society_model->readSpecific(['short_name' => $soc]);
			array_push($societies, $fetch[0]->name);
		}
		return $societies;
	}

	public function society()
	{
		$this->getSociety(["Altar_Servers","MCA"]);
	}
}
