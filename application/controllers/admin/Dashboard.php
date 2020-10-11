<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	 
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_pesanan');
	}
	
	public function authentication(){
		if ($this->session->userdata('login')!='admin') {
			redirect('admin/login');
		}
	}

	public function dashboard(){
		$this->authentication();
		if ($this->session->userdata('level') == 'SPV') {
			$this->load->view('admin/dashboard');
		} else if ($this->session->userdata('level') == 'PRODUKSI') {
			redirect('admin/produksi');
		} else {
			redirect('admin/jadwal_pengantaran');
		}
	}

	public function omset(){
		$tahun = json_decode(file_get_contents('php://input'));
		$hasil_penjualan = [];

		for ($i = 1; $i <= 12; $i++) { 
			$bulan = strval($i);
			if (strlen($bulan) == 1) {
				$bulan = '0' . $bulan;
			}
			$pesanan = $this->M_pesanan->get_omset($tahun->year . '-'. $bulan)->row_array();
			$omset_perbulan = $pesanan['total_harga'];
			if (!$omset_perbulan) {
				$omset_perbulan = '0';
			}
			$omset_perbulan = (int) $omset_perbulan;
			array_push($hasil_penjualan, $omset_perbulan);
		}
		echo json_encode(array('omset' => $hasil_penjualan));
	}
}
