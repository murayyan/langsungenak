<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pesanan');
		$this->load->model('M_pembayaran');
	}

	public function index()
	{
		$this->load->view('index');
	}

	public function payment($invoice)
	{
		$data['pesanan'] = $this->M_pesanan->get_pesanan(['pesanan.id' => $invoice])->result_array();
		$this->load->view('customer/payment', $data);
	}

	public function make_payment()
	{
		$id_pesanan = $this->input->post('id_pesanan');
		$no_rek = $this->input->post('no_rek');
		$nama_rek = $this->input->post('nama_rek');
		$bank_rek = $this->input->post('bank_rek');
		$bank_tujuan = $this->input->post('bank_tujuan');
		$filename = time() . '_' . substr(str_replace(' ', '_', $_FILES['bukti']['name']), -12);
		$config = [
			'file_name' 	=> $filename,
			'upload_path' 	=> 'assets/images/bukti',
			'allowed_types'	=> 'jpg|jpeg|png',
			'max_size' 		=> '10000'
		];
		$data = [
			'id_pesanan' 		=> $id_pesanan,
			'no_rekening' 	=> $no_rek,
			'nama_rekening'	=> $nama_rek,
			'bank_rekening'	=> $bank_rek,
			'bank_tujuan' 	=> $bank_tujuan,
			'file' 			=> $filename
		];

		$this->load->library('upload', $config);
		$this->upload->do_upload('bukti');
		$this->M_pembayaran->add_bukti($data);
		$this->M_pesanan->change_status($id_pesanan, ['status' => 'Menunggu Konfirmasi']);
		redirect(base_url('pesanan'));
	}
}
