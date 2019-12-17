<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pesanan');
		$this->load->model('M_detail_pesanan');
		$this->load->model('M_rencana_produksi');
		$this->load->model('M_bahanbaku');
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
		$data['pesanan'] = $this->M_pesanan->get_pesananById(['p.id' => $id])->row_array();
		$data['detail'] = $this->M_detail_pesanan->get_detail_pesanan(['id_pesanan' => $id])->result_array();
		$this->load->view('admin/detail_pesanan', $data);
	}

	public function tambah_produksi()
	{
		$id_pesanan = $this->input->post('id');
		$id_produk = $this->input->post('id_produk');
		$jumlah = $this->input->post('jumlah');
		foreach ($id_produk as $key => $n) {
			$data = array(
				'id_produk' => $id_produk[$key],
				'jumlah' => $jumlah[$key],
				'status' => 'proses'
			);
			$this->M_rencana_produksi->set_rencana_produksi($data);
		}
		$data = array(
			'status' => 'Produksi',
		);
		$this->M_pesanan->change_status($id_pesanan, $data);
		redirect(base_url('admin/pesanan/data_pesanan'));
	}

	public function produksi()
	{
		$data['produksi'] = $this->M_rencana_produksi->get_produksi()->result_array();
		$jumlah = 0;
		foreach ($data['produksi'] as $produksi) {
			$jumlah += $produksi['jumlah'];
		}
		$data['jumlah'] = $jumlah;
		$data['bahan'] = $this->M_bahanbaku->data_bahan()->result_array();
		$this->load->view('admin/rencana_produksi', $data);
	}
}
