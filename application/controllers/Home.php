<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_customer');
		$this->load->model('M_produk');
		$this->load->model('M_pesanan');
		$this->load->model('M_detail_pesanan');
		$this->load->model('M_pembayaran');
	}

	public function index()
	{
		$this->load->view('index');
	}

	public function checkout()
	{
		$this->load->view('customer/checkout');
	}

	public function pesanan() 
	{
		$data['pesanan'] = $this->M_pesanan->get_pesanan(['customer' => $this->session->userdata('id')])->result_array();
		$this->load->view('customer/pesanan', $data);
	}

	public function katalog() //produk
	{
		$data['produk'] = $this->M_produk->data_produk()->result_array();
		$this->load->view('customer/katalog', $data);
	}

}
