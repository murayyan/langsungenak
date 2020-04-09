<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahanbaku extends CI_Controller
{
    public function __construct(){
		parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_bahanbaku');
    }
    
    public function authentication(){
		if ($this->session->userdata('level')!='SPV') {
			redirect('admin/login');
		}
	}

	public function data_bahanbaku(){
        $this->authentication();
        $data['bahan'] = $this->M_bahanbaku->data_bahan()->result_array();
		$this->load->view('admin/data_bahanbaku', $data);
    }

    public function tambahBahan()
    {
        $this->authentication();
        $data = [
            'nama_bahan' => $this->input->post('nama_bahan'),
            'stok' => $this->input->post('stok')
        ];

        $this->M_bahanbaku->addBahan($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambahkan Bahan!</div>');
        redirect('admin/data_bahanbaku');
    }

    public function updateBahan()
    {
        $this->authentication();
        $data = [
            'nama_bahan' => $this->input->post('nama_bahan'),
            'stok' => $this->input->post('stok')
        ];

        $this->M_bahanbaku->updateBahan($data, $this->input->post('id'));
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menyunting Bahan!</div>');
        redirect('admin/data_bahanbaku');
    }

    public function deleteBahan()
	{
		$input = $this->input->post();
		$this->db->delete('bahan_baku', ['id' => $input['id']]);
		redirect(base_url('admin/data_bahanbaku'));
	}
}
