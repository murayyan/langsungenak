<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_customer');
    }
    
    public function profil()
	{
		if ($this->session->userdata('login') != 'customer') {
			redirect(base_url());
		}
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|valid_email|is_unique[customer.email]', ['is_unique' => 'This email has already registered']);
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|matches[password2]', [
			'matches' => 'Password don\'t match',
			'min_length' => 'Password too short'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'trim|required|matches[password]', [
			'matches' => 'Password don\'t match'
		]);
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('nohp', 'No. HP', 'trim|required|numeric');
		if ($this->form_validation->run() == false) {
            $data['customer'] = $this->M_customer->getCust(['id' => $this->session->userdata('id')])->row_array();
            // print_r($data['customer']);die;
			$this->load->view('customer/profil', $data);
		} else {
			$data = [
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
				'alamat' => $this->input->post('alamat'),
				'nohp' => $this->input->post('nohp')
			];
            $where = ['id' => $this->session->userdata('id')];
			$this->M_customer->updateCust($data, $where);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update Profil Berhasil!</div>');
			redirect('login');
		}
	}
}
