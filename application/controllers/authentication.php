<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	 
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('m_auth');
	}
	
	public function admin_login()
	{
		$this->load->view('admin/login');
	}
	public function admin_register()
	{
		$this->load->view('admin/register');
	}

	public function register(){
		
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

			$this->m_auth->register($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Registrasi Berhasil!</div>');
			redirect('login');
		}
	}
	public function login(){
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
		$user = $this->m_auth->cek_user(['email'=>$email])->row_array();
		
		if ($user) {
			if(password_verify($password, $user['password'])){
				$sess = [
					'email'=>$user['email'],
					'nama'=>$user['nama']
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
}
