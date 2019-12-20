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
		$this->load->model('M_produk');
		$this->load->model('M_pengantaran');
	}

	public function authentication()
	{
		if ($this->session->userdata('level') != 'SPV' && $this->session->userdata('level') != 'PRODUKSI') {
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
		$data['detail'] = $this->M_detail_pesanan->get_detail_pesanan($id)->result_array();
		$data['bayar'] = $this->M_pesanan->get_bukti_bayar($id)->row_array();
		$data['kurir'] = $this->M_pesanan->get_kurir()->result_array();
		$data['kurirSet'] = $this->M_pengantaran->cekKurir($id)->num_rows();
		$this->load->view('admin/detail_pesanan', $data);
	}

	public function pesanan_selesai()
	{
		$id_pesanan = $this->input->post('id');
		$id_produk = $this->input->post('id_produk');
		$jumlah = $this->input->post('jumlah');
		foreach ($id_produk as $key => $value) {
			$this->M_produk->decrease_stok($id_produk[$key], $jumlah[$key]);
		}
		$data = array(
			'status' => 'Belum Dikirim',
		);
		$this->M_pesanan->change_status($id_pesanan, $data);
		redirect(base_url('admin/pesanan/data_pesanan'));
	}

	public function konfirmasiPembayaran()
	{
		$id = $this->input->post('id');
		$data = array(
			'status' => 'Belum Diproduksi',
		);
		$this->M_pesanan->change_status($id, $data);
		redirect(base_url('admin/pesanan/data_pesanan'));
	}

	public function setKurir()
	{
		$id_pesanan = $this->input->post('id');
		$id_kurir = $this->input->post('kurir');
		$waktu_antar = $this->input->post('waktu_antar');
		$data = array(
			'id_pesanan' => $id_pesanan,
			'id_kurir' => $id_kurir,
			'waktu_pengantaran' => $waktu_antar,
			'status' => 'Belum Dikirim'
		);
		$this->M_pengantaran->addJadwal($data);
		redirect(base_url('admin/pesanan/data_pesanan'));
	}
}
