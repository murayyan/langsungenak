<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_order');
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
		$data['order1'] = $this->M_order->get_order(['status' => 'Menunggu Konfirmasi'])->result_array();
		$data['order2'] = $this->M_order->get_order(['status' => 'Pembayaran Diterima'])->result_array();
		$data['order3'] = $this->M_order->get_order(['status' => 'Produksi'])->result_array();
		$data['order4'] = $this->M_order->get_order(['status' => 'Terkirim'])->result_array();
		$this->load->view('admin/data_pesanan', $data);
	}
}
