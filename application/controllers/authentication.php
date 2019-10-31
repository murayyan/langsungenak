<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {
	 
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('m_customer');
		$this->load->model('m_admin');
	}
	
	public function authentication(){
		if ($this->session->userdata('login')!='customer') {
			redirect('login');
		}
	}

	public function register(){
		if ($this->session->userdata('login')=='customer') {
			redirect(base_url());
		}
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|valid_email|is_unique[customer.email]',['is_unique' => 'This email has already registered']);
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|matches[password2]',[
			'matches'=>'Password don\'t match',
			'min_length'=>'Password too short']);
		$this->form_validation->set_rules('password2', 'Password', 'trim|required|matches[password]', [
			'matches'=>'Password don\'t match']);
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('nohp', 'No. HP', 'trim|required|numeric');
		if ($this->form_validation->run() == false) {
			# code...
			$this->load->view('register');
		}else{
			$data = [
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
				'alamat' => $this->input->post('alamat'),
				'nohp' => $this->input->post('nohp'),
				'is_active' => 'active'
			];

			$this->m_customer->register($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Registrasi Berhasil!</div>');
			redirect('login');
		}
	}
	
	public function login(){
		if ($this->session->userdata('login')=='customer') {
			redirect(base_url());
		}
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
		if ($this->form_validation->run() == false) {
			# code...
			$this->load->view('login');
		}else{
			$this->_cek_login();
		}
	}

	private function _cek_login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$user = $this->m_customer->cek_user(['email'=>$email])->row_array();
		
		if ($user) {
			if(password_verify($password, $user['password'])){
				$sess = [
					'email'=>$user['email'],
					'nama'=>$user['nama'],
					'login'=>'customer'
				];
				$this->session->set_userdata($sess);
				redirect(base_url());
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
				redirect('login');
			}
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email tidak terdaftar!</div>');	
			redirect('login');
		}

	}

	function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'));
	}
	
	// ---------------------------------------------------------------------//
	//-------------------------ADMIN AUTHENTICATION-------------------------//
	// ---------------------------------------------------------------------//

	public function admin_register()
	{
		if ($this->session->userdata('login')=='admin') {
			redirect(base_url('admin'));
		}
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|valid_email|is_unique[customer.email]',['is_unique' => 'This email has already registered']);
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|matches[password2]',[
			'matches'=>'Password don\'t match',
			'min_length'=>'Password too short']);
		$this->form_validation->set_rules('password2', 'Password', 'trim|required|matches[password]', [
			'matches'=>'Password don\'t match']);
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('nohp', 'No. HP', 'trim|required|numeric');
		if ($this->form_validation->run() == false) {
			# code...
			$this->load->view('register');
		}else{
			$data = [
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
				'alamat' => $this->input->post('alamat'),
				'nohp' => $this->input->post('nohp'),
				'is_active' => 'active'
			];

			$this->m_admin->register($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Registrasi Berhasil!</div>');
			redirect('login');
		}
	}

	public function admin_login()
	{
		if ($this->session->userdata('login')=='admin') {
			redirect(base_url('admin/dashboard'));
		}
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
		if ($this->form_validation->run() == false) {
			# code...
			$this->load->view('admin/login');
		}else{
			$this->_cek_login_admin();
		}
	}

	private function _cek_login_admin(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$user = $this->m_admin->cek_admin(['email'=>$email])->row_array();
		
		if ($user) {
			if(password_verify($password, $user['password'])){
				$sess = [
					'level'=>$user['level'],
					'nama'=>$user['nama'],
					'login'=>'admin'
				];
				$this->session->set_userdata($sess);
				redirect(base_url('admin/dashboard'));
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
				redirect('admin/login');
			}
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email tidak terdaftar!</div>');	
			redirect('admin/login');
		}

	}

	function admin_logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('admin/login'));
	}

}
