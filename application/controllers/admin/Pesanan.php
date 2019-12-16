<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pesanan');
		$this->load->model('M_detail_pesanan');
	}

	public function authentication()
	{
		if ($this->session->userdata('level') != 'SPV') {
			redirect('admin/login');
		}
	}

	public function data_pesanan()
	{
		$this->authentication();
		$data['pesanan1'] = $this->M_pesanan->get_pesanan(['status' => 'Menunggu Konfirmasi'])->result_array();
		$data['pesanan2'] = $this->M_pesanan->get_pesanan(['status' => 'Belum Diproduksi'])->result_array();
		$data['pesanan3'] = $this->M_pesanan->get_pesanan(['status' => 'Produksi'])->result_array();
		$data['pesanan4'] = $this->M_pesanan->get_pesanan(['status' => 'Belum Dikirim'])->result_array();
		$data['pesanan5'] = $this->M_pesanan->get_pesanan(['status' => 'Terkirim'])->result_array();

		$this->load->view('admin/data_pesanan', $data);
	}

	public function detail_pesanan($id)
	{
		$this->authentication();
		$data['pesanan'] = $this->M_pesanan->get_pesananById(['pesanan.id' => $id])->row_array();
		$data['detail'] = $this->M_detail_pesanan->get_detail_pesanan(['id_pesanan' => $id])->result_array();
		$this->load->view('admin/detail_pesanan', $data);
	}
}
