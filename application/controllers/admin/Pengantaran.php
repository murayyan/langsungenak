<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengantaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pengantaran');
        $this->load->model('M_pesanan');
    }

    public function authentication()
	{
		if ($this->session->userdata('level') != 'SPV' && $this->session->userdata('level') != 'KURIR') {
			redirect('admin/login');
		}
    }
    
    public function jadwal_pengantaran()
    {
        $this->authentication();
        if ($this->session->userdata('level') == 'SPV') {
            $data['jadwal'] = $this->M_pengantaran->jadwal_antar_all()->result_array();
            $data['jadwalTerkirim'] = $this->M_pengantaran->jadwal_terkirim_all()->result_array();
		} elseif ($this->session->userdata('level') == 'KURIR') {
            $data['jadwal'] = $this->M_pengantaran->jadwal_antar($this->session->userdata('id_user'))->result_array();
            $data['jadwalTerkirim'] = $this->M_pengantaran->jadwal_terkirim($this->session->userdata('id_user'))->result_array();
        }
        $this->load->view('admin/jadwal_antar', $data);
    }

    public function updateStatus()
    {
        $id = $this->input->post('id');
        $data = array(
			'waktu_selesai_antar' => date("Y-m-d H:i:s"),
			'status' => 'Terkirim'
        );
        $data_pesanan = array(
			'status' => 'Terkirim'
        );
        $this->M_pengantaran->updateStatus($data, $id);
        $this->M_pesanan->change_status($id, $data_pesanan);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Status updated => Terkirim</div>');
        redirect('admin/jadwal_pengantaran');
    }

    public function input_retur()
    {
        $this->authentication();
        $this->load->view('admin/input_retur');
    }
}
