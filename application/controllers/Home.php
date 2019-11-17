<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_customer');
		$this->load->model('M_produk');
		$this->load->model('M_order');
		$this->load->model('M_detail_order');
		$this->load->model('M_pembayaran');
	}

	public function index()
	{
		$this->load->view('index');
	}

	public function checkout()
	{
		$this->load->view('checkout');
	}
	public function payment($invoice)
	{
		$data['pesanan'] = $this->M_order->get_order(['id' => $invoice])->result_array();
		$this->load->view('payment', $data);
	}
	public function make_payment()
	{
		$id_order = $this->input->post('id_order');
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
			'id_order' 		=> $id_order,
			'no_rekening' 	=> $no_rek,
			'nama_rekening'	=> $nama_rek,
			'bank_rekening'	=> $bank_rek,
			'bank_tujuan' 	=> $bank_tujuan,
			'file' 			=> $filename
		];

		$this->load->library('upload', $config);
		$this->upload->do_upload('bukti');
		$this->M_pembayaran->add_bukti($data);
		$this->M_order->change_status($id_order, ['status' => 'Menunggu Konfirmasi']);
		redirect(base_url('pesanan'));
	}

	public function pesanan()
	{
		$data['pesanan'] = $this->M_order->get_order(['customer' => $this->session->userdata('id')])->result_array();
		$this->load->view('pesanan', $data);
	}

	public function katalog()
	{
		$data['produk'] = $this->M_produk->data_produk()->result_array();
		$this->load->view('katalog', $data);
	}

	public function add_cart()
	{
		$max = $this->session->userdata('max');
		$current = $this->cart->total_items();
		$coming = $this->input->post('jumlah');
		if ($current + $coming > $max) {
			$max = $this->session->userdata('max');
			$this->session->set_flashdata('data', 'Pesanan anda melebihi kapasitas maksimal sebanyak ' . $max);
			redirect(base_url('katalog'));
			// } else if ($this->cart->total_items() < $this->session->userdata('min')) {
			// 	$min = $this->session->userdata('min');
			// 	$this->session->set_flashdata('data', 'Pesanan anda kurang dari minimal pesanan sebanyak ' . $min);
			// 	redirect(base_url('katalog'));
		} else {
			$id_produk = $this->input->post('id');
			$data = $this->M_produk->getProduk(['id' => $id_produk])->row();
			$cart = array(
				'id'  => $data->id,
				'qty' => $coming,
				'price'   => $data->harga,
				'name'   => $data->nama_produk
			);

			$this->cart->insert($cart);
			redirect(base_url('katalog'));
		}
	}

	public function tambah_pesanan()
	{
		$max = $this->session->userdata('max');
		$min = $this->session->userdata('min');
		$jumlah_item = $this->input->post('jumlah');
		$harga = $this->input->post('total_harga');
		$jml_item = 0;
		$jml_harga = 0;
		foreach ($jumlah_item as $key => $n) {
			$jml_item += $jumlah_item[$key];
			$jml_harga += $harga[$key];
		}
		if ($jml_item > $max) {
			$max = $this->session->userdata('max');
			$this->session->set_flashdata('data', 'Pesanan anda melebihi kapasitas maksimal sebanyak ' . $max);
			redirect(base_url('checkout'));
		} else if ($jml_item < $min) {
			$min = $this->session->userdata('min');
			$this->session->set_flashdata('data', 'Pesanan anda kurang dari minimal pesanan sebanyak ' . $min);
			redirect(base_url('checkout'));
		} else {
			$id_produk = $this->input->post('id');
			$nama_produk = $this->input->post('nama');



			$id_customer = $this->input->post('id_customer');
			$alamat = $this->input->post('alamat');
			$telp = $this->input->post('telp');
			$tgl = $this->input->post('tanggal');
			$data = array(
				'customer' => $id_customer,
				'no_hp' => $telp,
				'alamat' => $alamat,
				'waktu_pesan' => date("Y-m-d"),
				'waktu_kirim' => $tgl,
				'jumlah' => $jml_item,
				'total_harga' => $jml_harga,
				'status' => 'Menunggu Pembayaran'
			);
			$id_order = $this->M_order->set_order($data);
			foreach ($id_produk as $key => $n) {
				$data2 = array(
					'id_order' => $id_order,
					'nama_produk' => $nama_produk[$key],
					'jumlah' => $jumlah_item[$key],
					'total_harga' => $harga[$key]
				);
				$this->M_detail_order->set_detail_order($data2);
				$this->cart->destroy();
			}
			redirect('payment/' . $id_order);
		}
	}

	public function d($rowid)
	{
		$this->cart->remove($rowid);
		redirect(base_url('checkout'));
	}
}
