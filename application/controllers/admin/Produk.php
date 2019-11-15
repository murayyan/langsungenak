<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	 
	public function __construct(){
		parent::__construct();
		$this->load->helper('file');
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
        $data['produk'] = $this->M_produk->data_produk()->result_array();
		$this->load->view('admin/data_produk', $data);		
    }
    
	public function add_produk(){
        $this->authentication();
		$this->form_validation->set_rules('nama_produk', 'Nama Produk', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
		$this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
		$this->form_validation->set_rules('harga', 'Harga', 'trim|numeric');
		// $this->form_validation->set_rules('gambar', 'Gambar', 'required');
		if ($this->form_validation->run() == false) {
			# code...
			$data['jenis_form'] = 'add';
			$this->load->view('admin/produk', $data);
		}else{

			$filename = null;
			if ($_FILES['gambar']['name'] != '') {
				$config = [
					'file_name' 	=> time() . '_' . substr(str_replace(' ', '_', $_FILES['gambar']['name']), -12),
					'upload_path' 	=> 'assets/images/gambar_produk',
					'allowed_types'	=> 'jpg|jpeg|png|pdf',
					'max_size' 		=> '10000'
				];

				$this->load->library('upload', $config);
				
				if (!$this->upload->do_upload('gambar')) { // jika gak berhasil upload
					$this->session->set_flashdata('gambar_error', '<small class="text-danger pl-3">' . $this->upload->display_errors() . '</small>');
					echo "<script>history.go(-1);</script>";
					die;
				}else{
					$filename = $config['file_name'];
				}
				
			}

			$data = [
				'nama_produk' => $this->input->post('nama_produk'),
				'deskripsi' => $this->input->post('deskripsi'),
				'kategori' => $this->input->post('kategori'),
				'harga' => $this->input->post('harga'),
				'gambar' => $filename
			];

			$this->M_produk->add_produk($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambahkan Produk!</div>');
			redirect('admin/data_produk');
		}
	}

	public function edit_produk($id)
	{
		$this->authentication();
		$this->form_validation->set_rules('nama_produk', 'Nama Produk', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
		$this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
		$this->form_validation->set_rules('harga', 'Harga', 'trim|numeric');
		// $this->form_validation->set_rules('gambar', 'Gambar', 'required');

		$data['produk'] = $this->M_produk->getProduk(['id' => $id])->row_array();
		$old_gambar = $this->input->post('old_gambar');

		if ($this->form_validation->run() == false) {
			# code...
			$data['jenis_form'] = 'edit';
			$this->load->view('admin/produk', $data);
		} else {
			
			if ($_FILES['gambar']['name'] != '') {
				$config = [
					'file_name' 	=> time() . '_' . substr(str_replace(' ', '_', $_FILES['gambar']['name']), -12),
					'upload_path' 	=> 'assets/images/gambar_produk',
					'allowed_types'	=> 'jpg|jpeg|png|pdf',
					'max_size' 		=> '10000'
				];

				$this->load->library('upload', $config);
				
				if (!$this->upload->do_upload('gambar')) { // jika gak berhasil upload
					$this->session->set_flashdata('gambar_error', '<small class="text-danger pl-3">' . $this->upload->display_errors() . '</small>');
					echo "<script>history.go(-1);</script>";
					die;
				}else{
					$filename = $config['file_name'];
					unlink('./assets/images/gambar_produk/'. $old_gambar);
				}
				
			} else {
				$filename = $old_gambar;
			}

			$data = [
				'nama_produk' => $this->input->post('nama_produk'),
				'deskripsi' => $this->input->post('deskripsi'),
				'kategori' => $this->input->post('kategori'),
				'harga' => $this->input->post('harga'),
				'gambar' => $filename
			];

			$this->M_produk->edit_produk($data, ['id' => $id]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menyunting Produk!</div>');
			redirect('admin/data_produk');
		}
	}

}
