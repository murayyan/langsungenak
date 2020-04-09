<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produksi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pesanan');
		$this->load->model('M_detail_pesanan');
		$this->load->model('M_rencana_produksi');
		$this->load->model('M_bahanbaku');
		$this->load->model('M_produk');
	}

	public function authentication()
	{
		if ($this->session->userdata('level') != 'SPV') {
			redirect('admin/login');
		}
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

	public function get_bahanbaku()
	{
		$id = $this->input->post('id');
		$bahan = $this->input->post('bahan');
		foreach ($id as $key => $value) {
			$this->M_bahanbaku->change_stok($id[$key], $bahan[$key]);
		}
		$id_produk = $this->input->post('id_produk');
		$jumlah = $this->input->post('jumlah');
		foreach ($id_produk as $key => $value) {
			$this->M_produk->change_stok($id_produk[$key], $jumlah[$key]);
			$this->M_rencana_produksi->change_status($id_produk[$key]);
		}
		redirect(base_url('admin/data_pesanan'));
	}
}
