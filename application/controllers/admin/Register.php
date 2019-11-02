<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	 
	public function __construct(){
		parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_admin');
	}
	
	public function authentication(){
		if ($this->session->userdata('level')!='SPV') {
			redirect('admin/login');
		}
	}

	public function data_user(){
        $this->authentication();
        $data['user'] = $this->M_admin->data_user()->result_array();
		$this->load->view('admin/data_user', $data);		
    }
    
	public function register(){
        $this->authentication();
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|valid_email|is_unique[admin.email]',['is_unique' => 'This email has already registered']);
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|matches[password2]',[
			'matches'=>'Password don\'t match',
			'min_length'=>'Password too short']);
		$this->form_validation->set_rules('password2', 'Password', 'trim|required|matches[password]', [
			'matches'=>'Password don\'t match']);
		$this->form_validation->set_rules('nohp', 'No. HP', 'trim|numeric');
		$this->form_validation->set_rules('akses', 'Akses', 'trim|required');
		if ($this->form_validation->run() == false) {
			# code...
			$this->load->view('admin/register');
		}else{
			$data = [
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
				'level' => $this->input->post('akses'),
				'nohp' => $this->input->post('nohp')
			];

			$this->M_admin->register($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Registrasi Berhasil!</div>');
			redirect('admin/data_user');
		}
	}




}
