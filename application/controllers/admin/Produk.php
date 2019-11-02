<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	 
	public function __construct(){
		parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_produk');
	}
	
	public function authentication(){
		if ($this->session->userdata('level')!='SPV') {
			redirect('admin/login');
		}
	}

	public function data_produk(){
        $this->authentication();
        $data['user'] = $this->M_produk->data_user()->result_array();
		$this->load->view('admin/data_user', $data);		
    }
    
	public function add_produk(){
        $this->authentication();
		$this->form_validation->set_rules('nama_produk', 'Nama Produk', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
		$this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
		$this->form_validation->set_rules('harga', 'Harga', 'trim|numeric');
		$this->form_validation->set_rules('gambar', 'Gambar', 'required');
		if ($this->form_validation->run() == false) {
			# code...
			$this->load->view('admin/produk');
		}else{
			$data = [
				'nama_produk' => $this->input->post('nama_produk'),
				'deskripsi' => $this->input->post('deskripsi'),
				'kategori' => $this->input->post('kategori'),
				'harga' => $this->input->post('harga'),
				'gambar' => $this->input->post('nohp')
			];

			$this->M_produk->add_produk($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Registrasi Berhasil!</div>');
			redirect('admin/data_user');
		}
	}

}
